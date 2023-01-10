/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/theme.js":
/*!*************************!*\
  !*** ./src/js/theme.js ***!
  \*************************/
/***/ (() => {

//Jquery no-conflict mode
(function ($) {
  $(document).ready(function () {
    //Events tigger
    window.onresize = setNavOnLoad;
    window.onscroll = showFixedNavbar;

    /**
     * Menu open button
     */
    var toggleButton = document.getElementById("toggle-btn");
    toggleButton.addEventListener("click", changeVisiblility, false);
    function changeVisiblility(e) {
      e.preventDefault();
      document.querySelector('#primary-menu').classList.toggle('show-element');
    }

    /**
     * Filter form open
     */

    var openForm = document.getElementById("open-form");
    //console.log(openForm);
    if (openForm) {
      openForm.addEventListener("click", flipFormIcon, false);
    }
    function flipFormIcon(e) {
      e.preventDefault();
      document.querySelector('#flipicon').classList.toggle('flip');
      document.querySelector('#post_filters').classList.toggle('show-element');
    }

    /**
     * Set primary padding height nav based
     */
    var adminBar = document.getElementById('wpadminbar');
    if (adminBar) {
      var adminBarHeight = adminBar.clientHeight;
    }
    var wpBody = document.getElementById('primary');
    var navBar = document.getElementById('masthead');
    if (navBar) {
      var navBarHeight = navBar.clientHeight;
    }
    wpBody.style.paddingTop = navBarHeight + 'px';
    if (adminBar) {
      navBar.style.marginTop = adminBarHeight + 'px';
    }

    //Recalculate on window resize
    function setNavOnLoad() {
      if (adminBarHeight) {
        adminBarHeight = adminBar.clientHeight;
      }
      wpBody.style.paddingTop = navBarHeight + 'px';
      navBar.style.marginTop = adminBarHeight + 'px';
    }

    /**
     * Fix navbar on scroll
     */
    function showFixedNavbar() {
      pageScroll = window.scrollY;
      //console.log(pageScroll);
      navBar.classList.toggle('has-fixed', pageScroll > 140);
    }

    /**
     * Pagination
     */

    function find_page_number(element) {
      var link_content = element.attr('href').replace(/[^0-9. ]/g, "");
      //console.log('Element vale ', link_content);
      var page_num = parseInt(link_content);
      if (link_content === "") {
        page_num = link_content;
      }
      return page_num;
    }
    $(document).on('click', '.nav-links a', function (event) {
      event.preventDefault();
      page = find_page_number($(this).clone());
      $.ajax({
        url: ajaxpagination.ajaxurl,
        type: 'post',
        data: {
          action: 'ajax_pagination',
          query_vars: ajaxpagination.posts,
          page: page
        },
        success: function success(html) {
          //console.log(ajaxpagination);
          $('#post-grid').remove();
          $('nav.nav-links').remove();
          $('.grid-container').append(html);
        }
      });
    });

    /**
     * Posts Filter
     */

    $('#post_filters').submit(function () {
      $.ajax({
        url: ajaxpagination.ajaxurl,
        data: $('#post_filters').serialize(),
        // form data
        dataType: 'json',
        // this data type allows us to receive objects from the server
        type: 'POST',
        beforeSend: function beforeSend(xhr) {
          $('#post_filters').find('button').text('Filtering...');
        },
        success: function success(data) {
          //console.log(data);
          // when filter applied:
          // set the current page to 1
          ajaxpagination.current_page = 1;

          // set the new query parameters
          ajaxpagination.posts = data.posts;

          // set the new max page parameter
          ajaxpagination.max_page = data.max_page;

          // change the button label back
          $('#post_filters').find('button').text('Filter again');

          // insert the posts to the container
          //$('#misha_posts_wrap').html(data.content); // Original
          $('#post-grid').remove();
          $('nav.nav-links').remove();
          $('.grid-container').append(data.content);
        },
        error: function error(err) {
          console.error(err);
        }
      });
      // do not submit the form
      return false;
    });

    /**
     * Reset filters
     */

    $('#reset_filter_btn').on('click', function (event) {
      event.preventDefault();
      location.reload(true);
    });
  });
})(jQuery);

/***/ }),

/***/ "./src/css/theme.sass":
/*!****************************!*\
  !*** ./src/css/theme.sass ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/public/js/theme": 0,
/******/ 			"style": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunktail_theme"] = self["webpackChunktail_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["style"], () => (__webpack_require__("./src/js/theme.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["style"], () => (__webpack_require__("./src/css/theme.sass")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;