<template>
   <Carousel :wrap-around="true" :autoplay="3000" :pauseAutoplayOnHover="true">
     <Slide v-for="slide in slides" :key="slide">
      <Product :key="slide.id" :product="slide"/>
    </Slide>

    <template #addons>
        <div class="w-1/2 overflow-none">
        <Navigation />
        </div>
      <Pagination />
    </template>
  </Carousel>
</template>

<!-- <template v-for="(prod, index) in products">
  <div class="w-full md:w-1/3 lg:w-1/4 xl:w-1/4 mb-8 px-2" 
        v-if="(index % 18 == 0) && index != 0" 
        :key="'promotion-${index}'">
    <promotion></promotion>
  </div>
  <div class="w-full md:w-1/3 lg:w-1/4 xl:w-1/4 mb-8 px-2" 
      :key="'product-${index}'">
    <product-card :product="prod"></product-card>
  </div>
</template> -->


<script>
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';
import Product from "../Shared/Product.vue";

import 'vue3-carousel/dist/carousel.css';
import ProductSlide from './ProductSlide.vue';


export default {
  props: {
    slides: Object,
},
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
    ProductSlide,
    Product,
},
};

</script>
