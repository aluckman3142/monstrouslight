<template>
        <li v-if="category.sub_categories.length > 0" class="hoverable list-none hover:bg-black text-gray-800 hover:text-gray-200 border-b border-gray-300">
            <Link class="h-12 relative block p-3 text-sm lg:text-base font-light hover:bg-black hover:text-white">
                <slot></slot>
            </Link>
            <div class="mega-menu shadow-xl bg-white relative left-0 z-20 max-w-sm ">
              <div class="w-full">
              <div v-for="subcategory in category.sub_categories" :key="subcategory.id" class="w-full">

                <li>
                  <Link class="block p-2 hover:bg-purple-700 text-gray-600 hover:text-white">{{subcategory.title}} Sublink</Link>
                </li>
                <li>
                  <Link class="block p-2 hover:bg-purple-700 text-gray-600 hover:text-white">{{subcategory.title}} Sublink</Link>
                </li>
              </div>
              </div>
            </div>

          </li>
          <li v-else class="hover:bg-black hover:text-white text-grey-200 list-none border-b border-gray-300">
        <Link
            :href="category.slug"
            class="h-12 relative block p-3 text-sm lg:text-base font-light"
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
