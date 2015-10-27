
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

    $(document).ready(showOrHideSocialMedia);
    $(window).resize(showOrHideSocialMedia);
})(jQuery);


