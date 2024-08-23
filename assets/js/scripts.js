jQuery(document).ready(function($) {
    // Function to fetch books via AJAX
    function fetchBooks() {
        $.ajax({
            url: books_ajax_obj.ajax_url, // AJAX handler
            type: 'POST',
            data: {
                action: 'get_books',
                security: books_ajax_obj.nonce, // Nonce security
            },
            success: function(response) {
                if (response) {
                    console.log(response); // Log the response to the console
                    // You can process the JSON response here, e.g., display the books in the DOM
                } else {
                    console.log('No books found.');
                }
            },
            error: function(error) {
                console.log('AJAX request failed:', error);
            }
        });
    }

    // Trigger the fetchBooks function on page load or any event
    fetchBooks();
});
