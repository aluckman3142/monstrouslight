<template>
    <Head>
        <title>Login</title>
        <meta type="description" content="Login Description" head-key="description">
    </Head>
    <main class="mt-10">
        <section class="p-4 rounded-xl max-w-xl mx-auto border border-gray-300">
     <form @submit.prevent="submitLogin">
         <div class="mt-6 mx-10">
            <img
                src="/img/logo.png"
                alt="Monstrous Light Games"
                width="300"
                class="mx-auto "
            />
         </div>
         <h1 class="text-3xl mb-2 text-center w-full font-bold text-gray-700">Login</h1>
        <div class="mb-6 mx-10">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="email"
            >
                Email
            </label>
            <input class="border p-2 w-full bg-gray-100 border-gray-300"
                v-model="user.email"
                type="email"
            >
            <div v-if="errors.email" v-text="errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-8 mx-10">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="password"
            >
                Password
            </label>
            <div class="relative">
            <svg v-if="this.passwordType === 'password'" @click="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-2 right-3 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <svg v-else @click="showPassword" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-2 right-3 cursor-pointer">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />
            </svg>
            <input class="border p-2 w-full bg-gray-100 border-gray-300"
                v-model="user.password"
                :type="passwordType"
            >
            </div>
            <div v-if="errors.password" v-text="errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6 mx-10">
            <button type="submit"
            class="bg-primary w-full text-white rounded py-2 px-4 hover:bg-purple-800"
            :disabled="processing">
            Login
            </button>
        </div>
        <div class="flex flex-row">
        <Link href="/" class="w-1/2 ml-10 text-orange-500 test-xs hover:underline">Forgot Password?</Link>
        <p class="w-1/2 text-right mr-10"> No Account? <Link href="/register" class=" text-orange-500 test-xs hover:underline">Sign Up</Link></p>
        </div>
     </form>
     
        </section>
    </main>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    layout: null,
    data () {
        return {
            user: useForm({
                email: '',
                password: ''
            }),
            processing: false,
            passwordType: 'password'
        }
    },
     props: {
        errors: Object
    },
    methods: {
        submitLogin() {
            Inertia.post('/login', this.user, {
                onStart: () => { this.processing = true },
                onFinish: () => { this.processing = false }
            })
        },
        showPassword() {
            if (this.passwordType == 'password') {
                this.passwordType = 'text'
            } else {
             this.passwordType = 'password'
            }
        }
    },
}
</script>
