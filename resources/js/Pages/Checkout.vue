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
                    £{{(subTotal / 1.2).toFixed(2)}}
                  </div>
                </div>
                
               
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    VAT (20%)
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{(subTotal - ((subTotal / 1.2))).toFixed(2)}}
                  </div>
                </div>
                <div class="flex justify-between pt-4 border-b">
                  <div class="lg:px-4 lg:py-2 m-2 text-lg lg:text-xl font-bold text-center text-gray-800">
                    Total
                  </div>
                  <div class="lg:px-4 lg:py-2 m-2 lg:text-lg font-bold text-center text-gray-900">
                    £{{subTotal}}
                  </div>
                </div>
          </div>
        </div>
            </div>
            <div class="w-3/4">
                <div class="bg-white rounded-sm  mb-12 relative mr-12">
                   <h2 class="text-3xl font-bold p-4">Checkout</h2>
                    <div class="flex justify-center my-6">
                <div class="flex flex-col w-full p-2 text-gray-800 bg-white">
                    <div class="flex-1">
                  
     
                        
    <h3 class="text-lg px-4 uppercase font-bold">Customer Information</h3>
    <div class="grid gap-6 grid-cols-2 p-4">
        <div>
            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900">First name</label>
            <input type="text" v-model="checkout.first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required="">
        </div>
        <div>
            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900">Last name</label>
            <input type="text"  v-model="checkout.last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required="">
        </div>
    </div>
    <div class="p-4">
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email address</label>
        <input type="email"  v-model="checkout.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.doe@company.com" required="">
    </div> 
    <div class="grid gap-6 grid-cols-2 p-4">
        <div>
            <label for="address_line_1" class="block mb-2 text-sm font-medium text-gray-900">Address Line 1</label>
            <input type="text" v-model="checkout.address_line_1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required="">
        </div>
        <div>
            <label for="address_line_2" class="block mb-2 text-sm font-medium text-gray-900">Address Line 2</label>
            <input type="text"  v-model="checkout.address_line_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required="">
        </div>
    </div>
    <div class="grid gap-6 grid-cols-2 p-4">
        <div>
            <label for="city" class="block mb-2 text-sm font-medium text-gray-900">City</label>
            <input type="text" v-model="checkout.city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required="">
        </div>
        <div>
            <label for="county" class="block mb-2 text-sm font-medium text-gray-900">County</label>
            <input type="text" v-model="checkout.county" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Doe" required="">
        </div>
    </div>
    <div class="grid gap-6 grid-cols-2 p-4">
        <div>
            <label for="postcode" class="block mb-2 text-sm font-medium text-gray-900">Postcode</label>
            <input type="text" v-model="checkout.postcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John" required="">
        </div>
        <div>
            BUTTON FOR ADDRESS LOOKUP HERE
        </div>
    </div>
    <h3 class="text-lg px-4 uppercase font-bold">Payment Information</h3>
    PAYMENT FIELDS HERE
    <div class="mb-6 p-4">
    <button @click="completeCheckout()" class="flex justify-center w-full px-10 py-3 mt-6 font-medium text-white uppercase bg-gray-800 rounded-full shadow item-center hover:bg-gray-700 focus:shadow-outline focus:outline-none">
                  <svg aria-hidden="true" data-prefix="far" data-icon="credit-card" class="w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M527.9 32H48.1C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48.1 48h479.8c26.6 0 48.1-21.5 48.1-48V80c0-26.5-21.5-48-48.1-48zM54.1 80h467.8c3.3 0 6 2.7 6 6v42H48.1V86c0-3.3 2.7-6 6-6zm467.8 352H54.1c-3.3 0-6-2.7-6-6V256h479.8v170c0 3.3-2.7 6-6 6zM192 332v40c0 6.6-5.4 12-12 12h-72c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h72c6.6 0 12 5.4 12 12zm192 0v40c0 6.6-5.4 12-12 12H236c-6.6 0-12-5.4-12-12v-40c0-6.6 5.4-12 12-12h136c6.6 0 12 5.4 12 12z"/></svg>
                  <span class="ml-2 mt-5px">Complete Payment</span>
    </button>
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
            discountCode: '',
            checkout: {
              first_name: '',
              last_name: '',
              email: '',
              address_line_1: '',
              address_line_2: '',
              city: '',
              county: '',
              postocde: '',
              tax: 0,
              total: 0,
              discount: 0
            }
        }
    },
    components: {  },
    props: {
       
    },
    methods: {
      
      completeCheckout(){
        this.checkout.tax = this.subTotal - ((this.subTotal / 1.2)).toFixed(2)
          this.checkout.total = this.subTotal
          if (this.code){
          this.checkout.discount = this.code.value
          } else {
            this.checkout.discount = null
          }
          this.checkout.type = 'Online'
          const params = this.checkout
          Inertia.post('/complete-checkout', params , {
           // preserveScroll: true,
             //    preserveState: true,
               //     replace: true
                })
        },
    },
    computed: {
            username() {
                return this.$page.props.auth.user.username;
            },
            cart() {
                return this.$page.props.cart;
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
              return this.cartTotal
            }
            }
        },
};
</script>
