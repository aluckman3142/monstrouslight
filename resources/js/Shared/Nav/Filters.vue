<template>
    <div class="w-1/4">
        <p class="bg-primary w-full text-white font-bold p-4">FILTER PRODUCTS</p>
        <div class="bg-white">
            <li class="toggleable text-gray-800 font-bold list-none" v-if="!category.title">
                <input type="checkbox" value="selected" id="toggle-cat" class="toggle-input">
                    <label for="toggle-cat" class="block cursor-pointer p-3 text-md">
                        Categories
                    </label>
                <div role="toggle" class="p-2 mega-menu mb-4">
                    <div class="container mx-auto w-full flex flex-wrap justify-between mx-2">
                        <div class="flex items-center px-4 py-2 w-full" v-for="category in categories">
                            <label>
                                <input v-model="filterCategories" type="checkbox" :value="category.title" class="accent-primary w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <span class="ml-2 text-sm font-medium text-gray-900">{{category.title}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </li>

            <li class="toggleable text-gray-800 font-bold list-none" v-if="subCategories">
                <input type="checkbox" value="selected" id="toggle-sub-cat" class="toggle-input">
                    <label for="toggle-sub-cat" class="block cursor-pointer p-3 text-md">
                        Sub Categories
                    </label>
                   
                <div role="toggle" class="p-2 mega-menu mb-4">
                    <div class="container mx-auto w-full flex flex-wrap justify-between mx-2">
                        <div class="flex items-center px-4 py-2 w-full" v-for="subCategory in subCategories">
                            <label>
                                <input v-model="filterSubCategories" type="checkbox" :value="subCategory.title" class="accent-primary w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <span class="ml-2 text-sm font-medium text-gray-900">{{subCategory.title}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </li>
           
            <li class="toggleable text-gray-800 font-bold list-none" v-if="category.sub_categories">
                <input type="checkbox" value="selected" id="toggle-sub-cat" class="toggle-input">
                    <label for="toggle-sub-cat" class="block cursor-pointer p-3 text-md">
                        Sub Categories
                    </label>
                   
                <div role="toggle" class="p-2 mega-menu mb-4">
                    <div class="container mx-auto w-full flex flex-wrap justify-between mx-2">
                        <div class="flex items-center px-4 py-2 w-full" v-for="subCategory in category.sub_categories">
                            <label>
                                <input v-model="filterSubCategories" type="checkbox" :value="subCategory.title" class="accent-primary w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <span class="ml-2 text-sm font-medium text-gray-900">{{subCategory.title}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </li>

            <li class="toggleable text-gray-800 font-bold list-none" v-if="subSubCategories">
                <input type="checkbox" value="selected" id="toggle-sub-sub-cat" class="toggle-input">
                    <label for="toggle-sub-sub-cat" class="block cursor-pointer p-3 text-md">
                        Sub Sub Categories
                    </label>
                   
                <div role="toggle" class="p-2 mega-menu mb-4">
                    <div class="container mx-auto w-full flex flex-wrap justify-between mx-2">
                        <div class="flex items-center px-4 py-2 w-full" v-for="subSubCategory in subSubCategories">
                            <label>
                                <input v-model="filterSubSubCategories" type="checkbox" :value="subSubCategory.title" class="accent-primary w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                                <span class="ml-2 text-sm font-medium text-gray-900">{{subSubCategory.title}}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </li>
            
            
           
            <div class="p-4">        
                <label for="min-price" class="block mb-2 text-lg font-bold text-gray-800">Min Price (£{{minPriceFilter}})</label>
                <input v-model="minPriceFilter" id="min-price" type="range" min="1" max="200" class="w-full h-2 bg-secondary accent-primary rounded-lg appearance-none cursor-pointer">
            </div>
            <div class="p-4">        
                <label for="max-price" class="block mb-2 text-lg font-bold text-gray-800">Max Price (£{{maxPriceFilter}})</label>
                <input v-model="maxPriceFilter" id="max-price" type="range" min="1" max="200" class="w-full h-2 bg-secondary rounded-lg appearance-none cursor-pointer">
            </div>
        </div>
    </div>
</template>

<script>
import { throwStatement } from '@babel/types';
import debounce from 'lodash.debounce'
const axios = require('axios');

    export default {
        data() {
            return {
                filterCategories: [], 
                filterSubCategories: [], 
                filterSubSubCategories: [], 
                minPriceFilter: 1,
                maxPriceFilter: 200,
                subCategories: null,
                subSubCategories: null,
            }
        },   
       props: {
        category: {
            type: Object,
            required: false,
            nullable: true,
        },
       },
       watch: {
        
            filterCategories() {
                 this.debouncedCategories();     
            },
            filterSubCategories() {
                 this.debouncedSubCategories();     
            },
            filterSubSubCategories() {
                 this.debouncedSubSubCategories();     
            },
            minPriceFilter(){
                this.debouncedMinPrice();     
            },
            maxPriceFilter(){
                this.debouncedMaxPrice();     
            }
       },
       created() {
        this.debouncedCategories = debounce(() => {
            
            axios.get('/categories/get-sub-categories', { 
                params: {
                    categories: this.filterCategories
                },
                
                })
                .then(response => {
                   
                    this.subCategories = response.data.subCategories
                })
        
             this.$emit('filterCategories', this.filterCategories)
            
        }, 500)
        this.debouncedSubCategories = debounce(() => {
            axios.get('/sub-categories/get-sub-sub-categories', { 
                params: {
                    subCategories: this.filterSubCategories
                },
                
                })
                .then(response => {
                   
                    this.subSubCategories = response.data.subSubCategories
                })
            this.$emit('filterSubCategories', this.filterSubCategories)
        }, 500)
        this.debouncedSubSubCategories = debounce(() => {
            this.$emit('filterSubSubCategories', this.filterSubSubCategories)
        }, 500)
        this.debouncedMinPrice = debounce(() => {
            this.$emit('minPriceFilter', this.minPriceFilter)
            console.log('minPriceFilter', this.minPriceFilter)
        }, 500)
        this.debouncedMaxPrice = debounce(() => {
            this.$emit('maxPriceFilter', this.maxPriceFilter)
            console.log('maxPriceFilter', this.maxPriceFilter)
        }, 500)
     },
     computed: {
        categories() {
            return this.$page.props.categories;
        }
     }
    };
    </script>