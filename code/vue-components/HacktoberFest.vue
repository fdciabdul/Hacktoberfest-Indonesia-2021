<template>
	<div>
		<h4 v-show="show">Welcome to Hacktober Fest</h4>
		<button @click="clickMe">Show Me</button>
		<button @click="hideMe">Hide Me</button>
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
			},
			hideMe() {
				this.show = false
			}
		}
	}
</script>

<style></style>
