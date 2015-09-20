jQuery(document).ready(function($) {
    // Set up the radio images customizer control
    var radioImagesInterval = setInterval(function() {
        clearInterval(radioImagesInterval);
        var imagesObj = $('.customize-control-radio-images .buttonset');
        if(imagesObj.length > 0) {
            // Use buttonset() for radio images created by CiCustomizeImagePickerControl
            imagesObj.buttonset();

            // Handles setting the new value in the customizer.
            $('.customize-control-radio-images input:radio').change(function() {
                var settingName = $(this).attr('data-customize-setting-link');
                var newlySelectedImage = $(this).val();
                console.log(settingName);
                console.log(newlySelectedImage);
                wp.customize(settingName, function(obj) {
                    obj.set(newlySelectedImage);
                });
            });
        }
    }, 2.5 * 1000);

    // Set up the multicheck (multiple checkbox selector) control
    var multicheckInterval = setInterval(function() {
        $('.customize-control-checkbox-multiple input[type="checkbox"]').on('change', function() {
            var checkbox_values = $(this).parents('.customize-control')
                .find('input[type="checkbox"]:checked')
                .map(function() { return this.value; })
                .get()
                .join(',');

            $(this).parents('.customize-control').find('input[type="hidden"]').val(checkbox_values).trigger('change');
            clearInterval(multicheckInterval);
        });
    }, 2.5 * 1000);

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

