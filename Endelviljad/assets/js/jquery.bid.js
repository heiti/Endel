//Function for getting data from url name (getParameterByName('id') etc)
function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}//Adding bids
$(document).ready(function() {


    $('#confirmbid').click(function() {
        var id = getParameterByName('id');
        $.ajax({
            type: "POST",
            url: "product/newbid?id=" + id,
            data: $('#addbid :input').serializeArray(),
            success: function() {

            }
        });
    });

    $("#addbid").submit(function() {
        return false
    });

});
//data push

function datapush() {

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
 $(document).ready(datapush())();