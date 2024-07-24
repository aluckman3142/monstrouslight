<template>
    <Head>
        <title>Users</title>
        <meta type="description" content="Users Description" head-key="description">
    </Head>
    <div class="container mx-auto max-w-screen-lg">
    <div class="flex justify-between my-6">
        <div class="flex items-center">
            <h1 class="text-4xl font-bold">Users Page</h1>
            <Link v-if="can.createUser" href="/users/create" class="text-blue-500 text-sm ml-3">New User</Link>
        </div>
        <input
            v-model="search"
            type="text"
            placeholder="Search..."
            class="border px-2 rounded-lg"
        >
    </div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    User name
                </th>
                <th scope="col" class="py-3 px-6">
                    Color
                </th>
                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr
            v-for="user in users.data"
            :key="user.id"
            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{user.name}}
                </th>
                <td class="py-4 px-6">
                    Sliver
                </td>
                <td class="py-4 px-6">
                    Laptop
                </td>
                <td class="py-4 px-6">
                    $2999
                </td>
                <td class="py-4 px-6">
                    <Link v-if="user.can.editUser" :href="`/users/${user.id}/edit`" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link>
                </td>
            </tr>
        </tbody>
    </table>
    <Pagination
        :links="users.links"
        class="mt-6"
    />
</div>
</div>
</template>

<script>
import Pagination from '../../Shared/Pagination';
import { Inertia } from '@inertiajs/inertia';
import debounce from 'lodash.debounce'
export default {
     data () {
        return {
            search: this.filters.search
        }
    },
    components: { Pagination },
    methods: {
        onSearchInput(){
            console.log('search input changed' + this.search),
            Inertia.get('/users', { search: this.search }, {
                preserveState: true,
                replace: true
            })
        }
    },
    props: {
        users: Object,
        filters: Object,
        can: Object
    },
    watch: {
        search() {
            this.debouncedWatch();
        }
     },
     created() {
        this.debouncedWatch = debounce(() => {
            this.onSearchInput()
        }, 400)
     }

};
</script>
