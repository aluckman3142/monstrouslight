<template>
    <li class="toggleable hover:bg-black text-white hover:text-gray-200">
        <input type="checkbox" value="selected" id="toggle-one" class="toggle-input">
          <label for="toggle-one" class="block cursor-pointer p-3 text-sm lg:text-base font-light uppercase">
            <slot></slot>
          </label>
          <div role="toggle" class="p-6 mega-menu mb-16 sm:mb-0 shadow-xl bg-black bg-opacity-70">
            <div class="container mx-auto w-full flex flex-wrap justify-between mx-2">
              <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 1</h3>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
              </ul>
              <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-r-0 lg:border-r lg:border-b-0 pb-6 pt-6 lg:pt-3">
                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 2</h3>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
              </ul>
              <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 border-b sm:border-b-0 sm:border-r md:border-b-0 pb-6 pt-6 lg:pt-3">
                <h3 class="font-bold text-xl text-white text-bold">Heading 3</h3>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
                <li>
                  <Link href="#" class="block p-3 hover:bg-blue-600 text-gray-300 hover:text-white">Category One Sublink</Link>
                </li>
              </ul>
              <ul class="px-4 w-full sm:w-1/2 lg:w-1/4 border-gray-600 pb-6 pt-6 lg:pt-3">
                <h3 class="font-bold text-xl text-white text-bold mb-2">Heading 4</h3>
                <li class="pt-3">
                 IMG HERE
                  </li>
                </ul>
              </div>
            </div>
          </li>

</template>

<script>

export default {
    props: {

    }
}
</script>
