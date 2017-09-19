<template>
	<div>
		<h2>Esto es la {{texto}}</h2>
			
			<ul id="restaurante-list" v-if="restaurantes != null">
				<li v-for="restaurant in restaurantes">
					<strong>{{restaurant.name}}</strong>
					<p>
						<router-link :to="{name: 'restaurante', params: {id: restaurant.id }}" class="space">
							Ver
						</router-link>
						<router-link :to="{name: 'editar-restaurante', params: {id: restaurant.id }}" class="space">
							Editar
						</router-link>
						<span v-if="showBorrar != restaurant.id" class="space">
							<a @click="borrarRest(restaurant.id)">Eliminar</a>
						</span>
						<span v-else>
							<p>¿Estás seguro de querer borrarlo?</p>
							<div style="margin-top: -13px">
								<button @click="cancelarBorrado()">Cancelar</button>
								<button @click="confirmarBorrado(restaurant.id)">Borrar</button>
							</div>
						</span>
					</p>
				</li>
			</ul>
			<span v-else>Cargando Restaurantes...</span>
	</div>
</template>

<script>
import axios from 'axios';

export default {
  name: 'restaurantes-list',
  mounted() {
  	this.getRestaurantes()
  },
  data () {
    return {
      texto: 'Listado de Restaurantes',
      restaurantes: null,
      showBorrar: null
    }
  },
  methods: {
  	 getRestaurantes() {
  	 	axios.get('http://localhost:8000/restaurants')
  	 		.then((response) => {
  	 			if(response.data.status == "Success"){
  	 				this.restaurantes = response.data.restaurants
  	 			}
  	 		});
  	 	},
  	 	borrarRest(id){
  	 		this.showBorrar = id;
		},
		cancelarBorrado(){
			this.showBorrar = null
		},
		confirmarBorrado(id){
			 axios.delete('http://localhost:8000/restaurants/' + id)
		        .then((response) => {
		          if(response.data.status == "Success"){
		          	this.showBorrar = null;
		          	this.getRestaurantes();
		          }
		      });
		}
  }
}
</script>

<style lang="scss">

	#restaurante-list {
		padding: 5px;
		li {
			margin-top: 10px;
			width: 30%;
			height: 120px;
			border: 1px solid #ddd;
			background: #eee;
			padding: 20px;
			overflow: hidden;
		}

		.space {
			margin-left: 10px;
			text-decoration: none;
			cursor: pointer;
		}
	}

</style>