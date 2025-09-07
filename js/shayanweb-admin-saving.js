jQuery(document).ready(function($) {
    $('#shayanweb-save-button').on('click', function(event) {
        event.preventDefault();

        $('#message-container').removeClass('sherror shsuccess').addClass('shwait').text(shweb_wait_message);

        var formData = $('#shayanweb_fontchanger_options').serialize();

        var dataToSend = formData + 
        '&action=shayanweb_fontchanger_ajax_options_save' + '&nonce=' + shayanweb_ajax_object.nonce;

        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: dataToSend,
            success: function(response) {
                if (response.success) {
                    $('#message-container').removeClass('sherror shwait').addClass('shsuccess').text(shweb_success_message);
                } else {
                    var errorMessage = response.data ? response.data : shweb_error_message;
                    $('#message-container').removeClass('shsuccess shwait').addClass('sherror').text(errorMessage);
                }
            },
            error: function() {
                $('#message-container').removeClass('shsuccess shwait').addClass('sherror').text(shweb_not_connected_message);
            }
        });
    });
});