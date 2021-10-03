<template>
	<div>
		<h4 v-show="show">Welcome to Hacktober Fest</h4>
		<button @click="clickMe">Show Me</button>
		<button @click="clickMe">Hide Me</button>
	</div>
</template>

<script>
	export default {
		name: 'hacktoberfest',
		data: () => ({
			show: false
		}),
		methods: {
			clickMe() {
				this.show = true
			}
		}
	}
</script>

<style></style>
