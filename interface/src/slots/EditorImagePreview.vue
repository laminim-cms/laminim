<script setup lang="ts">
const props = withDefaults(defineProps<{
    item: LktObject,
}>(), {
    item: () => [],
});

</script>

<template>
<lkt-image :src="item.src"/>
</template>

<style scoped>

</style>