<template>
    
  
        <div class="w-full max-w-6xl bg-white shadow-lg rounded-lg p-6 relative">
            <div class="flex justify-between items-start p-2 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{formTitle}}
                </h3>
                <button @click="this.$emit('close');" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
             <!-- Modal body -->
             <div class="flex flex-row justify-between">
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer Email Address</label>
                        <input
                            type="text"
                            v-model="order.billing_email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer Email..."
                        >
                    </div>         
                </div>
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer Name</label>
                        <input
                            type="text"
                            v-model="order.billing_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer Name..."
                        >
                    </div>
                </div> 
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer Address Line 1</label>
                        <input
                            type="text"
                            v-model="order.address_line_1"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer Address Line 1..."
                        >
                    </div>
                  
                </div> 
           
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer Address Line 2</label>
                        <input
                            type="text"
                            v-model="order.address_line_2"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer Address Line 2..."
                        >
                    </div>
                  
                </div> 
            </div>
            <div class="flex flex-row justify-between">
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer City</label>
                        <input
                            type="text"
                            v-model="order.city"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer City..."
                        >
                    </div>
                  
                </div> 
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer County</label>
                        <input
                            type="text"
                            v-model="order.county"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer County..."
                        >
                    </div>
                  
                </div> 
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Customer Postcode</label>
                        <input
                            type="text"
                            v-model="order.postcode"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            placeholder="Customer Postcode..."
                        >
                    </div>
                  
                </div> 
                <div class="w-1/4 m-2">
                    <div class="mb-2">
                        BUTTON FOR ADDRESS LOOKUP HERE
                    </div>
                  
                </div> 
            </div>
            <div class="flex flex-row justify-between">
                <div class="w-full m-2">
                <input v-model="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Search Products" required>
                <div class="bg-white absolute p-4 z-20 h-40 overflow-auto" style="width:90%; left:5%" v-if="search">
                    <div class="flex flex-row justify-between mb-2" v-for="product in products">
                        <div class="w-1/5">
                            <p>{{product.product_code}}</p>
                        </div>
                        <div class="w-3/5">
                            <p>{{product.title}}</p>
                        </div>
                        <div class="w-1/5">
                            <button class="w-full bg-emerald-300 p-1 text-white hover:bg-emerald-500  text-center"
                            @click="addProduct(product)">Add To Order</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            </div>
            <!-- <div class="flex flex-row justify-between" v-for="(orderProduct, id, index) in orderProducts" :key="orderProduct.product.id">
               {{id}} | {{index}}
            </div> -->
            <div class="mx-4">
            <table class="w-full text-sm lg:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Product</th>
            <th class="lg:text-right text-left pl-5 lg:pl-0">
              <span class="lg:hidden" title="Quantity">Qtd</span>
              <span class="hidden lg:inline">Quantity</span>
            </th>
            <th class="hidden text-right md:table-cell">Unit price</th>
            <th class="text-right">Total price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(orderProduct, id, index) in orderProducts">
            <td class="hidden pb-4 md:table-cell">
              <a href="#">
                <img :src="'/storage/'+orderProduct.product.images[0].path" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a href="#">
                <p class="mb-2 md:ml-4">{{orderProduct.product.title}}</p>
            </a>
             
                  <button class="text-gray-700 md:ml-4"  @click="removeOrderProduct(id)">
                    <small>(Remove item) </small>
                  </button>
             
             
            </td>
            <td class="justify-center md:justify-end md:flex mt-6">
              <div class="w-20 h-10">
                <div class="relative flex flex-row w-full h-8">
                <input type="number" min="1" :value="orderProduct.product.quantity"  @change="updateQty($event, orderProduct.product)"
                  class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                </div>
              </div>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{orderProduct.product.sell_price}}
              </span>
            </td>
            <td class="text-right">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{orderProduct.product.sell_price * orderProduct.product.quantity}}
              </span>
            </td>
          </tr> 
        </tbody>
      </table>
    </div>
      <div class="flex flex-row justify-between">
                <div class="w-full m-2 text-right font-bold">
                   Order Total: &pound;{{orderTotal}}
                </div>

      </div>
            <!-- <div class=" flex-row ">
                <button class="w-1/5 bg-emerald-300 p-1 text-black uppercase hover:bg-emerald-500 font-bold text-center float-right" @click="onAddProduct()">Add Product</button>
            </div> -->
             <!-- Modal footer -->
             <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="w-1/3 bg-emerald-300 p-4 text-white hover:bg-emerald-500 font-bold text-center flex flex-row gap-4 " @click="this.$emit('order-added', order, orderProducts, orderTotal);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
{{formTitle}}</button>
                <button class="w-1/3 bg-red-400 p-4 text-white hover:bg-red-500 font-bold text-center flex flex-row gap-4" @click="this.$emit('close');">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
Cancel</button>
            </div>
        </div>
   
</template>

<script>
import debounce from 'lodash.debounce';
const axios = require('axios');
    export default {
      data() {
        return {
            orderProducts: [],
            search: '',
            products: {},
            orderTotal: 0,
        }
      },
      components: {
      
      },
      props: {
       
        formTitle: {
          required: true,
          type: String
        },
        order: {
            required: true,
            type: Object
        },
       // filters: Object,
      },
      methods: {
        onSearchInput(){
         //   console.log(this.search)
                axios.get('/products/search', { 
                    params: {
                        search: this.search,
                     //   searchCategory: this.searchCategory
                    }
                 })
                    .then(response => {
                        console.log('SEARCH',response);
                       this.products = response.data.results
                })
            },
       addProduct(product) {
        product.quantity = 1
        this.orderProducts.push({
           product
        })
        this.orderTotal = this.orderTotal + parseFloat(product.sell_price)
        this.search = ''
         console.log('ORDER PRODUCTS', this.orderProducts)
        },
        
        updateQty(event, orderProduct){
           
            orderProduct.quantity = event.target.value

            this.orderTotal = 0

            this.orderProducts.forEach((value, index) => {
              this.orderTotal = this.orderTotal + parseFloat(value.product.quantity * value.product.sell_price)
            });
      },
    },
      watch: {
      
        search() {
                this.debouncedWatch();
            },
     },
     created() {
        this.debouncedWatch = debounce(() => {
           this.onSearchInput()
        }, 400)
    }
    
    }
    
    </script>
    