<template>
	<h2>Esto es la {{texto}} : {{id_rest}}</h2>
</template>

<script>
export default {
  name: 'restaurante-top',
  mounted() {
  	this.id_rest = this.$route.params.id;
  },
  data () {
    return {
      texto: 'Pagina Restaurantes Destacado',
      id_rest: null
    }
  }
}
</script>