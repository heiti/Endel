//Function for getting data from url name (getParameterByName('id') etc)
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));


}//Adding bids
$(document).ready(function() {
//reitingu lisamise ajax

    $('#product_rating').click(function() {
        var id = getParameterByName('id');
        $.ajax({
            type: "POST",
            url: "transaction/rating?id=" + id,
            cache: false,
            data: $('.rating: input').serializeArray(),
            success: function() {
                $('#rating_accepted').fadeIn(600).delay(1000).fadeOut(1800);
            },
            error: function() {
                alert('Perses');
            }
        });
    });
});

$(document).ready(function() {
    $('#confirmbid').click(function() {
        var id = getParameterByName('id');
        $.ajax({
            type: "POST",
            url: "product/newbid?id=" + id,
            data: $('#addbid :input').serializeArray(),
            success: function() {
                $('#amount').val('');
            }
        });
    });
    $("#addbid").submit(function() {
        return false;
    });
});
//data push

function datapush() {
    if ($('body.datapush').length > 0) {
        var id = getParameterByName('id');
        $.ajax({
            url: 'product/hasnewbids?id=' + id,
            type: 'GET',
            async: true,
            cache: false,
            success: function(data) {
                $('#TheBestBid').text(data + ' €');
                setTimeout(
                        datapush,
                        4000
                        );
            },
            error: function() {
                setTimeout(
                        datapush,
                        4000
                        );
            }
        });
    }
}
$(document).ready(datapush())();

