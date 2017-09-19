<template>
	<div>
		<h1>Detalle del Restaurant: {{id}}</h1>
			<div id="restaurante-detail" v-if="restaurant != null">
				<h2 v-text="restaurant.name"></h2>
				<p v-text="restaurant.description"></p>
			</div>
			<span v-else>Cargando Restaurante...</span>
	</div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'restaurant-detail',
  mounted(){

  	this.id = this.$route.params.id
		axios.get('http://localhost:8000/restaurants/' + this.id)
	  		.then((response) => {
	  			if(response.data.status == "Success"){
	  				this.restaurant = response.data.restaurant
	  			}
  		});
  },
  data () {
    return {
      texto: 'Pagina Contacto',
      id: null,
      restaurant: null
    }
  }
}
</script>