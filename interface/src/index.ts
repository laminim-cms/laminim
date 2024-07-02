import {createLaminimCmsApp, setBeforeEachRouteCallback, setCustomRoute} from "laminim-cms-ui";

import "laminim-cms-ui/styles"
import DemoSpa from "./components/DemoSpa.vue";
import PageSpa from "./components/PageSpa.vue";
import {createHTTPGetResource} from "lkt-http-client";

setCustomRoute({ path: '/laminim/portfolio/projects', name: 'laminim-portfolio-projects', component: DemoSpa });
setCustomRoute({ path: '/laminim/pages', name: 'laminim-pages', component: DemoSpa });
setCustomRoute({ path: '/laminim/pages/:path(.*)*', name: 'laminim-page', component: PageSpa });
setCustomRoute({ path: '/laminim/new-page', name: 'laminim-new-page', component: PageSpa });

// Custom on change route callback
setBeforeEachRouteCallback((to, from) => {

    let title = 'LaminimCMS';
    if (to.meta && to.meta.title) title = [to.meta.title, title].join(' | ');

    document.title = title;
});

createHTTPGetResource({
    url: '/laminim/pages/list',
    name: 'ls-pages',
    params: {id: {default: undefined}},
    digToPerms: 'perms',
    digToData: 'item',
    mapData: (data: LktObject) => {
        return data;
    }
})

// Create app
const app = createLaminimCmsApp(true);

// Mount app
app.mount('#app');
