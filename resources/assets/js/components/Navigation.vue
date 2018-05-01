<!-- Top Navigation bar -->
<template>
	<div class="row nav-bar">
		<div class="nav-container col-12">
			<!-- Nav Bar Left -->
			<div class="nav-bar-left col-4">
				Logo
			</div>

			<!-- Nav Bar Right -->
			<div class="nav-bar-right col6">
				<!-- Locations dropdown -->
				<div class="locations-dropdown">
					<select v-model="selected_location">
						<option selected disabled>Market</option>
						<option v-for="option in location_options" v-bind:value="option.id">
							{{option.name}}
						</option>
					</select>
				</div>
				<!-- Industry dropdown -->
				<div class="industry-dropdown">
					<select v-model="selected_industry">
						<option selected disabled>Industry</option>
						<option v-for="option in industry_options" v-bind:value="option.id">
							{{option.name}}
						</option>
					</select>
				</div>
				<!-- Products dropdown -->
				<div class="products-dropdown">
					<select v-model="selected_product">
						<option selected disabled>Product</option>
						<option v-for="option in product_options" v-bind:value="option.id">
							{{option.name}}
						</option>
					</select>
				</div>

				<button class="search-btn" v-on:click="search" >Search</button>
			</div>
		</div>
	</div>
</template>

<script>

	export default {
		data() {

			return {
				location_options: [],
				industry_options: [],
				product_options: [],

				selected_location: 0,
				selected_industry: 0,
				selected_product: 0,
			}
		},
		methods: {
			read() {
				window.axios.get('/api/locations').then(({data}) => {
					data.forEach(location => {
						let option_obj = {id: location.id, name: location.name};
						this.location_options.push(option_obj);
					})
				});
				window.axios.get('/api/industries').then(({data}) => {
					data.forEach(industry => {
						let option_obj = {id: industry.id, name: industry.name};
						this.industry_options.push(option_obj);
					})
				});
				window.axios.get('/api/products').then(({data}) => {
					data.forEach(product => {
						let option_obj = {id: product.id, name: product.name};
						this.product_options.push(option_obj);
					})
				});
			},

			home() {
				this.$router.push('/');
			},

			search() {
				this.$router.push(
					{
						name: 'search',
						params: {loc_id: this.selected_location,
						 ind_id: this.selected_industry,
						 prod_id: this.selected_product
						}
					}
				);
			},

			client() {
				this.$router.push('client', {
					params: {id: 1}
				});
			}
		},
		created() {
			this.read();
		}
	}
</script>