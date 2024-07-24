<template>
    <Head>
        <title>My Account</title>
        <meta type="description" content="My Account description" head-key="description">
    </Head>
    <div class="w-full bg-gray-100 pb-20">
        <div class="absolute right-0 top-0 mr-4 fade-in" v-if="showNotification">
            <Notification v-for="error in errors" :key="error" :error="error"/>
            <Message v-if="message" :message="message"/>
        </div>        
        <div class="h-40 bg-black text-white">
            <h2 class="text-4xl font-bold text-center pt-8">My Account</h2>
            <p class="text-center pt-4">Use this area to manage your personal details, view past orders, and more!</p>
        </div>
        <div class="container mx-auto flex justify-between pt-6 gap-8">
            <div class="w-1/4">
                <div class="w-full bg-white border border-gray-200">
                    <button class="p-4 flex items justify-items-center text-gray-400 hover:text-gray-800" :class="this.activeTab === 'details' ? 'text-gray-800': ''" @click="this.activeTab = 'details'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                        </svg>
                        My Details
                    </button>
                    <button class="p-4 flex items justify-items-center text-gray-400 hover:text-gray-800" :class="this.activeTab === 'history' ? 'text-gray-800': ''" @click="this.activeTab = 'history'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                        </svg>
                        Order History
                    </button>
                    <button class="p-4 flex items justify-items-center text-gray-400 hover:text-gray-800" :class="this.activeTab === 'notifications' ? 'text-gray-800': ''" @click="this.activeTab = 'notifications'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                        </svg>
                        Notifications
                    </button>
                    <button class="p-4 flex items justify-items-center text-gray-400 hover:text-gray-800" :class="this.activeTab === 'wishlist' ? 'text-gray-800': ''" @click="this.activeTab = 'wishlist'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                        </svg>
                        My Wishlist
                    </button>
                    <a :href="'/cart'" class="p-4 flex items justify-items-center text-gray-400 hover:text-gray-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        My Basket
                    </a>
                <Link as="button" :href="'/logout'" method="post" class="p-4 flex items justify-items-center text-gray-400 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
