"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_Pages_Product_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Product.vue?vue&type=script&lang=js":
/*!********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Product.vue?vue&type=script&lang=js ***!
  \********************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Shared_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../Shared/imageCarousel.vue */ "./resources/js/Shared/imageCarousel.vue");
/* harmony import */ var vue_star_rating__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-star-rating */ "./node_modules/vue-star-rating/dist/VueStarRating.common.js");
/* harmony import */ var vue_star_rating__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_star_rating__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _Shared_Product_vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../Shared/Product.vue */ "./resources/js/Shared/Product.vue");
/* harmony import */ var _inertiajs_inertia__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @inertiajs/inertia */ "./node_modules/@inertiajs/inertia/dist/index.js");




/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      activeTab: 'description',
      currentSlide: 0
    };
  },
  components: {
    imageCarousel: _Shared_imageCarousel_vue__WEBPACK_IMPORTED_MODULE_0__["default"],
    Product: _Shared_Product_vue__WEBPACK_IMPORTED_MODULE_2__["default"],
    StarRating: (vue_star_rating__WEBPACK_IMPORTED_MODULE_1___default())
  },
  props: {},
  computed: {
    product: function product() {
      return this.$page.props.product;
    },
    related_products: function related_products() {
      return this.$page.props.related_products;
    },
    features: function features() {
      return this.$page.props.product.key_features.split(',');
    }
  },
  methods: {
    showImage: function showImage(index) {
      this.currentSlide = index;
    } // updateProductRating(product){
    //     const params = product
    //     Inertia.post('/update-product-rating/'+product.id, product, {
    //     preserveScroll: true,
    //             preserveState: true,
    //             replace: true
    //         })
    // }

  },
  mounted: function mounted() {
    var shareScript = document.createElement('script');
    shareScript.setAttribute('src', '//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6328abae101e1b79');
    document.head.appendChild(shareScript);
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Shared/imageCarousel.vue?vue&type=script&lang=js":
/*!***************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Shared/imageCarousel.vue?vue&type=script&lang=js ***!
  \***************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue3_carousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue3-carousel */ "./node_modules/vue3-carousel/dist/carousel.es.js");
/* harmony import */ var vue3_carousel_dist_carousel_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue3-carousel/dist/carousel.css */ "./node_modules/vue3-carousel/dist/carousel.css");


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  props: {
    slides: Object
  },
  components: {
    Carousel: vue3_carousel__WEBPACK_IMPORTED_MODULE_0__.Carousel,
    Slide: vue3_carousel__WEBPACK_IMPORTED_MODULE_0__.Slide,
    Pagination: vue3_carousel__WEBPACK_IMPORTED_MODULE_0__.Pagination,
    Navigation: vue3_carousel__WEBPACK_IMPORTED_MODULE_0__.Navigation
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Product.vue?vue&type=template&id=e2dbd454":
/*!************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Product.vue?vue&type=template&id=e2dbd454 ***!
  \************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("meta", {
  type: "description",
  content: "Category description",
  "head-key": "description"
}, null, -1
/* HOISTED */
);

var _hoisted_2 = {
  "class": "w-full bg-gray-100 pb-20"
};
var _hoisted_3 = {
  "class": "container mx-auto flex justify-between pt-6 gap-4"
};
var _hoisted_4 = {
  "class": "w-2/3"
};
var _hoisted_5 = {
  "class": "bg-white"
};
var _hoisted_6 = {
  "class": "grid grid-cols-5 gap-4 mt-6"
};
var _hoisted_7 = ["src", "onClick"];
var _hoisted_8 = {
  "class": "w-1/3"
};
var _hoisted_9 = {
  "class": "bg-white p-4"
};
var _hoisted_10 = {
  "class": "text-3xl font-bold m-2"
};
var _hoisted_11 = {
  "class": "text-2xl m-2"
};
var _hoisted_12 = {
  key: 0,
  "class": "bg-green-200 p-2 flex flex-row mt-4 w-1/3 rounded-lg"
};

var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  fill: "none",
  viewBox: "0 0 24 24",
  "stroke-width": "1.5",
  stroke: "currentColor",
  "class": "w-6 h-6 mr-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  d: "M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
})], -1
/* HOISTED */
);

var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" In Stock ");

var _hoisted_15 = [_hoisted_13, _hoisted_14];
var _hoisted_16 = {
  key: 1,
  "class": "bg-red-200 p-2 flex flex-row mt-4 w-1/3 rounded-lg"
};

