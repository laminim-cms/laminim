<script setup lang="ts">
import {createLinkColumn, createTextColumn} from "lkt-table";
import {ref} from "vue";
import {ModularBlock} from "laminim-cms-ui";

const columns = [
    createTextColumn('name', 'Título'),
    createLinkColumn('url', 'Enlace', (item) => item.url),
];

const item = ref({
    name: '',
});

let items = [
    new ModularBlock({
        name: 'Intro',
        breakpoints: [
            {type: 'default', items: '1', visible: true},
            {type: 'from-640px', items: '2', visible: false},
        ],
        content: [
            {type: 'text'},
            {type: 'multimedia'},
        ]
    })
];
</script>

<template>
    <div class="lkt-grid-1">
        <h1>This is a page detail</h1>

        <lkt-field-text
            v-model="item.name"
            label="Name"
        />


        <lkt-table
            item-mode
            :perms="['create', 'update', 'drop']"
            edit-mode
            can-create
            can-drop
            switch-edition-enabled
            create-text="Add block"
            create-icon="icon-check2"
            drop-text="Delete"
            drop-icon="icon-delete-outline"
            v-model="items"
            items-container-class="lkt-grid-1"
            :new-value-generator="() => new ModularBlock().setIsOpen()"
        >
            <template #item="{item, index, isLoading, canCreate, canUpdate, canDrop, canRead, doDrop}">
                <laminim-modular-block
                    v-model="items[index]"
                    :index="index"
                    :do-drop="doDrop"/>
            </template>
        </lkt-table>
    </div>
</template>

<style scoped>

</style>