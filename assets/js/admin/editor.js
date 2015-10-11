// TinyMCE plugin
(function() {
    var actionsAlreadyBound = {};

    /**
     * @param gridWidth {int} The width of this div, in terms of the Bootstrap grid. E.g., a full-width column would be 12.
     * @returns {string} A div with the appropriate class applied (and some dummy text to fill it).
     */
    function getDiv( gridWidth ) {
        var name = "";
        gridWidth = parseInt(gridWidth);
        if( gridWidth > 12 || gridWidth < 1 ) {
            return "ERROR!"
        }
        switch( gridWidth ) {
            case 1: name = "one-twelfth"; break;
            case 2: name = "one-sixth"; break;
            case 3: name = "one-quarter"; break;
            case 4: name = "one-third"; break;
            case 5: name = "five-twelfths"; break;
            case 6: name = "one-half"; break;
            case 7: name = "seven-twelfths"; break;
            case 8: name = "two-thirds"; break;
            case 9: name = "three-quarters"; break;
            case 10: name = "five-sixths"; break;
            case 11: name = "eleven-twelfths"; break;
            case 12: name = "full-width"; break;
        }
        return '<div class="col-sm-' + gridWidth + '"><p>This is a ' + name + ' width block.</p></div>';
    }

    tinymce.create('tinymce.plugins.Editor', {
        /**
         * Initializes the plugin, this will be executed after the plugin has been created.
         * This call is done before the editor instance has finished it's initialization so use the onInit event
         * of the editor instance to intercept that event.
         *
         * @param {tinymce.Editor} editor Editor instance that the plugin is initialized in.
         * @param {string} url Absolute URL to where the plugin is located.
         */
        init : function(editor, url) {
            function addBtn( command, desc, imgName ) {
                editor.addButton( command, {
                    title : desc,
                    cmd : command,
                    image : url + '/../../img/admin/' + imgName + '.png'
                });
            }
            addBtn('columns', 'Make columns', 'threecolumns');
            addBtn('columns_adv', 'Advanced layout creator', 'column-complex');
            addBtn('coloredband', 'Insert a color band', 'coloredband');
            addBtn('cta', 'Insert a call-to-action button', 'cta');
            addBtn('staff', 'Insert staff member profiles', 'attorney');
            addBtn('practicearea', 'Insert practice areas', 'practicearea');
            addBtn('carousel', 'Insert an image slider', 'photo');

            editor.addCommand('columns', function () {
                var pluginObj = {
                    'id': "columns_basic",
                    'title': "Basic Column Layout"
                };
                var modal = jQuery("#" + pluginObj.id);
                if(!modal.length) {
                    modal = ciInsertModal(pluginObj,
                        '<div id="halves">\
                            <div class="show-grid">\
                                <div class="half">1/2</div>\
                                <div class="half">1/2</div>\
                            </div>\
                            <button id="insert-2-col" type="button" class="btn btn-primary">2 columns</button>\
                            <div class="show-grid">\
                                <div class="one-third">1/3</div>\
                                <div class="one-third">1/3</div>\
                                <div class="one-third">1/3</div>\
                            </div>\
                            <button id="insert-3-col" type="button" class="btn btn-primary">3 columns</button>\
                            <div class="show-grid">\
                                <div class="one-quarter">1/4</div>\
                                <div class="one-quarter">1/4</div>\
                                <div class="one-quarter">1/4</div>\
                                <div class="one-quarter">1/4</div>\
                            </div>\
                            <button id="insert-4-col" type="button" class="btn btn-primary">4 columns</button>\
                            <div class="show-grid">\
                                <div class="one-sixth">1/6</div>\
                                <div class="one-sixth">1/6</div>\
                                <div class="one-sixth">1/6</div>\
                                <div class="one-sixth">1/6</div>\
                                <div class="one-sixth">1/6</div>\
                                <div class="one-sixth">1/6</div>\
                            </div>\
                            <button id="insert-6-col" type="button" class="btn btn-primary">6 columns</button>\
                        </div>');
                }

                modal = jQuery("#" + pluginObj.id);
                modal.modal('show');

                if(!actionsAlreadyBound[pluginObj.id]) { // this prevents re-binding the functions if you close & re-open the modal
                    var pre = '<p>&nbsp;</p><div class="row mt30 mb30">';
                    var post = '</div><p>&nbsp;</p>';
                    modal.find("#insert-2-col").click(function(){
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(6) + getDiv(6) + post);
                    });
                    modal.find("#insert-3-col").click(function(){
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(4) + getDiv(4) + getDiv(4) + post);
                    });
                    modal.find("#insert-4-col").click(function(){
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(3) + getDiv(3) + getDiv(3) + getDiv(3) + post);
                    });
                    modal.find("#insert-6-col").click(function(){
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(2) + getDiv(2) + getDiv(2) + getDiv(2) + getDiv(2) + getDiv(2) + post);
                    });
                    actionsAlreadyBound[pluginObj.id] = true;
                }
            });

            editor.addCommand('columns_adv', function() {
                var pluginObj = {
                    'id': "columns_adv",
                    'title': "Advanced Layout Creator"
                };

                var modal = jQuery("#" + pluginObj.id);
                if( !modal.length ) {
                    modal = ciInsertModal(pluginObj,
                        '<ul class="nav nav-tabs">\
                            <li class="active"><a href="#halves" data-toggle="tab">Halves</a></li>\
                            <li><a href="#thirds" data-toggle="tab">Thirds</a></li>\
                            <li><a href="#quarters" data-toggle="tab">Quarters</a></li>\
                        </ul>\
                        <!-- Tab panes -->\
                        <div class="tab-content">\
                            <div class="tab-pane active" id="halves">\
                                <div class="show-grid">\
                                    <div class="half">1/2</div>\
                                    <div class="half">1/2</div>\
                                </div>\
                                <button id="12-12" type="button" class="btn btn-primary">Insert 1/2 | 1/2 split</button>\
                            </div>\
                            <div class="tab-pane" id="thirds">\
                                <div class="show-grid">\
                                    <div class="two-thirds">2/3</div>\
                                    <div class="one-third">1/3</div>\
                                </div>\
                                <button id="23-13" type="button" class="btn btn-primary">Insert 2/3 | 1/3 split</button>\
                                <div class="show-grid">\
                                    <div class="one-third">1/3</div>\
                                    <div class="two-thirds">2/3</div>\
                                </div>\
                                <button id="13-23" type="button" class="btn btn-primary">Insert 1/3 | 2/3 split</button>\
                                <div class="show-grid">\
                                    <div class="one-third">1/3</div>\
                                    <div class="one-third">1/3</div>\
                                    <div class="one-third">1/3</div>\
                                </div>\
                                <button id="13-13-13" type="button" class="btn btn-primary">Insert 1/3 | 1/3 | 1/3 split</button>\
                            </div>\
                            <div class="tab-pane" id="quarters">\
                                <div class="show-grid">\
                                    <div class="one-quarter">1/4</div>\
                                    <div class="three-quarters">3/4</div>\
                                </div>\
                                <button id="14-34" type="button" class="btn btn-primary">Insert 1/4 | 3/4 split</button>\
                                <div class="show-grid">\
                                    <div class="three-quarters">3/4</div>\
                                    <div class="one-quarter">1/4</div>\
                                </div>\
                                <button id="34-14" type="button" class="btn btn-primary">Insert 3/4 | 1/4 split</button>\
                                <div class="show-grid">\
                                    <div class="one-quarter">1/4</div>\
                                    <div class="one-half">1/2</div>\
                                    <div class="one-quarter">1/4</div>\
                                </div>\
                                <button id="14-12-14" type="button" class="btn btn-primary">Insert 1/4 | 1/2 | 1/4 split</button>\
                                <div class="show-grid">\
                                    <div class="one-quarter">1/4</div>\
                                    <div class="one-quarter">1/4</div>\
                                    <div class="one-quarter">1/4</div>\
                                    <div class="one-quarter">1/4</div>\
                                </div>\
                                <button id="14-14-14-14" type="button" class="btn btn-primary">Insert 1/4 | 1/4 | 1/4 | 1/4 split</button>\
                            </div>\
                        </div>');
                }

                modal = jQuery("#" + pluginObj.id);
                modal.modal('show');

                if(!actionsAlreadyBound[pluginObj.id]) { // this prevents re-binding the functions if you close & re-open the modal
                    var pre = '<p>&nbsp;</p><div class="row mt30 mb30">';
                    var post = '</div><p>&nbsp;</p>';
                    modal.find("#23-13").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(8) + getDiv(4) + post);
                    });
                    modal.find("#13-23").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(4) + getDiv(8) + post);
                    });
                    modal.find("#13-13-13").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(4) + getDiv(4) + getDiv(4) + post);
                    });

                    modal.find("#12-12").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(6) + getDiv(6) + post);
                    });
                    modal.find("#14-34").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(3) + getDiv(9) + post);
                    });
                    modal.find("#34-14").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(9) + getDiv(3) + post);
                    });
                    modal.find("#14-12-14").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(3) + getDiv(6) + getDiv(3) + post);
                    });
                    modal.find("#14-14-14-14").click(function() {
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + getDiv(3) + getDiv(3) + getDiv(3) + getDiv(3) + post);
                    });
                    actionsAlreadyBound[pluginObj.id] = true;
                }
            });

            editor.addCommand('coloredband', function() {
                var selected_text = editor.selection.getContent();
                if( selected_text.length == 0 ) {
                    selected_text = "This content is in a colored band.";
                }
                if( selected_text.indexOf("<h") === -1 ) { // no headings
                    selected_text = '<p>' + selected_text + '</p>';
                }
                var return_text = '<p>&nbsp;</p><div class="inverted jumbo-band no-pad">' + selected_text + '</div><p>&nbsp;</p>';
                editor.execCommand('mceInsertContent', 0, return_text);
            });

            editor.addCommand('cta', function () {
                function buildCTA(url, alignment, text) {
                    return '<a href="' + url + '" class="btn btn-primary btn-lg ' + alignment + '" role="button">' + text + '</a>';
                }

                var text = editor.selection.getContent();

                var pluginObj = {
                    'id': "cta_form",
                    'title': "Call to Action Button"
                };
                var modal = jQuery("#" + pluginObj.id);
                if(!modal.length) {
                    modal = ciInsertModal(pluginObj,
                        '<form id="cta-form">\
                            <div class="form-group">\
                                <label for="cta-text">Call to action text</label>\
                                <input type="text" class="form-control" id="cta-text" placeholder="Contact our office now!" value="' + text + '">\
                            </div>\
                            <div class="form-group">\
                                <label for="link-url">Link URL</label>\
                                <input type="url" class="form-control" id="cta-url" placeholder="http://www.google.com">\
                            </div>\
                            <h4>Button alignment</h4>\
                            <div class="radio">\
                                <label><input type="radio" name="cta-alignment" id="cta-alignment-center" value="center" checked>Center</label>\
                            </div>\
                            <div class="radio">\
                                <label><input type="radio" name="cta-alignment" id="cta-alignment-left" value="left">Left</label>\
                            </div>\
                            <div class="radio">\
                                <label><input type="radio" name="cta-alignment" id="cta-alignment-right" value="right">Right</label>\
                            </div>\
                            <button type="button" class="btn btn-primary" id="create-cta">Create Call to Action Button</button>\
                        </form>');
                }

                modal = jQuery("#" + pluginObj.id);
                modal.modal('show');

                if(!actionsAlreadyBound[pluginObj.id]) { // this prevents re-binding the functions if you close & re-open the modal
                    var pre = '<p>&nbsp;</p><div class="row mt30 mb30">';
                    var post = '</div><p>&nbsp;</p>';
                    modal.find("#create-cta").click(function(){
                        var text = jQuery("#cta-text").val();
                        if(!text) { text = "Contact our office now!"; }

                        var url = jQuery("#cta-url").val();
                        if( url.length == 0 ) { url = "#"; }

                        var alignment = jQuery('input[name=cta-alignment]:checked', '#cta-form').val();
                        var alignmentClass = "";
                        if(alignment == "left") {
                            alignmentClass = "alignleft mr15";
                        } else if(alignment == "right") {
                            alignmentClass = "alignright ml15";
                        } else {
                            alignment = "CENTER";
                        }

                        var output = buildCTA(url, alignmentClass, text);
                        if(alignment === "CENTER") {
                            output = '<div class="text-center">' + output + "</div>";
                        }
                        output = "\n\n" + output + "\n\n&nbsp;";
                        editor.execCommand('mceInsertContent', 0, output);
                    });
                    actionsAlreadyBound[pluginObj.id] = true;
                }
            });

            editor.addCommand('staff', function() {
                var pluginObj = {
                    'id': "staff_insert",
                    'title': "Insert Staff Member(s)"
                };
                var modal = jQuery("#" + pluginObj.id);
                if(!modal.length) {
                    modal = ciInsertModal(pluginObj,
                        '<div class="control-group mt20">\
                            <label for="numColumns">Number of columns:</label>\
                            <input type="number" id="numColumns" min="1" max="6" step="1" placeholder="4" />\
                        </div>\
                        <div class="control-group mt20">\
                            <label for="numStaffMembers">Number of staff members:</label>\
                            <input type="number" id="numStaffMembers" min="-1" max="100" step="1" placeholder="4" />\
                        </div>\
                        <div class="control-group">\
                            <label for="maxLength">Maximum length of bio excerpt (in characters):</label>\
                            <input type="number" id="maxLength" min="-1" step="1" placeholder="250" />\
                            <p>(Use -1 to get the entire bio, or 250 characters to get the first couple sentences.)</p>\
                        </div>\
                        <button id="insert-all" type="button" class="btn btn-primary">Insert all staff members</button>');
                }
                modal.modal('show');

                if(!actionsAlreadyBound[pluginObj.id]) { // this prevents re-binding the functions if you close & re-open the modal
                    var pre = "<p>&nbsp;</p><div class=\"staff-members-insert\"><p>";
                    var post = "</p></div><p>&nbsp;</p>";
                    modal.find("#insert-all").click(function() {
                        var cols = ( modal.find('#numColumns').val() != "" ? modal.find('#numColumns').val() : 1 );
                        var length = ( modal.find('#maxLength').val() != "" ? modal.find('#maxLength').val() : -1 );
                        var staffMembers = ( modal.find('#numStaffMembers').val() != "" ? modal.find('#numStaffMembers').val() : -1 );
                        var shortcode = '[staff columns=' + cols + ' length=' + length + ' number=' + staffMembers + ' /]';
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + shortcode + post);
                        modal.modal('hide');
                    });
                    actionsAlreadyBound[pluginObj.id] = true;
                }
            });

            editor.addCommand('practicearea', function() {
                var pluginObj = {
                    'id': "practicearea_insert",
                    'title': "Insert Practice Area(s)"
                };
                var modal = jQuery("#" + pluginObj.id);
                if(!modal.length) {
                    modal = ciInsertModal(pluginObj,
                        '<div class="control-group mt20">\
                            <label for="numPracticeAreas">Max number of practice areas to display:</label>\
                            <input type="number" id="numPracticeAreas" min="1" max="100" step="1" placeholder="4" />\
                        </div>\
                        <div class="control-group mt20">\
                            <label for="numColumns">Number of columns:</label>\
                            <input type="number" id="numColumns" min="1" max="6" step="1" placeholder="4" />\
                        </div>\
                        <div class="control-group mt20">\
                            <label for="listOnly">Display as list only (no excerpt)?</label>\
                            <input type="checkbox" id="listOnly" />\
                        </div>\
                        <div class="control-group">\
                            <label for="maxLength">Maximum length of practice area excerpt (in characters):</label>\
                            <input type="number" id="maxLength" min="-1" step="1" placeholder="250" />\
                            <p>(Use -1 to get the entire practice area, or 250 characters to get the first couple sentences.)</p>\
                        </div>\
                        <div class="control-group mt20">\
                            <label for="showMore">Show "more" link after excerpt?</label>\
                            <input type="checkbox" id="showMore" />\
                        </div>\
                        <button id="insert-practice-areas" type="button" class="btn btn-primary">Insert practice areas</button>');
                }
                modal.modal('show');

                if(!actionsAlreadyBound[pluginObj.id]) { // this prevents re-binding the functions if you close & re-open the modal
                    var pre = '<p>&nbsp;</p><div class="practicearea-insert"><p>';
                    var post = '</p></div><p>&nbsp;</p>';
                    modal.find("#insert-practice-areas").click(function() {
                        var pa = ( modal.find('#numPracticeAreas').val() != "" ? modal.find('#numPracticeAreas').val() : 100 );
                        var listOnly = modal.find('#listOnly').prop('checked');
                        var more = modal.find('#showMore').prop('checked');
                        var cols = ( modal.find('#numColumns').val() != "" ? modal.find('#numColumns').val() : 1 );
                        var length = ( modal.find('#maxLength').val() != "" ? modal.find('#maxLength').val() : -1 );

                        var shortcode = '[practiceareas max=' + pa + ' columns=' + cols + ' length=' + length;
                        if(listOnly) {
                            shortcode += ' list';
                        }
                        if(more) {
                            shortcode += ' more';
                        }
                        shortcode += ' /]';
                        tinyMCE.activeEditor.execCommand('mceInsertContent', 0, pre + shortcode + post);
                        modal.modal('hide');
                    });
                    actionsAlreadyBound[pluginObj.id] = true;
                }
            });

            editor.addCommand('carousel', function () {
                var cat = prompt("Which category should we take slides from? (Find this in the 'Slug' column of the Slide Categories page.)");

                var catShortcode = 'category="' + cat + '" ';
                if( cat == "" || cat == null ) {
                    catShortcode = "";
                }
                editor.execCommand('mceInsertContent', 0, '<div class="slider-insert no-pad">[slider ' + catShortcode + '/]</div><p></p>');
            });
        },

        /**
         * Creates control instances based in the incomming name. This method is normally not
         * needed since the addButton method of the tinymce.Editor class is a more easy way of adding buttons
         * but you sometimes need to create more complex controls like listboxes, split buttons etc then this
         * method can be used to create those.
         *
         * @param {String} n Name of the control to create.
         * @param {tinymce.ControlManager} cm Control manager to use inorder to create new control.
         * @return {tinymce.ui.Control} New control instance or null if no control was created.
         */
        createControl : function(n, cm) {
            return null;
        },

        /**
         * Returns information about the plugin as a name/value array.
         * The current keys are longname, author, authorurl, infourl and version.
         *
         * @return {Object} Name/value array containing information about the plugin.
         */
        getInfo : function() {
            return {
                longname : 'Editor Buttons',
                author : 'Tyler Young',
                authorurl : 'http://conversioninsights.net/tyler-young',
                infourl : 'http://conversioninsights.net/free-wordpress-themes-law-firms/',
                version : "0.1"
            };
        }
    });

    // Register plugin
    tinymce.PluginManager.add( 'editor', tinymce.plugins.Editor );
})();



/**
 * Inserts a Bootstrap modal (dialog box) into the page, ready to be activated by a call to .modal()
 * @param pluginObj {{}} An object with keys 'title' and 'id', representing the title of the
 *                       dialog and the ID for the container
 * @param innerHTML {string} The inner HTML for the modal (everything past the header)
 * @returns {jQuery|*|jQuery} The jQuery object representing the modal.
 */
function ciInsertModal(pluginObj, innerHTML) {
    var modal = jQuery(
        '<div id="'+pluginObj.id+'" class="modal fade" title="'+pluginObj.title+'" role="dialog">\
                            <div class="modal-dialog">\
                                <div class="modal-content">\
                                    <div class="modal-header">\
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>\
                                        <h4 class="modal-title">' + pluginObj.title + '</h4>\
                                    </div>\
                                    ' + innerHTML + '\
                                    <p></p>\
                                </div>\
                            </div>\
                        </div>');
    modal.appendTo('body').modal();

    return modal;
}


