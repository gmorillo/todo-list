<template>
    <div class="item" :class="[item.completed ? 'bg-success text-white' : '']">
        <input
            type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
            :class="[item.completed ? 'invisible' : '']"
        />
        <span id="tarea"   :class="[item.completed ? 'completed text-white ' : '', 'itemText tarea']">{{ item.name }}</span>
        <span style="width: 33%; text-align: center;"><small>{{ item.category_id }}</small>
        </span>
        <button @click="removeItem()" class="trashcan" :class="[item.completed ? 'text-white' : '']">
            <font-awesome-icon icon="trash" />
        </button>
    </div>



</template>

<script>

import axios from 'axios';
import swal from 'sweetalert2';
window.Swal = swal;


export default {
    props:['item'],
    methods:{
        updateCheck(){

            Swal.fire({
                title: 'Desea cerrar esta tarea?',
                text: "Si cierras esta tarea no podrás abrirla nuevamente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, Cerrar Tarea'
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios.put('api/item/' + this.item.id, {
                            item: this.item
                        })
                        .then ( response => {
                            if( response.status == 200){
                                location.reload();
                                this.$emit('itemchanged');
                            }
                        })
                        .catch( error => {
                            console.log(error);
                        })
                        Swal.fire(
                        'Tarea cerrada correctamente!',
                        )
                    }else{
                        location.reload();
                    }
                })


        },
        removeItem(){

            Swal.fire({
                title: 'Desea eliminar esta tarea?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete('api/item/' + this.item.id)
                    .then(response => {
                        if(response.status == 200){
                            location.reload();
                            //this.$emit('itemchanged');
                        }
                    })
                    .catch( error => {
                        console.log(error);
                    })
                }else{
                    location.reload();
                }
            })
        },
        notification(){

        }

    }
}
</script>

<style scoped>
.completed{
    text-decoration: line-through;
    color: #999999;
}
.itemText{
    width: 100%;
}
.item{
    display: flex;
    justify-content: center;
    align-items: center;
}
.trashcan{
    background: transparent;
    border: none;
    color: #ff0000;
    outline: none;
    width: 10%;
}
</style>
