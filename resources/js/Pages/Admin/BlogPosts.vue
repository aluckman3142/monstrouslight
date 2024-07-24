<template>
    <Head>
        <title>Blog Posts</title>
        <meta type="description" content="Dashboard description" head-key="description">
    </Head>
    <div class="w-full min-h-screen bg-gray-100 relative max-w-6xl">
        <div class="h-56 w-full bg-gradient-to-r from-purple-500 to-green-600">
            <div class="flex flex-row justify-between p-8">
                <div>
                    <div class="relative w-full flex flex-row">
                        <svg aria-hidden="true" class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        <input v-model="search" type="text" id="search-dropdown" class="ml-4 block w-full z-20 text-sm text-white placeholder-white bg-transparent focus:ring-white" placeholder="Search Blog Posts..." required="">
                    </div>
                </div>
                <AdminTopNav></AdminTopNav>
            </div>
            <div class="flex flex-row justify-between p-8">
                <div class="flex flex-row justify-between gap-6 text-white">
                    <h2 class="text-4xl font-thin">Blog Posts</h2>
                    <svg @click="addNewBlogPost()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mt-3 hover:text-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div class="mt-3">
                        <label for="orange-toggle" class="inline-flex relative items-center mr-5 cursor-pointer">
                    <input type="checkbox" v-model="showDeleted" id="orange-toggle" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    <span class="ml-3">Show Deleted</span>
                    </label>
                    </div>


                </div>
                <div>
                    <BreadCrumbs :pageName="'Dicount Codes'"/>
                </div>
            </div>
        </div>
     
               
        <div class="mx-8 bg-white relative -top-8 rounded-sm p-8">
            This is where you can add and manage blog posts to be displayed on the online store. Click on the 
            <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 inline">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg> icon above to add a new blog post.
    <table class="w-full text-sm text-left text-gray-500 mt-8">
        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Title
                </th>
                <th scope="col" class="py-3 px-6">
                    Snippet
                </th>
                <th scope="col" class="py-3 px-6">
                    Youtube Link
                </th>
                <th scope="col" class="text-center py-3 px-6">
                    Created By
                </th>
                <th scope="col" class="text-center py-3 px-6">
                    Enabled
                </th>
                <th scope="col" class="py-3 px-6">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b" v-for="blogPost in blogPosts" :key="blogPost.id" :class=" blogPost.id % 2 === 0 ? 'bg-gray-100' : 'bg-white'">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap" :class="blogPost.enabled == false ? 'bg-red-300' : ''">
                    {{blogPost.title}}
                </th>
                <td class="py-4 px-6" :class="blogPost.enabled == false ? 'bg-red-300' : ''">
                    {{blogPost.snippet}}
                </td>
                <td class="py-4 px-6" :class=" blogPost.enabled == false ? 'bg-red-300' : ''">
                    {{blogPost.youtube_link}}
                </td>
                <td class="py-4 px-6 text-center" :class=" blogPost.enabled == false ? 'bg-red-300' : ''">
                    {{blogPost.author.name}} at {{blogPost.created_at}}
                </td>
                <td class="py-4 px-6" :class=" blogPost.enabled == false ? 'bg-red-300' : ''">
                    <label :for="blogPost.id+'-toggle'" class="inline-flex relative items-center mr-5 cursor-pointer">
                    <input type="checkbox" v-model="blogPost.enabled" :value="blogPost.enabled" :id="blogPost.id+'-toggle'" class="sr-only peer" @input="changeStatus(blogPost.id)">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-orange-500"></div>
                    </label>
                </td>
                <td class="py-12 px-6 flex flex-row" :class=" blogPost.enabled == false ? 'bg-red-300' : ''">
                    <button @click="editBlogPost(blogPost)" class="font-medium text-blue-600 hover:text-red-500 mr-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                        </svg>
                    </button>
                    <button v-if="!showDeleted" @click="deleteBlogPost(blogPost)" class="font-medium text-blue-600 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                        </svg>

                    </button>
                    <button v-else @click="restoreBlogPost(blogPost)" class="font-medium text-blue-600 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 15l-6 6m0 0l-6-6m6 6V9a6 6 0 0112 0v3" />
                            </svg>

                    </button>
                    <button v-if="showDeleted" @click="destroyBlogPost(blogPost)" class="font-medium text-blue-600 hover:text-red-500 ml-2">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="absolute right-0 top-0 mr-4 fade-in" v-if="showNotification">
                <Notification v-for="error in errors" :key="error" :error="error"/>
                <Message v-if="message" :message="message"/>
             </div>
        </div>
        <transition name="fade" appear>
            <div class="absolute top-0 left-0 right-0 bottom-0 z-[99] w-full bg-gray-800 bg-opacity-50" v-if="showAddModal" @click="showAddModal = false">
            </div>
        </transition>
        <transition name="slide" appear>
            <div class="absolute top-0 left-0 right-0 bottom-0 w-full z-[100] h-screen p-8" v-if="showAddModal">
                <div class="bg-white h-full rounded-lg">
                <BlogPostForm
            
            :formTitle="formTitle"
            :blogPost="blogPost"
            @blog-post-added="submitBlogPost"
            @close="close"
        />
    </div>
            </div>
        </transition>
        <DeleteBlogPost
         :showDeleteForm="showDeleteForm"
         :blogPost="blogPost"
         @delete-blog-post="submitDeleteBlogPost"
         @close="close"
        />

    </div>
