
<template>
    <div class="w-full bg-white border border-gray-300 mt-8 pb-4" aria-label="Sidebar">
        <div class="bg-primary w-full p-4 text-white font-bold uppercase">Hot Deals !</div>
        <carousel :slides="hotdeals"/>
	</div>
</template>
<script>
import carousel from "./ProductCarousel.vue";

export default {
    
    components: { carousel },
     computed: {
       hotdeals() {
            return this.$page.props.hotdeals;
        }
    }
};
</script>
