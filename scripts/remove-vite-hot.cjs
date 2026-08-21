const fs = require('node:fs');
const path = require('node:path');

const hotFilePath = path.resolve(__dirname, '..', 'public', 'hot');

if (fs.existsSync(hotFilePath)) {
    fs.unlinkSync(hotFilePath);
    console.log('Removed stale Vite hot file:', hotFilePath);
} else {
    console.log('No Vite hot file found.');
}
