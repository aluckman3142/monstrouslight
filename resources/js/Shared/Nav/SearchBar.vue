<template>
    <form>
    <div class="flex rounded-full">
        <!-- <select
            class="text-sm p-3.5"
            placeholder="Select Category"
            v-model="searchCategory"
        >
            <option value="">Category</option>
            <option v-for="category in categories" :key="category" :value="category.id">{{category.title}}</option>
        </select> -->
        <div class="relative w-full">
            <input v-model="search" class="block p-3.5 w-full z-20 text-md text-white bg-white bg-opacity-10 rounded-full border border-gray-100" placeholder="Search" required>
            <Link as="button" class="absolute top-0 right-0 p-3.5 text-md font-medium text-white"><svg aria-hidden="true" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></Link>
        </div>
    </div>
</form>
<div class="bg-white absolute p-4 z-20 mt-4 rounded-lg" style="width:90%; left:5%" v-if="search">
<div class="flex flex-row">
    
    <Product class="w-1/4" v-for="product in searchPreviewProducts"  :key="product" :product="product"/>
</div>
<div class="flex flex-row justify-between mt-4">
    <p class="p-2 mt-4">
{{resultsCount}} Search results for {{search}} <span v-if="searchCategoryName">in {{searchCategoryName}}</span> 
<button class="rounded-full bg-primary text-white px-4 py-2 ml-10" @click="showResults">Show All Results</button>
</p>

<button @click="onClosePreview" class="p-2 mt-4 justify-end">close</button></div>
</div>
</template>

<script>
    import debounce from 'lodash.debounce';
    import Product from "../Product.vue";
    import { Inertia } from '@inertiajs/inertia';
    const axios = require('axios');
    export default {
        data () {
             return {
                search: this.filters.search,
                searchCategory: '',
                searchPreviewProducts: {},
                searchCategoryName: '',
                $resultsCount: 0
             }
        },
        components: { Product },
        methods: {
            onClosePreview() {
                this.search = ''
            },
            onSearchInput(){
                axios.get('/products/search', { 
                    params: {
                        search: this.search,
                        searchCategory: this.searchCategory
                    }
                 })
                    .then(response => {
                        console.log('SEARCH',response);
                       this.searchPreviewProducts = response.data.searchPreviewProducts
                       this.searchCategoryName = response.data.searchCategoryName
                       this.resultsCount = response.data.resultsCount
                })
            },
            showResults(){
                Inertia.get('/search-results', { searchCategory: this.searchCategory, search: this.search }, {
                 preserveState: true,
                 replace: true
             })
             this.search = ''
            }
        },
         props: {
            filters: Object,
        },
        computed: {
            categories() {
                return this.$page.props.categories;
            }
        },
        watch: {
            search() {
                this.debouncedWatch();
            },
            searchCategory() {
                this.debouncedWatch();
            },
        },
        created() {
        this.debouncedWatch = debounce(() => {
           this.onSearchInput()
          // console.log(this.search)
        }, 400)
     }
    }
</script>
