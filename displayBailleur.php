<?php
require_once 'config.php';
global $conn;
$bailleurs = mysqli_query($conn, "SELECT * FROM bailleurs");
$i = 1;
$table =  "";
foreach ($bailleurs as $row) {
    $table .= '<tr id=bailleur-' . $row["id"] . '>
                    <td>' . $i++ . '</td>
                    <td>' . $row["nom"] . '</td>
                    <td>' . $row["part_financer"] . '</td>
                    <td>' . $row["maturite"] . '</td>
                    <td>' . $row["periode_grace"] . '</td>
                    <td>' . $row["taux_interet"] . '</td>
                    <td>' . $row["differenciel_interet"] . '</td>
                    
                    <td>
                        <button class="btn btn-dark" onclick="editBailleur(' . $row['id'] . ')" data-toggle="modal" data-target="#bailleur-update-modal">Editer</button>
                        <button class="btn btn-danger" onclick="deleteBailleur(' . $row['id'] . ')">Supprimer</button>
                    </td>
                </tr>';
};
echo $table;
