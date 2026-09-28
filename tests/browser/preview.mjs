import { chromium } from '@playwright/test';
import { mkdir } from 'node:fs/promises';
await mkdir('artifacts', { recursive: true });
const browser = await chromium.launch({ channel: 'chrome', headless: true });
const page = await browser.newPage({ viewport: { width: 1440, height: 1000 }, reducedMotion: 'reduce' });
page.on('pageerror', error => console.error('PAGE ERROR:', error.message));
page.on('console', message => { if (message.type() === 'error') console.error('CONSOLE:', message.text()); });
await page.goto('http://127.0.0.1:8000', { waitUntil: 'networkidle' });
await page.screenshot({ path: 'artifacts/desktop-hero.png' });
for (const id of ['discover', 'wholesale', 'retail', 'collections', 'shop', 'about', 'contact']) {
    await page.locator(`#${id}`).scrollIntoViewIfNeeded();
    await page.waitForTimeout(120);
}
await page.screenshot({ path: 'artifacts/desktop-full.png', fullPage: true });
await page.setViewportSize({ width: 390, height: 844 });
await page.goto('http://127.0.0.1:8000', { waitUntil: 'networkidle' });
await page.screenshot({ path: 'artifacts/mobile-hero.png' });
for (const id of ['wholesale', 'retail', 'collections', 'shop', 'about', 'contact']) await page.locator(`#${id}`).scrollIntoViewIfNeeded();
await page.screenshot({ path: 'artifacts/mobile-full.png', fullPage: true });
await browser.close();
