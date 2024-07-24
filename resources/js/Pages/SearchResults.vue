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
        <title>Search results</title>
        <meta type="description" content="Category description" head-key="description">
    </Head>

    <div class="h-112 overflow-hidden">
        <carousel :slides="slides"/>
        </div>
        <div class="relative" style="top:77px !important">
        <div class="stripe-bottom"></div>
    </div>

    <div class="w-full bg-gray-100 pb-20" ref="results">
        <div class="container mx-auto flex justify-between pt-6 gap-8">
   
                <Filters
                    :category="category"
                    @filterCategories="onFilterCategories"
                    @filterSubCategories="onFilterSubCategories"
                    @filterSubSubCategories="onFilterSubSubCategories"
                    @minPriceFilter="onFilterMinPrice"
                    @maxPriceFilter="onFilterMaxPrice"
                />
        
            <div class="w-3/4">
                <p class="m-4"><span v-if="filteredProducts" class="font-bold">{{filteredProducts.length}}</span><span v-else class="font-bold">{{products.length}}</span> Results found for
                    <span v-if="searchTerm">{{searchTerm}}</span>
                    <span v-if="searchCategoryName"> in {{searchCategoryName}}</span>
                </p>
                <div class="grid grid-cols-3 gap-4" >
                    <Product v-if="filteredProducts" v-for="product in filteredProducts" :product="product"/>
                    <Product v-else v-for="product in products" :product="product"/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Product from "../Shared/Product.vue";
import carousel from "../Shared/Carousel.vue";
import Filters from "../Shared/Nav/Filters.vue";
const axios = require('axios');

export default {
    data () {
        return {
            category: {},
         
            filteredProducts: '',
    //    filterSubCategories: [],
        //  filterSubSubCategories: [],
         filterMinPrice: 0,
         filterMaxPrice: 200,
            
        }
    },
   
    components: { carousel, Product, Filters },
    props: {
        slides: Object,
    },
    computed: {
        searchTerm() {
            return this.$page.props.searchTerm;
        },
        searchCategoryName() {
            return this.$page.props.searchCategoryName;
        },
        products() {
            return this.$page.props.products;
        },
    },
    methods: {
        onFilterCategories(value){
             this.filterCategories = value
            this.onFilter()
        },

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
            
            axios.get('/search-results/filter', { 
                params: {
                    searchTerm: this.searchTerm,
                    filterCategories: this.filterCategories,
                    filterSubCategories: this.filterSubCategories,
                    filterSubSubCategories: this.filterSubSubCategories,
                    filterMinPrice: this.filterMinPrice,
                    filterMaxPrice: this.filterMaxPrice
                },
                
                })
                .then(response => {
                    this.filteredProducts = response.data.products
            })
        },
    },
    watch: {
        products() {
        setTimeout(function () {
            window.scrollTo({
            top: 600,
            behavior: 'smooth',
            })
        },100);
        }
    }
};
</script>
