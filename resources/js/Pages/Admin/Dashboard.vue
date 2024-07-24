<template>
    <Head>
        <title>Dashboard</title>
        <meta type="description" content="Dashboard description" head-key="description">
    </Head>
    <div class="w-full h-screen bg-gray-100 mt-8">
        <div class="grid grid-cols-2 gap-8">
            <div class="ml-8 p-8 bg-white rounded-sm">
                <Sales/>
            </div>
            <div class="mr-8 p-8 bg-white rounded-sm">
                <div class="w-full">
                <table class="w-1/2 text-sm text-left text-gray-500 mt-8">
                <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                    <tr>
                        <th scope="col" class="py-3 px-4 w-1/2">
                            Product
                        </th>
                        <th scope="col" class="py-3 px-4 w-1/4">
                            Product Code
                        </th>
                        <th scope="col" class="py-3 px-4 w-1/4">
                            Stock Level
                        </th>
                        
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b" v-for="product in low_stock_products" :key="product.id" :class=" product.id % 2 === 0 ? 'bg-gray-100' : 'bg-white'">
                        <th scope="row" class="py-4 px-4 font-medium text-gray-900 whitespace-nowrap" :class=" product.stock < 1 ? 'bg-red-300' : 'bg-orange-300'">
                            {{product.title}}
                        </th>
                        <td class="py-4 px-4" :class=" product.stock < 1 ? 'bg-red-300' : 'bg-orange-300'">
                            {{product.product_code}}
                        </td>
                        <td class="py-4 px-4" :class=" product.stock < 1 ? 'bg-red-300' : 'bg-orange-300'">
                            {{product.stock}}
                        </td>
                       
                        </tr>
                </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import Admin from '../../Shared/Layouts/Admin.vue'
import Sales from '../../Admin/Charts/Sales.vue';
export default {
    layout: Admin,
    components: { Sales },
    props: {
        low_stock_products: Object
    },
};
</script>
