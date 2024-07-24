<template>
	<div class="w-full mx-2">
		<div class="relative bg-white shadow-md rounded-lg max-w-sm border-2 border-solid border-gray-200">
			<a :href="'/product/'+product.slug">
				<img class="px-12 py-4 w-full"
				v-if="product.images[0]"
					:src="'/storage/'+product.images[0].path"
                    alt="Monstrous Light Games"

                />
        	</a>
			<div class="absolute left-0 top-4 flex flex-row w-full justify-end px-4">
				<Link as="button"  @click="addToWishlist(product)" class="rounded-full bg-primary text-white  p-2 justify-end hover:bg-secondary hover:text-gray-800">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
						<path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
					</svg>
				</Link>	
			</div>
			<div class="px-4 pb-5">
				<a :href="'/product/'+product.slug" class="h-16 block text-gray-500 font-thin text-center mb-2 w-full">
					<h3 class="text-lg px-2 pb-2">{{product.title}}</h3>
				</a>

				<span class="text-xl font-bold text-gray-500 text-center block">£{{product.sell_price}}</span>
					
				
				<div class="flex flex-row justify-center mt-2.5 mb-5 w-full">
					<star-rating 
						:increment="0.5" 
						:star-size="30"
						 v-model:rating="product.rating" 
						 :show-rating="false"
						 :read-only="true"
					>
				</star-rating>
					</div>
					<div class="flex flex-row justify-center mt-2.5 mb-5 w-full">
				<Link as="button" :href="'/cart/'+product.id" method="POST" v-if="!product.isInStock" class="border border-primary test-primary rounded-full px-4 py-2 hover:bg-primary hover:text-white">Add to Cart</Link>
				<button  v-else disabled="true" class="border border-red-500 text-red-500 rounded-full px-4 py-2">Out of Stock</button>
				</div>
				
			</div>
		</div>
	</div>
</template>

<script>
import StarRating from 'vue-star-rating'
import { Inertia } from '@inertiajs/inertia'

export default {
    data () {
        return {
       
        }
    },
   props: {
     product: Object
   },
   components: {
  StarRating
},

  methods: {
	addToWishlist(product){
		Inertia.post('/add-to-wishlist/'+product.id, product, {
           preserveScroll: true,
                preserveState: true,
                   replace: true
                })
  	}
  },
  
};
</script>
