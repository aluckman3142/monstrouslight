<template>
    <Head>
        <title>Monstrous Light Blog</title>
        <meta type="description" content="Home description" head-key="description">
    </Head>
    <div class="w-full bg-gray-100 pb-20">
        <div class="container mx-auto flex justify-between pt-6 gap-8">
            <div class="w-1/4">
                <Sidebar/>
                <HotDeals :slides="slides"/>
            </div>
            <div class="w-3/4">
               <div class="flex justify-center">
                <div class="block rounded-lg shadow-lg bg-white w-full ">
                    <div class="py-3 px-6 border-b border-gray-300 uppercase font-bold flex">
                        <div class="w-1/2">
                            Latest From Our Blog
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8 m-8">
                            <BlogPost
                                v-for="blogPost in latestPosts"
                                :key="blogPost.id"
                                :blogPost="blogPost"
                                class="mb-4 border border-gray-200 p-4 rounded-lg"
                            />
                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import BlogPost from "../Shared/BlogPost.vue";
import Sidebar from "../Shared/Nav/Sidebar.vue";
import HotDeals from "../Shared/HotDeals.vue";
export default {
    components: { Sidebar, HotDeals, BlogPost },
    props: {
        slides: Object,
    },
    computed: {
       latestPosts() {
            return this.$page.props.latestPosts;
        }
    }

};
</script>


