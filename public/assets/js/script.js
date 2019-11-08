(function($){
	
	$(document).ready(function(e) {
		
		// create timer variable
		var $timer;

		// listen changes of filters inputs
		$(document).on("input paste", "#filters_form input", function(e) {

			// clear timeout
			clearTimeout($timer);

			var $cur_element = $(this);

			// create timer for call function of getting books
            // wait on delay in user typing
			$timer = setTimeout(function(){
				getFilteredBooks($cur_element);				
			}, 500);
		});

	});

	// getting books function
	function getFilteredBooks(element) {
		// get current form element
		var $form = element.closest("form");

		// ajax call to server to get books		
		$.ajax({
			// set ajax parameters from form element attributes
			url:  $form.attr("action"),
			type: $form.attr("method"), 
			data: $form.serialize(),
			success: function(data){
				// replace books catalogue with received data
				$("#books_catalogue").html(data);
			}, 
			error: function(data){

			}
		});
	}

})(jQuery);