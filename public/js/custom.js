$(document).ready(function() {

    //hide the alert message
    window.setTimeout(function() {
        $(".msg").fadeTo(300, 0).slideUp(300, function() {
            $(this).remove();
        });
    }, 5000);

});

$("#confirm-delete").on("show.bs.modal", function (e) {
    $(this).find("#deleteForm").attr("action", $(e.relatedTarget).data("href"));
});
