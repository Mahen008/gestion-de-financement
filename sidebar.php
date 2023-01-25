<?php
$page_courante = $_SERVER['REQUEST_URI'];
// var_dump($page_courante);
// die();
?>
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">Menu</li>
                <li class=<?php
                            if ($page_courante == "/index-2.php") {
                                echo "active";
                            }
                            ?>>
                    <a href="index-2.php"><i class="fa fa-dashboard"></i> <span>Acceuil</span></a>
                </li>
                <?php if ($_SESSION['role'] == "Administrateur") { ?>
                    <li class=<?php
                                if ($page_courante == "/users.php") {
                                    echo "active";
                                }
                                ?>>
                        <a href="users.php"><i class="fa fa-user"></i> <span>Utilisateurs</span></a>
                    </li>
                <?php } ?>
                <li class=<?php
                            if ($page_courante == "/fmi-plafond.php") {
                                echo "active";
                            }
                            ?>>
                    <a href="fmi-plafond.php"><i class="fa fa-globe"></i> <span>Plafond fmi</span></a>
                </li>
                <li class=<?php
                            if ($page_courante == "/bailleurs.php") {
                                echo "active";
                            }
                            ?>>
                    <a href="bailleurs.php"><i class="fa fa-money"></i> <span>Bailleurs</span></a>
                </li>
                <li class=<?php
                            if ($page_courante == "/secteur.php") {
                                echo "active";
                            }
                            ?>>
                    <a href="secteur.php"><i class="fa fa-shopping-cart"></i> <span>Secteurs</span></a>
                </li>
                <li class=<?php
                            if ($page_courante == "/projet.php") {
                                echo "active";
                            }
                            ?>>
                    <a href="projet.php"><i class="fa fa-calendar"></i> <span>Projet</span></a>
                </li>
                <li class=<?php
                            if ($page_courante == "/previsionPret.php") {
                                echo "active";
                            }
                            ?>>
                    <a href="previsionPret.php"><i class="fa fa-hospital-o"></i> <span>Prêt</span></a>
                </li>
                <!-- <li>
                    <a href="concessionnalite.php"><i class="fa fa-calendar-check-o"></i> <span>Concessionnalité de prêt</span></a>
                </li> -->
            </ul>
        </div>
    </div>
</div>