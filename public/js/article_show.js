$(document).ready(function() {
    $('.js-like-article').on('click', function(e) { // Find the "js-like-article" element and on click, call this function
        e.preventDefault();

        var $link = $(e.currentTarget); // this is the link that was just clicked
        $link.toggleClass('fa-heart-o').toggleClass('fa-heart');  // Toggling the heart icon between empty and full

        $.ajax({ // Making an ajax request to the href link that is in the same <a> tag as the "js-like-article" class
            method: 'POST', // Making it a POST request
            url: $link.attr('href') // Point to the href link attribute, which will be the route name that executes a controller method
        }).done(function(data) { // Creating a callback with a data argument. The data will be whatever our API endpoint sends back (the executed controller method)
            $('.js-like-article-count').html(data.hearts);
        })
    });
});