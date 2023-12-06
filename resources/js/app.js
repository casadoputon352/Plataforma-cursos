import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import.meta.glob(["../imgs/**"]);

const cssFiles = import.meta.glob("../css/**/*.css");
// Itera sobre os arquivos CSS e os importa
Object.keys(cssFiles).forEach((key) => {
    cssFiles[key]();
});

const jsFiles = import.meta.glob("../js/**/*.js");
// Itera sobre os arquivos JS e os importa
Object.keys(jsFiles).forEach((key) => {
    jsFiles[key]();
});
