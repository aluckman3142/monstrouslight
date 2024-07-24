<style scoped>
.stripe-bottom {

    background: url('/img/slantbottom.png') no-repeat;
    background-size: 100% 100%;

    height: 70px;

    width: 100%;

}
</style>
<template>
    <Head>
        <title>Cart</title>
        <meta type="description" content="Home description" head-key="description">
    </Head>
    <div class="w-full bg-gray-100 pb-20">
        <div class="container mx-auto flex justify-between pt-6 gap-8">
            <div class="w-1/4">
              <div class="bg-white">
          <div class="p-4 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic">Shipping and additional costs are calculated based on values you have entered</p>
              <div class="flex justify-between border-b">
                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                  Cart Total
                </div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{cartTotal}}
                </div>
              </div>
                <div class="flex justify-between pt-4 border-b" v-if="code">
                  <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                    
                      <button class="mr-2 mt-1 lg:mt-2" @click="removeDiscount()">
                        <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                      </button>
                   
                   {{code.code}}
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700" v-if="code.type === 'Amount'">
                    -£{{code.value}} 
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700" v-else>
                    -{{code.value}}% 
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b" v-if="subTotal">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Subtotal
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{(cartTotal / 1.2).toFixed(2)}}
                  </div>
                </div>
                
               
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    VAT (20%)
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{(cartTotal - ((cartTotal / 1.2))).toFixed(2)}}
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Delivery
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    <span v-if="cartTotal > 25">FREE</span>
                    <span v-else>£4.99</span>
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Total
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{subTotal.toFixed(2)}}
                  </div>
                </div>
          </div>
        </div>
            </div>
            <div class="w-3/4">
                <div class="bg-white rounded-sm  mb-12 relative mr-12">
                   <h2 class="text-3xl font-bold p-4">Shopping Cart</h2>
                   <h4 class="text-lg font-thin uppercase tet-gray-500 p-4">Free Delivery On Orders over £25</h4>
                    <div class="flex justify-center my-6">
  <div class="flex flex-col w-full p-2 text-gray-800 bg-white">
    <div class="flex-1">
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
          <tr v-for="(cartItem, id, index) in cart">
            <td class="hidden pb-4 md:table-cell">
              <a :href="'/product/'+cartItem.slug">
                <img :src="'/storage/'+cartItem.image.path" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a :href="'/product/'+cartItem.slug">
                <p class="mb-2 md:ml-4">{{cartItem.title}}</p>
            </a>
             
                  <button class="text-gray-700 md:ml-4"  @click="removeCartItem(id)">
                    <small>(Remove item) </small>
                  </button>
             
             
            </td>
            <td class="justify-center md:justify-end md:flex mt-6">
              <div class="w-20 h-10">
                <div class="relative flex flex-row w-full h-8">
                <input type="number" min="1" :value="cartItem.quantity"  @change="updateQty($event, id)"
                  class="w-full font-semibold text-center text-gray-700 bg-gray-200 outline-none focus:outline-none hover:text-black focus:text-black" />
                </div>
              </div>
            </td>
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{cartItem.price}}
              </span>
            </td>
            <td class="text-right">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{cartItem.price * cartItem.quantity}}
              </span>
            </td>
          </tr> 
        </tbody>
      </table>
      <hr class="pb-6 mt-6">
      <div class="my-4 mt-6 -mx-2 lg:flex">
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Discount Code</h1>
          </div>
          <div class="p-4">
            <p class="mb-4 italic">If you have a discount code, please enter it in the box below</p>
            <div class="justify-center md:flex">
             
                  <div class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full" v-if="username">
                    <input type="coupon" name="code" v-model="discountCode" placeholder="Discount Code"
                            class="w-full bg-gray-100 outline-none appearance-none focus:outline-none active:outline-none"/>
                      <button @click="applyDiscount" class="text-sm flex items-center px-3 py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                        </svg>

                        <span class="font-medium">Apply</span>
                      </button>
                  </div>
                  <div class="flex items-center w-full h-13 pl-3 bg-white bg-gray-100 border rounded-full" v-else>
                    <Link :href="'/login'" class="text-sm flex items-center px-3 py-1 text-white bg-gray-800 rounded-full outline-none md:px-4 hover:bg-gray-700 focus:outline-none active:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                        </svg>

                        <span class="font-medium">Login</span>
                      </Link>
                  </div>
            </div>
          </div>
          <div class="p-4 text-red-500 font-bold">
            {{discount_message}}
          </div>
          <div class="p-4 mt-6 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Delivery Instructions</h1>
          </div>
          <div class="p-4">
            <p class="mb-4 italic">If you have any special delivery instructions you can leave them in the box below</p>
            <textarea class="w-full h-24 p-2 bg-gray-100 rounded"></textarea>
          </div>
        </div>
        <div class="lg:px-2 lg:w-1/2">
          <div class="p-4 bg-gray-100 rounded-full">
            <h1 class="ml-2 font-bold uppercase">Order Details</h1>
          </div>
          <div class="p-4">
            <p class="mb-6 italic">Shipping and additional costs are calculated based on values you have entered</p>
              <div class="flex justify-between border-b">
                <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                  Cart Total
                </div>
                <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{cartTotal}}
                </div>
              </div>
                <div class="flex justify-between pt-4 border-b" v-if="code">
                  <div class="flex lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-gray-800">
                    
                      <button class="mr-2 mt-1 lg:mt-2" @click="removeDiscount()">
                        <svg aria-hidden="true" data-prefix="far" data-icon="trash-alt" class="w-4 text-red-600 hover:text-red-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12zM432 80h-82.41l-34-56.7A48 48 0 00274.41 0H173.59a48 48 0 00-41.16 23.3L98.41 80H16A16 16 0 000 96v16a16 16 0 0016 16h16v336a48 48 0 0048 48h288a48 48 0 0048-48V128h16a16 16 0 0016-16V96a16 16 0 00-16-16zM171.84 50.91A6 6 0 01177 48h94a6 6 0 015.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0012-12V188a12 12 0 00-12-12h-24a12 12 0 00-12 12v216a12 12 0 0012 12z"/></svg>
                      </button>
                   
                   {{code.code}}
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700" v-if="code.type === 'Amount'">
                    -£{{code.value}} 
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-green-700" v-else>
                    -{{code.value}}% 
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b" v-if="subTotal">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Subtotal
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{(cartTotal / 1.2).toFixed(2)}}
                  </div>
                </div>
                
               
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    VAT (20%)
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{(cartTotal - ((cartTotal / 1.2))).toFixed(2)}}
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Delivery
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    <span v-if="cartTotal > 25">FREE</span>
                    <span v-else>£4.99</span>
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Total
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{subTotal.toFixed(2)}}
                  </div>
                </div>
                
             
                <button @click="proceedToCheckout()" class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                  <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                  <span class="ml-2 mt-5px">Proceed to checkout</span>
                </button>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia'

