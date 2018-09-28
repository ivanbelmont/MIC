    <link rel="stylesheet" href="<?php echo BASE_PATH_ASSETS; ?>css/jquery-ui.custom.min.css" />
<div id="mensajes"></div>
<span id="resultado"></span><br>
<div id="mensajemodal"></div>
<div id="procesando"></div>


	<div class="space-2"></div>
	<!-- Correo -->
<div id="formpoliza"></div>
		<div class="space-10"></div>
	<button id="Ym90b25wYXJhaWRlbnRpZmljYXJjbGllbnRlZWRpdGFy" value="cHJvY2Vzb3BhcmFlZGl0YXJjbGllbnRl" class="btn btn-info">
	<i class="ace-icon fa fa-file-text align-top bigger-125"></i>
	Agregar Poliza
	</button>


		<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.2.1.1.min.js"></script>
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/mic.proces.ajax.js"></script>
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo BASE_PATH_ASSETS; ?>js/jquery.ui.touch-punch.min.js"></script>


				<script type="text/javascript">
			jQuery(function($) {
			
				
			
				// scrollables
				$('.scrollable').each(function () {
					var $this = $(this);
					$(this).ace_scroll({
						size: $this.attr('data-size') || 100,
						//styleClass: 'scroll-left scroll-margin scroll-thin scroll-dark scroll-light no-track scroll-visible'
					});
				});
				$('.scrollable-horizontal').each(function () {
					var $this = $(this);
					$(this).ace_scroll(
					  {
						horizontal: true,
						styleClass: 'scroll-top',//show the scrollbars on top(default is bottom)
						size: $this.attr('data-size') || 500,
						mouseWheelLock: true
					  }
					).css({'padding-top': 12});
				});
				
				$(window).on('resize.scroll_reset', function() {
					$('.scrollable-horizontal').ace_scroll('reset');
				});
			
				
				$('#id-checkbox-vertical').prop('checked', false).on('click', function() {
					$('#widget-toolbox-1').toggleClass('toolbox-vertical')
					.find('.btn-group').toggleClass('btn-group-vertical')
					.filter(':first').toggleClass('hidden')
					.parent().toggleClass('btn-toolbar')
				});
			
				
			    $('.widget-container-col').sortable({
			        connectWith: '.widget-container-col',
					items:'> .widget-box',
					handle: ace.vars['touch'] ? '.widget-header' : false,
					cancel: '.fullscreen',
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'widget-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					start: function(event, ui) {
						//when an element is moved, it's parent becomes empty with almost zero height.
						//we set a min-height for it to be large enough so that later we can easily drop elements back onto it
						ui.item.parent().css({'min-height':ui.item.height()})
						//ui.sender.css({'min-height':ui.item.height() , 'background-color' : '#F5F5F5'})
					},
					update: function(event, ui) {
						ui.item.parent({'min-height':''})
						//p.style.removeProperty('background-color');
					}
			    });
				
			
			
			});
		</script>