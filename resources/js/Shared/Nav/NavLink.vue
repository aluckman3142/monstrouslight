<template>
    <li class="hover:bg-black text-white">
        <Link
            :href="href"
            :method="method"
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
        active: Boolean,
        href: String,
        method: String
    }
}
</script>
