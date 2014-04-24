$(document).ready(function() {
    $("#select_1").change(function() {
        var selectedVal = $(this).val();
        if (selectedVal === "Puuviljad") {
            $(".Köögiviljad,.Marjad").hide();
            $(".Puuviljad").show();
        }
        else if (selectedVal === "Köögiviljad") {
            $(".Puuviljad,.Marjad").hide();
            $(".Köögiviljad").show();
        }
        else if (selectedVal === "Marjad") {
            $(".Köögiviljad,.Puuviljad").hide();
            $(".Marjad").show();
        }
        else {
            $(".Köögiviljad,.Puuviljad,.Marjad").hide();
        }
    })

    $("tr").click(function() {
        window.location.href = $(this).find("a").attr("href");
    });

    $('.nupud').change(function() {
        if ($("#tyyp1").prop("checked")) {
            $(".oksjon").hide();
            $(".myyk").show();
        } else if ($('#tyyp2').prop('checked')) {
            $('.oksjon').show();
            $('.myyk').hide();
        }
        else {
            $('.oksjon').hide();
            $('.myyk').hide();
        }
    })
    $('#kilohind').change(function() {
        if ($('.alghind').val() * $('.kogus').val() !== 0) {
            $('#summa').text($('.alghind').val() * $('.kogus').val());
            $('#summa').show();
        }
        else if ($('.hind').val() * $('.kogus').val() !== 0) {
            $('#summa').text($('.hind').val() * $('.kogus').val());
            $('#summa').show();
        }
        else {
            $('#summa').hide();
        }
    })
})

//sendmsg form validation and ajax
//--------------------------------------------
$(document).ready(function() {
    $('#sendmsg-form').validate({
        rules: {
            senderName: {
                minlength: 2,
                required: true
            },
            senderEmail: {
                required: true,
                email: true
            },
            senderMessage: {
                minlength: 3,
                required: true
            }
        },
        success: function(element) {
            element.text('OK!').addClass('valid').closest('.control-group').removeClass('error').addClass('success');
        },
        submitHandler: function(form) {

            $.ajax({
                url: 'sendmsg/sendemail',
                data: $('#sendmsg-form').serialize(),
                type: "POST",
                success: function(data) {
                    $("#contact-form").hide('slow');
                    $('#results').html(data);
                    $('#msgSent').modal('show');
                    $('#senderName').val('');
                    $('#senderEmail').val('');
                    $('#senderMessage').val('');

                }
            })
            return false;
        }

    });
    $(document).ready(function() {
        var aeg = $('.taimer').closest('.lisadiv').data('enddate');
        var time = new Date();
        time = new Date(time.getFullYear() + 1, 1 - 1, 1)
        $('.taimer').countdown({
            until: time
        });
    })
});


