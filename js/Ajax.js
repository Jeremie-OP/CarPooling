$(document).ready(function (){
    $("#submit_search").click(function(e){
       e.preventDefault();
       search();
       notif();
    });
});

function search() {
    $.ajax({
        type: "POST",
        url: "wiwiCarAjax.php?action=search",
        data: $("#form_search").serialize(),
        dataType: "html",
        cache: false,
        success:function(resultat) {
            $("#page_maincontent").empty().append(resultat);
        }
    });
}

function notif() {
    $.ajax({
        type: "POST",
        url: "wiwiCarAjax.php?action=notification",
        dataType: "html",
        cache: false,
        success:function(resultat) {
            $("#page_maincontent").append(resultat);
        }
    })
}