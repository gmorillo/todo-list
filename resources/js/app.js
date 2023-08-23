require('./bootstrap');

/*import {createApp} from 'vue'
import * as VueRouter from 'vue-router'

import ExampleComponent from './components/app.vue'
import AboutComponent from './components/AboutComponent.vue'

const routes = [
    {path: '/', component: ExampleComponent},
    {path: '/about', component: AboutComponent},
]

const router = VueRouter.createRouter({
    history: VueRouter.createWebHistory('/todo-list/public/'),
    routes,
})

const app = createApp({})

app.use(router)
app.component('todo-component', ExampleComponent)

app.mount('#app');*/



import {createApp} from 'vue';
import todoComponent from './vue/app'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlusSquare, faTrash } from '@fortawesome/free-solid-svg-icons'

library.add(faPlusSquare, faTrash)

const app = createApp({
    el: '#app',
    components: { todoComponent }
})


app.component('font-awesome-icon', FontAwesomeIcon);
app.mount('#app');



$( document ).ready(function() {
    $('.tarea').on('click', function(){
        console.log("clicked");
    })
})
