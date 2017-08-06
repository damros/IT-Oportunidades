/* ----------------- Start Document ----------------- */
(function($){
    "use strict";

    $(document).ready(function(){


    /*----------------------------------------------------*/
    /*  Navigation
    /*----------------------------------------------------*/
    if($('header').hasClass('full-width')) {
        $('header').attr('data-full', 'yes');
    }  
    if($('header').hasClass('alternative')) {
        $('header').attr('data-alt', 'yes');
    }
    function menumobile(){
        var winWidth = $(window).width();
        if( winWidth < 973 ) {
            $('#navigation').removeClass('menu');
            $('#navigation li').removeClass('dropdown');
            $('header').removeClass('full-width');
            $('#navigation').superfish('destroy');
        } else {
            $('#navigation').addClass('menu');
            if($('header').data('full') === "yes" ) {
                 $('header').addClass('full-width')
            }
            $('#navigation').superfish({
                delay:       300,                               // one second delay on mouseout
                animation:   {opacity:'show'},   // fade-in and slide-down animation
                speed:       200,                               // animation speed
                speedOut:    50                                 // out animation speed
            });
        }
        if( winWidth < 1272 ) {
            $('header').addClass('alternative').removeClass('full-width');
        } else {
            if($('header').data('alt') === "yes" ) {} else {
                $('header').removeClass('alternative');
            }
        }
    }

    $(window).resize(function (){
        menumobile();
    });
    menumobile();


     /*----------------------------------------------------*/
    /*  Mobile Navigation
    /*----------------------------------------------------*/
        var jPanelMenu = $.jPanelMenu({
          menu: '#responsive',
          animated: false,
          duration: 200,
          keyboardShortcuts: false,
          closeOnContentClick: true
        });


      // desktop devices
        $('.menu-trigger').on('click',function(){
          var jpm = $(this);

          if( jpm.hasClass('active') )
          {
            jPanelMenu.off();
            jpm.removeClass('active');
          }
          else
          {
            jPanelMenu.on();
            jPanelMenu.open();
            jpm.addClass('active');
          }
          return false;
        });


        // Removes SuperFish Styles
        $('#jPanelMenu-menu').removeClass('sf-menu');
        $('#jPanelMenu-menu li ul').removeAttr('style');


        $(window).resize(function (){
          var winWidth = $(window).width();
          var jpmactive = $('.menu-trigger');
          if(winWidth>990) {
            jPanelMenu.off();
            jpmactive.removeClass('active');
          }
        });


    /*----------------------------------------------------*/
    /*  Stacktable / Responsive Tables Plug-in
    /*----------------------------------------------------*/
    $('.responsive-table').stacktable();
    


    /*----------------------------------------------------*/
    /*  Back to Top
    /*----------------------------------------------------*/
        var pxShow = 400; // height on which the button will show
        var fadeInTime = 400; // how slow / fast you want the button to show
        var fadeOutTime = 400; // how slow / fast you want the button to hide
        var scrollSpeed = 400; // how slow / fast you want the button to scroll to top.

        $(window).scroll(function(){
          if($(window).scrollTop() >= pxShow){
            $("#backtotop").fadeIn(fadeInTime);
          } else {
            $("#backtotop").fadeOut(fadeOutTime);
          }
        });

        $('#backtotop a').on('click',function(){
          $('html, body').animate({scrollTop:0}, scrollSpeed);
          return false;
        });
    


    /*----------------------------------------------------*/
    /*  Showbiz Carousel
    /*----------------------------------------------------*/
        $('#job-spotlight').showbizpro({
            dragAndScroll:"off",
            visibleElementsArray:[1,1,1,1],
            carousel:"off",
            entrySizeOffset:0,
            allEntryAtOnce:"off",
            rewindFromEnd:"off",
            autoPlay:"off",
            delay:2000,
            speed:400,
            easing:'easeOut'
        });

        $('#our-clients').showbizpro({
            dragAndScroll:"off",
            visibleElementsArray:[5,4,3,1],
            carousel:"off",
            entrySizeOffset:0,
            allEntryAtOnce:"off"
        });



    /*----------------------------------------------------*/
    /*  Revolution Slider
    /*----------------------------------------------------*/
        $('.fullwidthbanner').revolution({
            delay: 9000,
            startwidth: 1180,
            startheight: 585,
            onHoverStop: "on", // Stop Banner Timet at Hover on Slide on/off
            navigationType: "none", //bullet, none
            navigationArrows: "verticalcentered", //nexttobullets, verticalcentered, none
            navigationStyle: "none", //round, square, navbar, none
            touchenabled: "on", // Enable Swipe Function : on/off
            navOffsetHorizontal: 0,
            navOffsetVertical: 20,
            stopAtSlide: -1, // Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
            stopAfterLoops: -1, // Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic
            fullWidth: "on",
        });



    /*----------------------------------------------------*/
    /*  Flexslider
    /*----------------------------------------------------*/
        $('.testimonials-slider').flexslider({
            animation: "fade",
            controlsContainer: $(".custom-controls-container"),
            customDirectionNav: $(".custom-navigation a")
        });



    /*----------------------------------------------------*/
    /*  Counters
    /*----------------------------------------------------*/

        $('.counter').counterUp({
            delay: 10,
            time: 800
        });



    /*----------------------------------------------------*/
    /*  Chosen Plugin
    /*----------------------------------------------------*/

        var config = {
          '.chosen-select'           : {disable_search_threshold: 10, width:"100%"},
          '.chosen-select-deselect'  : {allow_single_deselect:true, width:"100%"},
          '.chosen-select-no-single' : {disable_search_threshold:10, width:"100%"},
          '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
          '.chosen-select-width'     : {width:"95%"}
        };
        for (var selector in config) {
          $(selector).chosen(config[selector]);
        }


    /*----------------------------------------------------*/
    /*  Checkboxes "any" fix
    /*----------------------------------------------------*/   
        $('.checkboxes').find('input:first').addClass('first')
        $('.checkboxes input').on('change', function() {
            if($(this).hasClass('first')){
                $(this).parents('.checkboxes').find('input').prop('checked', false);
                $(this).prop('checked', true);
            } else {
                $(this).parents('.checkboxes').find('input:first').not(this).prop('checked', false);
            }
        });


    /*----------------------------------------------------*/
    /*  Magnific Popup
    /*----------------------------------------------------*/   
        
            $('body').magnificPopup({
                type: 'image',
                delegate: 'a.mfp-gallery',

                fixedContentPos: true,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: true,

                removalDelay: 0,
                mainClass: 'mfp-fade',

                gallery:{enabled:true},

                callbacks: {
                    buildControls: function() {
                        console.log('inside'); this.contentContainer.append(this.arrowLeft.add(this.arrowRight));
                    }
                }
            });


            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });


            $('.mfp-image').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                mainClass: 'mfp-fade',
                image: {
                    verticalFit: true
                }
            });


            $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,

                fixedContentPos: false
            });


     /*---------------------------------------------------*/
    /*  Contact Form
    /*---------------------------------------------------*/
    $("#contactform .submit").on('click',function(e) {


      e.preventDefault();
      var user_name       = $('input[name=name]').val();
      var user_email      = $('input[name=email]').val();
      var user_comment    = $('textarea[name=comment]').val();

      //simple validation at client's end
      //we simply change border color to red if empty field using .css()
      var proceed = true;
      if(user_name===""){
          $('input[name=name]').addClass('error');
            proceed = false;
          }
          if(user_email===""){
            $('input[name=email]').addClass('error');
            proceed = false;
          }
          if(user_comment==="") {
            $('textarea[name=comment]').addClass('error');
            proceed = false;
          }

          //everything looks good! proceed...
          if(proceed) {
            $('.hide').fadeIn();
            $("#contactform .submit").fadeOut();
              //data to be sent to server
              var post_data = {'userName':user_name, 'userEmail':user_email, 'userComment':user_comment};

              //Ajax post data to server
              $.post('contact.php', post_data, function(response){
                var output;
                //load json data from server and output comment
                if(response.type == 'error')
                  {
                    output = '<div class="error">'+response.text+'</div>';
                    $('.hide').fadeOut();
                    $("#contactform .submit").fadeIn();
                  } else {

                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $('#contact div input').val('');
                    $('#contact textarea').val('');
                    $('.hide').fadeOut();
                    $("#contactform .submit").fadeIn().attr("disabled", "disabled").css({'backgroundColor':'#c0c0c0', 'cursor': 'default' });
                  }

                  $("#result").hide().html(output).slideDown();
                }, 'json');
            }
      });

    //reset previously set border colors and hide all comment on .keyup()
    $("#contactform input, #contactform textarea").keyup(function() {
      $("#contactform input, #contactform textarea").removeClass('error');
      $("#result").slideUp();
    });




    /*----------------------------------------------------*/
    /*  Accordions
    /*----------------------------------------------------*/

        var $accor = $('.accordion');

         $accor.each(function() {
            $(this).addClass('ui-accordion ui-widget ui-helper-reset');
            $(this).find('h3').addClass('ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all');
            $(this).find('div').addClass('ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom');
            $(this).find("div").hide().first().show();
            $(this).find("h3").first().removeClass('ui-accordion-header-active ui-state-active ui-corner-top').addClass('ui-accordion-header-active ui-state-active ui-corner-top');
            $(this).find("span").first().addClass('ui-accordion-icon-active');
        });

        var $trigger = $accor.find('h3');

        $trigger.on('click', function(e) {
            var location = $(this).parent();

            if( $(this).next().is(':hidden') ) {
                var $triggerloc = $('h3',location);
                $triggerloc.removeClass('ui-accordion-header-active ui-state-active ui-corner-top').next().slideUp(300);
                $triggerloc.find('span').removeClass('ui-accordion-icon-active');
                $(this).find('span').addClass('ui-accordion-icon-active');
                $(this).addClass('ui-accordion-header-active ui-state-active ui-corner-top').next().slideDown(300);
            }
             e.preventDefault();
        });

    

    /*----------------------------------------------------*/
    /*  Application Tabs
    /*----------------------------------------------------*/   
        // Get all the links.
        var link = $(".app-link");
        $('.close-tab').hide();

        $('.app-tabs div.app-tab-content').hide();
        // On clicking of the links do something.
        link.on('click', function(e) {

            e.preventDefault();
            $(this).parents('div.application').find('.close-tab').fadeOut();
            if($(this).hasClass('opened')) {
                $(this).parents('div.application').find(".app-tabs div.app-tab-content").slideUp('fast');
                $(this).parents('div.application').find('.close-tab').fadeOut(10);
                $(this).removeClass('opened');
            } else {
                $(this).parents('div.application').find(".app-link").removeClass('opened');
                $(this).addClass('opened');
                var a = $(this).attr("href");
                $(this).parents('div.application').find(a).slideDown('fast').removeClass('closed').addClass('opened');
                $(this).parents('div.application').find('.close-tab').fadeIn(10);
            }

            $(this).parents('div.application').find(".app-tabs div.app-tab-content").not(a).slideUp('fast').addClass('closed').removeClass('opened');
            
        });

        $('.close-tab').on('click',function(e){
            $(this).fadeOut();
            e.preventDefault();
            $(this).parents('div.application').find(".app-link").removeClass('opened');
            $(this).parents('div.application').find(".app-tabs div.app-tab-content").slideUp('fast').addClass('closed').removeClass('opened');
        })


    /*----------------------------------------------------*/
    /*  Add Resume 
    /*----------------------------------------------------*/   
        $('.box-to-clone:not(.box-loaded)').hide();
        $('.add-box').on('click', function(e) {
			
            e.preventDefault();
			
            var newElem = $(this).parent().find('.box-to-clone:first').clone();
            newElem.find('input').val('');
            newElem.find('.regfield').val('1');
            newElem.find('.tooltipstered').tooltipster({
				trigger: 'custom', // default is 'hover' which is no good here
				onlyOne: false, // allow multiple tips to be open at a time
				position: 'right', // display the tips to the right of the element
				content: 'Revise este campo',
				contentCloning: false
			});
		
            newElem.prependTo($(this).parent()).show();
            //var height = $(this).prev('.box-to-clone').outerHeight(true);
            
            $("html, body").stop().animate({ scrollTop: $(newElem).offset().top}, 600);
        });

        $('body').on('click','.remove-box', function(e) {
            e.preventDefault();
            $(this).parent().remove();
        });



    /*----------------------------------------------------*/
    /*  Tabs
    /*----------------------------------------------------*/ 
  

        var $tabsNav    = $('.tabs-nav'),
        $tabsNavLis = $tabsNav.children('li');
        // $tabContent = $('.tab-content');

        $tabsNav.each(function() {
            var $this = $(this);

            $this.next().children('.tab-content').stop(true,true).hide()
            .first().show();

            $this.children('li').first().addClass('active').stop(true,true).show();
        });

        $tabsNavLis.on('click', function(e) {
            var $this = $(this);

            $this.siblings().removeClass('active').end()
            .addClass('active');

            $this.parent().next().children('.tab-content').stop(true,true).hide()
            .siblings( $this.find('a').attr('href') ).fadeIn();

            e.preventDefault();
        });
          var hash = window.location.hash;
    var anchor = $('.tabs-nav a[href="' + hash + '"]');
    if (anchor.length === 0) {
        $(".tabs-nav li:first").addClass("active").show(); //Activate first tab
        $(".tab-content:first").show(); //Show first tab content
    } else {
        anchor.parent('li').trigger( "click" );
    }

// ------------------ End Document ------------------ //
});

})(this.jQuery);

  
/*
 * jQuery Superfish Menu Plugin
 * Copyright (c) 2013 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *	http://www.opensource.org/licenses/mit-license.php
 *	http://www.gnu.org/licenses/gpl.html
 */

(function ($) {
	"use strict";

	var methods = (function () {
		// private properties and methods go here
		var c = {
				bcClass: 'sf-breadcrumb',
				menuClass: 'sf-js-enabled',
				anchorClass: 'sf-with-ul',
				menuArrowClass: 'sf-arrows'
			},
			ios = (function () {
				var ios = /iPhone|iPad|iPod/i.test(navigator.userAgent);
				if (ios) {
					// iOS clicks only bubble as far as body children
					$(window).load(function () {
						$('body').children().on('click', $.noop);
					});
				}
				return ios;
			})(),
			wp7 = (function () {
				var style = document.documentElement.style;
				return ('behavior' in style && 'fill' in style && /iemobile/i.test(navigator.userAgent));
			})(),
			toggleMenuClasses = function ($menu, o) {
				var classes = c.menuClass;
				if (o.cssArrows) {
					classes += ' ' + c.menuArrowClass;
				}
				$menu.toggleClass(classes);
			},
			setPathToCurrent = function ($menu, o) {
				return $menu.find('li.' + o.pathClass).slice(0, o.pathLevels)
					.addClass(o.hoverClass + ' ' + c.bcClass)
						.filter(function () {
							return ($(this).children(o.popUpSelector).hide().show().length);
						}).removeClass(o.pathClass);
			},
			toggleAnchorClass = function ($li) {
				$li.children('a').toggleClass(c.anchorClass);
			},
			toggleTouchAction = function ($menu) {
				var touchAction = $menu.css('ms-touch-action');
				touchAction = (touchAction === 'pan-y') ? 'auto' : 'pan-y';
				$menu.css('ms-touch-action', touchAction);
			},
			applyHandlers = function ($menu, o) {
				var targets = 'li:has(' + o.popUpSelector + ')';
				if ($.fn.hoverIntent && !o.disableHI) {
					$menu.hoverIntent(over, out, targets);
				}
				else {
					$menu
						.on('mouseenter.superfish', targets, over)
						.on('mouseleave.superfish', targets, out);
				}
				var touchevent = 'MSPointerDown.superfish';
				if (!ios) {
					touchevent += ' touchend.superfish';
				}
				if (wp7) {
					touchevent += ' mousedown.superfish';
				}
				$menu
					.on('focusin.superfish', 'li', over)
					.on('focusout.superfish', 'li', out)
					.on(touchevent, 'a', o, touchHandler);
			},
			touchHandler = function (e) {
				var $this = $(this),
					$ul = $this.siblings(e.data.popUpSelector);

				if ($ul.length > 0 && $ul.is(':hidden')) {
					$this.one('click.superfish', false);
					if (e.type === 'MSPointerDown') {
						$this.trigger('focus');
					} else {
						$.proxy(over, $this.parent('li'))();
					}
				}
			},
			over = function () {
				var $this = $(this),
					o = getOptions($this);
				clearTimeout(o.sfTimer);
				$this.siblings().superfish('hide').end().superfish('show');
			},
			out = function () {
				var $this = $(this),
					o = getOptions($this);
				if (ios) {
					$.proxy(close, $this, o)();
				}
				else {
					clearTimeout(o.sfTimer);
					o.sfTimer = setTimeout($.proxy(close, $this, o), o.delay);
				}
			},
			close = function (o) {
				o.retainPath = ($.inArray(this[0], o.$path) > -1);
				this.superfish('hide');

				if (!this.parents('.' + o.hoverClass).length) {
					o.onIdle.call(getMenu(this));
					if (o.$path.length) {
						$.proxy(over, o.$path)();
					}
				}
			},
			getMenu = function ($el) {
				return $el.closest('.' + c.menuClass);
			},
			getOptions = function ($el) {
				return getMenu($el).data('sf-options');
			};

		return {
			// public methods
			hide: function (instant) {
				if (this.length) {
					var $this = this,
						o = getOptions($this);
					if (!o) {
						return this;
					}
					var not = (o.retainPath === true) ? o.$path : '',
						$ul = $this.find('li.' + o.hoverClass).add(this).not(not).removeClass(o.hoverClass).children(o.popUpSelector),
						speed = o.speedOut;

					if (instant) {
						$ul.show();
						speed = 0;
					}
					o.retainPath = false;
					o.onBeforeHide.call($ul);
					$ul.stop(true, true).animate(o.animationOut, speed, function () {
						var $this = $(this);
						o.onHide.call($this);
					});
				}
				return this;
			},
			show: function () {
				var o = getOptions(this);
				if (!o) {
					return this;
				}
				var $this = this.addClass(o.hoverClass),
					$ul = $this.children(o.popUpSelector);

				o.onBeforeShow.call($ul);
				$ul.stop(true, true).animate(o.animation, o.speed, function () {
					o.onShow.call($ul);
				});
				return this;
			},
			destroy: function () {
				return this.each(function () {
					var $this = $(this),
						o = $this.data('sf-options'),
						$hasPopUp;
					if (!o) {
						return false;
					}
					$hasPopUp = $this.find(o.popUpSelector).parent('li');
					clearTimeout(o.sfTimer);
					toggleMenuClasses($this, o);
					toggleAnchorClass($hasPopUp);
					toggleTouchAction($this);
					// remove event handlers
					$this.off('.superfish').off('.hoverIntent');
					// clear animation's inline display style
					$hasPopUp.children(o.popUpSelector).attr('style', function (i, style) {
						return style.replace(/display[^;]+;?/g, '');
					});
					// reset 'current' path classes
					o.$path.removeClass(o.hoverClass + ' ' + c.bcClass).addClass(o.pathClass);
					$this.find('.' + o.hoverClass).removeClass(o.hoverClass);
					o.onDestroy.call($this);
					$this.removeData('sf-options');
				});
			},
			init: function (op) {
				return this.each(function () {
					var $this = $(this);
					if ($this.data('sf-options')) {
						return false;
					}
					var o = $.extend({}, $.fn.superfish.defaults, op),
						$hasPopUp = $this.find(o.popUpSelector).parent('li');
					o.$path = setPathToCurrent($this, o);

					$this.data('sf-options', o);

					toggleMenuClasses($this, o);
					toggleAnchorClass($hasPopUp);
					toggleTouchAction($this);
					applyHandlers($this, o);

					$hasPopUp.not('.' + c.bcClass).superfish('hide', true);

					o.onInit.call(this);
				});
			}
		};
	})();

	$.fn.superfish = function (method, args) {
		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		}
		else if (typeof method === 'object' || ! method) {
			return methods.init.apply(this, arguments);
		}
		else {
			return $.error('Method ' +  method + ' does not exist on jQuery.fn.superfish');
		}
	};

	$.fn.superfish.defaults = {
		popUpSelector: 'ul,.sf-mega', // within menu context
		hoverClass: 'sfHover',
		pathClass: 'overrideThisToUse',
		pathLevels: 1,
		delay: 800,
		animation: {opacity: 'show'},
		animationOut: {opacity: 'hide'},
		speed: 'normal',
		speedOut: 'fast',
		cssArrows: true,
		disableHI: false,
		onInit: $.noop,
		onBeforeShow: $.noop,
		onShow: $.noop,
		onBeforeHide: $.noop,
		onHide: $.noop,
		onIdle: $.noop,
		onDestroy: $.noop
	};

	// soon to be deprecated
	$.fn.extend({
		hideSuperfishUl: methods.hide,
		showSuperfishUl: methods.show
	});

})(jQuery);

/**
  *
  * jPanelMenu 1.4.1 (http://jpanelmenu.com)
  * By Anthony Colangelo (http://acolangelo.com)
  *
* */

