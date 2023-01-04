<?php
require_once 'config.php';
session_start();
global $conn;
extract($_POST);
// print_r($action);

if ($action == 'READ') {

    $pret = mysqli_query($conn, "SELECT pret.id AS id_pret, 
                                        `status`, 
                                        `id_bailleurs`, 
                                        `id_projet`, 
                                        `id_bai`, 
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
                                        `id_projet_sub`, 
                                        `nom_projet_sub`, 
                                        `montant_projet_sub`, 
                                        YEAR(date_signature) AS annee_signature
                                FROM pret 
                                INNER JOIN bailleurs 
                                ON pret.id_bailleurs = bailleurs.id_bai
                                INNER JOIN projet_sub 
                                ON pret.id_projet = projet_sub.id_projet_sub");

    $a = 1;
    $table =  "";
    if (is_array($pret) || is_object($pret)) {
        foreach ($pret as $row) {
            $table .= '<tr id=pret-' . $row["id_pret"] . '>
                        <td>' . $a++ . '</td>
                        <td>' . $row["nom_projet_sub"] . '</td>
                        <td>' . $row["nom"] . '</td>
                        <td>' . $row["montant_projet_sub"] . '</td>';
            // echo $row["status"];
            if ($row["status"] == "en cours d'etude") {
                $table .= '<td><span class="custom-badge status-red">' . $row["status"] . '</span></td>';
            } elseif ($row["status"] == "requette envoyée") {
                $table .= '<td><span class="custom-badge status-blue">' . $row["status"] . '</span></td>';
            } elseif ($row["status"] == "en cours de négociation") {
                $table .= '<td><span class="custom-badge status-grey">' . $row["status"] . '</span></td>';
            } elseif ($row["status"] == "en cours de signature") {
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
            $ENCt_1 = $row['montant_projet_sub'];
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
            // $element_don = 0.001;
            $element_don_pret;
            // const taux_actualisation = 0.05;
            if ($mode_remboursement_principal == 'Remboursement constant du principal') {
                if ($periodisite_de_remboursement == 'Annuelle') {
                    if (
                        isset($row['montant_projet_sub']) &&
                        isset($maturite) &&
                        isset($row['taux_interet']) &&
                        $row['montant_projet_sub'] > 0 &&
                        $row['maturite'] > 0 &&
                        $maturite > $periode_grace
                    ) {
                        for ($ligne = 0; $ligne < $maturite; $ligne++) {
                            while ($periode_grace > 0) {
                                $SDi[] = ((($ENCt_1 + $ENCt / 2) * $interet) + $PP_avec_periode_grace + $commission_de_gestion) / pow(1.05, $i + 1);
                                // var_dump($SDi);
                                $c_ENC[] = $ENCt_1;
                                $periode_grace--;
                                $maturite--;
                                // $annee_remboursement++;
                                $i++;
                            }
                            $c_ENC[] = (int)$c_ENC[$i - 1] - $PPt;
                            $SDi[] = (((((int)$c_ENC[$i - 1] + (int)end($c_ENC)) / 2) * $interet) + $PPt + $commission_de_gestion) / pow(1.05, $i + 1);
                            end($c_ENC);
                            // var_dump($SDi);
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
            $element_don_pret = (($row["montant_projet_sub"] - $element_don) / $row["montant_projet_sub"]) * 100;
            // echo '<pre>';
            // echo $element_don_pret;
            // echo '</pre>';
            if (isset($element_don) && isset($element_don_pret)) {
                // $table .= '<td>' . (($row["montant_projet_sub"] - $element_don) / $row["montant_projet_sub"]) * 100 . '</td>';
                if ($element_don_pret > 35 || $element_don_pret == 35) {
                    $table .= '<td><span class="custom-badge status-green">concessionnel</span></td>';
                    // $table .= '<td>' . $element_don_pret . '<span class="custom-badge status-green">concessionnel</span></td>';
                } elseif (($element_don_pret > 20 || $element_don_pret == 20) && $element_don_pret < 35) {
                    $table .= '<td><span class="custom-badge status-orange">semi-concessionnel</span></td>';
                    // $table .= '<td>' . $element_don_pret . '<span class="custom-badge status-orange">semi-concessionnel</span></td>';
                } else {
                    $table .= '<td><span class="custom-badge status-red">non-concessionnel</span></td>';
                    // $table .= '<td>' . $element_don_pret . '<span class="custom-badge status-red">non-concessionnel</span></td>';
                }
            } else {
                $table .= '<td>not found</td>';
            }
            // calcule de valeur actuelle (VA)
            // formule VA= SD1/(1+r)+ SD1/(1+r)²+ ... + SDn/(1+r)^n

            // fin VA 
            if ($_SESSION['role'] == "Utilisateur") {
                $table .=  '<td class="">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" onclick="editPret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#pret-update-modal"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" onclick="confirmDataDeletePret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#PopupModalDeletePret"><i class="fa fa-trash-o m-r-5"></i> Supprimer</a>
                                <a class="dropdown-item" onclick="voirPrevisionPret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#prevision-pret-modal"><i class="fa fa-eye m-r-5"></i> voir prévision prêt</a>
                            </div>
                        </td>
                    </tr>';
            } elseif ($_SESSION['role'] == "Administrateur") {
                $table .=  '<td class="">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" onclick="voirPrevisionPret(' . $row['id_pret'] . ')" data-toggle="modal" data-target="#prevision-pret-modal"><i class="fa fa-trash-o m-r-5"></i> voir prévision prêt</a>
                            </div>
                        </td>
                    </tr>';
            }
        };
    }
    echo $table;
} elseif ($action == "DATA_DROWP") {
    $dataBailleur = mysqli_query($conn, "SELECT * 
                                FROM bailleurs;");
    $drowpBailleurs =  "";
    foreach ($dataBailleur as $row) {
        $drowpBailleurs .= '<option value="' . $row["id_bai"] . '">' . $row["nom"] . '</option>';
    };
    // echo $drowpBailleurs;
    $drowpdata = array();
    $drowpdata['drowpBailleurs'] = $drowpBailleurs;

    $dataProjet = mysqli_query($conn, "SELECT * 
                                       FROM `pret` 
                                       RIGHT JOIN projet_sub 
                                       ON pret.id_projet = projet_sub.id_projet_sub 
                                       WHERE pret.id IS NULL;");
    $drowpPret =  "";
    foreach ($dataProjet as $row) {
        $drowpPret .= '<option value="' . $row["id_projet_sub"] . '">' . $row["nom_projet_sub"] . '</option>';
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
    // if (isset($completeIdBailleurs) && isset($completeIdProjet)) {
    echo $completeStatus;
    echo $completeIdBailleurs;
    echo $completeIdProjet;

    $query = "INSERT INTO pret SET
        id= '',
        status = '$completeStatus',
        id_bailleurs = '$completeIdBailleurs',
        id_projet = '$completeIdProjet'";

    mysqli_query($conn, $query);
    // }
    echo "problème de requette sql";
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
                    `id_bai`, 
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
                    `id_projet_sub`, 
                    `nom_projet_sub`, 
                    `montant_projet_sub`,
                    YEAR(date_signature) AS annee_signature
            FROM `pret` 
            INNER JOIN projet_sub 
            ON pret.id_projet = projet_sub.id_projet_sub 
            INNER JOIN bailleurs 
            ON pret.id_bailleurs = bailleurs.id_bai
            WHERE pret.id = $id 
            LIMIT 1";

    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    $somme_upfront = $response['frais_rebours'] + $response['commission_arragement'] + $response['commission_initiale'] + $response['commission_service'] + $response['commission_engagement'] + $response['differenciel_interet'] + $response['commission_agent'];
    $table = "";
    $pre_table = '<div class="col-md-12">
    <div class="profile-view">

        <div class="row">
            <div class="col-md-4">
                <div class="profile-info-left">
                    <h3 class="user-name m-t-0 mb-0">' . $response['nom_projet_sub'] . '</h3>
                    <small class="text-muted">' . $response['secteur_intervation'] . '</small>
                    <div class="staff-id">Upfront commission</div>
                    <div class="staff-msg"><a>' . $somme_upfront . '</a></div>
                </div>
            </div>
            <div class="col-md-8">
                <ul class="personal-info">
                    <li>
                        <span class="title">Bailleur:</span>
                        <span class="text">' . $response['nom'] . '</span>
                    </li>
                    <li>
                        <span class="title">mode de remboursement:</span>
                        <span class="text">' . $response['mode_remboursement_principal'] . '</span>
                    </li>
                    <br>
                    <li>
                        <span class="title">periodisité de remboursement:</span>
                        <span class="text">' . $response['periodisite_de_remboursement'] . '</span>
                    </li>
                    <br>
                    <li>
                        <span class="title">montant de prêt:</span>
                        <span class="text">' . $response['montant_projet_sub'] . '</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>';
    // print_r($montant);
    // echo ($response);
    $maturite = $response['maturite'];
    $periode_grace = $response['periode_grace'];
    $frais_gestion = (int)$response['frais_gestion'];
    $periodisite_de_remboursement = $response['periodisite_de_remboursement'];
    $mode_remboursement_principal = $response['mode_remboursement_principal'];
    $annee_remboursement = $response['annee_signature'];
    $ENCt_1 = $response['montant_projet_sub'];
    // $PPt = 0;
    $PPt = $ENCt_1 / ($maturite - $periode_grace);
    $ENCt = 0;
    $c_ENC_t = 0;
    $interet = $response['taux_interet'];
    $PP_avec_periode_grace = 0;
    $c_ENC = array();
    $i = 0;
    $nb_paiement = 1;
    $commission_de_gestion =  $frais_gestion / $maturite;
    if ($mode_remboursement_principal == 'Remboursement constant du principal') {
        if ($periodisite_de_remboursement == 'Annuelle') {
            if (
                isset($response['montant_projet_sub']) &&
                isset($maturite) &&
                isset($response['taux_interet']) &&
                $response['montant_projet_sub'] > 0 &&
                $response['maturite'] > 0 &&
                $maturite > $periode_grace
            ) {
                for ($ligne = 0; $ligne < $maturite; $ligne++) {
                    while ($periode_grace > 0) {
                        $arrondiInteretAvecPG = ($ENCt_1 + $ENCt / 2) * $interet;
                        $arrondiTotalPaiementParPeriodeAvecPG = $arrondiInteretAvecPG + $commission_de_gestion + $ENCt_1;
                        $table .= '<tr>
                            <td>
                                <a href="#" class="avatar">' . $nb_paiement++ . '</a>
                            </td>
                            <td>' . $annee_remboursement . '</td>
                            <td>' . round($arrondiInteretAvecPG, 2) . '</td>
                            <td>' . $PP_avec_periode_grace . '</td>
                            <td>' . $commission_de_gestion . '</td>
                            <td>' . $c_ENC[] = $ENCt_1 . '</td>
                            <td>' . round($arrondiTotalPaiementParPeriodeAvecPG, 2) . '</td>
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
                    $arrodiEndcENC = end($c_ENC);
                    if ($arrodiEndcENC < 0) {
                        $arrodiEndcENC = 0;
                    }
                    $arrondiInteret = (((int)$c_ENC[$i - 1] + (int)end($c_ENC)) / 2) * $interet;
                    $arrondiTotalPaiementParPeriode = $arrondiInteret + $PPt + $commission_de_gestion + $arrodiEndcENC;
                    $table .= '<tr>
                            <td>    
                                <a href="#" class="avatar">' . $nb_paiement++ . '</a>
                            </td>
                            <td>' . $annee_remboursement . '</td>
                            <td>' . round($arrondiInteret, 2) . '</td>
                            <td>' . round($PPt, 2) . '</td>
                            <td>' . round($commission_de_gestion, 2) . '</td>
                            <td>' . round($arrodiEndcENC, 2)  . '</td> 
                            <td>' . round($arrondiTotalPaiementParPeriode, 2) . '</td> 
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
    } elseif ($mode_remboursement_principal == 'Annuité') {
        echo "annuité";
    } elseif ($mode_remboursement_principal == 'Remboursement principal en fin') {
        echo "Remboursement principal en fin";
    } elseif ($mode_remboursement_principal == 'Lamp Sum principal & intérêt simple') {
        # code...
    } elseif ($mode_remboursement_principal == 'Lamp Sum principal & intérêt composée') {
        # code...
    }

    $response['tbody_table'] = $table;
    $response['pre_table'] = $pre_table;
    // print_r($response['tbody_table']);
    echo json_encode($response);
}
