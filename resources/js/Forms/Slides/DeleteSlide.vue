<template>
    <div
        v-if="showDeleteForm"
        class="fixed inset-0 w-full h-screen flex items-center justify-center bg-black bg-opacity-70 z-20"
    >

        <div class="relative px-4 min-h-screen md:flex md:items-center md:justify-center">
    <div class="w-full h-full absolute z-10 inset-0"></div>
    <div class="bg-white rounded-lg md:max-w-md md:mx-auto p-4 fixed inset-x-0 bottom-0 z-50 mb-4 mx-4 md:relative">
      <div class="md:flex items-center">
        <div class="rounded-full border border-gray-300 flex items-center justify-center w-16 h-16 flex-shrink-0 mx-auto">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
</svg>
        </div>
        <div class="mt-4 md:mt-0 md:ml-6 text-center md:text-left">
          <p class="font-bold">Delete Slide - {{slide.title}}</p>
          <p v-if="slide.deleted_at" class="text-sm text-gray-700 mt-1">Are you sure? This will permanantly delete the Slide. This action cannot be undone.
          </p>
          <p v-else class="text-sm text-gray-700 mt-1">Are you sure you wish to delete the Slide?
          </p>
        </div>
      </div>
      <div class="text-center md:text-right mt-4 md:flex md:justify-end">
        <button @click="this.$emit('delete-slide', slide);" class="block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-red-200 hover:bg-red-300 text-red-700 rounded-lg font-semibold text-sm md:ml-2 md:order-2">Delete
            Slide</button>
        <button @click="this.$emit('close');" class="block w-full md:inline-block md:w-auto px-4 py-3 md:py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-semibold text-sm mt-4
          md:mt-0 md:order-1">Cancel</button>
      </div>
    </div>
  </div>
    </div>
</template>

<script>

export default {
  data() {
    return {

    }
  },
  props: {
    showDeleteForm: {
      required: true,
      type: Boolean
    },
    slide: {
        required: true,
        type: Object
    },

  },

}

</script>
