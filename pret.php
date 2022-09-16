<?php include("header.php"); ?>


<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <!-- <table border="1" class="table table-striped" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true"> -->
                <table border="1" class="table table-striped" id="table-bailleur" data-toggle="table">
                    <thead>
                        <tr>
                            <th data-sortable="true" data-field="id">#</th>
                            <th data-sortable="true" data-field="nom">nom</th>
                            <!-- <th data-sortable="true" data-field="secteur_intervation">secteur d'intervation</th> -->
                            <!-- <th data-sortable="true" data-field="type_definancement">type definancement</th> -->
                            <th data-sortable="true" data-field="libelle">libelle</th>
                            <th data-sortable="true" data-field="maturite">maturité</th>
                            <th data-sortable="true" data-field="periode_de_grace">période de grace</th>
                            <!-- <th data-sortable="true" data-field="taux_interet">taux d'intéret</th> -->
                            <!-- <th data-sortable="true" data-field="differenciel_interet">differenciel intéret</th> -->
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
                    <tbody id="pret">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>