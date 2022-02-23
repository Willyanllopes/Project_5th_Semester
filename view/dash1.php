<?php
include('../model/session.php')
?>
<html lang="en" style="--scrollbar-width:15px; --moz-scrollbar-thin:15px;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
        <base href="../">
        <title>Dashboard - Ace Admin</title>
        <!-- include common vendor stylesheets & fontawesome -->
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" data-rtl="./dist/css/rtl/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/regular.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/brands.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/solid.min.css">
        <!-- include vendor stylesheets used in "Dashboard" page. see "/views//pages/partials/dashboard/@vendor-stylesheets.hbs" -->
        <!-- include fonts -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600&amp;display=swap">
        <!-- ace.css -->
        <link rel="stylesheet" type="text/css" href="./dist/css/ace.min.css">
        <!-- favicon -->
        <link rel="icon" type="image/png" href="./assets/favicon.png">
        <!-- "Dashboard" page styles, specific to this page for demo only -->
        <style>
            .piechart-legends ul {
            list-style: none;
            margin-left: 1.5rem;
            padding-left: 0;
            }
            .piechart-legends li {
            margin-bottom: 0.25rem;
            white-space: nowrap;
            }
            .piechart-legends span {
            display: inline-block;
            vertical-align: middle;
            border-radius: 1rem;
            width: 0.5rem;
            height: 0.5rem;
            margin-right: 0.5rem;
            }
            .piechart-legends-info li {
            margin-bottom: 0.25rem;
            white-space: nowrap;
            }
            .rtl .piechart-legends ul {
            list-style: none;
            margin-left: 0;
            margin-right: 1.5rem;
            padding-right: 0;
            }
            .rtl .piechart-legends span {
            margin-left: 0.5rem;
            margin-right: 0;
            }
        </style>
        <style>.flex-equal-sm > * {flex: 0 1 1% !important;}				
                @media print {#id-ace-settings-modal {display: none !important;}}
                @media (hover: hover) { #id-ace-settings-modal:not(.show) 
                .aside-header > .btn:hover > .fa { animation: 0.6s fa-spin ease-in-out; }}	
                @media screen and (prefers-reduced-motion: reduce) { #id-ace-settings-modal:not(.show) 
                .aside-header > .btn:hover > .fa { animation: none; } }
            </style>
        <style type="text/css">/* Chart.js */
            @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
        </style>
    </head>
    <body class="is-document-loaded">
        <div class="body-container">
            <nav class="navbar navbar-expand-lg navbar-fixed navbar-blue">
                <div class="navbar-inner">
                <div class="navbar-intro justify-content-xl-between">
                    <button type="button" class="btn btn-burger burger-arrowed static collapsed ml-2 d-flex d-xl-none" data-toggle-mobile="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle sidebar">
                    <span class="bars"></span>
                    </button><!-- mobile sidebar toggler button -->
                    <a class="navbar-brand text-white" href="#">
                    <i class="fa fa-leaf"></i>
                    <span>Ace</span>
                    <span>App</span>
                    </a><!-- /.navbar-brand -->
                    <button type="button" class="btn btn-burger mr-2 d-none d-xl-flex" data-toggle="sidebar" data-target="#sidebar" aria-controls="sidebar" aria-expanded="true" aria-label="Toggle sidebar">
                    <span class="bars"></span>
                    </button><!-- sidebar toggler button -->
                </div>
                <!-- /.navbar-intro -->
                <div class="navbar-content">
                    <button class="navbar-toggler py-2" type="button" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navbar search">
                    <i class="fa fa-search text-white text-90 py-1"></i>
                    </button><!-- mobile #navbarSearch toggler -->
                    <div class="collapse navbar-collapse navbar-backdrop" id="navbarSearch">
                        <form class="d-flex align-items-center ml-lg-4 py-1" data-submit="dismiss">
                            <i class="fa fa-search text-white d-none d-lg-block pos-rel"></i>
                            <input type="text" class="navbar-input mx-3 flex-grow-1 mx-md-auto pr-1 pl-lg-4 ml-lg-n3 py-2 autofocus" placeholder="SEARCH ..." aria-label="Search">
                        </form>
                    </div>
                </div>
                <!-- .navbar-content -->
                <!-- mobile #navbarMenu toggler button -->
                <button class="navbar-toggler ml-1 mr-2 px-1" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navbar menu">
                <span class="pos-rel">
                <img class="border-2 brc-white-tp1 radius-round" width="36" src="assets/image/avatar/avatar6.jpg" alt="Jason's Photo">
                <span class="bgc-warning radius-round border-2 brc-white p-1 position-tr mr-n1px mt-n1px"></span>
                </span>
                </button>
                <div class="navbar-menu collapse navbar-collapse navbar-backdrop" id="navbarMenu">
                    <div class="navbar-nav">
                        <ul class="nav">
                            <li class="nav-item dropdown dropdown-mega">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-list-alt mr-2 d-lg-none"></i>
                            Mega
                            <i class="caret fa fa-angle-down d-none d-lg-block"></i>
                            <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                            </a>
                            <div class="dropdown-menu p-0 dropdown-animated bgc-secondary-l4 brc-primary-m3 border-t-0 border-b-2 ace-scrollbar">
                                <div class="d-flex flex-column">
                                    <div class="row mx-0">
                                        <div class="col-lg-4 col-12 p-2 p-lg-3 p-xl-4 d-flex flex-column align-items-center">
                                        <div class="w-100 mb-3">
                                            <h5 class="col-lg-9 mx-auto text-dark-m2 px-0">
                                                <i class="fa fa-clipboard-check mr-1 text-purple-m1"></i>
                                                Current Tasks
                                            </h5>
                                        </div>
                                        <div class="col-lg-9 list-group px-0 border-1 brc-default-l2 radius-1 shadow-md">
                                            <a href="#" class="border-0 bgc-h-primary-l4 list-group-item list-group-item-action">
                                            <i class="fab fa-facebook text-blue-m1 text-110 mr-2"></i>
                                            Cras justo odio
                                            </a>
                                            <a href="#" class="border-0 bgc-h-primary-l4 list-group-item list-group-item-action text-primary">
                                            <i class="fa fa-user text-success-m1 text-110 mr-2"></i>
                                            Dapibus ac facilisis in
                                            </a>
                                            <a href="#" class="border-0 bgc-h-primary-l4 list-group-item list-group-item-action">
                                            <i class="fa fa-clock text-purple-m1 text-110 mr-2"></i>
                                            Morbi leo risus
                                            </a>
                                            <a href="#" class="border-0 list-group-item list-group-item-action bgc-success-l2">
                                            <i class="fa fa-check text-orange-d1 text-110 mr-2"></i>
                                            Porta ac consectetur
                                            <span class="ml-2 badge badge-primary badge-pill badge-lg">14</span>
                                            </a>
                                            <a href="#" class="border-0 list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                                        </div>
                                        </div>
                                        <!-- .col:mega tasks -->
                                        <div class="bgc-white col-lg-4 col-12 p-4">
                                        <h5 class="text-dark-m2">
                                            <i class="fas fa-bullhorn mr-1 text-primary-m1"></i>
                                            Notifications
                                        </h5>
                                        <div class="mt-3">
                                            <div class="media mt-2 px-3 pt-1 border-l-2 brc-purple-m2">
                                                <div class="bgc-purple radius-1 mr-3 p-3">
                                                    <i class="fa fa-user text-white text-150"></i>
                                                </div>
                                                <div class="media-body pb-0 mb-0 text-90 text-grey-m1">
                                                    <div class="text-grey-d2 font-bolder">@username1</div>
                                                    Donec id elit non mi porta gravida at eget metus. Fusce dapibus...
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="media mt-2 px-3 pt-1 border-l-2 brc-warning-m2">
                                                <div class="bgc-warning radius-1 mr-3 p-3">
                                                    <i class="fa fa-user text-white text-150"></i>
                                                </div>
                                                <div class="media-body pb-0 mb-0 text-90 text-grey-m1">
                                                    <div class="text-grey-d2 font-bolder">@username2</div>
                                                    Fusce dapibus, tellus ac cursus commodo, tortor mauris...
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="media mt-2 px-3 pt-1 border-l-2 brc-success-m2">
                                                <div class="bgc-success radius-1 mr-3 p-3">
                                                    <i class="fa fa-user text-white text-150"></i>
                                                </div>
                                                <div class="media-body pb-0 mb-0 text-90 text-grey-m1">
                                                    <div class="text-grey-d2 font-bolder">@username3</div>
                                                    Tortor mauris condimentum nibh, fusce dapibus...
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- .col:mega notifications -->
                                        <div class="col-lg-4 col-12 p-4 dropdown-clickable">
                                        <h5 class="text-dark-m2">
                                            <i class="fa fa-envelope mr-1 text-green-m1"></i>
                                            Contact Us
                                        </h5>
                                        <form class="my-3">
                                            <div class="form-group mb-2">
                                                <input placeholder="Name" type="text" class="form-control border-l-2">
                                            </div>
                                            <div class="form-group mb-2">
                                                <input placeholder="Email" type="text" class="form-control border-l-2">
                                            </div>
                                            <div class="form-group mb-4">
                                                <textarea class="form-control brc-primary-m2 border-l-2 text-grey-d1" rows="3" placeholder="Your message..."></textarea>
                                            </div>
                                            <div class="text-center">
                                                <button type="reset" class="btn px-3 btn-secondary btn-bold tex1t-110">
                                                Reset
                                                </button>
                                                <button data-dismiss="dropdown" type="button" class="btn btn-outline-primary btn-bgc-white px-3 btn-bold btn-text-slide-x" style="width: 8rem;">
                                                Submit<i class="btn-text-2  move-right fa fa-arrow-right text-120 align-text-bottom ml-1"></i>
                                                </button>
                                            </div>
                                        </form>
                                        </div>
                                        <!-- .col:mega contact -->
                                    </div>
                                    <!-- .row: mega -->
                                    <!-- Big Action Buttons -->
                                    <div class="order-first order-lg-last ">
                                        <hr class="d-none d-lg-block brc-default-l1 my-0">
                                        <!-- border above buttons in desktop mode -->
                                        <div class="row mx-0 bgc-primary-l4">
                                        <div class="col-lg-8 offset-lg-2 d-flex justify-content-center py-4 d-flex">
                                            <button class="mx-2px btn btn-sm btn-app btn-outline-warning btn-h-outline-warning btn-a-outline-warning radius-1 border-2">
                                            <i class="fa fa-cog text-190 d-block mb-2 h-4"></i>
                                            <span class="text-muted">Settings</span>
                                            </button>
                                            <button class="mx-2px btn btn-sm btn-app btn-outline-info btn-h-outline-info radius-1 border-2">
                                            <i class="fa fa-edit text-190 d-block mb-2 h-4"></i>
                                            Edit
                                            <span class="position-tr text-danger-m2 text-130 mr-1">*</span>
                                            </button>
                                            <button class="mx-2px btn btn-sm btn-app btn-dark radius-1">
                                            <i class="fa fa-lock text-150 d-block mb-2 h-4"></i>
                                            Lock
                                            </button>
                                        </div>
                                        </div>
                                        <!-- .row:megamenu big buttons -->
                                        <hr class="d-lg-none brc-default-l1 mt-0">
                                        <!-- border below buttons in mobile mode -->
                                    </div>
                                </div>
                            </div>
                            </li>
                            <li class="nav-item dropdown dropdown-mega">
                            <a class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell text-110 icon-animated-bell mr-lg-2"></i>
                                <span class="d-inline-block d-lg-none ml-2">Notifications</span><!-- show only on mobile -->
                                <span id="id-navbar-badge1" class="badge badge-sm bgc-warning-d2 text-white radius-round text-85 border-1 brc-white-tp5">3</span>
                                <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                <div class="dropdown-caret brc-white"></div>
                            </a>
                            <div class="dropdown-menu dropdown-sm dropdown-animated p-0 bgc-white brc-primary-m3 border-b-2 shadow">
                                <ul class="nav nav-tabs nav-tabs-simple w-100 nav-justified dropdown-clickable border-b-1 brc-secondary-l2" role="tablist">
                                    <li class="nav-item">
                                        <a class="d-style px-0 mx-0 py-3 nav-link active text-600 brc-blue-m1 text-dark-tp5 bgc-h-blue-l4" data-toggle="tab" href="#navbar-notif-tab-1" role="tab">
                                        <span class="d-active text-blue-d1 text-105">Notifications</span>
                                        <span class="d-n-active">Notifications</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-style px-0 mx-0 py-3 nav-link text-600 brc-purple-m1 text-dark-tp5 bgc-h-purple-l4" data-toggle="tab" href="#navbar-notif-tab-2" role="tab">
                                        <span class="d-active text-purple-d1 text-105">Messages</span>
                                        <span class="d-n-active">Messages</span>
                                        </a>
                                    </li>
                                </ul>
                                <!-- .nav-tabs -->
                                <div class="tab-content tab-sliding p-0">
                                    <div class="tab-pane mh-none show active px-md-1 pt-1" id="navbar-notif-tab-1" role="tabpanel">
                                        <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                        <i class="fab fa-twitter bgc-blue-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                        <span class="text-muted">Followers</span>
                                        <span class="float-right badge badge-danger radius-round text-80">- 4</span>
                                        </a>
                                        <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                        <i class="fa fa-comment bgc-pink-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                        <span class="text-muted">New Comments</span>
                                        <span class="float-right badge badge-info radius-round text-80">+12</span>
                                        </a>
                                        <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                        <i class="fa fa-shopping-cart bgc-success-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                        <span class="text-muted">New Orders</span>
                                        <span class="float-right badge badge-success radius-round text-80">+8</span>
                                        </a>
                                        <a href="#" class="mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                        <i class="far fa-clock bgc-purple-tp1 text-white text-110 mr-15 p-2 radius-1"></i>
                                        <span class="text-muted">Finished processing data!</span>
                                        </a>
                                        <hr class="mt-1 mb-1px brc-secondary-l2">
                                        <a href="#" class="mb-0 py-3 border-0 list-group-item text-blue text-uppercase text-center text-85 font-bolder">
                                        See All Notifications
                                        <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                        </a>
                                    </div>
                                    <!-- .tab-pane : notifications -->
                                    <div class="tab-pane mh-none pl-md-2" id="navbar-notif-tab-2" role="tabpanel">
                                        <div data-ace-scroll="{&quot;ignore&quot;: &quot;mobile&quot;, &quot;height&quot;: 300, &quot;smooth&quot;:true}" class="ace-scroll ace-scroll-wrap" style="max-height: 300px;">
                                        <div class="ace-scroll-inner" style="color: rgb(33, 37, 41);">
                                            <a href="#" class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                <img alt="Alex's avatar" src="assets/image/avatar/avatar.png" width="48" class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round">
                                                <div>
                                                    <span class="text-primary-m1 font-bolder">Alex:</span>
                                                    <span class="text-grey text-90">Ciao sociis natoque penatibus et auctor ...</span>
                                                    <br>
                                                    <span class="text-grey-m1 text-85">
                                                    <i class="far fa-clock"></i>
                                                    a moment ago
                                                    </span>
                                                </div>
                                            </a>
                                            <hr class="my-1px brc-grey-l3">
                                            <a href="#" class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                <img alt="Susan's avatar" src="assets/image/avatar/avatar3.png" width="48" class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round">
                                                <div>
                                                    <span class="text-primary-m1 font-bolder">Susan:</span>
                                                    <span class="text-grey text-90">Vestibulum id ligula porta felis euismod ...</span>
                                                    <br>
                                                    <span class="text-grey-m1 text-85">
                                                    <i class="far fa-clock"></i>
                                                    20 minutes ago
                                                    </span>
                                                </div>
                                            </a>
                                            <hr class="my-1px brc-grey-l3">
                                            <a href="#" class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                <img alt="Bob's avatar" src="assets/image/avatar/avatar4.png" width="48" class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round">
                                                <div>
                                                    <span class="text-primary-m1 font-bolder">Bob:</span>
                                                    <span class="text-grey text-90">Nullam quis risus eget urna mollis ornare ...</span>
                                                    <br>
                                                    <span class="text-grey-m1 text-85">
                                                    <i class="far fa-clock"></i>
                                                    3:15 pm
                                                    </span>
                                                </div>
                                            </a>
                                            <hr class="my-1px brc-grey-l3">
                                            <a href="#" class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                <img alt="Kate's avatar" src="assets/image/avatar/avatar2.png" width="48" class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round">
                                                <div>
                                                    <span class="text-primary-m1 font-bolder">Kate:</span>
                                                    <span class="text-grey text-90">Ciao sociis natoque eget urna mollis ornare ...</span>
                                                    <br>
                                                    <span class="text-grey-m1 text-85">
                                                    <i class="far fa-clock"></i>
                                                    1:33 pm
                                                    </span>
                                                </div>
                                            </a>
                                            <hr class="my-1px brc-grey-l3">
                                            <a href="#" class="d-flex mb-0 border-0 list-group-item list-group-item-action btn-h-lighter-secondary">
                                                <img alt="Fred's avatar" src="assets/image/avatar/avatar5.png" width="48" class="align-self-start border-2 brc-primary-m3 p-1px mr-2 radius-round">
                                                <div>
                                                    <span class="text-primary-m1 font-bolder">Fred:</span>
                                                    <span class="text-grey text-90">Vestibulum id penatibus et auctor  ...</span>
                                                    <br>
                                                    <span class="text-grey-m1 text-85">
                                                    <i class="far fa-clock"></i>
                                                    10:09 am
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                        </div>
                                        <!-- ace-scroll -->
                                        <hr class="my-1px brc-secondary-l2 border-double">
                                        <a href="html/page-inbox.html" class="mb-0 py-3 border-0 list-group-item text-purple text-uppercase text-center text-85 font-bolder">
                                        See All Messages
                                        <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                        </a>
                                    </div>
                                    <!-- .tab-pane : messages -->
                                </div>
                            </div>
                            </li>
                            <li class="nav-item dd-backdrop dropdown dropdown-mega">
                            <a class="nav-link dropdown-toggle pl-lg-3 pr-lg-4" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-flask text-110 icon-animated-vertical mr-lg-1"></i>
                                <span class="d-inline-block d-lg-none ml-2">Tasks</span><!-- show only on mobile -->
                                <span id="id-navbar-badge2" class="badge badge-sm text-95 text-yellow-l4">+2</span>
                                <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                                <div class="dropdown-caret brc-warning-l2"></div>
                            </a>
                            <div class="dropdown-menu dropdown-xs dropdown-animated animated-1 p-0 bgc-white brc-warning-l1 shadow">
                                <div class="bgc-orange-l2 py-25 px-4 border-b-1 brc-orange-l2">
                                    <span class="text-dark-tp4 text-600 text-90 text-uppercase">
                                    <i class="fa fa-check mr-2px text-warning-d2 text-120"></i>
                                    4 Tasks to complete
                                    </span>
                                </div>
                                <div class="px-4 py-2">
                                    <div class="text-95">
                                        <span class="text-grey-d1">Software update</span>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bgc-info" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                                    </div>
                                </div>
                                <hr class="my-1 mx-4">
                                <div class="px-4 py-2">
                                    <div class="text-95">
                                        <span class="text-grey-d1">Hardware upgrade</span>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bgc-warning" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">40%</div>
                                    </div>
                                </div>
                                <hr class="my-1 mx-4">
                                <div class="px-4 py-2">
                                    <div class="text-95">
                                        <span class="text-grey-d1">Customer support</span>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bgc-danger" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
                                    </div>
                                </div>
                                <hr class="my-1 mx-4">
                                <div class="px-4 py-2">
                                    <div class="text-95">
                                        <span class="text-grey-d1">Fixing bugs</span>
                                    </div>
                                    <div class="progress mt-2">
                                        <div class="progress-bar bgc-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                    </div>
                                </div>
                                <hr class="my-1px mx-2 brc-info-l2 ">
                                <a href="#" class="d-block bgc-h-primary-l4 py-3 border-0 text-center text-blue-m2">
                                <span class="text-85 text-600 text-uppercase">See All Tasks</span>
                                <i class="ml-2 fa fa-arrow-right text-muted"></i>
                                </a>
                            </div>
                            </li>
                            <li class="nav-item dropdown order-first order-lg-last">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <img id="id-navbar-user-image" class="d-none d-lg-inline-block radius-round border-2 brc-white-tp1 mr-2 w-6" src="assets/image/avatar/avatar6.jpg" alt="Jason's Photo">
                            <span class="d-inline-block d-lg-none d-xl-inline-block">
                            <span class="text-90" id="id-user-welcome">Welcome,</span>
                            <span class="nav-user-name">Jason</span>
                            </span>
                            <i class="caret fa fa-angle-down d-none d-xl-block"></i>
                            <i class="caret fa fa-angle-left d-block d-lg-none"></i>
                            </a>
                            <div class="dropdown-menu dropdown-caret dropdown-menu-right dropdown-animated brc-primary-m3 py-1">
                                <div class="d-none d-lg-block d-xl-none">
                                    <div class="dropdown-header">
                                        Welcome, Jason
                                    </div>
                                    <div class="dropdown-divider"></div>
                                </div>
                                <div class="dropdown-clickable px-3 py-25 bgc-h-secondary-l3 border-b-1 brc-secondary-l2">
                                    <!-- online/offline toggle -->
                                    <div class="d-flex justify-content-center align-items-center tex1t-600">
                                        <label for="id-user-online" class="text-grey-d1 pt-2 px-2">offline</label>
                                        <input type="checkbox" class="ace-switch ace-switch-sm text-grey-l1 brc-green-d1" id="id-user-online">
                                        <label for="id-user-online" class="text-green-d1 text-600 pt-2 px-2">online</label>
                                    </div>
                                </div>
                                <a class="mt-1 dropdown-item btn btn-outline-grey bgc-h-primary-l3 btn-h-light-primary btn-a-light-primary" href="html/page-profile.html">
                                <i class="fa fa-user text-primary-m1 text-105 mr-1"></i>
                                Profile
                                </a>
                                <a class="dropdown-item btn btn-outline-grey bgc-h-success-l3 btn-h-light-success btn-a-light-success" href="#" data-toggle="modal" data-target="#id-ace-settings-modal">
                                <i class="fa fa-cog text-success-m1 text-105 mr-1"></i>
                                Settings
                                </a>
                                <div class="dropdown-divider brc-primary-l2"></div>
                                <a class="dropdown-item btn btn-outline-grey bgc-h-secondary-l3 btn-h-light-secondary btn-a-light-secondary" href="html/page-login.html">
                                <i class="fa fa-power-off text-warning-d1 text-105 mr-1"></i>
                                Logout
                                </a>
                            </div>
                            </li>
                            <!-- /.nav-item:last -->
                        </ul>
                        <!-- /.navbar-nav menu -->
                    </div>
                    <!-- /.navbar-nav -->
                </div>
                <!-- /#navbarMenu -->
                </div>
                <!-- /.navbar-inner -->
            </nav>
            <!-- 
                AQUI
                A
                SIDEBAR
             -->
            <div class="main-container bgc-white">
                <div id="sidebar" class="sidebar sidebar-fixed expandable sidebar-light">
                <div class="sidebar-inner">
                    <div class="flex-grow-1 ace-scroll" data-ace-scroll="{}">
                        <div class="sidebar-section my-2">
                            <!-- the shortcut buttons -->
                            <div class="sidebar-section-item fadeable-left">
                            <div class="fadeinable sidebar-shortcuts-mini">
                                <!-- show this small buttons when collapsed -->
                                <span class="btn btn-success p-0 opacity-1"></span>
                                <span class="btn btn-info p-0 opacity-1"></span>
                                <span class="btn btn-orange p-0 opacity-1"></span>
                                <span class="btn btn-danger p-0 opacity-1"></span>
                            </div>
                            <div class="fadeable">
                                <!-- show this small buttons when not collapsed -->
                                <div class="sub-arrow"></div>
                                <div>
                                    <button class="btn px-25 py-2 text-95 btn-success opacity-1">
                                    <i class="fa fa-signal f-n-hover"></i>
                                    </button>
                                    <button class="btn px-25 py-2 text-95 btn-info opacity-1">
                                    <i class="fa fa-edit f-n-hover"></i>
                                    </button>
                                    <button class="btn px-25 py-2 text-95 btn-orange opacity-1">
                                    <i class="fa fa-users f-n-hover"></i>
                                    </button>
                                    <button class="btn px-25 py-2 text-95 btn-danger opacity-1">
                                    <i class="fa fa-cogs f-n-hover"></i>
                                    </button>
                                </div>
                            </div>
                            </div>
                            <!-- the search box -->
                            <div class="sidebar-section-item">
                            <i class="fadeinable fa fa-search text-info-m1 mr-n1"></i>
                            <div class="fadeable d-inline-flex align-items-center ml-3 ml-lg-0">
                                <i class="fa fa-search mr-n3 text-info-m1"></i>
                                <input type="text" class="sidebar-search-input pl-4 pr-3 mr-n2" maxlength="60" placeholder="Search ..." aria-label="Search">
                                <a href="#" class="ml-n25 px-2 py-1 radius-round bgc-h-secondary-l2 mb-2px">
                                <i class="fa fa-microphone px-3px text-dark-tp5"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                        <ul class="nav has-active-border active-on-right">
                            <li class="nav-item-caption">
                            <span class="fadeable pl-3">MAIN</span>
                            <span class="fadeinable mt-n2 text-125">…</span>
                            <!--
                                OR something like the following (with `.hideable` text)
                                -->
                            <!--
                                <div class="hideable">
                                    <span class="pl-3">MAIN</span>
                                </div>
                                <span class="fadeinable mt-n2 text-125">&hellip;</span>
                                -->
                            </li>
                            <li class="nav-item active">
                            <a href="html/dashboard.html" class="nav-link">
                            <i class="nav-icon fa fa-tachometer-alt"></i>
                            <span class="nav-text fadeable">
                            <span>Dashboard</span>
                            </span>
                            </a>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle collapsed">
                                <i class="nav-icon fa fa-cube"></i>
                                <span class="nav-text fadeable">
                                <span>Layouts</span>
                                </span>
                                <b class="caret fa fa-angle-left rt-n90"></b>
                                <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                <!--
                                    <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                    <b class="caret d-collapsed fa fa-plus text-80"></b>
                                    -->
                            </a>
                            <div class="hideable submenu collapse">
                                <ul class="submenu-inner">
                                    <li class="nav-item">
                                        <a href="html/dashboard-2.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Dashboard 2</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/dashboard-3.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Dashboard 3</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/dashboard-4.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Dashboard 4</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/horizontal.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Horizontal Menu</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/two-menus-1.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Two Menus</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/landing-page-1.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Landing Page 1</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/landing-page-2.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Landing Page 2</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/coming-soon.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Coming Soon</span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle collapsed">
                                <i class="nav-icon fa fa-desktop"></i>
                                <span class="nav-text fadeable">
                                <span>UI Elements</span>
                                </span>
                                <b class="caret fa fa-angle-left rt-n90"></b>
                                <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                <!--
                                    <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                    <b class="caret d-collapsed fa fa-plus text-80"></b>
                                    -->
                            </a>
                            <div class="hideable submenu collapse">
                                <ul class="submenu-inner">
                                    <li class="nav-item">
                                        <a href="html/buttons.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Buttons</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/button-groups.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Button Groups</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/alerts.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Alerts</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/modals.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Modals</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/asides.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Asides</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/tabs.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Tabs</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/accordions.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Accordions</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/tooltips.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Tooltips &amp; Popovers</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/badges.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Badges</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/pagination.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Pagination</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/dropdowns.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Dropdowns</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/icons.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Icons</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/typography.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Typography</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/charts.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Charts</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/treeview.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Treeview</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                        <span class="nav-text">
                                        <span>Nested Links</span>
                                        </span>
                                        <b class="caret fa fa-angle-left rt-n90"></b>
                                        <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                        <!--
                                            <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                            <b class="caret d-collapsed fa fa-plus text-80"></b>
                                            -->
                                        </a>
                                        <div class=" submenu collapse">
                                        <ul class="submenu-inner">
                                            <li class="nav-item">
                                                <a href="#" class="nav-link dropdown-toggle collapsed">
                                                    <i class="nav-icon fa fa-caret-right text-blue-l2 mr-2"></i>
                                                    <span class="nav-text">
                                                    <span>Third Level Menu</span>
                                                    </span>
                                                    <b class="caret fa fa-angle-left rt-n90"></b>
                                                    <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                                    <!--
                                                    <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                                    <b class="caret d-collapsed fa fa-plus text-80"></b>
                                                    -->
                                                </a>
                                                <div class=" submenu collapse">
                                                    <ul class="submenu-inner">
                                                    <li class="nav-item">
                                                        <a href="#" class="nav-link dropdown-toggle collapsed">
                                                            <i class="nav-icon fa fa-leaf text-success-l2 text-90 mr-2"></i>
                                                            <span class="nav-text">
                                                            <span>Fourth Level</span>
                                                            </span>
                                                            <b class="caret fa fa-angle-left rt-n90"></b>
                                                            <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                                            <!--
                                                                <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                                                <b class="caret d-collapsed fa fa-plus text-80"></b>
                                                                -->
                                                        </a>
                                                        <div class=" submenu collapse">
                                                            <ul class="submenu-inner">
                                                                <li class="nav-item">
                                                                <a href="#" class="nav-link">
                                                                <i class="nav-icon fa fa-stop text-warning-l1 text-80 mx-2"></i>
                                                                <span class="nav-text">
                                                                <span>5th Level</span>
                                                                </span>
                                                                </a>
                                                                </li>
                                                                <li class="nav-item">
                                                                <a href="#" class="nav-link">
                                                                <i class="nav-icon fa fa-stop text-warning-l1 text-80 mx-2"></i>
                                                                <span class="nav-text">
                                                                <span>5th Level</span>
                                                                </span>
                                                                </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <b class="sub-arrow"></b>
                                                    </li>
                                                    </ul>
                                                </div>
                                                <b class="sub-arrow"></b>
                                            </li>
                                        </ul>
                                        </div>
                                        <b class="sub-arrow"></b>
                                    </li>
                                </ul>
                            </div>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle collapsed">
                                <i class="nav-icon fa fa-table"></i>
                                <span class="nav-text fadeable">
                                <span>Tables</span>
                                </span>
                                <b class="caret fa fa-angle-left rt-n90"></b>
                                <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                <!--
                                    <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                    <b class="caret d-collapsed fa fa-plus text-80"></b>
                                    -->
                            </a>
                            <div class="hideable submenu collapse">
                                <ul class="submenu-inner">
                                    <li class="nav-item">
                                        <a href="html/table-basic.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Basic Tables</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/table-datatables.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>DataTables</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/table-bootstrap.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Bootstrap Table</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/table-jqgrid.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>jqGrid</span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle collapsed">
                                <i class="nav-icon fa fa-edit"></i>
                                <span class="nav-text fadeable">
                                <span>Forms</span>
                                </span>
                                <b class="caret fa fa-angle-left rt-n90"></b>
                                <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                <!--
                                    <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                    <b class="caret d-collapsed fa fa-plus text-80"></b>
                                    -->
                            </a>
                            <div class="hideable submenu collapse">
                                <ul class="submenu-inner">
                                    <li class="nav-item">
                                        <a href="html/form-basic.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Basic Elements</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/form-more.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>More Elements</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/form-wizard.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Wizard &amp; Validation</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/form-upload.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>File Upload</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/form-wysiwyg.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Wysiwyg &amp; Markdown</span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="html/cards.html" class="nav-link">
                            <i class="nav-icon far fa-window-restore"></i>
                            <span class="nav-text fadeable">
                            <span>Cards</span>
                            </span>
                            </a>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="html/calendar.html" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <span class="nav-text fadeable">
                            <span>Calendar</span>
                            <span class="badge px-1 " title="" data-original-title="2 Urgent Events"><i class="fas fa-exclamation-triangle text-140 text-danger-m2"></i></span>
                            </span>
                            </a>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item">
                            <a href="html/gallery.html" class="nav-link">
                            <i class="nav-icon far fa-image"></i>
                            <span class="nav-text fadeable">
                            <span>Gallery</span>
                            </span>
                            </a>
                            <b class="sub-arrow"></b>
                            </li>
                            <li class="nav-item-caption">
                            <span class="fadeable pl-3">OTHER</span>
                            <span class="fadeinable mt-n2 text-125">…</span>
                            <!--
                                OR something like the following (with `.hideable` text)
                                -->
                            <!--
                                <div class="hideable">
                                    <span class="pl-3">OTHER</span>
                                </div>
                                <span class="fadeinable mt-n2 text-125">&hellip;</span>
                                -->
                            </li>
                            <li class="nav-item">
                            <a href="#" class="nav-link dropdown-toggle collapsed">
                                <i class="nav-icon fa fa-tag"></i>
                                <span class="nav-text fadeable">
                                <span>More Pages</span>
                                <span class="badge badge-primary py-1 radius-round text-90 mr-2px badge-sm ">5</span>
                                </span>
                                <b class="caret fa fa-angle-left rt-n90"></b>
                                <!-- or you can use custom icons. first add `d-style` to 'A' -->
                                <!--
                                    <b class="caret d-n-collapsed fa fa-minus text-80"></b>
                                    <b class="caret d-collapsed fa fa-plus text-80"></b>
                                    -->
                            </a>
                            <div class="hideable submenu collapse">
                                <ul class="submenu-inner">
                                    <li class="nav-item">
                                        <a href="html/page-profile.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Profile</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/page-login.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Login</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/page-pricing.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Pricing</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/page-invoice.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Invoice</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/page-inbox.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Inbox</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/page-search.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Search Results</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/page-error.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Error</span>
                                        </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="html/starter.html" class="nav-link">
                                        <span class="nav-text">
                                        <span>Starter</span>
                                        </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <b class="sub-arrow"></b>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar scroll -->
                    <div class="sidebar-section">
                        <div class="sidebar-section-item fadeable-bottom">
                            <div class="fadeinable">
                            <!-- shows this when collapsed -->
                            <div class="pos-rel">
                                <img alt="Alexa's Photo" src="assets/image/avatar/avatar3.jpg" width="42" class="px-1px radius-round mx-2 border-2 brc-default-m2">
                                <span class="bgc-success radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
                            </div>
                            </div>
                            <div class="fadeable hideable w-100 bg-transparent shadow-none border-0">
                            <!-- shows this when full-width -->
                            <div id="sidebar-footer-bg" class="d-flex align-items-center bgc-white shadow-sm mx-2 mt-2px py-2 radius-t-1 border-x-1 border-t-2 brc-primary-m3">
                                <div class="d-flex mr-auto py-1">
                                    <div class="pos-rel">
                                        <img alt="Alexa's Photo" src="assets/image/avatar/avatar3.jpg" width="42" class="px-1px radius-round mx-2 border-2 brc-default-m2">
                                        <span class="bgc-success radius-round border-2 brc-white p-1 position-tr mr-1 mt-2px"></span>
                                    </div>
                                    <div>
                                        <span class="text-blue-d1 font-bolder">Alexa</span>
                                        <div class="text-80 text-grey">
                                        Admin
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="d-style btn btn-outline-primary btn-h-light-primary btn-a-light-primary border-0 p-2 mr-2px ml-4" title="" data-toggle="modal" data-target="#id-ace-settings-modal" data-original-title="Settings">
                                <i class="fa fa-cog text-150 text-blue-d2 f-n-hover"></i>
                                </a>
                                <a href="html/page-login.html" class="d-style btn btn-outline-orange btn-h-light-orange btn-a-light-orange border-0 p-2 mr-1" title="" data-original-title="Logout">
                                <i class="fa fa-sign-out-alt text-150 text-orange-d2 f-n-hover"></i>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div role="main" class="main-content">
                <div class="page-content container container-plus">
                    <!-- page header and toolbox -->
                    <div class="page-header pb-2">
                        <h1 class="page-title text-primary-d2 text-150">
                            Dashboard
                            <small class="page-info text-secondary-d2 text-nowrap">
                            <i class="fa fa-angle-double-right text-80"></i>
                            overview &amp; stats
                            </small>
                        </h1>
                        <div class="page-tools d-inline-flex">
                            <button type="button" class="btn btn-light-green btn-h-green btn-a-green border-0 radius-3 py-2 text-600 text-90">
                            <span class="d-none d-sm-inline mr-1">
                            Save
                            </span>
                            <i class="fa fa-save text-110 w-2 h-2"></i>
                            </button>
                            <button type="button" class="mx-2px btn btn-light-purple btn-h-purple btn-a-purple border-0 radius-3 py-2 text-90">
                            <i class="fa fa-undo text-110 w-2 h-2"></i>
                            </button>
                            <div class="btn-group dropdown dd-backdrop dd-backdrop-none-md">
                            <button type="button" class="btn btn-light-primary btn-h-primary btn-a-primary border-0 radius-3 py-2 text-90 dropdown-toggle" data-display="static" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-search text-110 w-2 h-2"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-caret dropdown-animated animated-2 dd-slide-up dd-slide-none-md">
                                <div class="dropdown-inner">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-xl-8">
                            <div class="row px-3 px-lg-4">
                            <div class="col-12">
                                <div class="row h-100 mx-n425">
                                    <div class="col-12 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center">
                                        <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                                        <div class="d-flex text-center">
                                            <div class="flex-grow-1 mb-3">
                                                <div class="text-nowrap text-100 text-dark-l2">
                                                    Earnings
                                                </div>
                                                <div>
                                                    <span class="text-150 text-secondary-d1 mr-n1">$</span>
                                                    <span class="text-170 text-secondary-d4">
                                                    198,450
                                                    </span>
                                                    <span class="text-blue text-nowrap ml-n1">
                                                    +5%
                                                    <i class="fa fa-caret-up"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-blue radius-round btn-bold px-4 py-1 mt-3 mx-auto">View Report</button>
                                        </div>
                                        <!-- /.ccard -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center">
                                        <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                                        <div class="d-flex text-center">
                                            <div class="flex-grow-1 mb-3">
                                                <div class="text-nowrap text-100 text-dark-l2">
                                                    Page views
                                                </div>
                                                <div>
                                                    <span class="text-170 text-secondary-d4">
                                                    729,351
                                                    </span>
                                                    <span class="text-blue text-nowrap ml-n1">
                                                    +7.2%
                                                    <i class="fa fa-caret-up"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-self-center w-95">
                                            <canvas class="infobox-line-chart ml-n15 mt-n2" style="height: 64px; width: 100%; display: block;" data-values="[1000,800,1800,400,1500,1000,1050,1300,2100,1400,1500,1350]" width="282" height="64"></canvas>
                                        </div>
                                        </div>
                                        <!-- /.ccard -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-sm-4 p-0 pos-rel mt-3 mt-sm-0 pt-0 pt-sm-0 text-center">
                                        <div class="ccard h-100 d-flex flex-column mx-2 px-2 py-3">
                                        <div class="d-flex text-center">
                                            <div class="flex-grow-1 mb-3">
                                                <div class="text-nowrap text-100 text-dark-l2">
                                                    Task progress
                                                </div>
                                            </div>
                                        </div>
                                        <div class="align-self-center pos-rel text-blue">
                                            <canvas class="infobox-progress-chart" style="width: 180px; display: block;" data-percent="58" width="180" height="90"></canvas>
                                            <span class="position-center text-600 text-110 text-dark-tp4">
                                            58%
                                            </span>
                                        </div>
                                        </div>
                                        <!-- /.ccard -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <div class="col-12 mt-35">
                                <div class="row h-100 mx-n425">
                                    <div class="col-12 col-md-4 px-0 mb-2 mb-md-0">
                                        <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                                        <!-- the colored circles on bottom right -->
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l3 opacity-3" style="width: 5.25rem; height: 5.25rem;"></div>
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l2 opacity-5" style="width: 4.75rem; height: 4.75rem;"></div>
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-purple-l1 opacity-5" style="width: 4.25rem; height: 4.25rem;"></div>
                                        <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                                            <div class="text-secondary-d4">
                                                <span class="text-200">
                                                164
                                                </span>
                                                <span class="text-md text-danger-m1 align-text-bottom text-nowrap">
                                                (-2% <i class="ml-2px fa fa-caret-down"></i>)
                                                </span>
                                            </div>
                                            <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                                                orders
                                            </div>
                                        </div>
                                        <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                                            <i class="fa fa-shopping-cart text-purple opacity-1 fa-2x mr-25"></i>
                                        </div>
                                        </div>
                                        <!-- /.ccard -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-md-4 px-0 mb-2 mb-md-0">
                                        <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                                        <!-- the colored circles on bottom right -->
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-blue-l3 opacity-3" style="width: 5.25rem; height: 5.25rem;"></div>
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-blue-l2 opacity-5" style="width: 4.75rem; height: 4.75rem;"></div>
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-blue-l1 opacity-5" style="width: 4.25rem; height: 4.25rem;"></div>
                                        <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                                            <div class="text-secondary-d4">
                                                <span class="text-200">
                                                750
                                                </span>
                                                <span class="text-md text-success-m1 align-text-bottom text-nowrap">
                                                (+8% <i class="ml-2px fa fa-caret-up"></i>)
                                                </span>
                                            </div>
                                            <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                                                new followers
                                            </div>
                                        </div>
                                        <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                                            <i class="fab fa-twitter text-blue opacity-1 fa-2x mr-25"></i>
                                        </div>
                                        </div>
                                        <!-- /.ccard -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 col-md-4 px-0 mb-2 mb-md-0">
                                        <div class="ccard h-100 pt-2 pb-25 px-25 d-flex mx-2 overflow-hidden">
                                        <!-- the colored circles on bottom right -->
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-orange-l3 opacity-3" style="width: 5.25rem; height: 5.25rem;"></div>
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-orange-l2 opacity-5" style="width: 4.75rem; height: 4.75rem;"></div>
                                        <div class="position-br	mb-n5 mr-n5 radius-round bgc-orange-l1 opacity-5" style="width: 4.25rem; height: 4.25rem;"></div>
                                        <div class="flex-grow-1 pl-25 pos-rel d-flex flex-column">
                                            <div class="text-secondary-d4">
                                                <span class="text-200">
                                                16
                                                </span>
                                            </div>
                                            <div class="mt-auto text-nowrap text-secondary-d2 text-105 letter-spacing mt-n1">
                                                experiments
                                            </div>
                                        </div>
                                        <div class="ml-auto pr-1 align-self-center pos-rel text-125">
                                            <i class="fa fa-bolt text-orange opacity-1 fa-2x mr-25"></i>
                                        </div>
                                        </div>
                                        <!-- /.ccard -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </div>
                            </div>
                            <!-- /.row -->
                        </div>
                        <div class="col-xl-4 mt-4 mt-xl-0">
                            <div class="card ccard h-100 overflow-hidden">
                            <div class="card-header border-0 bgc-white card-header-sm">
                                <h6 class="card-title text-dark-m3 pl-25 pt-15 text-110">
                                    Traffic Sources
                                    <br>
                                    <span class="text-85 text-dark-l2">
                                    Last 7 days
                                    </span>
                                </h6>
                                <div class="card-toolbar no-border align-self-start mt-15 mr-1">
                                    <div class="dropdown dd-backdrop dd-backdrop-none-md">
                                        <a class="btn btn-light-secondary border-0 btn-bold btn-xs dropdown-toggle" href="#" role="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                        This Week
                                        <i class="fa fa-caret-down ml-2"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-caret dropdown-animated dd-slide-up dd-slide-none-md">
                                        <div class="dropdown-inner">
                                            <a class="dropdown-item active btn-a-bold m-1" href="#">This Week</a>
                                            <a class="dropdown-item m-1" href="#">Last Week</a>
                                            <a class="dropdown-item m-1" href="#">This Month</a>
                                            <a class="dropdown-item m-1" href="#">Last Month</a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0 bgc-whit flex-grow-1">
                                <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                                    <div class="pos-rel">
                                        <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                        </div>
                                        <div class="position-center text-center text-secondary-d3 mt-n3">
                                        <span>
                                        total
                                        </span>
                                        <div class="mt-n1 text-180 text-secondary-d4 text-600">
                                            730k
                                        </div>
                                        </div>
                                        <canvas id="traffic-source-chart" class="mb-3 chartjs-render-monitor" style="height: 170px; width: 170px; max-height: 170px; max-width: 170px; display: block;" width="170" height="170"></canvas>
                                    </div>
                                    <div id="traffic-source-legends" class="piechart-legends text-95 text-secondary-d3">
                                        <ul class="0-legend">
                                        <li><span style="background-color: rgb(76, 165, 174);"></span>Social Networks</li>
                                        <li><span style="background-color: rgb(241, 142, 93);"></span>Search Engines</li>
                                        <li><span style="background-color: rgb(234, 120, 157);"></span>Ad Campaings</li>
                                        <li><span style="background-color: rgb(34, 193, 228);"></span>Direct Traffic</li>
                                        <li><span style="background-color: rgb(226, 227, 228);"></span>Other</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row pt-3 mt-1 mt-lg-3">
                        <div class="col-lg-5 order-last order-lg-first mt-lg-3">
                            <div class="card border-0">
                            <div class="card-header bg-transparent border-0 pl-1">
                                <h5 class="card-title mb-2 mb-md-0 text-120 text-grey-d3">
                                    <i class="fa fa-star mr-1 text-orange text-90"></i>
                                    Best Sellers
                                </h5>
                                <div class="card-toolbar align-self-center">
                                    <a href="#" data-action="toggle" class="card-toolbar-btn text-grey text-110">
                                    <i class="fa fa-chevron-up"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0 ccard overflow-hidden">
                                <table class="table brc-black-tp11">
                                    <thead class="border-0">
                                        <tr class="border-0 bgc-dark-l5 text-dark-tp5">
                                        <th class="border-0 pl-4">
                                            name
                                        </th>
                                        <th class="border-0">
                                            price
                                        </th>
                                        <th class="border-0">
                                            status
                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="bgc-h-secondary-l4">
                                        <td class="text-dark-tp3 opacity-1 text-95 text-600 pl-4">
                                            Hoverboard
                                        </td>
                                        <td>
                                            <small><s class="text-danger-m1">$229.99</s></small>
                                            <span class="text-success-m1 font-bolder text-95">
                                            $119.99
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge text-75 border-l-3 brc-black-tp8 bgc-info-d2 text-white">on sale</span>
                                        </td>
                                        </tr>
                                        <tr class="bgc-h-secondary-l4">
                                        <td class="text-dark-tp3 opacity-1 text-95 text-600 pl-4">
                                            Hiking Shoe
                                        </td>
                                        <td>
                                            <span class="text-info-d2 text-95 font-bolder">
                                            $46.45
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge text-75 border-l-3 brc-black-tp8 bgc-success text-white">approved</span>
                                        </td>
                                        </tr>
                                        <tr class="bgc-h-secondary-l4">
                                        <td class="text-dark-tp3 opacity-1 text-95 text-600 pl-4">
                                            Gaming Console
                                        </td>
                                        <td>
                                            <span class="text-info-d2 text-95 font-bolder">
                                            $355.00
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge text-75 border-l-3 brc-black-tp8 bgc-danger text-white">pending</span>
                                        </td>
                                        </tr>
                                        <tr class="bgc-h-secondary-l4">
                                        <td class="text-dark-tp3 opacity-1 text-95 text-600 pl-4">
                                            Digital Camera
                                        </td>
                                        <td>
                                            <small><s class="text-danger-m1">$324.99</s></small>
                                            <span class="text-success-m1 font-bolder text-95">
                                            $219.95
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bgc-secondary-l1 text-dark-tp4 border-1 brc-black-tp10"><s>out of stock</s></span>
                                        </td>
                                        </tr>
                                        <tr class="bgc-h-secondary-l4">
                                        <td class="text-dark-tp3 opacity-1 text-95 text-600 pl-4">
                                            Laptop
                                        </td>
                                        <td>
                                            <span class="text-info-d2 text-95 font-bolder">
                                            $899.00
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge text-75 border-l-3 brc-black-tp8 bgc-orange text-white">SOLD</span>
                                        </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-7 mb-4 mb-lg-0 mt-3">
                            <div class="card border-0 h-100">
                            <div class="card-header border-0 bgc-transparent pl-1">
                                <h5 class="card-title mb-2 mb-md-0 text-120 text-grey-d3">
                                    <i class="fas fa-chart-line text-primary-m2 mr-1 text-105"></i>
                                    Sale Stats
                                </h5>
                                <div class="card-toolbar no-border dd-backdrop dd-backdrop-none-md">
                                    <a href="#" class="btn btn-xs btn-light-secondary border-1 text-600 px-4 radius-round dropdown-toggle" role="button" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
                                    2020
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-caret dropdown-animated dd-appear-center dd-slide-none-md mw-auto">
                                        <div class="dropdown-inner">
                                        <a class="dropdown-item active" href="#">2021</a>
                                        <a class="dropdown-item" href="#">2020</a>
                                        <a class="dropdown-item" href="#">2019</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-toolbar align-self-center">
                                    <a href="#" data-action="reload" class="card-toolbar-btn text-success-m2 text-100">
                                    <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body p-0 ccard px-1 mx-n1 mx-md-0 h-100 d-flex align-items-center">
                                <div class="mx-n2 px-0 mx-md-0 my-2 w-100">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                        <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                        <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="saleschart" height="296" width="848" style="display: block; width: 848px; height: 296px;" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5 pt-lg-3">
                        <div class="col-12 col-lg-3">
                            <div class="card ccard radius-t-0 h-100">
                            <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                            <!-- the blue line on top -->
                            <div class="card-header pb-3 brc-secondary-l3">
                                <h5 class="card-title mb-2 mb-md-0 text-dark-m3">
                                    Transfers
                                </h5>
                                <div class="card-toolbar no-border pl-0 pl-md-2">
                                    <a href="#" class="btn btn-sm btn-lighter-grey btn-bgc-white btn-h-light-orange btn-a-light-orange text-600 px-2 py-1 radius-round">
                                    <i class="fa fa-arrow-down text-90 mx-1px"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body pt-2 pb-1">
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="Alexa's avatar" src="assets/image/avatar/avatar3.jpg" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    Alexa
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    1,250
                                    <span class="text-80">
                                    USD
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-up text-green-m1 text-95"></i>
                                    </span>
                                </div>
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="Derek's avatar" src="assets/image/avatar/avatar2.png" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    Derek
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    350
                                    <span class="text-80">
                                    EUR
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-up text-green-m1 text-95"></i>
                                    </span>
                                </div>
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="Antonio's avatar" src="assets/image/avatar/avatar1.jpg" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    Antonio
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    120
                                    <span class="text-80">
                                    CAD
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-down text-danger-m1 text-95"></i>
                                    </span>
                                </div>
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="Gabriel's avatar" src="assets/image/avatar/avatar2.jpg" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    Gabriel
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    620
                                    <span class="text-80">
                                    GBP
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-up text-green-m1 text-95"></i>
                                    </span>
                                </div>
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="David's avatar" src="assets/image/avatar/avatar5.png" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    David
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    330
                                    <span class="text-80">
                                    AUD
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-down text-danger-m1 text-95"></i>
                                    </span>
                                </div>
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="Jason's avatar" src="assets/image/avatar/avatar6.jpg" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    Jason
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    1,400
                                    <span class="text-80">
                                    AED
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-down text-danger-m1 text-95"></i>
                                    </span>
                                </div>
                                <div role="button" class="d-flex flex-wrap align-items-center my-2 bgc-secondary-l4 bgc-h-secondary-l3 radius-1 p-25 d-style">
                                    <span class="mr-25 w-4 h-4 overflow-hidden text-center border-1 brc-secondary-m2 radius-round shadow-sm d-zoom-2">
                                    <img alt="Rebecca's avatar" src="assets/image/avatar/avatar7.jpg" class="h-4 w-4">
                                    </span>
                                    <span class="text-default-d3 text-90 text-600">
                                    Rebecca
                                    </span>
                                    <span class="ml-auto text-dark-l2 text-nowrap">
                                    350
                                    <span class="text-80">
                                    USD
                                    </span>
                                    </span>
                                    <span class="ml-2">
                                    <i class="fa fa-arrow-up text-green-m1 text-95"></i>
                                    </span>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                            <div class="card ccard radius-t-0 h-100">
                            <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                            <!-- the blue line on top -->
                            <div class="card-header brc-secondary-l3 pb-3">
                                <h5 class="card-title mb-2 mb-md-0 text-dark-m3">
                                    Todo List
                                    <span class="text-sm">
                                    (Sortable)
                                    </span>
                                </h5>
                                <div class="card-toolbar no-border pl-0 pl-md-2">
                                    <a href="#" class="btn btn-sm btn-lighter-grey btn-bgc-white btn-h-light-orange btn-a-light-orange text-600 px-25 radius-round">
                                    View all
                                    <i class="fa fa-arrow-right ml-2 text-90"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body bgc-white p-0 pb-15">
                                <form autocomplete="off" id="tasks" class="mt-n1px">
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-0">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-0">
                                        <span class="align-middle">
                                        Answering customer questions
                                        </span>
                                        </label>
                                    </div>
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-1">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-1">
                                        <span class="align-middle">
                                        Fixing bugs
                                        </span>
                                        <i class="fa fa-exclamation-circle text-danger-m2 text-110 align-middle ml-1"></i>
                                        </label>
                                        <span class="badge bgc-danger-l3 border-r-2 radius-r-0 brc-danger-m2 text-danger-d1 ml-1 mr-2">
                                        urgent
                                        </span>
                                    </div>
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-2">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-2">
                                        <span class="align-middle">
                                        Adding new features
                                        </span>
                                        </label>
                                        <span class="badge bgc-success-l3 border-r-2 radius-r-0 brc-success-m2 text-dark-tp3 ml-1 mr-2">
                                        normal
                                        </span>
                                    </div>
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-3">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-3">
                                        <span class="align-middle">
                                        Upgrading server hardware
                                        </span>
                                        </label>
                                    </div>
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-4">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-4">
                                        <span class="align-middle">
                                        Adding new skins
                                        </span>
                                        </label>
                                        <span class="badge bgc-blue-l3 border-r-2 radius-r-0 brc-blue-m2 text-dark-tp3 ml-1 mr-2">
                                        low
                                        </span>
                                    </div>
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-5">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-5">
                                        <span class="align-middle">
                                        Updating server software
                                        </span>
                                        <i class="fa fa-exclamation-circle text-danger-m2 text-110 align-middle ml-1"></i>
                                        </label>
                                        <span class="badge bgc-danger-l3 border-r-2 radius-r-0 brc-danger-m2 text-danger-d1 ml-1 mr-2">
                                        urgent
                                        </span>
                                    </div>
                                    <div class="task-item d-flex align-items-center border-t-1 bgc-h-green-l3 brc-secondary-l3 px-2">
                                        <label class="checkbox">
                                        <input type="checkbox" class="align-middle input-sm ml-2 mr-25" id="task-item-6">
                                        </label>
                                        <label class="flex-grow-1 mr-3 py-3" for="task-item-6">
                                        <span class="align-middle">
                                        Cleaning up
                                        </span>
                                        </label>
                                        <span class="badge bgc-success-l3 border-r-2 radius-r-0 brc-success-m2 text-dark-tp3 ml-1 mr-2">
                                        normal
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 mt-4 mt-lg-0">
                            <div id="conversations" class="card border-0 shadow-sm h-100">
                            <div class="card-header bgc-primary-d1">
                                <h6 class="card-title text-white font-normal">
                                    <i class="far fa-comment-dots text-130 mr-1"></i>
                                    <span class="text-110">
                                    Conversation
                                    </span>
                                    <span class="text-95 d-block d-sm-inline text-center">
                                    (6 online)
                                    </span>
                                </h6>
                                <div class="card-toolbar align-self-center text-white text-90 no-border p-2px">
                                    Jack is typing
                                    <div class="typing-dots text-160 text-white mx-md-1">
                                        <span class="typing-dot">.</span>
                                        <span class="typing-dot">.</span>
                                        <span class="typing-dot">.</span>
                                    </div>
                                </div>
                                <div class="card-toolbar align-self-center">
                                    <a href="#" data-action="reload" class="card-toolbar-btn text-white">
                                    <i class="fas fa-sync-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body border-x-1 brc-primary-l1 p-0">
                                <div class="ace-scroll ace-scroll-wrap" data-ace-scroll="{&quot;height&quot;: 380, &quot;smooth&quot;:true}" style="max-height: 397px;">
                                    <div class="ace-scroll-inner" style="color: rgb(65, 70, 77);">
                                        <!-- if conversation item is on left -->
                                        <div class="px-3 conversation mt-425">
                                        <div class="d-flex align-items-start col px-0">
                                            <div class="mr-3 mt-2px">
                                                <div class="pos-rel">
                                                    <img alt="Max's avatar" src="assets/image/avatar/avatar1.jpg" class="radius-round w-4 h-4">
                                                    <span class="position-tr bgc-success-d1 brc-white border-2 p-1 mt-n1 radius-round"></span>
                                                </div>
                                                <div class="text-600 text-90 ml-1">
                                                    <a href="#" class="font-bolder btn-text-dark btn-h-text-primary">
                                                    Max
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col px-0">
                                                <div class="d-flex mb-15 pos-rel">
                                                    <!-- the triangle -->
                                                    <span class="position-tl ml-n15 mt-15 w-3 h-3 bgc-grey-l3 rotate-n45"></span>
                                                    <div class="py-2 px-3 radius-1 bgc-grey-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        Raw denim you probably haven't heard of actively? So lorem ipsum indeed! <span class="fa-stack w-auto"> <i class="fas fa-circle text-dark fa-stack-1x text-100"></i> <i class="fas fa-smile-beam text-warning-m3 text-125 fa-stack-1x pos-rel"></i> </span>
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 ml-2 mt-2">
                                                    10:21
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-15 pos-rel">
                                                    <div class="py-2 px-3 radius-1 bgc-grey-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        Tell you what, dolor sit amet forever!
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 ml-2 mt-2">
                                                    10:23
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- if conversation item is on left -->
                                        <div class="px-3 conversation text-right mt-425">
                                        <div class="d-flex flex-row-reverse align-items-start col px-0">
                                            <div class="ml-3 mt-2px">
                                                <div class="pos-rel">
                                                    <img alt="Mia's avatar" src="assets/image/avatar/avatar7.jpg" class="radius-round w-4 h-4">
                                                    <span class="position-tr bgc-orange-d1 brc-white border-2 p-1 mt-n1 radius-round"></span>
                                                </div>
                                                <div class="text-600 text-90 ml-1">
                                                    <a href="#" class="font-bolder btn-text-dark btn-h-text-primary">
                                                    Mia
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col px-0">
                                                <div class="d-flex flex-row-reverse mb-15 pos-rel">
                                                    <!-- the triangle -->
                                                    <span class="position-tr mr-n15 mt-15 w-3 h-3 bgc-primary-l3 rotate-n45"></span>
                                                    <div class="py-2 px-3 radius-1 bgc-primary-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        Consectetur adipiscing elit, quis nostrud exercitation.
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 mr-2 mt-2">
                                                    10:25
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row-reverse mb-15 pos-rel">
                                                    <div class="py-2 px-3 radius-1 bgc-primary-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        So count me in! <i class="fa fa-thumbs-up text-orange-m1 text-125 ml-1"></i>
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 mr-2 mt-2">
                                                    10:25
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- if conversation item is on left -->
                                        <div class="px-3 conversation mt-425">
                                        <div class="d-flex align-items-start col px-0">
                                            <div class="mr-3 mt-2px">
                                                <div class="pos-rel">
                                                    <img alt="Max's avatar" src="assets/image/avatar/avatar1.jpg" class="radius-round w-4 h-4">
                                                    <span class="position-tr bgc-success-d1 brc-white border-2 p-1 mt-n1 radius-round"></span>
                                                </div>
                                                <div class="text-600 text-90 ml-1">
                                                    <a href="#" class="font-bolder btn-text-dark btn-h-text-primary">
                                                    Max
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col px-0">
                                                <div class="d-flex mb-15 pos-rel">
                                                    <!-- the triangle -->
                                                    <span class="position-tl ml-n15 mt-15 w-3 h-3 bgc-grey-l3 rotate-n45"></span>
                                                    <div class="py-2 px-3 radius-1 bgc-grey-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        Heard of them jean shorts Austin! Fusce dapibus, tellus ac cursus commodo, tortor mauris
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 ml-2 mt-2">
                                                    10:26
                                                    </div>
                                                </div>
                                                <div class="d-flex mb-15 pos-rel">
                                                    <div class="mt-2px pos-rel">
                                                    <div class="d-flex">
                                                        <div class="border-1 radius-2 mx-1 brc-primary-l1 shadow-sm d-style overflow-hidden"><img alt="Heedphones" src="assets/image/product/wireless-headphone.jpg" width="64" class="d-zoom-2"></div>
                                                        <div class="border-1 radius-2 mx-1 brc-primary-l1 shadow-sm d-style overflow-hidden"><img alt="Speakers" src="assets/image/product/smart-speaker.jpg" class="d-zoom-2" width="64"></div>
                                                        <div class="border-1 radius-2 mx-1 brc-primary-l1 shadow-sm d-style overflow-hidden"><img alt="Shoes" src="assets/image/product/running-shoes.jpg" class="d-zoom-2" width="64"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-- if conversation item is on left -->
                                        <div class="px-3 conversation text-right mt-425">
                                        <div class="d-flex flex-row-reverse align-items-start col px-0">
                                            <div class="ml-3 mt-2px">
                                                <div class="pos-rel">
                                                    <img alt="Mia's avatar" src="assets/image/avatar/avatar7.jpg" class="radius-round w-4 h-4">
                                                    <span class="position-tr bgc-orange-d1 brc-white border-2 p-1 mt-n1 radius-round"></span>
                                                </div>
                                                <div class="text-600 text-90 ml-1">
                                                    <a href="#" class="font-bolder btn-text-dark btn-h-text-primary">
                                                    Mia
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col px-0">
                                                <div class="d-flex flex-row-reverse mb-15 pos-rel">
                                                    <!-- the triangle -->
                                                    <span class="position-tr mr-n15 mt-15 w-3 h-3 bgc-primary-l3 rotate-n45"></span>
                                                    <div class="py-2 px-3 radius-1 bgc-primary-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        Are you sure fusce dapibus tellus ac cursus commodo??? <span class="fa-stack w-auto"> <i class="fas fa-circle text-dark fa-stack-1x text-100"></i> <i class="fas fa-grin-alt text-warning-m3 text-125 fa-stack-1x pos-rel"></i> </span>
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 mr-2 mt-2">
                                                    10:49
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row-reverse mb-15 pos-rel">
                                                    <div class="py-2 px-3 radius-1 bgc-primary-l3 text-dark-m1 pos-rel">
                                                    <div class="text-90" style="max-width: 480px;">
                                                        Considering donec id elit non mi porta gravida at eget metus is undermined
                                                    </div>
                                                    </div>
                                                    <div class="text-80 text-grey-m2 mr-2 mt-2">
                                                    10:50
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- conversation footer -->
                            <div class="card-footer px-25 pt-1px bgc-white border-1 border-t-0 brc-primary-l1 radius-b-2">
                                <div class="mb-0 p-3 dcard brc-grey-l1">
                                    <div class="input-group input-group-fade">
                                        <input id="id-reply" type="text" class="form-control pl-2 border-0 radius-0 shadow-none" placeholder="Write your message ...">
                                        <!-- smiley dropdown -->
                                        <div class="btn-group mx-2 dropup">
                                        <button type="button" class="btn btn-xs px-1 border-0 btn-lighter-warning btn-bgc-tp dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fa-stack">
                                        <i class="far fa-smile text-dark-tp5 text-150 fa-stack-1x"></i>
                                        </span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right p-1">
                                            <div class="d-flex">
                                                <a class="dropdown-item px-25" href="#">
                                                <span class="fa-stack w-auto">
                                                <i class="fas fa-circle text-dark fa-stack-1x text-100"></i>
                                                <i class="fas fa-smile text-warning-m3 text-125 fa-stack-1x pos-rel"></i>
                                                </span>
                                                </a>
                                                <a class="dropdown-item px-25" href="#">
                                                <span class="fa-stack w-auto">
                                                <i class="fas fa-circle text-dark fa-stack-1x text-100"></i>
                                                <i class="fas fa-smile-beam text-warning-m3 text-125 fa-stack-1x pos-rel"></i>
                                                </span>
                                                </a>
                                                <a class="dropdown-item px-25" href="#">
                                                <span class="fa-stack w-auto">
                                                <i class="fas fa-circle text-dark fa-stack-1x text-100"></i>
                                                <i class="fas fa-smile-wink text-warning-m3 text-125 fa-stack-1x pos-rel"></i>
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="input-group-append">
                                        <button class="btn btn-info radius-3px" type="button">
                                        Send
                                        <i class="fa fa-angle-right ml-1"></i>
                                        </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
                <footer class="footer d-none d-sm-block">
                    <div class="footer-inner bgc-white-tp1">
                        <div class="pt-3 border-none border-t-3 brc-grey-l2 border-double">
                            <span class="text-primary-m1 font-bolder text-120">Ace</span>
                            <span class="text-grey">Application © 2021</span>
                            <span class="mx-3 action-buttons">
                            <a href="#" class="text-blue-m2 text-150"><i class="fab fa-twitter-square"></i></a>
                            <a href="#" class="text-blue-d2 text-150"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-orange-d1 text-150"><i class="fa fa-rss-square"></i></a>
                            </span>
                        </div>
                    </div>
                    <!-- .footer-inner -->
                    <!-- `scroll to top` button inside footer (for example when in boxed layout) -->
                    <div class="footer-tools">
                        <a href="#" class="btn-scroll-up btn btn-dark mb-2 mr-2">
                        <i class="fa fa-angle-double-up mx-2px text-95"></i>
                        </a>
                    </div>
                </footer>
                <!-- footer toolbox for mobile view -->
                <footer class="d-sm-none footer footer-sm footer-fixed">
                    <div class="footer-inner">
                        <div class="btn-group d-flex h-100 mx-2 border-x-1 border-t-2 brc-primary-m3 bgc-white-tp1 radius-t-1 shadow">
                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0" data-toggle="modal" data-target="#id-ace-settings-modal">
                            <i class="fas fa-sliders-h text-blue-m1 text-120"></i>
                            </button>
                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0">
                            <i class="fa fa-plus-circle text-green-m1 text-120"></i>
                            </button>
                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navbar search">
                            <i class="fa fa-search text-orange text-120"></i>
                            </button>
                            <button class="btn btn-outline-primary btn-h-lighter-primary btn-a-lighter-primary border-0 mr-0">
                            <span class="pos-rel">
                            <i class="fa fa-bell text-purple-m1 text-120"></i>
                            <span class="badge badge-dot bgc-red position-tr mt-n1 mr-n2px"></span>
                            </span>
                            </button>
                        </div>
                    </div>
                </footer>
                </div>
                <div id="id-ace-settings-modal" class="my-1 my-lg-2 modal modal-nb ace-aside aside-right aside-offset aside-below-nav" data-backdrop="false" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content w-auto flex-grow-1 pb-1px radius-0 radius-l-2 border-y-2 border-l-1 brc-default-m3 bgc-white-tp1 shadow">
                        <div class="modal-header p-0 radius-0 mx-3">
                            <h4 class="modal-title text-primary-d1 text-140 pt-2 pl-1">Demo Settings</h4>
                            <button type="button" class="close m-0 mr-n2" data-dismiss="modal" aria-label="Close">
                            <i class="fa fa-times text-70" aria-hidden="true"></i>
                            </button>
                        </div>
                        <div class="modal-body mx-md-2 ace-scroll-lock ace-scroll ace-scroll-wrap" data-ace-scroll="{&quot;smooth&quot;: true, &quot;lock&quot;: true}" style="">
                            <div class="ace-scroll-inner" style="color: rgb(65, 70, 77);">
                            <form autocomplete="off">
                                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                    <h5 class="text-default-d2">
                                        Zoom
                                    </h5>
                                    <div class="btn-group btn-group-toggle align-self-end" data-toggle="buttons">
                                        <label class="btn btn-sm btn-lighter-grey btn-h-light-primary btn-a-primary">
                                        90%
                                        <input type="radio" name="zoom-level" value="90">
                                        </label>
                                        <label class="btn btn-sm btn-lighter-grey btn-h-light-primary btn-a-primary active">
                                        100%
                                        <input type="radio" name="zoom-level" value="none" checked="">
                                        </label>
                                        <label class="btn btn-sm btn-lighter-grey btn-h-light-primary btn-a-primary">
                                        110%
                                        <input type="radio" name="zoom-level" value="110">
                                        </label>
                                        <label class="btn btn-sm btn-lighter-grey btn-h-light-primary btn-a-primary">
                                        120%
                                        <input type="radio" name="zoom-level" value="120">
                                        </label>
                                    </div>
                                </div>
                                <hr class="border-double my-md-3">
                                <h5 class="text-purple-d1">
                                    Themes
                                </h5>
                                <div id="auto-match-div" class="bgc-secondary-l4 py-1 radius-1 mb-3 border-1 radius-1 border-l-3 brc-secondary-m4">
                                    <label class="mt-1 pr-2 d-flex align-items-center" for="id-auto-match">
                                    <input type="checkbox" class="input-lg mx-15" id="id-auto-match" checked="">
                                    <span class="pl-0 text-secondary-d1 text-90 font-bolder">
                                    Match sidebar &amp; navbar themes
                                    </span>
                                    </label>
                                </div>
                                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center mt-3">
                                    <h6 class="text-95 pl-1 text-grey-d1">Sidebar</h6>
                                    <div class="btn-group btn-group-toggle align-self-end flex-wrap px-0  col-10 col-sm-7" data-toggle="buttons">
                                        <label class="btn btn-sm btn-light-default btn-text-default btn-bgc-white btn-a-default btn-h-default">
                                        Dark
                                        <input type="radio" name="sidebar-theme" value="dark">
                                        </label>
                                        <label class="btn btn-sm btn-light-default btn-text-default btn-bgc-white btn-a-default btn-h-default">
                                        Light
                                        <input type="radio" name="sidebar-theme" value="light">
                                        </label>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-none bgc-secondary-l1 radius-1 px-1 mb-3 mt-1 text-center" id="id-sidebar-themes-dark">
                                        <div class="btn-group btn-group-toggle align-self-end flex-wrap justify-content-center w-75 mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-dark d-style active m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="dark" checked="">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-dark2 d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="dark2">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-darkblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="darkblue">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-darkslategrey d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="darkslategrey">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-cadetblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="cadetblue">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-plum d-style my-1px m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="plum">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-darkslateblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="darkslateblue">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-purple d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="purple">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-steelblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="steelblue">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-blue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="blue">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-teal d-style m-1px d-none">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="teal">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-green d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="green">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-darkcrimson d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="darkcrimson">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-gradient1 d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="gradient1">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-gradient2 d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="gradient2">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-gradient3 d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="gradient3">
                                        </label>
                                        <label class="btn btn-xs sidebar-color border-0 sidebar-gradient4 d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="sidebar-dark" value="gradient4">
                                        </label>
                                        <!--
                                            <label class="btn btn-xs sidebar-color border-0 sidebar-gradient5 d-style m-1px d-none">
                                                <i class="fa fa-check text-white v-active"></i>
                                                <input type="radio" name="sidebar-dark" value="gradient5"  />
                                            </label>
                                            -->
                                        </div>
                                    </div>
                                    <!-- #id-sidebar-themes-dark -->
                                    <div class="d-none" id="id-sidebar-themes-light">
                                        <div class="bgc-secondary-tp2 radius-1 py-1 px-1 mb-3 mt-1 text-center">
                                        <div class="d-flex btn-group btn-group-toggle align-self-end flex-wrap justify-content-center mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                            <label class="active btn btn-xs border-0 sidebar-white2 d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="white" checked="">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-white2 d-style m-1px d-none">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="white2">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-white3 d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="white3">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-white4 d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="white4">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-light d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="light">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-lightblue d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="lightblue">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-lightblue2 d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="lightblue2">
                                            </label>
                                            <label class="btn btn-xs border-0 sidebar-lightpurple d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="sidebar-light" value="lightpurple">
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- #id-sidebar-themes-light -->
                                </div>
                                <hr class="border-dotted">
                                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                    <h6 class="text-95 pl-1 text-grey-d1">Navbar</h6>
                                    <div id="navbar-themes-show" class="btn-group btn-group-toggle align-self-end flex-wrap px-0 col-10 col-sm-7" data-toggle="buttons">
                                        <label class="btn btn-sm btn-light-green btn-text-green btn-bgc-white btn-a-green btn-h-green">
                                        Light
                                        <input type="radio" name="navbar-theme" value="light">
                                        </label>
                                        <label class="btn btn-sm btn-light-green btn-text-green btn-bgc-white btn-a-green btn-h-green">
                                        Dark
                                        <input type="radio" name="navbar-theme" value="dark">
                                        </label>
                                    </div>
                                    <div id="navbar-themes-show-msg" class="d-none text-95 px-3 py-15 bgc-secondary-l3 border-1 brc-secondary-m4 border-dotted ml-3 radius-1">
                                        Navbar themes can be viewed in<br> <span>Dashboard <a class="btn-h-dark no-underline px-2px" href="html/dashboard.html">1</a> &amp; <a class="btn-h-dark no-underline px-2px" href="html/dashboard-4.html">4</a></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="d-none bgc-secondary-l1 radius-1 px-1 mb-3 mt-1 text-center" id="id-navbar-themes-dark">
                                        <div class="btn-group btn-group-toggle align-self-end flex-wrap justify-content-center w-75 mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                        <label class="btn btn-xs border-0 navbar-blue d-style active m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="blue" checked="">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-darkblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="darkblue">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-teal d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="teal">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-green d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="green">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-cadetblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="cadetblue">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-plum d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="plum">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-purple d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="purple">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-orange d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="orange">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-brown d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="brown">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-darkgreen d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="darkgreen">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-skyblue d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="skyblue">
                                        </label>
                                        <label class="btn btn-xs border-0 navbar-secondary d-style m-1px">
                                        <i class="fa fa-check text-white v-active"></i>
                                        <input type="radio" name="navbar-dark" value="secondary">
                                        </label>
                                        </div>
                                    </div>
                                    <!-- #id-navbar-themes-dark -->
                                    <div class="d-none" id="id-navbar-themes-light">
                                        <div class="bgc-secondary-tp2 radius-1 py-1 px-1 mb-3 mt-1 text-center">
                                        <div class="btn-group btn-group-toggle align-self-end flex-wrap justify-content-center w-75 mx-auto align-items-center my-2 flex-equal-sm" data-toggle="buttons">
                                            <label class="active btn btn-xs border-0 navbar-white d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="navbar-light" value="white" checked="">
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-white2 d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="navbar-light" value="white2">
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightblue d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="navbar-light" value="lightblue">
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightpurple d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="navbar-light" value="lightpurple">
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightgreen d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="navbar-light" value="lightgreen">
                                            </label>
                                            <label class="btn btn-xs border-0 navbar-lightgrey d-style m-1px">
                                            <i class="fa fa-check text-muted v-active"></i>
                                            <input type="radio" name="navbar-light" value="lightgrey">
                                            </label>
                                            <!--
                                                <label class="btn btn-xs border-0 navbar-lightyellow d-style m-1px">
                                                <i class="fa fa-check text-muted v-active"></i>
                                                <input type="radio" name="navbar-light" value="lightyellow"  />
                                                </label>
                                                
                                                <label class="btn btn-xs border-0 navbar-khaki d-style m-1px">
                                                <i class="fa fa-check text-muted v-active"></i>
                                                <input type="radio" name="navbar-light" value="khaki"  />
                                                </label>
                                                -->
                                        </div>
                                        </div>
                                    </div>
                                    <!-- #id-navbar-themes-light -->
                                </div>
                                <hr class="border-dotted">
                                <div class="text-95">
                                    <h5 class="text-success">Layout</h5>
                                    <div class="mt-3 d-flex justify-content-between align-items-center">
                                        <label for="id-navbar-fixed" class="pl-1 text-grey-d1">Fixed Navbar</label>
                                        <input type="checkbox" class="ace-switch" id="id-navbar-fixed" checked="">
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between align-items-center">
                                        <label for="id-sidebar-fixed" class="pl-1 text-grey-d1">Fixed Sidebar</label>
                                        <input type="checkbox" class="ace-switch" id="id-sidebar-fixed" checked="">
                                    </div>
                                    <div class="mt-2 d-flex justify-content-between align-items-center">
                                        <label for="id-footer-fixed" class="pl-1 text-grey-d1">Fixed Footer</label>
                                        <input type="checkbox" class="ace-switch" id="id-footer-fixed">
                                    </div>
                                    <div class="mt-2 d-none d-xl-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                        <div class="pl-1 text-grey-d1">Boxed Layout</div>
                                        <div class="w-50 btn-group btn-group-toggle flex-row flex-wrap fl1ex-md-nowrap" data-toggle="buttons">
                                        <label class="btn btn-sm btn-light-primary btn-bgc-white btn-text-primary btn-h-primary btn-a-primary">
                                        None
                                        <input type="radio" name="boxed-layout" value="none">
                                        </label>
                                        <label class="btn btn-sm btn-light-primary btn-bgc-white btn-text-primary btn-h-primary btn-a-primary">
                                        All
                                        <input type="radio" name="boxed-layout" value="all">
                                        </label>
                                        <label class="btn btn-sm btn-light-primary btn-bgc-white btn-text-primary btn-h-primary btn-a-primary">
                                        Not Navbar
                                        <input type="radio" name="boxed-layout" value="not-navbar">
                                        </label>
                                        <label class="btn btn-sm btn-light-primary btn-bgc-white btn-text-primary btn-h-primary btn-a-primary active">
                                        Only Content
                                        <input type="radio" name="boxed-layout" value="only-content" checked="">
                                        </label>
                                        </div>
                                    </div>
                                    <div id="id-body-bg" class="collapse">
                                        <div class="mt-3 d-none d-xl-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                        <h6 class="text-95 pl-1 text-grey-d1">Body Background:</h6>
                                        <div class="btn-group btn-group-toggle align-self-end" data-toggle="buttons">
                                            <label class="btn btn-sm btn-outline-purple active mb-1">
                                            None
                                            <input type="radio" name="body-theme" value="auto" checked="">
                                            </label>
                                            <label class="btn btn-sm btn-outline-purple mb-1">
                                            Image 1
                                            <input type="radio" name="body-theme" value="img1">
                                            </label>
                                            <label class="btn btn-sm btn-outline-purple mb-1">
                                            Image 2
                                            <input type="radio" name="body-theme" value="img2">
                                            </label>
                                        </div>
                                        </div>
                                    </div>
                                    <hr class="border-dotted my-2">
                                    <div class="mt-1 d-flex justify-content-between align-items-center">
                                        <label for="id-rtl" class="pl-1 text-grey-d1">RTL (right to left)</label>
                                        <input type="checkbox" class="ace-switch" id="id-rtl">
                                    </div>
                                </div>
                                <hr class="border-double my-md-4">
                                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center">
                                    <h5 class="text-info">Font</h5>
                                    <div class="align-self-end w-75">
                                        <select id="id-change-font" class="ace-select radius-round w-100 text-grey brc-h-info-m2">
                                        <option value="lato">Lato</option>
                                        <option value="manrope">Manrope</option>
                                        <option value="montserrat">Montserrat</option>
                                        <option value="noto-sans">Noto Sans</option>
                                        <option value="open-sans" selected="">Open Sans</option>
                                        <option value="poppins">Poppins</option>
                                        <option value="raleway">Raleway</option>
                                        <option value="roboto" class="text-primary-d2 text-600">Roboto (popular)</option>
                                        <option value="">----</option>
                                        <option value="markazi">Markazi (for RTL languages)</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="border-double my-md-4">
                                <div class="text-95">
                                    <h5 class="text-orange-d2 ml-n2px">Sidebar</h5>
                                    <!--
                                        <div class="mt-3 d-none d-xl-flex justify-content-between align-items-center">
                                            <label for="id-sidebar-compact" class="pl-1 text-grey-d2">Compact</label>
                                        
                                            <div class="custom-control custom-switch d-inline-block">
                                            <input type="checkbox" class="custom-control-input" id="id-sidebar-compact"  />
                                            <label class="custom-control-label" for="id-sidebar-compact"></label>
                                            </div>
                                        </div>
                                        -->
                                    <div class="mt-2 d-none d-xl-flex justify-content-between align-items-center">
                                        <div class="pl-1 text-grey-d1">Collapsed Mode</div>
                                        <div class="btn-group btn-group-toggle flex-row" data-toggle="buttons">
                                        <label class="btn btn-sm btn-outline-red active">
                                        Expand
                                        <input type="radio" name="sidebar-collapsed" value="expandable" checked="">
                                        </label>
                                        <label class="btn btn-sm btn-outline-red">
                                        Popup
                                        <input type="radio" name="sidebar-collapsed" value="hoverable">
                                        </label>
                                        <label class="btn btn-sm btn-outline-red">
                                        Hide
                                        <input type="radio" name="sidebar-collapsed" value="hideable">
                                        </label>
                                        </div>
                                    </div>
                                    <div class="mt-3 d-none d-xl-flex justify-content-between align-items-center">
                                        <label for="id-sidebar-hover" class="pl-1 text-grey-d1">Submenu on Hover</label>
                                        <label>
                                        <input type="checkbox" class="ace-switch" id="id-sidebar-hover">
                                        </label>
                                    </div>
                                    <div class="mt-2 d-flex d-xl-none justify-content-between align-items-center">
                                        <label for="id-push-content" class="pl-1 text-grey-d1">Push Content</label>
                                        <label>
                                        <input type="checkbox" class="ace-switch" id="id-push-content">
                                        </label>
                                    </div>
                                </div>
                                <div class="my-1"></div>
                            </form>
                            </div>
                        </div>
                        <div class="modal-footer d-none justify-content-center">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                            <i class="fa fa-times mr-1"></i>
                            Close
                            </button>
                            <button type="button" class="btn btn-info">
                            <i class="fa fa-check mr-1"></i>
                            Keep changes
                            </button>
                        </div>
                    </div>
                    <!-- .modal-content -->
                    <div class="aside-header align-self-start mt-1 mt-lg-5 text-right d-style">
                        <button type="button" class="btn btn-orange btn-lg shadow-sm pl-2 radius-l-2 f-n-hover py-1 py-md-2" data-toggle="modal" data-target="#id-ace-settings-modal">
                        <i class="fa fa-cog text-110 ml-1"></i>
                        </button>
                    </div>
                </div>
                <!-- .modal-dialog -->
                </div>
                <!-- .modal-aside -->
            </div>
        </div>
        <!-- include common vendor scripts used in demo pages -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
        <!-- include vendor scripts used in "Dashboard" page. see "/views//pages/partials/dashboard/@vendor-scripts.hbs" -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.13.0/Sortable.min.js"></script>
        <!-- include ace.js -->
        <script src="./dist/js/ace.min.js"></script>
        <!-- demo.js is only for Ace's demo and you shouldn't use it -->
        <script src="./app/browser/demo.min.js"></script>
        <!-- "Dashboard" page script to enable its demo functionality -->
        <script>
            jQuery(function($) {
            
            // show tooltips only when not touchscreen
            if (!('ontouchstart' in window)) $('[data-toggle="tooltip"]').tooltip({
                container: 'body'
            })
            
            
            // display the message only 2 times
            var displayed = parseInt(localStorage.getItem('welcome.classic.ace') || '0');
            if (displayed < 2) {
                localStorage.setItem('welcome.classic.ace', displayed + 1)
            
                $.aceToaster.add({
                placement: 'tc',
                body: "<div class='py-2 pl-1 pr-3 d-flex '>\
                        <span class='d-inline-block mr-2 text-center py-3 px-1'>\
                        <i class='pos-abs fa fa-leaf fa-2x w-6 text-dark-m3 mt-2px'></i>\
                        <i class='pos-rel fa fa-leaf fa-2x w-6 text-success-m3 mr-1'></i>\
                        </span>\
                        <div>\
                        <h3 class='text-125 text-success'>Welcome to Ace!</h3>\
                        <p class='mb-1'>A lightweight, feature-rich, customizable and easy to use admin template!</p>\
                        </div>\
                        <button data-dismiss='toast' class='btn btn-sm btn-brc-tp btn-lighter-grey btn-h-lighter-danger btn-a-lighter-danger radius-round position-tr mt-1 mr-2px'>\
                        <i class='fa fa-times px-1px'></i>\
                        </button>\
                    </div>",
            
                width: 500,
                delay: 10,
                //sticky: true,
            
                progress: 'position-tl bgc-success-tp1 pt-3px',
                progressReverse: true,
            
                close: false,
                //belowNav: true,
            
                className: 'bgc-white overflow-hidden border-0 p-0 radius-0',
            
                bodyClass: 'border-1 border-t-0 brc-secondary-l2 text-dark-tp3 text-120 p-2',
                headerClass: 'd-none'
                })
            }
            
            
            //////////////////////////////////////////////////
            // Sortable task list
            Sortable.create(document.getElementById('tasks'), {
                draggable: ".task-item",
                filter: "label.checkbox",
                preventOnFilter: false,
                animation: 200,
            
                ghostClass: "bgc-yellow-l1", // Class name for the drop placeholder
                chosenClass: "", // Class name for the chosen item
                dragClass: "", // Class name for the dragging item
            })
            
            // toggle tasks checkbox on/off
            $('#tasks input[type=checkbox]').on('change', function() {
                $(this).closest('#tasks > div').toggleClass('bgc-secondary-l4', this.checked).find('label').toggleClass('line-through text-grey-d2', this.checked);
            })
            
            
            
            //////////////////////////////////////////////////
            //draw charts
            
            
            // make sure no animation is displayed according to user preferences
            var _animate = !AceApp.Util.isReducedMotion()
            
            
            // Traffic Sources piechart
            var trafficSourceCanvas = document.getElementById('traffic-source-chart');
            
            var trafficSourcePieChart = new Chart(trafficSourceCanvas, {
                type: 'doughnut',
                data: {
                datasets: [{
                    label: 'Traffic Sources',
                    data: [40.7, 27.5, 9.3, 19.6, 4.9],
                    backgroundColor: [
                    "#4ca5ae",
                    "#f18e5d",
                    "#ea789d",
                    "#22c1e4",
                    "#e2e3e4"
                    ],
                }],
                labels: [
                    'Social Networks',
                    'Search Engines',
                    'Ad Campaings',
                    'Direct Traffic',
                    'Other'
                ]
                },
            
                options: {
                responsive: true,
            
                cutoutPercentage: 70,
                legend: {
                    display: false
                },
                animation: {
                    animateRotate: true,
                    duration: _animate ? 1000 : false
                },
                tooltips: {
                    enabled: true,
                    cornerRadius: 0,
                    bodyFontColor: '#fff',
                    bodyFontSize: 14,
                    fontStyle: 'bold',
            
                    backgroundColor: 'rgba(34, 34, 34, 0.73)',
                    borderWidth: 0,
            
                    caretSize: 5,
            
                    xPadding: 12,
                    yPadding: 12,
            
                    callbacks: {
                    label: function(tooltipItem, data) {
                        return ' ' + data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] + '%'
                    }
                    }
                }
                }
            })
            
            // place the legends
            $(trafficSourceCanvas)
                .parent().after("<div id='traffic-source-legends' class='piechart-legends text-95 text-secondary-d3'>" + trafficSourcePieChart.generateLegend() + "</div>")
            
            
            
            ////////////////////////////
            // the sales stats chart
            var salesChart = document.getElementById("saleschart")
            if (salesChart.parentNode.offsetWidth < 600) {
                salesChart.height = 180
            }
            
            var salesChartCtx = salesChart.getContext("2d")
            
            /*** Background Gradient ***/
            var gradient1 = salesChartCtx.createLinearGradient(0, 0, 0, 400)
            gradient1.addColorStop(0, 'rgba(114,193,224, 0.2)')
            gradient1.addColorStop(1, 'rgba(114,193,224, 0)')
            
            var gradient2 = salesChartCtx.createLinearGradient(0, 0, 0, 300)
            gradient2.addColorStop(0, 'rgba(138,200,138, 0.45)')
            gradient2.addColorStop(1, 'rgba(138,200,138, 0)')
            
            var gradients = [gradient1, gradient2]
            
            var chartOptions1 = {
                lineTension: 0.3,
                borderWidth: 1.5,
                pointRadius: 0
            }
            
            new Chart(salesChartCtx, {
                type: 'line',
                data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "In-store",
                    data: [3200, 1500, 3500, 2500, 3200, 7000, 2300, 3500, 3500, 6000, 6200, 8100],
            
                    borderColor: '#72c1e0',
                    pointBorderColor: '#72c1e0',
            
                    fill: true,
                    backgroundColor: gradients[0],
                    pointBackgroundColor: '#fff',
            
                    borderWidth: chartOptions1.borderWidth,
                    pointRadius: chartOptions1.pointRadius,
                    lineTension: chartOptions1.lineTension,
                    },
                    {
                    label: "Online",
                    data: [2500, 4200, 3000, 4000, 5500, 4800, 4600, 5900, 5800, 8900, 8200, 9000],
            
                    borderColor: '#8ac88a',
                    pointBorderColor: '#8ac88a',
            
                    fill: true,
                    backgroundColor: gradients[1],
                    pointBackgroundColor: '#fff',
            
                    borderWidth: chartOptions1.borderWidth,
                    pointRadius: chartOptions1.pointRadius,
                    lineTension: chartOptions1.lineTension,
                    }
                ]
                },
            
                options: {
                responsive: true,
                animation: {
                    duration: _animate ? 1000 : false
                },
            
                datasetStrokeWidth: 3,
                pointDotStrokeWidth: 4,
            
                tooltips: {
                    enabled: true,
                    cornerRadius: 0,
            
                    titleFontColor: 'rgba(0, 0, 0, 0.8)',
                    titleFontSize: 16,
                    titleFontStyle: 'normal',
                    titleFontFamily: 'Open Sans',
            
            
                    bodyFontColor: 'rgba(0, 0, 0, 0.8)',
                    bodyFontSize: 14,
                    bodyFontFamily: 'Open Sans',
            
                    backgroundColor: 'rgba(255, 255, 255, 0.73)',
                    borderWidth: 2,
                    borderColor: 'rgba(254, 224, 116, 0.73)',
            
                    caretSize: 5,
            
                    xPadding: 12,
                    yPadding: 12,
                },
            
                scales: {
                    yAxes: [{
                    ticks: {
                        fontFamily: "Open Sans",
                        fontColor: "#a0a4a9",
                        fontStyle: "600",
                        fontSize: 12,
                        beginAtZero: false,
                        maxTicksLimit: 6,
                        padding: 16,
                        callback: function(value, index, values) {
                        var val = parseInt(value / 1000);
                        return val > 0 ? val + 'k' : val;
                        }
                    },
                    gridLines: {
                        drawTicks: false,
                        display: false
                    }
                    }],
            
                    xAxes: [{
                    gridLines: {
                        zeroLineColor: "transparent",
                        display: true,
                        borderDash: [2, 3],
                        tickMarkLength: 3
                    },
                    ticks: {
                        fontFamily: "Open Sans",
                        fontColor: "#808489",
                        fontSize: 13,
                        fontStyle: "400",
                        padding: 12
                    }
                    }]
                },
            
                legend: {
                    display: true,
                    position: 'top'
                }
                }
            })
            
            
            
            ///////////
            // the Page views chart in infoboxes
            $('canvas.infobox-line-chart').each(function() {
                var ctx = this.getContext('2d');
                var gradientbg = ctx.createLinearGradient(0, 0, 0, 50);
                gradientbg.addColorStop(0, 'rgba(109, 187, 109, 0.25)');
                gradientbg.addColorStop(1, 'rgba(109, 187, 109, 0.05)');
            
                let data = $(this).data('values');
            
                new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                    datasets: [{
                        data: data,
                        backgroundColor: gradientbg,
                        hoverBackgroundColor: '#70bcd9',
                        fill: true,
            
                        borderColor: 'rgba(109, 187, 109, 0.8)',
            
                        borderWidth: 2.25,
                        pointRadius: 7,
                        lineTension: 0.4,
            
                        pointBackgroundColor: 'transparent',
                        pointBorderColor: 'transparent',
            
                        pointHoverBackgroundColor: 'rgba(109, 187, 109, 0.8)',
                        pointHoverBorderColor: 'rgba(109, 187, 109, 0.8)',
                    },
                    {
                        type: 'bar',
                        data: data,
                        backgroundColor: 'transparent',
                        hoverBackgroundColor: 'transparent',
                        fill: false,
            
                        borderColor: 'transparent',
            
                        barPercentage: 0.8
                    },
                    ]
                },
            
                options: {
            
                    responsive: false,
                    animation: {
                    duration: _animate ? 1000 : false
                    },
            
                    legend: {
                    display: false
                    },
                    layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: -10
                    }
                    },
                    scales: {
                    yAxes: [{
                        stacked: true,
                        ticks: {
                        display: false,
                        beginAtZero: true,
                        },
                        gridLines: {
                        display: false,
                        drawBorder: false
                        }
                    }],
            
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                        display: false,
                        drawBorder: false
                        },
                        ticks: {
                        display: false //this will remove only the label
                        }
                    }, ]
                    }, //scales
            
                    tooltips: {
                    // Disable the on-canvas tooltip, because canvas area is small and tooltips will be cut (clipped)
                    enabled: false,
                    mode: 'index',
            
                    //use bootstrap tooltip instead
                    custom: function(tooltipModel) {
                        var title = '';
                        var canvas = this._chart.canvas;
            
                        if (tooltipModel.body) {
                        title = tooltipModel.title[0] + ': ' + Number(tooltipModel.body[0].lines[0]).toLocaleString();
                        }
                        canvas.setAttribute('data-original-title', title); //will be used by bootstrap tooltip
            
                        $(canvas)
                        .tooltip({
                            placement: 'bottom',
                            template: '<div class="tooltip" role="tooltip"><div class="brc-info-d2 arrow"></div><div class="bgc-info-d2 tooltip-inner text-600 text-110"></div></div>'
                        })
                        .tooltip('show')
                        .on('hidden.bs.tooltip', function() {
                            canvas.setAttribute('data-original-title', ''); //so that when mouse is back over canvas's blank area, no tooltip is shown
                        });
            
                    }
                    } // tooltips
            
                }
                })
            })
            
            
            // infobox's circular progress bar
            $('canvas.infobox-progress-chart').each(function() {
                var color = $(this).css('color')
            
                new Chart(this.getContext('2d'), {
                type: 'doughnut',
                data: {
                    datasets: [{
                    data: [$(this).data('percent'), 100 - $(this).data('percent')],
                    backgroundColor: [
                        color,
                        "#e3e5ea"
                    ],
                    hoverBackgroundColor: [
                        color,
                        "#e3e5ea"
                    ],
                    borderWidth: 0
                    }]
                },
            
                options: {
                    responsive: false,
                    cutoutPercentage: 80,
                    legend: {
                    display: false
                    },
                    animation: {
                    duration: _animate ? 500 : false,
                    easing: 'easeInCubic'
                    },
                    tooltips: {
                    enabled: false,
                    }
                }
                })
            })
            
            
            })
            
            
            // Update conversation's max-height according to available space
            var updateScrollAreaHeight = function() {
            var _scroller = document.querySelector('#conversations [class*="ace-scroll"]')
            _scroller.style.display = 'none'
            if (_scroller) _scroller.style.maxHeight = (Math.max(320, _scroller.parentNode.clientHeight)) + 'px'
            _scroller.style.display = ''
            }
            window.addEventListener('load', updateScrollAreaHeight)
            window.addEventListener('resize', updateScrollAreaHeight)
        </script>
        <div class="scroll-btn-observe"></div>
    </body>
</html>