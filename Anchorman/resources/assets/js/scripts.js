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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports, __webpack_require__) {

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(2)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] Anchorman/resources/assets/js/components/AmList.vue: named exports in *.vue files are ignored.\")}\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-a87a4e78/AmList.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL0FuY2hvcm1hbi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvQW1MaXN0LnZ1ZT83YzZmIl0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9zY3JpcHRfXywgX192dWVfdGVtcGxhdGVfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cbl9fdnVlX3NjcmlwdF9fID0gcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyIS4uLy4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXNjcmlwdCZpbmRleD0wIS4vQW1MaXN0LnZ1ZVwiKVxuaWYgKE9iamVjdC5rZXlzKF9fdnVlX3NjcmlwdF9fKS5zb21lKGZ1bmN0aW9uIChrZXkpIHsgcmV0dXJuIGtleSAhPT0gXCJkZWZhdWx0XCIgJiYga2V5ICE9PSBcIl9fZXNNb2R1bGVcIiB9KSkge1xuICBjb25zb2xlLndhcm4oXCJbdnVlLWxvYWRlcl0gQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbUxpc3QudnVlOiBuYW1lZCBleHBvcnRzIGluICoudnVlIGZpbGVzIGFyZSBpZ25vcmVkLlwiKX1cbm1vZHVsZS5leHBvcnRzID0gX192dWVfc2NyaXB0X18gfHwge31cbmlmIChtb2R1bGUuZXhwb3J0cy5fX2VzTW9kdWxlKSBtb2R1bGUuZXhwb3J0cyA9IG1vZHVsZS5leHBvcnRzLmRlZmF1bHRcbnZhciBfX3Z1ZV9vcHRpb25zX18gPSB0eXBlb2YgbW9kdWxlLmV4cG9ydHMgPT09IFwiZnVuY3Rpb25cIiA/IChtb2R1bGUuZXhwb3J0cy5vcHRpb25zIHx8IChtb2R1bGUuZXhwb3J0cy5vcHRpb25zID0ge30pKSA6IG1vZHVsZS5leHBvcnRzXG5pZiAoX192dWVfdGVtcGxhdGVfXykge1xuX192dWVfb3B0aW9uc19fLnRlbXBsYXRlID0gX192dWVfdGVtcGxhdGVfX1xufVxuaWYgKCFfX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWQpIF9fdnVlX29wdGlvbnNfXy5jb21wdXRlZCA9IHt9XG5PYmplY3Qua2V5cyhfX3Z1ZV9zdHlsZXNfXykuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7XG52YXIgbW9kdWxlID0gX192dWVfc3R5bGVzX19ba2V5XVxuX192dWVfb3B0aW9uc19fLmNvbXB1dGVkW2tleV0gPSBmdW5jdGlvbiAoKSB7IHJldHVybiBtb2R1bGUgfVxufSlcbmlmIChtb2R1bGUuaG90KSB7KGZ1bmN0aW9uICgpIHsgIG1vZHVsZS5ob3QuYWNjZXB0KClcbiAgdmFyIGhvdEFQSSA9IHJlcXVpcmUoXCJ2dWUtaG90LXJlbG9hZC1hcGlcIilcbiAgaG90QVBJLmluc3RhbGwocmVxdWlyZShcInZ1ZVwiKSwgZmFsc2UpXG4gIGlmICghaG90QVBJLmNvbXBhdGlibGUpIHJldHVyblxuICB2YXIgaWQgPSBcIl92LWE4N2E0ZTc4L0FtTGlzdC52dWVcIlxuICBpZiAoIW1vZHVsZS5ob3QuZGF0YSkge1xuICAgIGhvdEFQSS5jcmVhdGVSZWNvcmQoaWQsIG1vZHVsZS5leHBvcnRzKVxuICB9IGVsc2Uge1xuICAgIGhvdEFQSS51cGRhdGUoaWQsIG1vZHVsZS5leHBvcnRzLCBfX3Z1ZV90ZW1wbGF0ZV9fKVxuICB9XG59KSgpfVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbUxpc3QudnVlXG4vLyBtb2R1bGUgaWQgPSAwXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 1 */
/***/ function(module, exports, __webpack_require__) {

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(3)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] Anchorman/resources/assets/js/components/AmNewFeed.vue: named exports in *.vue files are ignored.\")}\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-46341fa8/AmNewFeed.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL0FuY2hvcm1hbi9yZXNvdXJjZXMvYXNzZXRzL2pzL2NvbXBvbmVudHMvQW1OZXdGZWVkLnZ1ZT80M2Y5Il0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9zY3JpcHRfXywgX192dWVfdGVtcGxhdGVfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cbl9fdnVlX3NjcmlwdF9fID0gcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyIS4uLy4uLy4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXNjcmlwdCZpbmRleD0wIS4vQW1OZXdGZWVkLnZ1ZVwiKVxuaWYgKE9iamVjdC5rZXlzKF9fdnVlX3NjcmlwdF9fKS5zb21lKGZ1bmN0aW9uIChrZXkpIHsgcmV0dXJuIGtleSAhPT0gXCJkZWZhdWx0XCIgJiYga2V5ICE9PSBcIl9fZXNNb2R1bGVcIiB9KSkge1xuICBjb25zb2xlLndhcm4oXCJbdnVlLWxvYWRlcl0gQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbU5ld0ZlZWQudnVlOiBuYW1lZCBleHBvcnRzIGluICoudnVlIGZpbGVzIGFyZSBpZ25vcmVkLlwiKX1cbm1vZHVsZS5leHBvcnRzID0gX192dWVfc2NyaXB0X18gfHwge31cbmlmIChtb2R1bGUuZXhwb3J0cy5fX2VzTW9kdWxlKSBtb2R1bGUuZXhwb3J0cyA9IG1vZHVsZS5leHBvcnRzLmRlZmF1bHRcbnZhciBfX3Z1ZV9vcHRpb25zX18gPSB0eXBlb2YgbW9kdWxlLmV4cG9ydHMgPT09IFwiZnVuY3Rpb25cIiA/IChtb2R1bGUuZXhwb3J0cy5vcHRpb25zIHx8IChtb2R1bGUuZXhwb3J0cy5vcHRpb25zID0ge30pKSA6IG1vZHVsZS5leHBvcnRzXG5pZiAoX192dWVfdGVtcGxhdGVfXykge1xuX192dWVfb3B0aW9uc19fLnRlbXBsYXRlID0gX192dWVfdGVtcGxhdGVfX1xufVxuaWYgKCFfX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWQpIF9fdnVlX29wdGlvbnNfXy5jb21wdXRlZCA9IHt9XG5PYmplY3Qua2V5cyhfX3Z1ZV9zdHlsZXNfXykuZm9yRWFjaChmdW5jdGlvbiAoa2V5KSB7XG52YXIgbW9kdWxlID0gX192dWVfc3R5bGVzX19ba2V5XVxuX192dWVfb3B0aW9uc19fLmNvbXB1dGVkW2tleV0gPSBmdW5jdGlvbiAoKSB7IHJldHVybiBtb2R1bGUgfVxufSlcbmlmIChtb2R1bGUuaG90KSB7KGZ1bmN0aW9uICgpIHsgIG1vZHVsZS5ob3QuYWNjZXB0KClcbiAgdmFyIGhvdEFQSSA9IHJlcXVpcmUoXCJ2dWUtaG90LXJlbG9hZC1hcGlcIilcbiAgaG90QVBJLmluc3RhbGwocmVxdWlyZShcInZ1ZVwiKSwgZmFsc2UpXG4gIGlmICghaG90QVBJLmNvbXBhdGlibGUpIHJldHVyblxuICB2YXIgaWQgPSBcIl92LTQ2MzQxZmE4L0FtTmV3RmVlZC52dWVcIlxuICBpZiAoIW1vZHVsZS5ob3QuZGF0YSkge1xuICAgIGhvdEFQSS5jcmVhdGVSZWNvcmQoaWQsIG1vZHVsZS5leHBvcnRzKVxuICB9IGVsc2Uge1xuICAgIGhvdEFQSS51cGRhdGUoaWQsIG1vZHVsZS5leHBvcnRzLCBfX3Z1ZV90ZW1wbGF0ZV9fKVxuICB9XG59KSgpfVxuXG5cbi8vLy8vLy8vLy8vLy8vLy8vL1xuLy8gV0VCUEFDSyBGT09URVJcbi8vIC4vQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvY29tcG9uZW50cy9BbU5ld0ZlZWQudnVlXG4vLyBtb2R1bGUgaWQgPSAxXG4vLyBtb2R1bGUgY2h1bmtzID0gMCJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 2 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <script>\n\nexports.default = {\n    props: [],\n\n    data: function data() {\n        return {};\n    },\n\n    methods: {\n        deleteFeed: function deleteFeed(feed) {\n            var self = this;\n\n            swal({\n                title: translate('cp.are_you_sure'),\n                text: translate_choice('cp.confirm_delete_items', 1),\n                type: 'warning',\n                confirmButtonText: translate('cp.yes_im_sure'),\n                showCancelButton: true,\n                closeOnConfirm: false\n            }, function (canDelete) {\n                if (canDelete) {\n                    self.$http.delete(cp_url('addons/anchorman/destroy'), {\n                        feed: feed\n                    }, function () {\n                        location.reload();\n                    });\n                }\n            });\n        }\n    },\n\n    ready: function ready() {}\n\n    // </script>\n\n    /* generated by vue-loader */\n\n};\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbUxpc3QudnVlPzkxMDkiXSwic291cmNlc0NvbnRlbnQiOlsiPHNjcmlwdD5cblxuZXhwb3J0IGRlZmF1bHQge1xuICAgcHJvcHM6IFtdLFxuXG4gICAgZGF0YTogZnVuY3Rpb24oKSB7XG4gICAgICAgIHJldHVybiB7fVxuICAgIH0sXG5cbiAgICBtZXRob2RzOiB7XG4gICAgICAgIGRlbGV0ZUZlZWQ6IGZ1bmN0aW9uKGZlZWQpIHtcbiAgICAgICAgICAgIHZhciBzZWxmID0gdGhpcztcblxuICAgICAgICAgICAgc3dhbCh7XG4gICAgICAgICAgICAgICAgdGl0bGU6IHRyYW5zbGF0ZSgnY3AuYXJlX3lvdV9zdXJlJyksXG4gICAgICAgICAgICAgICAgdGV4dDogdHJhbnNsYXRlX2Nob2ljZSgnY3AuY29uZmlybV9kZWxldGVfaXRlbXMnLCAxKSxcbiAgICAgICAgICAgICAgICB0eXBlOiAnd2FybmluZycsXG4gICAgICAgICAgICAgICAgY29uZmlybUJ1dHRvblRleHQ6IHRyYW5zbGF0ZSgnY3AueWVzX2ltX3N1cmUnKSxcbiAgICAgICAgICAgICAgICBzaG93Q2FuY2VsQnV0dG9uOiB0cnVlLFxuICAgICAgICAgICAgICAgIGNsb3NlT25Db25maXJtOiBmYWxzZSxcbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBmdW5jdGlvbihjYW5EZWxldGUpIHtcbiAgICAgICAgICAgICAgICBpZiAoY2FuRGVsZXRlKSB7XG4gICAgICAgICAgICAgICAgICAgIHNlbGYuJGh0dHAuZGVsZXRlKFxuICAgICAgICAgICAgICAgICAgICAgICAgY3BfdXJsKCdhZGRvbnMvYW5jaG9ybWFuL2Rlc3Ryb3knKSwge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGZlZWQ6IGZlZWRcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgICAgICAgICBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgKVxuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfSxcblxuICAgIHJlYWR5OiBmdW5jdGlvbigpIHt9XG59XG5cbjwvc2NyaXB0PlxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIEFtTGlzdC52dWU/MmQyZWQ5ZTgiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFOQTtBQVNBO0FBQ0E7QUFFQTtBQURBO0FBSUE7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQXhCQTtBQUNBO0FBMEJBO0FBQ0E7Ozs7O0FBbkNBOyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ },
/* 3 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <script>\n\nexports.default = {\n    props: [],\n\n    data: function data() {\n        return {\n            feedName: ''\n        };\n    },\n\n    methods: {\n        saveFeed: function saveFeed() {\n            if (this.feedUrl !== '') {\n                this.$http.post(cp_url(\"addons/anchorman/store\"), {\n                    feed_url: this.feedUrl\n                }, function (res) {\n                    location.href = cp_url('addons/anchorman/edit/') + res.feed;\n                });\n            } else {\n                this.$dispatch(\"setFlashError\", 'Uh oh! Enter a url for this feed');\n            }\n        }\n    },\n\n    ready: function ready() {}\n\n    // </script>\n\n    /* generated by vue-loader */\n\n};\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMy5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbU5ld0ZlZWQudnVlP2E2YTIiXSwic291cmNlc0NvbnRlbnQiOlsiPHNjcmlwdD5cblxuZXhwb3J0IGRlZmF1bHQge1xuICAgIHByb3BzOiBbXSxcblxuICAgIGRhdGE6IGZ1bmN0aW9uKCkge1xuICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgZmVlZE5hbWU6ICcnXG4gICAgICAgIH1cbiAgICB9LFxuXG4gICAgbWV0aG9kczoge1xuICAgICAgICBzYXZlRmVlZDogZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICBpZiAodGhpcy5mZWVkVXJsICE9PSAnJykge1xuICAgICAgICAgICAgICAgIHRoaXMuJGh0dHAucG9zdChcbiAgICAgICAgICAgICAgICAgICAgY3BfdXJsKFwiYWRkb25zL2FuY2hvcm1hbi9zdG9yZVwiKSwge1xuICAgICAgICAgICAgICAgICAgICAgICAgZmVlZF91cmw6IHRoaXMuZmVlZFVybFxuICAgICAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgICAgICBmdW5jdGlvbihyZXMpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIGxvY2F0aW9uLmhyZWYgPSBjcF91cmwoJ2FkZG9ucy9hbmNob3JtYW4vZWRpdC8nKSArIHJlcy5mZWVkXG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICApXG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIHRoaXMuJGRpc3BhdGNoKFwic2V0Rmxhc2hFcnJvclwiLCAnVWggb2ghIEVudGVyIGEgdXJsIGZvciB0aGlzIGZlZWQnKVxuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSxcblxuICAgIHJlYWR5OiBmdW5jdGlvbigpIHt9XG59XG5cbjwvc2NyaXB0PlxuXG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIEFtTmV3RmVlZC52dWU/M2Y2Y2UxNmUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFEQTtBQUdBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUVBO0FBREE7QUFJQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFkQTtBQUNBO0FBZ0JBO0FBQ0E7Ozs7O0FBM0JBOyIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ },
/* 4 */
/***/ function(module, exports, __webpack_require__) {

"use strict";
eval("'use strict';\n\n// Vue.component('bkmenulist', require('./components/BkMenuList.vue'));\nVue.component('amlist', __webpack_require__(0));\nVue.component('amnewfeed', __webpack_require__(1));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiNC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbmNob3JtYW4vcmVzb3VyY2VzL2Fzc2V0cy9qcy9tYWluLmpzPzlkZTYiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xuXG4vLyBWdWUuY29tcG9uZW50KCdia21lbnVsaXN0JywgcmVxdWlyZSgnLi9jb21wb25lbnRzL0JrTWVudUxpc3QudnVlJykpO1xuVnVlLmNvbXBvbmVudCgnYW1saXN0JywgcmVxdWlyZSgnLi9jb21wb25lbnRzL0FtTGlzdC52dWUnKSk7XG5WdWUuY29tcG9uZW50KCdhbW5ld2ZlZWQnLCByZXF1aXJlKCcuL2NvbXBvbmVudHMvQW1OZXdGZWVkLnZ1ZScpKTtcblxuXG4vLyBXRUJQQUNLIEZPT1RFUiAvL1xuLy8gQW5jaG9ybWFuL3Jlc291cmNlcy9hc3NldHMvanMvbWFpbi5qcyJdLCJtYXBwaW5ncyI6IkFBQUE7QUFDQTs7QUFFQTsiLCJzb3VyY2VSb290IjoiIn0=");

/***/ }
/******/ ]);