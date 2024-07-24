<template>
    <Head>
        <title>Orders</title>
        <meta type="description" content="Dashboard description" head-key="description">
    </Head>
    <div class="w-full h-screen bg-gray-100 p-8 relative">
        
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:tracking-tight sm:truncate">Order Number <span class="text-purple-500">#{{order.id}}</span></h2>
                <BreadCrumbs :pageName="'Order'"/>
                <div class="absolute right-0 top-0 mr-4 fade-in" v-if="showNotification">
                <Notification v-for="error in errors" :key="error" :error="error"/>
                <Message v-if="message" :message="message"/>
                </div>
<div class="w-full my-8 flex flex-row gap-4">
   


  
</div>
<div class="shadow-md sm:rounded-lg">
    <div class="flex flex-row justify-between gap-4">
        <div class="w-2/3">
    <div class="bg-white border-1 border-grey-200 rounded-xl p-4 w-full">
    <table class="w-full text-sm lg:text-base" cellspacing="0">
        <thead>
          <tr class="h-12 uppercase">
            
            <th class="text-left">Product</th>
            <th></th>
            <th class="lg:text-right text-left pl-5 lg:pl-0">
              <span class="lg:hidden" title="Quantity">Qtd</span>
              <span class="hidden lg:inline">Quantity</span>
            </th>
            <th class="hidden text-right md:table-cell">Unit price</th>
            <th class="text-right">Total price</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(orderProduct, id, index) in order.products">
            
            <td class="hidden pb-4 md:table-cell">
              <a href="#">
                <img :src="'/storage/'+orderProduct.images[0].path" class="w-20 rounded" alt="Thumbnail">
              </a>
            </td>
            <td>
              <a href="#">
                <p class="mb-2 md:ml-4">{{orderProduct.title}}</p>
            </a>
             
             
             
            </td>
            
            <td class="justify-center md:justify-end md:flex mt-6">
                <p class="mb-2 md:ml-4">x {{orderProduct.pivot.quantity}}</p>
            </td>
            
            <td class="hidden text-right md:table-cell">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{orderProduct.sell_price}}
              </span>
            </td>
            <td class="text-right">
              <span class="text-sm lg:text-base font-medium">
                &pound;{{orderProduct.sell_price * orderProduct.pivot.quantity}}
              </span>
            </td> 
          </tr> 
        </tbody>
      </table>
    </div>
    <div class="bg-white border-1 border-grey-200 rounded-xl p-4 w-full mt-4">
        <h2 class="text-lg font-bold  border-b-2 py-2 border-gray-300">Customer &amp; Order Details</h2>
        <div class="flex row my-2 py-2 border-b-2 border-gray-300">
        <div class="w-1/2 text-left font-bold">Customer Name</div>
        <div class="w-1/2 text-right">{{order.billing_name}}</div>
       </div>
       <div class="flex row my-2 py-2 border-b-2 border-gray-300">
        <div class="w-1/2 text-left font-bold">Customer Email</div>
        <div class="w-1/2 text-right">{{order.billing_email}}</div>
       </div>
       <div class="flex row my-2 py-2 border-b-2 border-gray-300">
        <div class="w-1/2 text-left font-bold">Order Type</div>
        <div class="w-1/2 text-right">{{order.type}}</div>
       </div>
       <div class="flex row my-2 py-2 border-b-2 border-gray-300">
        <div class="w-1/2 text-left font-bold">Payment Gateway</div>
        <div class="w-1/2 text-right">{{order.payment_gateway}}</div>
       </div>
    </div>
</div>
<div class="w-1/3">
    <div class="bg-white border-1 border-grey-200 rounded-xl p-4 w-full">
        <div class="flex row my-2">
       <h2 class="text-lg font-bold w-1/2">Order Summary</h2>
       <Link @click="markAsShipped(order)" class="text-purple-500 text-right w-1/2 py-2 text-xs hover:text-gray-300">Mark As Shipped</Link>
    </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Order Status</div>
        <div class="w-1/2 text-right">{{order.status}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Order Created</div>
        <div class="w-1/2 text-right">{{order.created_at}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Subtotal</div>
        <div class="w-1/2 text-right">&pound;{{order.total - order.tax}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Tax</div>
        <div class="w-1/2 text-right">&pound;{{order.tax}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Total</div>
        <div class="w-1/2 text-right">&pound;{{order.total}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Delivery Fee</div>
        <div class="w-1/2 text-right">&pound;0.00</div>
       </div>
    </div>
    <div class="bg-white border-1 border-grey-200 rounded-xl p-4 w-full mt-4">
        <div class="flex row my-2">
        <h2 class="text-lg font-bold w-1/2">Delivery Address</h2>
        <a :href="'/dashboard/orders/shippinglabel/'+order.id" target="_blank" class="text-purple-500 text-right w-1/2 py-2 text-xs hover:text-gray-300">Print Postage Label</a>
        </div>
        <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Address line 1</div>
        <div class="w-1/2 text-right">{{order.address_line_1}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Address line 2</div>
        <div class="w-1/2 text-right">{{order.address_line_2}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">City</div>
        <div class="w-1/2 text-right">{{order.city}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">County</div>
        <div class="w-1/2 text-right">{{order.county}}</div>
       </div>
       <div class="flex row my-2">
        <div class="w-1/2 text-left font-bold">Postcode</div>
        <div class="w-1/2 text-right">{{order.postcode}}</div>
       </div>
    </div>
    </div>
</div>

</div>

    </div>
</template>

<script>
import Admin from '../../Shared/Layouts/Admin.vue'
import Notification from '../../Shared/Notification.vue'
import Message from '../../Shared/Message.vue'
// import OrderForm from "../../Forms/Orders/OrderForm.vue"
// import DeleteOrder from "../../Forms/Orders/DeleteOrder.vue"
import { Inertia } from '@inertiajs/inertia'
// import debounce from 'lodash.debounce'
import BreadCrumbs from '../../Shared/AdminNav/BreadCrumbs.vue'

export default {
    data () {
        return {
            showNotification: false,
        }
    },
    layout: Admin,
    components: { BreadCrumbs, Message, Notification },
    props: {
        // filters: Object,
        errors: Object
    },
     methods: {
      //  printLabel(order) {
      //   Inertia.get('/dashboard/orders/shippinglabel/'+order.id, {
      //           preserveState: false,
      //           replace: true
      //       })
           
            // setTimeout(() =>
            // this.showNotification = true
            // , 1000);
            // this.close()

            // setTimeout(() =>
            // this.showNotification = false
            // , 7000);
      // },
       markAsShipped(order) {
            Inertia.post('/dashboard/orders/markshipped/'+order.id, {
                preserveState: false,
                replace: true
            })
           
            setTimeout(() =>
            this.showNotification = true
            , 1000);
            this.close()

            setTimeout(() =>
            this.showNotification = false
            , 7000);
       }
    },
    computed: {
        order() {
            return this.$page.props.order;
        },
        message() {
            return this.$page.props.flash.message;
        },
    },
    watch: {
      
     },
     created() {
       
     }
};
</script>