</template>

<script>
import Admin from '../../Shared/Layouts/Admin.vue'
import Notification from '../../Shared/Notification.vue'
import Message from '../../Shared/Message.vue'
import BlogPostForm from "../../Forms/BlogPosts/BlogPostForm.vue"
import DeleteBlogPost from "../../Forms/BlogPosts/DeleteBlogPost.vue"
import { Inertia } from '@inertiajs/inertia'
import debounce from 'lodash.debounce'
import BreadCrumbs from '../../Shared/AdminNav/BreadCrumbs.vue'
import AdminTopNav from '../../Shared/AdminNav/AdminTopNav.vue'

export default {
    data () {
        return {
            showDeleted: false,
            search: this.filters.search,
            showAddModal: false,
            showDeleteForm: false,
            showNotification: false,
            formTitle:'',
            previewUrl: '',
            blogPost: {},

        }
    },
    layout: Admin,
    components: { Message, Notification, BlogPostForm, DeleteBlogPost, BreadCrumbs, Notification, Notification, AdminTopNav },
    props: {
        filters: Object,
        errors: Object
    },
     methods: {
        onSearchInput(){
            console.log('search input changed' + this.search)
            ,
             Inertia.get('/dashboard/blog-posts', { deleted:this.showDeleted, search: this.search }, {
                 preserveState: true,
                 replace: true
             })
        },
        changeStatus(blogPostId) {
             Inertia.post('/dashboard/blog-posts/status/'+blogPostId, {
                preserveState: true,
                 replace: true
             })
             setTimeout(() =>
            this.showNotification = true
            , 1000);
             this.close()
             setTimeout(() =>
            this.showNotification = false
            , 7000);
        },
        addNewBlogPost(){
            this.showAddModal = true
            this.formTitle = 'Add Blog Post'
        },
        editBlogPost(blogPost){
            this.blogPost = blogPost
            this.showAddModal = true
            this.formTitle = 'Edit Blog Post'
        },
        deleteBlogPost(blogPost){
            this.blogPost = blogPost
            this.showDeleteForm = true
        },
        destroyBlogPost(blogPost){
            this.blogPost = blogPost
            this.showDeleteForm = true
        },
        submitDeleteBlogPost(blogPost){

            if (blogPost.deleted_at){
                Inertia.delete('/dashboard/blog-posts/'+blogPost.id+'/destroy')
            } else {
                Inertia.delete('/dashboard/blog-posts/'+blogPost.id)
            }
             setTimeout(() =>
            this.showNotification = true
            , 1000);
             this.close()
             setTimeout(() =>
            this.showNotification = false
            , 7000);
        },
        restoreBlogPost(blogPost){
           Inertia.get('/dashboard/blog-posts/restore/'+blogPost.id)
        },
        submitBlogPost(blogPost, blogPostProducts){
            blogPost.blogPostProducts = blogPostProducts
            if (blogPost.uploadImages === false){
                this.blogPost.images = null
            }
            if (blogPost.id){
                Inertia.post('/dashboard/blog-posts/'+blogPost.id, blogPost , {
                  preserveState: true,
                    replace: true
                })
            } else {
                Inertia.post('/dashboard/blog-posts', blogPost , {
                 preserveState: true,
                    replace: true
                })
            }
            setTimeout(() =>
            this.showNotification = true
            , 1000);
            this.close()

            setTimeout(() =>
            this.showNotification = false
            , 7000);

        },
        close() {
            this.showAddModal = false
            this.showDeleteForm = false
            this.blogPost = {}
        }
    },
    computed: {
        blogPosts() {
            return this.$page.props.blogPosts;
        },
        message() {
            return this.$page.props.flash.message;
        },
    },
    watch: {
        search() {
            this.debouncedWatch();
        },
        showDeleted() {
             Inertia.get('/dashboard/blog-posts', { deleted:this.showDeleted, search:this.search }, {
                 preserveState: true,
                 replace: true
             })
        },
     },
     created() {
        this.debouncedWatch = debounce(() => {
            this.onSearchInput()
        }, 400)
     }
};
</script>
