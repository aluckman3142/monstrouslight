<style scoped>
.carousel__pagination {

    background: url('/img/slant.png') no-repeat;
    background-size: 100% 100%;

    height: 70px;

    width: 100%;
    position: relative;
    top: -70px;
}
</style>
<template>
  <Carousel :wrap-around="true" :autoplay="3000" :pauseAutoplayOnHover="true">
    <Slide v-for="slide in slides" :key="slide">
        <div class="mx-auto w-full px-16  absolute block h-full bg-black bg-opacity-40 font-bold text-white">
            <div class="flex flex-row">
            <div class="w-1/2 py-36">
                <div class="w-96 mx-auto">
                    <img v-if="slide.logo" class="w-full mb-2" :src="'storage/'+slide.logo.path"/>
                    <p class="text-xl mx-4 mb-2 max-w-md mx-auto text-center">{{slide.text}}</p>
                    <button class="bg-primary mx-4 p-4 text-white text-sm uppercase text-center rounded-xl" :href="slide.button_path">{{slide.button_text}}</button>
                </div>
            </div>
            <div class="w-1/2 py-12">
                <div class="w-96 mx-auto">
                    <img v-if="slide.product" class="w-full mb-2" :src="'storage/'+slide.product.path"/>
                </div>
            </div>
            </div>
        </div>
        <div class="h-112 overflow-hidden" >
<img class="w-full" :src="'storage/'+slide.image.path"/>
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
