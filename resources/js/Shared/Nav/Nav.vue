<style>

  .mega-menu {
    display: none;
    text-align: left;
    width: 100%;
  }

  .hoverable {
    position: static;
  }

  .hoverable > a:after {
    content: "\25BC";
    font-size: 10px;
    padding-left: 6px;
    position: relative;
    top: -1px;
  }

  .hoverable:hover .mega-menu {
    display: block;
  }

  .toggleable > label:after {
    content: "\25BC";
    font-size: 10px;
    padding-left: 6px;
    position: relative;
    top: -1px;
  }

  .toggle-input {
    display: none;
  }
  .toggle-input:not(checked) ~ .mega-menu {
    display: none;
  }

  .toggle-input:checked ~ .mega-menu {
    display: block;
  }

  .toggle-input:checked + label {
    color: black;
    background: #d2d2d2;
  }

  .toggle-input:checked ~ label:after {
    content: "\25B2";
    font-size: 10px;
    padding-left: 6px;
    position: relative;
    top: -1px;
  }
  </style>
<template>
    <nav class="relative bg-gray-700 border-gray-50 text-white h-16">
        <div class="container mx-auto flex justify-between relative">
            <div class="absolute top-4 left-3">
              <a href="/">
                <img src="/img/emblem.png" class="w-10 h-10"/>
              </a>
            </div>
            <ul class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0"  viewBox="0 0 1155.000000 1280.000000" preserveAspectRatio="xMidYMid meet" class="w-12 h-12 m-2">

<g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)" fill="#dddddd" stroke="none">
<path d="M5727 12793 c-9 -2 -826 -708 -1815 -1567 l-1797 -1563 -5 1236 c-3 680 -9 1244 -13 1253 -24 49 -12 48 -689 48 -585 0 -635 -2 -654 -18 -12 -9 -27 -27 -33 -39 -8 -16 -11 -517 -11 -1826 l0 -1805 -321 -314 c-176 -172 -327 -325 -335 -340 -21 -40 -61 -1955 -42 -1996 19 -39 80 -67 118 -53 17 5 163 128 326 273 163 145 300 265 305 266 5 2 9 -1237 9 -3133 0 -2928 1 -3139 17 -3166 9 -15 28 -33 42 -39 18 -7 1534 -9 4989 -8 l4964 3 29 33 29 32 0 3095 0 3095 273 -218 c150 -121 283 -225 296 -231 32 -18 83 -6 112 25 l24 26 3 976 c2 708 -1 985 -9 1004 -7 17 -287 265 -713 631 -628 540 -1512 1301 -2911 2506 -258 222 -834 717 -1278 1100 -445 383 -819 701 -830 708 -22 12 -48 14 -80 6z"/>
</g>
</svg>
                <NavLinkHover v-for="category in categories" :key="category.id" :category="category" :active="$page.url === category.slug">
                <span v-if="category.logo"><img :src="'/storage/'+category.logo.path" class="h-12 my-2 inline-block" /></span>
                <span v-else>{{category.title}}</span>

                </NavLinkHover>
            </ul>
        </div>
    </nav>
</template>

<script>
import  NavLink from "./NavLink";
import NavLinkToggle from "./NavLinkToggle.vue";
import NavLinkHover from "./NavLinkHover.vue";
export default {
    components: {  NavLink, NavLinkToggle, NavLinkHover },

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        },
        categories() {
            return this.$page.props.categories;
        }
    }
};
</script>
