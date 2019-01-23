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

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(1)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] resources/assets/js/components/AmList.vue: named exports in *.vue files are ignored.\")}\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-a87a4e78/AmList.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbUxpc3QudnVlP2ZkMjQiXSwic291cmNlc0NvbnRlbnQiOlsidmFyIF9fdnVlX3NjcmlwdF9fLCBfX3Z1ZV90ZW1wbGF0ZV9fXG52YXIgX192dWVfc3R5bGVzX18gPSB7fVxuX192dWVfc2NyaXB0X18gPSByZXF1aXJlKFwiISFiYWJlbC1sb2FkZXIhLi4vLi4vLi4vLi4vbm9kZV9tb2R1bGVzL3Z1ZS1sb2FkZXIvbGliL3NlbGVjdG9yLmpzP3R5cGU9c2NyaXB0JmluZGV4PTAhLi9BbUxpc3QudnVlXCIpXG5pZiAoT2JqZWN0LmtleXMoX192dWVfc2NyaXB0X18pLnNvbWUoZnVuY3Rpb24gKGtleSkgeyByZXR1cm4ga2V5ICE9PSBcImRlZmF1bHRcIiAmJiBrZXkgIT09IFwiX19lc01vZHVsZVwiIH0pKSB7XG4gIGNvbnNvbGUud2FybihcIlt2dWUtbG9hZGVyXSByZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvQW1MaXN0LnZ1ZTogbmFtZWQgZXhwb3J0cyBpbiAqLnZ1ZSBmaWxlcyBhcmUgaWdub3JlZC5cIil9XG5tb2R1bGUuZXhwb3J0cyA9IF9fdnVlX3NjcmlwdF9fIHx8IHt9XG5pZiAobW9kdWxlLmV4cG9ydHMuX19lc01vZHVsZSkgbW9kdWxlLmV4cG9ydHMgPSBtb2R1bGUuZXhwb3J0cy5kZWZhdWx0XG52YXIgX192dWVfb3B0aW9uc19fID0gdHlwZW9mIG1vZHVsZS5leHBvcnRzID09PSBcImZ1bmN0aW9uXCIgPyAobW9kdWxlLmV4cG9ydHMub3B0aW9ucyB8fCAobW9kdWxlLmV4cG9ydHMub3B0aW9ucyA9IHt9KSkgOiBtb2R1bGUuZXhwb3J0c1xuaWYgKF9fdnVlX3RlbXBsYXRlX18pIHtcbl9fdnVlX29wdGlvbnNfXy50ZW1wbGF0ZSA9IF9fdnVlX3RlbXBsYXRlX19cbn1cbmlmICghX192dWVfb3B0aW9uc19fLmNvbXB1dGVkKSBfX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWQgPSB7fVxuT2JqZWN0LmtleXMoX192dWVfc3R5bGVzX18pLmZvckVhY2goZnVuY3Rpb24gKGtleSkge1xudmFyIG1vZHVsZSA9IF9fdnVlX3N0eWxlc19fW2tleV1cbl9fdnVlX29wdGlvbnNfXy5jb21wdXRlZFtrZXldID0gZnVuY3Rpb24gKCkgeyByZXR1cm4gbW9kdWxlIH1cbn0pXG5pZiAobW9kdWxlLmhvdCkgeyhmdW5jdGlvbiAoKSB7ICBtb2R1bGUuaG90LmFjY2VwdCgpXG4gIHZhciBob3RBUEkgPSByZXF1aXJlKFwidnVlLWhvdC1yZWxvYWQtYXBpXCIpXG4gIGhvdEFQSS5pbnN0YWxsKHJlcXVpcmUoXCJ2dWVcIiksIGZhbHNlKVxuICBpZiAoIWhvdEFQSS5jb21wYXRpYmxlKSByZXR1cm5cbiAgdmFyIGlkID0gXCJfdi1hODdhNGU3OC9BbUxpc3QudnVlXCJcbiAgaWYgKCFtb2R1bGUuaG90LmRhdGEpIHtcbiAgICBob3RBUEkuY3JlYXRlUmVjb3JkKGlkLCBtb2R1bGUuZXhwb3J0cylcbiAgfSBlbHNlIHtcbiAgICBob3RBUEkudXBkYXRlKGlkLCBtb2R1bGUuZXhwb3J0cywgX192dWVfdGVtcGxhdGVfXylcbiAgfVxufSkoKX1cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbUxpc3QudnVlXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 1 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <script>\n\nexports.default = {\n    props: [],\n\n    data: function data() {\n        return {};\n    },\n\n    methods: {\n        refreshAll: function refreshAll() {\n            console.log('Refresh all');\n            this.$http.get(cp_url('addons/anchorman/refresh_all')).then(function (response) {\n                // this.currentReportId = response.data;\n                console.log(response);\n                // this.loading = false;\n            });\n        },\n\n        deleteFeed: function deleteFeed(feed) {\n            var self = this;\n\n            swal({\n                title: translate('cp.are_you_sure'),\n                text: translate_choice('cp.confirm_delete_items', 1),\n                type: 'warning',\n                confirmButtonText: translate('cp.yes_im_sure'),\n                showCancelButton: true,\n                closeOnConfirm: false\n            }, function (canDelete) {\n                if (canDelete) {\n                    self.$http.delete(cp_url('addons/anchorman/destroy'), {\n                        feed: feed\n                    }, function () {\n                        location.reload();\n                    });\n                }\n            });\n        }\n    },\n\n    ready: function ready() {}\n\n    // </script>\n\n    /* generated by vue-loader */\n\n};\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbUxpc3QudnVlP2M3MjQiXSwic291cmNlc0NvbnRlbnQiOlsiPHNjcmlwdD5cblxuZXhwb3J0IGRlZmF1bHQge1xuICAgcHJvcHM6IFtdLFxuXG4gICAgZGF0YTogZnVuY3Rpb24oKSB7XG4gICAgICAgIHJldHVybiB7fVxuICAgIH0sXG5cbiAgICBtZXRob2RzOiB7XG4gICAgICAgIHJlZnJlc2hBbGw6IGZ1bmN0aW9uKCkge1xuICAgICAgICAgICAgY29uc29sZS5sb2coJ1JlZnJlc2ggYWxsJyk7XG4gICAgICAgICAgICB0aGlzLiRodHRwLmdldChjcF91cmwoJ2FkZG9ucy9hbmNob3JtYW4vcmVmcmVzaF9hbGwnKSkudGhlbihyZXNwb25zZSA9PiB7XG4gICAgICAgICAgICAgICAgLy8gdGhpcy5jdXJyZW50UmVwb3J0SWQgPSByZXNwb25zZS5kYXRhO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlc3BvbnNlKTtcbiAgICAgICAgICAgICAgICAvLyB0aGlzLmxvYWRpbmcgPSBmYWxzZTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9LFxuXG4gICAgICAgIGRlbGV0ZUZlZWQ6IGZ1bmN0aW9uKGZlZWQpIHtcbiAgICAgICAgICAgIHZhciBzZWxmID0gdGhpcztcblxuICAgICAgICAgICAgc3dhbCh7XG4gICAgICAgICAgICAgICAgdGl0bGU6IHRyYW5zbGF0ZSgnY3AuYXJlX3lvdV9zdXJlJyksXG4gICAgICAgICAgICAgICAgdGV4dDogdHJhbnNsYXRlX2Nob2ljZSgnY3AuY29uZmlybV9kZWxldGVfaXRlbXMnLCAxKSxcbiAgICAgICAgICAgICAgICB0eXBlOiAnd2FybmluZycsXG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IHRyYW5zbGF0ZSgnY3AueWVzX2ltX3N1cmUnKSxcbiAgICAgICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgICAgIGNsb3NlT25Db25maXJtOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBmdW5jdGlvbihjYW5EZWxldGUpIHtcbiAgICAgICAgICAgICAgICBpZiAoY2FuRGVsZXRlKSB7XG4gICAgICAgICAgICAgICAgICAgIHNlbGYuJGh0dHAuZGVsZXRlKFxuICAgICAgICAgICAgICAgICAgICAgICAgY3BfdXJsKCdhZGRvbnMvYW5jaG9ybWFuL2Rlc3Ryb3knKSwge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZlZWQ6IGZlZWRcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgKVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfSxcblxuICAgIHJlYWR5OiBmdW5jdGlvbigpIHt9XG59XG5cbjwvc2NyaXB0PlxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIEFtTGlzdC52dWU/MmYzYzcyYjYiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFOQTtBQVNBO0FBQ0E7QUFFQTtBQURBO0FBSUE7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQWpDQTtBQUNBO0FBbUNBO0FBQ0E7Ozs7O0FBNUNBOyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

"use strict";
eval("'use strict';\n\n// Vue.component('bkmenulist', require('./components/BkMenuList.vue'));\nVue.component('amlist', __webpack_require__(0));\n// Vue.component('amnewfeed', require('./components/AmNewFeed.vue'));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL21haW4uanM/NmU0YiJdLCJzb3VyY2VzQ29udGVudCI6WyIndXNlIHN0cmljdCc7XG5cbi8vIFZ1ZS5jb21wb25lbnQoJ2JrbWVudWxpc3QnLCByZXF1aXJlKCcuL2NvbXBvbmVudHMvQmtNZW51TGlzdC52dWUnKSk7XG5WdWUuY29tcG9uZW50KCdhbWxpc3QnLCByZXF1aXJlKCcuL2NvbXBvbmVudHMvQW1MaXN0LnZ1ZScpKTtcbi8vIFZ1ZS5jb21wb25lbnQoJ2FtbmV3ZmVlZCcsIHJlcXVpcmUoJy4vY29tcG9uZW50cy9BbU5ld0ZlZWQudnVlJykpO1xuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyByZXNvdXJjZXMvYXNzZXRzL2pzL21haW4uanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7O0FBRUE7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);