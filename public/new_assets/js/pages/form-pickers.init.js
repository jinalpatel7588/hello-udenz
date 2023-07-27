! function (n) {
    "use strict";
    var e = function () { };
    e.prototype.init = function () {
        n(".clockpicker").clockpicker({
            donetext: "Done"
        })
            , n("#datepicker").datepicker(), n("#datepicker-autoclose").datepicker({
                autoclose: !0,
                todayHighlight: !0
            })
    }, n.FormPickers = new e, n.FormPickers.Constructor = e
}(window.jQuery),
    function (e) {
        "use strict";
        window.jQuery.FormPickers.init()
    }();