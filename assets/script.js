jQuery(document).ready(function ($) {
    $('.expandable-text-widget .expand-btn').on('click', function () {
        const widget = $(this).closest('.expandable-text-widget');
        const content = widget.find('.text-content');
        const fade = widget.find('.text-fade');

        if (content.hasClass('expanded')) {
            // Recolher o texto
            content.removeClass('expanded').css('max-height', content.data('original-height'));
            fade.show(); // Exibe o efeito fade novamente
            $(this).text('Expandir');
        } else {
            // Expandir o texto
            content.data('original-height', content.css('max-height')); // Salva a altura original
            content.addClass('expanded').css('max-height', 'none');
            fade.hide(); // Esconde o efeito fade
            $(this).text('Recolher');
        }
    });
});