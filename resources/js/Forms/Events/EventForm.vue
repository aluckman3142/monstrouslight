<template>
        <div class="w-full max-w-6xl p-6 relative">
            <div class="flex justify-between items-start px-2 rounded-t border-b">
                <h3 class="text-xl font-semibold text-gray-900">
                    {{formTitle}}
                </h3> 
                <button @click="this.$emit('close');" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="w-full mt-4">
                <div class="flex flex-row justify-between border borger-gray-800 border-b-0">
                        <button :class="this.activeTab === 'details' ? 'bg-gray-200': ''" class="text-center p-4 w-1/6 hover:bg-gray-200" @click="this.activeTab = 'details'">Event Details</button>
                        <button :class="this.activeTab === 'image' ? 'bg-gray-200': ''"  class="text-center p-4 w-1/6 hover:bg-gray-200"  @click="this.activeTab = 'image'">Image</button>
                    </div>
                    <div :class="this.activeTab === 'details' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            
                            
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Event Name</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="event.title"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Event Name..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Event Description</div>
                                <div class="w-3/4">
                                    <textarea
                                    v-model="event.description"
                                    rows="3"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Event Description...">
                                    </textarea>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Price (£)</div>
                                <div class="w-3/4">
                                    <input
                                        type="number"
                                        step="0.01"
                                        v-model="event.price"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Price..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Date</div>
                                <div class="w-3/4">
                                    <Datepicker v-model="event.date"></Datepicker>
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">Start Time</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="event.start_time"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="Start Time..."
                                    >
                                </div>
                            </div>
                            <div class="flex flex-row justify-between py-2 px-8">
                                <div class="w-1/4 mt-2">End Time</div>
                                <div class="w-3/4">
                                    <input
                                        type="text"
                                        v-model="event.end_time"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        placeholder="End Time..."
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div :class="this.activeTab === 'image' ? '': 'hidden'" >
                        <div class="p-2 border-2 borger-gray-800 border-t-0 rounded-b-lg">
                            <div class="py-2 px-8">
                    <label class="block text-sm font-medium text-gray-900">Event Image</label>
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
                        </div>
                    </div>
               
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="hover:bg-primary border border-primary p-4 text-primary hover:text-white rounded-full text-center flex flex-row gap-4" @click="this.$emit('event-added', event);">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
{{formTitle}}</button>
                <button class="hover:bg-red-500 border border-red-500 p-4 text-red-500 hover:text-white rounded-full text-center flex flex-row gap-4" @click="this.$emit('close');">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
Cancel</button>
            </div>
        </div>
 
</template>

<script>
 import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
  data() {
    return {
        activeTab: 'details',
      dragging: false,
      previewUrl: null,
      previewLogoUrl: null,
    }
  },
  components: { Datepicker },
  props: {
    formTitle: {
      required: true,
      type: String
    },
    event: {
        required: true,
        type: Object
    }
  },
  methods: {
    fileDropped(event) {
        event.preventDefault()
        const file = event.dataTransfer.files[0]
        this.event.image = file
        console.log(this.event.image)
        this.previewUrl = URL.createObjectURL(file);
        this.event.uploadImage = true
        console.log(this.event.uploadImage)
    },
   
    dragOver(event) {
        event.preventDefault()
        this.dragging = true
    },
    previewImage(event) {
        event.preventDefault()
        const file = event.target.files[0];
        this.event.image = file
        console.log(this.event.image)
        this.previewUrl = URL.createObjectURL(file);
        this.event.uploadImage = true
    },
    
    resetImage() {
        this.previewUrl = null
        this.event.uploadImage = false
    },
   
  },
  watch: {
        event() {
            this.previewUrl = this.event.image ? '../storage/'+this.event.image.path : null
            
           this.event.uploadImage = false
           console.log(this.event)
        }
     },
}

</script>
