
<template>
    <div class="w-full bg-white" aria-label="Sidebar">
        <div class="bg-primary w-full p-4 text-white font-bold uppercase">Categories</div>
        <SideBarLinkHover v-for="category in categories" :key="category.id" :category="category" :active="$page.url === category.slug">{{category.title}}</SidebarLinkHover>
	</div>
</template>
<script>
import SideBarLinkHover from "./SideBarLinkHover.vue";

export default {
    components: {  SideBarLinkHover },
    computed: {
        categories() {
            return this.$page.props.categories;
        }
    }
};
</script>
