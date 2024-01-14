$(function () {
    $.ajax({
        url: "autocomplete_booking.php",
        dataType: "json",
        success: function (data) {
            $(".autocomplete").autocomplete({
                source: function (request, response) {
                    var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                    response($.grep(data, function (item) {
                        return matcher.test(item);
                    }));
                },
                minLength: 1
            });
        }
    });
});
