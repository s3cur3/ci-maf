jQuery(document).ready(function($) {
    console.log("Customizer.js");

    /////////////////////////////////////////////////////////////////////////////////
    // ALERT! This isn't being used currently!!!!
    /////////////////////////////////////////////////////////////////////////////////
    var initializedEditors = [];

    // Note: The TinyMCE editors aren't ready when the document is (they're loaded asynchronously)
    // Thus, we'll try to initialize them as they're loaded (on an interval)
    setInterval(function() {
        $('.wp-customizer textarea.wp-editor-area').each(function() {
            var editorObj = $(this);
            var editorId = editorObj.attr('id');
            if(initializedEditors.indexOf(editorId) < 0) {
                initializedEditors.push(editorId);
                editorObj.attr('data-customize-setting-link', editorId);
                setTimeout(function() {
                    var editor = tinyMCE.get(editorId);
                    if(editor) {
                        console.log("Clearing interval");

                        editor.onChange.add(function(ed, e) {
                            console.log("Changed");
                            // Update HTML view textarea (that is the one used to send the data to server).
                            ed.save();
                            editorObj.trigger('change');
                        });
                    }
                }, 1000);
            }
        });
    }, 2.5 * 1000);
});

