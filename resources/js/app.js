import './bootstrap';

import './hously/easy_background.js';
import './hously/plugins.init.js';
import './hously/app.js';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const handleChange = () => {
    const fileUploader = document.querySelector('#input-file');
    const getFile = fileUploader.files
    if (getFile.length !== 0) {
        const uploadedFile = getFile[0];
        readFile(uploadedFile);
    }
};

const readFile = (uploadedFile) => {
    if (uploadedFile) {
        const reader = new FileReader();
        reader.onload = () => {
            const parent = document.querySelector('.preview-box');
            parent.innerHTML = `<img class="preview-content" src=${reader.result} />`;
        };

        reader.readAsDataURL(uploadedFile);
    }
};
