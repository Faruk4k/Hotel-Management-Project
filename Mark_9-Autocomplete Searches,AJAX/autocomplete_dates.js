$(function () {
    $.ajax({
        url: "dates_auto.php",
        dataType: "json",
        success: function (data) {
            $(".autostart").autocomplete({
                source: function (request, response) {
                    var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                    response($.grep(data, function (item, index) {
                        return matcher.test(item) && index % 2 === 0;
                    }));
                },
                minLength: 1
            });
            $(".autoend").autocomplete({
                source: function (request, response) {
                    var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                    response($.grep(data, function (item, index) {
                        return matcher.test(item) && index % 2 === 1;
                    }));
                },
                minLength: 1
            });
        }
    });
});
