<template>
   <Carousel :itemsToShow="4" :wrap-around="true" :autoplay="3000" :pauseAutoplayOnHover="true" class="w-full">
    <Slide v-for="product in products" :key="product">
       <Product :product="product"/>
    </Slide>

    <template #addons>
        <div class="w-1/2 overflow-none">
        <Navigation />
        </div>
      <Pagination />
    </template>
  </Carousel>
</template>


<script>
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';
import Product from './Product.vue';


export default {
  props: {
    products: Object,
},
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
    Product,
},
};

</script>
