
(function($) {
    "use strict";

    // Turn on the Bootstrap dropdowns
    $(".dropdown-toggle").dropdown();

    // Make sure the header doesn't get smashed up with the menu and social media buttons overlapping
    function showOrHideSocialMedia() {
        var socialBox = $(".post-nav");
        if(socialBox.length) {
            socialBox.show();
            var menuBounds = $(".navbar-nav")[0].getBoundingClientRect();
            var socialBounds = socialBox[0].getBoundingClientRect();
            var areOverlapping = menuBounds.width >= 1 &&
                socialBounds.left < menuBounds.right &&
                socialBounds.top < menuBounds.bottom;
            if(areOverlapping) {
                socialBox.hide();
            } else {
                socialBox.show();
            }
        }
    }

    function enablePrettyPhoto() {
        // first, we add the rel="prettyPhoto[page_id]" to image galleries (since they aren't handled by our PHP regex)
        $(".gallery a.thumbnail").attr('rel', 'prettyPhoto[' + parseInt(post_id, 10) + ']');
        $("a[rel^='prettyPhoto']").prettyPhoto();
    }

    $(document).ready(showOrHideSocialMedia);
    $(document).ready(enablePrettyPhoto);
    $(window).resize(showOrHideSocialMedia);
})(jQuery);


