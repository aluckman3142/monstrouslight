<template>
    <Head>
        <title>Monstrous Light Blog - {{blogPost.title}}</title>
        <meta type="description" content="Home description" head-key="description">
    </Head>
    <div class="w-full bg-gray-200 pb-20">
        <div class="container mx-auto flex justify-between pt-6 gap-8">
            <div class="w-1/4">
                <Sidebar/>
                <HotDeals :slides="slides"/>
            </div>
            <div class="w-3/4 bg-white rounded-lg border-gray-300 pb-12 pt-4">

                <h2 class="text-3xl text-center font-thin pt-4 text-gray-500 uppercase">{{blogPost.title}}</h2>
                <div class="mx-auto h-1 w-28 bg-primary mt-2 mb-10"></div>
                <div class="flex flex-row mx-auto max-w-xl justify-center gap-4 mb-12 text-sm">
                     <img src="/img/avatar.png" class="w-10 h-10 rounded-full relative" style="top:-8px"/>
                    <p class="font-bold">Written By {{blogPost.author.first_name}} {{blogPost.author.surname}} </p>
                    <p>{{blogPost.created_at}}</p>
                </div>

               <img class="max-w-4xl mx-auto mb-12" :src="'/storage/'+blogPost.images[0].path"/>
               <p class="text-md font-light max-w-2xl mx-auto mb-12">{{blogPost.content}}</p>
               <div class="max-w-2xl mx-auto">
               <iframe width="100%" height="400" src="https://www.youtube.com/embed/8zXGISMfvqY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
                <div class="flex flex-row max-w-4xl mx-auto mt-12 gap-4">
                    <img v-for="image in blogPost.images" :key="image" class="w-1/3" :src="'/storage/'+image.path"/>
                </div>
            </div>
        </div>
        <NewProducts 
        v-if="blogPost.products.length > 0"
            :products="blogPost.products"
            :title="'Related Products'"
        />
    </div>
</template>

<script>
import carousel from "../Shared/BlogCarousel.vue";
import BlogPost from "../Shared/BlogPost.vue";
import Sidebar from "../Shared/Nav/Sidebar.vue";
import HotDeals from "../Shared/HotDeals.vue";
import Product from "../Shared/Product.vue";
import NewProducts from "../Shared/NewProducts.vue";
export default {
    components: { Sidebar, HotDeals, BlogPost, carousel, Product, NewProducts },
    props: {
        slides: Object,
    },
    computed: {
       blogPost() {
            return this.$page.props.blogPost;
        },
        // related_products() {
        //     return this.$page.props.related_products;
        // },
    }

};
</script>


