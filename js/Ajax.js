$(document).ready(function (){
    $("form").on('submit',function(e){
       e.preventDefault();
       search();
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
            $("#result").empty().append(resultat);
            var param = "searchSuccess";
            notif(param);
        }
    });
}

function notif(param) {
    if (param === "searchSuccess") {
        $("#notif").text("Recherche effectué avec succès").addClass("bg-primary").show("slow").on('click', function(event) {
            $("#notif").hide("slow");
        }).delay(1000).hide("slow");
    }
    if (param === "searchEmpty") {
        $("#notif").text("Aucun résultat trouvé").addClass("bg-warning").show("slow").on('click', function(event) {
            $("#notif").hide("slow");
        })
    }
}