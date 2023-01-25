<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>

<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <img class="logoRepoblikaMada mx-auto" src="assets/img/Logo_hd_MEF-PETIT-2.png" alt="">
        </div>
        <div class="row">
            <div class="col-sm-5 col-5">
                <h4 class="page-title">Prêt</h4>
            </div>
            <?php if ($_SESSION['role'] == "Utilisateur") { ?>
                <!-- Button modal ajout prêt-->
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a data-toggle="modal" data-target="#pret-modal" class="btn btn-primary btn-rounded" onclick="dataDrowp()"><i class="fa fa-plus"></i> Add prêt</a>
                </div>
            <?php } ?>
        </div>
        <!-- Modal prêt-->
        <div class="modal fade" role="dialog" id="pret-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement prêt</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formPret">
                            <div class="row d-flex flex-wrap justify-content-around">
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="completeStatus">status</label>
                                    <div>
                                        <select name="completeStatus" id="completeStatus" class="select">
                                            <option value="en cours d\'etude">En cours d'etude</option>
                                            <option value="requette envoyée">Requette envoyée</option>
                                            <option value="en cours de négociation">En cours de négociation</option>
                                            <option value="en cours de signature">En cours de signature</option>
                                            <option value="signé">Signé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="completeIdBailleurs">Bailleur de fond</label>
                                    <div>
                                        <select name="completeIdBailleurs" id="completeIdBailleurs" class="select"></select>
                                    </div>
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="completeIdProjet">Projet</label>
                                    <div>
                                        <select name="completeIdProjet" id="completeIdProjet" class="select"></select>
                                    </div>
                                </div>                                
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeSecteurIntervation">secteur d'intervation</label>
                                    <div>
                                        <select name="competeSecteurIntervation" id="competeSecteurIntervation" class="select"></select>
                                    </div>
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeMaturite">maturité</label>
                                    <input type="text" class="form-control" id="competeMaturite" name="competeMaturite">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competePeriodeGrace">période de grace</label>
                                    <input type="text" class="form-control" id="competePeriodeGrace" name="competePeriodeGrace">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeTauxInteret">taux d'intéret</label>
                                    <input type="text" class="form-control" id="competeTauxInteret" name="competeTauxInteret">
                                </div>
                                <div class="form-group form-focus select-focus">
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
                                <div class="form-group form-focus select-focus">
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
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeDifferencielInteret">differenciel intéret</label>
                                    <input type="text" class="form-control" id="competeDifferencielInteret" name="competeDifferencielInteret">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeFraisDeGestion">frais de gestion</label>
                                    <input type="text" class="form-control" id="competeFraisDeGestion" name="competeFraisDeGestion">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeComissionEngagement">comission d'engagement</label>
                                    <input type="text" class="form-control" id="competeComissionEngagement" name="competeComissionEngagement">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeCommissionDeService">commission de service</label>
                                    <input type="text" class="form-control" id="competeCommissionDeService" name="competeCommissionDeService">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeCommissionInitiale">commission initiale</label>
                                    <input type="text" class="form-control" id="competeCommissionInitiale" name="competeCommissionInitiale">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeCommissionArragement">commission d'arragement</label>
                                    <input type="text" class="form-control" id="competeCommissionArragement" name="competeCommissionArragement">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeFraisExposition">frais d'exposition</label>
                                    <input type="text" class="form-control" id="competeFraisExposition" name="competeFraisExposition">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeCommissionAgent">commission d'agent</label>
                                    <input type="text" class="form-control" id="competeCommissionAgent" name="competeCommissionAgent">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competeFraisDeRebours">frais de rebours</label>
                                    <input type="text" class="form-control" id="competeFraisDeRebours" name="competeFraisDeRebours">
                                </div>
                                <div class="form-group form-focus select-focus">
                                    <label class="focus-label" for="competePrimeAssurenceFraisGarantie">prime d'assurence frais garantie</label>
                                    <input type="text" class="form-control" id="competePrimeAssurenceFraisGarantie" name="competePrimeAssurenceFraisGarantie">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addPret()">Save</button>
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
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom du projet</th>
                                <th>Nom du bailleur</th>
                                <th>Montant</th>
                                <th>Status</th>
                                <th>Maturité</th>
                                <th>Période de grâce</th>
                                <th>Mode de remboursement</th>
                                <th>Périodisité de remboursement</th>
                                <th>Taux d'intérêt</th>
                                <th>Concessionnalité de prêt</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody id="pret">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="pret-update-modal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">modification pret</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action="POST" id="formupPret">
                    <div class="row d-flex flex-wrap justify-content-around p-3">
                        <div class="form-group p-2">
                            <label for="updateStatus">status</label>
                            <div>
                                <select name="updateStatus" id="updateStatus" class="select">
                                    <option value="En cours d'etude">En cours d'etude</option>
                                    <option value="Requette envoyée">Requette envoyée</option>
                                    <option value="En cours de négociation">En cours de négociation</option>
                                    <option value="En cours de signature">En cours de signature</option>
                                    <option value="Signé">Signé</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="updateIdBailleurs">Bailleur de fond</label>
                            <div>
                                <select name="updateIdBailleurs" id="updateIdBailleurs" class="select"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="updateIdProjet">Projet</label>
                            <div>
                                <select name="updateIdProjet" id="updateIdProjet" class="select"></select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="hidden-update-id-fmi">
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-secondary" onclick="updatePret()">modifier</button>
            </div>

        </div>
    </div>
</div>
<!-- Modal confirm before delete -->
<div class="modal fade" id="PopupModalDeletePret">
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
                <input type="hidden" name="deleteIdPret" id="deleteIdPret">
                <div class="form-group">
                    <label for="deletePret">pret</label>
                    <!-- <input type="date" class="form-control" id="deletePret" name="deletePret"> -->
                    <!-- <p id="deleteName" name="deleteName"></p> -->
                </div>
                <p>Voulez-vous vraiment supprimer ces enregistrements ? Ce processus ne peut pas être annulé.</p>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" onclick="deletePret()">Effacer</button>
            </div>
        </div>
    </div>
</div>
<!-- prevision pret Modal -->
<div class="modal fade" id="prevision-pret-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">prévision de la dette</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="card-box profile-header">
                    <div class="row" id="pretable-prevision">
                    </div>
                </div>
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th scope="col">nombre de remboursement</th>
                            <th scope="col">période de remboursement</th>
                            <th scope="col">intérêt</th>
                            <th scope="col">principal</th>
                            <th scope="col">commission de gestion</th>
                            <th scope="col">encours</th>
                            <th scope="col">total de paiement par période</th>
                        </tr>
                    </thead>
                    <tbody id="periode-remboursement">
                    </tbody>
                </table>
            </div>

        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-success" onclick="updatePlafondFmi()">modifier</button> -->
        </div>

    </div>
</div>
</div>
<?php include('footer.php'); ?>