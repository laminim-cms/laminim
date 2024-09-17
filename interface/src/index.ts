import {createLaminimCmsApp, setBeforeEachRouteCallback} from "laminim-cms-ui";

import "laminim-cms-ui/styles"
import "lkt-page-editor/theme/default"
import "lkt-page-editor/styles"
import "lkt-tooltip/styles"
import "lkt-image/theme/default"
import "lkt-image/styles"
import "./styles.css"
import LktTooltip from "lkt-tooltip";
import LktImage from "lkt-image";

import {addItemTypeToEditor, CustomItemType, addBasicBlockToEditor, CustomBasicBlock} from "lkt-page-editor";
import EditorImagePreview from "./slots/EditorImagePreview.vue";


addBasicBlockToEditor(new CustomBasicBlock({
    component: 'icon-h2',
    icon: 'icon-globe',
    text: 'H2 + Icon',
    contentEnabled: true
}));


addItemTypeToEditor(new CustomItemType({
    component: 'project',
    icon: 'icon-globe',
    text: 'Project',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'project'
    }
}));


addItemTypeToEditor(new CustomItemType({
    component: 'projects',
    icon: 'icon-globe',
    text: 'Projects',
    type: 'items',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'project'
    }
}));


addItemTypeToEditor(new CustomItemType({
    component: 'featured-projects',
    icon: 'icon-globe',
    text: 'Featured Projects',
    type: 'auto',
}));


addItemTypeToEditor(new CustomItemType({
    component: 'multimedia',
    icon: 'icon-folder',
    text: 'Image',
    slot: EditorImagePreview,
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'multimedia',
        _lmm_filters: JSON.stringify({
            type: 'image',
        })
    }
}));

addItemTypeToEditor(new CustomItemType({
    component: 'benchmark',
    icon: 'icon-globe',
    text: 'Benchmark',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'benchmark'
    }
}));

addItemTypeToEditor(new CustomItemType({
    component: 'skill',
    icon: 'icon-user-o',
    text: 'Skill',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'uri-portfolio-skill'
    }
}));

// Custom on change route callback
setBeforeEachRouteCallback((to, from) => {

    let title = 'LaminimCMS';
    if (to.meta && to.meta.title) title = [to.meta.title, title].join(' | ');

    document.title = title;
});

// Create app
const app = createLaminimCmsApp(true);

app.use(LktTooltip);
app.use(LktImage);

// Mount app
app.mount('#app');
