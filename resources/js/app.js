import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/inertia-vue3";
import { InertiaProgress } from "@inertiajs/progress";
import RegisterComponents from "./register-components";
import RegisterPlugins from "./register-plugins";

InertiaProgress.init();

createInertiaApp({
    resolve: name => import(`./views/${name}`),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        RegisterComponents(app);
        RegisterPlugins(app);

        app.use(plugin);
        app.mount(el);
    },
});
