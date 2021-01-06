$(document).ready(function (){
    $("#form_search").on('submit',function(e){
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
        success:function(resultat) {
            $("#result").empty().append(resultat);
            if (resultat === "Aucun voyage disponible pour ce trajet") var param = "searchEmpty";
            else var param = "searchSuccess";
            notif(param);
        },
        error:function (resultat) {
            notif("error");
        }
    });
}

function notif(param) {
    if (param === "searchSuccess") {
        $("#notif").text("Recherche effectué avec succès").addClass("bg-primary").slideDown("slow").on('click', function(event) {
            $("#notif").slideUp("slow");
        }).delay(3000).slideUp("slow");
    }
    if (param === "searchEmpty") {
        $("#notif").text("Aucun résultat trouvé").addClass("bg-warning").slideDown("slow").on('click', function(event) {
            $("#notif").slideUp("slow");
        }).delay(3000).slideUp("slow");
    }
    if (param === "error") {
        $("#notif").text("Quelque chose ne s'est pas bien passé !").addClass("bg-danger").slideDown("slow").on('click', function(event) {
            $("#notif").slideUp("slow");
        }).delay(3000).slideUp("slow");
    }
}