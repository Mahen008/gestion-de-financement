<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>

<div class="page-wrapper">
    <div class="content">

        <div class="row">
            <img class="logoRepoblikaMada mx-auto" src="assets/img/Logo_hd_MEF-PETIT-2.png" alt="">
        </div>
        <div class="row">
            <div class="col-sm-5 col-4">
                <h4 class="page-title">Projet</h4>
            </div>
            <?php if ($_SESSION['role'] == "Utilisateur") { ?>
                <!-- Button modal ajout projet-->
                <div class="col-sm-7 col-8 text-right m-b-30">
                    <a data-toggle="modal" data-target="#projet-modal" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Projet</a>
                </div>
            <?php } ?>
        </div>
        <!-- Modal projet-->
        <div class="modal fade" role="dialog" id="projet-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement projet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formProjet">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group p-2">
                                    <label for="competeName">nom*</label>
                                    <input type="text" class="form-control" id="competeName" name="competeName" placeholder="Entrer le nom du projet">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeMontant">montant*</label>
                                    <input type="text" class="form-control" id="competeMontant" name="competeMontant" placeholder="Entrer le montant du prêt">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="addProjet()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal update -->
        <div class="modal fade" role="dialog" id="projet-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modification projet</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formUpdateProjet">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group p-2">
                                    <label for="updateName">nom</label>
                                    <input type="text" class="form-control" id="updateName" name="updateName" placeholder="Entrer le nom du projet">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateMontant">Montant</label>
                                    <input type="text" class="form-control" id="updateMontant" name="updateMontant" placeholder="Entrer le montant">
                                </div>
                            </div>
                            <input type="hidden" name="" id="hidden-update-id-projet">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="ModifierProjet" onclick="updateProjet()">Modifier</button>
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
                            <label for="deleteName">Projet</label>
                            <input type="text" class="form-control" id="deleteName" name="deleteName">
                            <!-- <p id="deleteName" name="deleteName"></p> -->
                        </div>
                        <p>Voulez-vous vraiment supprimer ces enregistrements ? Ce processus ne peut pas être annulé.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteProjet()">Effacer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div id="test_filter" class="dataTables_filter">
                    <label>
                        <input type="search" class="form-control form-control-sm" placeholder="Rechercher" aria-controls="test">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0" id="test">
                        <thead>
                            <tr>
                                <th class="col-md-5">Nom du projet</th>
                                <th>Montant du prêt</th>
                                <th>Date d'ajout</th>
                                <?php if ($_SESSION['role'] == "Utilisateur") { ?>
                                    <th class="text-right">Actions</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody id="projet"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
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
</div>
<?php include('footer.php'); ?>