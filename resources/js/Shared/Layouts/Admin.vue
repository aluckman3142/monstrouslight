<template>
<div class="flex">
<SideBar/>
          <slot />
</div>
</template>

<script>

import SideBar from '../AdminNav/SideBar.vue'
    export default {
        components: { SideBar },
        computed: {
            username() {
                return this.$page.props.auth.user.username;
            },
        }
    }
</script>
