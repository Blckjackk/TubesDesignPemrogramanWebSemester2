$(document).ready(function () {
    // Tambahkan efek zoom dan bayangan pada card saat dihover
    $(".card").hover(
        function () {
            $(this).addClass("shadow").css('cursor', 'pointer');
        },
        function () {
            $(this).removeClass("shadow").css('cursor', 'default');
        }
    );
});