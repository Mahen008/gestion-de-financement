<?php
require_once 'config.php';

global $conn;
extract($_POST);
// print_r($action);

if ($action == 'READ') {

    $pret = mysqli_query($conn, "SELECT * 
                                FROM pret 
                                INNER JOIN bailleurs 
                                ON pret.id_bailleurs = bailleurs.id 
                                INNER JOIN projet_sub 
                                ON pret.id_projet = projet_sub.id;");
    $i = 1;
    $table =  "";
    foreach ($pret as $row) {
        $table .= '<tr id=projet_sub-' . $row["id"] . '>
                        <td>' . $i++ . '</td>
                        <td>' . $row["nom_projet_sub"] . '</td>
                        <td>' . $row["nom"] . '</td>
                        <td>' . $row["montant"] . '</td>';
        echo $row["status"];
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
                        <td>' . $row["taux_interet"] . '</td>
                        <td>' . $row["frais_gestion"] . '</td>
                        
                        <td class="text-right">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-department.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_department"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                <a class="dropdown-item" onclick="voirPrevisionPret(' . $row['id'] . ')" data-toggle="modal" data-target="#prevision-pret-modal"><i class="fa fa-trash-o m-r-5"></i> voir prévision prêt</a>
                            </div>
                        </td>
                    </tr>';
    };
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
} elseif ($action == "CREATE") {
    $query = "INSERT INTO pret SET
    id= '',
    status = '$completeStatus',
    id_bailleurs = '$completeIdBailleurs',
    id_projet = '$completeIdProjet'";

    mysqli_query($conn, $query);
} elseif ($action == "PREVISION_PRET") {
    $id = $_POST['id'];
    $query = "SELECT 
                projet_sub.id,
                nom_projet_sub, 
                YEAR(date_signature) AS annee_signature,
                montant, 
                statut, 
                nom, 
                maturite, 
                periode_grace, 
                mode_remboursement_principal, 
                periodisite_de_remboursement, 
                taux_interet, 
                frais_gestion, 
                commission_initiale, 
                commission_agent 
            FROM projet_sub 
            INNER JOIN bailleurs 
            ON projet_sub.id_bailleurs = bailleurs.id 
            WHERE projet_sub.id = $id 
            LIMIT 1";

    $resultat = mysqli_query($conn, $query);
    $response = array();
    while ($row = mysqli_fetch_assoc($resultat)) {
        $response = $row;
    }
    $table = "";
    // print_r($montant);
    // print_r($response['']);
    $maturite = $response['maturite'];
    $periode_grace = $response['periode_grace'];
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
                            <td>commission de gestion</td>
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
                            <td>f</td>
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
