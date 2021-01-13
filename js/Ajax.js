$(document).ready(function () {
    $("#form_search").on('submit', function (e) {
        e.preventDefault();
        search();
    });
    $("#voyage_create").on('submit', function (e) {
        e.preventDefault();
        voyage_create();
    });
    $('#menu').find("a").not("#accueil").click(function (e) {
        var action = this.id;
        e.preventDefault();
        loadView(action);
    });
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

function voyage_create() {
    $.ajax({
        type: "GET",
        url: "wiwiCarAjax.php",
        data: $("#voyage_create").serialize(),
        dataType: "html",
        success:function(resultat) {
            $("#notif").empty().append(resultat).slideDown("slow").delay(2000).slideUp("slow").empty();
        },
        error:function (resultat, statut, erreur) {
            notif("error");
        }
    });
}

function loadView(action) {
    $.ajax({
        type: "GET",
        url: "wiwiCarAjax.php",
        data: {"action" : action},
        dataType: "html",
        success:function(resultat) {
            $("#page_maincontent").hide();
            $("#ajax").empty().append(resultat);
        },
        error:function (resultat, statut, erreur) {
            notif("error");
        }
    })
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