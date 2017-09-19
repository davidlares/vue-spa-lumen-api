<template>
	<div id="restaurante-edit">
		<h2>Editar Restaurante</h2>
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
  name: 'restaurant-edit',
  mounted(){

    this.id = this.$route.params.id
    axios.get('http://localhost:8000/restaurants/' + this.id)
        .then((response) => {
          if(response.data.status == "Success"){
            this.restaurante = response.data.restaurant
          }
      });

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
      var id = this.id
      
  		axios.put('http://localhost:8000/restaurants/' + id,{
  			name : this.restaurante.name,
  			address : this.restaurante.address,
  			price : this.restaurante.price,
  			description : this.restaurante.description,
  		})
  		.then((response) => {
  			console.log(response);
  			if(response.data.status == "Success"){
  				router.push('/restaurante/' + id);
  			}
  		})
  		.catch((error) => {
  			console.log(error);
  		});
  	}
  }
}
</script>