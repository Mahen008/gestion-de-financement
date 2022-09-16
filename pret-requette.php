<?php
require_once 'config.php';

global $conn;
extract($_POST);

if ($action == 'READ') {

    $pret = mysqli_query($conn, "SELECT * FROM categorie INNER JOIN bailleurs ON categorie.id_bailleurs = bailleurs.id");
    $i = 1;
    $table =  "";
    foreach ($pret as $row) {
        $table .= '<tr>
                    <td>' . $i++ . '</td>
                    <td>' . $row["nom"] . '</td>
                    <td>' . $row["libelle"] . '</td>
                    <td>' . $row["maturite"] . '</td>
                    <td>' . $row["periode_grace"] . '</td>
                    
                    <td>
                        <button class="btn btn-dark">voir détail</button>
                    </td>
                </tr>';
    };
    echo $table;
}
