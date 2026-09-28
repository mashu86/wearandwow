import { chromium } from '@playwright/test';
import { writeFile } from 'node:fs/promises';

// Extract small preview frames without changing or duplicating the supplied videos.
const browser = await chromium.launch({ channel: 'chrome', headless: true });
const page = await browser.newPage();
const baseUrl = process.env.BASE_URL || 'http://127.0.0.1:8000';
await page.goto(baseUrl);
const files = ['shop-videos/shop-1', 'shop-videos/shop-2', 'shop-videos/shop-3', 'shop-videos/shop-4', 'surplus-bundles/bundle-demo'];
for (const file of files.filter(file => !process.argv[2] || file.includes(process.argv[2]))) {
    const result = await page.evaluate(async ({ baseUrl, file }) => {
        const video = document.createElement('video');
        video.muted = true;
        video.preload = 'auto';
        video.src = `${baseUrl}/assets/wearandwow/${file}.mp4`;
        await new Promise((resolve, reject) => {
            video.addEventListener('loadedmetadata', resolve, { once: true });
            video.addEventListener('error', () => reject(new Error(`Cannot load ${file}`)), { once: true });
        });
        const metadata = { width: video.videoWidth, height: video.videoHeight, duration: video.duration };
        video.currentTime = Math.min(file.endsWith('shop-3') ? 23 : 1.5, video.duration - 0.1);
        await new Promise(resolve => video.addEventListener('seeked', resolve, { once: true }));
        const canvas = document.createElement('canvas');
        const ratio = Math.min(1, 900 / Math.max(video.videoWidth, video.videoHeight));
        canvas.width = Math.round(video.videoWidth * ratio);
        canvas.height = Math.round(video.videoHeight * ratio);
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
        const data = canvas.toDataURL('image/jpeg', 0.85).split(',')[1];
        video.removeAttribute('src');
        video.load();
        return { data, metadata };
    }, { baseUrl, file });
    await writeFile(`public/assets/wearandwow/${file}.jpg`, Buffer.from(result.data, 'base64'));
    console.log(file, result.metadata);
}
await browser.close();
