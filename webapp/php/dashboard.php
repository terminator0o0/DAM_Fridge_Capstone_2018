<?php 
    session_start();
    if(!isset($_SESSION['email']))
    {
        echo "<p>You are not an authorized user. Click <a href=../index.html> here</a>  to sign up.</p>";
        die();
    }
 ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DAM Fridge-Dashboard</title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../3rd-party/materialize/css/materialize.css" media="screen,projection" />
    <!-- Import full calendar.css -->
    <link rel='stylesheet' href='../3rd-party/fullcalendar-3.9.0/fullcalendar.css' />
    <link rel="stylesheet" type="text/css" href="../3rd-party/DataTables/datatables.min.css" />
    <!-- Import custom css-->
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="../css/page_template.css">
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body class="has-fixed-sidenav">
    <header>
        <div class="navbar-fixed">
            <nav class="navbar">
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo">Dashboard</a>
                    <ul id="nav-mobile" class="right">
<!--                         <li class="hide-on-med-and-down">
                            <a href="#!" data-target="NotificationDropdown" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i>
                            </a>
                        </li> -->
<!--                         <li>
                            <a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i>
                            </a>
                        </li> -->
                    </ul>
                    <a href="#!" data-target="sidenav-left" class="sidenav-trigger left">
                        <i class="material-icons white-text">menu</i>
                    </a>
                </div>
            </nav>
        </div>
        <ul id="sidenav-left" class="sidenav sidenav-fixed">
            <li>
                <a href="#!" class="logo-container white-text">
                    <i class="material-icons left">account_circle</i>
                </a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold waves-effect">
                        <a class="collapsible-header" tabindex="0">Pages
                       <i class="chevron material-icons">chevron_left</i> 
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a id="dashboard-start" href="#!" class="waves-effect active">Dashboard
                                    <i class="material-icons">web</i>
                                   </a>
                                </li>
                                <li>
                                    <a id="dashboard-start" href="viewfinder.php" class="waves-effect active">Viewfinder
                                    <i class="material-icons">camera</i>
                                   </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold waves-effect">
                        <a class="collapsible-header" tabindex="0">Calendar
                       <i class="chevron material-icons">chevron_left</i> 
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a id="calendar-start" href="#!" class="waves-effect active">Calendar
                                    <i class="material-icons">date_range</i>
                                   </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="bold waves-effect">
                        <a class="collapsible-header" tabindex="0">Account
                       <i class="chevron material-icons">chevron_left</i> 
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                    <a id="settings-start" href="#settings-wrapper" class="waves-effect active">Settings
                                    <i class="material-icons">settings</i></a>
                                </li>
                                <li>
                                    <a id="logout" href="logout.php" class="waves-effect active">Logout
                                    <i class="material-icons">exit_to_app</i></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </header>
    <main>
        <div class="container">
        <div class="row">
            <div class="col s12">
                <h2 class="white-text">Dashboard</h2>
            </div>
                <!-- <h2 class="white-text">Current Items</h2> -->
            <div id="table-wrapper" class="col s12">
                <div class="card large">
                    <div class="card-content">
                        <table id="table">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>    
            <div id="image-wrapper" class="col l4 m6 s12">
                <div class="card">
                    <div class="card-image">
                        <img id="image" class="materialboxed" src="">
                    </div>
                    <div class="card-content">
                        <span class="card-title">Latest Item</span>
                    </div>
                </div>
            </div>
            <div id="recipe-wrapper" class="col l4 m6 s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Recipe</span>
                        <div class="row">
                            <form action="recipeFinder.php" method="get">
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">search</i>
                                    <input placeholder="Find a recipe" name="recipe" autocomplete="on" required="">
                                </div>
                                <button id="SignInButton" class="btn waves-effect waves-light red" type="submit" name="action">Search
                                    <i class="material-icons right">send</i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>       
        </div>
            <div id="calendar-wrapper" class="row">
                <div class="col">
                    <h2 class="white-text">Month View</h2>
                    <div class="card card-panel">
                        <div id="calendar">
                        </div>
                    </div>
                </div>
            </div>
            <div id="settings-wrapper" class="row">
                <div class="col s12 m4">
                    <span class="settings-title white-text">Profile Settings</span>
                    <p class="white-text">Update your profile settings. </p>
                </div>
                <div class="col s12 m8">
                    <form action="" method="post">
                        <div class="settings-group">
                            <ul class="collapsible setting">
                                <li class="">
                                    <div class="collapsible-header" tabindex="0">
                                        <span>Username</span>
                                        <i class="material-icons caret right">keyboard_arrow_right</i>
                                    </div>
                                    <div class="collapsible-body" style="">
                                        <div class="input-field">
                                            <input id="username" class="validate" type="text">
                                            <label for="username">Username</label>
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <div class="collapsible-header" tabindex="0">
                                        <span>Password</span>
                                        <i class="material-icons caret right">keyboard_arrow_right</i>
                                    </div>
                                    <div class="collapsible-body" style="">
                                        <div class="input-field">
                                            <input id="password" class="validate" type="Password">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s6 m6">
                    <h5 class="white-text">DAM Fridge</h5>
                    <p class="grey-text text-lighten-4">Engineering capstone 2018</p>
                </div>
                <div class="col s6 m3">
                    <h5>About</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-4" href="#!">Team</a></li>
                        <li><a class="grey-text text-lighten-4" href="#!">Docs</a></li>
                    </ul>
                </div>
                <div class="col s6 m3">
                    <h5>Contact</h5>
                    <ul>
                        <li><a class="grey-text text-lighten-4" href="https://github.com/dinkar-sharma/DAM_Fridge_Capstone_2018">Github</a></li>
                        <li><a class="grey-text text-lighten-4" href="#!">Linkedin</a></li>
                        <li><a class="grey-text text-lighten-4" href="#!">Email</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="container">
                © 2018 DAM Fridge
            </div>
        </div>
    </footer>
</body>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../3rd-party/materialize/js/materialize.js"></script>
<script type="text/javascript" src="../js/dashboard.js"></script>
<script src='../3rd-party/fullcalendar-3.9.0/lib/moment.min.js'></script>
<script src='../3rd-party/fullcalendar-3.9.0/fullcalendar.js'></script>
<script type="text/javascript" src="../3rd-party/DataTables/datatables.js"></script>

</html>