var _hoisted_17 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  fill: "none",
  viewBox: "0 0 24 24",
  "stroke-width": "1.5",
  stroke: "currentColor",
  "class": "w-6 h-6"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  d: "M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
})], -1
/* HOISTED */
);

var _hoisted_18 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Out Of Stock ");

var _hoisted_19 = [_hoisted_17, _hoisted_18];
var _hoisted_20 = {
  "class": "flex items-center my-5"
};
var _hoisted_21 = {
  "class": "bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded ml-3"
};

var _hoisted_22 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("svg", {
  xmlns: "http://www.w3.org/2000/svg",
  fill: "none",
  viewBox: "0 0 24 24",
  "stroke-width": "1.5",
  stroke: "currentColor",
  "class": "w-6 h-6 mr-2"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("path", {
  "stroke-linecap": "round",
  "stroke-linejoin": "round",
  d: "M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z"
})], -1
/* HOISTED */
);

var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" Add To Basket");

var _hoisted_24 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "mt-4 addthis_inline_share_toolbox"
}, null, -1
/* HOISTED */
);

var _hoisted_25 = {
  "class": "bg-white p-4 mt-4"
};

var _hoisted_26 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  "class": "text-2xl font-bold mb-2"
}, "Key Features", -1
/* HOISTED */
);

var _hoisted_27 = {
  "class": "list-disc mx-4"
};
var _hoisted_28 = {
  "class": "py-2"
};
var _hoisted_29 = {
  "class": "container mx-auto"
};
var _hoisted_30 = {
  "class": "w-full"
};
var _hoisted_31 = {
  "class": "bg-white mt-4 p-4"
};
var _hoisted_32 = {
  "class": "flex flex-row justify-between border-2 borger-gray-800 border-b-0 rounded-lg"
};
var _hoisted_33 = {
  key: 0
};
var _hoisted_34 = {
  "class": "p-4"
};
var _hoisted_35 = {
  "class": "font-sans",
  style: {
    "white-space": "pre-wrap"
  }
};
var _hoisted_36 = {
  key: 1
};
var _hoisted_37 = {
  "class": "p-4"
};
var _hoisted_38 = {
  key: 0,
  "class": "flex flex-row justify-between"
};

var _hoisted_39 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "w-1/2"
}, "Weight:", -1
/* HOISTED */
);

var _hoisted_40 = {
  "class": "w-1/2"
};
var _hoisted_41 = {
  key: 1,
  "class": "flex flex-row justify-between"
};

var _hoisted_42 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "w-1/2"
}, "Height:", -1
/* HOISTED */
);

var _hoisted_43 = {
  "class": "w-1/2"
};
var _hoisted_44 = {
  key: 2,
  "class": "flex flex-row justify-between"
};

var _hoisted_45 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "w-1/2"
}, "Width:", -1
/* HOISTED */
);

var _hoisted_46 = {
  "class": "w-1/2"
};
var _hoisted_47 = {
  key: 3,
  "class": "flex flex-row justify-between"
};

var _hoisted_48 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", {
  "class": "w-1/2"
}, "Length:", -1
/* HOISTED */
);

var _hoisted_49 = {
  "class": "w-1/2"
};
var _hoisted_50 = {
  key: 2
};
var _hoisted_51 = {
  "class": "p-4"
};
var _hoisted_52 = {
  key: 3
};

var _hoisted_53 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "p-4"
}, " Delivery and returns Details here... ", -1
/* HOISTED */
);

var _hoisted_54 = [_hoisted_53];
var _hoisted_55 = {
  "class": "container mx-auto"
};
var _hoisted_56 = {
  "class": "w-full"
};
var _hoisted_57 = {
  "class": "bg-white mt-4 p-4"
};

var _hoisted_58 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", {
  "class": "text-2xl font-bold"
}, "Related Products", -1
/* HOISTED */
);

