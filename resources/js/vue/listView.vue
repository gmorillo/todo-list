<template>
    <h3>Listado de tareas</h3>
    <div v-for="(item, index) in items" :key="index">
        <list-item
            :item="item"
            class="item"
            v-on:itemchanged="$emit('reloadlist')"
        />
    </div>

</template>

<script>
import listItem from "./listItem.vue"
export default {
    /*setup: () => ({
        title: 'how to install laravel 8 and vue js'
    })*/
    props:['items'],
    components: {
        listItem
    },

}
</script>

<style scoped>
    .item{
        background-color: #e6e6e6;
        padding: 5px;
        margin-top: 5px;
    }
</style>
