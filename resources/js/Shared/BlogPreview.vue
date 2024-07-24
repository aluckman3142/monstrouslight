<template>

<div class="flex justify-center mt-10">
  <div class="block rounded-lg shadow-lg bg-white w-full ">
    <h2 class="text-3xl text-center font-thin pt-4 text-gray-500 uppercase">
            Latest From Our Blog
    </h2>
    <div class="mx-auto h-1 w-28 bg-primary mt-2 mb-10"></div>
   
      <div class="grid grid-cols-2 gap-8 m-8">
			  <BlogPost v-for="blogPost in latestPosts" :key="blogPost.id" :blogPost="blogPost"/>
      </div>
    </div>
</div>



</template>

<script>
import BlogPost from "../Shared/BlogPost.vue";

export default {
    data () {
        return {

        }
    },
    components: {
        BlogPost
    },
    computed: {
       latestPosts() {
            return this.$page.props.latestPosts;
        }
    }

};

</script>
