<script setup lang="ts">
import {createLinkColumn, createTextColumn} from "lkt-table";
import {ref} from "vue";
import {HTTPResponse} from "lkt-http-client";

const columns = ref([
    createTextColumn('name', 'Título'),
    createLinkColumn('url', 'Enlace', (item) => item.url),
]);

const items = ref([
    // {name: 'Home Page', url: '/laminim/pages/home-page'},
    // {name: 'Projects', url: '/laminim/pages/projects'},
]);

const onReadResponse = (r: HTTPResponse) => {


    console.log('final onReadResponse', r);
}
</script>

<template>
<lkt-table
    resource="ls-pages"
    :perms="['create', 'update', 'drop']"
    v-model="items"
    :columns="columns"
    edit-mode
    can-create
    create-text="Add page"
    create-icon="icon-check2"
    create-route="/laminim/new/page"
    @read-response="onReadResponse"
></lkt-table>
</template>

<style scoped>

</style>