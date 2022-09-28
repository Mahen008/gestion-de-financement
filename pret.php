<?php include("header.php"); ?>


<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <!-- <table border="1" class="table table-striped" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true"> -->
                <table border="1" class="table table-striped" id="table-bailleur" data-toggle="table">
                    <thead>
                        <tr>
                            <th data-sortable="true" data-field="">#</th>
                            <th data-sortable="true" data-field="">projet à subventionne</th>
                            <th data-sortable="true" data-field="">montant prêt</th>
                            <th data-sortable="true" data-field="">statut</th>
                            <th data-sortable="true" data-field="">nom de bailleur</th>
                            <th data-sortable="true" data-field="">maturité</th>
                            <th data-sortable="true" data-field="">période de grace</th>
                            <th data-sortable="true" data-field="">mode de remboursement principal</th>
                            <th data-sortable="true" data-field="">periodisité de remboursement</th>
                            <th data-sortable="true" data-field="">taux intérêt</th>
                            <th data-sortable="true" data-field="">frais de gestion</th>
                            <th data-sortable="true" data-field="">commission initiale</th>
                            <th data-sortable="true" data-field="">commission agent</th>
                            <th data-sortable="true" data-field="">concessionalité</th>
                            <th class="fixed">Action</th>
                        </tr>
                    </thead>
                    <tbody id="pret">
                    </tbody>
                </table>
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
                        <div class="row d-flex flex-wrap justify-content-around p-3">
                            <div class="form-group">
                                <label for="completeNomProjet">nom du projet à subventionné</label>
                                <input type="text" class="form-control" id="completeNomProjet" name="completeNomProjet">
                            </div>
                            <div class="form-group">
                                <label for="completeBailleur">bailleur</label>
                                <input type="text" class="form-control" id="completeBailleur" name="completeBailleur">
                            </div>
                        </div>
                        <div class="row d-flex flex-wrap justify-content-around p-3">
                            <div class="form-group">
                                <label for="completeModeDeRemboursement">mode de remboursement</label>
                                <input type="text" class="form-control" id="completeModeDeRemboursement" name="completeModeDeRemboursement">
                            </div>
                            <div class="form-group">
                                <label for="completeMontant">montant</label>
                                <input type="number" class="form-control" id="completeMontant" name="completeMontant">
                            </div>
                            <div class="form-group">
                                <label for="completePeriodisiteDeRemboursement">périodisité de remboursement</label>
                                <input type="text" class="form-control" id="completePeriodisiteDeRemboursement" name="completePeriodisiteDeRemboursement">
                            </div>
                        </div>
                        <table class="table table-dark" id="table-plafond-FMI">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">intérêt</th>
                                    <th scope="col">principal</th>
                                    <th scope="col">commission de gestion</th>
                                    <th scope="col">encours</th>
                                </tr>
                            </thead>
                            <tbody id="periode-remboursement">
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <button type="submit" class="btn btn-success" onclick="updatePlafondFmi()">modifier</button> -->
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>