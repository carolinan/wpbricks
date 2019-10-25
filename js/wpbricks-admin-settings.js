/**
 * Backend side use js
 */
jQuery(document).ready(function () {
    'use strict';
    var id;

    // Bricks setting page button js
    jQuery('.bricks-setting-buttons .button').click(function (e) {
        e.preventDefault();
        id = jQuery(this).attr('href');
        jQuery('html, body').animate({
            scrollTop: jQuery(id).offset().top - 40
        }, 1000);
    });

    // Page header sticky setting option js.
    if ('Yes' === jQuery('.metabox-location-side #header-sticky-setting input[name="stick_header"]:checked').val()) {
        jQuery('.metabox-location-side #header-transparent-setting').show();
    } else {
        jQuery('.metabox-location-side #header-transparent-setting').hide();
    }
});

/**
 * Page backend header sticky click event.
 */
jQuery(document).on('click', '.metabox-location-side #header-sticky-setting input[name="stick_header"]', function () {
    if ( 'Yes' === jQuery(this).val() ) {
        jQuery('.metabox-location-side #header-transparent-setting').show();
    } else {
        jQuery('.metabox-location-side #header-transparent-setting').hide();
    }
});
