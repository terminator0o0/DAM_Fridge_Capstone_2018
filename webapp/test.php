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
<header>
    <div class="navbar-fixed">
        <nav class="navbar">
            <div class="nav-wrapper"><a href="#!" class="brand-logo">Dashboard</a>
                <ul id="nav-mobile" class="right">
                    <li class="hide-on-med-and-down"><a href="#!" data-target="dropdown1" class="dropdown-trigger waves-effect"><i class="material-icons">notifications</i></a>
                        <div id="dropdown1" class="dropdown-content notifications" tabindex="0">
                            <div class="notifications-title" tabindex="0">notifications</div>
                            <div class="card" tabindex="0">
                                <div class="card-content"><span class="card-title">Joe Smith made a purchase</span>
                                    <p>Content</p>
                                </div>
                                <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
                            </div>
                            <div class="card" tabindex="0">
                                <div class="card-content"><span class="card-title">Daily Traffic Update</span>
                                    <p>Content</p>
                                </div>
                                <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
                            </div>
                            <div class="card" tabindex="0">
                                <div class="card-content"><span class="card-title">New User Joined</span>
                                    <p>Content</p>
                                </div>
                                <div class="card-action"><a href="#!">view</a><a href="#!">dismiss</a></div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#!" data-target="chat-dropdown" class="dropdown-trigger waves-effect"><i class="material-icons">settings</i></a>
                        <div id="chat-dropdown" class="dropdown-content dropdown-tabbed" tabindex="0">
                            <ul class="tabs tabs-fixed-width" tabindex="0">
                                <li class="tab col s3"><a href="#settings">Settings</a></li>
                                <li class="tab col s3"><a href="#friends" class="active">Friends</a></li>
                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                                <li class="indicator" style="left: 0px; right: 0px;"></li>
                            </ul>
                            <div id="settings" class="col s12" tabindex="0" style="display: none;">
                                <div class="settings-group">
                                    <div class="setting">Night Mode
                                        <div class="switch right">
                                            <label>
                                                <input type="checkbox"><span class="lever"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="setting">Beta Testing
                                        <label class="right">
                                            <input type="checkbox"><span></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="friends" class="col s12 active" tabindex="0">
                                <ul class="collection flush">
                                    <li class="collection-item avatar">
                                        <div class="badged-circle online"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/portrait1.jpg?8824429826897922287" alt="avatar" class="circle"></div><span class="title">Jane Doe</span>
                                        <p class="truncate">Lo-fi you probably haven't heard of them</p>
                                    </li>
                                    <li class="collection-item avatar">
                                        <div class="badged-circle"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/portrait2.jpg?8824429826897922287" alt="avatar" class="circle"></div><span class="title">John Chang</span>
                                        <p class="truncate">etsy leggings raclette kickstarter four dollar toast</p>
                                    </li>
                                    <li class="collection-item avatar">
                                        <div class="badged-circle"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/portrait3.jpg?8824429826897922287" alt="avatar" class="circle"></div><span class="title">Lisa Simpson</span>
                                        <p class="truncate">Raw denim fingerstache food truck chia health goth synth</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul><a href="#!" data-target="sidenav-left" class="sidenav-trigger left"><i class="material-icons black-text">menu</i></a>
            </div>
        </nav>
    </div>
    <ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(0%);">
        <li><a href="/pages/admin-dashboard" class="logo-container">Admin<i class="material-icons left">spa</i></a></li>
        <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
                <li class="bold waves-effect active"><a class="collapsible-header" tabindex="0">Pages<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body" style="display: block;">
                        <ul>
                            <li><a href="/pages/admin-dashboard" class="waves-effect active">Dashboard<i class="material-icons">web</i></a></li>
                            <li><a href="/pages/admin-fixed-chart" class="waves-effect">Fixed Chart<i class="material-icons">list</i></a></li>
                            <li><a href="/pages/admin-grid" class="waves-effect">Grid<i class="material-icons">dashboard</i></a></li>
                            <li><a href="/pages/admin-chat" class="waves-effect">Chat<i class="material-icons">chat</i></a></li>
                        </ul>
                    </div>
                </li>
                <li class="bold waves-effect"><a class="collapsible-header" tabindex="0">Charts<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/pages/admin-line-charts" class="waves-effect">Line Charts<i class="material-icons">show_chart</i></a></li>
                            <li><a href="/pages/admin-bar-charts" class="waves-effect">Bar Charts<i class="material-icons">equalizer</i></a></li>
                            <li><a href="/pages/admin-area-charts" class="waves-effect">Area Charts<i class="material-icons">multiline_chart</i></a></li>
                            <li><a href="/pages/admin-doughnut-charts" class="waves-effect">Doughnut Charts<i class="material-icons">pie_chart</i></a></li>
                            <li><a href="/pages/admin-financial-charts" class="waves-effect">Financial Charts<i class="material-icons">euro_symbol</i></a></li>
                            <li><a href="/pages/admin-interactive-charts" class="waves-effect">Interactive Charts<i class="material-icons">touch_app</i></a></li>
                        </ul>
                    </div>
                </li>
                <li class="bold waves-effect"><a class="collapsible-header" tabindex="0">Tables<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/pages/admin-fullscreen-table" class="waves-effect">Fullscreen with Chart<i class="material-icons">show_chart</i></a></li>
                            <li><a href="/pages/admin-table-custom-elements" class="waves-effect">Table with Custom Elements<i class="material-icons">settings</i></a></li>
                        </ul>
                    </div>
                </li>
                <li class="bold waves-effect"><a class="collapsible-header" tabindex="0">Calendar<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/pages/admin-calendar" class="waves-effect">Calendar<i class="material-icons">cloud</i></a></li>
                        </ul>
                    </div>
                </li>
                <li class="bold waves-effect"><a class="collapsible-header" tabindex="0">Headers<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/pages/admin-header-tabbed" class="waves-effect">Tabbed<i class="material-icons">tab</i></a></li>
                            <li><a href="/pages/admin-header-metrics" class="waves-effect">Metrics<i class="material-icons">web</i></a></li>
                            <li><a href="/pages/admin-header-search" class="waves-effect">Search<i class="material-icons">search</i></a></li>
                        </ul>
                    </div>
                </li>
                <li class="bold waves-effect"><a class="collapsible-header" tabindex="0">Account<i class="material-icons chevron">chevron_left</i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="/pages/admin-log-in" class="waves-effect">Log In<i class="material-icons">person</i></a></li>
                            <li><a href="/pages/admin-settings" class="waves-effect">Settings<i class="material-icons">settings</i></a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</header>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="../3rd-party/materialize/js/materialize.js"></script>
<script type="text/javascript" src="../js/dashboard.js"></script>
<script src='../3rd-party/fullcalendar-3.9.0/lib/moment.min.js'></script>
<script src='../3rd-party/fullcalendar-3.9.0/fullcalendar.js'></script>
<script type="text/javascript" src="../3rd-party/DataTables/datatables.js"></script>

</html>