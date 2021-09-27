/**
 * Register Plugins.
 * 
 * Place and enable global plugins into this file.
 */

import AlertPlugin from "./plugins/alert";

const registerPlugins = (app) => {
    app.use(AlertPlugin);
};

export default registerPlugins;