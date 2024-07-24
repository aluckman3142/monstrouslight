<template>
    <Head>
        <title>Products</title>
        <meta type="description" content="Dashboard description" head-key="description">
    </Head>
     <div class="w-full min-h-screen bg-gray-100 relative max-w-6xl">
        <div class="h-56 w-full bg-gradient-to-r from-purple-500 to-green-600">
            <div class="flex flex-row justify-between p-8">
                <div>
                    <div class="relative w-full flex flex-row">
                        <svg aria-hidden="true" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input v-model="search" type="text" id="search-dropdown" class="ml-4 block w-full z-20 text-sm text-white placeholder-white bg-transparent focus:ring-white" placeholder="Search Products..." required="">
                    </div>
                </div>
                <AdminTopNav></AdminTopNav>
            </div>
            <div class="flex flex-row justify-between p-8">
                <div class="flex flex-row justify-between gap-6 text-white">
                    <h2 class="text-4xl font-thin">Products</h2>
                    <svg @click="addNewProduct()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3 hover:text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg @click="importProducts()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3 hover:text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg>
                    <div class="mt-3">
                        <label for="orange-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                    <input type="checkbox" v-model="showDeleted" id="orange-toggle" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    <span class="ml-3">Show Deleted</span>
                    </label>
                    </div>


                </div>
                <div>
                    <BreadCrumbs :pageName="'Products'"/>
                </div>
            </div>
        </div>
        <div class="mx-8 bg-white relative -top-8 rounded-sm p-8">
            This is where you can add and manage products across the store. Set stock labels, manage stock, and update product descriptions and images. Click on the 
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg> icon above to add a new product, or the  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v6m3-3H9m4.06-7.19l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                    </svg> icon to import a new product sheet.




    <table class="w-full text-sm text-left text-gray-500 mt-8">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="py-3 px-4">
                    Product name
                </th>
                <th scope="col" class="py-3 px-4">
                    Product Code
                </th>
                <th scope="col" class="py-3 px-4">
                    Category
                </th>
                <th scope="col" class="py-3 px-4">
                    Sub Category
                </th>
                <th scope="col" class="py-3 px-4">
                    Sub Sub Categories
                </th>
                <th scope="col" class="py-3 px-4">
                    Enabled
                </th>
                <th scope="col" class="py-3 px-4">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b" v-for="product in products" :key="product.id" :class="product.enabled == false ? 'bg-red-300' : ''">
                <th scope="row" class="py-4 px-4 font-medium text-gray-900 whitespace-nowrap">
                    {{product.title}}
                </th>
                <td class="py-4 px-4">
                    {{product.product_code}}
                </td>
                <td class="py-4 px-4">
                    {{product.category.title}}
                </td>
                <td class="py-4 px-4">
                    {{product.sub_category.title}}
                </td>
                <td class="py-4 px-4">
                    <div v-for="subSubCat in product.sub_sub_categories">{{subSubCat.title}}, </div>
                </td>
                <td class="py-4 px-4">
                    <label :for="product.id+'-toggle'" class="inline-flex relative items-center mr-5 cursor-pointer">
                    <input type="checkbox" v-model="product.enabled" :value="product.enabled" :id="product.id+'-toggle'" class="sr-only peer" @input="changeStatus(product.id)">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </label>
                </td>
                <td class="py-4 px-4 flex flex-row mt-2">
                    <button @click="editProduct(product)" class="font-medium text-blue-600 hover:text-red-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <button v-if="!showDeleted" @click="deleteProduct(product)" class="font-medium text-blue-600 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>

                    </button>
                    <button v-else @click="restoreProduct(product)" class="font-medium text-blue-600 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />
                            </svg>

                    </button>
                    <button v-if="showDeleted" @click="destroyProduct(product)" class="font-medium text-blue-600 hover:text-red-500 ml-2">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>



        </div>
        
        <transition name="fade" appear>
            <div class="absolute top-0 left-0 right-0 bottom-0 z-[99] w-full bg-gray-800 bg-opacity-50" v-if="showAddModal" @click="showAddModal = false">
            </div>
        </transition>
        <transition name="slide" appear>
            <div class="absolute top-0 left-0 right-0 bottom-0 w-full z-[100] h-screen p-8" v-if="showAddModal">
                <div class="bg-white h-full rounded-lg">
                <ProductForm
                    :formTitle="formTitle"
                    :product="product"
                    :previewUrl="previewUrl"
                    @product-added="submitProduct"
                    @close="close"
                /> 
            </div>
            </div>
        </transition>
        <ProductImportForm
            :showImportForm="showImportForm"
            :formTitle="formTitle"
            @products-imported="productsImported"
            @close="close"
        />
        <DeleteProduct
         :showDeleteForm="showDeleteForm"
         :product="product"
         @delete-product="submitDeleteProduct"
         @close="close"
        />
       
                <div class="absolute right-0 top-0 mr-4 fade-in" v-if="showNotification">
                <Notification v-for="error in errors" :key="error" :error="error"/>
                <Message v-if="message" :message="message"/>
                </div>



