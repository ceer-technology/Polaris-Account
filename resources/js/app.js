import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import { i18nVue } from 'laravel-vue-i18n';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || Polaris-Account;

var element = document.documentElement // 获取网页属性
var languageUsed = element.lang; // 获取该网页的 lang 属性，将 languageUsed 设置为获取到的 lang 属性

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18nVue, {
                lang: languageUsed,
                resolve: lang => {
                    const langs = import.meta.globEager('../../lang/*.json');
                    return langs[`../../lang/${lang}.json`].default;
                },
            })
            .use(ZiggyVue, Ziggy)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});