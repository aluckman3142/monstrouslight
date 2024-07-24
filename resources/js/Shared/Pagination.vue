<template>
    <div>
        <Component
            class="px-1"
            :class="{ 'text-gray-400': ! link.url, 'font-bold' : link.active }"
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :key="link.label"
            :href="link.url"
            v-html="link.label"
        />
    </div>
</template>

<script>
export default {
    props: {
        links: Array
    }
}
</script>
