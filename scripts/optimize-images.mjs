import sharp from 'sharp';
import { readdir, stat, writeFile, rename } from 'fs/promises';
import path from 'path';

const ROOT = path.resolve('public/orionFrontAssets/assets/images');
const MAX_DIM = 2000;
const JPEG_QUALITY = 80;
const WEBP_QUALITY = 80;
const PNG_COMPRESSION = 9;

let totalBefore = 0;
let totalAfter = 0;
let processed = 0;
let skipped = 0;
let errors = 0;

async function walk(dir) {
    const entries = await readdir(dir, { withFileTypes: true });
    for (const entry of entries) {
        const full = path.join(dir, entry.name);
        if (entry.isDirectory()) {
            await walk(full);
        } else {
            await processFile(full);
        }
    }
}

async function processFile(file) {
    const ext = path.extname(file).toLowerCase();
    if (!['.jpg', '.jpeg', '.png', '.webp'].includes(ext)) {
        return;
    }

    try {
        const before = (await stat(file)).size;
        const meta = await sharp(file).metadata();

        if (meta.pages && meta.pages > 1) {
            // animated webp - skip to avoid breaking animation
            skipped++;
            totalBefore += before;
            totalAfter += before;
            return;
        }

        let pipeline = sharp(file);
        if (meta.width && meta.width > MAX_DIM) {
            pipeline = pipeline.resize({ width: MAX_DIM, withoutEnlargement: true });
        }

        if (ext === '.jpg' || ext === '.jpeg') {
            pipeline = pipeline.jpeg({ quality: JPEG_QUALITY, mozjpeg: true });
        } else if (ext === '.png') {
            pipeline = pipeline.png({ compressionLevel: PNG_COMPRESSION, palette: true });
        } else if (ext === '.webp') {
            pipeline = pipeline.webp({ quality: WEBP_QUALITY });
        }

        const buffer = await pipeline.toBuffer();

        if (buffer.length < before) {
            await writeFile(file + '.tmp', buffer);
            await rename(file + '.tmp', file);
            totalBefore += before;
            totalAfter += buffer.length;
            processed++;
        } else {
            totalBefore += before;
            totalAfter += before;
            skipped++;
        }
    } catch (err) {
        console.error(`ERROR ${file}: ${err.message}`);
        errors++;
    }
}

const started = Date.now();
await walk(ROOT);
const seconds = ((Date.now() - started) / 1000).toFixed(1);

console.log('--- Image optimization complete ---');
console.log(`Processed: ${processed}, skipped (no gain/animated): ${skipped}, errors: ${errors}`);
console.log(`Before: ${(totalBefore / 1024 / 1024).toFixed(1)} MB`);
console.log(`After:  ${(totalAfter / 1024 / 1024).toFixed(1)} MB`);
console.log(`Saved:  ${((totalBefore - totalAfter) / 1024 / 1024).toFixed(1)} MB (${(100 * (1 - totalAfter / totalBefore)).toFixed(1)}%)`);
console.log(`Took ${seconds}s`);