</svg>

                    Sign Out
                </Link>
                </div>
            </div>
            <div class="w-3/4">
                <div :class="this.activeTab === 'details' ? '': 'hidden'">
                    <div class="w-full bg-white border border-gray-200">
                        <h2 class="text-2xl font-bold py-4 px-8">My Details</h2>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">First Name</div>
                            <div class="w-2/3">
                                <input
                                    type="text"
                                    v-model="user.first_name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="First Name..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Surname</div>
                            <div class="w-2/3">
                                <input
                                    type="text"
                                    v-model="user.surname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Surname..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Email Address</div>
                            <div class="w-2/3">
                                <input
                                    type="text"
                                    v-model="user.email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Email Address..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Current Password</div>
                            <div class="w-2/3">
                                <input
                                    :type="passwordType"
                                    v-model="user.password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Current Password..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">New Password <span class="text-gray-400 text-xs">(Optional)</span></div>
                            <div class="w-2/3">
                                <input
                                    :type="passwordType"
                                    v-model="user.new_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="New Password..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Confirm Password <span class="text-gray-400 text-xs">(Optional)</span></div>
                            <div class="w-2/3">
                                <input
                                    :type="passwordType"
                                    v-model="user.confirm_password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="New Password..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Phone Number <span class="text-gray-400 text-xs">(Optional)</span></div>
                            <div class="w-2/3">
                                <input
                                    type="text"
                                    v-model="user.phone_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Phone Number..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Mobile Number <span class="text-gray-400 text-xs">(Optional)</span></div>
                            <div class="w-2/3">
                                <input
                                    type="text"
                                    v-model="user.mobile_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Mobile Number..."
                                >
                            </div>
                        </div>
                        <div class="flex flex-row justify-between py-2 px-8">
                            <div class="w-1/3 mt-2">Date of birth <span class="text-gray-400 text-xs">(Optional)</span></div>
                            <div class="w-2/3">
                                <Datepicker v-model="user.dob"></Datepicker>
                            </div>
                        </div>
                        <div class="flex justify-end py-4 px-8">
                            <button class="border border-primary text-primary hover:bg-primary rounded-full py-4 px-6 hover:text-white" @click="updateDetails">Update Details</button>
                        </div>
                    </div>
               </div>

               
               <div :class="this.activeTab === 'history' ? '': 'hidden'" >
                <div class="w-full bg-white border border-gray-200 px-8">
                    <h2 class="text-2xl font-bold py-4 ">Order History</h2>
                   
                    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Summary
                </th>
                <th scope="col" class="py-3 px-6">
                    Total
                </th>
                <th scope="col" class="py-3 px-6">
                    Status
                </th>
                <th scope="col" class="text-center py-3 px-6">
                    Delivery
                </th>
                <th scope="col" class="py-3 px-6">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b" v-for="order in orders" :key="order.id">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    <span class="font-bold">{{order.created_at}}</span><br/>
                    ML-{{order.id}}
                </th>
                <td class="py-4 px-6">
                    &pound;{{order.total}}
                </td>
                <td class="py-4 px-6">
                    {{order.status}}
                </td>
                <td class="py-4 px-6 text-center">
                    <span class="font-bold">Standard Delivery</span><br/>
                    2-5 days
                </td>
              
                <td class="py-12 px-6 flex flex-row">
                    <button @click="viewMyOrder(order)" class="font-medium text-blue-600 hover:text-red-500 flex justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg> View Order

                    </button>           
                   
                </td>
            </tr>
        </tbody>
    </table>
    
                </div>
               </div>
               <div :class="this.activeTab === 'notifications' ? '': 'hidden'" >
               Notifications Tab
               </div>
               <div :class="this.activeTab === 'order' ? '': 'hidden'" >
                
                <div class="w-full bg-white border border-gray-200 px-8">
                    <div class="flex justify-start">
                    <h2 class="text-2xl font-bold py-4 ">{{this.viewOrder.created_at}}</h2>
                    <span class="text-gray-400 py-5 px-2">- ML{{this.viewOrder.id}}</span>
                </div>
                   
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                               
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Product
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Status
                            </th>
                            <th scope="col" class="text-center py-3 px-6">
                                Qty
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>
                        </tr>
        </thead>
        <tbody>
            <tr class="border-b" v-for="product in viewOrder.products" :key="product.id">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                    <img :src="'/storage/'+product.images[0].path" class="w-20 rounded" alt="Thumbnail">
                </th>
                <td class="py-4 px-6">
                    <span class="font-bold mb-2 text-md">{{product.title}}</span><br/><span class="text-gray-400 py-2">{{product.product_code}}</span><br/>
                    <button class="font-thin hover:font-bold" @click="reviewProduct(product)">Review Product</button>
                </td>
                <td class="py-4 px-6">
                    {{viewOrder.status}}
                </td>
                <td class="py-4 px-6 text-center">
                    {{product.pivot.quantity}}
                </td>
              
                <td class="py-12 px-6 flex flex-row font-bold text-md">
                    <span v-if="product.pivot.quantity == 1">&pound;{{product.sell_price}}</span>
                    <span v-else>&pound;{{product.sell_price}} (each)<br/>&pound;{{product.sell_price * product.pivot.quantity}}</span>
                </td>
            </tr>
        </tbody>
                    </table>
                    <div class="w-full flex justify-end mx-8">
                        <div class="w-1/2 mt-8">
                            <a :href="'/orders/invoice/'+viewOrder.id" target="_blank" class="bg-primary rounded-full px-6 py-4 text-white">Print Invoice</a>
                        </div>
                    <div class="w-1/2">
    <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Order Created</div>
        <div class="w-1/2 text-right">{{viewOrder.created_at}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Subtotal</div>
        <div class="w-1/2 text-right">&pound;{{viewOrder.total - viewOrder.tax}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Tax</div>
        <div class="w-1/2 text-right">&pound;{{viewOrder.tax}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Total</div>
        <div class="w-1/2 text-right">&pound;{{viewOrder.total}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Delivery Fee</div>
        <div class="w-1/2 text-right">&pound;0.00</div>
       </div>
    </div>
</div>
                </div>
                </div>
                <div :class="this.activeTab === 'wishlist' ? '': 'hidden'">
                    <div class="w-full bg-white border border-gray-200">
                        <h2 class="text-2xl font-bold py-4 px-8">My Wishlist</h2>
                        
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                                <tr>
            <th class="hidden md:table-cell"></th>
            <th scope="col" class="py-3 px-6">Product</th>
            <th scope="col" class="py-3 px-6">
              <span class="lg:hidden" title="Quantity">Qtd</span>
              <span class="hidden lg:inline">Quantity</span>
            </th>
            <th scope="col" class="py-3 px-6">Unit price</th>
            <th scope="col" class="py-3 px-6">Total price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(wishlistItem, id, index) in wishlist">
            <td class="py-4 px-6">
              <a :href="'/product/'+wishlistItem.product.slug">
                <img :src="'/storage/'+wishlistItem.product.images[0].path" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a :href="'/product/'+wishlistItem.product.slug">
                <p class="mb-2 md:ml-4">{{wishlistItem.product.title}}</p>
            </a>
             
                  <button class="text-gray-700 md:ml-4"  @click="removeWishlistItem(wishlistItem.id)">
                    <small>(Remove item) </small>
                  </button>
                  <button class="text-gray-700 md:ml-4"  @click="moveToCart(wishlistItem.id)">
                    <small>(Move to cart) </small>
                  </button>
             
             
            </td>
            <td class="py-4 px-6">
              <div class="w-20 h-10">
                <div class="relative flex flex-row w-full h-8">
                <input type="number" min="1" :value="wishlistItem.quantity"  @change="updateQty($event, id)"
                  class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                </div>
              </div>
            </td>
            <td class="py-4 px-6">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{wishlistItem.product.sell_price}}
              </span>
            </td>
            <td class="py-4 px-6">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{wishlistItem.product.sell_price * wishlistItem.quantity}}
              </span>
            </td>
          </tr> 
        </tbody>
      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <transition name="fade" appear>
            <div class="fixed h-screen top-0 left-0 right-0 bottom-0 z-[99] w-full bg-gray-800 bg-opacity-50" v-if="showReviewModal" @click="close()">
            </div>
        </transition>
        <transition name="slide" appear>
            <div class="fixed top-0 left-0 right-0 bottom-0 w-full z-[100] h-screen p-8" v-if="showReviewModal"  @click="close()">
               
                <ReviewForm
                    :product="review_product"
                    @close="close"
                /> 
           
            </div>
        </transition>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
 import Datepicker from '@vuepic/vue-datepicker';
 import Notification from '../Shared/Notification.vue'
import Message from '../Shared/Message.vue'
import ReviewForm from "../Forms/Products/ReviewForm.vue"
import '@vuepic/vue-datepicker/dist/main.css'

export default {
    data() {
        return {
            review_product: {},
            showReviewModal: false,
            activeTab: 'details',
            passwordType: 'password',
            showNotification: false,
            viewOrder: {}
        }
    },
    components: { Datepicker, Message, Notification, ReviewForm },
    props: {
        errors: Object,
    },
    methods: {
        reviewProduct(product){
            this.showReviewModal = true
            this.review_product = product
        },
        updateDetails() {
            console.log('USER', this.user)
            Inertia.post('/update-user/'+this.user.id, this.user, {
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
        viewMyOrder(order){
            this.viewOrder = order
            this.activeTab = 'order'
        },
        removeWishlistItem(itemId) {
            Inertia.delete('/wishlist/'+itemId, {
                preserveScroll: true 
            })
        },
        moveToCart(itemId) {
            Inertia.post('/move-to-cart/'+itemId, {
                preserveScroll: true 
            })
        },
        close() {
            this.showReviewModal = false
        }
    },
    computed: {
            user() {
            return this.$page.props.auth.user;
            },
            message() {
                return this.$page.props.flash.message;
            },
           orders() {
                return this.$page.props.orders;
            },
           wishlist() {
                return this.$page.props.wishlist;
            },
           
        },
    mounted() {
       if (this.$page.url === '/my-account?tab=wishlist') {
            this.activeTab = 'wishlist'
       }
           
    }
   
};
</script>