var _hoisted_59 = {
  "class": "p-6 flex flex-row"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _this = this;

  var _component_Head = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Head");

  var _component_imageCarousel = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("imageCarousel");

  var _component_star_rating = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("star-rating");

  var _component_Link = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Link");

  var _component_Product = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Product", true);

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Head, null, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("title", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.title), 1
      /* TEXT */
      ), _hoisted_1];
    }),
    _: 1
    /* STABLE */

  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_imageCarousel, {
    slides: $options.product.images,
    modelValue: $data.currentSlide,
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $data.currentSlide = $event;
    })
  }, null, 8
  /* PROPS */
  , ["slides", "modelValue"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($options.product.images, function (image, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("img", {
      key: index,
      src: '/storage/' + image.path,
      "class": "w-full",
      onClick: function onClick($event) {
        return $options.showImage(index);
      }
    }, null, 8
    /* PROPS */
    , _hoisted_7);
  }), 128
  /* KEYED_FRAGMENT */
  ))])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", _hoisted_10, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.title), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h2", _hoisted_11, "£" + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.sell_price), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <label for=\"quanitity\" class=\"block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400\">Quantity</label>\n                    <select id=\"quantity\" class=\"bg-gray-50 border border-gray-700 text-gray-900 text-sm rounded-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5\">\n                    <option value=\"1\" selected>1</option>\n                    <option value=\"2\">2</option>\n                    <option value=\"3\">3</option>\n                    <option value=\"4\">4</option>\n                    <option value=\"5\">5</option>\n                    </select> "), $options.product.isInStock ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_12, _hoisted_15)) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_16, _hoisted_19)), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_star_rating, {
    increment: 0.5,
    "star-size": 30,
    rating: $options.product.rating,
    "onUpdate:rating": _cache[1] || (_cache[1] = function ($event) {
      return $options.product.rating = $event;
    }),
    "show-rating": false
  }, null, 8
  /* PROPS */
  , ["increment", "rating"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_21, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.rating), 1
  /* TEXT */
  )]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Link, {
    disabled: !$options.product.isInStock,
    as: "button",
    href: '/cart/' + $options.product.id,
    method: "POST",
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([$options.product.isInStock ? 'bg-primary hover:bg-secondary hover:text-gray-800' : 'bg-gray-300', "text-white font-bold w-full text-cente mt-4 p-4 rounded-lg flex flex-row justify-center"])
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_22, _hoisted_23];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["disabled", "href", "class"]), _hoisted_24]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [_hoisted_26, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_27, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($options.features, function (feature) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("li", _hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(feature), 1
    /* TEXT */
    );
  }), 256
  /* UNKEYED_FRAGMENT */
  ))])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_30, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([this.activeTab === 'description' ? 'bg-gray-200' : '', "text-center p-4 w-1/4 hover:bg-gray-200"]),
    onClick: _cache[2] || (_cache[2] = function ($event) {
      return _this.activeTab = 'description';
    })
  }, "Product Description", 2
  /* CLASS */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([this.activeTab === 'details' ? 'bg-gray-200' : '', "text-center p-4 w-1/4 hover:bg-gray-200"]),
    onClick: _cache[3] || (_cache[3] = function ($event) {
      return _this.activeTab = 'details';
    })
  }, "Product Details", 2
  /* CLASS */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([this.activeTab === 'reviews' ? 'bg-gray-200' : '', "text-center p-4 w-1/4 hover:bg-gray-200 flex justify-start"]),
    onClick: _cache[5] || (_cache[5] = function ($event) {
      return _this.activeTab = 'reviews';
    })
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)("Product Reviews (" + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.ratings.length) + ") ", 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_star_rating, {
    increment: 0.5,
    "star-size": 20,
    rating: $options.product.rating,
    "onUpdate:rating": _cache[4] || (_cache[4] = function ($event) {
      return $options.product.rating = $event;
    }),
    "show-rating": false,
    "read-only": true,
    "class": "ml-2"
  }, null, 8
  /* PROPS */
  , ["increment", "rating"])], 2
  /* CLASS */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("button", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)([this.activeTab === 'delivery' ? 'bg-gray-200' : '', "text-center p-4 w-1/4 hover:bg-gray-200"]),
    onClick: _cache[6] || (_cache[6] = function ($event) {
      return _this.activeTab = 'delivery';
    })
  }, "Delivery & Returns", 2
  /* CLASS */
  )]), $data.activeTab === 'description' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_33, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_34, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("pre", _hoisted_35, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.long_desc), 1
  /* TEXT */
  )])])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.activeTab === 'details' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [$options.product.weight ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_38, [_hoisted_39, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_40, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.weight), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $options.product.height ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_41, [_hoisted_42, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_43, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.height), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $options.product.width ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_44, [_hoisted_45, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_46, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.width), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $options.product.length ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_47, [_hoisted_48, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_49, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.length), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.activeTab === 'reviews' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_50, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_51, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)($options.product.ratings), 1
  /* TEXT */
  )])) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), $data.activeTab === 'delivery' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_52, _hoisted_54)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true)])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_55, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_56, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_57, [_hoisted_58, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_59, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($options.related_products, function (product) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_Product, {
      key: product,
      product: product
    }, null, 8
    /* PROPS */
    , ["product"]);
  }), 128
  /* KEYED_FRAGMENT */
  ))])])])])])], 64
  /* STABLE_FRAGMENT */
  );
}

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Shared/imageCarousel.vue?vue&type=template&id=589e74cf":
/*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Shared/imageCarousel.vue?vue&type=template&id=589e74cf ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "overflow-hidden"
};
var _hoisted_2 = ["src"];
var _hoisted_3 = {
  "class": "w-1/2 overflow-none"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_Slide = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Slide");

  var _component_Navigation = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Navigation");

  var _component_Pagination = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Pagination");

  var _component_Carousel = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Carousel");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_Carousel, {
    "wrap-around": true,
    autoplay: 3000,
    pauseAutoplayOnHover: true
  }, {
    addons: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Navigation)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Pagination)];
    }),
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($props.slides, function (slide) {
        return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_Slide, {
          key: slide
        }, {
          "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
            return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
              "class": "w-full",
              src: '/storage/' + slide.path
            }, null, 8
            /* PROPS */
            , _hoisted_2)])];
          }),
          _: 2
          /* DYNAMIC */

        }, 1024
        /* DYNAMIC_SLOTS */
        );
      }), 128
      /* KEYED_FRAGMENT */
      ))];
    }),
    _: 1
    /* STABLE */

  });
}

