(function( $, elementor ){

	"use strict";

	var CustWidget = {

		init: function() {
			var widgets = {
    			'custom-post-layout.default' : CustWidget.owlInit,
    			'tt-testimonials.default' : CustWidget.testiSlider,
    		};
    		$.each( widgets, function( widget, callback ) {
    			window.elementorFrontend.hooks.addAction( 'frontend/element_ready/' + widget, callback );
    		});
		},

		owlInit: function( $scope ){
			var $carousels_collection = $('.owl-carousel', $scope);
			if( $carousels_collection.length && 'function' == typeof $.fn.owlCarousel ){
				$carousels_collection.each( function(el, index){
					var $this = $(this),
							$options = $this.data('owl-options'),
							$defaults = {
								loop:true,
								margin:20,
								nav:true,
								responsive:{
									0:{
										items:1
									},
									767:{
										items:2
									},
									1025:{
										items:3
									}
								}
							};
						$options = $.extend({}, $defaults, $options);
					$this.owlCarousel($options);
				});
			}
		},
		testiSlider: function( $scope ){
			var $carousels_collection = $('.tt-testimonials', $scope);
			if( $carousels_collection.length && 'function' == typeof $.fn.owlCarousel ){
				$carousels_collection.each( function(el, index){
					var $this = $(this),
							$options = $this.data('testimonials-options'),
							$defaults = {
								loop:true,
								margin:20,
								nav:true,
								responsive:{
									0:{
										items:1
									},
									767:{
										items:2
									},
									1025:{
										items:3
									}
								}
							};
						$options = $.extend({}, $defaults, $options);
					$this.owlCarousel($options);
				});
			}
		},
	};

	$( window ).on( 'elementor/frontend/init', CustWidget.init );

}(jQuery, window.elementorFrontend ) );