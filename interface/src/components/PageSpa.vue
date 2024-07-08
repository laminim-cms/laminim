<script setup lang="ts">
import {createLinkColumn, createTextColumn} from "lkt-table";
import {computed, ref} from "vue";
import {ModularBlock} from "laminim-cms-ui";
import {HTTPResponse} from "lkt-http-client";
import {useRoute} from "vue-router";

const props = withDefaults(defineProps<{
    onCreate?: Function
    onUpdate?: Function
}>(), {});

const route = useRoute();
const type = route.params.type;
console.log('route',route);

const columns = [
    createTextColumn('name', 'Título'),
    createLinkColumn('url', 'Enlace', (item) => item.url),
];

const onUpdateCb = (response: HTTPResponse) => {
    if (typeof props.onUpdate === 'function') {
        //@ts-ignore
        props.onUpdate(response);
    }
};

const Item = ref({
    name: '',
    modularBlocks: [],
});

const perms = ref(<string[]>[]),
    crud = ref(null)
;

let items = [
    new ModularBlock({
        name: 'Intro',
        breakpoints: [
            {type: 'default', items: '1', visible: true},
            {type: 'from-640px', items: '2', visible: false},
        ],
        content: [
            {type: 'inline-text-block'},
            {type: 'image'},
        ]
    })
];

const readProps = computed(() => {
        return {
            slug: 'hola-mundo'
        }
    }),
    updateProps = computed(() => {
        return {...readProps.value, ...Item.value};
    }),
    computedBudgetUseSlotData = computed(() => {
        return {
            props: {
            }
        }
    });
</script>

<template>
    <div class="lkt-grid-1">
        <lkt-item-crud
            ref="crud"
            v-model="Item"
            :title="Item.name"

            read-resource="r-pages"
            :read-data="readProps"

            update-resource="up-pages"
            :update-data="updateProps"
            :on-update="onUpdate"

            drop-text="Delete"
            drop-icon="icon-delete-outline"

            save-icon="icon-floppy"

            v-on:perms="(p: string[]) => perms = p"
            v-on:update="onUpdateCb"
            :data-state-config="{preventProps: ['isOpen']}"
        >
            <template v-slot:item="{item, editMode, loading, isCreate, canUpdate, canDrop, itemBeingEdited}">

                <lkt-field-text
                    v-model="item.name"
                    label="Name"
                    :read-mode="!editMode"
                />

                <lmm-modular-blocks
                    v-model="Item.modularBlocks"
                    :edit-mode="editMode"
                />

            </template>
        </lkt-item-crud>
    </div>
</template>

<style scoped>

</style>