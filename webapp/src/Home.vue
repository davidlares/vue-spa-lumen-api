<template>
	<div>
		<h2>Esto es la {{texto}}</h2>
		<h3> Próximamente </h3>
	</div>
</template>

<script>
export default {
  name: 'home',
  data () {
    return {
      texto: 'Pagina principal'
    }
  }
}
</script>