<?php
session_start();
if (isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == "logout") {
    session_unset();
    session_destroy();
    header('Location: login.php');
}
if (!isset($_SESSION['role']) || empty($_SESSION['role'])) {
    header("Location: http://localhost:8000/login.php");
    exit;
}
?>
<div class="header">
    <div class="header-left">
        <a href="index-2.php" class="logo">
            <img src="assets/img/tresor.jpg" class="rounded-circle" width="35" height="35" alt=""> <span>DDP</span>
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
    <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu float-right">

        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="assets/img/<?php echo $_SESSION['img']; ?>" width="40" alt="Admin">
                    <span class="status online"></span></span>
                <?php if ($_SESSION['role'] == "Administrateur") { ?>
                    <span>Admin</span>
                <?php } else { ?>
                    <span>User</span>
                <?php } ?>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="profile.html">Mon Profile</a>
                <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                <a class="dropdown-item" href="navbar.php?action=logout">Déconnecté</a>
            </div>
        </li>
    </ul>
    <div class="dropdown mobile-user-menu float-right">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="profile.html">Mon Profile</a>
            <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
            <a class="dropdown-item" href="login.html">Déconnecté</a>
        </div>
    </div>
</div>