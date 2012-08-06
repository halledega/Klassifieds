(function($) {
	$(function() {

		// set values for pyro.sort_tree (we'll use them below also)
		$item_list	= $('ul.category_list');
		$url		= 'admin/pages/order';
		$cookie		= 'open_pages';

		// store some common elements
		$details 	= $('div#category-details');
		$details_id	= $('div#category-details #category-id');

		// show the page details pane
		$("li a").click(function(event) {
                  //event.preventDefault();

                  //$id = $(this).attr('rel');
                  //$name = $(this).text();


                  //alert($name);

                });

	});
})(jQuery);