<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
<?php include('sidebar.php'); ?>
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <img class="logoRepoblikaMada mx-auto" src="assets/img/Logo_hd_MEF-PETIT-2.png" alt="">
            </div>
            <div class="row">
                <div class="col-sm-4 col-3">
                    <h4 class="page-title">Utilisateur</h4>
                </div>
                <div class="col-sm-8 col-9 text-right m-b-20">
                    <a data-toggle="modal" data-target="#user-modal" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Utilisateur</a>
                </div>
            </div>
        </div>
        <!-- Modal add users -->
        <div class="modal fade" role="dialog" id="user-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Enregistrement Utilisateur</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formUser" class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="col-md-12">
                                    <!-- <div class="profile-img-wrap">
                                        <img class="inline-block" src="assets/img/user.jpg" alt="user">
                                        <div class="fileupload btn">
                                            <span class="btn-text">ajout</span>
                                            <input class="upload" type="file">
                                        </div>
                                    </div> -->
                                    <!-- <div class="profile-basic"> -->
                                    <div class="row d-flex flex-wrap justify-content-around">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completeName">nom*</label>
                                            <input type="text" required class="form-control" id="completeName" name="completeName" placeholder="Entrer le nom du projet" required>
                                            <div id="invalidCheck3Feedback" class="invalid-feedback">
                                                Veuillez fournir un nom valide.
                                            </div>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completeEmail">e-mail*</label>
                                            <input type="email" required class="form-control" id="completeEmail" name="completeEmail" placeholder="Entrer le montant du prêt">

                                        </div>

                                    </div>
                                    <div class="row d-flex flex-wrap justify-content-around">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completePassword">mots de passe*</label>
                                            <input type="password" required class="form-control" id="completePassword" name="completePassword" placeholder="Entrer le montant du prêt">
                                        </div>
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completePassword2">confirmer mots de passe*</label>
                                            <input type="password" class="form-control" id="completePassword2" name="completePassword2" placeholder="Entrer le montant du prêt">
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                    <div class="row d-flex flex-wrap justify-content-around">
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completeService">Département</label>
                                            <div>
                                                <select name="completeService" id="completeService" class="select">
                                                    <option value="Service du Suivi des Projets">Service du Suivi des Projets</option>
                                                    <option value="Service des Analyses et des Statistiques de la Dette">Service des Analyses et des Statistiques de la Dette</option>
                                                    <option value="Service des Aides et de la Dette extérieures">Service des Aides et de la Dette extérieures</option>
                                                    <option value="Service de la Trésorerie et de la Dette intérieure">Service de la Trésorerie et de la Dette intérieure</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- </div>
                                    <div class="row d-flex flex-wrap justify-content-around"> -->

                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completeGenre">Genre</label>
                                            <select class="select form-control floating" id="completeGenre" name="completeGenre">
                                                <option value="Homme">Masculin</option>
                                                <option value="Femme">Féminin</option>
                                            </select>
                                        </div>
                                        <div class="form-group form-focus select-focus">
                                            <label class="focus-label" for="completeRole">Rôle</label>
                                            <select class="select form-control floating" id="completeRole" name="completeRole">
                                                <option value="Administrateur">Administrateur</option>
                                                <option value="Utilisateur">Utilisateur</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group form-focus">
                                            <label class="focus-label" for="">Date de naissance</label>
                                            <div class="cal-icon">
                                                <input class="form-control floating datetimepicker" id="" name="" type="text" value="05/06/1985">
                                            </div>
                                        </div> -->
                                    <!-- </div> -->
                                    <div class="row d-flex flex-wrap justify-content-around">
                                        <div class="form-group">
                                            <!-- <label>Avatar</label> -->
                                            <div class="profile-upload">
                                                <div class="upload-img">
                                                    <img alt="" src="assets/img/user.jpg">
                                                </div>
                                                <div class="upload-input">
                                                    <input type="file" class="fileToUpload form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-primary" onclick="addUser()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="user-update-modal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit user</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="POST" id="formupUser">
                            <div class="row" id="editUser">

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
        <div class="modal fade" id="PopupModalDeleteUser">
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
                        <input type="hidden" name="deleteIdUser" id="deleteIdUser">
                        <div class="form-group">
                            <label for="deleteUserName">nom d'Utilisateur</label>
                            <input type="text" class="form-control" id="deleteUserName" name="deleteUserName">
                            <!-- <p id="deleteName" name="deleteName"></p> -->
                        </div>
                        <p>Voulez-vous vraiment supprimer ces enregistrements ? Ce processus ne peut pas être annulé.</p>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <button type="button" class="btn btn-danger" onclick="deleteUser()">Effacer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row doctor-grid" id="listUser">
            <!-- <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/image.jpeg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Patrice Mahen</a></h4>
                    <div class="doc-prof">Administrateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Roger Christian</a></h4>
                    <div class="doc-prof">Administrateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/images.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href=""><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Henry Daniels</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user-03.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Mark Hunter</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="#"><img alt="" src="assets/img/user-06.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Michael Sullivan</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/127715041.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Linda Barrett</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user-02.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Ronald Annéa</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user-04.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href=""><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Albert Sandoval</a></h4>
                    <div class="doc-prof">Administrateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user-05.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Diana Bailey</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user-13.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Shirley Willis</a></h4>
                    <div class="doc-prof">Utilisateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/user-14.jpg"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Pamela Curtis</a></h4>
                    <div class="doc-prof">Administrateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4  col-lg-3">
                <div class="profile-widget">
                    <div class="doctor-img">
                        <a class="avatar" href="profile.html"><img alt="" src="assets/img/test.webp"></a>
                    </div>
                    <div class="dropdown profile-action">
                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                        </div>
                    </div>
                    <h4 class="doctor-name text-ellipsis"><a href="profile.html">Justin Parker</a></h4>
                    <div class="doc-prof">Administrateur</div>
                    <div class="user-country">
                        <i class="fa fa-map-marker"></i> Direction de la Dette Publique
                    </div>
                </div>
            </div> -->
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="see-all">
                    <a class="see-all-btn" href="javascript:void(0);">Load More</a>
                </div>
            </div>
        </div>
    </div>

</div>
<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt="" width="50" height="46">
                <h3>Are you sure want to delete this Doctor?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php include('footer.php'); ?>