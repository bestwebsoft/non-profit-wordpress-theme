( function ( $ ) {
	$( document ).ready( function() {
		/*
		*portfolio style 
		*/
		if ( $( 'body' ).hasClass( 'single-portfolio' ) || $( 'body' ).hasClass( 'page-template-gallery-template-php' ) || $( 'body' ).hasClass( 'single-gallery' )|| $( 'body' ).hasClass( 'tax-portfolio_technologies') ) {
 			$( this ).find( ".content-area" ).wrapAll( "<div class='nonprofit-bws-content'></div>" );
 			$( this ).find( "div.nonprofit-bws-content,aside" ).wrapAll( '<div id="nonprofit_container"></div>' );
 			$( '.nonprofit-bws-content' ).append( '<div class="nonprofit-border-bottom"></div>' );
 			$( '#comments' ).appendTo( 'div.nonprofit-bws-content' );
		}
		if  ( $( 'body' ).hasClass( 'page-template-portfolio-php' ) ) {
			$( this ).find( ".content-area" ).wrapAll( "<div class='nonprofit-bws-content'></div>" );
			$( this ).find( "div.nonprofit-bws-content,aside" ).wrapAll( '<div id="nonprofit_container"></div>' );
			$( this ).find( "div.portfolio_content" ).wrap( "<div class='nonprofit-post'></div>" );
			$( '.nonprofit-post' ).after( '<div class="nonprofit-border-bottom"></div>' );
		}
		/* 
		*Slider
		*/
		$( '.flexslider' ).flexslider( { /*initial slider*/
			animation: "fade",
			directionNav: false,
		});
		/* 
		* Checkbox.
		*/
		$( "input[type='checkbox']" ).wrap( '<label class="nonprofit-check-container"><div class="nonprofit-check"></div></label>' );	
		// active Realization
		$( '.nonprofit-check' ).click( function () {			
			if ( $( this ).find( "input[type='checkbox']" ).is( ':checked' ) ) {
				$( this ).addClass( 'nonprofit-active' );
			}
			else if ( !($( this ).find( "input[type='checkbox']" ).is( ':checked' ))){
				$( this ).removeClass( 'nonprofit-active' );
			}
		});	
		$( '.nonprofit-check' ).hover( function() {
		/*  hover realization */
			$( this ).toggleClass( 'nonprofit-hover' ) 
		});
		

		/*
		* Radio buttons.
		*/
		$( "input[type='radio']" ).wrap( '<div class="nonprofit-radio"></div>' );
		/* hover realization */
		$( '.nonprofit-radio' ).mouseenter( function() {
			$( this ).addClass( 'nonprofit-hover' );
		});
			$( '.nonprofit-radio' ).mouseleave( function() {
			$( this ).removeClass( 'nonprofit-hover' );
		});
		 /* active Realization */
		$( '.nonprofit-radio' ).click( function () {
			$( '.nonprofit-radio' ).removeClass( 'nonprofit-active' );
			if ( $( this ).find( 'input' ).is( 'checked' ) ) {
				$( this ).find( 'input' ).removeattr( 'checked', false );
		}
			else {
				$( this ).addClass( 'nonprofit-active' );
				$( this ).find( 'input' ).attr( 'checked', true );
		}
		});
		
		/*
		* Select section restyle
		*/
		var test = $( 'select' ).size();
		for ( var k = 0; k < test; k++ ) {
			$( 'select' ).eq( k ).attr('style', 'display: none !important');
			$( 'select' ).eq( k ).after( CreateSelect( k ) );		
		}
		$( '.nonprofit-select' ).click( function() {
			if ( $( this ).find( '.select-options' ).css( 'display' ) == 'none' ) {
				$( this ).css( 'z-index', '100' );
				$( this ).find( '.select-options' ).css( {
					'display': 'block'
				});
			} else {
				$( this ).css( 'z-index', '10' );
				$( this ).find( '.select-options' ).css( {
					'display': 'none'
				});
			}
		});
		$( '.nonprofit-select' ).find( '.select-option' ).click( function() {
			$( this ).closest( '.select-options' ).find( '.select-option' ).removeClass( 'nonprofit-option-selected' );
			$( this ).addClass( 'nonprofit-option-selected' )
			/*  write text to active opt */
			$( this ).parent().parent().find( '.select-active-option' ).find( 'div:first' ).text( $( this ).text() );
			/* remove active option from init select */
			$( this ).parent().parent().prev( 'select' ).find( 'option' ).removeAttr( 'selected' );
			/* add atrr selected to select	 */
			$( this ).parent().parent().prev( 'select' ).find( 'option' ).eq( ( $( this ).attr( 'name' ) ) ).attr( 'selected', 'selected' );
		});
		/* archive-dropdown widget functional */
		$( "select[name='archive-dropdown']" ).next( '.nonprofit-select' ).find( '.select-option' ).click( function() {
			location.href = $( this ).attr( 'value' );
		});
		$( "select[name='mltlngg_change_display_lang']" ).next( '.nonprofit-select' ).find( '.select-option' ).click( function() {
			location.href = $( this ).attr( 'value' );
		});				
		/* category-dropdown widget functional */
		$( '#cat' ).next( '.nonprofit-select' ).find( '.select-option' ).click( function() {
			location.href = script_loc.nonprofit_home_url + '?cat=' + $( this ).attr( 'value' );
		});		
		/*
		*Clear button.
		*/
		$( "input[type='reset']" ).click( function() {
			/* reset checkboxes, radio, input:file */
			$( '.nonprofit-check,.nonprofit-radio' ).removeClass( 'nonprofit-active' );
			$( '.file-validator' ).text( 'File is not selected.' );
		});
		/*
		*Function style for input [type="file"] 
		*/
		$( "input[type='file']" ).css( {opacity: 0} ).wrap( '<div class="wrap-file"></div>' );
		$( "input[type='file']" ).hide();
		$( '.wrap-file' ).append( '<div class="style-file"></div>' );
		$( '.style-file' ).wrap( '<div class="file-form"></div>' );
		$( '.style-file' ).append( '<span class="file-inner">Choose file...</span>' );
		$( '.file-form' ).append( '<span class="file-validator">File is not selected.</span>' );
		$( "input[type='file']" ).change( function() { 
			$( '.file-validator' ).text( $( this ) [0].value );
			});
		$( '.file-validator' ).click( function() {
			$( '.wrap-file input' ).trigger( 'click' );
			});
		$( '.style-file' ).click( function() {
			$( '.wrap-file input' ).trigger( 'click' );
		});
		/* Check of previous selected items */
		$( 'select' ).each( function() {
			var index = $( this ).find( "option[selected]" ).index();
			if ( index >= 0 ) {
				/* add attr selected to select */
				var selected_select = $( this ).find( "option[selected]" );
				/* write text to active option */
				$( selected_select ).parent().next().find( 'div:first' ).find( 'div:first' ).text( selected_select.text() );
			}
		});
		/* Clear select elements */
		$( 'input:reset' ).click( function() {
			/* Clear original selects. */
			$( 'select' ).each(  function() {
				/* clear active option */
				$( this ).find( "option[selected]" ).removeAttr( 'selected' );
				$( this ).find( "option:first" ).attr( 'selected', 'selected' );
			});
			/* Clear custom selects. */
			$( '.select-active-option' ).each( function() {
				/* set path */
				var clear_select = $( this ).parent().prev().find( "option:first" );
				/* clear active option */
				$( this ).find( "div:first" ).text( clear_select.text() );
				$( this ).find( ".select-options" ).find( ".nonprofit-option-selected" ).removeClass( 'nonprofit-option-selected' );
			} );
		} );
		/* Dropdown menu for fone and PC */
		var nonprofit = $( '.nonprofit-nav' ),
	    timeout = false;
		$.fn.smallMenu = function() {
			nonprofit.find( '.site-navigation' ).removeClass( 'main-navigation' ).addClass( 'main-small-navigation' );
			nonprofit.find( '.site-navigation h1' ).removeClass( 'nonprofit-assistive-text' ).addClass( 'menu-toggle' );
			$( '.menu-toggle' ).unbind( 'click' ).click( function() {
				nonprofit.find( '.menu' ).toggle();
				$( this ).toggleClass( 'toggled-on' );
				} );		
			};
		$.fn.clickMenu = function() {
			$( '.main-navigation' ).find( 'a' ).on( 'touchstart touchmove touchend click', function( event ) {			
				var el = $( this ).parent( 'li' );
				var display = el.children( ".sub-menu:first" ).css( "display" )			
				if ( !el.hasClass( 'focus' ) ) {
					if( display =="block" ) {
						event.stopPropagation();
						event.preventDefault();
						el.toggleClass( 'focus' );
						el.siblings( '.focus' ).removeClass( 'focus' );
					}
				}
			} );
		}
			
		/* Check viewport width on first load. */
		if ( $( window ).width() <= 790 )
			$.fn.smallMenu();
		/* Check brouser. */
		if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
			$.fn.clickMenu();
		}
		/* Check viewport width when user resizes the browser window. */
		$( window ).resize( function() {
			var browserWidth = $( window ).width();
			if ( false !== timeout ) {
				clearTimeout( timeout );
			}	
			timeout = setTimeout( function() {
				if ( browserWidth <= 790 ) {
					$.fn.smallMenu();
				} 
				else {
					nonprofit.find( '.site-navigation' ).removeClass( 'main-small-navigation' ).addClass( 'main-navigation' );
					nonprofit.find( '.site-navigation h1' ).removeClass( 'menu-toggle' ).addClass( 'nonprofit-assistive-text' );
					nonprofit.find( '.menu' ).removeAttr( 'style' );
				}
			}, 200 );
		} );			
	});
} )( jQuery );
/* function for custom select */
function CreateSelect( k ) {
/* create select division */
	var select = document.createElement( 'div' );
	( function( $ ) {
		$( select ).addClass( 'nonprofit-select' );
		// create active-option division
		var active_option = document.createElement( 'div' );
		$( active_option ).addClass( 'select-active-option' );
		$( active_option ).append( '<div></div>' );
		$( active_option ).append( '<div class="select-button"></div>' );
		$( active_option ).append( '<div class="clear" style="clear:both"></div>' );
		$( active_option ).find( 'div:first' ).text( $( 'select' ).eq( k ).find( 'option' ).first().text() );
		// create options division
		var option_array = document.createElement( 'div' );
		$( option_array ).addClass( 'select-options' );
		// create array of optgroups
		var count = $( 'select' ).eq( k ).find( 'optgroup' ).size();
		var optgroups = [];
		// create options division
		if ( count ) {
			var z = 0;
			for ( var i = 0; i < count; i++ ) {
				optgroups[i] = document.createElement( 'div' );
				$( optgroups[i] ).addClass( 'select-optgroup' );
				$( optgroups[i] )
					.text( $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).attr( 'label' ) );
			};
			for ( var i = 0; i < count; i++ ) {
				$( option_array ).append( optgroups[i] );
				for ( var j = 0; j < $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).children().size(); j++ ) {
					var option = document.createElement( 'div' );
					$( option ).addClass( 'select-option' );
					$( option ).attr( 'value', $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).children().eq( j ).attr( 'value' ) );
					$( option ).text( $( 'select' ).eq( k ).find( 'optgroup' ).eq( i ).children().eq( j ).text() );
					$( option ).attr( 'name', z );
					z++;
					$( option_array ).append( option );
				};
			};
		} else {
			for ( var i = 0; i < $( 'select' ).eq( k ).find( 'option' ).size(); i++ ) {
				var option = document.createElement( 'div' );
				$( option ).addClass( 'select-option' );
				$( option ).attr( 'value', $( 'select' ).eq( k ).find( 'option' ).eq( i ).attr( 'value' ) );
				$( option ).attr( 'name', i );
				$( option ).text( $( 'select' ).eq( k ).find( 'option' ).eq( i ).text() );
				$( option_array ).append( option );
			};
		};
		$( select ).append( active_option );
		$( select ).append( option_array );
	} )( jQuery );
return select;
}
/*function for hide init input:file and add after a new input:file*/
function createInputAttr() {
	( function ( $ ) {
		var size = $( 'input:file' ).size();
		for ( var i = 0; i < size; i++ ) {
			$( 'input:file' ).eq( i ).attr( 'id', 'file-' + i ).css( 'display', 'none' ).after( CreateFileInput( i ) );
		};
	} )( jQuery );
}
