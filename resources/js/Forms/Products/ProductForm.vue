<template>
        <div class="w-full max-w-6xl p-6 relative">
            <div class="flex justify-between items-start px-2 rounded-t border-b">
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
                        <button :class="this.activeTab === 'details' ? 'bg-gray-200': ''" class="text-center p-4 w-1/6 hover:bg-gray-200" @click="this.activeTab = 'details'">Product Details</button>
                        <button :class="this.activeTab === 'categories' ? 'bg-gray-200': ''"  class="text-center p-4  w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'categories'">Categories</button>
                        <button :class="this.activeTab === 'prices' ? 'bg-gray-200': ''"  class="text-center p-4  w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'prices'">Prices</button>
                        <button :class="this.activeTab === 'images' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'images'">Images</button>
                        <button :class="this.activeTab === 'attributes' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'attributes'">Attributes</button>
                        <button :class="this.activeTab === 'packs' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'packs'">Packs</button>
                    </div>
                    <div :class="this.activeTab === 'details' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            
                            
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Product Name</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="product.title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Product Name..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Brand</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="product.brand"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Product Brand..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Product Code</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="product.product_code"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Product Code..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Product Description</div>
                                <div class="w-3/4">
                                    <textarea
                                    v-model="product.long_desc"
                                    rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Product Description...">
                                    </textarea>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Key Features (comma seperated)</div>
                                <div class="w-3/4">
                                    <textarea
                                    v-model="product.key_features"
                                    rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Product Key Features...">
                                    </textarea>
                                </div>
                            </div>
                            
                           
          
          
                        </div>
                    </div>
                    <div :class="this.activeTab === 'categories' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Category</div>
                                <div class="w-3/4">
                                    <select @change="loadSubCategories" v-model="product.category_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                                    <option :value="category.id" v-for="category in categories" :key="category.id">{{category.title}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Sub Category</div>
                                <div class="w-3/4">
                                    <select @change="loadSubSubCategories" v-model="product.sub_category_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                                    <option :value="subCategory.id" v-for="subCategory in subCategories" :key="subCategory.id">{{subCategory.title}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Sub Sub Category</div>
                                <div class="w-3/4">
                                    <select @change="subSubCategoriesSelected" multiple v-model="product.sub_sub_categories" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
                                    <option :value="subSubCategory.id" v-for="subSubCategory in subSubCategories" :key="subSubCategory.id">{{subSubCategory.title}}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Enabled</div>
                                <div class="w-3/4 mt-2">
                                    <label :for="'enabled-toggle'" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" v-model="product.enabled" :value="product.enabled" :id="'enabled-toggle'" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                                    </label>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Featured</div>
                                <div class="w-3/4 mt-2">
                                    <label :for="'featured-toggle'" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" v-model="product.featured" :value="product.featured" :id="'featured-toggle'" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                                    </label>
                                </div>
                            </div>                          
                         </div>
                    </div>
                    <div :class="this.activeTab === 'prices' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Buy Price (£)</div>
                                <div class="w-3/4">
                                    <input
                                        type="number"
                                        step="0.01"
                                        v-model="product.buy_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Buy Price..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Sell Price (£)</div>
                                <div class="w-3/4">
                                    <input
                                        type="number"
                                        step="0.01"
                                        v-model="product.sell_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Sell Price..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">In Store Price (£)</div>
                                <div class="w-3/4">
                                    <input
                                        type="number"
                                        step="0.01"
                                        v-model="product.in_store_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="In Store Price..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Sale Price (£)</div>
                                <div class="w-3/4">
                                    <input
                                        type="number"
                                        step="0.01"
                                        v-model="product.sale_price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Sale Price..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Stock Quantity</div>
                                <div class="w-3/4">
                                    <input
                                        type="number"
                                        step="0.01"
                                        v-model="product.stock"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Stock Quantity..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Hot Deal</div>
                                <div class="w-3/4 mt-2">
                                    <label :for="'enabled-toggle'" class="inline-flex relative items-center mr-5 cursor-pointer">
                                    <input type="checkbox" v-model="product.hot_deal" :value="producthot_deal" :id="'enabled-toggle'" class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                                    </label>
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
                                Product Images (Multiple)
                               
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
                    <div :class="this.activeTab === 'attributes' ? '': 'hidden'">
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="flex flex-row justify-between">
                <div class="w-1/4 m-2">
               
                    <label class="block mb-2 text-sm font-medium text-gray-900">Product Weight</label>
                    <input
                        type="text"
                        v-model="product.weight"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product Weight..."
                    >
               
                </div>
                <div class="w-1/4 m-2">
               
               <label class="block mb-2 text-sm font-medium text-gray-900">Product Height</label>
               <input
                   type="text"
                   v-model="product.height"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Product Height..."
               >
          
           </div>
                <div class="w-1/4 m-2">
               
                    <label class="block mb-2 text-sm font-medium text-gray-900">Product Width</label>
                    <input
                        type="text"
                        v-model="product.width"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product Width..."
                    >
               
                </div>
                <div class="w-1/4 m-2">
               
                    <label class="block mb-2 text-sm font-medium text-gray-900">Product Length</label>
                    <input
                        type="text"
                        v-model="product.length"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product Length..."
                    >
                
                </div>
                
            </div>
           
          
           
                        </div>
                    </div>
                    <div :class="this.activeTab === 'packs' ? '': 'hidden'">
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="flex flex-row justify-between">
                <div class="w-1/2 m-2">
               
                    <label class="block mb-2 text-sm font-medium text-gray-900">Pack Size</label>
                    <input
                        type="text"
                        v-model="product.pack_size"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Product Weight..."
                    >
               
                </div>
                <div class="w-1/2 m-2">
               
               <label class="block mb-2 text-sm font-medium text-gray-900">Pack Product Code</label>
               <input
                   type="text"
                   v-model="product.pack_product"
                   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                   placeholder="Pack Product Code..."
               >
          
           </div>
                    </div>
                </div>
            </div>
                </div>
               
            </div>






           
  
            <!-- Modal footer -->
            <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="hover:bg-primary border border-primary p-4 text-primary hover:text-white rounded-full text-center flex flex-row gap-4" @click="this.$emit('product-added', product);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
{{formTitle}}</button>
                <button class="hover:bg-red-500 border border-red-500 p-4 text-red-500 hover:text-white rounded-full text-center flex flex-row gap-4" @click="this.$emit('close');">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
