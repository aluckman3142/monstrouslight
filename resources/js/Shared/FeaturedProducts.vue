<template>

  <div class="bg-gray-300 rounded-lg mt-8 relative">
                     
                      <div class="py-3 px-6 border-b border-gray-300 uppercase font-bold flex pr-4 bg-purple-600">
          <div class="w-1/2 align-middle">
        <h2 class="text-white text-lg py-1">Featured Products</h2>
        </div>
    
      </div>
      <div class="p-6 flex flex-row">
         
        <FesturedCarousel :products="products"></FesturedCarousel>
      
        </div>
        </div>
  
  
  
  </template>
  
  <script>
  import Product from "../Shared/Product.vue";
import FesturedCarousel from "./FesturedCarousel.vue";
  
  export default {
      data () {
          return {
         
          }
      },
    props: {
      products: Object
    },
    components: { Product, FesturedCarousel },
    methods: {
    
    }
  };
  
  </script>
  