export default {
    data () {
        return {
            quantity: {},
            discountCode: ''
        }
    },
    components: {  },
    props: {
       
    },
    methods: {
        removeCartItem(id) {
            Inertia.delete('/cart/'+id, {
                preserveScroll: true 
            })
        },
        applyDiscount() {
          const params = {
                discountCode: this.discountCode
          }
          Inertia.post('/apply-discount', params , {
            preserveScroll: true,
                 preserveState: true,
                    replace: true
                })
        
        },
        proceedToCheckout(){
          const params = {
                discountCode: this.discountCode
          }
          Inertia.post('/checkout', params , {
          //  preserveScroll: true,
              //  preserveState: true,
              //      replace: true
                })
        },
        removeDiscount() {
          this.discountCode = null
          Inertia.get('/cart','', {
            preserveScroll: true,
                 preserveState: true,
                    replace: true
                })
        },
        updateQty(event, id){
            const params = {
                quantity: event.target.value,
                id: id
            }
        
          Inertia.post('/update-cart', params , {
            preserveScroll: true,
                 preserveState: true,
                    replace: true
                })
        }
    },
    computed: {
            username() {
                return this.$page.props.auth.user.username;
            },
            cart() {
                return this.$page.props.cart;
            },
            discount_message() {
                return this.$page.props.flash.message;
            },
            code() {
                return this.$page.props.code;
            },
            cartTotal() {
                let total = 0;
                Object.entries(this.cart).forEach(([key, val]) => {
                    total += parseFloat(val.price * val.quantity)
                });

                return total;  
            },
            subTotal() {
            if (this.code){
              if (this.code.type === 'Amount') {
                return (this.cartTotal - this.code.value).toFixed(2);
              } else if (this.code.type === 'Per Cent') {
                let discount = (this.cartTotal/100)*this.code.value
                 return (this.cartTotal - discount).toFixed(2);
              }
            } else {
              if (this.cartTotal > 25) {
              return this.cartTotal
              } else {
                return this.cartTotal + 4.99
              }
            }
            }
        },
};
</script>
