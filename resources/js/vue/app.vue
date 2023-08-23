<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form :categories="categories" />
        </div>
        <list-view
            :items="items"

        />
    </div>

</template>

<script>
import axios from 'axios';
import addItemForm from './addItemForm.vue';
import listView from './listView.vue';
export default {
    components:{
        addItemForm,
        listView
    },
    data: function(){
        return {
            items: [],
            categories: []
        }
    },
    methods:{
        getList (){
            axios.get('api/items')
            .then(response => {
                this.items = response.data
            })
            .catch (error =>{
                console.log( error );
            })
        },
        getCategories(){
            axios.get('api/categories')
            .then(response => {
                this.categories = response.data
            })
            .catch (error =>{
                console.log( error );
            })
        }
    },
    created(){
        this.getList();
        this.getCategories();
    }
}


</script>

<style>


.heading{
    background: #e6e6e6;
    padding: 10px;
}

#title{
    text-align: center;
}


</style>