(function($){
  $.jPanelMenu = function(options) {
    if ( typeof(options) == "undefined" || options == null ) { options = {}; };

    var jP = {
      options: $.extend({
        menu: '#menu',
        panel: 'body',
        trigger: '.menu-trigger',
        excludedPanelContent: 'style, script, .viewer',
        clone: true,
        keepEventHandlers: false,

        direction: 'left',
        openPosition: '250px',
        animated: false,
        closeOnContentClick: false,

        keyboardShortcuts: [
          {
            code: 27,
            open: false,
            close: true 
          },
          {
            code: 37,
            open: false,
            close: true 
          },
          {
            code: 39,
            open: true,
            close: true 
          },
          {
            code: 77,
            open: true,
            close: true 
          }
        ],

        duration: 150,
        openDuration: options.duration || 150,
        closeDuration: options.duration || 150,

        easing: 'ease-in-out',
        openEasing: options.easing || 'ease-in-out',
        closeEasing: options.easing || 'ease-in-out',

        before: function(){ },
        beforeOpen: function(){ },
        beforeClose: function(){ },

        after: function(){ },
        afterOpen: function(){ },
        afterClose: function(){ },

        beforeOn: function(){ },
        afterOn: function(){ },

        beforeOff: function(){ },
        afterOff: function(){ }
      },options),

      settings: {
        transitionsSupported: 'WebkitTransition' in document.body.style ||
                    'MozTransition' in document.body.style ||
                    'msTransition' in document.body.style ||
                    'OTransition' in document.body.style ||
                    'Transition' in document.body.style
        ,
        transformsSupported:  'WebkitTransform' in document.body.style ||
                    'MozTransform' in document.body.style ||
                    'msTransform' in document.body.style ||
                    'OTransform' in document.body.style ||
                    'Transform' in document.body.style
        ,
        cssPrefix: '',
        panelPosition: 'static',
        positionUnits: 'px'
      },

      menu: '#jPanelMenu-menu',

      panel: '.jPanelMenu-panel',

      timeouts: {},

      clearTimeouts: function() {
        clearTimeout(jP.timeouts.open);
        clearTimeout(jP.timeouts.afterOpen);
        clearTimeout(jP.timeouts.afterClose);
      },

      setPositionUnits: function() {
        var foundUnit = false,
          allowedUnits = ['%','px','em']
        ;

        for (var unitID = 0; unitID < allowedUnits.length; unitID++) {
          var unit = allowedUnits[unitID];
          if ( jP.options.openPosition.toString().substr(-unit.length) == unit )
          {
            foundUnit = true;
            jP.settings.positionUnits = unit;
          }
        }

        if ( !foundUnit ) { jP.options.openPosition = parseInt(jP.options.openPosition) + jP.settings.positionUnits }
      },

      computePositionStyle: function(open, string) {
        var position = (open)?jP.options.openPosition:'0' + jP.settings.positionUnits;
        var property = {};
        if ( jP.settings.transformsSupported ) {
          var direction = (open && jP.options.direction == 'right')?'-':'';
          var translate = 'translate3d(' + direction + position + ',0,0)';
          var transform = 'transform';

          if ( string ) {
            property = '';
            if ( jP.settings.cssPrefix != '' ) { property = jP.settings.cssPrefix + transform + ':' + translate + ';' }
            property += transform + ':' + translate + ';';
          } else {
            if ( jP.settings.cssPrefix != '' ) {  property[jP.settings.cssPrefix + transform] = translate; }
            property[transform] = translate;
          }
        } else {
          if ( string ) {
            property = '';
            property = jP.options.direction + ': ' + position + ';';
          } else {
            property[jP.options.direction] = position;
          }
        }
        return property;
      },

      setCSSPrefix: function() {
        jP.settings.cssPrefix = jP.getCSSPrefix();
      },

      setjPanelMenuStyles: function() {
        var bg = 'background:#fff',
          htmlBG = $('html').css('background-color'),
          bodyBG = $('body').css('background-color');

        var backgroundGenerator = function(element){
          var bgs = [];
          $.each(['background-color','background-image','background-position','background-repeat','background-attachment','background-size','background-clip'], function(i,value){
            if( element.css(value) !== '' ) {
              bgs.push(value+':'+element.css(value));
            }
          });
          return bgs.join(';');
        };

        if ( bodyBG !== 'transparent' && bodyBG !== "rgba(0, 0, 0, 0)") {
          bg = backgroundGenerator($('body'));
        } else if ( htmlBG !== 'transparent' && htmlBG !== "rgba(0, 0, 0, 0)") {
          bg = backgroundGenerator($('html'));
        }
        
        if ( $('#jPanelMenu-style-master').length == 0 ) {
          $('body').append('<style id="jPanelMenu-style-master">body{width:100%}.jPanelMenu,body{overflow-x:hidden}#jPanelMenu-menu{display:block;position:fixed;top:0;'+jP.options.direction+':0;height:100%;z-index:-1;overflow-x:hidden;overflow-y:scroll;-webkit-overflow-scrolling:touch}.jPanelMenu-panel{position:static;'+jP.options.direction+':0;top:0;z-index:2;width:100%;min-height:100%;' + bg + ';}</style>');
        }
      },

      setMenuState: function(open) {
        var position = (open)?'open':'closed';
        $(jP.options.panel).attr('data-menu-position', position);
      },

      getMenuState: function() {
        return $(jP.options.panel).attr('data-menu-position');
      },

      menuIsOpen: function() {
        if ( jP.getMenuState() == 'open' ) return true;
        else return false;
      },

      setMenuStyle: function(styles) {
        $(jP.menu).css(styles);
      },

      setPanelStyle: function(styles) {
        $(jP.panel).css(styles);
      },

      showMenu: function() {
        jP.setMenuStyle({
          display: 'block'
        });
        jP.setMenuStyle({
          'z-index': '1'
        });
      },

      hideMenu: function() {
        jP.setMenuStyle({
          'z-index': '-1'
        });
        jP.setMenuStyle({
          display: 'none'
        });
      },

      enableTransitions: function(duration, easing) {
        var formattedDuration = duration/1000;
        var formattedEasing = jP.getCSSEasingFunction(easing);
        jP.disableTransitions();
        $('body').append('<style id="jPanelMenu-style-transitions">.jPanelMenu-panel{' + jP.settings.cssPrefix + 'transition: all ' + formattedDuration + 's ' + formattedEasing + '; transition: all ' + formattedDuration + 's ' + formattedEasing + ';}</style>');
      },

      disableTransitions: function() {
        $('#jPanelMenu-style-transitions').remove();
      },

      getCSSEasingFunction: function(name) {
        switch ( name )
        {
          case 'linear':
            return name;
            break;

          case 'ease':
            return name;
            break;

          case 'ease-in':
            return name;
            break;

          case 'ease-out':
            return name;
            break;

          case 'ease-in-out':
            return name;
            break;

          default:
            return 'ease-in-out';
            break;
        }
      },

      getJSEasingFunction: function(name) {
        switch ( name )
        {
          case 'linear':
            return name;
            break;

          default:
            return 'swing';
            break;
        }
      },

      getVendorPrefix: function() {
        // Thanks to Lea Verou for this beautiful function. (http://lea.verou.me/2009/02/find-the-vendor-prefix-of-the-current-browser)
        if('result' in arguments.callee) return arguments.callee.result;

        var regex = /^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/;

        var someScript = document.getElementsByTagName('script')[0];

        for(var prop in someScript.style)
        {
          if(regex.test(prop))
          {
            // test is faster than match, so it's better to perform
            // that on the lot and match only when necessary
            return arguments.callee.result = prop.match(regex)[0];
          }

        }

        // Nothing found so far? Webkit does not enumerate over the CSS properties of the style object.
        // However (prop in style) returns the correct value, so we'll have to test for
        // the precence of a specific property
        if('WebkitOpacity' in someScript.style) return arguments.callee.result = 'Webkit';
        if('KhtmlOpacity' in someScript.style) return arguments.callee.result = 'Khtml';

        return arguments.callee.result = '';
      },

      getCSSPrefix: function() {
        var prefix = jP.getVendorPrefix();
        if ( prefix != '' ) { return '-' + prefix.toLowerCase() + '-'; }
        return '';
      },

      openMenu: function(animated) {
        if ( typeof(animated) == "undefined" || animated == null ) { animated = jP.options.animated };
        
        jP.clearTimeouts();

        jP.options.before();
        jP.options.beforeOpen();

        jP.setMenuState(true);
        
        jP.showMenu();

        var animationChecks = {
          none: (!animated)?true:false,
          transitions: (animated && jP.settings.transitionsSupported)?true:false
        };

        if ( animationChecks.transitions || animationChecks.none ) {
          if ( animationChecks.none ) jP.disableTransitions();
          if ( animationChecks.transitions ) jP.enableTransitions(jP.options.openDuration, jP.options.openEasing);

          var newPanelStyle = jP.computePositionStyle(true);
          jP.setPanelStyle(newPanelStyle);

          jP.timeouts.afterOpen = setTimeout(function(){
            jP.options.after();
            jP.options.afterOpen();
            jP.initiateContentClickListeners();
          }, jP.options.openDuration);
        }
        else {
          var formattedEasing = jP.getJSEasingFunction(jP.options.openEasing);

          var animationOptions = {};
          animationOptions[jP.options.direction] = jP.options.openPosition;
          $(jP.panel).stop().animate(animationOptions, jP.options.openDuration, formattedEasing, function(){
            jP.options.after();
            jP.options.afterOpen();
            jP.initiateContentClickListeners();
          });
        }
      },

      closeMenu: function(animated) {
        if ( typeof(animated) == "undefined" || animated == null ) { animated = jP.options.animated };

        jP.clearTimeouts();

        jP.options.before();
        jP.options.beforeClose();

        jP.setMenuState(false);

        var animationChecks = {
          none: (!animated)?true:false,
          transitions: (animated && jP.settings.transitionsSupported)?true:false
        };

        if ( animationChecks.transitions || animationChecks.none ) {
          if ( animationChecks.none ) jP.disableTransitions();
          if ( animationChecks.transitions ) jP.enableTransitions(jP.options.closeDuration, jP.options.closeEasing);

          var newPanelStyle = jP.computePositionStyle();
          jP.setPanelStyle(newPanelStyle);

          jP.timeouts.afterClose = setTimeout(function(){
            jP.disableTransitions();

            jP.hideMenu();
            jP.options.after();
            jP.options.afterClose();
            jP.destroyContentClickListeners();
          }, jP.options.closeDuration);
        }
        else {
          var formattedEasing = jP.getJSEasingFunction(jP.options.closeEasing);

          var animationOptions = {};
          animationOptions[jP.options.direction] = 0 + jP.settings.positionUnits;
          $(jP.panel).stop().animate(animationOptions, jP.options.closeDuration, formattedEasing, function(){
            jP.hideMenu();
            jP.options.after();
            jP.options.afterClose();
            jP.destroyContentClickListeners();
          });
        }
      },

      triggerMenu: function(animated) {
        if ( jP.menuIsOpen() ) jP.closeMenu(animated);
        else jP.openMenu(animated);
      },

      initiateClickListeners: function() {
        $(document).on('click touchend',jP.options.trigger,function(e){
          jP.triggerMenu(jP.options.animated); e.preventDefault();
        });
      },

      destroyClickListeners: function() {
        $(document).off('click touchend',jP.options.trigger,null);
      },

      initiateContentClickListeners: function() {
        if ( !jP.options.closeOnContentClick ) return false;

        $(document).on('click touchend',jP.panel,function(e){
          if ( jP.menuIsOpen() ) jP.closeMenu(jP.options.animated);
          e.preventDefault();
        });
      },

      destroyContentClickListeners: function() {
        if ( !jP.options.closeOnContentClick ) return false;

        $(document).off('click touchend',jP.panel,null);
      },

      initiateKeyboardListeners: function() {
        var preventKeyListeners = ['input', 'textarea', 'select'];
        $(document).on('keydown',function(e){
          var target = $(e.target),
            prevent = false;

          $.each(preventKeyListeners, function(){
            if (target.is(this.toString())) {
              prevent = true;
            }
          });

          if ( prevent ) return true;

          for ( mapping in jP.options.keyboardShortcuts ) {
            if ( e.which == jP.options.keyboardShortcuts[mapping].code ) {
              var key = jP.options.keyboardShortcuts[mapping];

              if ( key.open && key.close ) { jP.triggerMenu(jP.options.animated); }
              else if ( (key.open && !key.close) && !jP.menuIsOpen() ) { jP.openMenu(jP.options.animated); }
              else if ( (!key.open && key.close) && jP.menuIsOpen() ) { jP.closeMenu(jP.options.animated); }

              e.preventDefault();
            }
          }
        });
      },

      destroyKeyboardListeners: function() {
        $(document).off('keydown',null);
      },

      setupMarkup: function() {
        $('html').addClass('jPanelMenu');
        $(jP.options.panel + ' > *').not(jP.menu + ', ' + jP.options.excludedPanelContent).wrapAll('<div class="' + jP.panel.replace('.','') + '"/>');
        var menu = ( jP.options.clone )?$(jP.options.menu).clone(jP.options.keepEventHandlers):$(jP.options.menu);
        menu.attr('id', jP.menu.replace('#','')).insertAfter(jP.options.panel + ' > ' + jP.panel);
      },

      resetMarkup: function() {
        $('html').removeClass('jPanelMenu');
        $(jP.options.panel + ' > ' + jP.panel + ' > *').unwrap();
        $(jP.menu).remove();
      },

      init: function() {
        jP.options.beforeOn();

        jP.setPositionUnits();
        jP.setCSSPrefix();
        jP.initiateClickListeners();
        if ( Object.prototype.toString.call(jP.options.keyboardShortcuts) === '[object Array]' ) { jP.initiateKeyboardListeners(); }

        jP.setjPanelMenuStyles();
        jP.setMenuState(false);
        jP.setupMarkup();

        jP.setPanelStyle({ position: (( jP.options.animated && jP.settings.panelPosition === 'static' )?'relative':jP.settings.panelPosition) });
        jP.setMenuStyle({ width: jP.options.openPosition });

        jP.closeMenu(false);

        jP.options.afterOn();
      },

      destroy: function() {
        jP.options.beforeOff();

        jP.closeMenu();
        jP.destroyClickListeners();
        if ( Object.prototype.toString.call(jP.options.keyboardShortcuts) === '[object Array]' ) { jP.destroyKeyboardListeners(); }

        jP.resetMarkup();
        var childrenStyles = {};
        childrenStyles[jP.options.direction] = 'auto';

        jP.options.afterOff();
      }
    };

    return {
      on: jP.init,
      off: jP.destroy,
      trigger: jP.triggerMenu,
      open: jP.openMenu,
      close: jP.closeMenu,
      isOpen: jP.menuIsOpen,
      menu: jP.menu,
      getMenu: function() { return $(jP.menu); },
      panel: jP.panel,
      getPanel: function() { return $(jP.panel); },
      setPosition: function(position) {
        if ( typeof(position) == "undefined" || position == null ) {
          position = jP.options.openPosition
        }
        jP.options.openPosition = position;
        jP.setMenuStyle({ width: jP.options.openPosition });
      }
    };
  };
})(jQuery);

/**
 * stacktable.js
 * Author & copyright (c) 2012: John Polacek
 * Dual MIT & GPL license
 *
 * Page: http://johnpolacek.github.com/stacktable.js
 * Repo: https://github.com/johnpolacek/stacktable.js/
 *
 * jQuery plugin for stacking tables on small screens
 *
 */
;(function($) {

  $.fn.stacktable = function(options) {
    var $tables = this,
        defaults = {id:'stacktable small-only',hideOriginal:true},
        settings = $.extend({}, defaults, options);

    return $tables.each(function() {
      var $stacktable = $('<table class="'+settings.id+'"><tbody></tbody></table>');
      if (typeof settings.myClass !== undefined) $stacktable.addClass(settings.myClass);
      var markup = '';
      $table = $(this);
      $table.addClass('stacktable large-only');
      $topRow = $table.find('tr').eq(0);
      $table.find('tr').each(function(index,value) {
        if (index===0) {
          //markup += '<tr><th class="st-head-row st-head-row-main" colspan="2">'+$(this).find('th,td').eq(0).html()+'</th></tr>';
        } else {
          $(this).find('td,th').each(function(index,value) {
            if (index===0) {
              markup += '<tr class="st-space"><td></td><td></td></tr><tr class="st-new-item"><td class="st-key">'+$topRow.find('td,th').eq(index).html()+'</td><td class="st-val st-head-row">'+$(this).html()+'</td></tr>';
            } else {
              if ($(this).html() !== ''){
                markup += '<tr>';
                if ($topRow.find('td,th').eq(index).html()){
                  markup += '<td class="st-key">'+$topRow.find('td,th').eq(index).html()+'</td>';
                } else {
                  markup += '<td class="st-key"></td>';
                }
                markup += '<td class="st-val">'+$(this).html()+'</td>';
                markup += '</tr>';
              }
            }
          });
        }
      });
      $stacktable.append($(markup));
      $table.before($stacktable);
      if (!settings.hideOriginal) $table.show();
    });
  };



}(jQuery));
/*!
 * jQuery blockUI plugin
 * Version 2.70.0-2014.11.23
 * Requires jQuery v1.7 or later
 *
 * Examples at: http://malsup.com/jquery/block/
 * Copyright (c) 2007-2013 M. Alsup
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 * Thanks to Amir-Hossein Sobhi for some excellent contributions!
 */

