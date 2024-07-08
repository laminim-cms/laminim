import {createLaminimCmsApp, ModularBlock, setBeforeEachRouteCallback, setCustomRoute} from "laminim-cms-ui";

import "laminim-cms-ui/styles"
import DemoSpa from "./components/DemoSpa.vue";
import PageSpa from "./components/PageSpa.vue";
import {createHTTPGetResource, createHTTPPostResource, createHTTPPutResource} from "lkt-http-client";

setCustomRoute({path: '/laminim/portfolio/projects', name: 'laminim-portfolio-projects', component: DemoSpa});
// setCustomRoute({path: '/laminim/pages', name: 'laminim-pages', component: DemoSpa});
// setCustomRoute({path: '/laminim/page/:path(.*)*', name: 'laminim-page', component: PageSpa});

// Custom on change route callback
setBeforeEachRouteCallback((to, from) => {

    let title = 'LaminimCMS';
    if (to.meta && to.meta.title) title = [to.meta.title, title].join(' | ');

    document.title = title;
});

createHTTPGetResource({
    url: '/laminim/pages/list',
    name: 'ls-pages',
    digToPerms: 'perms',
    digToData: 'results',
    custom: {
        columns: 'columns'
    },
    mapData: (data: LktObject) => {
        return data;
    }
});

createHTTPGetResource({
    url: '/laminim/pages/{slug}',
    name: 'r-pages',
    params: {slug: {default: undefined}},
    digToPerms: 'perms',
    digToData: 'item',
    custom: {
        columns: 'columns'
    },
    mapData: (data: LktObject) => {
        console.log('dataaa', data);
        data.modularBlocks = data.modularBlocks.map(d => new ModularBlock(d));
        return data;
    }
});

createHTTPPostResource({
    url: '/laminim/create',
    name: 'mk-item',
    params: {
        type: {default: undefined}
    },
    digToPerms: 'perms',
    digToData: 'item',
    custom: {
        columns: 'columns'
    },
    mapData: (data: LktObject) => {
        data.modularBlocks = data.modularBlocks.map(d => new ModularBlock(d));
        return data;
    }
});

createHTTPPutResource({
    url: '/laminim/pages/{slug}',
    name: 'up-pages',
    params: {slug: {default: undefined}},
    digToPerms: 'perms',
    digToData: 'item',
    custom: {
        columns: 'columns'
    },
    mapData: (data: LktObject) => {
        console.log('dataaa', data);
        data.modularBlocks = data.modularBlocks.map(d => new ModularBlock(d));
        return data;
    }
});

// Create app
const app = createLaminimCmsApp(true);

// Mount app
app.mount('#app');
