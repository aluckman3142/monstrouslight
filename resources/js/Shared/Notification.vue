<template>
    <div class="relative flex max-w-sm w-full mt-4 mr-4  bg-red-400 text-white font-bold shadow p-4 z-10 bg-opacity-75">
         <div class="mr-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z" />
</svg>
        </div>
        <div class="flex-1 text-grey-800">
            {{error}}
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
        //message: String,
        error: String

    },
}
</script>
