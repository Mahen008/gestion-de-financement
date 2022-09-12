$(document).ready(function () {
  displayBailleur();
});

function displayBailleur() {
  var displayBailleur = true;
  $.ajax({
    url: "displayBailleur.php",
    type: "POST",
    success: function (data) {
      $("#bailleurs").html(data);
    },
  });
}

function deleteBailleur(deleteid) {
  $.ajax({
    url: "deleteBailleur.php",
    type: "POST",
    data: {
      deleteid: parseInt(deleteid),
    },
    success: function (response) {
      $(`#bailleur-${deleteid}`).remove();
    },
    error: function () {
      alert("Error");
    },
  });
}

function submitData(action) {
  $(document).ready(function () {
    var data = {
      action: action,
      id: $("#id").val(),
      name: $("#name").val(),
      email: $("#email").val(),
      gender: $("#gender").val(),
    };

    $.ajax({
      url: "function.php",
      type: "post",
      data: data,
      success: function (response) {
        alert(response);
        if (response == "Deleted Successfully") {
          $("#" + action).css("display", "none");
        }
      },
    });
  });
}

function editBailleur(editId) {
  // alert(editId);
  // console.log($(".btn-edit-bailleur"));
  $("#hidden-update-id-bailleur").val(editId);

  $.post("edit-bailleur.php", { editId: editId }, function (data, status) {
    var userid = JSON.parse(data);
    $("#hidden-update-id-bailleur").val(userid.id);
    $("#updateName").val(userid.nom);
    $("#updateSecteurIntervation").val(userid.secteur_intervation);
    $("#updateTypeFinancement").val(userid.type_financement);
    $("#updatePartFinance").val(userid.part_financer);
    $("#updateMaturite").val(userid.maturite);
    $("#updatePeriodeGrace").val(userid.periode_grace);
    $("#updateTauxInteret").val(userid.taux_interet);
    $("#updateDifferencielInteret").val(userid.differenciel_interet);
    $("#updateFraisDeGestion").val(userid.frais_gestion);
    $("#updateComissionEngagement").val(userid.commission_engagement);
    $("#updateCommissionDeService").val(userid.commission_service);
    $("#updateCommissionInitiale").val(userid.commission_initiale);
    $("#updateCommissionArragement").val(userid.commission_arragement);
    $("#updateFraisExposition").val(userid.frais_exposition);
    $("#updateCommissionAgent").val(userid.commission_agent);
    $("#updateMaturiteLettreCredit").val(userid.maturite_lettre_credit);
    $("#updateFraisRefLettreCredit").val(userid.frais_ref_lettre_credit);
    $("#updateFraisDeRebours").val(userid.frais_rebours);
    $("#updatePrimeAssurenceFraisGarantie").val(
      userid.prime_assurance_frais_garantie
    );
    $("#updatePrimeAttenuationRisqueCredit").val(
      userid.prime_attenuation_risque_credit
    );
    $("#updateFraisLiesMepLettreCredit").val(
      userid.frais_lies_mep_lettre_credit
    );
  });
}

function updateBalleur() {
  // alert("tonga");
  // console.log(formupdata);
  var formupdata = $("#formUpdateBailleur").serializeArray();
  var hiddendata = {
    name: "id",
    value: $("#hidden-update-id-bailleur").val(),
  };
  formupdata.push(hiddendata);
  // alert(hiddendata);
  // alert(formupdata);
  $.ajax({
    type: "POST",
    url: "update-bailleur.php",
    data: formupdata,
    success: function () {
      // alert("ici");
      // displayBailleur();
      // $("#bailleur-update-modal").css("display", "none");
      $("#bailleur-update$-modal").css("display", "");
      $("div").remove(".modal-backdrop");
      $("#bailleur-modal").modal("hide");
      // $(".modal-backdrop").remove(fade show);
    },
    error: function () {
      alert("Error");
    },
  });
}

$("#enregistrerBailleur").on("click", function () {
  // event.preventDefault();
  var formdata = $("#formBailleur").serialize();
  // alert(formdata);
  $.ajax({
    type: "POST",
    url: "addBailleur.php",
    data: formdata,
    success: function (response, status) {
      console.log(response);
      console.log(status);
      if (response == "") {
        // alert('ici');
        // $("#table-bailleur").load(location.href + "#table-bailleur");
        // $(".modal-backdrop").remove;

        $("#bailleur-modal").css("display", "");
        $("div").remove(".modal-backdrop");
        $("#bailleur-modal").modal("hide");
        displayBailleur();
        // $("#table-bailleur").load("liste-bailleur.php #table-bailleur");
        // $("#table-bailleur").load(location.href + "#table-bailleur");
      } else {
        alert("là");
      }
      // location.reload();
      // if (data == 1) {
      //   $("#bailleur-modal").each(function () {
      //     $("#bailleur-modal").modal("hide");
      //   });
      //   console.log("success");
      // } else {
      //   console.log("failure");
      //   $("#bailleur-modal").modal("hide");
      // }
    },
    error: function () {
      alert("Error");
    },
  });
});
