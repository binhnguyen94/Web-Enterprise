jQuery(document).ready(function($){
    jQuery('ul.sf-menu').superfish({
      pathClass:  'current'
    });

/* ------------------------------------------------- */
$(function(){
		$('#slideShow').slides({
		preload: true,
		preloadImage: 'Image/loader.gif',
		play: 2000,
		pause: 2000,
		hoverPause: true
		});
	}); 

/* ------------------------------------------------- */
		$('a.tab').click(function(){
			$('.activetab').removeClass('activetab');
			$(this).addClass('activetab');
			$('.contenttab').slideUp();
			var content_show=$(this).attr('title');
			$('#'+content_show).slideDown();
		});
/* ------------------------------------------------- */
			$('.thumbs_list img').click(function(){
			var img_show=$(this).attr('src');
			$('.full_img img').attr('src',img_show);
		});
/* ---------------------------------------------------- */
		$(function() {
					$('ul#thumbs_list_derail').carouFredSel({
						items               :2,
						auto: true,
						prev: "#Previous_thumbs",
						next: "#Next_thumbs",
						scroll : {
						items           :2,
						effect          : "easeOutBounce",
						duration        :600,
						pauseOnHover    : true
						}
					});
				});
});


 
