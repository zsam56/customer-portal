<template>
	<div id="client">

		<!-- Top Container -->
		<div class="container">
			<div v-if="client">

				<div class="client-top-container col-9 no-padding">
					<!-- Heading -->
					<div class="client-heading-container">
						<div class="client-heading heading-underline">{{client.name}}</div>
					</div>

					<!-- Info -->
					<div class="client-info-container">
						<div class="info-left col-6 no-padding">
							<div class="info-container">
								<span class="info-label">Market: </span>
								<span class="info-entry">{{location.name}}</span>
							</div>
							<div class="info-container">
								<span class="info-label">Industry: </span>
								<span class="info-entry">{{client.industry}}</span>
							</div>
							<div class="info-container">
								<span class="info-label">Sub Industry: </span>
								<span class="info-entry">{{client.sub_industry}}</span>
							</div>

							<div class="info-container margin-top">
								<span class="info-label">Address: </span>
								<span class="info-entry">{{client.address}}</span>
							</div>
							<div class="info-container">
								<span class="info-label">Start Date: </span>
								<span class="info-entry">{{client.start_date}}</span> <span class="info-active">Active</span>
							</div>
							<div class="info-container">
								<span class="info-label">Last Update: </span>
								<span class="info-entry">{{client.last_update}}</span>
							</div>
						</div>

						<div class="info-right col-6 no-padding">
							<div class="info-container">
								<span class="info-label">Budget Tier: </span>
								<span class="info-entry">{{client.budget_tier}}</span>
							</div>
							<div class="info-container">
								<span class="info-label">Primary Product: </span>
								<span class="info-entry">Paid Search Marketing</span>
							</div>

							<div class="info-container margin-top">
								<span class="info-label">Account Executive: </span>
								<span class="info-entry">{{client.acct_exec}}</span>
							</div>
							<div class="info-container">
								<span class="info-label">Sales Manager: </span>
								<span class="info-entry">{{client.sales_manager}}</span>
							</div>
							<div class="info-container">
								<span class="info-label">Account Number: </span>
								<span class="info-entry">{{client.acct_num}}</span>
							</div>
						</div>
					</div>
				</div>

				<!-- Pie Chart -->
				<div class="client-chart-container">
					<pie></pie>
				</div>

				<!-- Performance Highlights -->
				<div class="client-highlights-container col-12 no-padding">
					<!-- Heading -->
					<div class="client-performance-heading-container">
						<div class="container-heading heading-underline">Performance Highlights</div>
					</div>

					<div class="highlights-inner-container col-12">
						<div class="performance-stat left col-6 no-padding">
							<div class="performance-num col-6 no-padding">{{client.left_stat_num}}</div>
							<div class="performance-info col-6">
								<p>{{client.left_stat_txt}}</p>
							</div>
						</div>

						<div class="performance-stat right col-6 no-padding">
							<div class="performance-num col-6 no-padding">{{client.right_stat_num}}</div>
							<div class="performance-info col-6">
								<p>{{client.right_stat_txt}}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Products Container -->
		<div v-if="client">
			<div class="client-products-container col-12 no-padding">
				<div class="container client-products-inner">
					<!-- Loop thru products list -->
		        	<div class="product-container"
			        	v-for="product in products"
			        	v-bind="product"
			        	:key="product.id">
						<img class="product-img">
						<div class="product-name">{{ product.name }}</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Collateral -->
		<div class="container">
			<div v-if="client">
				<div class="client-collateral-container">
					<!-- Heading -->
					<div class="client-heading-container">
						<div class="container-heading">Collateral</div>
					</div>

					<div class="collateral-content-container">
						<div class="collateral-content">
							<div class="collateral-video col-6">
								<img class="collat-video">
							</div>

							<div class="collateral-text-container col-6">
								<div class="collateral-text-inner">
									<div class="collateral-text-heading">Video Testimonial</div>
									<p class="collateral-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fringilla mi vel mauris vehicula, vitae tempor risus semper.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	function Product({id, name, img}) {
		this.id = id;
		this.name = name;
		this.img = img;
	}

    export default {
    	props: ['id'],

    	data() {
    		return {
    			client: null,
    			location: null,
    			products: [],
    		}
    	},
    	created() {
    		this.fetchData();
    	},

    	methods: {
    		//TODO: construct method that gets the exact data we need
    		fetchData() {

				//Get products
				window.axios.get('/api/products').then(({data}) => {
					data.forEach(product => {
						this.products.push(new Product(product));
					})
				});

				//Get client/location info
				let client_profile_url = "/api/client/" + this.id + '/profile';
				window.axios.get(client_profile_url)
				.then(response => {
					console.log(response);
					this.client = response.data.client;
					this.location = response.data.location;
				});

    		}
    	}
    }
</script>