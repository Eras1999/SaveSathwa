$(document).ready(function() {
    // Ensure all accordion items are collapsible and toggle independently
    $('.accordion-button').on('click', function() {
        const $button = $(this);
        const $collapse = $($button.data('bs-target'));

        // Toggle the collapse manually if needed
        $collapse.collapse('toggle');

        // Optional: Enforce single-open behavior (comment out if multi-open is desired)
        if ($collapse.hasClass('show')) {
            $('.accordion-collapse.show').not($collapse).collapse('hide');
        }
    });

    // Initialize Bootstrap collapse
    $('.accordion-collapse').on('show.bs.collapse', function() {
        $(this).prev('.accordion-header').find('.accordion-button').addClass('active');
    }).on('hide.bs.collapse', function() {
        $(this).prev('.accordion-header').find('.accordion-button').removeClass('active');
    });
});