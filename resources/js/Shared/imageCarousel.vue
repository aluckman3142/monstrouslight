<template>
  <Carousel :wrap-around="true" :autoplay="3000" :pauseAutoplayOnHover="true">
    <Slide v-for="slide in slides" :key="slide">
        <div class=" overflow-hidden" >
<img class="w-full" :src="'/storage/'+slide.path"/>
        </div>

    </Slide>

    <template #addons>
        <div class="w-1/2 overflow-none">
        <Navigation/>
        </div>
      <Pagination />
    </template>
  </Carousel>
</template>

<script>
import { Carousel, Navigation, Pagination, Slide } from 'vue3-carousel';

import 'vue3-carousel/dist/carousel.css';

export default {
  props: {
        slides: Object,
    },
  components: {
    Carousel,
    Slide,
    Pagination,
    Navigation,
  },
};

</script>
