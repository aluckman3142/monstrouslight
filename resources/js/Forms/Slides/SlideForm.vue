<template>
  
        <div class="w-full max-w-6xl p-6 relative">
            <div class="flex justify-between items-start p-2 rounded-t border-b">
               
                <button @click="this.$emit('close');" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex flex-col justify-between">
                <div class="w-full flex flex-row justify-between gap-2 p-4">
                <div class="mb-4 w-1/4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Slide Title</label>
                    <input
                        type="text"
                        v-model="slide.title"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Slide Title..."
                    >
                </div>
                <div class="mb-4 w-1/4">
                    <label
                        for="message"
                        class="block mb-2 text-sm font-medium text-gray-900"
                    >
                        Slide Text
                    </label>
                    <input
                        type="text"
                        v-model="slide.text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Button Text..."
                    >
                </div>
                <div class="mb-4 w-1/4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Button Text</label>
                    <input
                        type="text"
                        v-model="slide.button_text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Button Text..."
                    >
                </div>
                <div class="mb-4 w-1/4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Button Path</label>
                    <input
                        type="text"
                        v-model="slide.button_path"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Button Path..."
                    >
                </div>

                </div>
                <div class="full m-4 flex flex-row justify-between gap-2">
                <div class="w-1/3">
                    <label class="block text-sm font-medium text-gray-900">Slide Image</label>
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
                <div class="w-1/3">
                    <label class="block text-sm font-medium text-gray-900">Slide Logo</label>
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
                <div class="w-1/3">
                    <label class="block text-sm font-medium text-gray-900">Slide Product Image</label>
                    <div
                        v-if="!this.previewProductUrl"
                        @dragover="dragOver"
                        @dragleave="dragging = false"
                        @drop="productDropped"
                        :class="[dragging ? 'border-indigo-500' : 'border-gray-300']"
                        class="my-2 flex flex-col p-2 items-center border border-gray-300 rounded-lg bg-gray-50 gap-3 h-36"
                    >
                   
                        <p class="text-xl text-gray-800">Drop files to upload</p>
                        <p class="text-gray-800 text-sm">- or -</p>
                        <label class=" bg-white px-4 h-9 inline-flex items-center border border-gray-300 rounded-lg text-gray-500 text-sm hover:bg-gray-100">
                            Select file
                            <input type="file" @change="previewProduct" class="sr-only">
                        </label>
                        <p class="text-gray-500 text-xs">Maximum uplaod file size: 512MB</p>
                    </div>
                    <div
                        v-else
                        class="relative my-2"
                    >
                        <img class="w-full" :src="previewProductUrl">
                        <button class="absolute top-5 right-5 bg-red-500 rounded-full z-20 p-2 text-white" @click="resetProduct">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Delete Image</span>
                        </button>
                    </div>
                </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex flex-row items-center p-4 rounded-b border-t border-gray-200 w-full relative">
                <button class="w-44 bg-emerald-300 p-4 text-white hover:bg-emerald-500 font-bold text-center flex flex-row gap-4 " @click="this.$emit('slide-added', slide);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{formTitle}}</button>
                <button class="absolute right-4 w-44 bg-red-400 p-4 text-white hover:bg-red-500 font-bold text-center flex flex-row gap-4" @click="this.$emit('close');">
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
      previewProductUrl: null
    }
  },
  props: {
    slide: {
        required: true,
        type: Object
    }
  },
  methods: {
    fileDropped(event) {
        event.preventDefault()
        const file = event.dataTransfer.files[0]
        this.slide.image = file
        console.log(this.slide.image)
        this.previewUrl = URL.createObjectURL(file);
    },
    logoDropped(event) {
        event.preventDefault()
        const file = event.dataTransfer.files[0]
        this.slide.logo = file
        console.log(this.slide.logo)
        this.previewLogoUrl = URL.createObjectURL(file);
    },
    productDropped(event) {
        event.preventDefault()
        const file = event.dataTransfer.files[0]
        this.slide.product = file
        console.log(this.slide.product)
        this.previewProductUrl = URL.createObjectURL(file);
    },
    dragOver(event) {
        event.preventDefault()
        this.dragging = true
    },
    previewImage(event) {
        event.preventDefault()
        const file = event.target.files[0];
        this.slide.image = file
        console.log(this.slide.image)
        this.previewUrl = URL.createObjectURL(file);
    },
    previewLogo(event) {
        event.preventDefault()
        const file = event.target.files[0];
        this.slide.logo = file
        console.log(this.slide.logo)
        this.previewLogoUrl = URL.createObjectURL(file);
    },
    previewProduct(event) {
        event.preventDefault()
        const file = event.target.files[0];
        this.slide.product = file
        console.log(this.slide.product)
        this.previewProductUrl = URL.createObjectURL(file);
    },
    resetImage() {
        this.previewUrl = null
    },
    resetLogo() {
        this.previewLogoUrl = null
    },
    resetProduct() {
        this.previewProductUrl = null
    }
  },
  watch: {
        slide() {
            this.previewUrl = this.slide.image ? '../storage/'+this.slide.image.path : null
            this.previewLogoUrl = this.slide.logo ? '../storage/'+this.slide.logo.path : null
            this.previewProductUrl = this.slide.product ? '../storage/'+this.slide.product.path : null
            this.slide.image = {}
            this.slide.logo = {}
            this.slide.product = {}
        }
     },
}

</script>
