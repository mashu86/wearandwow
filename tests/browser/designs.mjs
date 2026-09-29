import { chromium } from '@playwright/test';
import assert from 'node:assert/strict';
const browser = await chromium.launch({ channel: 'chrome' });
try {
    for (const route of ['/', '/index2']) {
        for (const width of [320, 390, 768, 1440]) {
            const page = await browser.newPage({ viewport: { width, height: 900 }, reducedMotion: 'reduce' });
            const errors = [];
            page.on('pageerror', error => errors.push(error.message));
            const response = await page.goto((process.env.BASE_URL || 'http://127.0.0.1:8000') + route);
            assert.equal(response.status(), 200);
            await page.evaluate(async () => {
                document.querySelectorAll('img').forEach(image => image.loading = 'eager');
                await Promise.all([...document.images].map(image => image.decode().catch(() => {})));
            });
            assert.deepEqual(await page.locator('img').evaluateAll(images => images.filter(image => !image.naturalWidth).map(image => image.src)), []);
            assert(await page.evaluate(() => document.documentElement.scrollWidth <= innerWidth + 1), `${route} overflows at ${width}`);
            const frame = page.locator('.video-frame').first();
            await frame.scrollIntoViewIfNeeded();
            await page.waitForTimeout(350);
            await frame.locator('.video-toggle').click();
            assert(await frame.locator('video').evaluate(video => video.muted));
            await frame.locator('.video-expand').click();
            assert(await frame.evaluate(el => document.fullscreenElement === el));
            await frame.locator('.video-sound').click();
            await page.waitForFunction(() => { const v = document.fullscreenElement.querySelector('video'); return !v.muted && !v.paused && v.currentTime > 0; });
            await frame.locator('.video-expand').click();
            assert.equal(await page.evaluate(() => document.fullscreenElement), null);
            await frame.evaluate(el => el.requestFullscreen = undefined);
            await frame.locator('.video-expand').click();
            assert(await frame.evaluate(el => el.classList.contains('is-expanded')));
            await page.keyboard.press('Escape');
            assert(!(await frame.evaluate(el => el.classList.contains('is-expanded'))));
            assert.deepEqual(errors, []);
            await page.evaluate(() => window.scrollTo({ top: 0, behavior: 'instant' }));
            if (route === '/index2') await page.screenshot({ path: `artifacts/index2-${width}.png`, fullPage: true });
            console.log(`PASS ${route} ${width}: images, layout, mute, fullscreen, fallback, JS`);
            await page.close();
        }
    }
} finally { await browser.close(); }
