$(document).ready(function () {
    $(".trending-product").hover(
        (e) => {
            $(e.currentTarget).children().eq(1).removeClass("d-none");
        },
        (e) => {
            $(e.currentTarget).children().eq(1).addClass("d-none");
        }
    );
});