;(function() {
/*jshint eqeqeq:false curly:false latedef:false */
"use strict";

	function setup($) {
		$.fn._fadeIn = $.fn.fadeIn;

		var noOp = $.noop || function() {};

		// this bit is to ensure we don't call setExpression when we shouldn't (with extra muscle to handle
		// confusing userAgent strings on Vista)
		var msie = /MSIE/.test(navigator.userAgent);
		var ie6  = /MSIE 6.0/.test(navigator.userAgent) && ! /MSIE 8.0/.test(navigator.userAgent);
		var mode = document.documentMode || 0;
		var setExpr = $.isFunction( document.createElement('div').style.setExpression );

		// global $ methods for blocking/unblocking the entire page
		$.blockUI   = function(opts) { install(window, opts); };
		$.unblockUI = function(opts) { remove(window, opts); };

		// convenience method for quick growl-like notifications  (http://www.google.com/search?q=growl)
		$.growlUI = function(title, message, timeout, onClose) {
			var $m = $('<div class="growlUI"></div>');
			if (title) $m.append('<h1>'+title+'</h1>');
			if (message) $m.append('<h2>'+message+'</h2>');
			if (timeout === undefined) timeout = 3000;

			// Added by konapun: Set timeout to 30 seconds if this growl is moused over, like normal toast notifications
			var callBlock = function(opts) {
				opts = opts || {};

				$.blockUI({
					message: $m,
					fadeIn : typeof opts.fadeIn  !== 'undefined' ? opts.fadeIn  : 700,
					fadeOut: typeof opts.fadeOut !== 'undefined' ? opts.fadeOut : 1000,
					timeout: typeof opts.timeout !== 'undefined' ? opts.timeout : timeout,
					centerY: false,
					showOverlay: false,
					onUnblock: onClose,
					css: $.blockUI.defaults.growlCSS
				});
			};

			callBlock();
			var nonmousedOpacity = $m.css('opacity');
			$m.mouseover(function() {
				callBlock({
					fadeIn: 0,
					timeout: 30000
				});

				var displayBlock = $('.blockMsg');
				displayBlock.stop(); // cancel fadeout if it has started
				displayBlock.fadeTo(300, 1); // make it easier to read the message by removing transparency
			}).mouseout(function() {
				$('.blockMsg').fadeOut(1000);
			});
			// End konapun additions
		};

		// plugin method for blocking element content
		$.fn.block = function(opts) {
			if ( this[0] === window ) {
				$.blockUI( opts );
				return this;
			}
			var fullOpts = $.extend({}, $.blockUI.defaults, opts || {});
			this.each(function() {
				var $el = $(this);
				if (fullOpts.ignoreIfBlocked && $el.data('blockUI.isBlocked'))
					return;
				$el.unblock({ fadeOut: 0 });
			});

			return this.each(function() {
				if ($.css(this,'position') == 'static') {
					this.style.position = 'relative';
					$(this).data('blockUI.static', true);
				}
				this.style.zoom = 1; // force 'hasLayout' in ie
				install(this, opts);
			});
		};

		// plugin method for unblocking element content
		$.fn.unblock = function(opts) {
			if ( this[0] === window ) {
				$.unblockUI( opts );
				return this;
			}
			return this.each(function() {
				remove(this, opts);
			});
		};

		$.blockUI.version = 2.70; // 2nd generation blocking at no extra cost!

		// override these in your code to change the default behavior and style
		$.blockUI.defaults = {
			// message displayed when blocking (use null for no message)
			message:  '<h1>Please wait...</h1>',

			title: null,		// title string; only used when theme == true
			draggable: true,	// only used when theme == true (requires jquery-ui.js to be loaded)

			theme: false, // set to true to use with jQuery UI themes

			// styles for the message when blocking; if you wish to disable
			// these and use an external stylesheet then do this in your code:
			// $.blockUI.defaults.css = {};
			css: {
				padding:	0,
				margin:		0,
				width:		'30%',
				top:		'40%',
				left:		'35%',
				textAlign:	'center',
				color:		'#000',
				border:		'3px solid #aaa',
				backgroundColor:'#fff',
				cursor:		'wait'
			},

			// minimal style set used when themes are used
			themedCSS: {
				width:	'30%',
				top:	'40%',
				left:	'35%'
			},

			// styles for the overlay
			overlayCSS:  {
				backgroundColor:	'#000',
				opacity:			0.6,
				cursor:				'wait'
			},

			// style to replace wait cursor before unblocking to correct issue
			// of lingering wait cursor
			cursorReset: 'default',

			// styles applied when using $.growlUI
			growlCSS: {
				width:		'350px',
				top:		'10px',
				left:		'',
				right:		'10px',
				border:		'none',
				padding:	'5px',
				opacity:	0.6,
				cursor:		'default',
				color:		'#fff',
				backgroundColor: '#000',
				'-webkit-border-radius':'10px',
				'-moz-border-radius':	'10px',
				'border-radius':		'10px'
			},

			// IE issues: 'about:blank' fails on HTTPS and javascript:false is s-l-o-w
			// (hat tip to Jorge H. N. de Vasconcelos)
			/*jshint scripturl:true */
			iframeSrc: /^https/i.test(window.location.href || '') ? 'javascript:false' : 'about:blank',

			// force usage of iframe in non-IE browsers (handy for blocking applets)
			forceIframe: false,

			// z-index for the blocking overlay
			baseZ: 1000,

			// set these to true to have the message automatically centered
			centerX: true, // <-- only effects element blocking (page block controlled via css above)
			centerY: true,

			// allow body element to be stetched in ie6; this makes blocking look better
			// on "short" pages.  disable if you wish to prevent changes to the body height
			allowBodyStretch: true,

			// enable if you want key and mouse events to be disabled for content that is blocked
			bindEvents: true,

			// be default blockUI will supress tab navigation from leaving blocking content
			// (if bindEvents is true)
			constrainTabKey: true,

			// fadeIn time in millis; set to 0 to disable fadeIn on block
			fadeIn:  200,

			// fadeOut time in millis; set to 0 to disable fadeOut on unblock
			fadeOut:  400,

			// time in millis to wait before auto-unblocking; set to 0 to disable auto-unblock
			timeout: 0,

			// disable if you don't want to show the overlay
			showOverlay: true,

			// if true, focus will be placed in the first available input field when
			// page blocking
			focusInput: true,

            // elements that can receive focus
            focusableElements: ':input:enabled:visible',

			// suppresses the use of overlay styles on FF/Linux (due to performance issues with opacity)
			// no longer needed in 2012
			// applyPlatformOpacityRules: true,

			// callback method invoked when fadeIn has completed and blocking message is visible
			onBlock: null,

			// callback method invoked when unblocking has completed; the callback is
			// passed the element that has been unblocked (which is the window object for page
			// blocks) and the options that were passed to the unblock call:
			//	onUnblock(element, options)
			onUnblock: null,

			// callback method invoked when the overlay area is clicked.
			// setting this will turn the cursor to a pointer, otherwise cursor defined in overlayCss will be used.
			onOverlayClick: null,

			// don't ask; if you really must know: http://groups.google.com/group/jquery-en/browse_thread/thread/36640a8730503595/2f6a79a77a78e493#2f6a79a77a78e493
			quirksmodeOffsetHack: 4,

			// class name of the message block
			blockMsgClass: 'blockMsg',

			// if it is already blocked, then ignore it (don't unblock and reblock)
			ignoreIfBlocked: false
		};

		// private data and functions follow...

		var pageBlock = null;
		var pageBlockEls = [];

		function install(el, opts) {
			var css, themedCSS;
			var full = (el == window);
			var msg = (opts && opts.message !== undefined ? opts.message : undefined);
			opts = $.extend({}, $.blockUI.defaults, opts || {});

			if (opts.ignoreIfBlocked && $(el).data('blockUI.isBlocked'))
				return;

			opts.overlayCSS = $.extend({}, $.blockUI.defaults.overlayCSS, opts.overlayCSS || {});
			css = $.extend({}, $.blockUI.defaults.css, opts.css || {});
			if (opts.onOverlayClick)
				opts.overlayCSS.cursor = 'pointer';

			themedCSS = $.extend({}, $.blockUI.defaults.themedCSS, opts.themedCSS || {});
			msg = msg === undefined ? opts.message : msg;

			// remove the current block (if there is one)
			if (full && pageBlock)
				remove(window, {fadeOut:0});

			// if an existing element is being used as the blocking content then we capture
			// its current place in the DOM (and current display style) so we can restore
			// it when we unblock
			if (msg && typeof msg != 'string' && (msg.parentNode || msg.jquery)) {
				var node = msg.jquery ? msg[0] : msg;
				var data = {};
				$(el).data('blockUI.history', data);
				data.el = node;
				data.parent = node.parentNode;
				data.display = node.style.display;
				data.position = node.style.position;
				if (data.parent)
					data.parent.removeChild(node);
			}

			$(el).data('blockUI.onUnblock', opts.onUnblock);
			var z = opts.baseZ;

			// blockUI uses 3 layers for blocking, for simplicity they are all used on every platform;
			// layer1 is the iframe layer which is used to supress bleed through of underlying content
			// layer2 is the overlay layer which has opacity and a wait cursor (by default)
			// layer3 is the message content that is displayed while blocking
			var lyr1, lyr2, lyr3, s;
			if (msie || opts.forceIframe)
				lyr1 = $('<iframe class="blockUI" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;position:absolute;width:100%;height:100%;top:0;left:0" src="'+opts.iframeSrc+'"></iframe>');
			else
				lyr1 = $('<div class="blockUI" style="display:none"></div>');

			if (opts.theme)
				lyr2 = $('<div class="blockUI blockOverlay ui-widget-overlay" style="z-index:'+ (z++) +';display:none"></div>');
			else
				lyr2 = $('<div class="blockUI blockOverlay" style="z-index:'+ (z++) +';display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0"></div>');

			if (opts.theme && full) {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:fixed">';
				if ( opts.title ) {
					s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
				}
				s += '<div class="ui-widget-content ui-dialog-content"></div>';
				s += '</div>';
			}
			else if (opts.theme) {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement ui-dialog ui-widget ui-corner-all" style="z-index:'+(z+10)+';display:none;position:absolute">';
				if ( opts.title ) {
					s += '<div class="ui-widget-header ui-dialog-titlebar ui-corner-all blockTitle">'+(opts.title || '&nbsp;')+'</div>';
				}
				s += '<div class="ui-widget-content ui-dialog-content"></div>';
				s += '</div>';
			}
			else if (full) {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockPage" style="z-index:'+(z+10)+';display:none;position:fixed"></div>';
			}
			else {
				s = '<div class="blockUI ' + opts.blockMsgClass + ' blockElement" style="z-index:'+(z+10)+';display:none;position:absolute"></div>';
			}
			lyr3 = $(s);

			// if we have a message, style it
			if (msg) {
				if (opts.theme) {
					lyr3.css(themedCSS);
					lyr3.addClass('ui-widget-content');
				}
				else
					lyr3.css(css);
			}

			// style the overlay
			if (!opts.theme /*&& (!opts.applyPlatformOpacityRules)*/)
				lyr2.css(opts.overlayCSS);
			lyr2.css('position', full ? 'fixed' : 'absolute');

			// make iframe layer transparent in IE
			if (msie || opts.forceIframe)
				lyr1.css('opacity',0.0);

			//$([lyr1[0],lyr2[0],lyr3[0]]).appendTo(full ? 'body' : el);
			var layers = [lyr1,lyr2,lyr3], $par = full ? $('body') : $(el);
			$.each(layers, function() {
				this.appendTo($par);
			});

			if (opts.theme && opts.draggable && $.fn.draggable) {
				lyr3.draggable({
					handle: '.ui-dialog-titlebar',
					cancel: 'li'
				});
			}

			// ie7 must use absolute positioning in quirks mode and to account for activex issues (when scrolling)
			var expr = setExpr && (!$.support.boxModel || $('object,embed', full ? null : el).length > 0);
			if (ie6 || expr) {
				// give body 100% height
				if (full && opts.allowBodyStretch && $.support.boxModel)
					$('html,body').css('height','100%');

				// fix ie6 issue when blocked element has a border width
				if ((ie6 || !$.support.boxModel) && !full) {
					var t = sz(el,'borderTopWidth'), l = sz(el,'borderLeftWidth');
					var fixT = t ? '(0 - '+t+')' : 0;
					var fixL = l ? '(0 - '+l+')' : 0;
				}

				// simulate fixed position
				$.each(layers, function(i,o) {
					var s = o[0].style;
					s.position = 'absolute';
					if (i < 2) {
						if (full)
							s.setExpression('height','Math.max(document.body.scrollHeight, document.body.offsetHeight) - (jQuery.support.boxModel?0:'+opts.quirksmodeOffsetHack+') + "px"');
						else
							s.setExpression('height','this.parentNode.offsetHeight + "px"');
						if (full)
							s.setExpression('width','jQuery.support.boxModel && document.documentElement.clientWidth || document.body.clientWidth + "px"');
						else
							s.setExpression('width','this.parentNode.offsetWidth + "px"');
						if (fixL) s.setExpression('left', fixL);
						if (fixT) s.setExpression('top', fixT);
					}
					else if (opts.centerY) {
						if (full) s.setExpression('top','(document.documentElement.clientHeight || document.body.clientHeight) / 2 - (this.offsetHeight / 2) + (blah = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + "px"');
						s.marginTop = 0;
					}
					else if (!opts.centerY && full) {
						var top = (opts.css && opts.css.top) ? parseInt(opts.css.top, 10) : 0;
						var expression = '((document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop) + '+top+') + "px"';
						s.setExpression('top',expression);
					}
				});
			}

			// show the message
			if (msg) {
				if (opts.theme)
					lyr3.find('.ui-widget-content').append(msg);
				else
					lyr3.append(msg);
				if (msg.jquery || msg.nodeType)
					$(msg).show();
			}

			if ((msie || opts.forceIframe) && opts.showOverlay)
				lyr1.show(); // opacity is zero
			if (opts.fadeIn) {
				var cb = opts.onBlock ? opts.onBlock : noOp;
				var cb1 = (opts.showOverlay && !msg) ? cb : noOp;
				var cb2 = msg ? cb : noOp;
				if (opts.showOverlay)
					lyr2._fadeIn(opts.fadeIn, cb1);
				if (msg)
					lyr3._fadeIn(opts.fadeIn, cb2);
			}
			else {
				if (opts.showOverlay)
					lyr2.show();
				if (msg)
					lyr3.show();
				if (opts.onBlock)
					opts.onBlock.bind(lyr3)();
			}

			// bind key and mouse events
			bind(1, el, opts);

			if (full) {
				pageBlock = lyr3[0];
				pageBlockEls = $(opts.focusableElements,pageBlock);
				if (opts.focusInput)
					setTimeout(focus, 20);
			}
			else
				center(lyr3[0], opts.centerX, opts.centerY);

			if (opts.timeout) {
				// auto-unblock
				var to = setTimeout(function() {
					if (full)
						$.unblockUI(opts);
					else
						$(el).unblock(opts);
				}, opts.timeout);
				$(el).data('blockUI.timeout', to);
			}
		}

		// remove the block
		function remove(el, opts) {
			var count;
			var full = (el == window);
			var $el = $(el);
			var data = $el.data('blockUI.history');
			var to = $el.data('blockUI.timeout');
			if (to) {
				clearTimeout(to);
				$el.removeData('blockUI.timeout');
			}
			opts = $.extend({}, $.blockUI.defaults, opts || {});
			bind(0, el, opts); // unbind events

			if (opts.onUnblock === null) {
				opts.onUnblock = $el.data('blockUI.onUnblock');
				$el.removeData('blockUI.onUnblock');
			}

			var els;
			if (full) // crazy selector to handle odd field errors in ie6/7
				els = $('body').children().filter('.blockUI').add('body > .blockUI');
			else
				els = $el.find('>.blockUI');

			// fix cursor issue
			if ( opts.cursorReset ) {
				if ( els.length > 1 )
					els[1].style.cursor = opts.cursorReset;
				if ( els.length > 2 )
					els[2].style.cursor = opts.cursorReset;
			}

			if (full)
				pageBlock = pageBlockEls = null;

			if (opts.fadeOut) {
				count = els.length;
				els.stop().fadeOut(opts.fadeOut, function() {
					if ( --count === 0)
						reset(els,data,opts,el);
				});
			}
			else
				reset(els, data, opts, el);
		}

		// move blocking element back into the DOM where it started
		function reset(els,data,opts,el) {
			var $el = $(el);
			if ( $el.data('blockUI.isBlocked') )
				return;

			els.each(function(i,o) {
				// remove via DOM calls so we don't lose event handlers
				if (this.parentNode)
					this.parentNode.removeChild(this);
			});

			if (data && data.el) {
				data.el.style.display = data.display;
				data.el.style.position = data.position;
				data.el.style.cursor = 'default'; // #59
				if (data.parent)
					data.parent.appendChild(data.el);
				$el.removeData('blockUI.history');
			}

			if ($el.data('blockUI.static')) {
				$el.css('position', 'static'); // #22
			}

			if (typeof opts.onUnblock == 'function')
				opts.onUnblock(el,opts);

			// fix issue in Safari 6 where block artifacts remain until reflow
			var body = $(document.body), w = body.width(), cssW = body[0].style.width;
			body.width(w-1).width(w);
			body[0].style.width = cssW;
		}

		// bind/unbind the handler
		function bind(b, el, opts) {
			var full = el == window, $el = $(el);

			// don't bother unbinding if there is nothing to unbind
			if (!b && (full && !pageBlock || !full && !$el.data('blockUI.isBlocked')))
				return;

			$el.data('blockUI.isBlocked', b);

			// don't bind events when overlay is not in use or if bindEvents is false
			if (!full || !opts.bindEvents || (b && !opts.showOverlay))
				return;

			// bind anchors and inputs for mouse and key events
			var events = 'mousedown mouseup keydown keypress keyup touchstart touchend touchmove';
			if (b)
				$(document).bind(events, opts, handler);
			else
				$(document).unbind(events, handler);

		// former impl...
		//		var $e = $('a,:input');
		//		b ? $e.bind(events, opts, handler) : $e.unbind(events, handler);
		}

		// event handler to suppress keyboard/mouse events when blocking
		function handler(e) {
			// allow tab navigation (conditionally)
			if (e.type === 'keydown' && e.keyCode && e.keyCode == 9) {
				if (pageBlock && e.data.constrainTabKey) {
					var els = pageBlockEls;
					var fwd = !e.shiftKey && e.target === els[els.length-1];
					var back = e.shiftKey && e.target === els[0];
					if (fwd || back) {
						setTimeout(function(){focus(back);},10);
						return false;
					}
				}
			}
			var opts = e.data;
			var target = $(e.target);
			if (target.hasClass('blockOverlay') && opts.onOverlayClick)
				opts.onOverlayClick(e);

			// allow events within the message content
			if (target.parents('div.' + opts.blockMsgClass).length > 0)
				return true;

			// allow events for content that is not being blocked
			return target.parents().children().filter('div.blockUI').length === 0;
		}

		function focus(back) {
			if (!pageBlockEls)
				return;
			var e = pageBlockEls[back===true ? pageBlockEls.length-1 : 0];
			if (e)
				e.focus();
		}

		function center(el, x, y) {
			var p = el.parentNode, s = el.style;
			var l = ((p.offsetWidth - el.offsetWidth)/2) - sz(p,'borderLeftWidth');
			var t = ((p.offsetHeight - el.offsetHeight)/2) - sz(p,'borderTopWidth');
			if (x) s.left = l > 0 ? (l+'px') : '0';
			if (y) s.top  = t > 0 ? (t+'px') : '0';
		}

		function sz(el, p) {
			return parseInt($.css(el,p),10)||0;
		}

	}


	/*global define:true */
	if (typeof define === 'function' && define.amd && define.amd.jQuery) {
		define(['jquery'], setup);
	} else {
		setup(jQuery);
	}

})();

/*!
 * Pikaday
 *
 * Copyright © 2014 David Bushell | BSD & MIT license | https://github.com/dbushell/Pikaday
 */

