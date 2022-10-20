<?php
require_once 'config.php';

global $conn;
extract($_POST);

if ($action == 'READ') {
    $query = mysqli_query($conn, "SELECT pret.id AS id_pret, 
                                        `status`, 
                                        `id_bailleurs`, 
                                        `id_projet`, 
                                        bailleurs.id AS id_bailleur, 
                                        `nom`, 
                                        `secteur_intervation`, 
                                        `maturite`, 
                                        `periode_grace`, 
                                        `taux_interet`, 
                                        `mode_remboursement_principal`, 
                                        `periodisite_de_remboursement`, 
                                        `differenciel_interet`, 
                                        `frais_gestion`, 
                                        `commission_engagement`, 
                                        `commission_service`, 
                                        `commission_initiale`, 
                                        `commission_arragement`, 
                                        `commission_agent`, 
                                        `frais_rebours`, 
                                        `prime_assurance`,
                                        projet_sub.id AS id_projet, 
                                        `nom_projet_sub`, 
                                        `montant`, 
                                        `statut`, 
                                        `date_signature`  
                                  FROM `pret` 
                                  INNER JOIN projet_sub 
                                  ON pret.id_projet = projet_sub.id 
                                  INNER JOIN bailleurs 
                                  ON pret.id_bailleurs = bailleurs.id;");
    $i = 1;
    $table =  "";
    foreach ($query as $row) {

        $table .= '<tr id=pret-' . $row["id_pret"] . '>
                        <td>
                            <a href="#" class="avatar">' . $i++ . '</a>
                        </td>
                        <td>' . $row["nom_projet_sub"] . '</td>
                        <td>' . $row["nom"] . '</td>
                        <td>' . $row["montant"] . '</td>
                        <td>' . $row["maturite"] . '</td>
                        <td>' . $row["periode_grace"] . '</td>
                        <td>' . $row["taux_interet"] . '</td>
                        <td>' . $row["mode_remboursement_principal"] . '</td>
                        <td>' . $row["commission d'engagement"] . '</td>
                        <td>' . $row["commission de service"] . '</td>

                        <td class="text-right">
                            <div class="dropdown dropdown-action">
                                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a  onclick="editBailleur(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#bailleur-update-modal" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                    <a class="dropdown-item" onclick="confirmDataDelete(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#PopupModalDelete"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>';
    };
    echo $table;
}
