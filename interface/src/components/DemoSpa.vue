<script setup lang="ts">
import {createLinkColumn, createTextColumn} from "lkt-table";
import {ref} from "vue";

const columns = [
    createTextColumn('name', 'Título'),
    createLinkColumn('url', 'Enlace'),
];

const items = ref([
    {name: 'Home Page', url: '/laminim/users'},
    {name: 'Projects', url: '/laminim/portfolio/users'},
]);
</script>

<template>
<lkt-table
    v-model="items"
    :columns="columns"
></lkt-table>
</template>

<style scoped>

</style>