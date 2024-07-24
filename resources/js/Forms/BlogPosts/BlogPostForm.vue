<template>
        <div class="w-full max-w-6xl p-6 relative">
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
             <div class="w-full mt-4">
                <div class="flex flex-row justify-between border borger-gray-800 border-b-0">
                        <button :class="this.activeTab === 'details' ? 'bg-gray-200': ''" class="text-center p-4 w-1/6 hover:bg-gray-200" @click="this.activeTab = 'details'">Blog Post</button>
                        <button :class="this.activeTab === 'images' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'images'">Images</button>
                        <button :class="this.activeTab === 'products' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'products'">Related Products</button>
                    </div>
                    <div :class="this.activeTab === 'details' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Post Title</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="blogPost.title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Post Title..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Post Content</div>
                                <div class="w-3/4">
                                    <textarea
                                    v-model="blogPost.content"
                                    rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Post Content...">
                                    </textarea>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">YouTube Link</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="blogPost.youtube_link"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Post Title..."
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :class="this.activeTab === 'images' ? '': 'hidden'" >
                        <div class="p-4 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <label
                                for="message"
                                class="block mb-2 text-sm font-medium text-gray-900"
                            >
                                Post Images (Multiple)
                               
                            </label>
                            <input type="file"
                                multiple
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                @change="onFileChange"
                                >
                        </div>
                        <div class="flex flex-row gap-2">
                            <div v-for="(image, key) in images" :key="key">
                                <div>
                                <img v-if="image.path" class="w-28" :src="'../storage/'+image.path"/>
                                <img v-else class="w-28" :ref="'image'"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :class="this.activeTab === 'products' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Related Post Products</div>
                                <div class="w-3/4">
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
                            @click="addProduct(product)">Add To Blog Post</button>
                        </div>
                        
                    </div>
                   
                    
                   
                </div>
                
            </div>
           
                                </div>
                               
                    </div>
                    <table class="w-full text-sm lg:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            <th class="hidden md:table-cell"></th>
            <th class="text-left">Product</th>
            
            <th class="hidden text-right md:table-cell">Unit price</th>
            
          </tr>
        </thead>
        <tbody>
          <tr v-for="(blogPostProduct, id, index) in blogPostProducts">
            <td class="hidden pb-4 md:table-cell">
              <a href="#">
                <img :src="'/storage/'+blogPostProduct.product.images[0].path" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a href="#">
                <p class="mb-2 md:ml-4">{{blogPostProduct.product.title}}</p>
            </a>
             
                  <button class="text-gray-700 md:ml-4"  @click="removeBlogPostProduct(id)">
                    <small>(Remove item) </small>
                  </button>
             
             
            </td>
           
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{blogPostProduct.product.sell_price}}
              </span>
            </td>
           
          </tr> 
        </tbody>
      </table>
                    </div>
                    </div>
                
                  
            </div>
             <!-- Modal footer -->
             <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="w-1/3 bg-emerald-300 p-4 text-white hover:bg-emerald-500 font-bold text-center flex flex-row gap-4 " @click="this.$emit('blog-post-added', blogPost, blogPostProducts);">
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
            blogPostProducts: [],
            search: '',
            products: {},
            activeTab: 'details',
            images: [],
        }
      },
      props: {
        formTitle: {
          required: true,
          type: String
        },
        blogPost: {
            required: true,
            type: Object
        }
      },
      methods: {
        onFileChange(e) {
            this.images = []
            this.blogPost.images = []
                let vm = this;
                var selectedFiles = e.target.files;
                for (let i = 0; i < selectedFiles.length; i++) {
                    this.images.push(selectedFiles[i]);
                    this.blogPost.images.push(selectedFiles[i]);
                }

      for (let i = 0; i < this.images.length; i++) {
        let reader = new FileReader();
       reader.onload = (e) => {
          this.$refs.image[i].src = reader.result;
        };

        reader.readAsDataURL(this.images[i]);
        this.blogPost.uploadImages = true
      }
    },
    onSearchInput(){
         //   console.log(this.search)
                axios.get('/products/search', { 
                    params: {
                        search: this.search,
                    }
                 })
                    .then(response => {
                        console.log('SEARCH',response);
                       this.products = response.data.results
                })
            },
    addProduct(product) {
        product.quantity = 1
        this.blogPostProducts.push({
           product
        })
        console.log('Products', this.blogPostProducts)
        this.search = ''
        },
      },
      watch: {
        blogPost() {
           this.images = this.blogPost.images
          this.blogPost.uploadImages = false
        },
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
    