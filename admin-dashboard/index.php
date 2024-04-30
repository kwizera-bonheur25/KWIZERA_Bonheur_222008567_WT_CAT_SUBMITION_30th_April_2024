<!DOCTYPE html>
<html>
    <head>
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://fonts.google.com/specimen/Open+Sans?query=open+sans">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        
    </head>
    <body>

        <div class="grid-container">
            <header class="header">
                <div class="menu-icon" onclick="openSidebar()">
                    <i class="fa-solid fa-bars"></i>
                </div>
                <div class="header-left">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
                <div class="header-right">
                    <i class="fa-solid fa-bell"></i>
                    <i class="fa-solid fa-envelope"></i>
                    <i class="fa-solid fa-user-large"></i>
                </div>
            </header>
            <aside id="sidebar">
                <div class="sidebar-title">
                    <div class="sidebar-brand">
                        <i class="fa-solid fa-face-smile"></i>LOGO
                    </div>
                </div>
                   <div class="close"> <i class="fa-solid fa-xmark" onclick="closeSidebar()"></i></div>
                    <ul class="sidebar-list">
                        <li class="sidebar-list-item">
                            <a href="#">
                                <i class="fa-solid fa-gauge"></i> dashboard
                            </a>
                        </li>
                        <li class="sidebar-list-item">
                            <a href='?page=inmates'><i class="fa-solid fa-gauge"></i> Inmates</a>
                        </li>
                        <li class="sidebar-list-item">
                            <a href="?page=prisons">
                                <i class="fa-solid fa-gauge"></i> Prisons
                            </a>
                        </li>
                        <li class="sidebar-list-item">
                            <a href='?page=display-employee'>
                                <i class="fa-solid fa-gauge"></i> Employees
                            </a>
                        </li>
                        <li class="sidebar-list-item">
                            <a href="#">
                                <i class="fa-solid fa-gauge"></i> Users
                            </a>
                        </li>
                        <li class="sidebar-list-item">
                            <a href="#">
                                <i class="fa-solid fa-gauge"></i> Log out
                            </a>
                        </li>
                    </ul>
            </aside>
            <main class="main-container">
                <div class="main-title">
                    <h2>DASHBOARD</h2>
                </div>
                <div>
                         <?php 
                         if (isset($_GET['page']) && $_GET['page'] === 'display_inmates.php') {
                             include '../inmates.php';
                         } elseif (isset($_GET['page']) && $_GET['page'] === 'add-inmate') {
                             include '../inmates.php';
                         } elseif (isset($_GET['page']) && $_GET['page'] === 'update-inmate') {
                            include '../update-inmate.php';
                        } elseif (isset($_GET['page']) && $_GET['page'] === 'prisons') {
                            include '../display-prisons.php';
                        } elseif (isset($_GET['page']) && $_GET['page'] === 'add-prison') {
                            include '../add-prison.html';
                        } 
                        elseif (isset($_GET['page']) && $_GET['page'] === 'display-employee') {
                            include '../display-employees.php';
                        }
                        elseif (isset($_GET['page']) && $_GET['page'] === 'logout') {
                            include '../logout.php';
                        } 
                         else {
                             include '../display_inmates.php';
                         }
                     ?>

                </div>
                </div>
            </main>
        </div>
        <script src="./js/script.js"></script>
    </body>
</html>