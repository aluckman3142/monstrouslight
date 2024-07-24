<style scoped>
    .stripe-top{
    
    background: url('/img/slant.png') no-repeat;
    background-size: 100% 100%;

    height: 70px;

    width: 100%;

    position: relative;
    top: -77px;

}
    .stripe-bottom {
    
        background: url('/img/slantbottom.png') no-repeat;
        background-size: 100% 100%;
    
        height: 70px;
    
        width: 100%;
        position: relative;
    top: -77px;
    
    }
    </style>
    <template>
    <Head>
        <title>Category Name</title>
        <meta type="description" content="Category description" head-key="description">
    </Head>

        <div class="w-full h-80 inline-block bg-black bg-opacity-80 uppercase relative overflow-hidden font-bold ">
            <div  class="max-w-3xl mx-auto mt-44">
                <div v-if="subCategory" class="flex flex-row justify-between w-full">
                    <div class="text-white text-center p-2 z-20">{{category.title}}</div>
                    <div v-if="subCategory" class="text-white text-center  p-2  z-20">{{subCategory.title}}</div>
                    <div v-if="subSubCategory" class="text-white text-center  p-2  z-20">{{subSubCategory.title}}</div>
                </div>
            </div>
            <img :src="'/storage/'+category.image.path" class="w-full absolute left-0 -top-20  opacity-30 z-0 z-0">
            <div class="w-full absolute  text-white text-3xl  block text-center opacity-100 mb-4 text-white"
                :class="!subCategory ? 'top-20' : 'top-10'"
                ><img :src="'http://localhost:8000/storage/'+category.logo.path" class="h-24 my-2 inline-block" />
            </div>
        </div>
        <div class="stripe-top"></div>
        <div class="stripe-bottom"></div>

        <div class="max-w-lg mx-auto px-10 mb-10 text-center">
            <p v-if="subSubCategory">{{subSubCategory.long_desc}}</p>
            <p v-else-if="subCategory">{{subCategory.long_desc}}</p>
            <p v-else>{{category.long_desc}}</p>

        </div>

    <div class="w-full bg-gray-100 pb-20">
        <div class="container mx-auto flex justify-between pt-6 gap-8">
           <Filters
            :category = "category"
            @filterSubCategories="onFilterSubCategories"
            @filterSubSubCategories="onFilterSubSubCategories"
            @minPriceFilter="onFilterMinPrice"
            @maxPriceFilter="onFilterMaxPrice"
           />
            <div class="w-3/4">
                <p class="m-4"><span v-if="filteredProducts" class="font-bold">{{filteredProducts.length}}</span><span v-else class="font-bold">{{products.length}}</span> Results found for
                    <span v-if="subSubCategory">{{subSubCategory.title}}</span>
                    <span v-else-if="subCategory">{{subCategory.title}}</span>
                    <span v-else>{{category.title}}</span>
                    <span v-if="filterMinPrice !== 0"> | Min: £{{filterMinPrice}}</span>
                    <span v-if="filterMaxPrice !== 200"> | Max: £{{filterMaxPrice}}</span>
                </p>
                <div class="grid grid-cols-3 gap-4">
                    <Product v-if="filteredProducts" v-for="product in filteredProducts" :product="product"/>
                    <Product v-else v-for="product in products" :product="product"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Filters from "../Shared/Nav/Filters.vue";
import Product from "../Shared/Product.vue";
const axios = require('axios');

export default {
    data() {
        return {
            filteredProducts: '',
            filterSubCategories: [],
            filterSubSubCategories: [],
            filterMinPrice: 0,
            filterMaxPrice: 200,
            subCategories: [{
                'name': 'test'
            },{
                'name': 'test'
            }]
        }
    },
    components: { Product, Filters },
    props: {
        products: Object
    },
    methods: {
        onFilterSubCategories(value){
            this.filterSubCategories = value
            this.onFilter()
        },
        onFilterSubSubCategories(value){
            this.filterSubSubCategories = value
            this.onFilter()
        },
        onFilterMinPrice(value){
            this.filterMinPrice = value
            this.onFilter()
        },
        onFilterMaxPrice(value){
            this.filterMaxPrice = value
            this.onFilter()
        },
        onFilter(){
            axios.get('/products/filter', { 
                params: {
                    filterCategory: this.category.id,
                    filterSubCategory: this.subCategory ? this.subCategory.id : '',
                    filterSubCategories: this.filterSubCategories,
                    filterSubSubCategories: this.filterSubSubCategories,
                    filterMinPrice: this.filterMinPrice,
                    filterMaxPrice: this.filterMaxPrice
                },
                
                })
                .then(response => {
                    console.log('SEARCH',response);
                    this.filteredProducts = response.data.products
            })
        },
    },
    computed: {
        category() {
            return this.$page.props.category;
        },
        subCategory() {
            return this.$page.props.subCategory;
        },
        subSubCategory() {
            return this.$page.props.subSubCategory;
        },
    },
    mounted() {
        setTimeout(function () {
                window.scrollTo({
                top: 500,
                behavior: 'smooth',
                })
            },100);
    },
    watch: { 
        products() {
        //something happen on product load
        },

        category() {
          
        this.subCategories = this.category.sub_categories
       console.log(this.category.sub_categories)
       console.log(this.subCategories)
        }
    }
};
</script>
