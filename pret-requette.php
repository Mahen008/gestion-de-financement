<?php
require_once 'config.php';

global $conn;
extract($_POST);
// print_r($action);

if ($action == 'READ') {

    $pret = mysqli_query($conn, "SELECT pret.id AS id_pret, 
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
                                        YEAR(date_signature) AS annee_signature
                                FROM pret 
                                INNER JOIN bailleurs 
                                ON pret.id_bailleurs = bailleurs.id 
                                INNER JOIN projet_sub 
                                ON pret.id_projet = projet_sub.id");

    $a = 1;
    $table =  "";
    if (is_array($pret) || is_object($pret)) {
        foreach ($pret as $row) {
            $table .= '<tr id=pret-' . $row["id_pret"] . '>
                        <td>' . $a++ . '</td>
                        <td>' . $row["nom_projet_sub"] . '</td>
                        <td>' . $row["nom"] . '</td>
                        <td>' . $row["montant"] . '</td>';
            // echo $row["status"];
            if ($row["status"] == "en cours d'etude") {
                $table .= '<td><span class="custom-badge status-red">' . $row["status"] . '</span></td>';
            } elseif ($row["status"] == "Requette envoyée") {
                $table .= '<td><span class="custom-badge status-blue">' . $row["status"] . '</span></td>';
            } elseif ($row["status"] == "En cours de négociation") {
                $table .= '<td><span class="custom-badge status-grey">' . $row["status"] . '</span></td>';
            } elseif ($row["status"] == "En cours de signature") {
                $table .= '<td><span class="custom-badge status-purple">' . $row["status"] . '</span></td>';
            } else {
                $table .= '<td><span class="custom-badge status-green">' . $row["status"] . '</span></td>';
            }

            $table .=  '<td>' . $row["maturite"] . '</td>
                        <td>' . $row["periode_grace"] . '</td>
                        <td>' . $row["mode_remboursement_principal"] . '</td>
                        <td>' . $row["periodisite_de_remboursement"] . '</td>
                        <td>' . $row["taux_interet"] . '</td>';
            $maturite = $row['maturite'];
            $periode_grace = $row['periode_grace'];
            $frais_gestion = (int)$row['frais_gestion'];
            $periodisite_de_remboursement = $row['periodisite_de_remboursement'];
            $mode_remboursement_principal = $row['mode_remboursement_principal'];
            $annee_remboursement = $row['annee_signature'];
            $ENCt_1 = $row['montant'];
            // $PPt = 0;
            $PPt = $ENCt_1 / ($maturite - $periode_grace);
            $ENCt = 0;
            $c_ENC_t = 0;
            $interet = $row['taux_interet'];
            $PP_avec_periode_grace = 0;
            $c_ENC = array();
            $i = 0;
            $commission_de_gestion =  $frais_gestion / $maturite;
            $SDi = array();
            $element_don;
            // const taux_actualisation = 0.05;
            if ($mode_remboursement_principal == 'remboursement constant') {
                if ($periodisite_de_remboursement == 'annuelle') {
                    if (
                        isset($row['montant']) &&
                        isset($maturite) &&
                        isset($row['taux_interet']) &&
                        $row['montant'] > 0 &&
                        $row['maturite'] > 0 &&
                        $maturite > $periode_grace
                    ) {
                        for ($ligne = 0; $ligne < $maturite; $ligne++) {
                            while ($periode_grace > 0) {
                                $SDi[] = ((($ENCt_1 + $ENCt / 2) * $interet) + $PP_avec_periode_grace + $commission_de_gestion) / pow(1.05, $i + 1);
                                var_dump($SDi);
                                $c_ENC[] = $ENCt_1;
                                $periode_grace--;
                                $maturite--;
                                // $annee_remboursement++;
                                $i++;
                            }
                            $c_ENC[] = (int)$c_ENC[$i - 1] - $PPt;
                            $SDi[] = (((((int)$c_ENC[$i - 1] + (int)end($c_ENC)) / 2) * $interet) + $PPt + $commission_de_gestion) / pow(1.05, $i + 1);
                            end($c_ENC);
                            var_dump($SDi);
                            // $annee_remboursement++;
                            $i++;
                        }
                        // foreach($SDi as $val){
                        $element_don = array_sum($SDi);
                        // }
                    } else {
                    }
                } elseif ($periodisite_de_remboursement == 'semestrielle') {
                } elseif ($periodisite_de_remboursement == 'trimestrielle') {
                } elseif ($periodisite_de_remboursement == 'mensuelle') {
                }
            }
            $table .= '<td>' . $element_don . '</td>';
            // calcule de valeur actuelle (VA)
            // formule VA= SD1/(1+r)+ SD1/(1+r)²+ ... + SDn/(1+r)^n

            // fin VA 
            $table .=  '<td class="">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" onclick="editPret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#pret-update-modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" onclick="confirmDataDeletePret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#PopupModalDeletePret"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                <a class="dropdown-item" onclick="voirPrevisionPret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#prevision-pret-modal"><i class="fa fa-trash-o m-r-5"></i> voir prévision prêt</a>
                            </div>
                        </td>
                    </tr>';
        };
    }
    echo $table;
} elseif ($action == "DATA_DROWP") {
    $dataBailleur = mysqli_query($conn, "SELECT * 
                                FROM bailleurs;");
    $drowpBailleurs =  "";
    foreach ($dataBailleur as $row) {
        $drowpBailleurs .= '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
    };
    // echo $drowpBailleurs;
    $drowpdata = array();
    $drowpdata['drowpBailleurs'] = $drowpBailleurs;

    $dataProjet = mysqli_query($conn, "SELECT * 
                                       FROM `pret` 
                                       RIGHT JOIN projet_sub 
                                       ON pret.id_projet = projet_sub.id 
                                       WHERE pret.id IS NULL;");
    $drowpPret =  "";
    foreach ($dataProjet as $row) {
        $drowpPret .= '<option value="' . $row["id"] . '">' . $row["nom_projet_sub"] . '</option>';
    };
    // echo $drowpPret;
    $drowpdata['drowpPret'] = $drowpPret;
    // print_r($drowpdata);
    echo json_encode($drowpdata);
    // print_r($drowpdata);
} elseif ($action == 'EDIT') {
    $id = $_POST['id'];
    $query = "SELECT * FROM pret WHERE id = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == 'UPDATE') {
    $query = "UPDATE pret SET
                status = '$updateStatus', 
                id_bailleurs = '$updateIdBailleurs', 
                id_projet = '$updateIdProjet'
            WHERE id = '$id'";
    mysqli_query($conn, $query);
} elseif ($action == "CREATE") {
    $query = "INSERT INTO pret SET
    id= '',
    status = '$completeStatus',
    id_bailleurs = '$completeIdBailleurs',
    id_projet = '$completeIdProjet'";

    mysqli_query($conn, $query);
} elseif ($action == 'DELETE') {
    $id = $_POST['id'];
    echo $id;
    $query = "DELETE FROM pret WHERE id = $id";
    mysqli_query($conn, $query);
} elseif ($action == "DATADELETE") {
    $id = $_POST['id'];
    $query = "SELECT * FROM pret WHERE id = $id LIMIT 1";
    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    echo json_encode($response);
} elseif ($action == "PREVISION_PRET") {
    $id = $_POST['id'];
    // echo $id;
    $query = "SELECT pret.id AS id_pret, 
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
                    YEAR(date_signature) AS annee_signature
            FROM `pret` 
            INNER JOIN projet_sub 
            ON pret.id_projet = projet_sub.id 
            INNER JOIN bailleurs 
            ON pret.id_bailleurs = bailleurs.id
            WHERE pret.id = $id 
            LIMIT 1";

    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    $table = "";
    // print_r($montant);
    // echo ($response);
    $maturite = $response['maturite'];
    $periode_grace = $response['periode_grace'];
    $frais_gestion = (int)$response['frais_gestion'];
    $periodisite_de_remboursement = $response['periodisite_de_remboursement'];
    $mode_remboursement_principal = $response['mode_remboursement_principal'];
    $annee_remboursement = $response['annee_signature'];
    $ENCt_1 = $response['montant'];
    // $PPt = 0;
    $PPt = $ENCt_1 / ($maturite - $periode_grace);
    $ENCt = 0;
    $c_ENC_t = 0;
    $interet = $response['taux_interet'];
    $PP_avec_periode_grace = 0;
    $c_ENC = array();
    $i = 0;
    $commission_de_gestion =  $frais_gestion / $maturite;
    if ($mode_remboursement_principal == 'remboursement constant') {
        if ($periodisite_de_remboursement == 'annuelle') {
            if (
                isset($response['montant']) &&
                isset($maturite) &&
                isset($response['taux_interet']) &&
                $response['montant'] > 0 &&
                $response['maturite'] > 0 &&
                $maturite > $periode_grace
            ) {
                for ($ligne = 0; $ligne < $maturite; $ligne++) {
                    while ($periode_grace > 0) {
                        $table .= '<tr>
                            <td>' . $annee_remboursement . '</td>
                            <td>' . ($ENCt_1 + $ENCt / 2) * $interet . '</td>
                            <td>' . $PP_avec_periode_grace . '</td>
                            <td>' . $commission_de_gestion . '</td>
                            <td>' . $c_ENC[] = $ENCt_1 . '</td>
                        </tr>';
                        $periode_grace--;
                        $maturite--;
                        $annee_remboursement++;
                        $i++;
                    }
                    // $i--;
                    // echo $c_ENC[$i];
                    // echo $c_ENC_t;
                    // print_r($c_ENC);
                    // die();
                    $c_ENC[] = (int)$c_ENC[$i - 1] - $PPt;

                    $table .= '<tr>
                            <td>' . $annee_remboursement . '</td>
                            <td>' . (((int)$c_ENC[$i - 1] + (int)end($c_ENC)) / 2) * $interet . '</td>
                            <td>' . $PPt . '</td>
                            <td>' . $commission_de_gestion . '</td>
                            <td>' . end($c_ENC)  . '</td> 
                        </tr>';
                    $annee_remboursement++;
                    // echo 'encours t-1' . $c_ENC[$i];
                    // echo "\n";
                    // echo 'encours t' . end($c_ENC);
                    // echo "\n";

                    $i++;
                }
            } else {
                $table .= '<tr>
                            <td>afficher</td>
                            <td>le</td>
                            <td>message</td>
                            <td>d\'</td>
                            <td>erreur</td>
                        </tr>';
            }
        } elseif ($periodisite_de_remboursement == 'semestrielle') {
        } elseif ($periodisite_de_remboursement == 'trimestrielle') {
        } elseif ($periodisite_de_remboursement == 'mensuelle') {
        }
    }

    $response['tbody_table'] = $table;
    // print_r($response['tbody_table']);
    echo json_encode($response);
}
