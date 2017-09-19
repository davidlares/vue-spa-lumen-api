<template>
	<div id="restaurante-add">
		<h2>Crear Restaurante</h2>
		<form v-on:submit.prevent="addRest()">
			<p>
				<label>Nombre</label>
				<input type="text" v-model="restaurante.name" class="form-control">
			</p>
			<p>
				<label>Direccion</label>
				<input type="text" v-model="restaurante.address">
			</p>
			<p>
				<label>Descripcion</label>
				<textarea v-model="restaurante.description"></textarea>
			</p>
			<p>
				<input type="submit">
			</p>
		</form>
	</div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'restaurant-add',
  mounted(){
  },
  data () {
    return {
      texto: 'Crear Restaurante',
      restaurante: {
      	 name: '',
      	 address: '',
      	 description: '',
      	 precio: 'normal',
      	 image: ''
      }
    }
  },
  methods: {
  	addRest(){

  		var router = this.$router;

  		axios.post('http://localhost:8000/restaurants',{
  			name : this.restaurante.name,
  			address : this.restaurante.address,
  			price : this.restaurante.price,
  			description : this.restaurante.description,
  		})
  		.then((response) => {
  			console.log(response);
  			if(response.data.status == "Success"){
  				router.push('/restaurantes');
  			}
  		})
  		.catch((error) => {
  			console.log(error);
  		});
  	}
  }
}
</script>