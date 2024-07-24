<template>
    <div class="flex w-full justify-end">
        <a v-if="username != null" :href="'/my-account'" as="button" class="text-white hover:text-gray-800 font-bold text-sm flex items justify-items-center mr-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
</svg>

            <p style="padding-top:2px;">My Account</p>
</a>
        <Link v-if="username != null" :href="'/my-account?tab=wishlist'" as="button" class="text-white hover:text-gray-800 font-bold text-sm flex items justify-items-center mr-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor"> 
                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
            </svg>
            <p style="padding-top:2px;">Wishlist</p>
        </Link>
        <Link v-if="isAdmin" :href="'/dashboard'" as="button" class="text-white hover:text-gray-800 font-bold text-sm flex items justify-items-center mr-8">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
</svg>

            <p style="padding-top:2px;">Dashboard</p>
        </Link>
        <Link v-if="username != null" :href="'/logout'" method="post" as="button" class="text-white hover:text-gray-800 font-bold text-sm flex items justify-items-center mr-8">
             <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
            </svg>
            <p style="padding-top:2px;">Logout</p>
        </Link>
        <p style="padding-top:2px;" v-if="username !=null" class="text-white font-bold text-sm flex">Welcome {{username}}</p>
       
        <Link v-if="!username"  :href="'/login'" class="text-white hover:text-gray-800 font-bold text-sm flex ">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            <p style="padding-top:2px;">Log In / Register</p>
        </Link>
    </div>
</template>

<script>
    export default {
        computed: {
            username() {
            return this.$page.props.auth.user.username;
            },
            isAdmin() {
            return this.$page.props.auth.user.is_admin;
            },
        }
    }
</script>
