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
        <title>Homepage</title>
        <meta type="description" content="Home description" head-key="description">
    </Head>
    <transition name="fade" appear>
            <div class=" top-0 left-0 right-0 bottom-0 z-[99] w-full bg-gray-800 bg-opacity-50 sticky" style="height:100vh" v-if="showMessage">
                <Message v-if="message" :message="message" @close="closeMessage()"/>
            </div>
        </transition>
    <div class="w-full bg-gray-200 pb-20">
        
        <div class="h-112 overflow-hidden">
        <carousel :slides="slides"/>
        </div>
        <div class="stripe-bottom"></div>
        <NewProducts 
            :products="newProducts"
            :title="'New Products'"
        />
        <div class="w-full bg-gradient-to-tl from-gray-800 to-purple-700 py-6 text-white h-128 relative">
            <div class="absolute left-0 bottom-0 z-0">
                <img src="/img/mikehero.png" class="w-96"/>
            </div>
            <h2 class="text-4xl w-full font-bold mx-auto text-center pt-2">Monstrous Light Games</h2>
            <p class="text-xl w-full mx-auto text-center py-2">
                <div class="max-w-2xl mx-auto text-center ">With over 20 years gaming experience, located in the heart of Ashton under Lyne, we opened with the intention of filling the space left by Ashton models departure many years ago, having felt the loss of the community that occurred with the closing of such an iconic store.<br/>
                    <br/>
                    Starting with Fighting fantasy game books in 1995 the world of role-play and fantasy opened up, this quickly led to Warhammer and Warhammer 40k with the release of second edition, many hours spent with cousins playing space marines vs space orcs. Later into darkened streets of Mordheim, regularly playing at Stockport games workshop’s Sunday games.<br/><br/>
                    Many adult years and jobs later, the nationwide lockdown provided an opportunity to change careers and start a new prospect and there was nothing we could imagine more than serving the community of role-players, tabletop gamers,  wargamers, painters, magic players. Providing a fun, safe yet sometimes competitive place to play games. All while trying to keeping you gaming. 
                </div>
            </p>
            
            <div class=" absolute top-12 w-full py-8">
                <div class="border-white border-2 rounded-full w-96 h-96 mx-auto border-opacity-50">
            
            <div class="border-white border-2 rounded-full w-72 h-72 mt-12 mx-auto border-opacity-50">
                <div class="border-white border-2 rounded-full w-52 h-52 mt-10 mx-auto border-opacity-50">
                </div>
            </div>
            </div>
        </div>
</div>
        <div class="container mx-auto flex justify-between pt-6 gap-8">
            <Link href="/category/mtg/magic-the-gathering-cards">
                        <img src="img/banners/mtgbanner.jpg" class="w-full"/>
                    </Link>
                    <Link href="/category/games-workshop/warhammer-40000">
                        <img src="img/banners/warhammerbanner.jpg" class="w-full"/>
                    </Link>

        </div>
        <NewProducts 
            class="mt-8"
            :products="featuredProducts"
            :title="'Featured Products'"
        />
        <div class="container mx-auto flex justify-between pt-6 gap-8">
            <div class="w-1/4">
               
                <HotDeals/>
                <div class="w-full mt-8">
                    <Link href="/category/dungeons-dragons">
                        <img src="img/banners/DnD_banner.jpg" class="w-full"/>
                    </Link>
                </div>
                <NextEvent/>
                <div class="w-full mt-8">
                    <Link href="/category/mtg/magic-the-gathering-cards">
                        <img src="img/banners/brotherswar.jpg" class="w-full"/>
                    </Link>
                </div>
            </div>
            <div class="w-3/4">
               
                <div class="grid grid-cols-2 gap-8 mt-8">
                    
                </div>
               
                <div class="w-full mt-8">
                    <Link href="/category/star-wars">
                        <img src="img/banners/star_wars.jpg" class="w-full"/>
                    </Link>
                </div>
                <BlogPreview/>
                <topratedProducts :products="topratedProducts"/>
            </div>
        </div>
    </div>
</template>

<script>
import carousel from "../Shared/Carousel.vue";
import BlogPreview from "../Shared/BlogPreview.vue";
import newProducts from "../Shared/NewProducts.vue";
import featuredProducts from "../Shared/FeaturedProducts.vue";
import topratedProducts from "../Shared/topratedProducts.vue";
import Sidebar from "../Shared/Nav/Sidebar.vue";
import HotDeals from "../Shared/HotDeals.vue";
import NextEvent from "../Shared/NextEvent.vue";
import NewProducts from "../Shared/NewProducts.vue";
import Message from '../Shared/Message.vue'

export default {
    data () {
        return {
        showMessage: false,
        }
    },
    methods: {
        closeMessage(){
        this.showMessage = false   
        }
    },
    components: { Message, carousel, newProducts, featuredProducts, topratedProducts, Sidebar, HotDeals, BlogPreview, NextEvent, NewProducts },
    props: {
        slides: Object,
        newProducts: Object,
        featuredProducts: Object,
        topratedProducts: Object,
    },
    computed: {
        message: {
		get: function() {
            return this.$page.props.flash.message;
		},
		set: function(newValue) {

		}
	}
        },
        watch: {
            message() { 
            this.showMessage = true;
                
        },
        }
   
};
</script>
