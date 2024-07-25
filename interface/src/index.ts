import {createLaminimCmsApp, setBeforeEachRouteCallback} from "laminim-cms-ui";

import "laminim-cms-ui/styles"

// Custom on change route callback
setBeforeEachRouteCallback((to, from) => {

    let title = 'LaminimCMS';
    if (to.meta && to.meta.title) title = [to.meta.title, title].join(' | ');

    document.title = title;
});

// Create app
const app = createLaminimCmsApp(true);

// Mount app
app.mount('#app');