Cancel</button>
            </div>
       

</template>

<script>
const axios = require('axios');

export default {
   
  data() {
    return {
      activeTab: 'details',
      dragging: false,
     // previewUrl: null,
      subCategories: {},
      subSubCategories: {},
      images: [],
    }
  },
  props: {
    formTitle: {
      required: true,
      type: String
    },
    product: {
        required: true,
        type: Object
    },
    previewUrl: {
        required: false
    }
  },
  methods: {
    
    loadSubCategories() {
         axios.get('/dashboard/category-sub-categories/' + this.product.category_id)

            .then(response => {
                //console.log(response.data.subCategories);
                this.subCategories = response.data.subCategories
            })

    },

    loadSubSubCategories() {
         axios.get('/dashboard/sub-category-sub-sub-categories/' + this.product.sub_category_id)

            .then(response => {
                //console.log(response.data.subCategories);
                this.subSubCategories = response.data.subSubCategories
            })

    },
    subSubCategoriesSelected() {
       // alert(this.product.sub_sub_categories);
    },
    onFileChange(e) {
            this.images = []
            this.product.images = []
                let vm = this;
                var selectedFiles = e.target.files;
                for (let i = 0; i < selectedFiles.length; i++) {
                    this.images.push(selectedFiles[i]);
                    this.product.images.push(selectedFiles[i]);
                }

      for (let i = 0; i < this.images.length; i++) {
        let reader = new FileReader();
       reader.onload = (e) => {
          this.$refs.image[i].src = reader.result;
        };

        reader.readAsDataURL(this.images[i]);
        this.product.uploadImages = true
      }
    }
    
  },
  computed: {
    categories() {
            return this.$page.props.categories;
        }
  },
  watch: {
        product() {
            this.images = this.product.images
          this.product.uploadImages = false
          this.loadSubCategories()
       //   setTimeout(function () {
            this.loadSubSubCategories()
       //   }, 500);
        }
     },
}

</script>
