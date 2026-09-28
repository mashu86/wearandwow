import { chromium } from '@playwright/test';
import { writeFile } from 'node:fs/promises';

// The original logo is preserved; this is a smaller, lossless web derivative.
const browser = await chromium.launch({ channel: 'chrome', headless: true });
try {
    const page = await browser.newPage();
    await page.goto(process.env.BASE_URL || 'http://127.0.0.1:8000');
    const data = await page.evaluate(async () => {
        const image = new Image();
        image.src = '/assets/wearandwow/logo/logo.png';
        await image.decode();
        const canvas = document.createElement('canvas');
        canvas.width = 180;
        canvas.height = 180;
        canvas.getContext('2d').drawImage(image, 0, 0, 180, 180);
        return canvas.toDataURL('image/png').split(',')[1];
    });
    await writeFile('public/assets/wearandwow/logo/logo-web.png', Buffer.from(data, 'base64'));
} finally {
    await browser.close();
}
