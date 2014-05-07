
$(function() {
    var hash = document.location.hash;
    var prefix = "tab_";
    if (hash) {
        $('.nav-tabs a[href=' + hash + ']').tab('show');
    }

// Change hash for page-reload
    $('.nav-tabs a').on('shown', function(e) {
        window.location.hash = e.target.hash;
    });

    window.addEventListener('hashchange', function() {
        var changedHash = window.location.hash;
        changedHash && $('ul.nav a[href="' + changedHash + '"]').tab('show');
    }, false);
});

$(document).ready(function() {

//Toote ostmisel lisab koguse URLi otsa
    $('#purchase').click(function() {
        var _href = $(this).closest('a').attr('href');
        $(this).closest('a').attr('href', _href + $(this).parent().parent().find('input').val());
    })

//Otsingu ja toote lisamisel ühendab omavahel dropdownid

    $("#select1").change(function() {
        var selectedVal = $(this).val();
        if (selectedVal === "Puuviljad") {
            $(".Köögiviljad,.Marjad").hide();
            $(".Puuviljad").show();
            $('#select2').show(300);
        }
        else if (selectedVal === "Köögiviljad") {
            $(".Puuviljad,.Marjad").hide();
            $(".Köögiviljad").show();
            $('#select2').show(300);
        }
        else if (selectedVal === "Marjad") {
            $(".Köögiviljad,.Puuviljad").hide();
            $(".Marjad").show();
            $('#select2').show(300);
        }
        else {
            $('#select2').hide(300);
        }
    })

//muudab müükide/toodete tabelite read suunavateks
    $("tr").click(function() {
        window.location.href = $(this).find("a").attr("href");
    })
//Müügi lisamisel muudab valikuid vastavalt 
//kas tahetkase lisada uut müüki või oksjonit
    $('.nupud').change(function() {
        if ($("#myyk").prop("checked")) {
            $(".oksjon").hide();
            $(".myyk").show();
        } else if ($('#oksjon').prop('checked')) {
            $('.oksjon').show();
            $('.myyk').hide();
        }
        else {
            $('.oksjon').hide();
            $('.myyk').hide();
        }
    })


//sendmsg form validation and ajax
//--------------------------------------------

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

    })
})
//Taimeri seadistamine oksjoni lehel
$(document).ready(function() {
    $('.lisadiv').ready(function() {
        var aeg = $(this).find('.taimer').data('enddate');
        var year = aeg.substring(0, 4);
        var month = parseInt(aeg.substring(5, 7)) - 1;
        var day = aeg.substring(8, 10);
        var hour = aeg.substring(11, 13);
        var minute = aeg.substring(14, 16);
        var second = aeg.substring(17, 19);
        var enddate = new Date(year, month, day, hour, minute, second, 0);
        $(this).find('.taimer').countdown({
            until: enddate
        })
    })


})


