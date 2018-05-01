<template>
    <div id="search">
        <div class="container">
            <h1>Search page</h1>

            <div class="container">
                <div v-for="client in clients">
                    {{client.name}}
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        props: ['loc_id', 'ind_id', 'prod_id'],

        data() {
            return {
                location: null,
                error: null,
                clients: []
            };
        },
        created() {
            this.read();
        },

        methods: {
            read() { //Grab clients
                let loc_str, ind_str, prod_str = '';

                //Create URL
                if (this.loc_id != 0) {
                    loc_str = 'location/' + this.loc_id;
                } else {
                    loc_str = 'location/undefined'
                }

                if (this.ind_id != 0) {
                    ind_str = 'industry/' + this.ind_id;
                } else {
                    ind_str = 'industry/undefined';
                }

                if (this.prod_str != 0) {
                    prod_str = 'product/' + this.prod_id;
                } else {
                    prod_str = 'product/undefined';
                }

                let search_url = "/api/search/location/" + this.loc_id + "/industry/" + this.ind_id + "/product/" + this.prod_id;
                window.axios.get(search_url).then(({data}) => {
                    data.forEach(client => {
                        console.log(client.name);
                        this.clients.push(client);
                    })
                });
            }
        }
    }
</script>