<div class="my-10">
    <Link v-for="link in links" :key="link" class="p-4 rounded-lg m-2 bg-gray-200" :href="link.url">
        <span v-if="link.label === '&amp;laquo; Previous'">Prev</span>
        <span v-else-if="link.label === 'Next &amp;raquo;'">Next</span>
        <span v-else>{{link.label}}</span>
    </Link>
</div>
   </div> 
</template>

<script>
import Admin from '../../Shared/Layouts/Admin.vue'
import Notification from '../../Shared/Notification.vue'
import Message from '../../Shared/Message.vue'
import ProductForm from "../../Forms/Products/ProductForm.vue"
import ProductImportForm from "../../Forms/Products/ProductImportForm.vue"
import DeleteProduct from "../../Forms/Products/DeleteProduct.vue"
import { Inertia } from '@inertiajs/inertia'
const axios = require('axios');
import debounce from 'lodash.debounce'
import BreadCrumbs from '../../Shared/AdminNav/BreadCrumbs.vue'
import AdminTopNav from '../../Shared/AdminNav/AdminTopNav.vue'

export default {
    data () {
        return {
            showAddModal: false,
            showDeleted: false,
            search: this.filters.search,
            showImportForm: false,
            showDeleteForm: false,
            showNotification: false,
            formTitle:'',
            previewUrl: '',
            product: {
                enabled: 0,
                featured: 0,
                hot_deal: 0,
                images: '',
                sub_sub_categories: [],
            },
            productsImport: {
                file: {}
            }

        }
    },
    layout: Admin,
    components: { Message, Notification, ProductForm, ProductImportForm, DeleteProduct, BreadCrumbs, AdminTopNav },
    props: {
        filters: Object,
        errors: Object
    },
     methods: {
        onSearchInput(){
            console.log('search input changed' + this.search)
            ,
             Inertia.get('/dashboard/products', { deleted:this.showDeleted, search: this.search }, {
                 preserveState: true,
                 replace: true
             })
        },
        changeStatus(productId) {
             Inertia.post('/dashboard/products/status/'+productId, {
                preserveState: true,
                 replace: true
             })
             setTimeout(() =>
            this.showNotification = true
            , 1000);
             this.close()
             setTimeout(() =>
            this.showNotification = false
            , 7000);
        },
        addNewProduct(){
            this.formTitle = 'Add New Product'
            this.showAddModal = true
        },
        importProducts(){  
            this.showImportForm = true
            this.formTitle = 'Import Products'
        },
        productsImported(file){
            console.log('FILE',file)
            this.productsImport.file = file
            console.log('IMPORT', this.productsImport.file)
            // alert('filed clicked')
            Inertia.post('/dashboard/import/products', this.productsImport, {
                  preserveState: true,
                    replace: true
                })
                this.close()
        },
        editProduct(product){
            this.product = product
            this.showAddModal = true
            this.formTitle = 'Edit Product'
        },
        deleteProduct(product){
            this.product = product
            this.showDeleteForm = true
        },
        destroyProduct(product){
            this.product = product
            this.showDeleteForm = true
        },
        submitDeleteProduct(product){

            if (product.deleted_at){
                Inertia.delete('/dashboard/products/'+product.id+'/destroy')
            } else {
                Inertia.delete('/dashboard/products/'+product.id)
            }
             setTimeout(() =>
            this.showNotification = true
            , 1000);
             this.close()
             setTimeout(() =>
            this.showNotification = false
            , 7000);
        },
        restoreProduct(product){
           Inertia.get('/dashboard/products/restore/'+product.id)
        },
        submitProduct(product){
            if (product.uploadImage === false){
                this.product.images = null
            }
            if (product.id){
                Inertia.post('/dashboard/products/'+product.id, product, {
                  preserveState: true,
                    replace: true
                })
            } else {
                Inertia.post('/dashboard/products', product, {
                 preserveState: true,
                    replace: true
                })
            }
            setTimeout(() =>
            this.showNotification = true
            , 1000);
            this.close()

            setTimeout(() =>
            this.showNotification = false
            , 7000);

        },
        close() {
            this.showAddModal = false
            this.showImportForm = false
            this.showDeleteForm = false
            this.product = {}

        }
    },
    computed: {
        products() {
            return this.$page.props.products.data;
        },
        links() {
            return this.$page.props.products.links
        },
        message() {
            return this.$page.props.flash.message;
        },
    },
    watch: {
        search() {
            this.debouncedWatch();
        },
        showDeleted() {
             Inertia.get('/dashboard/products', { deleted:this.showDeleted, search:this.search }, {
                 preserveState: true,
                 replace: true
             })
        },
     },
     created() {
        this.debouncedWatch = debounce(() => {
            this.onSearchInput()
        }, 400)
     }
};
</script>
