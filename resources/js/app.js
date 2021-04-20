require('./bootstrap');

import Vue from "vue";

const app = new Vue({
    el: "#root",
    data: {
        products: [],
        visibility: 'hidden',
        faceSectionVisibility: 'hidden',
        eyesSectionVisibility: 'hidden',
        lipsSectionVisibility: 'hidden',
        nailsSectionVisibility: 'hidden',
    },
    methods: {
        toggleMenu() {
            if (this.visibility === 'hidden') {
                this.visibility = 'visible';
            } else {
                this.visibility = 'hidden';
            }
        },
        faceMenu() {
            if (this.faceSectionVisibility === 'hidden') {
                this.faceSectionVisibility = 'visible';
            } else {
                this.faceSectionVisibility = 'hidden';
            }
        },
        eyesMenu() {
            if (this.eyesSectionVisibility === 'hidden') {
                this.eyesSectionVisibility = 'visible';
            } else {
                this.eyesSectionVisibility = 'hidden';
            }
        },
        lipsMenu() {
            if (this.lipsSectionVisibility === 'hidden') {
                this.lipsSectionVisibility = 'visible';
            } else {
                this.lipsSectionVisibility = 'hidden';
            }
        },
        nailsMenu() {
            if (this.nailsSectionVisibility === 'hidden') {
                this.nailsSectionVisibility = 'visible';
            } else {
                this.nailsSectionVisibility = 'hidden';
            }
        }
    },
    mounted() {
        axios.get('http://localhost:8000/api/products')
            .then((response) => {
                this.products = response.data.results;
            })
    }
});