(function (root, factory)
{
    'use strict';

    var moment;
    if (typeof exports === 'object') {
        // CommonJS module
        // Load moment.js as an optional dependency
        try { moment = require('moment'); } catch (e) {}
        module.exports = factory(moment);
    } else if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(function (req)
        {
            // Load moment.js as an optional dependency
            var id = 'moment';
            try { moment = req(id); } catch (e) {}
            return factory(moment);
        });
    } else {
        root.Pikaday = factory(root.moment);
    }
}(this, function (moment)
{
    'use strict';

    /**
     * feature detection and helper functions
     */
    var hasMoment = typeof moment === 'function',

    hasEventListeners = !!window.addEventListener,

    document = window.document,

    sto = window.setTimeout,

    addEvent = function(el, e, callback, capture)
    {
        if (hasEventListeners) {
            el.addEventListener(e, callback, !!capture);
        } else {
            el.attachEvent('on' + e, callback);
        }
    },

    removeEvent = function(el, e, callback, capture)
    {
        if (hasEventListeners) {
            el.removeEventListener(e, callback, !!capture);
        } else {
            el.detachEvent('on' + e, callback);
        }
    },

    fireEvent = function(el, eventName, data)
    {
        var ev;

        if (document.createEvent) {
            ev = document.createEvent('HTMLEvents');
            ev.initEvent(eventName, true, false);
            ev = extend(ev, data);
            el.dispatchEvent(ev);
        } else if (document.createEventObject) {
            ev = document.createEventObject();
            ev = extend(ev, data);
            el.fireEvent('on' + eventName, ev);
        }
    },

    trim = function(str)
    {
        return str.trim ? str.trim() : str.replace(/^\s+|\s+$/g,'');
    },

    hasClass = function(el, cn)
    {
        return (' ' + el.className + ' ').indexOf(' ' + cn + ' ') !== -1;
    },

    addClass = function(el, cn)
    {
        if (!hasClass(el, cn)) {
            el.className = (el.className === '') ? cn : el.className + ' ' + cn;
        }
    },

    removeClass = function(el, cn)
    {
        el.className = trim((' ' + el.className + ' ').replace(' ' + cn + ' ', ' '));
    },

    isArray = function(obj)
    {
        return (/Array/).test(Object.prototype.toString.call(obj));
    },

    isDate = function(obj)
    {
        return (/Date/).test(Object.prototype.toString.call(obj)) && !isNaN(obj.getTime());
    },

    isWeekend = function(date)
    {
        var day = date.getDay();
        return day === 0 || day === 6;
    },

    isLeapYear = function(year)
    {
        // solution by Matti Virkkunen: http://stackoverflow.com/a/4881951
        return year % 4 === 0 && year % 100 !== 0 || year % 400 === 0;
    },

    getDaysInMonth = function(year, month)
    {
        return [31, isLeapYear(year) ? 29 : 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][month];
    },

    setToStartOfDay = function(date)
    {
        if (isDate(date)) date.setHours(0,0,0,0);
    },

    compareDates = function(a,b)
    {
        // weak date comparison (use setToStartOfDay(date) to ensure correct result)
        return a.getTime() === b.getTime();
    },

    extend = function(to, from, overwrite)
    {
        var prop, hasProp;
        for (prop in from) {
            hasProp = to[prop] !== undefined;
            if (hasProp && typeof from[prop] === 'object' && from[prop] !== null && from[prop].nodeName === undefined) {
                if (isDate(from[prop])) {
                    if (overwrite) {
                        to[prop] = new Date(from[prop].getTime());
                    }
                }
                else if (isArray(from[prop])) {
                    if (overwrite) {
                        to[prop] = from[prop].slice(0);
                    }
                } else {
                    to[prop] = extend({}, from[prop], overwrite);
                }
            } else if (overwrite || !hasProp) {
                to[prop] = from[prop];
            }
        }
        return to;
    },

    adjustCalendar = function(calendar) {
        if (calendar.month < 0) {
            calendar.year -= Math.ceil(Math.abs(calendar.month)/12);
            calendar.month += 12;
        }
        if (calendar.month > 11) {
            calendar.year += Math.floor(Math.abs(calendar.month)/12);
            calendar.month -= 12;
        }
        return calendar;
    },

    /**
     * defaults and localisation
     */
    defaults = {

        // bind the picker to a form field
        field: null,

        // automatically show/hide the picker on `field` focus (default `true` if `field` is set)
        bound: undefined,

        // position of the datepicker, relative to the field (default to bottom & left)
        // ('bottom' & 'left' keywords are not used, 'top' & 'right' are modifier on the bottom/left position)
        position: 'bottom left',

        // automatically fit in the viewport even if it means repositioning from the position option
        reposition: true,

        // the default output format for `.toString()` and `field` value
        format: 'YYYY-MM-DD',

        // the initial date to view when first opened
        defaultDate: null,

        // make the `defaultDate` the initial selected value
        setDefaultDate: false,

        // first day of week (0: Sunday, 1: Monday etc)
        firstDay: 0,

        // the default flag for moment's strict date parsing
        formatStrict: false,

        // the minimum/earliest date that can be selected
        minDate: null,
        // the maximum/latest date that can be selected
        maxDate: null,

        // number of years either side, or array of upper/lower range
        yearRange: 10,

        // show week numbers at head of row
        showWeekNumber: false,

        // used internally (don't config outside)
        minYear: 0,
        maxYear: 9999,
        minMonth: undefined,
        maxMonth: undefined,

        startRange: null,
        endRange: null,

        isRTL: false,

        // Additional text to append to the year in the calendar title
        yearSuffix: '',

        // Render the month after year in the calendar title
        showMonthAfterYear: false,

        // Render days of the calendar grid that fall in the next or previous month
        showDaysInNextAndPreviousMonths: false,

        // how many months are visible
        numberOfMonths: 1,

        // when numberOfMonths is used, this will help you to choose where the main calendar will be (default `left`, can be set to `right`)
        // only used for the first display or when a selected date is not visible
        mainCalendar: 'left',

        // Specify a DOM element to render the calendar in
        container: undefined,

        // internationalization
        i18n: {
            previousMonth : 'Previous Month',
            nextMonth     : 'Next Month',
            months        : ['January','February','March','April','May','June','July','August','September','October','November','December'],
            weekdays      : ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
            weekdaysShort : ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
        },

        // Theme Classname
        theme: null,

        // callback function
        onSelect: null,
        onOpen: null,
        onClose: null,
        onDraw: null
    },


    /**
     * templating functions to abstract HTML rendering
     */
    renderDayName = function(opts, day, abbr)
    {
        day += opts.firstDay;
        while (day >= 7) {
            day -= 7;
        }
        return abbr ? opts.i18n.weekdaysShort[day] : opts.i18n.weekdays[day];
    },

    renderDay = function(opts)
    {
        var arr = [];
        var ariaSelected = 'false';
        if (opts.isEmpty) {
            if (opts.showDaysInNextAndPreviousMonths) {
                arr.push('is-outside-current-month');
            } else {
                return '<td class="is-empty"></td>';
            }
        }
        if (opts.isDisabled) {
            arr.push('is-disabled');
        }
        if (opts.isToday) {
            arr.push('is-today');
        }
        if (opts.isSelected) {
            arr.push('is-selected');
            ariaSelected = 'true';
        }
        if (opts.isInRange) {
            arr.push('is-inrange');
        }
        if (opts.isStartRange) {
            arr.push('is-startrange');
        }
        if (opts.isEndRange) {
            arr.push('is-endrange');
        }
        return '<td data-day="' + opts.day + '" class="' + arr.join(' ') + '" aria-selected="' + ariaSelected + '">' +
                 '<button class="pika-button pika-day" type="button" ' +
                    'data-pika-year="' + opts.year + '" data-pika-month="' + opts.month + '" data-pika-day="' + opts.day + '">' +
                        opts.day +
                 '</button>' +
               '</td>';
    },

    renderWeek = function (d, m, y) {
        // Lifted from http://javascript.about.com/library/blweekyear.htm, lightly modified.
        var onejan = new Date(y, 0, 1),
            weekNum = Math.ceil((((new Date(y, m, d) - onejan) / 86400000) + onejan.getDay()+1)/7);
        return '<td class="pika-week">' + weekNum + '</td>';
    },

    renderRow = function(days, isRTL)
    {
        return '<tr>' + (isRTL ? days.reverse() : days).join('') + '</tr>';
    },

    renderBody = function(rows)
    {
        return '<tbody>' + rows.join('') + '</tbody>';
    },

    renderHead = function(opts)
    {
        var i, arr = [];
        if (opts.showWeekNumber) {
            arr.push('<th></th>');
        }
        for (i = 0; i < 7; i++) {
            arr.push('<th scope="col"><abbr title="' + renderDayName(opts, i) + '">' + renderDayName(opts, i, true) + '</abbr></th>');
        }
        return '<thead><tr>' + (opts.isRTL ? arr.reverse() : arr).join('') + '</tr></thead>';
    },

    renderTitle = function(instance, c, year, month, refYear, randId)
    {
        var i, j, arr,
            opts = instance._o,
            isMinYear = year === opts.minYear,
            isMaxYear = year === opts.maxYear,
            html = '<div id="' + randId + '" class="pika-title" role="heading" aria-live="assertive">',
            monthHtml,
            yearHtml,
            prev = true,
            next = true;

        for (arr = [], i = 0; i < 12; i++) {
            arr.push('<option value="' + (year === refYear ? i - c : 12 + i - c) + '"' +
                (i === month ? ' selected="selected"': '') +
                ((isMinYear && i < opts.minMonth) || (isMaxYear && i > opts.maxMonth) ? 'disabled="disabled"' : '') + '>' +
                opts.i18n.months[i] + '</option>');
        }

        monthHtml = '<div class="pika-label">' + opts.i18n.months[month] + '<select class="pika-select pika-select-month" tabindex="-1">' + arr.join('') + '</select></div>';

        if (isArray(opts.yearRange)) {
            i = opts.yearRange[0];
            j = opts.yearRange[1] + 1;
        } else {
            i = year - opts.yearRange;
            j = 1 + year + opts.yearRange;
        }

        for (arr = []; i < j && i <= opts.maxYear; i++) {
            if (i >= opts.minYear) {
                arr.push('<option value="' + i + '"' + (i === year ? ' selected="selected"': '') + '>' + (i) + '</option>');
            }
        }
        yearHtml = '<div class="pika-label">' + year + opts.yearSuffix + '<select class="pika-select pika-select-year" tabindex="-1">' + arr.join('') + '</select></div>';

        if (opts.showMonthAfterYear) {
            html += yearHtml + monthHtml;
        } else {
            html += monthHtml + yearHtml;
        }

        if (isMinYear && (month === 0 || opts.minMonth >= month)) {
            prev = false;
        }

        if (isMaxYear && (month === 11 || opts.maxMonth <= month)) {
            next = false;
        }

        if (c === 0) {
            html += '<button class="pika-prev' + (prev ? '' : ' is-disabled') + '" type="button">' + opts.i18n.previousMonth + '</button>';
        }
        if (c === (instance._o.numberOfMonths - 1) ) {
            html += '<button class="pika-next' + (next ? '' : ' is-disabled') + '" type="button">' + opts.i18n.nextMonth + '</button>';
        }

        return html += '</div>';
    },

    renderTable = function(opts, data, randId)
    {
        return '<table cellpadding="0" cellspacing="0" class="pika-table" role="grid" aria-labelledby="' + randId + '">' + renderHead(opts) + renderBody(data) + '</table>';
    },


    /**
     * Pikaday constructor
     */
    Pikaday = function(options)
    {
        var self = this,
            opts = self.config(options);

        self._onMouseDown = function(e)
        {
            if (!self._v) {
                return;
            }
            e = e || window.event;
            var target = e.target || e.srcElement;
            if (!target) {
                return;
            }

            if (!hasClass(target, 'is-disabled')) {
                if (hasClass(target, 'pika-button') && !hasClass(target, 'is-empty') && !hasClass(target.parentNode, 'is-disabled')) {
                    self.setDate(new Date(target.getAttribute('data-pika-year'), target.getAttribute('data-pika-month'), target.getAttribute('data-pika-day')));
                    if (opts.bound) {
                        sto(function() {
                            self.hide();
                            if (opts.field) {
                                opts.field.blur();
                            }
                        }, 100);
                    }
                }
                else if (hasClass(target, 'pika-prev')) {
                    self.prevMonth();
                }
                else if (hasClass(target, 'pika-next')) {
                    self.nextMonth();
                }
            }
            if (!hasClass(target, 'pika-select')) {
                // if this is touch event prevent mouse events emulation
                if (e.preventDefault) {
                    e.preventDefault();
                } else {
                    e.returnValue = false;
                    return false;
                }
            } else {
                self._c = true;
            }
        };

        self._onChange = function(e)
        {
            e = e || window.event;
            var target = e.target || e.srcElement;
            if (!target) {
                return;
            }
            if (hasClass(target, 'pika-select-month')) {
                self.gotoMonth(target.value);
            }
            else if (hasClass(target, 'pika-select-year')) {
                self.gotoYear(target.value);
            }
        };

        self._onKeyChange = function(e)
        {
            e = e || window.event;

            if (self.isVisible()) {

                switch(e.keyCode){
                    case 13:
                    case 27:
                        opts.field.blur();
                        break;
                    case 37:
                        e.preventDefault();
                        self.adjustDate('subtract', 1);
                        break;
                    case 38:
                        self.adjustDate('subtract', 7);
                        break;
                    case 39:
                        self.adjustDate('add', 1);
                        break;
                    case 40:
                        self.adjustDate('add', 7);
                        break;
                }
            }
        };

        self._onInputChange = function(e)
        {
            var date;

            if (e.firedBy === self) {
                return;
            }
            if (hasMoment) {
                date = moment(opts.field.value, opts.format, opts.formatStrict);
                date = (date && date.isValid()) ? date.toDate() : null;
            }
            else {
                date = new Date(Date.parse(opts.field.value));
            }
            if (isDate(date)) {
              self.setDate(date);
            }
            if (!self._v) {
                self.show();
            }
        };

        self._onInputFocus = function()
        {
            self.show();
        };

        self._onInputClick = function()
        {
            self.show();
        };

        self._onInputBlur = function()
        {
            // IE allows pika div to gain focus; catch blur the input field
            var pEl = document.activeElement;
            do {
                if (hasClass(pEl, 'pika-single')) {
                    return;
                }
            }
            while ((pEl = pEl.parentNode));

            if (!self._c) {
                self._b = sto(function() {
                    self.hide();
                }, 50);
            }
            self._c = false;
        };

        self._onClick = function(e)
        {
            e = e || window.event;
            var target = e.target || e.srcElement,
                pEl = target;
            if (!target) {
                return;
            }
            if (!hasEventListeners && hasClass(target, 'pika-select')) {
                if (!target.onchange) {
                    target.setAttribute('onchange', 'return;');
                    addEvent(target, 'change', self._onChange);
                }
            }
            do {
                if (hasClass(pEl, 'pika-single') || pEl === opts.trigger) {
                    return;
                }
            }
            while ((pEl = pEl.parentNode));
            if (self._v && target !== opts.trigger && pEl !== opts.trigger) {
                self.hide();
            }
        };

        self.el = document.createElement('div');
        self.el.className = 'pika-single' + (opts.isRTL ? ' is-rtl' : '') + (opts.theme ? ' ' + opts.theme : '');

        addEvent(self.el, 'mousedown', self._onMouseDown, true);
        addEvent(self.el, 'touchend', self._onMouseDown, true);
        addEvent(self.el, 'change', self._onChange);
        addEvent(document, 'keydown', self._onKeyChange);

        if (opts.field) {
            if (opts.container) {
                opts.container.appendChild(self.el);
            } else if (opts.bound) {
                document.body.appendChild(self.el);
            } else {
                opts.field.parentNode.insertBefore(self.el, opts.field.nextSibling);
            }
            addEvent(opts.field, 'change', self._onInputChange);

            if (!opts.defaultDate) {
                if (hasMoment && opts.field.value) {
                    opts.defaultDate = moment(opts.field.value, opts.format).toDate();
                } else {
                    opts.defaultDate = new Date(Date.parse(opts.field.value));
                }
                opts.setDefaultDate = true;
            }
        }

        var defDate = opts.defaultDate;

        if (isDate(defDate)) {
            if (opts.setDefaultDate) {
                self.setDate(defDate, true);
            } else {
                self.gotoDate(defDate);
            }
        } else {
            self.gotoDate(new Date());
        }

        if (opts.bound) {
            this.hide();
            self.el.className += ' is-bound';
            addEvent(opts.trigger, 'click', self._onInputClick);
            addEvent(opts.trigger, 'focus', self._onInputFocus);
            addEvent(opts.trigger, 'blur', self._onInputBlur);
        } else {
            this.show();
        }
    };


    /**
     * public Pikaday API
     */
    Pikaday.prototype = {


        /**
         * configure functionality
         */
        config: function(options)
        {
            if (!this._o) {
                this._o = extend({}, defaults, true);
            }

            var opts = extend(this._o, options, true);

            opts.isRTL = !!opts.isRTL;

            opts.field = (opts.field && opts.field.nodeName) ? opts.field : null;

            opts.theme = (typeof opts.theme) === 'string' && opts.theme ? opts.theme : null;

            opts.bound = !!(opts.bound !== undefined ? opts.field && opts.bound : opts.field);

            opts.trigger = (opts.trigger && opts.trigger.nodeName) ? opts.trigger : opts.field;

            opts.disableWeekends = !!opts.disableWeekends;

            opts.disableDayFn = (typeof opts.disableDayFn) === 'function' ? opts.disableDayFn : null;

            var nom = parseInt(opts.numberOfMonths, 10) || 1;
            opts.numberOfMonths = nom > 4 ? 4 : nom;

            if (!isDate(opts.minDate)) {
                opts.minDate = false;
            }
            if (!isDate(opts.maxDate)) {
                opts.maxDate = false;
            }
            if ((opts.minDate && opts.maxDate) && opts.maxDate < opts.minDate) {
                opts.maxDate = opts.minDate = false;
            }
            if (opts.minDate) {
                this.setMinDate(opts.minDate);
            }
            if (opts.maxDate) {
                this.setMaxDate(opts.maxDate);
            }

            if (isArray(opts.yearRange)) {
                var fallback = new Date().getFullYear() - 10;
                opts.yearRange[0] = parseInt(opts.yearRange[0], 10) || fallback;
                opts.yearRange[1] = parseInt(opts.yearRange[1], 10) || fallback;
            } else {
                opts.yearRange = Math.abs(parseInt(opts.yearRange, 10)) || defaults.yearRange;
                if (opts.yearRange > 100) {
                    opts.yearRange = 100;
                }
            }

            return opts;
        },

        /**
         * return a formatted string of the current selection (using Moment.js if available)
         */
        toString: function(format)
        {
            return !isDate(this._d) ? '' : hasMoment ? moment(this._d).format(format || this._o.format) : this._d.toDateString();
        },

        /**
         * return a Moment.js object of the current selection (if available)
         */
        getMoment: function()
        {
            return hasMoment ? moment(this._d) : null;
        },

        /**
         * set the current selection from a Moment.js object (if available)
         */
        setMoment: function(date, preventOnSelect)
        {
            if (hasMoment && moment.isMoment(date)) {
                this.setDate(date.toDate(), preventOnSelect);
            }
        },

        /**
         * return a Date object of the current selection with fallback for the current date
         */
        getDate: function()
        {
            return isDate(this._d) ? new Date(this._d.getTime()) : new Date();
        },

        /**
         * set the current selection
         */
        setDate: function(date, preventOnSelect)
        {
            if (!date) {
                this._d = null;

                if (this._o.field) {
                    this._o.field.value = '';
                    fireEvent(this._o.field, 'change', { firedBy: this });
                }

                return this.draw();
            }
            if (typeof date === 'string') {
                date = new Date(Date.parse(date));
            }
            if (!isDate(date)) {
                return;
            }

            var min = this._o.minDate,
                max = this._o.maxDate;

            if (isDate(min) && date < min) {
                date = min;
            } else if (isDate(max) && date > max) {
                date = max;
            }

            this._d = new Date(date.getTime());
            setToStartOfDay(this._d);
            this.gotoDate(this._d);

            if (this._o.field) {
                this._o.field.value = this.toString();
                fireEvent(this._o.field, 'change', { firedBy: this });
            }
            if (!preventOnSelect && typeof this._o.onSelect === 'function') {
                this._o.onSelect.call(this, this.getDate());
            }
        },

        /**
         * change view to a specific date
         */
        gotoDate: function(date)
        {
            var newCalendar = true;

            if (!isDate(date)) {
                return;
            }

            if (this.calendars) {
                var firstVisibleDate = new Date(this.calendars[0].year, this.calendars[0].month, 1),
                    lastVisibleDate = new Date(this.calendars[this.calendars.length-1].year, this.calendars[this.calendars.length-1].month, 1),
                    visibleDate = date.getTime();
                // get the end of the month
                lastVisibleDate.setMonth(lastVisibleDate.getMonth()+1);
                lastVisibleDate.setDate(lastVisibleDate.getDate()-1);
                newCalendar = (visibleDate < firstVisibleDate.getTime() || lastVisibleDate.getTime() < visibleDate);
            }

            if (newCalendar) {
                this.calendars = [{
                    month: date.getMonth(),
                    year: date.getFullYear()
                }];
                if (this._o.mainCalendar === 'right') {
                    this.calendars[0].month += 1 - this._o.numberOfMonths;
                }
            }

            this.adjustCalendars();
        },

        adjustDate: function(sign, days) {

            var day = this.getDate();
            var difference = parseInt(days)*24*60*60*1000;

            var newDay;

            if (sign === 'add') {
                newDay = new Date(day.valueOf() + difference);
            } else if (sign === 'subtract') {
                newDay = new Date(day.valueOf() - difference);
            }

            if (hasMoment) {
                if (sign === 'add') {
                    newDay = moment(day).add(days, "days").toDate();
                } else if (sign === 'subtract') {
                    newDay = moment(day).subtract(days, "days").toDate();
                }
            }

            this.setDate(newDay);
        },

        adjustCalendars: function() {
            this.calendars[0] = adjustCalendar(this.calendars[0]);
            for (var c = 1; c < this._o.numberOfMonths; c++) {
                this.calendars[c] = adjustCalendar({
                    month: this.calendars[0].month + c,
                    year: this.calendars[0].year
                });
            }
            this.draw();
        },

        gotoToday: function()
        {
            this.gotoDate(new Date());
        },

        /**
         * change view to a specific month (zero-index, e.g. 0: January)
         */
        gotoMonth: function(month)
        {
            if (!isNaN(month)) {
                this.calendars[0].month = parseInt(month, 10);
                this.adjustCalendars();
            }
        },

        nextMonth: function()
        {
            this.calendars[0].month++;
            this.adjustCalendars();
        },

        prevMonth: function()
        {
            this.calendars[0].month--;
            this.adjustCalendars();
        },

        /**
         * change view to a specific full year (e.g. "2012")
         */
        gotoYear: function(year)
        {
            if (!isNaN(year)) {
                this.calendars[0].year = parseInt(year, 10);
                this.adjustCalendars();
            }
        },

        /**
         * change the minDate
         */
        setMinDate: function(value)
        {
            if(value instanceof Date) {
                setToStartOfDay(value);
                this._o.minDate = value;
                this._o.minYear  = value.getFullYear();
                this._o.minMonth = value.getMonth();
            } else {
                this._o.minDate = defaults.minDate;
                this._o.minYear  = defaults.minYear;
                this._o.minMonth = defaults.minMonth;
                this._o.startRange = defaults.startRange;
            }

            this.draw();
        },

        /**
         * change the maxDate
         */
        setMaxDate: function(value)
        {
            if(value instanceof Date) {
                setToStartOfDay(value);
                this._o.maxDate = value;
                this._o.maxYear = value.getFullYear();
                this._o.maxMonth = value.getMonth();
            } else {
                this._o.maxDate = defaults.maxDate;
                this._o.maxYear = defaults.maxYear;
                this._o.maxMonth = defaults.maxMonth;
                this._o.endRange = defaults.endRange;
            }

            this.draw();
        },

        setStartRange: function(value)
        {
            this._o.startRange = value;
        },

        setEndRange: function(value)
        {
            this._o.endRange = value;
        },

        /**
         * refresh the HTML
         */
        draw: function(force)
        {
            if (!this._v && !force) {
                return;
            }
            var opts = this._o,
                minYear = opts.minYear,
                maxYear = opts.maxYear,
                minMonth = opts.minMonth,
                maxMonth = opts.maxMonth,
                html = '',
                randId;

            if (this._y <= minYear) {
                this._y = minYear;
                if (!isNaN(minMonth) && this._m < minMonth) {
                    this._m = minMonth;
                }
            }
            if (this._y >= maxYear) {
                this._y = maxYear;
                if (!isNaN(maxMonth) && this._m > maxMonth) {
                    this._m = maxMonth;
                }
            }

            randId = 'pika-title-' + Math.random().toString(36).replace(/[^a-z]+/g, '').substr(0, 2);

            for (var c = 0; c < opts.numberOfMonths; c++) {
                html += '<div class="pika-lendar">' + renderTitle(this, c, this.calendars[c].year, this.calendars[c].month, this.calendars[0].year, randId) + this.render(this.calendars[c].year, this.calendars[c].month, randId) + '</div>';
            }

            this.el.innerHTML = html;

            if (opts.bound) {
                if(opts.field.type !== 'hidden') {
                    sto(function() {
                        opts.trigger.focus();
                    }, 1);
                }
            }

            if (typeof this._o.onDraw === 'function') {
                this._o.onDraw(this);
            }
          // let the screen reader user know to use arrow keys
          this._o.field.setAttribute('aria-label', 'Use the arrow keys to pick a date');
        },

        adjustPosition: function()
        {
            var field, pEl, width, height, viewportWidth, viewportHeight, scrollTop, left, top, clientRect;

            if (this._o.container) return;

            this.el.style.position = 'absolute';

            field = this._o.trigger;
            pEl = field;
            width = this.el.offsetWidth;
            height = this.el.offsetHeight;
            viewportWidth = window.innerWidth || document.documentElement.clientWidth;
            viewportHeight = window.innerHeight || document.documentElement.clientHeight;
            scrollTop = window.pageYOffset || document.body.scrollTop || document.documentElement.scrollTop;

            if (typeof field.getBoundingClientRect === 'function') {
                clientRect = field.getBoundingClientRect();
                left = clientRect.left + window.pageXOffset;
                top = clientRect.bottom + window.pageYOffset;
            } else {
                left = pEl.offsetLeft;
                top  = pEl.offsetTop + pEl.offsetHeight;
                while((pEl = pEl.offsetParent)) {
                    left += pEl.offsetLeft;
                    top  += pEl.offsetTop;
                }
            }

            // default position is bottom & left
            if ((this._o.reposition && left + width > viewportWidth) ||
                (
                    this._o.position.indexOf('right') > -1 &&
                    left - width + field.offsetWidth > 0
                )
            ) {
                left = left - width + field.offsetWidth;
            }
            if ((this._o.reposition && top + height > viewportHeight + scrollTop) ||
                (
                    this._o.position.indexOf('top') > -1 &&
                    top - height - field.offsetHeight > 0
                )
            ) {
                top = top - height - field.offsetHeight;
            }

            this.el.style.left = left + 'px';
            this.el.style.top = top + 'px';
        },

        /**
         * render HTML for a particular month
         */
        render: function(year, month, randId)
        {
            var opts   = this._o,
                now    = new Date(),
                days   = getDaysInMonth(year, month),
                before = new Date(year, month, 1).getDay(),
                data   = [],
                row    = [];
            setToStartOfDay(now);
            if (opts.firstDay > 0) {
                before -= opts.firstDay;
                if (before < 0) {
                    before += 7;
                }
            }
            var previousMonth = month === 0 ? 11 : month - 1,
                nextMonth = month === 11 ? 0 : month + 1,
                yearOfPreviousMonth = month === 0 ? year - 1 : year,
                yearOfNextMonth = month === 11 ? year + 1 : year,
                daysInPreviousMonth = getDaysInMonth(yearOfPreviousMonth, previousMonth);
            var cells = days + before,
                after = cells;
            while(after > 7) {
                after -= 7;
            }
            cells += 7 - after;
            for (var i = 0, r = 0; i < cells; i++)
            {
                var day = new Date(year, month, 1 + (i - before)),
                    isSelected = isDate(this._d) ? compareDates(day, this._d) : false,
                    isToday = compareDates(day, now),
                    isEmpty = i < before || i >= (days + before),
                    dayNumber = 1 + (i - before),
                    monthNumber = month,
                    yearNumber = year,
                    isStartRange = opts.startRange && compareDates(opts.startRange, day),
                    isEndRange = opts.endRange && compareDates(opts.endRange, day),
                    isInRange = opts.startRange && opts.endRange && opts.startRange < day && day < opts.endRange,
                    isDisabled = (opts.minDate && day < opts.minDate) ||
                                 (opts.maxDate && day > opts.maxDate) ||
                                 (opts.disableWeekends && isWeekend(day)) ||
                                 (opts.disableDayFn && opts.disableDayFn(day));

                if (isEmpty) {
                    if (i < before) {
                        dayNumber = daysInPreviousMonth + dayNumber;
                        monthNumber = previousMonth;
                        yearNumber = yearOfPreviousMonth;
                    } else {
                        dayNumber = dayNumber - days;
                        monthNumber = nextMonth;
                        yearNumber = yearOfNextMonth;
                    }
                }

                var dayConfig = {
                        day: dayNumber,
                        month: monthNumber,
                        year: yearNumber,
                        isSelected: isSelected,
                        isToday: isToday,
                        isDisabled: isDisabled,
                        isEmpty: isEmpty,
                        isStartRange: isStartRange,
                        isEndRange: isEndRange,
                        isInRange: isInRange,
                        showDaysInNextAndPreviousMonths: opts.showDaysInNextAndPreviousMonths
                    };

                row.push(renderDay(dayConfig));

                if (++r === 7) {
                    if (opts.showWeekNumber) {
                        row.unshift(renderWeek(i - before, month, year));
                    }
                    data.push(renderRow(row, opts.isRTL));
                    row = [];
                    r = 0;
                }
            }
            return renderTable(opts, data, randId);
        },

        isVisible: function()
        {
            return this._v;
        },

        show: function()
        {
            if (!this.isVisible()) {
                removeClass(this.el, 'is-hidden');
                this._v = true;
                this.draw();
                if (this._o.bound) {
                    addEvent(document, 'click', this._onClick);
                    this.adjustPosition();
                }
                if (typeof this._o.onOpen === 'function') {
                    this._o.onOpen.call(this);
                }
            }
        },

        hide: function()
        {
            var v = this._v;
            if (v !== false) {
                if (this._o.bound) {
                    removeEvent(document, 'click', this._onClick);
                }
                this.el.style.position = 'static'; // reset
                this.el.style.left = 'auto';
                this.el.style.top = 'auto';
                addClass(this.el, 'is-hidden');
                this._v = false;
                if (v !== undefined && typeof this._o.onClose === 'function') {
                    this._o.onClose.call(this);
                }
            }
        },

        /**
         * GAME OVER
         */
        destroy: function()
        {
            this.hide();
            removeEvent(this.el, 'mousedown', this._onMouseDown, true);
            removeEvent(this.el, 'touchend', this._onMouseDown, true);
            removeEvent(this.el, 'change', this._onChange);
            if (this._o.field) {
                removeEvent(this._o.field, 'change', this._onInputChange);
                if (this._o.bound) {
                    removeEvent(this._o.trigger, 'click', this._onInputClick);
                    removeEvent(this._o.trigger, 'focus', this._onInputFocus);
                    removeEvent(this._o.trigger, 'blur', this._onInputBlur);
                }
            }
            if (this.el.parentNode) {
                this.el.parentNode.removeChild(this.el);
            }
        }

    };

    return Pikaday;

}));

/*!
 * Pikaday jQuery plugin.
 *
 * Copyright © 2013 David Bushell | BSD & MIT license | https://github.com/dbushell/Pikaday
 */

