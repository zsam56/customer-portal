<!-- Spotlight section on the homepage -->
<template>
	<div id="spotlight">
		<div>
			<div class="container-heading col-12">Spotlight</div>
			<client-carousel-object
	        	v-for="client in clients"
	        	v-bind="client"
	        	:key="client.id"
	        	:name="client.name"
	        ></client-carousel-object>
		</div>
	</div>
</template>

<script>
	function Client({id, name}) {
		this.id = id;
		this.name = name;
	}

	import ClientCarouselObject from './ClientCarouselObject';

	export default {
		data() {
			return {
				clients: []
			}
		},
		methods: {
			create() {
				window.axios.get('/api/cruds/create').then(({ data }) => {
				  this.clients.push(new Client(data));
				});
			},
			read() {
				window.axios.get('/api/clients').then(({data}) => {
					data.forEach(client => {
						this.clients.push(new Client(client));
					})
				});
			}
		},
		components: {
			ClientCarouselObject
		},
		created() {
			this.read();
		}
	}
</script>