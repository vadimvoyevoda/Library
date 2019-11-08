(function($) {
    // this variable is the list in the dom, it's initiliazed when the document is ready
    var $collectionHolder; 

    // translation row container selector
    var $translationRowClass = "translation-row";
    // translation row mockup selector
    var $translationContainerMockupClass = "translation-row-mockup";

    // get translation container mockup
    var $translationContainerMockup = $('.mockups').find("." + $translationContainerMockupClass);  
    // get remove translation btn mockup 
    // which we click on to remove current translation
    var $removeTranslationBtnMockup = $('.mockups .remove_translation_btn');

    $(document).ready(function(e) {

        // check if translations list exist
        if ($('#translations_list_container').length){
            // get the collectionHolder, initilize the var by getting the list;
            $collectionHolder = $('#translations_list_container');
            // add an index property to the collectionHolder which helps track the count of forms we have in the list
            $collectionHolder.data('index', $collectionHolder.find('.translation-row').length);
            // add remove button to all founded translations rows in the list 
            $collectionHolder.find("." + $translationRowClass).each(function() {
                addRemoveButton($(this));
            });

            // handle the click event for add new translation btn
            $(document).on("click", ".add_translation_btn", function(e) {
                e.preventDefault();
                // create a new translation form and append it to the collectionHolder
                addNewForm();
            });

            // handle the click event for remove translation btn
            $(document).on("click", ".remove_translation_btn", function(e) {
                e.preventDefault();
                // gets the parent of the button that we clicked and remove it
                $(e.target).parents("." + $translationRowClass).remove();
            });
        }

        // handle the click event for delete (author, book...) btn
        $(document).on("click", ".btn-delete", function(e) {
            e.preventDefault();

            $deletable_item_name = getDeletableItemTitle($(this));

            // check if exist confirmation delete Modal
            if ($("#deleteModal").length) {
                // set deletable item name/title to modal
                $("#deleteModal .delete_item_name").text($deletable_item_name);
                // set confirmation link from current delete item
                $("#deleteModal .confirm-delete").attr("href", $(this).attr("href"));
                // show confirmation delete Modal
                $("#deleteModal").modal();
            }
        });
        
    });

    // add new translation form to book function
    function addNewForm() {
        // getting the prototype
        // the prototype is the form itself, plain html
        var prototype = $collectionHolder.data('prototype');
        // get the index
        // this is the index we set when the document was ready, look above for more info
        var index = $collectionHolder.data('index');
        // create the form
        var newForm = prototype;
        // replace the __name__ string in the html using a regular expression with the index value
        newForm = newForm.replace(/__name__/g, index);
        // incrementing the index data and setting it again to the collectionHolder
        $collectionHolder.data('index', ++index);
        
        // create container for new translation row by cloning mockup
        $newTranslationContainer = $translationContainerMockup.clone();
        $newTranslationContainer.find(".row-content").append(newForm);
        $newTranslationContainer.removeClass($translationContainerMockupClass).addClass($translationRowClass);
        // append the removebutton to the new translation form
        addRemoveButton($newTranslationContainer);

        // append new translation form into translations list
        $collectionHolder.find(".list").append($newTranslationContainer);
    }

    // add remove btn to translation row
    function addRemoveButton($translationRow) {      
        // append remove btn to new translation row
        $translationRow.append($removeTranslationBtnMockup.clone());
    }

    // get item title by deletable element
    function getDeletableItemTitle($element){
        // get the parent table row for current delete btn
        var $row = $element.closest("tr");
        // variable for name/title of deletable item
        var $deletable_item_title = "";

        // checking deletable item type
        if ($element.hasClass('delete-author')) {
            // set author full name as deletable item name/title
            $deletable_item_title = $row.find(".name").text() + " " + $row.find(".last_name").text();
        } else if ($element.hasClass('delete-book')) {
            // set book title as deletable item name/title
            $deletable_item_title = $row.find(".title").text();
        }

        return $deletable_item_title;
    }

})(jQuery);