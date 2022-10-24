<?php

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
$SDi = array();
$element_don;
// const taux_actualisation = 0.05;
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
                    $SDi[] = ((($ENCt_1 + $ENCt / 2) * $interet) + $PP_avec_periode_grace + $commission_de_gestion) / (1 + 0.05);
                    $periode_grace--;
                    $maturite--;
                    // $annee_remboursement++;
                    $i++;
                }
                $c_ENC[] = (int)$c_ENC[$i - 1] - $PPt;
                $SDi[] = (((((int)$c_ENC[$i - 1] + (int)end($c_ENC)) / 2) * $interet) + $PPt + $commission_de_gestion) / (1 + 0.05);
                end($c_ENC);

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
