import {createApp, h, provide} from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import Lara from './Shared/Presets/lara';

createInertiaApp({
    progress: {
        showSpinner: true,
    },
    resolve: name => {
        // @ts-ignore
        const pages = import.meta.glob('./Pages/**/*.vue', {eager: true})
        return pages[`./Pages/${name}.vue`]
    },
    setup({el, App, props, plugin}) {
        const app = createApp({render: () => h(App, props)})
            .use(PrimeVue, {
                unstyled: true,
                pt: Lara
            })
            .use(plugin)
            .use(ToastService)
            .provide('toast', PrimeVue)
            .mount(el)
    },
})
