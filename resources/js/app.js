require('./bootstrap');

import Vue from "vue";

const app = new Vue({
    el: "#root",
    data: {
        products: [],
    },
    methods: {

    },
    mounted() {
        axios.get('http://localhost:8000/api/products')
            .then((response) => {
                this.products = response.data.results;
            })
    }
});
