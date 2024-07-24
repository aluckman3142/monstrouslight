<template>
    <div style="height:100vh">
    <div class="w-full  text-black  shadow z-10 rounded-md absolute top-20">
        <div class="w-1/2 bg-white mx-auto">
         <div class="w-full my-12 inline-block">           
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#06a94d" class="w-32 h-32 mx-auto bg-none">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.563 9.75a12.014 12.014 0 00-3.427 5.136L9 12.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        </div>


        
        <div class="w-full text-grey-800 text-center mb-8 inline-block">
            <h3 class="text-2xl font-bold">{{message.message}}</h3>
            <p class="text-lg" v-if="message.product">{{ message.product.title }}</p>
        </div>
        <div class="w-full inline-block mb-8 px-8" v-if="message.cart">
            <div class="w-full  grid grid-cols-2 gap-8 ">
            <button class="bg-primary p-4 text-white text-sm uppercase text-center rounded-xl" @click="$emit('close')">Continue Shopping</button>
            <a href="/cart">
                <button class=" w-full bg-primary p-4 text-white text-sm uppercase text-center rounded-xl">View Cart</button>
            </a>
        </div>
        </div>
    </div>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {

        }
    },
    props: {
        message: Object,
    },
}
</script>
