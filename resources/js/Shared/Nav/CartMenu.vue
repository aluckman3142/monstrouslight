<template>
     <a href="/cart">
    <div class="w-full rounded-full bg-secondary mt-4 p-2.5 flex justify-start">
       
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="mx-3 w-10 h-10 text-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>

            <div class="text-md text-white font-bold flex justify-between relative">
                <div v-if="cart" class="mr-2 bg-primary absolute  -left-6 -top-1 rounded-full text-sm h-6 w-6 text-white"><p style="position:relative; left:-8px; top:3px;">{{Object.keys(this.cart).length}}</p></div>
                <div class="px-4 pt-2 float-right">
                <p v-if="cart" >&pound;{{cartTotal}}</p>
                <p v-else>&pound;0.00</p>
                </div>
            </div>
       
    </div>
</a>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        computed: {
            cart() {
                return this.$page.props.cart;
            },
            cartTotal() {
                let total = 0;
                Object.entries(this.cart).forEach(([key, val]) => {
                    total += parseFloat(val.price * val.quantity)
                 
                });
                total = total.toFixed(2)

                return total;  
            }
        },

    }
</script>
