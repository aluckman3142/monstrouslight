<template>
  <div class="bg-gray-200">
    <div class="container mx-auto pb-8">
           <h2 class="text-3xl text-center font-thin pt-4 text-gray-500 uppercase">{{title}}</h2>  
           <div class="mx-auto h-1 w-28 bg-primary mt-2 mb-10"></div>
           <NewCarousel :products="products"></NewCarousel>
    </div>       
  </div>
</template>

<script>
import NewCarousel from "./NewCarousel.vue";

export default {
    data () {
        return {
       
        }
    },
  props: {
    title: String,
    products: Object
  },
  components: { NewCarousel },
  methods: {
  
  }
};

</script>
