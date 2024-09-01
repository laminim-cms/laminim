import {createLaminimCmsPublicApp, setBeforeEachRouteCallback} from "laminim-cms-ui";
import {replaceNonAsciiChars} from "lkt-string-tools";

import "laminim-cms-ui/styles"
import "lkt-login/styles";

// Custom on change route callback
setBeforeEachRouteCallback((to, from) => {

    let title = 'LaminimCMS';
    if (to.meta && to.meta.title) title = [to.meta.title, title].join(' | ');

    document.title = title;
});

// Create app
const app = createLaminimCmsPublicApp(true);

// Mount app
app.mount('#app');

window.test = (str) => {
    return replaceNonAsciiChars(str);
}
