<template>
    <Head>
        <title>Create User</title>
        <meta type="description" content="Create User Description" head-key="description">
    </Head>
    <div class="container mx-auto max-w-screen-lg">
     <h1 class="text-3xl">Create A New User</h1>
     <form @submit.prevent="submitUser" class="max-w-md mx-auto mt-">
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="name"
            >
                Name
            </label>
            <input class="border border-gray-400 p-2 w-full"
                v-model="user.name"
                type="text"
                name="name"
                id="name"

            >
            <div v-if="errors.name" v-text="errors.name" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="email"
            >
                Email
            </label>
            <input class="border border-gray-400 p-2 w-full"
                v-model="user.email"
                type="email"
                name="email"
                id="name"

            >
            <div v-if="errors.email" v-text="errors.email" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
            for="password"
            >
                Password
            </label>
            <input class="border border-gray-400 p-2 w-full"
                v-model="user.password"
                type="password"
                name="name"
                id="password"

            >
            <div v-if="errors.password" v-text="errors.password" class="text-red-500 text-xs mt-1"></div>
        </div>
        <div class="mb-6">
            <button type="submit"
            class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
            :disabled="processing">
            Submit
            </button>
        </div>
     </form>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';


export default {
     data () {
        return {
            user: useForm({
                name: '',
                email: '',
                password: ''
            }),
            processing: false
        }
    },
    props: {
        errors: Object
    },
    methods: {
        submitUser() {
            Inertia.post('/users', this.user, {
                onStart: () => { this.processing = true },
                onFinish: () => { this.processing = false }
            })
        }
    },
};
</script>

