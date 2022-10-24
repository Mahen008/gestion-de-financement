<?php include("header.php"); ?>
<?php include("navbar.php"); ?>
<?php include("sidebar.php"); ?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Plafond fmi</h4>
            </div>
            <!-- Button modal ajout plafond-->
            <div class="col-sm-7 col-8 text-right m-b-30">
                <a data-toggle="modal" data-target="#fmi-add-modal" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Plafond</a>
            </div>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="fmi-add-modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">ajout plafond fmi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="POST" id="formFMI">
                            <form method="post" id="formBailleur">
                                <div class="row d-flex flex-wrap justify-content-around p-3">
                                    <div class="form-group">
                                        <label for="completeDateDebut">date début</label>
                                        <input type="date" class="form-control" id="completeDateDebut" name="completeDateDebut">
                                    </div>
                                    <div class="form-group">
                                        <label for="completeDuree">durée</label>
                                        <input type="text" class="form-control" id="completeDuree" name="completeDuree" placeholder="Entrer le durée du plafond">
                                    </div>
                                    <div class="form-group">
                                        <label for="completeMontant">montant du plafond</label>
                                        <input type="text" class="form-control" id="completeMontant" name="completeMontant" placeholder="Entrer le montant du plafond">
                                    </div>
                                </div>
                            </form>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="addPlafondFMI()">ajouter</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="fmi-update-modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">modifier plafond fmi</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="POST" id="formupFMI">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group">
                                    <label for="updateDateDebut">date début</label>
                                    <input type="date" class="form-control" id="updateDateDebut" name="updateDateDebut">
                                </div>
                                <div class="form-group">
                                    <label for="updateDuree">durée</label>
                                    <input type="text" class="form-control" id="updateDuree" name="updateDuree" placeholder="Entrer le durée du plafond">
                                </div>
                                <div class="form-group">
                                    <label for="updateMontant">montant du plafond</label>
                                    <input type="text" class="form-control" id="updateMontant" name="updateMontant" placeholder="Entrer le montant du plafond">
                                </div>
                            </div>
                            <input type="hidden" id="hidden-update-id-fmi">
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" onclick="updatePlafondFmi()">modifier</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal confirm before delete -->
        <div class="modal fade" id="PopupModalDeleteFMI">
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
                        <input type="hidden" name="deleteIdFmi" id="deleteIdFmi">
                        <div class="form-group">
                            <label for="deleteNameFmi">plafond</label>
                            <input type="date" class="form-control" id="deleteNameFmi" name="deleteNameFmi">
                            <!-- <p id="deleteName" name="deleteName"></p> -->
                        </div>
                        <p>Voulez-vous vraiment supprimer ces enregistrements ? Ce processus ne peut pas être annulé.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deletePlafondFmi()">Effacer</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>date de début</th>
                                <th>durée</th>
                                <th>plafond fmi</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="plafond-FMI">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("footer.php"); ?>