(function (root, factory)
{
    'use strict';

    if (typeof exports === 'object') {
        // CommonJS module
        factory(require('jquery'), require('../pikaday'));
    } else if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery', 'pikaday'], factory);
    } else {
        // Browser globals
        factory(root.jQuery, root.Pikaday);
    }
}(this, function ($, Pikaday)
{
    'use strict';

    $.fn.pikaday = function()
    {
        var args = arguments;

        if (!args || !args.length) {
            args = [{ }];
        }

        return this.each(function()
        {
            var self   = $(this),
                plugin = self.data('pikaday');

            if (!(plugin instanceof Pikaday)) {
                if (typeof args[0] === 'object') {
                    var options = $.extend({}, args[0]);
                    options.field = self[0];
                    self.data('pikaday', new Pikaday(options));
                }
            } else {
                if (typeof args[0] === 'string' && typeof plugin[args[0]] === 'function') {
                    plugin[args[0]].apply(plugin, Array.prototype.slice.call(args,1));

                    if (args[0] === 'destroy') {
                        self.removeData('pikaday');
                    }
                }
            }
        });
    };

}));

/*----------------------------------------------------*/
/*  SCEditor
/*----------------------------------------------------*/

(function($){
	$(document).ready(function(){
		$(".WYSIWYG").sceditor({
			plugins: "bbcode",
			toolbar: "bold,italic,underline,center,right,justify,font,size,color,removeformat,bulletlist,orderedlist,table,quote,image,link,ltr,rtl,source",
			width: "100%"
		});

		function addIng() {
			var newElem = $('tr.ingredients-cont.ing:first').clone();
			newElem.find('input').val('');
			newElem.appendTo('table#ingredients-sort');
		}

	});
})(this.jQuery);
/* SCEditor v1.4.7 | (C) 2015, Sam Clarke | sceditor.com/license */
!function(a){function b(d){if(c[d])return c[d].exports;var e=c[d]={exports:{},id:d,loaded:!1};return a[d].call(e.exports,e,e.exports,b),e.loaded=!0,e.exports}var c={};return b.m=a,b.c=c,b.p="",b(0)}([function(a,b,c){var d;d=function(){"use strict";var a=c(1),b=c(2),d=c(3),e=c(4),f=c(5);a.sceditor=b,b.commands=c(6),b.defaultOptions=c(7),b.RangeHelper=c(8),b.dom=c(9),b.ie=e.ie,b.ios=e.ios,b.isWysiwygSupported=e.isWysiwygSupported,b.regexEscape=f.regex,b.escapeEntities=f.entities,b.escapeUriScheme=f.uriScheme,b.PluginManager=d,b.plugins=d.plugins,a.fn.sceditor=function(c){var d,f,g=[];return c=c||{},c.runWithoutWysiwygSupport||e.isWysiwygSupported?(this.each(function(){d=this.jquery?this:a(this),f=d.data("sceditor"),d.parents(".sceditor-container").length>0||("state"===c?g.push(!!f):"instance"===c?g.push(f):f||new b(this,c))}),g.length?1===g.length?g[0]:a(g):this):void 0}}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a){a.exports=jQuery},function(a,b,c){var d;d=function(){"use strict";var a=c(1),b=c(3),d=c(8),e=c(9),f=c(5),g=c(4),h=c(10),i=window,j=document,k=a(i),l=a(j),m=g.ie,n=m&&11>m,o=function(c,p){var q,r,s,t,u,v,w,x,y,z,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,$,_,ab,bb,cb,db,eb,fb,gb,hb,ib,jb,kb,lb,mb,nb,ob,pb,qb,rb,sb,tb,ub=this,vb=c.get?c.get(0):c,wb=a(vb),xb=[],yb=[],zb=[],Ab={},Bb=[],Cb={};ub.commands=a.extend(!0,{},p.commands||o.commands),ub.opts=p=a.extend({},o.defaultOptions,p),K=function(){wb.data("sceditor",ub),a.each(p,function(b,c){a.isPlainObject(c)&&(p[b]=a.extend(!0,{},c))}),p.locale&&"en"!==p.locale&&Q(),q=a('<div class="sceditor-container" />').insertAfter(wb).css("z-index",p.zIndex),m&&q.addClass("ie ie"+m),H=!!wb.attr("required"),wb.removeAttr("required"),P(),W(),R(),O(),U(),S(),T(),g.isWysiwygSupported||ub.toggleSourceMode(),hb();var b=function(){k.unbind("load",b),p.autofocus&&mb(),p.autoExpand&&ub.expandToContent(),fb(),C.call("ready")};k.load(b),j.readyState&&"complete"===j.readyState&&b()},P=function(){var c=p.plugins;c=c?c.toString().split(","):[],C=new b(ub),a.each(c,function(b,c){C.register(a.trim(c))})},Q=function(){var a;A=o.locale[p.locale],A||(a=p.locale.split("-"),A=o.locale[a[0]]),A&&A.dateFormat&&(p.dateFormat=A.dateFormat)},O=function(){var b,c;w=a("<textarea></textarea>").hide(),s=a('<iframe frameborder="0" allowfullscreen="true"></iframe>'),p.spellcheck||w.attr("spellcheck","false"),"https:"===i.location.protocol&&s.attr("src","javascript:false"),q.append(s).append(w),t=s[0],x=w[0],ub.dimensions(p.width||wb.width(),p.height||wb.height()),b=X(),b.open(),b.write(h("html",{attrs:m?' class="ie ie"'+m:"",spellcheck:p.spellcheck?"":'spellcheck="false"',charset:p.charset,style:p.style})),b.close(),v=a(b),u=a(b.body),ub.readOnly(!!p.readOnly),(g.ios||m)&&(u.height("100%"),m||u.bind("touchend",ub.focus)),c=wb.attr("tabindex"),w.attr("tabindex",c),s.attr("tabindex",c),B=new d(t.contentWindow),ub.val(wb.hide().val())},S=function(){p.autoUpdate&&(u.bind("blur",tb),w.bind("blur",tb)),null===p.rtl&&(p.rtl="rtl"===w.css("direction")),ub.rtl(!!p.rtl),p.autoExpand&&v.bind("keyup",ub.expandToContent),p.resizeEnabled&&V(),q.attr("id",p.id),ub.emoticons(p.emoticonsEnabled)},T=function(){var b=m?"selectionchange":"keyup focus blur contextmenu mouseup touchend click",c="keydown keyup keypress focus blur contextmenu";l.click(eb),a(vb.form).bind("reset",bb).submit(ub.updateOriginal),k.bind("resize orientationChanged",fb),u.keypress(ab).keydown($).keydown(_).keyup(jb).blur(rb).keyup(sb).bind("paste",Y).bind(b,kb).bind(c,db),p.emoticonsCompat&&i.getSelection&&u.keyup(ob),w.blur(rb).keyup(sb).keydown($).bind(c,db),v.mousedown(cb).blur(rb).bind(b,kb).bind("beforedeactivate keyup mouseup",N).keyup(jb).focus(function(){z=null}),q.bind("selectionchanged",lb).bind("selectionchanged",hb).bind("selectionchanged valuechanged nodechanged",db)},R=function(){var b,c=ub.commands,d=(p.toolbarExclude||"").split(","),e=p.toolbar.split("|");r=a('<div class="sceditor-toolbar" unselectable="on" />'),a.each(e,function(e,f){b=a('<div class="sceditor-group" />'),a.each(f.split(","),function(e,f){var g,i,j=c[f];!j||a.inArray(f,d)>-1||(i=j.shortcut,g=h("toolbarButton",{name:f,dispName:ub._(j.tooltip||f)},!0),g.data("sceditor-txtmode",!!j.txtExec).data("sceditor-wysiwygmode",!!j.exec).toggleClass("disabled",!j.exec).mousedown(function(){(!m||9>m)&&(J=!0)}).click(function(){var b=a(this);return b.hasClass("disabled")||M(b,j),hb(),!1}),j.tooltip&&g.attr("title",ub._(j.tooltip)+(i?"("+i+")":"")),i&&ub.addShortcut(i,f),j.state?zb.push({name:f,state:j.state}):"string"==typeof j.exec&&zb.push({name:f,state:j.exec}),b.append(g),Cb[f]=g)}),b[0].firstChild&&r.append(b)}),a(p.toolbarContainer||q).append(r)},U=function(){a.each(ub.commands,function(b,c){c.forceNewLineAfter&&a.isArray(c.forceNewLineAfter)&&(yb=a.merge(yb,c.forceNewLineAfter))}),jb()},V=function(){var b,c,d,e,f,g,h=a('<div class="sceditor-grip" />'),j=a('<div class="sceditor-resize-cover" />'),k="touchmove mousemove",n="touchcancel touchend mouseup",o=0,r=0,s=0,t=0,u=0,v=0,w=q.width(),x=q.height(),y=!1,z=ub.rtl();b=p.resizeMinHeight||x/1.5,c=p.resizeMaxHeight||2.5*x,d=p.resizeMinWidth||w/1.25,e=p.resizeMaxWidth||1.25*w,f=function(a){"touchmove"===a.type?(a=i.event,s=a.changedTouches[0].pageX,t=a.changedTouches[0].pageY):(s=a.pageX,t=a.pageY);var f=v+(t-r),g=z?u-(s-o):u+(s-o);e>0&&g>e&&(g=e),d>0&&d>g&&(g=d),p.resizeWidth||(g=!1),c>0&&f>c&&(f=c),b>0&&b>f&&(f=b),p.resizeHeight||(f=!1),(g||f)&&(ub.dimensions(g,f),7>m&&q.height(f)),a.preventDefault()},g=function(a){y&&(y=!1,j.hide(),q.removeClass("resizing").height("auto"),l.unbind(k,f),l.unbind(n,g),a.preventDefault())},q.append(h),q.append(j.hide()),h.bind("touchstart mousedown",function(a){"touchstart"===a.type?(a=i.event,o=a.touches[0].pageX,r=a.touches[0].pageY):(o=a.pageX,r=a.pageY),u=q.width(),v=q.height(),y=!0,q.addClass("resizing"),j.show(),l.bind(k,f),l.bind(n,g),7>m&&q.height(v),a.preventDefault()})},W=function(){var b,c=p.emoticons,d=p.emoticonsRoot;a.isPlainObject(c)&&p.emoticonsEnabled&&a.each(c,function(e,f){a.each(f,function(a,f){d&&(f={url:d+(f.url||f),tooltip:f.tooltip||a},c[e][a]=f),b=j.createElement("img"),b.src=f.url||f,xb.push(b)})})},mb=function(){var b,c,d=v[0],f=u[0],g=f.firstChild,h=!!p.autofocusEnd;if(q.is(":visible")){if(ub.sourceMode())return c=h?x.value.length:0,void(x.setSelectionRange?x.setSelectionRange(c,c):(b=x.createTextRange(),b.moveEnd("character",c),b.collapse(!1),b.select()));if(e.removeWhiteSpace(f),h)for((g=f.lastChild)||(g=d.createElement("p"),u.append(g));g.lastChild;)g=g.lastChild,!n&&a(g).is("br")&&g.previousSibling&&(g=g.previousSibling);d.createRange?(b=d.createRange(),e.canHaveChildren(g)?b.selectNodeContents(g):(b.setStartBefore(g),h&&b.setStartAfter(g))):(b=f.createTextRange(),b.moveToElementText(3!==g.nodeType?g:g.parentNode)),b.collapse(!h),B.selectRange(b),F=b,h&&(v.scrollTop(f.scrollHeight),u.scrollTop(f.scrollHeight)),ub.focus()}},ub.readOnly=function(a){return"boolean"!=typeof a?"readonly"===w.attr("readonly"):(u[0].contentEditable=!a,a?w.attr("readonly","readonly"):w.removeAttr("readonly"),gb(a),ub)},ub.rtl=function(a){var b=a?"rtl":"ltr";return"boolean"!=typeof a?"rtl"===w.attr("dir"):(u.attr("dir",b),w.attr("dir",b),q.removeClass("rtl").removeClass("ltr").addClass(b),ub)},gb=function(b){var c=ub.inSourceMode()?"txtmode":"wysiwygmode";a.each(Cb,function(a,d){b!==!0&&d.data("sceditor-"+c)?d.removeClass("disabled"):d.addClass("disabled")})},ub.width=function(a,b){return a||0===a?(ub.dimensions(a,null,b),ub):q.width()},ub.dimensions=function(a,b,c){var d,e=8>m||j.documentMode<8?2:0;return a=a||0===a?a:!1,b=b||0===b?b:!1,a===!1&&b===!1?{width:ub.width(),height:ub.height()}:(s.data("outerWidthOffset")===d&&ub.updateStyleCache(),a!==!1&&(c!==!1&&(p.width=a),b===!1&&(b=q.height(),c=!1),q.width(a),a&&a.toString().indexOf("%")>-1&&(a=q.width()),s.width(a-s.data("outerWidthOffset")),w.width(a-w.data("outerWidthOffset")),g.ios&&u&&u.width(a-s.data("outerWidthOffset")-(u.outerWidth(!0)-u.width()))),b!==!1&&(c!==!1&&(p.height=b),b&&b.toString().indexOf("%")>-1&&(b=q.height(b).height(),q.height("auto")),b-=p.toolbarContainer?0:r.outerHeight(!0),s.height(b-s.data("outerHeightOffset")),w.height(b-e-w.data("outerHeightOffset"))),ub)},ub.updateStyleCache=function(){s.data("outerWidthOffset",s.outerWidth(!0)-s.width()),w.data("outerWidthOffset",w.outerWidth(!0)-w.width()),s.data("outerHeightOffset",s.outerHeight(!0)-s.height()),w.data("outerHeightOffset",w.outerHeight(!0)-w.height())},ub.height=function(a,b){return a||0===a?(ub.dimensions(null,a,b),ub):q.height()},ub.maximize=function(b){return"undefined"==typeof b?q.is(".sceditor-maximize"):(b=!!b,7>m&&a("html, body").toggleClass("sceditor-maximize",b),q.toggleClass("sceditor-maximize",b),ub.width(b?"100%":p.width,!1),ub.height(b?"100%":p.height,!1),ub)},ub.expandToContent=function(a){var b=q.height(),c=b-s.height(),d=u[0].scrollHeight||v[0].documentElement.scrollHeight,e=p.resizeMaxHeight||2*(p.height||wb.height());d+=c,(a===!0||e>=d)&&d>b&&ub.height(d)},ub.destroy=function(){C&&(C.destroy(),B=null,z=null,C=null,l.unbind("click",eb),k.unbind("resize orientationChanged",fb),a(vb.form).unbind("reset",bb).unbind("submit",ub.updateOriginal),u.unbind(),v.unbind().find("*").remove(),w.unbind().remove(),r.remove(),q.unbind().find("*").unbind().remove(),q.remove(),wb.removeData("sceditor").removeData("sceditorbbcode").show(),H&&wb.attr("required","required"))},ub.createDropDown=function(b,c,d,e){var f,g="sceditor-"+c,h=y&&y.is("."+g);ub.closeDropDown(),h||(e!==!1&&a(d).find(":not(input,textarea)").filter(function(){return 1===this.nodeType}).attr("unselectable","on"),f={top:b.offset().top,left:b.offset().left,marginTop:b.outerHeight()},a.extend(f,p.dropDownCss),y=a('<div class="sceditor-dropdown '+g+'" />').css(f).append(d).appendTo(a("body")).on("click focusin",function(a){a.stopPropagation()}),setTimeout(function(){y.find("input,textarea").first().focus()}))},eb=function(a){3!==a.which&&y&&(tb(),ub.closeDropDown())},Y=function(a){var b,c,d,e=u[0],f=v[0],g=0,h=j.createElement("div"),i=f.createDocumentFragment(),k=a?a.clipboardData:!1;if(p.disablePasting)return!1;if(p.enablePasteFiltering){if(B.saveRange(),j.body.appendChild(h),k&&k.getData&&((b=k.getData("text/html"))||(b=k.getData("text/plain"))))return h.innerHTML=b,Z(e,h),!1;for(d=u.scrollTop()||v.scrollTop();e.firstChild;)i.appendChild(e.firstChild);return c=function(a,b){if(a.childNodes.length>0||g>25){for(;a.firstChild;)b.appendChild(a.firstChild);for(;i.firstChild;)a.appendChild(i.firstChild);u.scrollTop(d),v.scrollTop(d),b.childNodes.length>0?Z(a,b):B.restoreRange()}else g++,setTimeout(function(){c(a,b)},20)},c(e,h),ub.focus(),!0}},Z=function(b,c){e.fixNesting(c);var d=c.innerHTML;C.hasHandler("toSource")&&(d=C.callOnlyFirst("toSource",d,a(c))),c.parentNode.removeChild(c),C.hasHandler("toWysiwyg")&&(d=C.callOnlyFirst("toWysiwyg",d,!0)),B.restoreRange(),ub.wysiwygEditorInsertHtml(d,null,!0)},ub.closeDropDown=function(a){y&&(y.unbind().remove(),y=null),a===!0&&ub.focus()},X=function(){return t.contentDocument?t.contentDocument:t.contentWindow&&t.contentWindow.document?t.contentWindow.document:t.document},ub.wysiwygEditorInsertHtml=function(b,c,d){var f,g,h,i=s.height();ub.focus(),(d||!a(E).is("code")&&0===a(E).parents("code").length)&&(B.insertHTML(b,c),B.saveRange(),L(u[0]),f=u.find("#sceditor-end-marker").show(),g=u.scrollTop()||v.scrollTop(),h=e.getOffset(f[0]).top+1.5*f.outerHeight(!0)-i,f.hide(),(h>g||g>h+i)&&(u.scrollTop(h),v.scrollTop(h)),qb(!1),B.restoreRange(),jb())},ub.wysiwygEditorInsertText=function(a,b){ub.wysiwygEditorInsertHtml(f.entities(a),f.entities(b))},ub.insertText=function(a,b){return ub.inSourceMode()?ub.sourceEditorInsertText(a,b):ub.wysiwygEditorInsertText(a,b),ub},ub.sourceEditorInsertText=function(a,b){var c,d,e,f=x.selectionStart,g=x.selectionEnd;d=x.scrollTop,x.focus(),"undefined"!=typeof f?(e=x.value,b&&(a+=e.substring(f,g)+b),x.value=e.substring(0,f)+a+e.substring(g,e.length),x.selectionStart=f+a.length-(b?b.length:0),x.selectionEnd=x.selectionStart):(c=j.selection.createRange(),b&&(a+=c.text+b),c.text=a,b&&c.moveEnd("character",0-b.length),c.moveStart("character",c.End-c.Start),c.select()),x.scrollTop=d,x.focus(),qb()},ub.getRangeHelper=function(){return B},ub.sourceEditorCaret=function(a){var b,c={};return x.focus(),"undefined"!=typeof x.selectionStart?a?(x.selectionStart=a.start,x.selectionEnd=a.end):(c.start=x.selectionStart,c.end=x.selectionEnd):(b=j.selection.createRange(),a?(b.moveEnd("character",a.end),b.moveStart("character",a.start),b.select()):(c.start=b.Start,c.end=b.End)),a?this:c},ub.val=function(a,b){return"string"!=typeof a?ub.inSourceMode()?ub.getSourceEditorValue(!1):ub.getWysiwygEditorValue(b):(ub.inSourceMode()?ub.setSourceEditorValue(a):(b!==!1&&C.hasHandler("toWysiwyg")&&(a=C.callOnlyFirst("toWysiwyg",a)),ub.setWysiwygEditorValue(a)),ub)},ub.insert=function(b,c,d,e,f){if(ub.inSourceMode())return ub.sourceEditorInsertText(b,c),ub;if(c){var g=B.selectedHtml(),h=a("<div>").appendTo(a("body")).hide().html(g);d!==!1&&C.hasHandler("toSource")&&(g=C.callOnlyFirst("toSource",g,h)),h.remove(),b+=g+c}return d!==!1&&C.hasHandler("toWysiwyg")&&(b=C.callOnlyFirst("toWysiwyg",b,!0)),d!==!1&&f===!0&&(b=b.replace(/&lt;/g,"<").replace(/&gt;/g,">").replace(/&amp;/g,"&")),ub.wysiwygEditorInsertHtml(b),ub},ub.getWysiwygEditorValue=function(a){var b,c,d=B.hasSelection();return d?B.saveRange():z&&z.getBookmark&&(c=z.getBookmark()),e.fixNesting(u[0]),b=u.html(),a!==!1&&C.hasHandler("toSource")&&(b=C.callOnlyFirst("toSource",b,u)),d?(B.restoreRange(),z=null):c&&(z.moveToBookmark(c),z=null),b},ub.getBody=function(){return u},ub.getContentAreaContainer=function(){return s},ub.getSourceEditorValue=function(a){var b=w.val();return a!==!1&&C.hasHandler("toWysiwyg")&&(b=C.callOnlyFirst("toWysiwyg",b)),b},ub.setWysiwygEditorValue=function(a){a||(a="<p>"+(m?"":"<br />")+"</p>"),u[0].innerHTML=a,L(u[0]),jb(),qb()},ub.setSourceEditorValue=function(a){w.val(a),qb()},ub.updateOriginal=function(){wb.val(ub.val())},L=function(b){if(p.emoticonsEnabled&&!a(b).parents("code").length){var c=b.ownerDocument,d="\\s| | | | |&nbsp;",g=[],i=[],j=a.extend({},p.emoticons.more,p.emoticons.dropdown,p.emoticons.hidden);a.each(j,function(a){p.emoticonsCompat&&(i[a]=new RegExp("(>|^|"+d+")"+f.regex(a)+"($|<|"+d+")")),g.push(a)});var k=function(b){for(b=b.firstChild;b;){var d,f,l,m,n,o,q,r=b.parentNode,s=b.nodeValue;if(3!==b.nodeType)a(b).is("code")||k(b);else if(s)for(n=g.length;n--;)f=g[n],q=p.emoticonsCompat?s.search(i[f]):s.indexOf(f),q>-1&&(o=b.nextSibling,l=j[f],d=s.substr(q).split(f),s=s.substr(0,q)+d.shift(),b.nodeValue=s,m=e.parseHTML(h("emoticon",{key:f,url:l.url||l,tooltip:l.tooltip||f}),c),r.insertBefore(m[0],o),r.insertBefore(c.createTextNode(d.join(f)),o));b=b.nextSibling}};k(b),p.emoticonsCompat&&(Bb=u.find("img[data-sceditor-emoticon]"))}},ub.inSourceMode=function(){return q.hasClass("sourceMode")},ub.sourceMode=function(a){var b=ub.inSourceMode();return"boolean"!=typeof a?b:((b&&!a||!b&&a)&&ub.toggleSourceMode(),ub)},ub.toggleSourceMode=function(){var a=ub.inSourceMode();(g.isWysiwygSupported||!a)&&(a||(B.saveRange(),B.clear()),ub.blur(),a?ub.setWysiwygEditorValue(ub.getSourceEditorValue()):ub.setSourceEditorValue(ub.getWysiwygEditorValue()),z=null,w.toggle(),s.toggle(),q.toggleClass("wysiwygMode",a).toggleClass("sourceMode",!a),gb(),hb())},ib=function(){return x.focus(),"undefined"!=typeof x.selectionStart?x.value.substring(x.selectionStart,x.selectionEnd):j.selection.createRange().text},M=function(b,c){ub.inSourceMode()?c.txtExec&&(a.isArray(c.txtExec)?ub.sourceEditorInsertText.apply(ub,c.txtExec):c.txtExec.call(ub,b,ib())):c.exec&&(a.isFunction(c.exec)?c.exec.call(ub,b):ub.execCommand(c.exec,c.hasOwnProperty("execParam")?c.execParam:null))},N=function(){m&&(z=B.selectedRange())},ub.execCommand=function(b,c){var d=!1,e=ub.commands[b],f=a(B.parentNode());if(ub.focus(),!f.is("code")&&0===f.parents("code").length){try{d=v[0].execCommand(b,!1,c)}catch(g){}!d&&e&&e.errorMessage&&alert(ub._(e.errorMessage)),hb()}},kb=function(){function b(){B&&!B.compare(F)&&(F=B.cloneSelected(),q.trigger(a.Event("selectionchanged"))),G=!1}G||(G=!0,m?b():setTimeout(b,100))},lb=function(){var b,c=B.parentNode();D!==c&&(b=D,D=c,E=B.getFirstBlockParent(c),q.trigger(a.Event("nodechanged",{oldNode:b,newNode:D})))},ub.currentNode=function(){return D},ub.currentBlockNode=function(){return E},hb=function(a){var b,c,d="active",e=v[0],f=ub.sourceMode();if(ub.readOnly())return void r.find(d).removeClass(d);f||(c=a?a.newNode:B.parentNode(),b=B.getFirstBlockParent(c));for(var g=0;g<zb.length;g++){var h=0,i=Cb[zb[g].name],j=zb[g].state,k=f&&!i.data("sceditor-txtmode")||!f&&!i.data("sceditor-wysiwygmode");if("string"==typeof j){if(!f)try{h=e.queryCommandEnabled(j)?0:-1,h>-1&&(h=e.queryCommandState(j)?1:0)}catch(l){}}else k||(h=j.call(ub,c,b));i.toggleClass("disabled",k||0>h).toggleClass(d,h>0)}},ab=function(b){var c,d,f,g,h="code,blockquote,pre",i="li,ul,ol";return b.originalEvent.defaultPrevented?void 0:(ub.closeDropDown(),c=a(E).closest(h+","+i).first(),13===b.which&&c.length&&!c.is(i)?(z=null,d=v[0].createElement("br"),B.insertNode(d),n||(f=d.parentNode,g=f.lastChild,g&&3===g.nodeType&&""===g.nodeValue&&(f.removeChild(g),g=f.lastChild),!e.isInline(f,!0)&&g===d&&e.isInline(d.previousSibling)&&B.insertHTML("<br>")),!1):void 0)},jb=function(){var b,c,d,f=u[0];e.rTraverse(f,function(g){return b=g.nodeName.toLowerCase(),a.inArray(b,yb)>-1&&(c=!0),3===g.nodeType&&!/^\s*$/.test(g.nodeValue)||"br"===b||n&&!g.firstChild&&!e.isInline(g,!1)?(c&&(d=v[0].createElement("p"),d.className="sceditor-nlf",d.innerHTML=n?"":"<br />",f.appendChild(d)),!1):void 0})},bb=function(){ub.val(wb.val())},cb=function(){ub.closeDropDown(),z=null},fb=function(){var a=p.height,b=p.width;ub.maximize()?ub.dimensions("100%","100%",!1):(a&&a.toString().indexOf("%")>-1||b&&b.toString().indexOf("%")>-1)&&ub.dimensions(b,a)},ub._=function(){var a,b=arguments;return A&&A[b[0]]&&(b[0]=A[b[0]]),b[0].replace(/\{(\d+)\}/g,function(c,d){return b[d-0+1]!==a?b[d-0+1]:"{"+d+"}"})},db=function(b){C.call(b.type+"Event",b,ub);var c=b.target===x?"scesrc":"scewys",d=a.Event(b);d.type=c+b.type,q.trigger(d,ub)},ub.bind=function(b,c,d,e){b=b.split(" ");for(var f=b.length;f--;)a.isFunction(c)&&(d||q.bind("scewys"+b[f],c),e||q.bind("scesrc"+b[f],c),"valuechanged"===b[f]&&(qb.hasHandler=!0));return ub},ub.unbind=function(b,c,d,e){b=b.split(" ");for(var f=b.length;f--;)a.isFunction(c)&&(d||q.unbind("scewys"+b[f],c),e||q.unbind("scesrc"+b[f],c));return ub},ub.blur=function(b,c,d){return a.isFunction(b)?ub.bind("blur",b,c,d):ub.sourceMode()?w.blur():u.blur(),ub},ub.focus=function(b,c,d){if(a.isFunction(b))ub.bind("focus",b,c,d);else if(ub.inSourceMode())x.focus();else{var e,f=B.selectedRange();F||B.hasSelection()||mb(),!n&&f&&1===f.endOffset&&f.collapsed&&(e=f.endContainer,e&&1===e.childNodes.length&&a(e.firstChild).is("br")&&(f.setStartBefore(e.firstChild),f.collapse(!0),B.selectRange(f))),t.contentWindow.focus(),u[0].focus(),z&&(B.selectRange(z),z=null)}return ub},ub.keyDown=function(a,b,c){return ub.bind("keydown",a,b,c)},ub.keyPress=function(a,b,c){return ub.bind("keypress",a,b,c)},ub.keyUp=function(a,b,c){return ub.bind("keyup",a,b,c)},ub.nodeChanged=function(a){return ub.bind("nodechanged",a,!1,!0)},ub.selectionChanged=function(a){return ub.bind("selectionchanged",a,!1,!0)},ub.valueChanged=function(a,b,c){return ub.bind("valuechanged",a,b,c)},nb=function(b){var c,d=0,e=ub.emoticonsCache,f=String.fromCharCode(b.which);return a(E).is("code")||a(E).parents("code").length?void 0:(e||(e=[],a.each(a.extend({},p.emoticons.more,p.emoticons.dropdown,p.emoticons.hidden),function(a,b){e[d++]=[a,h("emoticon",{key:a,url:b.url||b,tooltip:b.tooltip||a})]}),e.sort(function(a,b){return a[0].length-b[0].length}),ub.emoticonsCache=e,ub.longestEmoticonCode=e[e.length-1][0].length),c=B.raplaceKeyword(ub.emoticonsCache,!0,!0,ub.longestEmoticonCode,p.emoticonsCompat,f),c&&p.emoticonsCompat?(Bb=u.find("img[data-sceditor-emoticon]"),/^\s$/.test(f)):!c)},ob=function(){if(Bb.length){var b,c,d,e,f,g,h=ub.currentBlockNode(),i=!1,j=/[^\s\xA0\u2002\u2003\u2009\u00a0]+/;Bb=a.map(Bb,function(k){return k&&k.parentNode?a.contains(h,k)?(b=k.previousSibling,c=k.nextSibling,f=b.nodeValue,null===f&&(f=b.innerText||""),b&&j.test(b.nodeValue.slice(-1))||c&&j.test((c.nodeValue||"")[0])?(d=k.parentNode,e=B.cloneSelected(),g=e.startContainer,f+=a(k).data("sceditor-emoticon"),g===c?i=f.length+e.startOffset:g===h&&h.childNodes[e.startOffset]===c?i=f.length:g===b&&(i=e.startOffset),c&&3===c.nodeType||(c=d.insertBefore(d.ownerDocument.createTextNode(""),c)),c.insertData(0,f),d.removeChild(b),d.removeChild(k),i!==!1&&(e.setStart(c,i),e.collapse(!0),B.selectRange(e)),null):k):k:null})}},ub.emoticons=function(b){return b||b===!1?(p.emoticonsEnabled=b,b?(u.keypress(nb),ub.sourceMode()||(B.saveRange(),L(u[0]),Bb=u.find("img[data-sceditor-emoticon]"),qb(!1),B.restoreRange())):(u.find("img[data-sceditor-emoticon]").replaceWith(function(){return a(this).data("sceditor-emoticon")}),Bb=[],u.unbind("keypress",nb),qb()),ub):p.emoticonsEnabled},ub.css=function(b){return I||(I=a('<style id="#inline" />',v[0]).appendTo(v.find("head"))[0]),"string"!=typeof b?I.styleSheet?I.styleSheet.cssText:I.innerHTML:(I.styleSheet?I.styleSheet.cssText=b:I.innerHTML=b,ub)},$=function(a){var b=[],c={"`":"~",1:"!",2:"@",3:"#",4:"$",5:"%",6:"^",7:"&",8:"*",9:"(",0:")","-":"_","=":"+",";":": ","'":'"',",":"<",".":">","/":"?","\\":"|","[":"{","]":"}"},d={8:"backspace",9:"tab",13:"enter",19:"pause",20:"capslock",27:"esc",32:"space",33:"pageup",34:"pagedown",35:"end",36:"home",37:"left",38:"up",39:"right",40:"down",45:"insert",46:"del",91:"win",92:"win",93:"select",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9",106:"*",107:"+",109:"-",110:".",111:"/",112:"f1",113:"f2",114:"f3",115:"f4",116:"f5",117:"f6",118:"f7",119:"f8",120:"f9",121:"f10",122:"f11",123:"f12",144:"numlock",145:"scrolllock",186:";",187:"=",188:",",189:"-",190:".",191:"/",192:"`",219:"[",220:"\\",221:"]",222:"'"},e={109:"-",110:"del",111:"/",96:"0",97:"1",98:"2",99:"3",100:"4",101:"5",102:"6",103:"7",104:"8",105:"9"},f=a.which,g=d[f]||String.fromCharCode(f).toLowerCase();return a.ctrlKey&&b.push("ctrl"),a.altKey&&b.push("alt"),a.shiftKey&&(b.push("shift"),e[f]?g=e[f]:c[g]&&(g=c[g])),g&&(16>f||f>18)&&b.push(g),b=b.join("+"),Ab[b]?Ab[b].call(ub):void 0},ub.addShortcut=function(a,b){return a=a.toLowerCase(),Ab[a]="string"==typeof b?function(){return M(Cb[b],ub.commands[b]),!1}:b,ub},ub.removeShortcut=function(a){return delete Ab[a.toLowerCase()],ub},_=function(b){var c,d,e,f,g;if(!p.disableBlockRemove&&8===b.which&&(f=B.selectedRange())&&(i.getSelection?(c=f.startContainer,d=f.startOffset):(c=f.parentElement(),e=v[0].selection.createRange(),e.moveToElementText(c),e.setEndPoint("EndToStart",f),d=e.text.length),0===d&&(g=pb()))){for(;c!==g;){for(;c.previousSibling;)if(c=c.previousSibling,3!==c.nodeType||c.nodeValue)return;if(!(c=c.parentNode))return}if(g&&!a(g).is("body"))return ub.clearBlockFormatting(g),!1}},pb=function(){for(var b=E;!e.hasStyling(b)||e.isInline(b,!0);)if(!(b=b.parentNode)||a(b).is("body"))return;return b},ub.clearBlockFormatting=function(b){return b=b||pb(),!b||a(b).is("body")?ub:(B.saveRange(),b.className="",z=null,a(b).attr("style",""),a(b).is("p,div,td")||e.convertElement(b,"p"),B.restoreRange(),ub)},qb=function(b){if(C&&(C.hasHandler("valuechangedEvent")||qb.hasHandler)){var c,d=ub.sourceMode(),e=!d&&B.hasSelection();b=b!==!1&&!v[0].getElementById("sceditor-start-marker"),sb.timer&&(clearTimeout(sb.timer),sb.timer=!1),e&&b&&B.saveRange(),c=d?w.val():u.html(),c!==qb.lastHtmlValue&&(qb.lastHtmlValue=c,q.trigger(a.Event("valuechanged",{rawValue:d?ub.val():c}))),e&&b&&B.removeMarkers()}},rb=function(){sb.timer&&qb()},sb=function(a){var b=a.which,c=sb.lastChar,d=13===c||32===c,e=8===c||46===c;sb.lastChar=b,13===b||32===b?d?sb.triggerNextChar=!0:qb():8===b||46===b?e?sb.triggerNextChar=!0:qb():sb.triggerNextChar&&(qb(),sb.triggerNextChar=!1),sb.timer&&clearTimeout(sb.timer),sb.timer=setTimeout(function(){qb()},1500)},tb=function(){J||ub.updateOriginal(),J=!1},K()};return o.locale={},o.command={get:function(a){return o.commands[a]||null},set:function(b,c){return b&&c?(c=a.extend(o.commands[b]||{},c),c.remove=function(){o.command.remove(b)},o.commands[b]=c,this):!1},remove:function(a){return o.commands[a]&&delete o.commands[a],this}},o}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(){"use strict";var a={},b=function(b){var c=this,d=[],e=function(a){return"signal"+a.charAt(0).toUpperCase()+a.slice(1)},f=function(a,c){a=[].slice.call(a);var f,g,h=e(a.shift());for(f=0;f<d.length;f++)if(h in d[f]&&(g=d[f][h].apply(b,a),c))return g};c.call=function(){f(arguments,!1)},c.callOnlyFirst=function(){return f(arguments,!0)},c.hasHandler=function(a){var b=d.length;for(a=e(a);b--;)if(a in d[b])return!0;return!1},c.exists=function(b){return b in a?(b=a[b],"function"==typeof b&&"object"==typeof b.prototype):!1},c.isRegistered=function(b){if(c.exists(b))for(var e=d.length;e--;)if(d[e]instanceof a[b])return!0;return!1},c.register=function(e){return!c.exists(e)||c.isRegistered(e)?!1:(e=new a[e],d.push(e),"init"in e&&e.init.call(b),!0)},c.deregister=function(e){var f,g=d.length,h=!1;if(!c.isRegistered(e))return h;for(;g--;)d[g]instanceof a[e]&&(f=d.splice(g,1)[0],h=!0,"destroy"in f&&f.destroy.call(b));return h},c.destroy=function(){for(var a=d.length;a--;)"destroy"in d[a]&&d[a].destroy.call(b);d=[],b=null}};return b.plugins=a,b}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(a,b){"use strict";var d=c(1),e=navigator.userAgent;b.ie=function(){var a,b=3,c=document,d=c.createElement("div"),e=d.getElementsByTagName("i");do d.innerHTML="<!--[if gt IE "+ ++b+"]><i></i><![endif]-->";while(e[0]);return c.documentMode&&c.all&&window.atob&&(b=10),4===b&&c.documentMode&&(b=11),b>4?b:a}(),b.ios=/iPhone|iPod|iPad| wosbrowser\//i.test(e),b.isWysiwygSupported=function(){var a,c,f,g=d('<p contenteditable="true">')[0].contentEditable;return g===f&&"inherit"===g?!1:(c=/Opera Mobi|Opera Mini/i.test(e),/Android/i.test(e)&&(c=!0,/Safari/.test(e)&&(a=/Safari\/(\d+)/.exec(e),c=a&&a[1]?a[1]<534:!0)),/ Silk\//i.test(e)&&(a=/AppleWebKit\/(\d+)/.exec(e),c=a&&a[1]?a[1]<534:!0),b.ios&&(c=/OS [0-4](_\d)+ like Mac/i.test(e)),/Firefox/i.test(e)&&(c=!1),/OneBrowser/i.test(e)&&(c=!1),"UCWEB"===navigator.vendor&&(c=!1),!c)}()}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(a,b){"use strict";var c=/^(?:https?|s?ftp|mailto|spotify|skype|ssh|teamspeak|tel):|(?:\/\/)/i;b.regex=function(a){return a.replace(/([\-.*+?^=!:${}()|\[\]\/\\])/g,"\\$1")},b.entities=function(a,b){if(!a)return a;var c={"&":"&amp;","<":"&lt;",">":"&gt;","  ":" &nbsp;","\r\n":"\n","\r":"\n","\n":"<br />"};return b!==!1&&(c['"']="&#34;",c["'"]="&#39;",c["`"]="&#96;"),a=a.replace(/ {2}|\r\n|[&<>\r\n'"`]/g,function(a){return c[a]||a})},b.uriScheme=function(a){var b,d=/^[^\/]*:/i,e=window.location;return a&&d.test(a)&&!c.test(a)?(b=e.pathname.split("/"),b.pop(),e.protocol+"//"+e.host+b.join("/")+"/"+a):a}}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(){"use strict";var a=c(1),b=c(4).ie,d=c(10),e=b&&11>b,f={bold:{exec:"bold",tooltip:"Bold",shortcut:"ctrl+b"},italic:{exec:"italic",tooltip:"Italic",shortcut:"ctrl+i"},underline:{exec:"underline",tooltip:"Underline",shortcut:"ctrl+u"},strike:{exec:"strikethrough",tooltip:"Strikethrough"},subscript:{exec:"subscript",tooltip:"Subscript"},superscript:{exec:"superscript",tooltip:"Superscript"},left:{exec:"justifyleft",tooltip:"Align left"},center:{exec:"justifycenter",tooltip:"Center"},right:{exec:"justifyright",tooltip:"Align right"},justify:{exec:"justifyfull",tooltip:"Justify"},font:{_dropDown:function(b,c,e){for(var f=0,g=b.opts.fonts.split(","),h=a("<div />"),i=function(){return e(a(this).data("font")),b.closeDropDown(!0),!1};f<g.length;f++)h.append(d("fontOpt",{font:g[f]},!0).click(i));b.createDropDown(c,"font-picker",h)},exec:function(a){var b=this;f.font._dropDown(b,a,function(a){b.execCommand("fontname",a)})},tooltip:"Font Name"},size:{_dropDown:function(b,c,e){for(var f=a("<div />"),g=function(c){e(a(this).data("size")),b.closeDropDown(!0),c.preventDefault()},h=1;7>=h;h++)f.append(d("sizeOpt",{size:h},!0).click(g));b.createDropDown(c,"fontsize-picker",f)},exec:function(a){var b=this;f.size._dropDown(b,a,function(a){b.execCommand("fontsize",a)})},tooltip:"Font Size"},color:{_dropDown:function(b,c,d){var e,g,h,i,j={r:255,g:255,b:255},k=a("<div />"),l=b.opts.colors?b.opts.colors.split("|"):new Array(21),m=[],n=f.color;if(!n._htmlCache){for(e=0;e<l.length;++e){for(i=l[e]?l[e].split(","):new Array(21),m.push('<div class="sceditor-color-column">'),g=0;g<i.length;++g)h=i[g]||"#"+j.r.toString(16)+j.g.toString(16)+j.b.toString(16),m.push('<a href="#" class="sceditor-color-option" style="background-color: '+h+'" data-color="'+h+'"></a>'),g%5===0?(j.g-=51,j.b=255):j.b-=51;m.push("</div>"),e%5===0?(j.r-=51,j.g=255,j.b=255):(j.g=255,j.b=255)}n._htmlCache=m.join("")}k.append(n._htmlCache).find("a").click(function(c){d(a(this).attr("data-color")),b.closeDropDown(!0),c.preventDefault()}),b.createDropDown(c,"color-picker",k)},exec:function(a){var b=this;f.color._dropDown(b,a,function(a){b.execCommand("forecolor",a)})},tooltip:"Font Color"},removeformat:{exec:"removeformat",tooltip:"Remove Formatting"},cut:{exec:"cut",tooltip:"Cut",errorMessage:"Your browser does not allow the cut command. Please use the keyboard shortcut Ctrl/Cmd-X"},copy:{exec:"copy",tooltip:"Copy",errorMessage:"Your browser does not allow the copy command. Please use the keyboard shortcut Ctrl/Cmd-C"},paste:{exec:"paste",tooltip:"Paste",errorMessage:"Your browser does not allow the paste command. Please use the keyboard shortcut Ctrl/Cmd-V"},pastetext:{exec:function(a){var b,c,e=this;c=d("pastetext",{label:e._("Paste your text inside the following box:"),insert:e._("Insert")},!0),c.find(".button").click(function(a){b=c.find("#txt").val(),b&&e.wysiwygEditorInsertText(b),e.closeDropDown(!0),a.preventDefault()}),e.createDropDown(a,"pastetext",c)},tooltip:"Paste Text"},bulletlist:{exec:"insertunorderedlist",tooltip:"Bullet list"},orderedlist:{exec:"insertorderedlist",tooltip:"Numbered list"},indent:{state:function(b,c){var d,e,f,g=a(c),h=g.parents("ul,ol,menu"),i=h.first();if(h.length>1||i.children().length>1)return 0;if(g.is("ul,ol,menu")){if(d=this.getRangeHelper().selectedRange(),!(window.Range&&d instanceof Range))return g.is("li,ul,ol,menu")?0:-1;if(e=d.startContainer.parentNode,f=d.endContainer.parentNode,e!==e.parentNode.firstElementChild||a(f).is("li")&&f!==f.parentNode.lastElementChild)return 0}return-1},exec:function(){var b=this,c=a(b.getRangeHelper().getFirstBlockParent());b.focus(),c.parents("ul,ol,menu")&&b.execCommand("indent")},tooltip:"Add indent"},outdent:{state:function(b,c){return a(c).is("ul,ol,menu")||a(c).parents("ul,ol,menu").length>0?0:-1},exec:function(){var b=this,c=a(b.getRangeHelper().getFirstBlockParent());c.parents("ul,ol,menu")&&b.execCommand("outdent")},tooltip:"Remove one indent"},table:{forceNewLineAfter:["table"],exec:function(a){var b=this,c=d("table",{rows:b._("Rows:"),cols:b._("Cols:"),insert:b._("Insert")},!0);c.find(".button").click(function(a){var d,f,g=c.find("#rows").val()-0,h=c.find("#cols").val()-0,i="<table>";if(!(1>g||1>h)){for(d=0;g>d;d++){for(i+="<tr>",f=0;h>f;f++)i+="<td>"+(e?"":"<br />")+"</td>";i+="</tr>"}i+="</table>",b.wysiwygEditorInsertHtml(i),b.closeDropDown(!0),a.preventDefault()}}),b.createDropDown(a,"inserttable",c)},tooltip:"Insert a table"},horizontalrule:{exec:"inserthorizontalrule",tooltip:"Insert a horizontal rule"},code:{forceNewLineAfter:["code"],exec:function(){this.wysiwygEditorInsertHtml("<code>",(e?"":"<br />")+"</code>")},tooltip:"Code"},image:{exec:function(a){var b=this,c=d("image",{url:b._("URL:"),width:b._("Width (optional):"),height:b._("Height (optional):"),insert:b._("Insert")},!0);
c.find(".button").click(function(a){var d=c.find("#image").val(),e=c.find("#width").val(),f=c.find("#height").val(),g="";e&&(g+=' width="'+e+'"'),f&&(g+=' height="'+f+'"'),d&&b.wysiwygEditorInsertHtml("<img"+g+' src="'+d+'" />'),b.closeDropDown(!0),a.preventDefault()}),b.createDropDown(a,"insertimage",c)},tooltip:"Insert an image"},email:{exec:function(a){var b=this,c=d("email",{label:b._("E-mail:"),desc:b._("Description (optional):"),insert:b._("Insert")},!0);c.find(".button").click(function(a){var d=c.find("#email").val(),e=c.find("#des").val();d&&(b.focus(),!b.getRangeHelper().selectedHtml()||e?(e=e||d,b.wysiwygEditorInsertHtml('<a href="mailto:'+d+'">'+e+"</a>")):b.execCommand("createlink","mailto:"+d)),b.closeDropDown(!0),a.preventDefault()}),b.createDropDown(a,"insertemail",c)},tooltip:"Insert an email"},link:{exec:function(a){var b=this,c=d("link",{url:b._("URL:"),desc:b._("Description (optional):"),ins:b._("Insert")},!0);c.find(".button").click(function(a){var d=c.find("#link").val(),e=c.find("#des").val();d&&(b.focus(),!b.getRangeHelper().selectedHtml()||e?(e=e||d,b.wysiwygEditorInsertHtml('<a href="'+d+'">'+e+"</a>")):b.execCommand("createlink",d)),b.closeDropDown(!0),a.preventDefault()}),b.createDropDown(a,"insertlink",c)},tooltip:"Insert a link"},unlink:{state:function(){var b=a(this.currentNode());return b.is("a")||b.parents("a").length>0?0:-1},exec:function(){var b=a(this.currentNode()),c=b.is("a")?b:b.parents("a").first();c.length&&c.replaceWith(c.contents())},tooltip:"Unlink"},quote:{forceNewLineAfter:["blockquote"],exec:function(a,b,c){var d="<blockquote>",f="</blockquote>";b?(c=c?"<cite>"+c+"</cite>":"",d=d+c+b+f,f=null):""===this.getRangeHelper().selectedHtml()&&(f=(e?"":"<br />")+f),this.wysiwygEditorInsertHtml(d,f)},tooltip:"Insert a Quote"},emoticon:{exec:function(b){var c=this,d=function(e){var f,g=c.opts.emoticonsCompat,h=c.getRangeHelper(),i=g&&" "!==h.getOuterText(!0,1)?" ":"",j=g&&" "!==h.getOuterText(!1,1)?" ":"",k=a("<div />"),l=a("<div />").appendTo(k),m=0,n=a.extend({},c.opts.emoticons.dropdown,e?c.opts.emoticons.more:{});return a.each(n,function(){m++}),m=Math.sqrt(m),a.each(n,function(b,d){l.append(a("<img />").attr({src:d.url||d,alt:b,title:d.tooltip||b}).click(function(){return c.insert(i+a(this).attr("alt")+j,null,!1).closeDropDown(!0),!1})),l.children().length>=m&&(l=a("<div />").appendTo(k))}),e||(f=a('<a class="sceditor-more">'+c._("More")+"</a>").click(function(){return c.createDropDown(b,"more-emoticons",d(!0)),!1}),k.append(f)),k};c.createDropDown(b,"emoticons",d(!1))},txtExec:function(a){f.emoticon.exec.call(this,a)},tooltip:"Insert an emoticon"},youtube:{_dropDown:function(a,b,c){var e,f=d("youtubeMenu",{label:a._("Video URL:"),insert:a._("Insert")},!0);f.find(".button").click(function(b){var d=f.find("#link").val();d&&(e=d.match(/(?:v=|v\/|embed\/|youtu.be\/)(.{11})/),e&&(d=e[1]),/^[a-zA-Z0-9_\-]{11}$/.test(d)?c(d):alert("Invalid YouTube video")),a.closeDropDown(!0),b.preventDefault()}),a.createDropDown(b,"insertlink",f)},exec:function(a){var b=this;f.youtube._dropDown(b,a,function(a){b.wysiwygEditorInsertHtml(d("youtube",{id:a}))})},tooltip:"Insert a YouTube video"},date:{_date:function(a){var b=new Date,c=b.getYear(),d=b.getMonth()+1,e=b.getDate();return 2e3>c&&(c=1900+c),10>d&&(d="0"+d),10>e&&(e="0"+e),a.opts.dateFormat.replace(/year/i,c).replace(/month/i,d).replace(/day/i,e)},exec:function(){this.insertText(f.date._date(this))},txtExec:function(){this.insertText(f.date._date(this))},tooltip:"Insert current date"},time:{_time:function(){var a=new Date,b=a.getHours(),c=a.getMinutes(),d=a.getSeconds();return 10>b&&(b="0"+b),10>c&&(c="0"+c),10>d&&(d="0"+d),b+":"+c+":"+d},exec:function(){this.insertText(f.time._time())},txtExec:function(){this.insertText(f.time._time())},tooltip:"Insert current time"},ltr:{state:function(a,b){return b&&"ltr"===b.style.direction},exec:function(){var b=this,c=b.getRangeHelper().getFirstBlockParent(),d=a(c);b.focus(),(c&&!d.is("body")||(b.execCommand("formatBlock","p"),c=b.getRangeHelper().getFirstBlockParent(),d=a(c),c&&!d.is("body")))&&("ltr"===d.css("direction")?d.css("direction",""):d.css("direction","ltr"))},tooltip:"Left-to-Right"},rtl:{state:function(a,b){return b&&"rtl"===b.style.direction},exec:function(){var b=this,c=b.getRangeHelper().getFirstBlockParent(),d=a(c);b.focus(),(c&&!d.is("body")||(b.execCommand("formatBlock","p"),c=b.getRangeHelper().getFirstBlockParent(),d=a(c),c&&!d.is("body")))&&("rtl"===d.css("direction")?d.css("direction",""):d.css("direction","rtl"))},tooltip:"Right-to-Left"},print:{exec:"print",tooltip:"Print"},maximize:{state:function(){return this.maximize()},exec:function(){this.maximize(!this.maximize())},txtExec:function(){this.maximize(!this.maximize())},tooltip:"Maximize",shortcut:"ctrl+shift+m"},source:{state:function(){return this.sourceMode()},exec:function(){this.toggleSourceMode()},txtExec:function(){this.toggleSourceMode()},tooltip:"View source",shortcut:"ctrl+shift+s"},ignore:{}};return f}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(){"use strict";var a=c(1);return{toolbar:"bold,italic,underline,strike,subscript,superscript|left,center,right,justify|font,size,color,removeformat|cut,copy,paste,pastetext|bulletlist,orderedlist,indent,outdent|table|code,quote|horizontalrule,image,email,link,unlink|emoticon,youtube,date,time|ltr,rtl|print,maximize,source",toolbarExclude:null,style:"/css/jquery.sceditor.default.min.css",fonts:"Arial,Arial Black,Comic Sans MS,Courier New,Georgia,Impact,Sans-serif,Serif,Times New Roman,Trebuchet MS,Verdana",colors:null,locale:a("html").attr("lang")||"en",charset:"utf-8",emoticonsCompat:!1,emoticonsEnabled:!0,emoticonsRoot:"",emoticons:{dropdown:{":)":"/images/emoticons/smile.png",":angel:":"/images/emoticons/angel.png",":angry:":"/images/emoticons/angry.png","8-)":"/images/emoticons/cool.png",":'(":"/images/emoticons/cwy.png",":ermm:":"/images/emoticons/ermm.png",":D":"/images/emoticons/grin.png","<3":"/images/emoticons/heart.png",":(":"/images/emoticons/sad.png",":O":"/images/emoticons/shocked.png",":P":"/images/emoticons/tongue.png",";)":"/images/emoticons/wink.png"},more:{":alien:":"/images/emoticons/alien.png",":blink:":"/images/emoticons/blink.png",":blush:":"/images/emoticons/blush.png",":cheerful:":"/images/emoticons/cheerful.png",":devil:":"/images/emoticons/devil.png",":dizzy:":"/images/emoticons/dizzy.png",":getlost:":"/images/emoticons/getlost.png",":happy:":"/images/emoticons/happy.png",":kissing:":"/images/emoticons/kissing.png",":ninja:":"/images/emoticons/ninja.png",":pinch:":"/images/emoticons/pinch.png",":pouty:":"/images/emoticons/pouty.png",":sick:":"/images/emoticons/sick.png",":sideways:":"/images/emoticons/sideways.png",":silly:":"/images/emoticons/silly.png",":sleeping:":"/images/emoticons/sleeping.png",":unsure:":"/images/emoticons/unsure.png",":woot:":"/images/emoticons/w00t.png",":wassat:":"/images/emoticons/wassat.png"},hidden:{":whistling:":"/images/emoticons/whistling.png",":love:":"/images/emoticons/wub.png"}},width:null,height:null,resizeEnabled:!0,resizeMinWidth:null,resizeMinHeight:null,resizeMaxHeight:null,resizeMaxWidth:null,resizeHeight:!0,resizeWidth:!0,dateFormat:"year-month-day",toolbarContainer:null,enablePasteFiltering:!1,disablePasting:!1,readOnly:!1,rtl:!1,autofocus:!1,autofocusEnd:!0,autoExpand:!1,autoUpdate:!1,spellcheck:!0,runWithoutWysiwygSupport:!1,id:null,plugins:"",zIndex:null,bbcodeTrim:!1,disableBlockRemove:!1,parserOptions:{},dropDownCss:{}}}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(){"use strict";var a=c(1),b=c(9),d=c(5),e=c(4),f=e.ie,g=f&&11>f,h=function(b){return a("<p>",b.ownerDocument).append(b).html()},i=function(c,e){var i,j,k,l=e||c.contentDocument||c.document,m=c,n=!!c.getSelection,o="sceditor-start-marker",p="sceditor-end-marker",q="character",r=this;r.insertHTML=function(a,b){var c,d,e=r.selectedRange();if(!e)return!1;if(n){for(b&&(a+=r.selectedHtml()+b),d=l.createElement("p"),c=l.createDocumentFragment(),d.innerHTML=a;d.firstChild;)c.appendChild(d.firstChild);r.insertNode(c)}else e.pasteHTML(k(a,b,!0)),r.restoreRange()},k=function(c,d,e){var g,h,j=l.createElement("div"),k=a(j);if("string"==typeof c?(d&&(c+=r.selectedHtml()+d),k.html(c)):(k.append(c),d&&k.append(r.selectedRange().extractContents()).append(d)),g=j.lastChild){for(;!b.isInline(g.lastChild,!0);)g=g.lastChild;return b.canHaveChildren(g)&&(h=a(g),g.lastChild||h.append("​")),f&&9>f&&a(g).is("img")&&k.append("​"),r.removeMarkers(),(h||k).append(i(o)).append(i(p)),e?k.html():a(l.createDocumentFragment()).append(k.contents())[0]}},r.insertNode=function(a,c){if(n){var d=k(a,c),e=r.selectedRange(),f=e.commonAncestorContainer;if(!d)return!1;e.deleteContents(),f&&3!==f.nodeType&&!b.canHaveChildren(f)?f.parentNode.insertBefore(d,f):e.insertNode(d),r.restoreRange()}else r.insertHTML(h(a),c?h(c):null)},r.cloneSelected=function(){var a=r.selectedRange();return a?n?a.cloneRange():a.duplicate():void 0},r.selectedRange=function(){var a,b,c=n?m.getSelection():l.selection;if(c){if(c.getRangeAt&&c.rangeCount<=0){for(b=l.body;b.firstChild;)b=b.firstChild;a=l.createRange(),a.setStart(b,0),c.addRange(a)}return n&&(a=c.getRangeAt(0)),n||"Control"===c.type||(a=c.createRange()),j(a)?a:null}},j=function(a){var b;return a&&!n&&(b=a.parentElement()),b?b.ownerDocument===l:!0},r.hasSelection=function(){var a=n?m.getSelection():l.selection;return n||!a?a&&a.rangeCount>0:"None"!==a.type&&j(a.createRange())},r.selectedHtml=function(){var a,b=r.selectedRange();if(b){if(n)return a=l.createElement("p"),a.appendChild(b.cloneContents()),a.innerHTML;if(""!==b.text&&b.htmlText)return b.htmlText}return""},r.parentNode=function(){var a=r.selectedRange();return a?a.parentElement?a.parentElement():a.commonAncestorContainer:void 0},r.getFirstBlockParent=function(a){var c=function(a){return b.isInline(a,!0)?(a=a?a.parentNode:null,a?c(a):a):a};return c(a||r.parentNode())},r.insertNodeAt=function(a,b){var c=r.selectedRange(),d=r.cloneSelected();return d?(d.collapse(a),n?d.insertNode(b):d.pasteHTML(h(b)),void r.selectRange(c)):!1},i=function(a){r.removeMarker(a);var b=l.createElement("span");return b.id=a,b.style.lineHeight="0",b.style.display="none",b.className="sceditor-selection sceditor-ignore",b.innerHTML=" ",b},r.insertMarkers=function(){r.insertNodeAt(!0,i(o)),r.insertNodeAt(!1,i(p))},r.getMarker=function(a){return l.getElementById(a)},r.removeMarker=function(a){var b=r.getMarker(a);b&&b.parentNode.removeChild(b)},r.removeMarkers=function(){r.removeMarker(o),r.removeMarker(p)},r.saveRange=function(){r.insertMarkers()},r.selectRange=function(c){if(n){var d,e=m.getSelection(),f=c.endContainer;if(!g&&c.collapsed&&f&&!b.isInline(f,!0)){for(d=f.lastChild;d&&a(d).is(".sceditor-ignore");)d=d.previousSibling;if(a(d).is("br")){var h=l.createRange();h.setEndAfter(d),h.collapse(!1),r.compare(c,h)&&(c.setStartBefore(d),c.collapse(!0))}}e&&(r.clear(),e.addRange(c))}else c.select()},r.restoreRange=function(){var c,d,e,f=r.selectedRange(),g=r.getMarker(o),h=r.getMarker(p);return g&&h&&f?(d=g.nextSibling===h,n?(f=l.createRange(),f.setStartBefore(g),f.setEndAfter(h)):(f=l.body.createTextRange(),c=l.body.createTextRange(),e=g.previousSibling,g.nextSibling!==h||e&&b.isInline(e,!0)&&!a(e).is("br")||a(g).before("​"),c.moveToElementText(g),f.setEndPoint("StartToStart",c),f.moveStart(q,0),c.moveToElementText(h),f.setEndPoint("EndToStart",c),f.moveEnd(q,0)),d&&f.collapse(!0),r.selectRange(f),void r.removeMarkers()):!1},r.selectOuterText=function(a,b){var c=r.cloneSelected();return c?(c.collapse(!1),n?(c.setStart(c.startContainer,c.startOffset-a),c.setEnd(c.endContainer,c.endOffset+b)):(c.moveStart(q,0-a),c.moveEnd(q,b)),void r.selectRange(c)):!1},r.getOuterText=function(a,b){var c,d,e="",f=r.cloneSelected();return f?(f.collapse(!a),n?(c=f.startContainer.textContent,d=f.startOffset,a&&(d-=b,0>d&&(b+=d,d=0)),e=c.substr(d,b)):(a?f.moveStart(q,0-b):f.moveEnd(q,b),e=f.text),e):""},r.raplaceKeyword=function(a,b,c,e,f,g){c||a.sort(function(a,b){return a[0].length-b[0].length});var h,i,j,k,l,m,o,p,q="[\\s    ]",s=a.length,t=e||a[s-1][0].length;if(f){if(!n)return!1;t++}for(g=g||"",h=r.getOuterText(!0,t),l=h.length,i=h+g,b&&(i+=r.getOuterText(!1,t));s--;)if(o=a[s][0],p=o.length,k=l-1-p,j=f?i.substr(Math.max(0,k-1)).search(new RegExp("(?:"+q+")"+d.regex(o)+"(?="+q+")")):i.indexOf(o,k),j>-1){if(f&&(j+=k+1),j>l||l>j+p+(f?1:0))continue;return m=l-j,r.selectOuterText(m,p-m-(/^\S/.test(g)?1:0)),r.insertHTML(a[s][1]),!0}return!1},r.compare=function(a,b){var c=n?Range.END_TO_END:"EndToEnd",d=n?Range.START_TO_START:"StartToStart",e=n?"compareBoundaryPoints":"compareEndPoints";return b||(b=r.selectedRange()),a&&b?j(a)&&j(b)&&0===a[e](c,b)&&0===a[e](d,b):!a&&!b},r.clear=function(){var a=n?m.getSelection():l.selection;a&&(a.removeAllRanges?a.removeAllRanges():a.empty&&a.empty())}};return i}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(){"use strict";var a=c(1),b=c(4),d={},e={traverse:function(a,b,c,d,f){if(a)for(a=f?a.lastChild:a.firstChild;a;){var g=f?a.previousSibling:a.nextSibling;if(!c&&b(a)===!1||!d&&e.traverse(a,b,c,d,f)===!1||c&&b(a)===!1)return!1;a=g}},rTraverse:function(a,b,c,d){this.traverse(a,b,c,d,!0)},parseHTML:function(b,c){var d=[],e=(c||document).createElement("div");return e.innerHTML=b,a.merge(d,e.childNodes),d},hasStyling:function(b){var c=a(b);return b&&(!c.is("p,div")||b.className||c.attr("style")||!a.isEmptyObject(c.data()))},convertElement:function(a,c){for(var d,f,g=a.attributes,h=g.length,i=a.ownerDocument.createElement(c);h--;)f=g[h],(!b.ie||f.specified)&&(b.ie<8&&/style/i.test(f.name)?e.copyCSS(a,i):i.setAttribute(f.name,f.value));for(;d=a.firstChild;)i.appendChild(d);return a.parentNode.replaceChild(i,a),i},blockLevelList:"|body|hr|p|div|h1|h2|h3|h4|h5|h6|address|pre|form|table|tbody|thead|tfoot|th|tr|td|li|ol|ul|blockquote|center|",canHaveChildren:function(a){return/11?|9/.test(a.nodeType)?"|iframe|area|base|basefont|br|col|frame|hr|img|input|isindex|link|meta|param|command|embed|keygen|source|track|wbr|".indexOf("|"+a.nodeName.toLowerCase()+"|")<0:!1},isInline:function(a,b){var c,d=(a||{}).nodeType||3;return 1!==d?3===d:(c=a.tagName.toLowerCase(),"code"===c?!b:e.blockLevelList.indexOf("|"+c+"|")<0)},copyCSS:function(a,b){b.style.cssText=a.style.cssText+b.style.cssText},fixNesting:function(a){var b=function(a){for(;e.isInline(a.parentNode,!0);)a=a.parentNode;return a};e.traverse(a,function(a){if(1===a.nodeType&&!e.isInline(a,!0)&&e.isInline(a.parentNode,!0)){var c=b(a),d=c.parentNode,f=e.extractContents(c,a),g=a;e.copyCSS(c,g),d.insertBefore(f,c),d.insertBefore(g,c)}})},findCommonAncestor:function(b,c){return a(b).parents().has(a(c)).first()},getSibling:function(a,b){return a?(b?a.previousSibling:a.nextSibling)||e.getSibling(a.parentNode,b):null},removeWhiteSpace:function(b,c){for(var d,f,g,h,i,j,k,l,m=e.getSibling,n=e.isInline,o=b.firstChild;o;){if(k=o.nextSibling,d=o.nodeValue,f=o.nodeType,1===f&&o.firstChild&&(j=a(o).css("whiteSpace"),/pre(\-wrap)?$/i.test(j)||e.removeWhiteSpace(o,/line$/i.test(j))),3===f&&d){for(g=m(o),h=m(o,!0),l=!1;a(h).hasClass("sceditor-ignore");)h=m(h,!0);if(n(o)&&h){for(i=h;i.lastChild;)i=i.lastChild;l=3===i.nodeType?/[\t\n\r ]$/.test(i.nodeValue):!n(i)}d=d.replace(/\u200B/g,""),h&&n(h)&&!l||(d=d.replace(c?/^[\t ]+/:/^[\t\n\r ]+/,"")),g&&n(g)||(d=d.replace(c?/[\t ]+$/:/[\t\n\r ]+$/,"")),d.length?o.nodeValue=d.replace(c?/[\t ]+/g:/[\t\n\r ]+/g," "):b.removeChild(o)}o=k}},extractContents:function(b,c){var d,f=e.findCommonAncestor(b,c).get(0),g=!1,h=!1;return(d=function(f){var i,j=b.ownerDocument.createDocumentFragment();return e.traverse(f,function(e){return h||e===c?(h=!0,!1):(e===b&&(g=!0),void(a.contains(e,b)||g&&a.contains(e,c)?(i=e.cloneNode(!1),i.appendChild(d(e)),j.appendChild(i)):g&&!a.contains(j,e)&&j.appendChild(e)))},!1),j})(f)},getOffset:function(a){for(var b=0,c=0;a;)b+=a.offsetLeft,c+=a.offsetTop,a=a.offsetParent;return{left:b,top:c}},getStyle:function(b,c){var e,f,g,h=b.style;if(!h)return"";if(d[c]||(d[c]=a.camelCase(c)),c=d[c],g=h[c],"textAlign"===c){if(e=a(b),f=h.direction,g=g||e.css(c),e.parent().css(c)===g||"block"!==e.css("display")||e.is("hr")||e.is("th"))return"";if(f&&g&&(/right/i.test(g)&&"rtl"===f||/left/i.test(g)&&"ltr"===f))return""}return g},hasStyle:function(b,c,d){var f=e.getStyle(b,c);return f?!d||f===d||a.isArray(d)&&a.inArray(f,d)>-1:!1}};return e}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))},function(a,b,c){var d;d=function(){"use strict";var a={html:'<!DOCTYPE html><html{attrs}><head><style>.ie * {min-height: auto !important} .ie table td {height:15px}</style><meta http-equiv="Content-Type" content="text/html;charset={charset}" /><link rel="stylesheet" type="text/css" href="{style}" /></head><body contenteditable="true" {spellcheck}><p></p></body></html>',toolbarButton:'<a class="sceditor-button sceditor-button-{name}" data-sceditor-command="{name}" unselectable="on"><div unselectable="on">{dispName}</div></a>',emoticon:'<img src="{url}" data-sceditor-emoticon="{key}" alt="{key}" title="{tooltip}" />',fontOpt:'<a class="sceditor-font-option" href="#" data-font="{font}"><font face="{font}">{font}</font></a>',sizeOpt:'<a class="sceditor-fontsize-option" data-size="{size}" href="#"><font size="{size}">{size}</font></a>',pastetext:'<div><label for="txt">{label}</label> <textarea cols="20" rows="7" id="txt"></textarea></div><div><input type="button" class="button" value="{insert}" /></div>',table:'<div><label for="rows">{rows}</label><input type="text" id="rows" value="2" /></div><div><label for="cols">{cols}</label><input type="text" id="cols" value="2" /></div><div><input type="button" class="button" value="{insert}" /></div>',image:'<div><label for="link">{url}</label> <input type="text" id="image" placeholder="http://" /></div><div><label for="width">{width}</label> <input type="text" id="width" size="2" /></div><div><label for="height">{height}</label> <input type="text" id="height" size="2" /></div><div><input type="button" class="button" value="{insert}" /></div>',email:'<div><label for="email">{label}</label> <input type="text" id="email" /></div><div><label for="des">{desc}</label> <input type="text" id="des" /></div><div><input type="button" class="button" value="{insert}" /></div>',link:'<div><label for="link">{url}</label> <input type="text" id="link" placeholder="http://" /></div><div><label for="des">{desc}</label> <input type="text" id="des" /></div><div><input type="button" class="button" value="{ins}" /></div>',youtubeMenu:'<div><label for="link">{label}</label> <input type="text" id="link" placeholder="http://" /></div><div><input type="button" class="button" value="{insert}" /></div>',youtube:'<iframe width="560" height="315" src="http://www.youtube.com/embed/{id}?wmode=opaque" data-youtube-id="{id}" frameborder="0" allowfullscreen></iframe>'};return function(b,c,d){var e=a[b];return $.each(c,function(a,b){e=e.replace(new RegExp("\\{"+a+"\\}","g"),b)}),d&&(e=$(e)),e}}.call(b,c,b,a),!(void 0!==d&&(a.exports=d))}]),function(a){"use strict";var b=a.sceditor,c=b.plugins,d=b.dom,e={bold:{txtExec:["<strong>","</strong>"]},italic:{txtExec:["<em>","</em>"]},underline:{txtExec:['<span style="text-decoration: underline;">',"</span>"]},strike:{txtExec:['<span style="text-decoration: line-through;">',"</span>"]},subscript:{txtExec:["<sub>","</sub>"]},superscript:{txtExec:["<sup>","</sup>"]},left:{txtExec:['<div style="text-align: left;">',"</div>"]},center:{txtExec:['<div style="text-align: center;">',"</div>"]},right:{txtExec:['<div style="text-align: right;">',"</div>"]},justify:{txtExec:['<div style="text-align: justify;">',"</div>"]},font:{txtExec:function(a){var c=this;b.command.get("font")._dropDown(c,a,function(a){c.insertText('<span style="font-family: '+a+';">',"</span>")})}},size:{txtExec:function(a){var c=this;b.command.get("size")._dropDown(c,a,function(a){c.insertText('<span style="font-size: '+a+';">',"</span>")})}},color:{txtExec:function(a){var c=this;b.command.get("color")._dropDown(c,a,function(a){c.insertText('<span style="color: '+a+';">',"</span>")})}},bulletlist:{txtExec:["<ul><li>","</li></ul>"]},orderedlist:{txtExec:["<ol><li>","</li></ol>"]},table:{txtExec:["<table><tr><td>","</td></tr></table>"]},horizontalrule:{txtExec:["<hr />"]},code:{txtExec:["<code>","</code>"]},image:{txtExec:function(a,b){var c=prompt(this._("Enter the image URL:"),b);c&&this.insertText('<img src="'+c+'" />')}},email:{txtExec:function(a,b){var c,d,e=b&&b.indexOf("@")>-1?null:b;c=prompt(this._("Enter the e-mail address:"),e?"":b),d=prompt(this._("Enter the displayed text:"),e||c)||c,c&&this.insertText('<a href="mailto:'+c+'">'+d+"</a>")}},link:{txtExec:function(a,b){var c=b&&b.indexOf("http://")>-1?null:b,d=prompt(this._("Enter URL:"),c?"http://":b),e=prompt(this._("Enter the displayed text:"),c||d)||d;d&&this.insertText('<a href="'+d+'">'+e+"</a>")}},quote:{txtExec:["<blockquote>","</blockquote>"]},youtube:{txtExec:function(a){var c=this;b.command.get("youtube")._dropDown(c,a,function(a){c.insertText('<iframe width="560" height="315" src="http://www.youtube.com/embed/{id}?wmode=opaque" data-youtube-id="'+a+'" frameborder="0" allowfullscreen></iframe>')})}},rtl:{txtExec:['<div stlye="direction: rtl;">',"</div>"]},ltr:{txtExec:['<div stlye="direction: ltr;">',"</div>"]}};b.XHTMLSerializer=function(){var c,e,f,g,h,i,j,k,l,m,n=this,o={indentStr:"	"},p=[],q=0;c=function(a){var b={"&":"&amp;","<":"&lt;",">":"&gt;",'"':"&quot;"};return a?a.replace(/[&<>"]/g,function(a){return b[a]||a}):""},e=function(a){return a.replace(/[\r\n]/," ").replace(/[^\S|\u00A0]+/g," ")},n.serialize=function(a,b){if(p=[],b)for(a=a.firstChild;a;)f(a),a=a.nextSibling;else f(a);return p.join("")},f=function(a,b){switch(a.nodeType){case 1:var c=a.nodeName.toLowerCase();"!"===c?j(a):h(a,b);break;case 3:k(a,b);break;case 4:i(a);break;case 8:j(a);break;case 9:case 11:g(a);break;case 2:case 5:case 6:case 7:case 10:case 12:}},g=function(a){for(var b=a.firstChild;b;)f(b),b=b.nextSibling},h=function(e,g){var h,i,j,k=e.nodeName.toLowerCase(),n="iframe"===k,o=e.attributes.length,p=e.firstChild,r=g||/pre(?:\-wrap)?$/i.test(a(e).css("whiteSpace")),s=!e.firstChild&&!d.canHaveChildren(e)&&!n;if(!a(e).hasClass("sceditor-ignore")){for(l("<"+k,!g&&m(e));o--;)i=e.attributes[o],(!b.ie||i.specified||"input"===k&&"value"===i.name)&&(j=b.ie<8&&/style/i.test(i.name)?e.style.cssText:i.value,l(" "+i.name.toLowerCase()+'="'+c(j)+'"',!1));for(l(s?" />":">",!1),n||(h=p);h;)q++,f(h,r),h=h.nextSibling,q--;s||l("</"+k+">",!r&&!n&&m(e)&&p&&m(p))}},i=function(a){l("<![CDATA["+c(a.nodeValue)+"]]>")},j=function(a){l("<!-- "+c(a.nodeValue)+" -->")},k=function(a,b){var d=a.nodeValue;b||(d=e(d)),d&&l(c(d),!b&&m(a))},l=function(a,b){var c=q;if(b!==!1)for(p.length&&p.push("\n");c--;)p.push(o.indentStr);p.push(a)},m=function(a){var b=a.previousSibling;return 1!==a.nodeType&&b?!d.isInline(b):b||d.isInline(a.parentNode)?!d.isInline(a):!0}},c.xhtml=function(){var f,g,h,i,j,k,l,m=this,n={},o={};m.init=function(){a.isEmptyObject(c.xhtml.converters||{})||a.each(c.xhtml.converters,function(b,c){a.each(c.tags,function(a){n[a]||(n[a]=[]),n[a].push(c)})}),this.commands=a.extend(!0,{},e,this.commands)},m.signalToSource=function(a,c){return c=c.jquery?c[0]:c,f(c),i(c),k(c),l(c),(new b.XHTMLSerializer).serialize(c,!0)},m.signalToWysiwyg=function(a){return a},m.convertTagTo=d.convertElement,g=function(c,d,e){n[c]&&a.each(n[c],function(f,g){g.tags[c]?a.each(g.tags[c],function(c,f){e.getAttributeNode&&(c=e.getAttributeNode(c),!c||b.ie<8&&!c.specified||f&&a.inArray(c.value,f)<0||g.conv.call(m,e,d))}):g.conv&&g.conv.call(m,e,d)})},f=function(b){d.traverse(b,function(b){var c=a(b),d=b.nodeName.toLowerCase();g("*",c,b),g(d,c,b)},!0)},h=function(a,b){var c=a.childNodes,e=a.nodeName.toLowerCase(),f=a.nodeValue,g=c.length;if(b&&"br"===e)return!0;if(!d.canHaveChildren(a))return!1;if(f&&/\S|\u00A0/.test(f))return!1;for(;g--;)if(!h(c[g],!a.previousSibling&&!a.nextSibling))return!1;return!0},i=function(b){d.traverse(b,function(b){var e,f=b.nodeName.toLowerCase(),g="iframe"!==f&&h(b),i=b.parentNode,j=b.nodeType,k=!d.isInline(b),l=b.previousSibling,m=b.nextSibling,n=b.ownerDocument,o=c.xhtml.allowedTags,p=c.xhtml.disallowedTags;if(3!==j&&(4===j?f="!cdata":("!"===f||8===j)&&(f="!comment"),g?e=!0:o&&o.length?e=a.inArray(f,o)<0:p&&p.length&&(e=a.inArray(f,p)>-1),e)){if(!g){for(k&&l&&d.isInline(l)&&i.insertBefore(n.createTextNode(" "),b);b.firstChild;)i.insertBefore(b.firstChild,m);k&&m&&d.isInline(m)&&i.insertBefore(n.createTextNode(" "),m)}i.removeChild(b)}},!0)},j=function(b,c){var d={};return b&&a.extend(d,b),c?(a.each(c,function(b,c){a.isArray(c)?d[b]=a.merge(d[b]||[],c):d[b]||(d[b]=null)}),d):d},l=function(b){var c=[],e=function(){c.length&&(a("<p>",b.ownerDocument).insertBefore(c[0]).append(c),c=[])};d.removeWhiteSpace(b);for(var f=b.firstChild;f;)d.isInline(f)&&!a(f).is(".sceditor-ignore")?c.push(f):e(),f=f.nextSibling;e()},k=function(b){var e,f,g,h,i,k,l=c.xhtml.allowedAttribs,m=l&&!a.isEmptyObject(l),n=c.xhtml.disallowedAttribs,p=n&&!a.isEmptyObject(n);o={},d.traverse(b,function(b){if(b.attributes&&(e=b.nodeName.toLowerCase(),h=b.attributes.length))for(o[e]||(o[e]=m?j(l["*"],l[e]):j(n["*"],n[e]));h--;)f=b.attributes[h],g=f.name,i=o[e][g],k=!1,m?k=null!==i&&(!a.isArray(i)||a.inArray(f.value,i)<0):p&&(k=null===i||a.isArray(i)&&a.inArray(f.value,i)>-1),k&&b.removeAttribute(g)})}},c.xhtml.converters=[{tags:{"*":{width:null}},conv:function(a,b){b.css("width",b.attr("width")).removeAttr("width")}},{tags:{"*":{height:null}},conv:function(a,b){b.css("height",b.attr("height")).removeAttr("height")}},{tags:{li:{value:null}},conv:function(a,c){b.ie<8?a.removeAttribute("value"):c.removeAttr("value")}},{tags:{"*":{text:null}},conv:function(a,b){b.css("color",b.attr("text")).removeAttr("text")}},{tags:{"*":{color:null}},conv:function(a,b){b.css("color",b.attr("color")).removeAttr("color")}},{tags:{"*":{face:null}},conv:function(a,b){b.css("fontFamily",b.attr("face")).removeAttr("face")}},{tags:{"*":{align:null}},conv:function(a,b){b.css("textAlign",b.attr("align")).removeAttr("align")}},{tags:{"*":{border:null}},conv:function(a,b){b.css("borderWidth",b.attr("border")).removeAttr("border")}},{tags:{applet:{name:null},img:{name:null},layer:{name:null},map:{name:null},object:{name:null},param:{name:null}},conv:function(a,b){b.attr("id")||b.attr("id",b.attr("name")),b.removeAttr("name")}},{tags:{"*":{vspace:null}},conv:function(a,b){b.css("marginTop",b.attr("vspace")-0).css("marginBottom",b.attr("vspace")-0).removeAttr("vspace")}},{tags:{"*":{hspace:null}},conv:function(a,b){b.css("marginLeft",b.attr("hspace")-0).css("marginRight",b.attr("hspace")-0).removeAttr("hspace")}},{tags:{hr:{noshade:null}},conv:function(a,b){b.css("borderStyle","solid").removeAttr("noshade")}},{tags:{"*":{nowrap:null}},conv:function(a,b){b.css("white-space","nowrap").removeAttr("nowrap")}},{tags:{big:null},conv:function(b){a(this.convertTagTo(b,"span")).css("fontSize","larger")}},{tags:{small:null},conv:function(b){a(this.convertTagTo(b,"span")).css("fontSize","smaller")}},{tags:{b:null},conv:function(b){a(this.convertTagTo(b,"strong"))}},{tags:{u:null},conv:function(b){a(this.convertTagTo(b,"span")).css("textDecoration","underline")}},{tags:{i:null},conv:function(b){a(this.convertTagTo(b,"em"))}},{tags:{s:null,strike:null},conv:function(b){a(this.convertTagTo(b,"span")).css("textDecoration","line-through")}},{tags:{dir:null},conv:function(a){this.convertTagTo(a,"ul")}},{tags:{center:null},conv:function(b){a(this.convertTagTo(b,"div")).css("textAlign","center")}},{tags:{font:{size:null}},conv:function(a,c){var d=c.css("fontSize"),e=d;"+0"!==e&&(b.ie<9&&(e=10,d>1&&(e=13),d>2&&(e=16),d>3&&(e=18),d>4&&(e=24),d>5&&(e=32),d>6&&(e=48)),c.css("fontSize",e)),c.removeAttr("size")}},{tags:{font:null},conv:function(a){this.convertTagTo(a,"span")}},{tags:{"*":{type:["_moz"]}},conv:function(a,b){b.removeAttr("type")}},{tags:{"*":{_moz_dirty:null}},conv:function(a,b){b.removeAttr("_moz_dirty")}},{tags:{"*":{_moz_editor_bogus_node:null}},conv:function(a,b){b.remove()}}],c.xhtml.allowedAttribs={},c.xhtml.disallowedAttribs={},c.xhtml.allowedTags=[],c.xhtml.disallowedTags=[]}(jQuery);
/* ----------------- Start Document ----------------- */
(function ($) {
	"use strict";

	$(document).ready(function () {

		$('form.tooltips input[type="text"],form.tooltips input[type="password"],form.tooltips input[type="email"],form.tooltips textarea,form.tooltips select,form.tooltips div.chosen-container').tooltipster({
			trigger: 'custom', // default is 'hover' which is no good here
			onlyOne: false, // allow multiple tips to be open at a time
			position: 'right', // display the tips to the right of the element
			content: 'Revise este campo',
			contentCloning: false
		});

		//seleccion de form de registro
		$(".mi-cuenta input[type=radio]").click(function () {

			var $this = $(this);
			var $formCo = $(".mi-cuenta .register-container form.company");
			var $formCa = $(".mi-cuenta .register-container form.candidate");

			if ($this.val() === "candidate") {
				$formCo.fadeOut(150, function () {
					$formCa.fadeIn(150);
				});

			} else {
				$formCa.fadeOut(150, function () {
					$formCo.fadeIn(150);
				});
			}
		});

		// bind submit handler to form
		$('form.ajax-submit').on('submit', function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var $form = $(this),
				$container = $form.find("div.form-container"),
				$messages_container = $form.find("div.form-messages").html("").removeClass("success error"),
				$message_delay = ($form.attr("message-delay"))?$form.attr('message-delay'):3000;

			$form.find('.tooltipstered').tooltipster('hide');
			
			$('.notification').hide();

			var token = $form.find($("#token")).val();

			$container.block({message: null});

			// submit the form
			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					$messages_container.addClass(response.status);
					$messages_container.html(response.message).slideDown().delay($message_delay).slideUp(1000, function () {						
						$container.unblock();
						if (response.status === "success") {
							$form[0].reset();
							if (response.redirect === undefined || !response.redirect === "") {								
								window.location.replace("/"); 
							}
						}
					});

				},
				error: function (response) {
					var msg;
					$messages_container.addClass("error");
					$container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
                                                   
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
							$form.find('select[name="' + key + '"]').closest('div').find('.chosen-container').tooltipster('content', value);
							$form.find('select[name="' + key + '"]').closest('div').find('.chosen-container').tooltipster('show');
							$form.find('select[name="' + key + '[]"]').closest('div').find('.chosen-container').tooltipster('content', value);
							$form.find('select[name="' + key + '[]"]').closest('div').find('.chosen-container').tooltipster('show');                                                        
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente"
					}

					$messages_container.html(msg).slideDown().delay(5000).slideUp();

				}
			});

		});

		$("div.form-candidate-resume a.save-candidate").click(function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var resume_html = $('textarea[name=resume_content]').sceditor('instance').val();

			var $form = $(this).parents('form'),
				container = $(this).parents('div.form-candidate-resume'),
				messages_container = $("#form-messages").html("").removeClass("success error");

			$form.find('.tooltipstered').tooltipster('hide');

			container.block({message: null});

			$form[0]["resume_content"].value = resume_html;

			var token = $form.find($("#token")).val();

			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					messages_container.addClass(response.status);
					messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {
						if (response.status === "success") {
							$form[0].reset();
							container.unblock();
							window.location.replace("/resume");
						}
					});
				},
				error: function (response) {

					var msg;
					messages_container.addClass("error");
					container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
							$form.find('select[name="' + key + '[]"]').closest('div').find('.chosen-container').tooltipster('content', value);
							$form.find('select[name="' + key + '[]"]').closest('div').find('.chosen-container').tooltipster('show');                                                        
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente";
					}

					messages_container.html(msg).slideDown().delay(5000).slideUp();
				}
			});

		});

		$("div.form-company-job a.save-job").click(function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var $form = $(this).parents('form'),
				container = $(this).parents('div.form-company-job'),
				messages_container = $("#form-messages").html("").removeClass("success error");				

			$form.find('.tooltipstered').tooltipster('hide');

			container.block({message: null});
			
			var description_html = $('textarea[name=description]').sceditor('instance').val();
			if( $('textarea[name=profile_detail]').length ) {
				var profile_detail_html = $('textarea[name=profile_detail]').sceditor('instance').val();
				$form[0]["profile_detail"].value = profile_detail_html;
			}			

			$form[0]["description"].value = description_html;

			var token = $form.find($("#token")).val();

			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					messages_container.addClass(response.status);
					messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {
						if (response.status === "success") {
							$form[0].reset();
							container.unblock();
							window.location.replace("/jobs/manage");
						}
					});
				},
				error: function (response) {

					var msg;
					messages_container.addClass("error");
					container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
                                                
						$.each(errors, function (key, value) {
                                                   
							$form.find('input[name="' + key + '"]').tooltipster('content', value);
							$form.find('input[name="' + key + '"]').tooltipster('show');
							$form.find('select[name="' + key + '"]').closest('div').find('.chosen-container').tooltipster('content', value);
							$form.find('select[name="' + key + '"]').closest('div').find('.chosen-container').tooltipster('show');
							                                             
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente";
					}

					messages_container.html(msg).slideDown().delay(5000).slideUp();
				}
			});

		});

		$("div.form-company-edit a.save").click(function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();

			var profile_detail_html = $('textarea[name=profile_detail]').sceditor('instance').val();

			var $form = $(this).parents('form'),
				$container = $form.find("div.form-container"),
				$messages_container = $form.find("div.form-messages").html("").removeClass("success error");


			$form.find('.tooltipstered').tooltipster('hide');

			$container.block({message: null});

			$form[0]["profile_detail"].value = profile_detail_html;

			var token = $form.find($("#token")).val();

			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'POST',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					$messages_container.addClass(response.status);
					$messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {
						if (response.status === "success") {
							$form[0].reset();
							$container.unblock();
							window.location.replace("/company/profile");
						}
					});
				},
				error: function (response) {

					var msg;
					$messages_container.addClass("error");
					$container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find('input[name="' + key + '"]').tooltipster('content', value);
							$form.find('input[name="' + key + '"]').tooltipster('show');
                                                        $form.find('select[name="' + key + '"]').closest('div').find('.chosen-container').tooltipster('content', value);
							$form.find('select[name="' + key + '"]').closest('div').find('.chosen-container').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente";
					}

					$messages_container.html(msg).slideDown().delay(5000).slideUp();
				}
			});

		});
		
		$("form.search-jobsd").on('submit', function (e) {

			// prevent native submit
			e.preventDefault(),
			e.stopImmediatePropagation();
			
			var $form = $(this),
				$container = $form.find("div.form-container"),
				$messages_container = $form.find("div.form-messages").html("").removeClass("success error");

			$form.find('.tooltipstered').tooltipster('hide');

			var token = $form.find($("#token")).val();

			$container.block({message: null});

			// submit the form
			$.ajax({
				url: $form.attr("action"),
				headers: {'X-CSRF-TOKEN': token},
				data: new FormData($form[0]),
				type: 'GET',
				mimeType: "multipart/form-data",
				contentType: false,
				cache: false,
				processData: false,
				dataType: 'json',
				success: function (response) {
					//$messages_container.addClass(response.status);
					console.log(response.data);
					$('#jobs-list').empty().append($(response.data));
					/*$messages_container.html(response.message).slideDown().delay(3000).slideUp(1000, function () {						
						$container.unblock();
						if (response.status === "success") {
							$form[0].reset();
							console.log(response.data);
						}
					});*/

				},
				error: function (response) {
					var msg;
					$messages_container.addClass("error");
					$container.unblock();

					if (response.status === 422) {
						var errors = response.responseJSON;
						$.each(errors, function (key, value) {
							$form.find(':input[name="' + key + '"]').tooltipster('content', value);
							$form.find(':input[name="' + key + '"]').tooltipster('show');
						});
						msg = "Revise los campos con error";
					} else {
						msg = "Ha ocurrido un error inesperado, por favor, inténtelo nuevamente"
					}

					$messages_container.html(msg).slideDown().delay(5000).slideUp();

				}
			});
			
		});

		// ------------------ End Document ------------------ //
	});

	$(function () {
		$("input.candidate-photo:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.candidate-photo").html(fileName);
		});
	});

	$(function () {
		$("input.candidate-resume:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.candidate-resume").html(fileName);
		});
	});

	$(function () {
		$("input.company-logo:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.company-logo").html(fileName);
		});
	});

	$(function () {
		$("input.candidate-application-resume:file").change(function () {
			var file = $(this).val();
			var fileName = file.slice(12, file.length);
			$("span.candidate-application-resume").html(fileName);
		});
	});

	$(".date").each(function (index) {
		// You can get and set dates with moment objects
		var picker = new Pikaday(
				{
					field: $(this)[0],
					firstDay: 1,
					minDate: new Date(2000, 0, 1),
					maxDate: new Date(2020, 12, 31),
					yearRange: [2000, 2020],
					format: "DD/MM/YYYY",
					i18n: {
						previousMonth: 'Anterior Mes',
						nextMonth: 'Siguiente Mes',
						months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
						weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
						weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab']
					}
				});
	});

	$(function () {
		$("#applicationStatusFilter").change(function () {
			
			var $cbo = $(this),
				$form = $cbo.parents("form");
			
			$form.submit();
			
		});
	});

})(this.jQuery);

