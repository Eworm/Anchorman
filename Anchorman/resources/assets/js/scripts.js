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

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(1)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] Anchorman/resources/assets/js/components/RbNewFeed.vue: named exports in *.vue files are ignored.\")}\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-1291f302/RbNewFeed.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL1JvbkJ1cmd1bmR5L3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9SYk5ld0ZlZWQudnVlP2U1NDgiXSwic291cmNlc0NvbnRlbnQiOlsidmFyIF9fdnVlX3NjcmlwdF9fLCBfX3Z1ZV90ZW1wbGF0ZV9fXG52YXIgX192dWVfc3R5bGVzX18gPSB7fVxuX192dWVfc2NyaXB0X18gPSByZXF1aXJlKFwiISFiYWJlbC1sb2FkZXIhLi4vLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yLmpzP3R5cGU9c2NyaXB0JmluZGV4PTAhLi9SYk5ld0ZlZWQudnVlXCIpXG5pZiAoT2JqZWN0LmtleXMoX192dWVfc2NyaXB0X18pLnNvbWUoZnVuY3Rpb24gKGtleSkgeyByZXR1cm4ga2V5ICE9PSBcImRlZmF1bHRcIiAmJiBrZXkgIT09IFwiX19lc01vZHVsZVwiIH0pKSB7XG4gIGNvbnNvbGUud2FybihcIlt2dWUtbG9hZGVyXSBSb25CdXJndW5keS9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvUmJOZXdGZWVkLnZ1ZTogbmFtZWQgZXhwb3J0cyBpbiAqLnZ1ZSBmaWxlcyBhcmUgaWdub3JlZC5cIil9XG5tb2R1bGUuZXhwb3J0cyA9IF9fdnVlX3NjcmlwdF9fIHx8IHt9XG5pZiAobW9kdWxlLmV4cG9ydHMuX19lc01vZHVsZSkgbW9kdWxlLmV4cG9ydHMgPSBtb2R1bGUuZXhwb3J0cy5kZWZhdWx0XG52YXIgX192dWVfb3B0aW9uc19fID0gdHlwZW9mIG1vZHVsZS5leHBvcnRzID09PSBcImZ1bmN0aW9uXCIgPyAobW9kdWxlLmV4cG9ydHMub3B0aW9ucyB8fCAobW9kdWxlLmV4cG9ydHMub3B0aW9ucyA9IHt9KSkgOiBtb2R1bGUuZXhwb3J0c1xuaWYgKF9fdnVlX3RlbXBsYXRlX18pIHtcbl9fdnVlX29wdGlvbnNfXy50ZW1wbGF0ZSA9IF9fdnVlX3RlbXBsYXRlX19cbn1cbmlmICghX192dWVfb3B0aW9uc19fLmNvbXB1dGVkKSBfX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWQgPSB7fVxuT2JqZWN0LmtleXMoX192dWVfc3R5bGVzX18pLmZvckVhY2goZnVuY3Rpb24gKGtleSkge1xudmFyIG1vZHVsZSA9IF9fdnVlX3N0eWxlc19fW2tleV1cbl9fdnVlX29wdGlvbnNfXy5jb21wdXRlZFtrZXldID0gZnVuY3Rpb24gKCkgeyByZXR1cm4gbW9kdWxlIH1cbn0pXG5pZiAobW9kdWxlLmhvdCkgeyhmdW5jdGlvbiAoKSB7ICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIHZhciBob3RBUEkgPSByZXF1aXJlKFwidnVlLWhvdC1yZWxvYWQtYXBpXCIpXG4gIGhvdEFQSS5pbnN0YWxsKHJlcXVpcmUoXCJ2dWVcIiksIGZhbHNlKVxuICBpZiAoIWhvdEFQSS5jb21wYXRpYmxlKSByZXR1cm5cbiAgdmFyIGlkID0gXCJfdi0xMjkxZjMwMi9SYk5ld0ZlZWQudnVlXCJcbiAgaWYgKCFtb2R1bGUuaG90LmRhdGEpIHtcbiAgICBob3RBUEkuY3JlYXRlUmVjb3JkKGlkLCBtb2R1bGUuZXhwb3J0cylcbiAgfSBlbHNlIHtcbiAgICBob3RBUEkudXBkYXRlKGlkLCBtb2R1bGUuZXhwb3J0cywgX192dWVfdGVtcGxhdGVfXylcbiAgfVxufSkoKX1cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL1JvbkJ1cmd1bmR5L3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9SYk5ld0ZlZWQudnVlXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 1 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <script>\n\nexports.default = {\n    props: [],\n\n    data: function data() {\n        return {\n            feedName: ''\n        };\n    },\n\n    methods: {\n        saveFeed: function saveFeed() {\n            console.log('test');\n            if (this.feedName !== '') {\n                this.$http.post(cp_url(\"addons/anchorman/store\"), {\n                    feed_name: this.feedName\n                }, function (res) {\n                    console.log(res);\n                    // location.href = cp_url('addons/anchorman/edit/') + res.feed\n                });\n            } else {\n                this.$dispatch(\"setFlashError\", 'Uh oh! Enter a url for this feed');\n            }\n        }\n    },\n\n    ready: function ready() {}\n\n    // </script>\n\n    /* generated by vue-loader */\n\n};\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9SYk5ld0ZlZWQudnVlPzNmY2MiXSwic291cmNlc0NvbnRlbnQiOlsiPHNjcmlwdD5cblxuZXhwb3J0IGRlZmF1bHQge1xuICAgIHByb3BzOiBbXSxcblxuICAgIGRhdGE6IGZ1bmN0aW9uKCkge1xuICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgZmVlZE5hbWU6ICcnXG4gICAgICAgIH1cbiAgICB9LFxuXG4gICAgbWV0aG9kczoge1xuICAgICAgICBzYXZlRmVlZDogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBjb25zb2xlLmxvZygndGVzdCcpO1xuICAgICAgICAgICAgaWYgKHRoaXMuZmVlZE5hbWUgIT09ICcnKSB7XG4gICAgICAgICAgICAgICAgdGhpcy4kaHR0cC5wb3N0KFxuICAgICAgICAgICAgICAgICAgICBjcF91cmwoXCJhZGRvbnMvcm9uLWJ1cmd1bmR5L3N0b3JlXCIpLCB7XG4gICAgICAgICAgICAgICAgICAgICAgICBmZWVkX25hbWU6IHRoaXMuZmVlZE5hbWVcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgZnVuY3Rpb24ocmVzKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICBjb25zb2xlLmxvZyhyZXMpO1xuICAgICAgICAgICAgICAgICAgICAgICAgLy8gbG9jYXRpb24uaHJlZiA9IGNwX3VybCgnYWRkb25zL3Jvbi1idXJndW5keS9lZGl0LycpICsgcmVzLmZlZWRcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIClcbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgdGhpcy4kZGlzcGF0Y2goXCJzZXRGbGFzaEVycm9yXCIsICdVaCBvaCEgRW50ZXIgYSB1cmwgZm9yIHRoaXMgZmVlZCcpXG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9LFxuXG4gICAgcmVhZHk6IGZ1bmN0aW9uKCkge31cbn1cblxuPC9zY3JpcHQ+XG5cblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gUmJOZXdGZWVkLnZ1ZT81ZTBmMGJiNSJdLCJtYXBwaW5ncyI6Ijs7Ozs7OztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQURBO0FBR0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFFQTtBQURBO0FBSUE7QUFDQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFoQkE7QUFDQTtBQWtCQTtBQUNBOzs7OztBQTdCQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

"use strict";
eval("'use strict';\n\n// Vue.component('bkmenulist', require('./components/BkMenuList.vue'));\nVue.component('amnewfeed', __webpack_require__(0));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9Sb25CdXJndW5keS9yZXNvdXJjZXMvYXNzZXRzL2pzL21haW4uanM/YWQ3ZSJdLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XG5cbi8vIFZ1ZS5jb21wb25lbnQoJ2JrbWVudWxpc3QnLCByZXF1aXJlKCcuL2NvbXBvbmVudHMvQmtNZW51TGlzdC52dWUnKSk7XG5WdWUuY29tcG9uZW50KCdyYm5ld2ZlZWQnLCByZXF1aXJlKCcuL2NvbXBvbmVudHMvUmJOZXdGZWVkLnZ1ZScpKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gUm9uQnVyZ3VuZHkvcmVzb3VyY2VzL2Fzc2V0cy9qcy9tYWluLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBOztBQUVBIiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);