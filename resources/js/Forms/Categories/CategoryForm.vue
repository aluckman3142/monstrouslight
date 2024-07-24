<template>
        <div class="w-full max-w-6xl p-6 relative">
            <div class="flex justify-between items-start p-2 rounded-t border-b">
                <button @click="this.$emit('close');" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex flex-row justify-between">
                <div class="w-1/2 m-4">
                <div class="mb-4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Category Name</label>
                    <input
                        type="text"
                        v-model="category.title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Category Name..."
                    >
                </div>
                <div class="mb-4">
                    <label
                        for="message"
                        class="block mb-2 text-sm font-medium text-gray-900"
                    >
                        Short Category Description
                    </label>
                    <textarea
                    v-model="category.short_desc"
                    rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Short Category Description...">
                    </textarea>
                </div>
                <div class="mb-4">
                    <label
                        for="message"
                        class="block mb-2 text-sm font-medium text-gray-900"
                    >
                        Long Category Description
                    </label>
                    <textarea
                    v-model="category.long_desc"
                    rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Long Category Description...">
                    </textarea>
                </div>
                </div>
                <div class="w-1/2 m-4">
                <div>
                    <label class="block text-sm font-medium text-gray-900">Category Image</label>
                    <div
                        v-if="!this.previewUrl"
                        @dragover="dragOver"
                        @dragleave="dragging = false"
                        @drop="fileDropped"
                        :class="[dragging ? 'border-indigo-500' : 'border-gray-300']"
                        class="my-2 flex flex-col p-2 items-center border border-gray-300 rounded-lg bg-gray-50 gap-3 h-36"
                    >
                   
                        <p class="text-xl text-gray-800">Drop files to upload</p>
                        <p class="text-gray-800 text-sm">- or -</p>
                        <label class=" bg-white px-4 h-9 inline-flex items-center border border-gray-300 rounded-lg text-gray-500 text-sm hover:bg-gray-100">
                            Select file
                            <input type="file" @change="previewImage" class="sr-only">
                        </label>
                        <p class="text-gray-500 text-xs">Maximum uplaod file size: 512MB</p>
                    </div>
                    <div
                        v-else
                        class="relative my-2"
                    >
                        <img class="w-full" :src="previewUrl">
                        <button class="absolute top-5 right-5 bg-red-500 rounded-full z-20 p-2 text-white" @click="resetImage">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Delete Image</span>
                        </button>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-900">Category Logo</label>
                    <div
                        v-if="!this.previewLogoUrl"
                        @dragover="dragOver"
                        @dragleave="dragging = false"
                        @drop="logoDropped"
                        :class="[dragging ? 'border-indigo-500' : 'border-gray-300']"
                        class="my-2 flex flex-col p-2 items-center border border-gray-300 rounded-lg bg-gray-50 gap-3 h-36"
                    >
                   
                        <p class="text-xl text-gray-800">Drop files to upload</p>
                        <p class="text-gray-800 text-sm">- or -</p>
                        <label class=" bg-white px-4 h-9 inline-flex items-center border border-gray-300 rounded-lg text-gray-500 text-sm hover:bg-gray-100">
                            Select file
                            <input type="file" @change="previewLogo" class="sr-only">
                        </label>
                        <p class="text-gray-500 text-xs">Maximum uplaod file size: 512MB</p>
                    </div>
                    <div
                        v-else
                        class="relative my-2"
                    >
                        <img class="w-full" :src="previewLogoUrl">
                        <button class="absolute top-5 right-5 bg-red-500 rounded-full z-20 p-2 text-white" @click="resetLogo">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Delete Image</span>
                        </button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="w-1/3 bg-emerald-300 p-4 text-white hover:bg-emerald-500 font-bold text-center flex flex-row gap-4 " @click="this.$emit('category-added', category);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
{{formTitle}}</button>
                <button class="w-1/3 bg-red-400 p-4 text-white hover:bg-red-500 font-bold text-center flex flex-row gap-4" @click="this.$emit('close');">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
Cancel</button>
            </div>
        </div>
 
</template>

<script>

export default {
  data() {
    return {
      dragging: false,
      previewUrl: null,
      previewLogoUrl: null,
    }
  },
  props: {
   
    category: {
        required: true,
        type: Object
    }
  },
  methods: {
    fileDropped(event) {
        event.preventDefault()
        const file = event.dataTransfer.files[0]
        this.category.image = file
        console.log(this.category.image)
        this.previewUrl = URL.createObjectURL(file);
        this.category.uploadImage = true
        console.log(this.category.uploadImage)
    },
    logoDropped(event) {
        event.preventDefault()
        const file = event.dataTransfer.files[0]
        this.category.logo = file
        console.log(this.category.logo)
        this.previewLogoUrl = URL.createObjectURL(file);
        this.category.uploadLogo = true
    },
    dragOver(event) {
        event.preventDefault()
        this.dragging = true
    },
    previewImage(event) {
        event.preventDefault()
        const file = event.target.files[0];
        this.category.image = file
        console.log(this.category.image)
        this.previewUrl = URL.createObjectURL(file);
        this.category.uploadImage = true
    },
    previewLogo(event) {
        event.preventDefault()
        const file = event.target.files[0];
        this.category.logo = file
        console.log(this.category.logo)
        this.previewLogoUrl = URL.createObjectURL(file);
        this.category.uploadLogo = true
    },
    resetImage() {
        this.previewUrl = null
        this.category.uploadImage = false
    },
    resetLogo() {
        this.previewLogoUrl = null
        this.category.uploadLogo = false
    }
  },
  watch: {
        category() {
            this.previewUrl = this.category.image ? '../storage/'+this.category.image.path : null
            this.previewLogoUrl = this.category.logo ? '../storage/'+this.category.logo.path : null
           this.category.uploadImage = false
           this.category.uploadLogo = false
           console.log(this.category)
        }
     },
}

</script>
