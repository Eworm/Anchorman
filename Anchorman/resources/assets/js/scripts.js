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

eval("var __vue_script__, __vue_template__\nvar __vue_styles__ = {}\n__vue_script__ = __webpack_require__(1)\nif (Object.keys(__vue_script__).some(function (key) { return key !== \"default\" && key !== \"__esModule\" })) {\n  console.warn(\"[vue-loader] resources/assets/src/AnchormanFeedList.vue: named exports in *.vue files are ignored.\")}\nmodule.exports = __vue_script__ || {}\nif (module.exports.__esModule) module.exports = module.exports.default\nvar __vue_options__ = typeof module.exports === \"function\" ? (module.exports.options || (module.exports.options = {})) : module.exports\nif (__vue_template__) {\n__vue_options__.template = __vue_template__\n}\nif (!__vue_options__.computed) __vue_options__.computed = {}\nObject.keys(__vue_styles__).forEach(function (key) {\nvar module = __vue_styles__[key]\n__vue_options__.computed[key] = function () { return module }\n})\nif (false) {(function () {  module.hot.accept()\n  var hotAPI = require(\"vue-hot-reload-api\")\n  hotAPI.install(require(\"vue\"), false)\n  if (!hotAPI.compatible) return\n  var id = \"_v-18a82b1f/AnchormanFeedList.vue\"\n  if (!module.hot.data) {\n    hotAPI.createRecord(id, module.exports)\n  } else {\n    hotAPI.update(id, module.exports, __vue_template__)\n  }\n})()}//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy8uL3Jlc291cmNlcy9hc3NldHMvc3JjL0FuY2hvcm1hbkZlZWRMaXN0LnZ1ZT8wZmU2Il0sInNvdXJjZXNDb250ZW50IjpbInZhciBfX3Z1ZV9zY3JpcHRfXywgX192dWVfdGVtcGxhdGVfX1xudmFyIF9fdnVlX3N0eWxlc19fID0ge31cbl9fdnVlX3NjcmlwdF9fID0gcmVxdWlyZShcIiEhYmFiZWwtbG9hZGVyIS4uLy4uLy4uL25vZGVfbW9kdWxlcy92dWUtbG9hZGVyL2xpYi9zZWxlY3Rvci5qcz90eXBlPXNjcmlwdCZpbmRleD0wIS4vQW5jaG9ybWFuRmVlZExpc3QudnVlXCIpXG5pZiAoT2JqZWN0LmtleXMoX192dWVfc2NyaXB0X18pLnNvbWUoZnVuY3Rpb24gKGtleSkgeyByZXR1cm4ga2V5ICE9PSBcImRlZmF1bHRcIiAmJiBrZXkgIT09IFwiX19lc01vZHVsZVwiIH0pKSB7XG4gIGNvbnNvbGUud2FybihcIlt2dWUtbG9hZGVyXSByZXNvdXJjZXMvYXNzZXRzL3NyYy9BbmNob3JtYW5GZWVkTGlzdC52dWU6IG5hbWVkIGV4cG9ydHMgaW4gKi52dWUgZmlsZXMgYXJlIGlnbm9yZWQuXCIpfVxubW9kdWxlLmV4cG9ydHMgPSBfX3Z1ZV9zY3JpcHRfXyB8fCB7fVxuaWYgKG1vZHVsZS5leHBvcnRzLl9fZXNNb2R1bGUpIG1vZHVsZS5leHBvcnRzID0gbW9kdWxlLmV4cG9ydHMuZGVmYXVsdFxudmFyIF9fdnVlX29wdGlvbnNfXyA9IHR5cGVvZiBtb2R1bGUuZXhwb3J0cyA9PT0gXCJmdW5jdGlvblwiID8gKG1vZHVsZS5leHBvcnRzLm9wdGlvbnMgfHwgKG1vZHVsZS5leHBvcnRzLm9wdGlvbnMgPSB7fSkpIDogbW9kdWxlLmV4cG9ydHNcbmlmIChfX3Z1ZV90ZW1wbGF0ZV9fKSB7XG5fX3Z1ZV9vcHRpb25zX18udGVtcGxhdGUgPSBfX3Z1ZV90ZW1wbGF0ZV9fXG59XG5pZiAoIV9fdnVlX29wdGlvbnNfXy5jb21wdXRlZCkgX192dWVfb3B0aW9uc19fLmNvbXB1dGVkID0ge31cbk9iamVjdC5rZXlzKF9fdnVlX3N0eWxlc19fKS5mb3JFYWNoKGZ1bmN0aW9uIChrZXkpIHtcbnZhciBtb2R1bGUgPSBfX3Z1ZV9zdHlsZXNfX1trZXldXG5fX3Z1ZV9vcHRpb25zX18uY29tcHV0ZWRba2V5XSA9IGZ1bmN0aW9uICgpIHsgcmV0dXJuIG1vZHVsZSB9XG59KVxuaWYgKG1vZHVsZS5ob3QpIHsoZnVuY3Rpb24gKCkgeyAgbW9kdWxlLmhvdC5hY2NlcHQoKVxuICB2YXIgaG90QVBJID0gcmVxdWlyZShcInZ1ZS1ob3QtcmVsb2FkLWFwaVwiKVxuICBob3RBUEkuaW5zdGFsbChyZXF1aXJlKFwidnVlXCIpLCBmYWxzZSlcbiAgaWYgKCFob3RBUEkuY29tcGF0aWJsZSkgcmV0dXJuXG4gIHZhciBpZCA9IFwiX3YtMThhODJiMWYvQW5jaG9ybWFuRmVlZExpc3QudnVlXCJcbiAgaWYgKCFtb2R1bGUuaG90LmRhdGEpIHtcbiAgICBob3RBUEkuY3JlYXRlUmVjb3JkKGlkLCBtb2R1bGUuZXhwb3J0cylcbiAgfSBlbHNlIHtcbiAgICBob3RBUEkudXBkYXRlKGlkLCBtb2R1bGUuZXhwb3J0cywgX192dWVfdGVtcGxhdGVfXylcbiAgfVxufSkoKX1cblxuXG4vLy8vLy8vLy8vLy8vLy8vLy9cbi8vIFdFQlBBQ0sgRk9PVEVSXG4vLyAuL3Jlc291cmNlcy9hc3NldHMvc3JjL0FuY2hvcm1hbkZlZWRMaXN0LnZ1ZVxuLy8gbW9kdWxlIGlkID0gMFxuLy8gbW9kdWxlIGNodW5rcyA9IDAiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ },
/* 1 */
/***/ function(module, exports) {

"use strict";
eval("'use strict';\n\nObject.defineProperty(exports, \"__esModule\", {\n    value: true\n});\n// <script>\n\nexports.default = {\n    props: [],\n\n    data: function data() {\n        return {};\n    },\n\n    methods: {\n\n        deleteFeed: function deleteFeed(feed) {\n            var self = this;\n\n            swal({\n                title: translate('cp.are_you_sure'),\n                text: translate_choice('cp.confirm_delete_items', 1),\n                type: 'warning',\n                confirmButtonText: translate('cp.yes_im_sure'),\n                showCancelButton: true,\n                closeOnConfirm: false\n            }, function (canDelete) {\n                if (canDelete) {\n                    self.$http.delete(cp_url('addons/anchorman/destroy'), {\n                        feed: feed\n                    }, function () {\n                        location.reload();\n                    });\n                }\n            });\n        },\n\n        refresh: function refresh() {\n            var self = this;\n            self.$http.get(cp_url('addons/anchorman/refreshAll'));\n            location.reload();\n        }\n    },\n\n    ready: function ready() {}\n\n    // </script>\n\n    /* generated by vue-loader */\n\n};\nmodule.exports = exports['default'];//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMS5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9BbmNob3JtYW5GZWVkTGlzdC52dWU/MzllYyJdLCJzb3VyY2VzQ29udGVudCI6WyI8c2NyaXB0PlxuXG5leHBvcnQgZGVmYXVsdCB7XG4gICBwcm9wczogW10sXG5cbiAgICBkYXRhOiBmdW5jdGlvbigpIHtcbiAgICAgICAgcmV0dXJuIHt9XG4gICAgfSxcblxuICAgIG1ldGhvZHM6IHtcblxuICAgICAgICBkZWxldGVGZWVkOiBmdW5jdGlvbihmZWVkKSB7XG4gICAgICAgICAgICB2YXIgc2VsZiA9IHRoaXM7XG5cbiAgICAgICAgICAgIHN3YWwoe1xuICAgICAgICAgICAgICAgIHRpdGxlOiB0cmFuc2xhdGUoJ2NwLmFyZV95b3Vfc3VyZScpLFxuICAgICAgICAgICAgICAgIHRleHQ6IHRyYW5zbGF0ZV9jaG9pY2UoJ2NwLmNvbmZpcm1fZGVsZXRlX2l0ZW1zJywgMSksXG4gICAgICAgICAgICAgICAgdHlwZTogJ3dhcm5pbmcnLFxuICAgICAgICAgICAgICAgIGNvbmZpcm1CdXR0b25UZXh0OiB0cmFuc2xhdGUoJ2NwLnllc19pbV9zdXJlJyksXG4gICAgICAgICAgICAgICAgc2hvd0NhbmNlbEJ1dHRvbjogdHJ1ZSxcbiAgICAgICAgICAgICAgICBjbG9zZU9uQ29uZmlybTogZmFsc2UsXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgZnVuY3Rpb24oY2FuRGVsZXRlKSB7XG4gICAgICAgICAgICAgICAgaWYgKGNhbkRlbGV0ZSkge1xuICAgICAgICAgICAgICAgICAgICBzZWxmLiRodHRwLmRlbGV0ZShcbiAgICAgICAgICAgICAgICAgICAgICAgIGNwX3VybCgnYWRkb25zL2FuY2hvcm1hbi9kZXN0cm95JyksIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBmZWVkOiBmZWVkXG4gICAgICAgICAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgICAgICAgICAgZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgbG9jYXRpb24ucmVsb2FkKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIClcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfSxcblxuICAgICAgICByZWZyZXNoOiBmdW5jdGlvbigpIHtcbiAgICAgICAgICAgIHZhciBzZWxmID0gdGhpcztcbiAgICAgICAgICAgIHNlbGYuJGh0dHAuZ2V0KFxuICAgICAgICAgICAgICAgIGNwX3VybCgnYWRkb25zL2FuY2hvcm1hbi9yZWZyZXNoQWxsJylcbiAgICAgICAgICAgICk7XG4gICAgICAgICAgICBsb2NhdGlvbi5yZWxvYWQoKTtcbiAgICAgICAgfVxuICAgIH0sXG5cbiAgICByZWFkeTogZnVuY3Rpb24oKSB7fVxufVxuXG48L3NjcmlwdD5cblxuXG5cbi8vIFdFQlBBQ0sgRk9PVEVSIC8vXG4vLyBBbmNob3JtYW5GZWVkTGlzdC52dWU/NTk2NDExOGUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQU5BO0FBU0E7QUFDQTtBQUVBO0FBREE7QUFJQTtBQUNBO0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFHQTtBQUNBO0FBakNBO0FBQ0E7QUFtQ0E7QUFDQTs7Ozs7QUE1Q0E7Iiwic291cmNlUm9vdCI6IiJ9");

/***/ },
/* 2 */
/***/ function(module, exports, __webpack_require__) {

"use strict";
eval("'use strict';\n\nVue.component('anchorman-feed-list', __webpack_require__(0));//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMi5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL3NyYy9zY3JpcHRzLmpzP2I4NzMiXSwic291cmNlc0NvbnRlbnQiOlsiJ3VzZSBzdHJpY3QnO1xuXG5WdWUuY29tcG9uZW50KCdhbmNob3JtYW4tZmVlZC1saXN0JywgcmVxdWlyZSgnLi9BbmNob3JtYW5GZWVkTGlzdC52dWUnKSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvc3JjL3NjcmlwdHMuanMiXSwibWFwcGluZ3MiOiJBQUFBO0FBQ0E7QUFDQSIsInNvdXJjZVJvb3QiOiIifQ==");

/***/ }
/******/ ]);