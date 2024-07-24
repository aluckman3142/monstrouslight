<template>
   <Carousel :wrap-around="true" :autoplay="3000" :pauseAutoplayOnHover="true">
     <Slide v-for="slide in slides" :key="slide">

<img :src="'../storage/'+slide.path"/>

    </Slide>
  </Carousel>
</template>

<script>
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';

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
},
};

</script>
