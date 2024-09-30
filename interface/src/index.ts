import {createLaminimCmsApp, setBeforeEachRouteCallback} from "laminim-cms-ui";

import "laminim-cms-ui/theme"
import "laminim-cms-ui/styles"
import "laminim-cms-ui/app/icons"
import "laminim-cms-ui/app/styles"

import "lkt-page-editor/theme/default"
import "lkt-page-editor/styles"
import "lkt-tooltip/styles"
import "lkt-image/theme/default"
import "lkt-image/styles"
import "./styles.css"
import LktTooltip from "lkt-tooltip";
import LktImage from "lkt-image";

import {addBasicBlockToEditor, addItemTypeToEditor, CustomBasicBlock, CustomItemType} from "lkt-page-editor";

import {setFieldUndoText, setFieldClearText, setFieldSwitchEditionOnText, setFieldSwitchEditionOffText, setFieldShowPasswordOnText, setFieldShowPasswordOffText} from "lkt-field-text";


setFieldUndoText('Deshacer');
setFieldClearText('Limpiar');
setFieldSwitchEditionOnText('Modo lectura');
setFieldSwitchEditionOffText('Modo edición');
setFieldShowPasswordOnText('Ocultar contraseña');
setFieldShowPasswordOffText('Mostrar contraseña');


addItemTypeToEditor(new CustomItemType({
    component: 'project',
    itemType: 'uri-portfolio-project',
    icon: 'icon-list-check',
    text: 'Project',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'project'
    }
}));


addItemTypeToEditor(new CustomItemType({
    component: 'user-persona',
    itemType: 'uri-sample-user',
    icon: 'icon-user-o',
    text: 'User Persona',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'uri-sample-user',
        type: 'user-persona',
    }
}));


addItemTypeToEditor(new CustomItemType({
    component: 'projects',
    itemType: 'uri-portfolio-project',
    icon: 'icon-list-check',
    text: 'Projects',
    type: 'items',
    resource: 'opt-items',
    resourceData: {
        _lmm_type: 'project'
    }
}));


addItemTypeToEditor(new CustomItemType({
    component: 'featured-projects',
    itemType: 'uri-portfolio-project',
    icon: 'icon-list-check',
    text: 'Featured Projects',
    type: 'auto',
}));

addItemTypeToEditor(new CustomItemType({
    component: 'benchmark',
    itemType: 'uri-portfolio-benchmark',
    icon: 'icon-compass-fill',
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
