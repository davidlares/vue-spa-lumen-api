import Vue from 'vue'
import VueRouter from 'vue-router'		// hacemos un llamado a la router
import App from './App.vue'
import Home from './Home.vue'

import RestaurantesList from './RestaurantesList.vue'
import Restaurante from './Restaurante.vue'
import RestauranteAdd from './RestauranteAdd.vue'
import RestauranteEdit from './RestauranteEdit.vue'


Vue.use(VueRouter); // cargamos la libreria

// asignacion de rutas (dentro de la SPA)
const routes = [
	{path: '/', component: Home},
	{path: '/home', component: Home},
	{path: '/crear-restaurante', name: 'crear-restaurante', component: RestauranteAdd},
	{path: '/restaurante/:id', name: 'restaurante', component: Restaurante},
	{path: '/editar-restaurante/:id', name: 'editar-restaurante', component: RestauranteEdit},
	{path: '/restaurantes', component: RestaurantesList}
];

// cargamos el router hacia una instancia del mismo

const router = new VueRouter({
	routes, mode: 'history' // este history, permite la navegacion mas optimizada
});
	

Vue.component('home',Home); // insertamos el Home dentro de App

new Vue({
  el: '#app',
  router,	// esta es instancia del objeto 
  render: h => h(App)
})
