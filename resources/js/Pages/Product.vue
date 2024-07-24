
    <template>
    <Head>
        <title>{{product.title}}</title>
        <meta type="description" content="Category description" head-key="description">
        
    </Head>
    <div class="w-full bg-gray-100 pb-20">
        <div class="container mx-auto flex justify-between pt-6 gap-4">
            
            <div class="w-2/3">
                <div class="bg-white">
                    <imageCarousel :slides="product.images" v-model="currentSlide"/>
                    <div class="grid grid-cols-5 gap-4 mt-6">
                        <img :key="index" v-for="(image, index) in product.images" :src="'/storage/'+image.path" class="w-full" @click="showImage(index)"/>
                    </div>
                </div>
            </div>
            <div class="w-1/3">
                <div class="bg-white p-4">
                    <h1 class="text-3xl font-bold m-2">{{product.title}}</h1>
                    <h2 class="text-2xl m-2">&pound;{{product.sell_price}}</h2>
                    <!-- <label for="quanitity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Quantity</label>
                    <select id="quantity" class="bg-gray-50 border border-gray-700 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <option value="1" selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    </select> -->
                    <div v-if="product.isInStock" class="bg-green-200 p-2 flex flex-row mt-4 w-1/3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                         <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> In Stock
                    </div>
                    <div v-else class="bg-red-200 p-2 flex flex-row mt-4 w-1/3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg> Out Of Stock
                    </div>
                    <div class="flex items-center my-5">
					<star-rating 
						:increment="0.5" 
						:star-size="30"
						 v-model:rating="product.rating" 
						 :show-rating="false"
					>
				</star-rating>
					<span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded  ml-3">{{product.rating}}</span>
				</div>
                    <Link :disabled="!product.isInStock" as="button" :href="'/cart/'+product.id" method="POST" :class=" product.isInStock ? 'bg-primary hover:bg-secondary hover:text-gray-800' : 'bg-gray-300'" class="text-white font-bold w-full text-cente mt-4 p-4 rounded-lg flex flex-row justify-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    Add To Basket</Link>
                    <div class="mt-4 addthis_inline_share_toolbox"></div> 
                </div>
                <div class="bg-white p-4 mt-4">
             
                    <h1 class="text-2xl font-bold mb-2">Key Features</h1>
                    <ul class="list-disc mx-4">
                        <li v-for="feature in features" class="py-2">{{feature}}</li>
                    </ul>
                </div>
               
            </div>
            
        </div>
        <div class="container mx-auto ">
            
            <div class="w-full">
                <div class="bg-white mt-4 p-4">
                    <div class="flex flex-row justify-between border-2 borger-gray-800 border-b-0 rounded-lg">
                        <button :class="this.activeTab === 'description' ? 'bg-gray-200': ''" class="text-center p-4 w-1/4 hover:bg-gray-200" @click="this.activeTab = 'description'">Product Description</button>
                        <button :class="this.activeTab === 'details' ? 'bg-gray-200': ''"  class="text-center p-4  w-1/4 hover:bg-gray-200"  @click="this.activeTab = 'details'">Product Details</button>
                        <button :class="this.activeTab === 'reviews' ? 'bg-gray-200': ''"  class="text-center p-4  w-1/4 hover:bg-gray-200 flex justify-start"  @click="this.activeTab = 'reviews'">Product Reviews ({{product.ratings.length}}) 
                            <star-rating 
						:increment="0.5" 
						:star-size="20"
						 v-model:rating="product.rating" 
						 :show-rating="false"
                         :read-only="true"
                         class="ml-2"
					>
				</star-rating>
            </button>
                        <button :class="this.activeTab === 'delivery' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/4 hover:bg-gray-200"  @click="this.activeTab = 'delivery'">Delivery &amp; Returns</button>
                    </div>
                    <div v-if="activeTab === 'description'">
                        <div class="p-4 ">
                          <p><pre class="font-sans" style="white-space: pre-wrap;">{{product.long_desc}}</pre></p>
                        </div>
                    </div>
                    <div v-if="activeTab === 'details'">
                        <div class="p-4">
                         <div class="flex flex-row justify-between" v-if="product.weight">
                            <p class="w-1/2">Weight:</p>
                            <p class="w-1/2">{{product.weight}}</p>
                         </div>
                         <div class="flex flex-row justify-between" v-if="product.height">
                            <p class="w-1/2">Height:</p>
                            <p class="w-1/2">{{product.height}}</p>
                         </div>
                         <div class="flex flex-row justify-between" v-if="product.width">
                            <p class="w-1/2">Width:</p>
                            <p class="w-1/2">{{product.width}}</p>
                         </div>
                         <div class="flex flex-row justify-between" v-if="product.length">
                            <p class="w-1/2">Length:</p>
                            <p class="w-1/2">{{product.length}}</p>
                         </div>
                         </div>
                    </div>
                    <div v-if="activeTab === 'reviews'">
                        <div class="p-4">
                        {{product.ratings}}
                        </div>
                    </div>
                    <div v-if="activeTab === 'delivery'">
                        <div class="p-4">
                         Delivery and returns Details here...
                         </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mx-auto ">
            <div class="w-full">
                <div class="bg-white mt-4 p-4">
                    <h2 class="text-2xl font-bold">Related Products</h2>
                    <div class="p-6 flex flex-row">
                    <Product v-for="product in related_products"  :key="product" :product="product"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- Go to www.addthis.com/dashboard to customize your tools -->


<script>
import imageCarousel from "../Shared/imageCarousel.vue";
import StarRating from 'vue-star-rating'
import Product from "../Shared/Product.vue";
import { Inertia } from '@inertiajs/inertia'

export default {
    data() {
        return {
        activeTab: 'description',
        currentSlide: 0
        }
    },
    components: { imageCarousel, Product, StarRating },
    
    props: {

    },
    computed: {
        product() {
            return this.$page.props.product;
        },
        related_products() {
            return this.$page.props.related_products;
        },
        features() {
            return this.$page.props.product.key_features.split(',');
        }
    },
    methods: {
        showImage(index){
            this.currentSlide = index
        },
        // updateProductRating(product){
        //     const params = product
        //     Inertia.post('/update-product-rating/'+product.id, product, {
        //     preserveScroll: true,
        //             preserveState: true,
        //             replace: true
        //         })
        // }
    },
    mounted() {
      let shareScript = document.createElement('script')
      shareScript.setAttribute('src', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6328abae101e1b79')
      document.head.appendChild(shareScript)
    },
};
</script>
