<?php include("header.php"); ?>

<body>
    <div class="container-fluid">

        <!-- Button trigger modal -->
        <div id="modalBtn">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bailleur-modal">
                ajouter
            </button>
        </div><br>
        <!-- Modal -->
        <div class="modal fade" role="dialog" id="bailleur-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enregistrement bailleur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formBailleur">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group p-2">
                                    <label for="competeName">nom</label>
                                    <input type="text" class="form-control" id="competeName" name="competeName" placeholder="Entrer le nom du bailleur">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeSecteurIntervation">secteur d'intervation</label>
                                    <input type="text" class="form-control" id="competeSecteurIntervation" name="competeSecteurIntervation" placeholder="Entrer son secteur d'intervation">
                                </div>
                                <div class="form-group p-2">
                                    <label for="completeTypeFinancement">type de financement</label>
                                    <input type="text" class="form-control" id="completeTypeFinancement" name="completeTypeFinancement" placeholder="Entrer le part financer">
                                </div>
                                <div class="form-group p-2">
                                    <label for="completePartFinance">part Financer</label>
                                    <input type="text" class="form-control" id="completePartFinance" name="completePartFinance" placeholder="Entrer le part financer">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeMaturite">maturité</label>
                                    <input type="text" class="form-control" id="competeMaturite" name="competeMaturite" placeholder="Entrer la maturité">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competePeriodeGrace">période de grace</label>
                                    <input type="text" class="form-control" id="competePeriodeGrace" name="competePeriodeGrace" placeholder="Entrer la période de grâce">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeTauxInteret">taux d'intéret</label>
                                    <input type="text" class="form-control" id="competeTauxInteret" name="competeTauxInteret" placeholder="Entrer le taux d'intéret">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeDifferencielInteret">differenciel intéret</label>
                                    <input type="text" class="form-control" id="competeDifferencielInteret" name="competeDifferencielInteret" placeholder="Entrer la differenciel d'intéret">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeFraisDeGestion">frais de gestion</label>
                                    <input type="text" class="form-control" id="competeFraisDeGestion" name="competeFraisDeGestion" placeholder="Entrer le frais de gestion">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeComissionEngagement">comission d'engagement</label>
                                    <input type="text" class="form-control" id="competeComissionEngagement" name="competeComissionEngagement" placeholder="Entrer la comission d'engagement">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeCommissionDeService">commission de service</label>
                                    <input type="text" class="form-control" id="competeCommissionDeService" name="competeCommissionDeService" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeCommissionInitiale">commission initiale</label>
                                    <input type="text" class="form-control" id="competeCommissionInitiale" name="competeCommissionInitiale" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeCommissionArragement">commission d'arragement</label>
                                    <input type="text" class="form-control" id="competeCommissionArragement" name="competeCommissionArragement" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeFraisExposition">frais d'exposition</label>
                                    <input type="text" class="form-control" id="competeFraisExposition" name="competeFraisExposition" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeCommissionAgent">commission d'agent</label>
                                    <input type="text" class="form-control" id="competeCommissionAgent" name="competeCommissionAgent" placeholder="Entrer le commission d'agent">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeMaturiteLettreCredit">maturité de lettre de crédit</label>
                                    <input type="text" class="form-control" id="competeMaturiteLettreCredit" name="competeMaturiteLettreCredit" placeholder="Entrer la maturité de lettre de crédit">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeFraisRefLettreCredit">frais ref lettre crédit</label>
                                    <input type="text" class="form-control" id="competeFraisRefLettreCredit" name="competeFraisRefLettreCredit" placeholder="Entrer le frais ref lettre crédit">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeFraisDeRebours">frais de rebours</label>
                                    <input type="text" class="form-control" id="competeFraisDeRebours" name="competeFraisDeRebours" placeholder="Entrer le frais de rebours">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competePrimeAssurenceFraisGarantie">prime d'assurence frais garantie</label>
                                    <input type="text" class="form-control" id="competePrimeAssurenceFraisGarantie" name="competePrimeAssurenceFraisGarantie" placeholder="Entrer le prime d'assurence frais ganratie">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competePrimeAttenuationRisqueCredit">prime attenuation risque credit</label>
                                    <input type="text" class="form-control" id="competePrimeAttenuationRisqueCredit" name="competePrimeAttenuationRisqueCredit" placeholder="Entrer le prime attenuation frais de garantie">
                                </div>
                                <div class="form-group p-2">
                                    <label for="competeFraisLiesMepLettreCredit">frais liés mep lettre crédit</label>
                                    <input type="text" class="form-control" id="competeFraisLiesMepLettreCredit" name="competeFraisLiesMepLettreCredit" placeholder="Entrer le frais liés mep lettre crédit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="enregistrerBailleur">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal update -->
        <div class="modal fade" role="dialog" id="bailleur-update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modification bailleur</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="formUpdateBailleur">
                            <div class="row d-flex flex-wrap justify-content-around p-3">
                                <div class="form-group p-2">
                                    <label for="updateName">nom</label>
                                    <input type="text" class="form-control" id="updateName" name="updateName" placeholder="Entrer le nom du bailleur">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateSecteurIntervation">secteur d'intervation</label>
                                    <input type="text" class="form-control" id="updateSecteurIntervation" name="updateSecteurIntervation" placeholder="Entrer son secteur d'intervation">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateTypeFinancement">type de financement</label>
                                    <input type="text" class="form-control" id="updateTypeFinancement" name="updateTypeFinancement" placeholder="Entrer le part financer">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePartFinance">part Financer</label>
                                    <input type="text" class="form-control" id="updatePartFinance" name="updatePartFinance" placeholder="Entrer le part financer">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateMaturite">maturité</label>
                                    <input type="text" class="form-control" id="updateMaturite" name="updateMaturite" placeholder="Entrer la maturité">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePeriodeGrace">période de grace</label>
                                    <input type="text" class="form-control" id="updatePeriodeGrace" name="updatePeriodeGrace" placeholder="Entrer la période de grâce">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateTauxInteret">taux d'intéret</label>
                                    <input type="text" class="form-control" id="updateTauxInteret" name="updateTauxInteret" placeholder="Entrer le taux d'intéret">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateDifferencielInteret">differenciel intéret</label>
                                    <input type="text" class="form-control" id="updateDifferencielInteret" name="updateDifferencielInteret" placeholder="Entrer la differenciel d'intéret">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisDeGestion">frais de gestion</label>
                                    <input type="text" class="form-control" id="updateFraisDeGestion" name="updateFraisDeGestion" placeholder="Entrer le frais de gestion">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateComissionEngagement">comission d'engagement</label>
                                    <input type="text" class="form-control" id="updateComissionEngagement" name="updateComissionEngagement" placeholder="Entrer la comission d'engagement">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionDeService">commission de service</label>
                                    <input type="text" class="form-control" id="updateCommissionDeService" name="updateCommissionDeService" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionInitiale">commission initiale</label>
                                    <input type="text" class="form-control" id="updateCommissionInitiale" name="updateCommissionInitiale" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionArragement">commission d'arragement</label>
                                    <input type="text" class="form-control" id="updateCommissionArragement" name="updateCommissionArragement" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisExposition">frais d'exposition</label>
                                    <input type="text" class="form-control" id="updateFraisExposition" name="updateFraisExposition" placeholder="Entrer le frais d'exposition">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateCommissionAgent">commission d'agent</label>
                                    <input type="text" class="form-control" id="updateCommissionAgent" name="updateCommissionAgent" placeholder="Entrer le commission d'agent">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateMaturiteLettreCredit">maturité de lettre de crédit</label>
                                    <input type="text" class="form-control" id="updateMaturiteLettreCredit" name="updateMaturiteLettreCredit" placeholder="Entrer la maturité de lettre de crédit">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisRefLettreCredit">frais ref lettre crédit</label>
                                    <input type="text" class="form-control" id="updateFraisRefLettreCredit" name="updateFraisRefLettreCredit" placeholder="Entrer le frais ref lettre crédit">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisDeRebours">frais de rebours</label>
                                    <input type="text" class="form-control" id="updateFraisDeRebours" name="updateFraisDeRebours" placeholder="Entrer le frais de rebours">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePrimeAssurenceFraisGarantie">prime d'assurence frais garantie</label>
                                    <input type="text" class="form-control" id="updatePrimeAssurenceFraisGarantie" name="updatePrimeAssurenceFraisGarantie" placeholder="Entrer le prime d'assurence frais ganratie">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updatePrimeAttenuationRisqueCredit">prime attenuation risque credit</label>
                                    <input type="text" class="form-control" id="updatePrimeAttenuationRisqueCredit" name="updatePrimeAttenuationRisqueCredit" placeholder="Entrer le prime attenuation frais de garantie">
                                </div>
                                <div class="form-group p-2">
                                    <label for="updateFraisLiesMepLettreCredit">frais liés mep lettre crédit</label>
                                    <input type="text" class="form-control" id="updateFraisLiesMepLettreCredit" name="updateFraisLiesMepLettreCredit" placeholder="Entrer le frais liés mep lettre crédit">
                                </div>
                            </div>
                            <input type="hidden" name="" id="hidden-update-id-bailleur">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="ModifierBailleur" onclick="updateBalleur()">Modifier</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <!-- <table border="1" class="table table-striped" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true"> -->
                <table border="1" class="table table-striped" id="table-bailleur" data-toggle="table">
                    <thead>
                        <tr>
                            <th data-sortable="true" data-field="id">ID</th>
                            <th data-sortable="true" data-field="nom">nom</th>
                            <!-- <th data-sortable="true" data-field="secteur_intervation">secteur d'intervation</th> -->
                            <!-- <th data-sortable="true" data-field="type_definancement">type definancement</th> -->
                            <th data-sortable="true" data-field="part_financer">part financer</th>
                            <th data-sortable="true" data-field="maturite">maturité</th>
                            <th data-sortable="true" data-field="periode_de_grace">période de grace</th>
                            <th data-sortable="true" data-field="taux_interet">taux d'intéret</th>
                            <th data-sortable="true" data-field="differenciel_interet">differenciel intéret</th>
                            <!-- <th data-sortable="true" data-field="frais_de_gestion">frais de gestion</th> -->
                            <!-- <th data-sortable="true" data-field="comission_engagement">comission d'engagement</th> -->
                            <!-- <th data-sortable="true" data-field="comission_service">comission de service</th> -->
                            <!-- <th data-sortable="true" data-field="comission_initiale">comission initiale</th> -->
                            <!-- <th data-sortable="true" data-field="commission_arragement">commission d'arragement</th> -->
                            <!-- <th data-sortable="true" data-field="frais_exposition">frais d'exposition</th> -->
                            <!-- <th data-sortable="true" data-field="commission_agent">commission d'agent</th> -->
                            <!-- <th data-sortable="true" data-field="maturite_de_lettre_de_credit">maturité de lettre de crédit</th> -->
                            <!-- <th data-sortable="true" data-field="frais_ref_lettre_credit">frais ref lettre crédit</th> -->
                            <!-- <th data-sortable="true" data-field="frais_de_rebours">frais de rebours</th> -->
                            <!-- <th data-sortable="true" data-field="prime_assurence_frais_garantie">prime d'assurence frais garantie</th> -->
                            <!-- <th data-sortable="true" data-field="prime_attenuation_risque_de_crédit">prime attenuation risque de crédit</th> -->
                            <!-- <th data-sortable="true" data-field="frais_lies_mep_lettre_credit">frais liés mep lettre crédit</th> -->
                            <th class="fixed">Action</th>
                        </tr>
                    </thead>
                    <tbody id="bailleurs">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>