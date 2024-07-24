<template>
    <div
        v-if="showImportForm"
        class="fixed inset-0 w-full h-screen flex items-center justify-center bg-black bg-opacity-70 z-20"
    >
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-6 relative">
            <div class="flex justify-between items-start p-2 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{formTitle}}
                </h3>
                <button @click="this.$emit('close');" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="flex flex-row justify-between">
                <div class="w-full m-4">
                <div class="mb-4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Product CSV</label>
                    <input type="file" class="custom-file-input" id="customFile" @change="onFileChange">
                </div>
               
                </div>
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="w-1/3 bg-emerald-300 p-4 text-white hover:bg-emerald-500 font-bold text-center flex flex-row gap-4 " @click="this.$emit('products-imported', file);">
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
    </div>
</template>

<script>

export default {
  data() {
    return {
      dragging: false,
      previewUrl: null,
    }
  },
  props: {
    showImportForm: {
      required: true,
      type: Boolean
    },
    formTitle: {
      required: true,
      type: String
    }
  },
  methods: {
    
    onFileChange(e) {
        this.file = ''
        let vm = this;
        this.file = e.target.files[0];
    }
    
  },
  watch: {
        product() {
           console.log(this.product)
        }
     },
}

</script>
