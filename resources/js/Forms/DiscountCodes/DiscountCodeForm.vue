<style>
    .dp__menu {
       
        top: 30px !important;
    }
</style>
<template>
    
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
                <div class="w-1/3 m-4">
                <div class="mb-4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Discount Code</label>
                    <input
                        type="text"
                        v-model="discountCode.code"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Discount Code..."
                    >
                </div>
                </div>

                <div class="w-1/3 m-4">
                <div class="mb-4">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900">Discount Value</label>
                    <input
                        type="text"
                        v-model="discountCode.value"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Discount Code..."
                    >
                </div>
                </div>
                <div class="w-1/3 m-2">
               
               <label class="block mb-2 text-sm font-medium text-gray-900">Discount Type</label>
<select v-model="discountCode.type" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-3">
    <option value="Per Cent">Per Cent</option>
    <option value="Per Cent">Amount</option>
</select>
         
           </div>
               
              
                </div>
                <div class="flex flex-row justify-between">
                    <div class="w-1/2 m-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Start Date</label>
                    <Datepicker v-model="discountCode.start_date"></Datepicker>
                    </div>
                    <div class="w-1/2 m-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">End Date</label>
                    <Datepicker v-model="discountCode.end_date"></Datepicker>
                    </div>
                </div>
       
            
            <!-- Modal footer -->
            <div class="flex items-center p-4 space-x-4 rounded-b border-t border-gray-200 ">
                <button class="w-1/3 bg-emerald-300 p-4 text-white hover:bg-emerald-500 font-bold text-center flex flex-row gap-4 " @click="this.$emit('discount-code-added', discountCode);">
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
    import Datepicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'

export default {
  data() {
    return {
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
    discountCode: {
        required: true,
        type: Object
    }
  },
  methods: {
  },
  watch: {
       
  },
}

</script>
