<template>
    <div class="addItem">
            <div class="mb-3 w/50">
                <label for="exampleInputEmail1" class="form-label">Tarea</label>
                <input id="tareaInput" type="text" class="form-control" v-model="item.name">
                <input id="categoriasinput" type="hidden" v-model="item.category_id" :value="checkedNames"/>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Categorías</label>
                <div class="d-flex align-items-center ">
                <div class="mb-3 form-check px-4" v-for="category in categories" :key="category.name">
                    <div >
                        <input type="checkbox"  :value="category.name" v-model="checkedNames" class="form-check-input" >
                        <label class="form-check-label" >{{category.name}}</label>
                    </div>
                </div>
            </div>
            </div>
            <button @click="addItem(checkedNames )"   type="submit"  :class="[item.name ? 'btn-sm btn-success active  px-3 mx-auto d-block mb-4' : 'btn-sm btn-secondary inactive px-3 mx-auto d-block mb-4', 'plus']">
                <font-awesome-icon
                    icon="plus-square"

                    :class="[item.name ? 'active' : 'inactive', 'plus']"

                />
                <small>&nbsp;&nbsp;Añadir Tarea</small>
            </button>


</div>

</template>

<script>
import axios from 'axios';

export default {
    props:['categories'],
    data: function(){
        return {
            checkedNames: [],
            item: {
                name: "",
                category_id: ""
            }

        }
    },
    methods:{
        addItem(cat){
            console.log($('#tareaInput').val());
            if(!$('#tareaInput').val()) {
                alert('El campo tarea no puede estar vacio');
            }

            if(!$('#categoriasinput').val()) {
                alert('Debe seleccionar almenos una categoría');
            }

            if($('#tareaInput').val() && $('#categoriasinput').val()) {

                if(this.item.name == ''){
                    return;
                }
                axios.post('api/item/store', {
                    name: this.item.name,
                    category_id: cat.toString()
                })
                .then (response => {
                    if(response.status == 201){
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Your work has been saved',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function(){
                            location.reload();
                        })
                        this.item.name == "";
                        this.item.category_id == "";

                    }
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
}



</script>


<style>


input{
    background-color: #f7f7f7;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 10%;
}

.active{
    color: #fff;
}
.inactive{
    color: #999999;
}

button.inactive:hover{
  cursor:not-allowed;
}
.plus{
    font-size: 20px;
}
</style>
