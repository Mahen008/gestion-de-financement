<?php
require_once 'config.php';

global $conn;
extract($_POST);

if ($action == 'READ') {

    $pret = mysqli_query($conn, "SELECT 
                                    projet_sub.id AS id,
                                    nom_projet_sub, 
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
                                ON projet_sub.id_bailleurs = bailleurs.id;");
    $i = 1;
    $table =  "";
    foreach ($pret as $row) {
        $table .= '<tr id=projet_sub-' . $row["id"] . '>
                    <td>' . $i++ . '</td>
                    <td>' . $row["nom_projet_sub"] . '</td>
                    <td>' . $row["montant"] . '</td>
                    <td>' . $row["statut"] . '</td>
                    <td>' . $row["nom"] . '</td>
                    <td>' . $row["maturite"] . '</td>
                    <td>' . $row["periode_grace"] . '</td>
                    <td>' . $row["mode_remboursement_principal"] . '</td>
                    <td>' . $row["periodisite_de_remboursement"] . '</td>
                    <td>' . $row["taux_interet"] . '</td>
                    <td>' . $row["frais_gestion"] . '</td>
                    <td>' . $row["commission_initiale"] . '</td> 
                    <td>' . $row["commission_agent"] . '</td> 
                    <td></td> 
                    
                    <td>
                        <button class="btn btn-dark" onclick="voirPrevisionPret(' . $row['id'] . ')" data-toggle="modal" data-target="#prevision-pret-modal">voir prévision prêt</button>
                    </td>
                </tr>';
    };
    echo $table;
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
    $PPt = 0;
    $ENCt = 0;
    $interet = $response['taux_interet'];
    $PP_avec_periode_grace = 0;

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
                    // for ($ligne_periode_grace = 0; $ligne_periode_grace < $periode_grace; $ligne_periode_grace++) {
                    while ($periode_grace > 0) {
                        $table .= '<tr>
                            <td>' . $annee_remboursement . '</td>
                            <td>' . ($ENCt_1 + $ENCt / 2) * $interet . '</td>
                            <td>' . $PP_avec_periode_grace . '</td>
                            <td>commission de gestion</td>
                            <td>' . $ENCt_1 - $PPt . '</td>
                        </tr>';
                        $periode_grace--;
                        $maturite--;
                        $annee_remboursement++;
                    }
                    if ($periode_grace == 0 && $ligne == 0) {
                        $PPt = $response['montant'];
                    }
                    // if ($ligne !=0) {
                    //     $ENCt_1 = ;
                    // }
                    $table .= '<tr>
                            <td>' . $annee_remboursement . '</td>
                            <td>' . ($ENCt_1 + $ENCt / 2) * $interet . '</td>
                            <td>' . $PPt / ($maturite) . '</td>
                            <td>f</td>
                            <td>' .  $ENCt_1 - $PPt . '</td>
                        </tr>';
                    $annee_remboursement++;

                    // $ENCt = $ENCt_1;
                    // $PPt = $PPt / ($maturite - $periode_grace);
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
