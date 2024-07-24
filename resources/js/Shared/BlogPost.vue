<template>
<article class="flex flex-col">
    <Link :href="'/blog/'+blogPost.slug">
        <img alt="" class="object-cover w-full h-60 rounded-md" :src="'/storage/'+blogPost.images[0].path">
    </Link>
    <div class="p-2">
        <a rel="noopener noreferrer" href="#" aria-label="Te nulla oportere reprimique his dolorum"></a>
        <h3 class="p-2 text-md font-semibold leading-snug">{{blogPost.title}}</h3>
        <a rel="noopener noreferrer" href="#" class="p-2 text-sm text-gray-400">By {{blogPost.author.name}} | {{blogPost.created_at}}</a>
        <p class="text-xs p-2 mb-4">{{blogPost.snippet}}</p>
        <Link :href="'/blog/'+blogPost.slug" class="border border-primary test-primary rounded-full px-4 py-2 hover:bg-primary hover:text-white">Read More...</Link>

    </div>
</article>


</template>

<script>
import Product from "../Shared/Product.vue";

export default {
    data () {
        return {

        }
    },
    props: {
        blogPost: Object
    }

};

</script>
