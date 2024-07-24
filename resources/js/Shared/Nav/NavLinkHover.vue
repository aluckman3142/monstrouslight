<style scoped>
.hoverable > a::after {
  content: "";
}
</style>
<template>

    <li v-if="category.sub_categories.length > 0" class="hoverable hover:bg-black text-white hover:text-gray-200">
            <Link :href="'/category/'+category.slug" class="h-16 relative block px-2 text-sm lg:text-base font-bold hover:bg-black hover:text-white">
                <slot></slot>
            </Link>
            <div class="mega-menu absolute left-0 mb-8 sm:mb-0 shadow-xl bg-gray-600 text-white">
              <div class="container mx-auto w-full flex  mx-2">
              <ul v-for="subcategory in category.sub_categories" :key="subcategory.id" class="px-4 w-1/6 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                <Link :href="'/category/'+category.slug+'/'+subcategory.slug">
                <span v-if="subcategory.logo"><img :src="'/storage/'+subcategory.logo.path" class="w-full m-2 inline-block" /></span>
                
                <h3 v-else class="font-bold text-sm text-gray-700 text-bold mb-2">{{subcategory.title}}</h3>
              </Link>
                <li v-for="subsubcategory in subcategory.sub_sub_categories" :key="subsubcategory.id">
                  <Link :href="'/category/'+category.slug+'/'+subcategory.slug+'/'+subsubcategory.slug" class="block p-2 hover:bg-purple-700 text-white hover:text-white">{{subsubcategory.title}}</Link>
                </li>
                <li v-if="subcategory.sub_sub_categories.length < 1">
                  <Link :href="'/category/'+category.slug+'/'+subcategory.slug" class="block p-2 hover:bg-purple-700 text-white hover:text-gray-200">View All Products</Link>
                </li>
              </ul>

              <ul class="px-4 w-1/4 border-gray-600 p-3 float-right" v-if="category.sub_categories.length < 6">
                <li class="pt-3">
                 <img :src="'/storage/'+category.image.path" class="w-full">
                  </li>
                </ul>
              </div>
            </div>

          </li>
          <li v-else class="hover:bg-black text-gray-700 hover:text-white">
        <Link
            :href="'/category/'+category.slug"
            class="h-16 relative block px-2 text-sm lg:text-base font-bold"
            :class="{'bg-black': active}"
        >
            <slot></slot>
        </Link>
    </li>

</template>

<script>

export default {
    props: {
        category: Object,
        active: Boolean
    }
}
</script>
