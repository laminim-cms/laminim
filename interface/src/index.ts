import {createLaminimCmsApp, setBeforeEachRouteCallback, setCustomRoute} from "laminim-cms-ui";

import "laminim-cms-ui/styles"
import DemoSpa from "./components/DemoSpa.vue";

setCustomRoute({ path: '/laminim/portfolio/projects', name: 'laminim-portfolio-projects', component: DemoSpa });

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