/***/ }),

/***/ "./resources/js/Pages/Product.vue":
/*!****************************************!*\
  !*** ./resources/js/Pages/Product.vue ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Product_vue_vue_type_template_id_e2dbd454__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Product.vue?vue&type=template&id=e2dbd454 */ "./resources/js/Pages/Product.vue?vue&type=template&id=e2dbd454");
/* harmony import */ var _Product_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Product.vue?vue&type=script&lang=js */ "./resources/js/Pages/Product.vue?vue&type=script&lang=js");
/* harmony import */ var _Users_adamluckman_sites_monstrous_light_inertia_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_Users_adamluckman_sites_monstrous_light_inertia_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Product_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Product_vue_vue_type_template_id_e2dbd454__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Pages/Product.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Shared/imageCarousel.vue":
/*!***********************************************!*\
  !*** ./resources/js/Shared/imageCarousel.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _imageCarousel_vue_vue_type_template_id_589e74cf__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./imageCarousel.vue?vue&type=template&id=589e74cf */ "./resources/js/Shared/imageCarousel.vue?vue&type=template&id=589e74cf");
/* harmony import */ var _imageCarousel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./imageCarousel.vue?vue&type=script&lang=js */ "./resources/js/Shared/imageCarousel.vue?vue&type=script&lang=js");
/* harmony import */ var _Users_adamluckman_sites_monstrous_light_inertia_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_Users_adamluckman_sites_monstrous_light_inertia_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_imageCarousel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_imageCarousel_vue_vue_type_template_id_589e74cf__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/Shared/imageCarousel.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/Pages/Product.vue?vue&type=script&lang=js":
/*!****************************************************************!*\
  !*** ./resources/js/Pages/Product.vue?vue&type=script&lang=js ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Product.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Product.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Shared/imageCarousel.vue?vue&type=script&lang=js":
/*!***********************************************************************!*\
  !*** ./resources/js/Shared/imageCarousel.vue?vue&type=script&lang=js ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_imageCarousel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_imageCarousel_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./imageCarousel.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Shared/imageCarousel.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/Pages/Product.vue?vue&type=template&id=e2dbd454":
/*!**********************************************************************!*\
  !*** ./resources/js/Pages/Product.vue?vue&type=template&id=e2dbd454 ***!
  \**********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_template_id_e2dbd454__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Product_vue_vue_type_template_id_e2dbd454__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Product.vue?vue&type=template&id=e2dbd454 */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Pages/Product.vue?vue&type=template&id=e2dbd454");


/***/ }),

/***/ "./resources/js/Shared/imageCarousel.vue?vue&type=template&id=589e74cf":
/*!*****************************************************************************!*\
  !*** ./resources/js/Shared/imageCarousel.vue?vue&type=template&id=589e74cf ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_imageCarousel_vue_vue_type_template_id_589e74cf__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_imageCarousel_vue_vue_type_template_id_589e74cf__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./imageCarousel.vue?vue&type=template&id=589e74cf */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/Shared/imageCarousel.vue?vue&type=template&id=589e74cf");


/***/ })

}]);