<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-5 col-5">
                <h4 class="page-title">Prêt</h4>
            </div>
            <!-- Button modal ajout bailleur-->
            <div class="col-sm-7 col-7 text-right m-b-30">
                <a data-toggle="modal" data-target="#pret-modal" class="btn btn-primary btn-rounded" onclick="dataDrowp()"><i class="fa fa-plus"></i> Add prêt</a>
            </div>
        </div>
    </div>
    <!-- Modal bailleur-->
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
                        <div class="row d-flex flex-wrap justify-content-around p-3">
                            <div class="form-group p-2">
                                <label for="completeStatus">status</label>
                                <div>
                                    <select name="completeStatus" id="completeStatus" class="select">
                                        <option value="En cours d'etude">En cours d'etude</option>
                                        <option value="Requette envoyée">Requette envoyée</option>
                                        <option value="En cours de négociation">En cours de négociation</option>
                                        <option value="En cours de signature">En cours de signature</option>
                                        <option value="Signé">Signé</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="completeIdBailleurs">Bailleur de fond</label>
                                <div>
                                    <select name="completeIdBailleurs" id="completeIdBailleurs" class="select"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="completeIdProjet">Projet</label>
                                <div>
                                    <select name="completeIdProjet" id="completeIdProjet" class="select"></select>
                                </div>
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
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-striped custom-table mb-0 datatable">
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
                            <th>Taux d'intérêt</th>
                            <th>Frais de gestion</th>
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

<?php include('footer.php'); ?>