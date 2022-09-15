<?php include("header.php"); ?>
<div class="container">

    <!-- Button to Open the Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#fmi-add-modal">
        ajout plafond
    </button>

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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="addPlafondFMI()">ajouter</button>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" onclick="updatePlafondFmi()">modifier</button>
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
    <table class="table table-dark" id="table-plafond-FMI">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">date de début</th>
                <th scope="col">durée</th>
                <th scope="col">montant</th>
            </tr>
        </thead>
        <tbody id="plafond-FMI">
        </tbody>
    </table>
</div>

<?php include("footer.php"); ?>