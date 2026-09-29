import { chromium } from '@playwright/test';
import assert from 'node:assert/strict';
import { mkdir, writeFile } from 'node:fs/promises';

const baseUrl = process.env.BASE_URL || 'http://127.0.0.1:8000';
const browser = await chromium.launch({ channel: 'chrome', headless: true });
const results = [];
const errors = [];
await mkdir('artifacts', { recursive: true });
try {
    for (const width of [1920, 1440, 1280, 1024, 820, 768, 701, 700, 600, 430, 390, 375, 360, 320]) {
        const page = await browser.newPage({ viewport: { width, height: 900 }, reducedMotion: 'reduce' });
        page.on('pageerror', error => errors.push(`${width}: ${error.message}`));
        page.on('console', message => { if (message.type() === 'error') errors.push(`${width}: ${message.text()}`); });
        page.on('response', response => { if (response.status() >= 400) errors.push(`${width}: HTTP ${response.status()} ${response.url()}`); });
        const response = await page.goto(baseUrl, { waitUntil: 'networkidle' });
        assert.equal(response.status(), 200);
        await page.evaluate(() => document.fonts.ready);
        assert.equal(await page.locator('h1').count(), 1);
        assert.equal(await page.locator('.bundle-row').count(), 4);
        assert.equal(await page.locator('video[src]').count(), 0, 'Reduced motion must not autoplay videos');
        const links = await page.locator('a[href^="#"]').evaluateAll(anchors => anchors.filter(a => !document.getElementById(a.hash.slice(1))).map(a => a.hash));
        assert.deepEqual(links, [], 'All section links resolve');
        const socials = await page.locator('a[href^="https://"]').evaluateAll(anchors => anchors.map(a => a.href));
        assert(socials.includes('https://www.instagram.com/wear.n.wow/?hl=en'));
        assert(socials.includes('https://www.facebook.com/people/Wear-wow/61585847387728/'));
        assert(socials.some(url => url.startsWith('https://www.google.com/maps/search/?api=1&query=')));
        assert(socials.filter(url => url.includes('wa.me')).every(url => url.startsWith('https://wa.me/919746827272')));
        for (const id of ['home', 'discover', 'wholesale', 'bundles', 'retail', 'retail-demo', 'collections', 'shop', 'about', 'contact']) {
            await page.locator(`#${id}`).scrollIntoViewIfNeeded();
            const overflow = await page.evaluate(() => document.documentElement.scrollWidth - innerWidth);
            assert(overflow <= 1, `${width}px: ${id} causes ${overflow}px page overflow`);
        }
        if (width <= 700) {
            const largeHeadings = await page.locator('h2').evaluateAll(elements => elements.filter(el => parseFloat(getComputedStyle(el).fontSize) > 38).map(el => el.textContent));
            assert.deepEqual(largeHeadings, [], `${width}px: oversized mobile section headings`);
            const clippedText = await page.locator('h1,h2,h3,.retail-price,.hero-actions,.footer-top nav').evaluateAll(elements => elements.filter(el => el.scrollWidth > el.clientWidth + 1).map(el => el.textContent));
            assert.deepEqual(clippedText, [], `${width}px: clipped text or controls`);
            assert(await page.locator('.retail-price').evaluate(el => parseFloat(getComputedStyle(el).fontSize) <= 80));
            for (const frame of await page.locator('.video-frame').all()) {
                const caption = await frame.locator('.video-caption').boundingBox();
                const toggle = await frame.locator('.video-toggle').boundingBox();
                assert(caption.x + caption.width <= toggle.x, `${width}px: video caption overlaps playback control`);
            }
        }
        assert.equal(await page.locator('.weight-option').count(), 0);
        assert.equal(await page.locator('#retail-total').count(), 0);
        assert((await page.locator('.retail-price').textContent()).includes('888'));
        assert((await page.locator('.retail-rate-note').textContent()).includes('actual weight'));
        assert(!decodeURIComponent(await page.locator('.retail-enquiry').getAttribute('href')).includes('1 KG'));
        await page.locator('#collections').scrollIntoViewIfNeeded();
        const initialIndex = await page.locator('.collection-swiper').evaluate(el => el.swiper.activeIndex);
        await page.locator('.collection-next').click();
        assert(await page.locator('.collection-swiper').evaluate(el => el.swiper.activeIndex) > initialIndex);
        await page.locator('.collection-prev').click();
        assert.equal(await page.locator('.collection-swiper').evaluate(el => el.swiper.activeIndex), initialIndex);
        if (width <= 700) {
            await page.locator('.menu-toggle').click();
            assert.equal(await page.locator('.menu-toggle').getAttribute('aria-expanded'), 'true');
            const menuBox = await page.locator('.nav-links').boundingBox();
            const headerBox = await page.locator('.site-header').boundingBox();
            assert(Math.abs(menuBox.y - headerBox.y - headerBox.height) <= 1, 'Mobile menu must sit below the header');
            await page.locator('.nav-links a[href="#retail"]').click();
            assert.equal(await page.locator('.menu-toggle').getAttribute('aria-expanded'), 'false');
            await page.locator('.menu-toggle').click();
            await page.keyboard.press('Escape');
            assert.equal(await page.locator('.menu-toggle').getAttribute('aria-expanded'), 'false');
        }
        await page.evaluate(async () => {
            document.querySelectorAll('img[loading="lazy"]').forEach(img => img.loading = 'eager');
            await Promise.all([...document.images].map(img => img.decode().catch(() => {})));
        });
        const broken = await page.locator('img').evaluateAll(images => images.filter(img => !img.complete || !img.naturalWidth).map(img => img.src));
        assert.deepEqual(broken, []);
        if (width === 390 || width === 320) {
            for (const id of ['home', 'discover', 'wholesale', 'bundles', 'retail', 'retail-demo', 'collections', 'shop', 'about', 'contact']) {
                await page.locator(`#${id}`).screenshot({ path: `artifacts/mobile-${width}-${id}.png` });
            }
            await page.locator('.site-footer').screenshot({ path: `artifacts/mobile-${width}-footer.png` });
        }
        await page.evaluate(() => { window.scrollTo({ top: 0, behavior: 'instant' }); document.activeElement?.blur(); });
        await page.screenshot({ path: `artifacts/verified-${width}.png`, fullPage: width === 1440 || width === 390 });
        results.push({ width, passed: true, checks: 'pricing, carousel, navigation, links, images, reduced motion, page overflow' });
        console.log(`PASS ${width}px`);
        await page.close();
    }
    const page = await browser.newPage({ viewport: { width: 1440, height: 1000 } });
    page.on('pageerror', error => errors.push(error.message));
    await page.goto(baseUrl, { waitUntil: 'networkidle' });
    assert.equal(await page.locator('video[src]').count(), 0, 'Videos must not download at initial load');
    const metadata = [];
    for (const frame of await page.locator('.video-frame').all()) {
        await frame.scrollIntoViewIfNeeded();
        const video = frame.locator('video');
        await page.waitForFunction(el => el.readyState >= 2 && !el.paused, await video.elementHandle(), { timeout: 20000 });
        const info = await video.evaluate(el => ({ src: el.dataset.src, width: el.videoWidth, height: el.videoHeight, muted: el.muted }));
        assert(info.width > 0 && info.height > 0 && info.muted);
        metadata.push(info);
        await frame.locator('.video-toggle').click();
        assert.equal(await video.evaluate(el => el.paused), true);
        await frame.locator('.video-toggle').click();
        await page.waitForFunction(el => !el.paused, await video.elementHandle());
    }
    await page.locator('#contact').scrollIntoViewIfNeeded();
    await page.waitForTimeout(300);
    assert(await page.locator('video').evaluateAll(videos => videos.every(video => video.paused)));
    await page.locator('#about').scrollIntoViewIfNeeded();
    await page.waitForFunction(() => document.querySelector('#about .reveal').classList.contains('is-visible'));
    assert.equal(await page.locator('.site-header').evaluate(el => el.classList.contains('scrolled')), true);
    const posters = await page.locator('video').evaluateAll(videos => videos.map(video => video.poster));
    for (const poster of posters) assert((await page.request.get(poster)).ok());
    assert.deepEqual(errors, [], 'No browser errors or broken requests');
    await writeFile('artifacts/verification.json', JSON.stringify({ results, videos: metadata, errors }, null, 2));
    console.log('PASS video playback, lazy loading, pause controls, scroll reveals, sticky navigation, and console checks');
    await page.close();
} finally {
    await browser.close();
}
