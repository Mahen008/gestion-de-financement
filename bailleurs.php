<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>
<?php
session_start();
?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <img class="logoRepoblikaMada mx-auto" src="assets/img/Logo_hd_MEF-PETIT-2.png" alt="">
        </div>
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Bailleurs de fond</h4>
            </div>
            <?php if ($_SESSION['role'] == "Utilisateur") { ?>
                <!-- Button modal ajout bailleur-->
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <a data-toggle="modal" data-target="#bailleur-modal" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Bailleur</a>
                </div>
            <?php } ?>
        </div>
        <!-- Modal bailleur-->
        <div class="modal fade" role="dialog" id="bailleur-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Enregistrement bailleur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formBailleur">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeName">nom</label>
                                    <input type="text" class="form-control" id="competeName" name="competeName">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeSecteurIntervation">secteur d'intervation</label>
                                    <input type="text" class="form-control" id="competeSecteurIntervation" name="competeSecteurIntervation">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeMaturite">maturité</label>
                                    <input type="text" class="form-control" id="competeMaturite" name="competeMaturite">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competePeriodeGrace">période de grace</label>
                                    <input type="text" class="form-control" id="competePeriodeGrace" name="competePeriodeGrace">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeTauxInteret">taux d'intéret</label>
                                    <input type="text" class="form-control" id="competeTauxInteret" name="competeTauxInteret">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeModeRemboursementPrincipal" class="col-form-label">mode de remboursement</label>
                                    <div>
                                        <select name="competeModeRemboursementPrincipal" id="competeModeRemboursementPrincipal" class="select">
                                            <option value="Remboursement constant du principal">Remboursement constant du principal</option>
                                            <option value="Annuité">Annuité</option>
                                            <option value="Remboursement principal en fin">Remboursement principal en fin</option>
                                            <option value="Lamp Sum principal & intérêt simple">Lamp Sum principal & intérêt simple</option>
                                            <option value="Lamp Sum principal & intérêt composée">Lamp Sum principal & intérêt composée</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competePeriodisteDeRemboursement">périodistité</label>
                                    <div>
                                        <select name="competePeriodisteDeRemboursement" id="competePeriodisteDeRemboursement" class="select">
                                            <option value="Annuelle">Annuelle</option>
                                            <option value="Semestrielle">Semestrielle</option>
                                            <option value="Trimestrielle">Trimestrielle</option>
                                            <option value="Mensuelle">Mensuelle</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeDifferencielInteret">differenciel intéret</label>
                                    <input type="text" class="form-control" id="competeDifferencielInteret" name="competeDifferencielInteret">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeFraisDeGestion">frais de gestion</label>
                                    <input type="text" class="form-control" id="competeFraisDeGestion" name="competeFraisDeGestion">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeComissionEngagement">comission d'engagement</label>
                                    <input type="text" class="form-control" id="competeComissionEngagement" name="competeComissionEngagement">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeCommissionDeService">commission de service</label>
                                    <input type="text" class="form-control" id="competeCommissionDeService" name="competeCommissionDeService">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeCommissionInitiale">commission initiale</label>
                                    <input type="text" class="form-control" id="competeCommissionInitiale" name="competeCommissionInitiale">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeCommissionArragement">commission d'arragement</label>
                                    <input type="text" class="form-control" id="competeCommissionArragement" name="competeCommissionArragement">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeFraisExposition">frais d'exposition</label>
                                    <input type="text" class="form-control" id="competeFraisExposition" name="competeFraisExposition">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeCommissionAgent">commission d'agent</label>
                                    <input type="text" class="form-control" id="competeCommissionAgent" name="competeCommissionAgent">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competeFraisDeRebours">frais de rebours</label>
                                    <input type="text" class="form-control" id="competeFraisDeRebours" name="competeFraisDeRebours">
                                </div>
                                <div class="form-group form-focus select-focus p-2">
                                    <label class="focus-label" for="competePrimeAssurenceFraisGarantie">prime d'assurence frais garantie</label>
                                    <input type="text" class="form-control" id="competePrimeAssurenceFraisGarantie" name="competePrimeAssurenceFraisGarantie">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="enregistrerBailleur">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal update -->
        <div class="modal fade" role="dialog" id="bailleur-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modification bailleur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formUpdateBailleur">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group p-2">
                                    <label for="updateName">nom</label>
                                    <input type="text" class="form-control" id="updateName" name="updateName" placeholder="Entrer le nom du bailleur">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateSecteurIntervation">secteur d'intervation</label>
                                    <input type="text" class="form-control" id="updateSecteurIntervation" name="updateSecteurIntervation" placeholder="Entrer son secteur d'intervation">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateMaturite">maturité</label>
                                    <input type="text" class="form-control" id="updateMaturite" name="updateMaturite" placeholder="Entrer la maturité">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePeriodeGrace">période de grace</label>
                                    <input type="text" class="form-control" id="updatePeriodeGrace" name="updatePeriodeGrace" placeholder="Entrer la période de grâce">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateTauxInteret">taux d'intéret</label>
                                    <input type="" class="form-control" id="updateTauxInteret" name="updateTauxInteret" placeholder="Entrer le taux d'intéret">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateModeRemboursementPrincipal">mode de remboursement</label>
                                    <div>
                                        <select id="updateModeRemboursementPrincipal" name="updateModeRemboursementPrincipal" class="select">
                                            <option id="editModeRemboursementPrincipal"></option>
                                            <option value="Remboursement constant du principal">Remboursement constant du principal</option>
                                            <option value="Annuité">Annuité</option>
                                            <option value="Remboursement principal en fin">Remboursement principal en fin</option>
                                            <option value="Lamp Sum principal & intérêt simple">Lamp Sum principal & intérêt simple</option>
                                            <option value="Lamp Sum principal & intérêt composée">Lamp Sum principal & intérêt composée</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePeriodisteDeRemboursement">périodistité de remboursement</label>
                                    <div>
                                        <select name="updatePeriodisteDeRemboursement" id="updatePeriodisteDeRemboursement" class="select">
                                            <option id="editPeriodisteDeRemboursement"></option>
                                            <option value="Annuelle">Annuelle</option>
                                            <option value="Semestrielle">Semestrielle</option>
                                            <option value="Trimestrielle">Trimestrielle</option>
                                            <option value="Mensuelle">Mensuelle</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateDifferencielInteret">differenciel intéret</label>
                                    <input type="text" class="form-control" id="updateDifferencielInteret" name="updateDifferencielInteret" placeholder="Entrer la differenciel d'intéret">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisDeGestion">frais de gestion</label>
                                    <input type="text" class="form-control" id="updateFraisDeGestion" name="updateFraisDeGestion" placeholder="Entrer le frais de gestion">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateComissionEngagement">comission d'engagement</label>
                                    <input type="text" class="form-control" id="updateComissionEngagement" name="updateComissionEngagement" placeholder="Entrer la comission d'engagement">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionDeService">commission de service</label>
                                    <input type="text" class="form-control" id="updateCommissionDeService" name="updateCommissionDeService" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionInitiale">commission initiale</label>
                                    <input type="text" class="form-control" id="updateCommissionInitiale" name="updateCommissionInitiale" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionArragement">commission d'arragement</label>
                                    <input type="text" class="form-control" id="updateCommissionArragement" name="updateCommissionArragement" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionAgent">commission d'agent</label>
                                    <input type="text" class="form-control" id="updateCommissionAgent" name="updateCommissionAgent" placeholder="Entrer le commission d'agent">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisDeRebours">frais de rebours</label>
                                    <input type="text" class="form-control" id="updateFraisDeRebours" name="updateFraisDeRebours" placeholder="Entrer le frais de rebours">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePrimeAssurenceFraisGarantie">prime d'assurence</label>
                                    <input type="text" class="form-control" id="updatePrimeAssurenceFraisGarantie" name="updatePrimeAssurenceFraisGarantie" placeholder="Entrer le prime d'assurence">
                                </div>
                            </div>
                            <input type="hidden" name="" id="hidden-update-id-bailleur">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="ModifierBailleur" onclick="updateBalleur()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal confirm before delete -->
        <div class="modal fade" id="PopupModalDelete">
            <div class="modal-dialog modal-confirmPop">
                <div class="modal-content">
                    <div class="modal-header flex-column">
                        <div class="icon-box">
                            <i class="material-icons">&#xE5CD;</i>
                        </div>
                        <h4 class="modal-title w-100">Êtes-vous sûr de vouloir supprimer?</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="deleteId" id="deleteId">
                        <div class="form-group">
                            <label for="deleteName">bailleur</label>
                            <input type="text" class="form-control" id="deleteName" name="deleteName">
                            <!-- <p id="deleteName" name="deleteName"></p> -->
                        </div>
                        <p>Voulez-vous vraiment supprimer ces enregistrements ? Ce processus ne peut pas être annulé.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteBailleur()">Effacer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="test_filter" class="dataTables_filter">
                    <label>Rechercher:
                        <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="test">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table" id="datatableBailleur">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Maturite</th>
                                <th>Période de grâce</th>
                                <th>taux d'intérêt</th>
                                <th>mode de remboursement</th>
                                <th>périodistité</th>
                                <?php if ($_SESSION['role'] == "Utilisateur") { ?>
                                    <th class="text-right">Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="bailleurs">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- modal confirmation ancien -->
<div id="delete_pf" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this PF?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>