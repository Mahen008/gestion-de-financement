$(document).ready(function ($) {
  // Variables declarations
  var $wrapper = $(".main-wrapper");
  var $pageWrapper = $(".page-wrapper");
  var $slimScrolls = $(".slimscroll");
  var $sidebarOverlay = $(".sidebar-overlay");
  displayBailleur();
  displayPlafondFmi();
  displaypret();
  // dataDrowp();

  // Sidebar
  var Sidemenu = function () {
    this.$menuItem = $("#sidebar-menu a");
  };

  function init() {
    var $this = Sidemenu;
    $("#sidebar-menu a").on("click", function (e) {
      if ($(this).parent().hasClass("submenu")) {
        e.preventDefault();
      }
      if (!$(this).hasClass("subdrop")) {
        $("ul", $(this).parents("ul:first")).slideUp(350);
        $("a", $(this).parents("ul:first")).removeClass("subdrop");
        $(this).next("ul").slideDown(350);
        $(this).addClass("subdrop");
      } else if ($(this).hasClass("subdrop")) {
        $(this).removeClass("subdrop");
        $(this).next("ul").slideUp(350);
      }
    });
    $("#sidebar-menu ul li.submenu a.active")
      .parents("li:last")
      .children("a:first")
      .addClass("active")
      .trigger("click");
  }
  // Sidebar Initiate
  init();

  // Sidebar overlay
  function sidebar_overlay($target) {
    if ($target.length) {
      $target.toggleClass("opened");
      $sidebarOverlay.toggleClass("opened");
      $("html").toggleClass("menu-opened");
      $sidebarOverlay.attr("data-reff", "#" + $target[0].id);
    }
  }

  // Mobile menu sidebar overlay
  $(document).on("click", "#mobile_btn", function () {
    var $target = $($(this).attr("href"));
    sidebar_overlay($target);
    $wrapper.toggleClass("slide-nav");
    $("#chat_sidebar").removeClass("opened");
    return false;
  });

  // Chat sidebar overlay
  $(document).on("click", "#task_chat", function () {
    var $target = $($(this).attr("href"));
    console.log($target);
    sidebar_overlay($target);
    return false;
  });

  // Sidebar overlay reset
  $sidebarOverlay.on("click", function () {
    var $target = $($(this).attr("data-reff"));
    if ($target.length) {
      $target.removeClass("opened");
      $("html").removeClass("menu-opened");
      $(this).removeClass("opened");
      $wrapper.removeClass("slide-nav");
    }
    return false;
  });

  // Select 2
  if ($(".select").length > 0) {
    $(".select").select2({
      minimumResultsForSearch: -1,
      width: "100%",
    });
  }

  // Floating Label
  if ($(".floating").length > 0) {
    $(".floating")
      .on("focus blur", function (e) {
        $(this)
          .parents(".form-focus")
          .toggleClass("focused", e.type === "focus" || this.value.length > 0);
      })
      .trigger("blur");
  }

  // Right Sidebar Scroll
  if ($("#msg_list").length > 0) {
    $("#msg_list").slimscroll({
      height: "100%",
      color: "#878787",
      disableFadeOut: true,
      borderRadius: 0,
      size: "4px",
      alwaysVisible: false,
      touchScrollStep: 100,
    });
    var msgHeight = $(window).height() - 124;
    $("#msg_list").height(msgHeight);
    $(".msg-sidebar .slimScrollDiv").height(msgHeight);
    $(window).resize(function () {
      var msgrHeight = $(window).height() - 124;
      $("#msg_list").height(msgrHeight);
      $(".msg-sidebar .slimScrollDiv").height(msgrHeight);
    });
  }

  // Left Sidebar Scroll
  if ($slimScrolls.length > 0) {
    $slimScrolls.slimScroll({
      height: "auto",
      width: "100%",
      position: "right",
      size: "7px",
      color: "#ccc",
      wheelStep: 10,
      touchScrollStep: 100,
    });
    var wHeight = $(window).height() - 60;
    $slimScrolls.height(wHeight);
    $(".sidebar .slimScrollDiv").height(wHeight);
    $(window).resize(function () {
      var rHeight = $(window).height() - 60;
      $slimScrolls.height(rHeight);
      $(".sidebar .slimScrollDiv").height(rHeight);
    });
  }

  // Page wrapper height
  var pHeight = $(window).height();
  $pageWrapper.css("min-height", pHeight);
  $(window).resize(function () {
    var prHeight = $(window).height();
    $pageWrapper.css("min-height", prHeight);
  });

  // Datetimepicker
  if ($(".datetimepicker").length > 0) {
    $(".datetimepicker").datetimepicker({
      format: "DD/MM/YYYY",
    });
  }

  // Datatable
  if ($(".datatable").length > 0) {
    $(".datatable").DataTable({
      bFilter: false,
    });
  }

  // Bootstrap Tooltip
  if ($('[data-toggle="tooltip"]').length > 0) {
    $('[data-toggle="tooltip"]').tooltip();
  }

  // Mobile Menu
  $(document).on("click", "#open_msg_box", function () {
    $wrapper.toggleClass("open-msg-box");
    return false;
  });

  // Lightgallery
  if ($("#lightgallery").length > 0) {
    $("#lightgallery").lightGallery({
      thumbnail: true,
      selector: "a",
    });
  }

  // Incoming call popup
  if ($("#incoming_call").length > 0) {
    $("#incoming_call").modal("show");
  }

  // Summernote
  if ($(".summernote").length > 0) {
    $(".summernote").summernote({
      height: 200,
      minHeight: null,
      maxHeight: null,
      focus: false,
    });
  }

  // Check all email
  $(document).on("click", "#check_all", function () {
    $(".checkmail").click();
    return false;
  });
  if ($(".checkmail").length > 0) {
    $(".checkmail").each(function () {
      $(this).on("click", function () {
        if ($(this).closest("tr").hasClass("checked")) {
          $(this).closest("tr").removeClass("checked");
        } else {
          $(this).closest("tr").addClass("checked");
        }
      });
    });
  }

  // Mail important
  $(document).on("click", ".mail-important", function () {
    $(this).find("i.fa").toggleClass("fa-star").toggleClass("fa-star-o");
  });

  // Dropfiles
  if ($("#drop-zone").length > 0) {
    var dropZone = document.getElementById("drop-zone");
    var uploadForm = document.getElementById("js-upload-form");
    var startUpload = function (files) {
      console.log(files);
    };
    uploadForm.addEventListener("submit", function (e) {
      var uploadFiles = document.getElementById("js-upload-files").files;
      e.preventDefault();
      startUpload(uploadFiles);
    });
    dropZone.ondrop = function (e) {
      e.preventDefault();
      this.className = "upload-drop-zone";
      startUpload(e.dataTransfer.files);
    };
    dropZone.ondragover = function () {
      this.className = "upload-drop-zone drop";
      return false;
    };
    dropZone.ondragleave = function () {
      this.className = "upload-drop-zone";
      return false;
    };
  }

  // Small Sidebar
  if (screen.width >= 992) {
    $(document).on("click", "#toggle_btn", function () {
      if ($("body").hasClass("mini-sidebar")) {
        $("body").removeClass("mini-sidebar");
        $(".subdrop + ul").slideDown();
      } else {
        $("body").addClass("mini-sidebar");
        $(".subdrop + ul").slideUp();
      }
      return false;
    });
    $(document).on("mouseover", function (e) {
      e.stopPropagation();
      if (
        $("body").hasClass("mini-sidebar") &&
        $("#toggle_btn").is(":visible")
      ) {
        var targ = $(e.target).closest(".sidebar").length;
        if (targ) {
          $("body").addClass("expand-menu");
          $(".subdrop + ul").slideDown();
        } else {
          $("body").removeClass("expand-menu");
          $(".subdrop + ul").slideUp();
        }
        return false;
      }
    });
  }
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
      $("#updateSecteurIntervation").val(userid.secteur_intervation);
      $("#updateMaturite").val(userid.maturite);
      $("#updatePeriodeGrace").val(userid.periode_grace);
      $("#updateTauxInteret").val(userid.taux_interet);
      $("#test").val(userid.mode_remboursement_principal);

      document
        .getElementById("mahenina")
        .val(userid.mode_remboursement_principal);
      $("#updatePeriodisitedeRemboursement").val(
        userid.periodisite_de_remboursement
      );
      $("#updateDifferencielInteret").val(userid.differenciel_interet);
      $("#updateFraisDeGestion").val(userid.frais_gestion);
      $("#updateComissionEngagement").val(userid.commission_engagement);
      $("#updateCommissionDeService").val(userid.commission_service);
      $("#updateCommissionInitiale").val(userid.commission_initiale);
      $("#updateCommissionArragement").val(userid.commission_arragement);
      $("#updateCommissionAgent").val(userid.commission_agent);
      $("#updateFraisDeRebours").val(userid.frais_rebours);
      $("#updatePrimeAssurenceFraisGarantie").val(
        userid.prime_assurance_frais_garantie
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
// $("#enregistrerPret").on("click", function () {
function dataDrowp() {
  // alert("mande eto");
  $.ajax({
    type: "POST",
    url: "pret-requette.php",
    data: {
      action: "DATA_DROWP",
    },
    success: function (data) {
      // console.log(data);
      // var userid = JSON.parse(data);
      // $("#hidden-update-id-bailleur").val(userid.id);
      var datadrowpdown = JSON.parse(data);
      // console.log(datadrowpdown.drowpBailleurs);
      $("#completeIdBailleurs").html(datadrowpdown.drowpBailleurs);
      $("#completeIdProjet").html(datadrowpdown.drowpPret);
    },
  });
}

function addPret() {
  var formdataPret = $("#formPret").serializeArray();
  var action = {
    name: "action",
    value: "CREATE",
  };
  formdataPret.push(action);
  // console.log(formdatafmi);

  $.ajax({
    type: "POST",
    url: "pret-requette.php",
    data: formdataPret,
    success: function (response) {
      if (response == "") {
        $("#pret-modal .close").click();
        displaypret();
      } else {
        // alert("error");
      }
    },
    error: function () {
      alert("Error");
    },
  });
}

function confirmDataDeletePret(id) {
  // $("#PopupModalDelete").modal("show");
  $("#deleteIdPret").val(id);
  // alert(id);
  $.post(
    "pret-requette.php",
    { id: id, action: "DATADELETE" },
    function (data) {
      var userid = JSON.parse(data);
      // $("#deleteNameFmi").val(userid.date_debut);
      // $("#updateDuree").val(userid.duree);
      // $("#updateMontant").val(userid.montant);
    }
  );
}

function editPret(id) {
  $("#hidden-update-id-pret").val(id);
  $.post("pret-requette.php", { id: id, action: "EDIT" }, function (data) {
    var dataEditPret = JSON.parse(data);
    $("#updateStatus").val(dataEditPret.status);
    $("#updateIdBailleurs").val(dataEditPret.id_bailleurs);
    $("#updateIdProjet").val(dataEditPret.id_projet);
  });
}

function updatePret() {
  var formupdataPret = $("#formupPret").serializeArray();
  var hiddendataid = {
    name: "id",
    value: $("#hidden-update-id-Pret").val(),
  };
  var action = {
    name: "action",
    value: "UPDATE",
  };
  formupdatafmi.push(hiddendataid);
  formupdatafmi.push(action);
  $.ajax({
    type: "POST",
    url: "pret-requette.php",
    data: formupdataPret,
    success: function () {
      $("#pret-update-modal .close").click();
      displaypret();
    },
    error: function () {
      alert("Error");
    },
  });
}

function deletePret() {
  var id = $("#deleteIdPret").val();
  $.ajax({
    url: "pret-requette.php",
    type: "POST",
    data: {
      id: id,
      action: "DELETE",
    },
    success: function (response) {
      $("#PopupModalDeletePret .close").click();
      $(`#pret-${id}`).remove();
    },
    error: function () {
      alert("Error");
    },
  });
}

function voirPrevisionPret(id) {
  // alert(id);
  $.post(
    "pret-requette.php",
    { id: id, action: "PREVISION_PRET" },
    function (data) {
      var userid = JSON.parse(data);
      $("#completeNomProjet").val(userid.nom_projet_sub);
      $("#completeBailleur").val(userid.nom);
      $("#completeModeDeRemboursement").val(
        userid.mode_remboursement_principal
      );
      $("#completeMontant").val(userid.montant);
      $("#completePeriodisiteDeRemboursement").val(
        userid.periodisite_de_remboursement
      );
      $("#periode-remboursement").html(userid.tbody_table);
    }
  );
}
// =============== end gestion prêt ===============
