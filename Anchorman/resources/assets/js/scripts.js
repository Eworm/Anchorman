/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(1)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] Anchorman/resources/assets/js/components/AmNewFeed.vue: named exports in *.vue files are ignored.\")}\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-46341fa8/AmNewFeed.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL0FuY2hvcm1hbi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvQW1OZXdGZWVkLnZ1ZT80M2Y5Il0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9zY3JpcHRfXywgX192dWVfdGVtcGxhdGVfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cbl9fdnVlX3NjcmlwdF9fID0gcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyIS4uLy4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXNjcmlwdCZpbmRleD0wIS4vQW1OZXdGZWVkLnZ1ZVwiKVxuaWYgKE9iamVjdC5rZXlzKF9fdnVlX3NjcmlwdF9fKS5zb21lKGZ1bmN0aW9uIChrZXkpIHsgcmV0dXJuIGtleSAhPT0gXCJkZWZhdWx0XCIgJiYga2V5ICE9PSBcIl9fZXNNb2R1bGVcIiB9KSkge1xuICBjb25zb2xlLndhcm4oXCJbdnVlLWxvYWRlcl0gQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbU5ld0ZlZWQudnVlOiBuYW1lZCBleHBvcnRzIGluICoudnVlIGZpbGVzIGFyZSBpZ25vcmVkLlwiKX1cbm1vZHVsZS5leHBvcnRzID0gX192dWVfc2NyaXB0X18gfHwge31cbmlmIChtb2R1bGUuZXhwb3J0cy5fX2VzTW9kdWxlKSBtb2R1bGUuZXhwb3J0cyA9IG1vZHVsZS5leHBvcnRzLmRlZmF1bHRcbnZhciBfX3Z1ZV9vcHRpb25zX18gPSB0eXBlb2YgbW9kdWxlLmV4cG9ydHMgPT09IFwiZnVuY3Rpb25cIiA/IChtb2R1bGUuZXhwb3J0cy5vcHRpb25zIHx8IChtb2R1bGUuZXhwb3J0cy5vcHRpb25zID0ge30pKSA6IG1vZHVsZS5leHBvcnRzXG5pZiAoX192dWVfdGVtcGxhdGVfXykge1xuX192dWVfb3B0aW9uc19fLnRlbXBsYXRlID0gX192dWVfdGVtcGxhdGVfX1xufVxuaWYgKCFfX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWQpIF9fdnVlX29wdGlvbnNfXy5jb21wdXRlZCA9IHt9XG5PYmplY3Qua2V5cyhfX3Z1ZV9zdHlsZXNfXykuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7XG52YXIgbW9kdWxlID0gX192dWVfc3R5bGVzX19ba2V5XVxuX192dWVfb3B0aW9uc19fLmNvbXB1dGVkW2tleV0gPSBmdW5jdGlvbiAoKSB7IHJldHVybiBtb2R1bGUgfVxufSlcbmlmIChtb2R1bGUuaG90KSB7KGZ1bmN0aW9uICgpIHsgIG1vZHVsZS5ob3QuYWNjZXB0KClcbiAgdmFyIGhvdEFQSSA9IHJlcXVpcmUoXCJ2dWUtaG90LXJlbG9hZC1hcGlcIilcbiAgaG90QVBJLmluc3RhbGwocmVxdWlyZShcInZ1ZVwiKSwgZmFsc2UpXG4gIGlmICghaG90QVBJLmNvbXBhdGlibGUpIHJldHVyblxuICB2YXIgaWQgPSBcIl92LTQ2MzQxZmE4L0FtTmV3RmVlZC52dWVcIlxuICBpZiAoIW1vZHVsZS5ob3QuZGF0YSkge1xuICAgIGhvdEFQSS5jcmVhdGVSZWNvcmQoaWQsIG1vZHVsZS5leHBvcnRzKVxuICB9IGVsc2Uge1xuICAgIGhvdEFQSS51cGRhdGUoaWQsIG1vZHVsZS5leHBvcnRzLCBfX3Z1ZV90ZW1wbGF0ZV9fKVxuICB9XG59KSgpfVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbU5ld0ZlZWQudnVlXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 1 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <script>\n\nexports.default = {\n    props: [],\n\n    data: function data() {\n        return {\n            feedName: ''\n        };\n    },\n\n    methods: {\n        saveFeed: function saveFeed() {\n            console.log('test');\n            if (this.feedName !== '') {\n                this.$http.post(cp_url(\"addons/anchorman/store\"), {\n                    feed_name: this.feedName\n                }, function (res) {\n                    console.log(res);\n                    // location.href = cp_url('addons/anchorman/edit/') + res.feed\n                });\n            } else {\n                this.$dispatch(\"setFlashError\", 'Uh oh! Enter a url for this feed');\n            }\n        }\n    },\n\n    ready: function ready() {}\n\n    // </script>\n\n    /* generated by vue-loader */\n\n};\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbU5ld0ZlZWQudnVlPzQwOWIiXSwic291cmNlc0NvbnRlbnQiOlsiPHNjcmlwdD5cblxuZXhwb3J0IGRlZmF1bHQge1xuICAgIHByb3BzOiBbXSxcblxuICAgIGRhdGE6IGZ1bmN0aW9uKCkge1xuICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgZmVlZE5hbWU6ICcnXG4gICAgICAgIH1cbiAgICB9LFxuXG4gICAgbWV0aG9kczoge1xuICAgICAgICBzYXZlRmVlZDogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygndGVzdCcpO1xuICAgICAgICAgICAgaWYgKHRoaXMuZmVlZE5hbWUgIT09ICcnKSB7XG4gICAgICAgICAgICAgICAgdGhpcy4kaHR0cC5wb3N0KFxuICAgICAgICAgICAgICAgICAgICBjcF91cmwoXCJhZGRvbnMvYW5jaG9ybWFuL3N0b3JlXCIpLCB7XG4gICAgICAgICAgICAgICAgICAgICAgICBmZWVkX25hbWU6IHRoaXMuZmVlZE5hbWVcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgZnVuY3Rpb24ocmVzKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXMpO1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gbG9jYXRpb24uaHJlZiA9IGNwX3VybCgnYWRkb25zL2FuY2hvcm1hbi9lZGl0LycpICsgcmVzLmZlZWRcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIClcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgdGhpcy4kZGlzcGF0Y2goXCJzZXRGbGFzaEVycm9yXCIsICdVaCBvaCEgRW50ZXIgYSB1cmwgZm9yIHRoaXMgZmVlZCcpXG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9LFxuXG4gICAgcmVhZHk6IGZ1bmN0aW9uKCkge31cbn1cblxuPC9zY3JpcHQ+XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gQW1OZXdGZWVkLnZ1ZT8yYzNiNDQ3OSJdLCJtYXBwaW5ncyI6Ijs7Ozs7OztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQURBO0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQURBO0FBSUE7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFoQkE7QUFDQTtBQWtCQTtBQUNBOzs7OztBQTdCQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

"use strict";
eval("'use strict';\n\n// Vue.component('bkmenulist', require('./components/BkMenuList.vue'));\nVue.component('amnewfeed', __webpack_require__(0));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbmNob3JtYW4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9tYWluLmpzPzlkZTYiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xuXG4vLyBWdWUuY29tcG9uZW50KCdia21lbnVsaXN0JywgcmVxdWlyZSgnLi9jb21wb25lbnRzL0JrTWVudUxpc3QudnVlJykpO1xuVnVlLmNvbXBvbmVudCgnYW1uZXdmZWVkJywgcmVxdWlyZSgnLi9jb21wb25lbnRzL0FtTmV3RmVlZC52dWUnKSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIEFuY2hvcm1hbi9yZXNvdXJjZXMvYXNzZXRzL2pzL21haW4uanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7O0FBRUEiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);