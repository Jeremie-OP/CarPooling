$(document).ready(function (){
    $("#form_search").on('submit',function(e){
       e.preventDefault();
       search();
    });
    $("#button_signup").click(function (e) {
        e.preventDefault();
        buttonSignup();
    })
});



function search() {
    $.ajax({
        type: "POST",
        url: "wiwiCarAjax.php",
        data: $("#form_search").serialize(),
        dataType: "html",
        success:function(resultat) {
            $("#result").empty().append(resultat);
            if (resultat === "Aucun voyage disponible pour ce trajet") var param = "searchEmpty";
            else var param = "searchSuccess";
            notif(param);
        },
        error:function (resultat, statut, erreur) {
            notif("error");
        }
    });
}

function buttonSignup() {

}

function notif(param) {
    if (param === "searchSuccess") {
        $("#notif").text("Recherche effectué avec succès").addClass("bg-primary").slideDown("slow").delay(2000).slideUp("slow").removeClass("bg-primary");
    }
    if (param === "searchEmpty") {
        $("#notif").text("Aucun résultat trouvé").addClass("bg-warning").slideDown("slow").delay(2000).slideUp("slow").removeClass("bg-warning");
    }
    if (param === "error") {
        $("#notif").text("Quelque chose ne s'est pas bien passé !").addClass("bg-danger").slideDown("slow").delay(2000).slideUp("slow").removeClass("bg-danger");
    }
}