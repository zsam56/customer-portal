/**
 * Load Vue dependencies
 */

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueCharts from 'vue-chartjs';
import {Bar, Line, Pie} from 'vue-chartjs';

Vue.use(VueRouter);

require('./bootstrap');

window.Vue = require('vue');

/**
 * Template dependencies
 */

import App from './components/App';
import Home from './components/Home';
import Search from './components/Search';
import Client from './components/Client';

/**
 * Setting up the VueRouter
 */

 const router = new VueRouter({
 	mode: 'history',
 	routes: [
 		{
 			path: '/',
 			name: 'home',
 			component: Home
 		},
 		{
 			path: '/search/location/:loc_id/industry/:ind_id/product/:prod_id',
 			name: 'search',
 			component: Search,
 			props: true
 		},
 		{
 			path: '/client/:id',
 			name: 'client',
 			component: Client,
 			props: true
 		}
 	]
 })

/**
 * Register Vue Components
 */
// Vue.component('home', require('./components/Home.vue'));
// Vue.component('app', require('./components/App.vue'));
Vue.component('client-carousel-object', require('./components/ClientCarouselObject.vue'));
Vue.component('spotlight', require('./components/Spotlight.vue'));

Vue.component('navigation', require('./components/Navigation.vue'));
Vue.component('pie', {
  extends: VueCharts.Pie,
  mounted () {
	this.renderChart({
		labels: ['Search Engine Optimization', 'Paid Search Advertising', 'Targeted Media', 'Social Media Marketing', "Display Advertsing"],
		datasets: [
			{
				backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f", "#204970", "#ff9101"],
				data: [10, 20, 30, 14, 21],
			}
		],
	}, 
	{
		responsive: true, 
		title: {
			display: true,
			text: 'Product Portfolio Mix',
			fontSize: 16,
			fontStyle: 'normal',
			fontColor: '#204970'
		},
		legend: {
			position: 'bottom',
			labels: {
				boxWidth: 20,
				fontSize: 10,
			}
		},

	})
	}
  
});


const app = new Vue({
    el: '#app',
    components: {App},
    router,
});
