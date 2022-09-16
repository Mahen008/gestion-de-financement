$(document).ready(function () {
  displayBailleur();
  displayPlafondFmi();
  displaypret();
});

// =============== gestion users ===============

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

// =============== end gestion users ===============

// =============== gestion bailleur ===============

$("#enregistrerBailleur").on("click", function () {
  var formdata = $("#formBailleur").serializeArray();
  var action = {
    name: "action",
    value: "CREATE",
  };
  formdata.push(action);

  $.ajax({
    type: "POST",
    url: "bailleurs-requette.php",
    data: formdata,
    success: function (response, status) {
      if (response == "") {
        $("#bailleur-modal .close").click();
        displayBailleur();
      } else {
        alert("error");
      }
    },
    error: function () {
      alert("Error");
    },
  });
});

function displayBailleur() {
  // var displayBailleur = true;
  $.ajax({
    url: "bailleurs-requette.php",
    type: "POST",
    data: {
      action: "READ",
    },
    success: function (data) {
      $("#bailleurs").html(data);
    },
  });
}

function editBailleur(editId) {
  $("#hidden-update-id-bailleur").val(editId);

  $.post(
    "bailleurs-requette.php",
    { editId: editId, action: "EDIT" },
    function (data, status) {
      var userid = JSON.parse(data);
      $("#hidden-update-id-bailleur").val(userid.id);
      $("#updateName").val(userid.nom);
      $("#updateTypeBailleur").val(userid.type_de_bailleur);
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
    }
  );
}

function updateBalleur() {
  var formupdata = $("#formUpdateBailleur").serializeArray();
  var hiddendata = {
    name: "id",
    value: $("#hidden-update-id-bailleur").val(),
  };
  var action = {
    name: "action",
    value: "UPDATE",
  };
  formupdata.push(hiddendata);
  formupdata.push(action);

  $.ajax({
    type: "POST",
    url: "bailleurs-requette.php",
    data: formupdata,
    success: function () {
      $("#bailleur-update-modal .close").click();
      displayBailleur();
    },
    error: function () {
      alert("Error");
    },
  });
}

function confirmDataDelete(id) {
  // $("#PopupModalDelete").modal("show");
  $("#deleteId").val(id);
  // alert(id);
  $.post(
    "bailleurs-requette.php",
    { id: id, action: "DATADELETE" },
    function (data) {
      var userid = JSON.parse(data);
      $("#deleteName").val(userid.nom);
      // $("#updateDuree").val(userid.duree);
      // $("#updateMontant").val(userid.montant);
    }
  );
}

function deleteBailleur() {
  // $("#deleteId").val(deleteid);
  var deleteid = $("#deleteId").val();
  $.ajax({
    url: "bailleurs-requette.php",
    type: "POST",
    data: {
      deleteid: deleteid,
      action: "DELETE",
    },
    success: function (response) {
      $("#PopupModalDelete .close").click();
      $(`#bailleur-${deleteid}`).remove();
    },
    error: function () {
      alert("Error");
    },
  });
}

// =============== end gestion bailleur ===============

// =============== gestion plafond fmi ===============

function addPlafondFMI() {
  var formdatafmi = $("#formFMI").serializeArray();
  var action = {
    name: "action",
    value: "CREATE",
  };
  formdatafmi.push(action);
  // console.log(formdatafmi);

  $.ajax({
    type: "POST",
    url: "fmi-requette.php",
    data: formdatafmi,
    success: function (response, status) {
      if (response == "") {
        $("#fmi-add-modal .close").click();
        displayPlafondFmi();
      } else {
        // alert("error");
      }
    },
    error: function () {
      alert("Error");
    },
  });
}

function displayPlafondFmi() {
  // alert("actualiser");
  $.ajax({
    url: "fmi-requette.php",
    type: "POST",
    data: {
      action: "READ",
    },
    success: function (data) {
      $("#plafond-FMI").html(data);
    },
  });
}

function editPlafondFmi(id) {
  $("#hidden-update-id-fmi").val(id);
  $.post("fmi-requette.php", { id: id, action: "EDIT" }, function (data) {
    var userid = JSON.parse(data);
    $("#updateDateDebut").val(userid.date_debut);
    $("#updateDuree").val(userid.duree);
    $("#updateMontant").val(userid.montant);
  });
}

function updatePlafondFmi() {
  var formupdatafmi = $("#formupFMI").serializeArray();
  var hiddendataid = {
    name: "id",
    value: $("#hidden-update-id-fmi").val(),
  };
  var action = {
    name: "action",
    value: "UPDATE",
  };
  formupdatafmi.push(hiddendataid);
  formupdatafmi.push(action);
  $.ajax({
    type: "POST",
    url: "fmi-requette.php",
    data: formupdatafmi,
    success: function () {
      $("#fmi-update-modal .close").click();
      displayPlafondFmi();
    },
    error: function () {
      alert("Error");
    },
  });
}

function confirmDataDeleteFmi(id) {
  // $("#PopupModalDelete").modal("show");
  $("#deleteIdFmi").val(id);
  // alert(id);
  $.post("fmi-requette.php", { id: id, action: "DATADELETE" }, function (data) {
    var userid = JSON.parse(data);
    $("#deleteNameFmi").val(userid.date_debut);
    // $("#updateDuree").val(userid.duree);
    // $("#updateMontant").val(userid.montant);
  });
}

function deletePlafondFmi() {
  var id = $("#deleteIdFmi").val();
  $.ajax({
    url: "fmi-requette.php",
    type: "POST",
    data: {
      id: id,
      action: "DELETE",
    },
    success: function (response) {
      $("#PopupModalDeleteFMI .close").click();
      $(`#plafond-${id}`).remove();
    },
    error: function () {
      alert("Error");
    },
  });
}

// =============== end gestion plafond fmi ===============
// =============== gestion prêt ===============

function displaypret() {
  // var displayBailleur = true;
  $.ajax({
    url: "pret-requette.php",
    type: "POST",
    data: {
      action: "READ",
    },
    success: function (data) {
      $("#pret").html(data);
    },
  });
}

// =============== end gestion prêt ===============
