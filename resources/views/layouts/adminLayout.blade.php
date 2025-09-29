<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from androthemes.com/themes/html/medjestic/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Sep 2025 10:31:26 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Medjestic</title>
    <!-- Iconic Fonts -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset('vendors/iconic-fonts/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/flat-icons/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/iconic-fonts/cryptocoins/cryptocoins-colors.css') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets2/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- jQuery UI -->
    <link href="{{ asset('assets2/css/jquery-ui.min.css') }}" rel="stylesheet">

    <!-- Page Specific CSS (Slick Slider.css) -->
    <link href="{{ asset('assets2/css/slick.css') }}" rel="stylesheet">

    <!-- Medjestic styles -->
    <link href="{{ asset('assets2/css/style.css') }}" rel="stylesheet">

    <!-- Page Specific CSS (Morris Charts.css) -->
    <link href="{{ asset('assets2/css/morris.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.ico') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
</head>
@yield('scripts')
<body class="ms-body ms-aside-left-open ms-primary-theme ms-has-quickbar">
    <!-- Setting Panel -->
    <div class="ms-toggler ms-settings-toggle ms-d-block-lg">
        <i class="flaticon-gear"></i>
    </div>
    <div class="ms-settings-panel ms-d-block-lg">
        <div class="row">
            <div class="col-xl-4 col-md-4">
                <h4 class="section-title">Customize</h4>
                <div>
                    <label class="ms-switch">
                        <input type="checkbox" id="dark-mode">
                        <span class="ms-switch-slider round"></span>
                    </label>
                    <span> Dark Mode </span>
                </div>

            </div>
            <div class="col-xl-4 col-md-4">
                <h4 class="section-title">Keyboard Shortcuts</h4>
                <p class="ms-directions mb-0"><code>Esc</code> Close Quick Bar</p>
                <p class="ms-directions mb-0"><code>Alt + (1 -> 6)</code> Open Quick Bar Tab</p>
                <p class="ms-directions mb-0"><code>Alt + Q</code> Enable Quick Bar Configure Mode</p>
            </div>
        </div>
    </div>

    <!-- Overlays -->
    <div class="ms-aside-overlay ms-overlay-left ms-toggler" data-target="#ms-side-nav" data-toggle="slideLeft"></div>
    <div class="ms-aside-overlay ms-overlay-right ms-toggler" data-target="#ms-recent-activity" data-toggle="slideRight"></div>
    <!-- Sidebar Navigation Left -->
    @include('partials.admin-side-bar')
    <!-- Sidebar Right -->
    <aside id="ms-recent-activity" class="side-nav fixed ms-aside-right ms-scrollable">
        <div class="ms-aside-header">
            <ul class="nav nav-tabs tabs-bordered d-flex nav-justified mb-3" role="tablist">
                <li role="presentation" class="fs-12"><a href="#activityLog" aria-controls="activityLog" class="active" role="tab" data-toggle="tab"> Activity Log</a></li>
                <li role="presentation" class="fs-12"><a href="#recentPosts" aria-controls="recentPosts" role="tab" data-toggle="tab"> Settings </a></li>
                <li><button type="button" class="close ms-toggler text-center" data-target="#ms-recent-activity" data-toggle="slideRight"><span aria-hidden="true">&times;</span></button></li>
            </ul>
        </div>
        <div class="ms-aside-body">
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active fade show" id="activityLog">
                    <ul class="ms-activity-log">
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-light">
                                <i class="flaticon-gear"></i>
                            </div>
                            <h6>Update 1.0.0 Pushed</h6>
                            <span> <i class="material-icons">event</i>1 January, 2019</span>
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-success">
                                <i class="flaticon-tick-inside-circle"></i>
                            </div>
                            <h6>Profile Updated</h6>
                            <span> <i class="material-icons">event</i>4 March, 2018</span>
                            <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-warning">
                                <i class="flaticon-alert-1"></i>
                            </div>
                            <h6>Your payment is due</h6>
                            <span> <i class="material-icons">event</i>1 January, 2019</span>
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-danger">
                                <i class="flaticon-alert"></i>
                            </div>
                            <h6>Database Error</h6>
                            <span> <i class="material-icons">event</i>4 March, 2018</span>
                            <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-info">
                                <i class="flaticon-information"></i>
                            </div>
                            <h6>Checkout what's Trending</h6>
                            <span> <i class="material-icons">event</i>1 January, 2019</span>
                            <p class="fs-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, ula in sodales vehicula....</p>
                        </li>
                        <li>
                            <div class="ms-btn-icon btn-pill icon btn-secondary">
                                <i class="flaticon-diamond"></i>
                            </div>
                            <h6>Your Dashboard is ready</h6>
                            <span> <i class="material-icons">event</i>4 March, 2018</span>
                            <p class="fs-14">Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary d-block"> View All </a>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="recentPosts">
                    <h6>General Settings</h6>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Location Tracking</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Allow Notifications</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Allow Popups</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked>
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <h6>Log Settings</h6>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Enable Logging</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked>
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Audit Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Error Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked>
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <h6>Advanced Settings</h6>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Enable Logging</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked>
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Audit Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox">
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                    <div class="ms-form-group">
                        <span class="ms-option-name fs-14">Error Logs</span>
                        <label class="ms-switch float-right">
                            <input type="checkbox" checked>
                            <span class="ms-switch-slider round"></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Main Content -->
    <main class="body-content">
        <!-- Navigation Bar -->
        <nav class="navbar ms-navbar">
            <div class="ms-aside-toggler ms-toggler pl-0" data-target="#ms-side-nav" data-toggle="slideLeft">
                <span class="ms-toggler-bar bg-white"></span>
                <span class="ms-toggler-bar bg-white"></span>
                <span class="ms-toggler-bar bg-white"></span>
            </div>
            <div class="logo-sn logo-sm ms-d-block-sm">
                <a class="pl-0 ml-0 text-center navbar-brand mr-0" href="index-2.html"><img src="{{asset('assets2/img/medjestic-logo-84x41.png')}}" alt="logo"> </a>
            </div>
            <ul class="ms-nav-list ms-inline mb-0" id="ms-nav-options">

                <li class="ms-nav-item  ms-d-none">
                    <a href="#mymodal" class="text-white" data-toggle="modal"><i class="flaticon-spreadsheet mr-2"></i> Make an appointment</a>
                </li>

                <li class="ms-nav-item ms-d-none">
                    <a href="#prescription" class="text-white" data-toggle="modal"><i class="flaticon-pencil mr-2"></i> Write a prescription</a>
                </li>

                <li class="ms-nav-item ms-d-none">
                    <a href="#report1" class="text-white" data-toggle="modal"><i class="flaticon-list mr-2"></i> Generate Report</a>
                </li>

                <li class="ms-nav-item dropdown">
                    <a href="#" class="text-disabled ms-has-notification" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flaticon-bell"></i></a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Notifications</span></h6>
                            <span class="badge badge-pill badge-info">4 New</span>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="ms-scrollable ms-dropdown-list">
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>12 ways to improve your crypto dashboard</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 30 seconds ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>You have newly registered users</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 45 minutes ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>Your account was logged in from an unauthorized IP</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 2 hours ago</p>
                                </div>
                            </a>
                            <a class="media p-2" href="#">
                                <div class="media-body">
                                    <span>An application form has been submitted</span>
                                    <p class="fs-10 my-1 text-disabled"><i class="material-icons">access_time</i> 1 day ago</p>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-menu-footer text-center">
                            <a href="#">View all Notifications</a>
                        </li>
                    </ul>
                </li>
                <li class="ms-nav-item ms-nav-user dropdown">
                    <a href="#" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img class="ms-user-img ms-img-round float-right" src="{{asset('assets2/img/dashboard/doctor-3.jpg')}}" alt="people"> </a>
                    <ul class="dropdown-menu dropdown-menu-right user-dropdown" aria-labelledby="userDropdown">
                        <li class="dropdown-menu-header">
                            <h6 class="dropdown-header ms-inline m-0"><span class="text-disabled">Welcome, Dr Samuel Deo</span></h6>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="ms-dropdown-list">
                            <a class="media fs-14 p-2" href="pages/prebuilt-pages/user-profile.html"> <span><i class="flaticon-user mr-2"></i> Profile</span> </a>
                            <a class="media fs-14 p-2" href="pages/apps/email.html"> <span><i class="flaticon-mail mr-2"></i> Inbox</span> <span class="badge badge-pill badge-info">3</span> </a>
                            <a class="media fs-14 p-2" href="pages/prebuilt-pages/user-profile.html"> <span><i class="flaticon-gear mr-2"></i> Account Settings</span> </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="dropdown-menu-footer">
                            <a class="media fs-14 p-2" href="pages/prebuilt-pages/lock-screen.html"> <span><i class="flaticon-security mr-2"></i> Lock</span> </a>
                        </li>
                        <li class="dropdown-menu-footer">
                            <a class="media fs-14 p-2" href="pages/prebuilt-pages/default-login.html"> <span><i class="flaticon-shut-down mr-2"></i> Logout</span> </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="ms-toggler ms-d-block-sm pr-0 ms-nav-toggler" data-toggle="slideDown" data-target="#ms-nav-options">
                <span class="ms-toggler-bar bg-white"></span>
                <span class="ms-toggler-bar bg-white"></span>
                <span class="ms-toggler-bar bg-white"></span>
            </div>
        </nav>
        <!-- Body Content Wrapper -->
        <div class="ms-content-wrapper">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    <!-- MODALS -->
    <!-- Reminder Modal -->
    <div class="modal fade" id="reminder-modal" tabindex="-1" role="dialog" aria-labelledby="reminder-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title has-icon text-white"> New Reminder</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="ms-form-group">
                            <label>Remind me about</label>
                            <textarea class="form-control" name="reminder"></textarea>
                        </div>
                        <div class="ms-form-group">
                            <span class="ms-option-name fs-14">Repeat Daily</span>
                            <label class="ms-switch float-right">
                                <input type="checkbox">
                                <span class="ms-switch-slider round"></span>
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="ms-form-group">
                                    <input type="text" class="form-control datepicker" name="reminder-date" value="" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="ms-form-group">
                                    <select class="form-control" name="reminder-time">
                                        <option value="">12:00 pm</option>
                                        <option value="">1:00 pm</option>
                                        <option value="">2:00 pm</option>
                                        <option value="">3:00 pm</option>
                                        <option value="">4:00 pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Reminder</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Notes Modal -->
    <div class="modal fade" id="notes-modal" tabindex="-1" role="dialog" aria-labelledby="notes-modal">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title has-icon text-white" id="NoteModal">New Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="ms-form-group">
                            <label>Note Title</label>
                            <input type="text" class="form-control" name="note-title" value="">
                        </div>
                        <div class="ms-form-group">
                            <label>Note Description</label>
                            <textarea class="form-control" name="note-description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal">Add Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Make An Appointment</h4>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-hidden="true">x</button>

                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Patient Information</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom01">Patient Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom01" placeholder="Enter Name" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom02">Date Of Birth</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom02" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom03">Disease</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="Disease" required>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-2">
                                            <label for="validationCustom04">Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom04" placeholder="Add Address" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom05">Phone no.</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom05" placeholder="Enter Phone No." required>

                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom06">Department Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom06" placeholder="Enter Department Name" required>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom07">Appointment With</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom07" placeholder="Enter Doctor Name" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom08">Appointment Date</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom08" placeholder="Enter Appointment Date" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Sex</label>
                                            <ul class="ms-list d-flex">
                                                <li class="ms-list-item pl-0">
                                                    <label class="ms-checkbox-wrap">
                                                        <input type="radio" name="radioExample" value="">
                                                        <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Male </span>
                                                </li>
                                                <li class="ms-list-item">
                                                    <label class="ms-checkbox-wrap">
                                                        <input type="radio" name="radioExample" value="" checked="">
                                                        <i class="ms-checkbox-check"></i>
                                                    </label>
                                                    <span> Female </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Reset</button>
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Add Appointment</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="prescription" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Make a prescription</h4>
                    <button type="button" class="close  text-white" data-dismiss="modal" aria-hidden="true">x</button>

                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Patient Information</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom09">Patient Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom09" placeholder="Enter Name" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom10">Date Of Birth</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom10" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="validationCustom11">Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom11" placeholder="Add Address" required>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom12">Phone no.</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom12" placeholder="Enter Phone No." required>

                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom13">Medication</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom13" placeholder="Acetaminophen" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom14">Period Of medication</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom14" placeholder="" required>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom15">Appointment With</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom15" placeholder="Enter Doctor Name" required>

                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Save Prescription</button>
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Save & Print</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="report1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ms-modal-dialog-width">
            <div class="modal-content ms-modal-content-width">
                <div class="modal-header  ms-modal-header-radius-0">
                    <h4 class="modal-title text-white">Generate report</h4>
                    <button type="button" class="close  text-white" data-dismiss="modal" aria-hidden="true">x</button>

                </div>
                <div class="modal-body p-0 text-left">
                    <div class="col-xl-12 col-md-12">
                        <div class="ms-panel ms-panel-bshadow-none">
                            <div class="ms-panel-header">
                                <h6>Patient Information</h6>
                            </div>
                            <div class="ms-panel-body">
                                <form class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom16">Patient Name</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom16" placeholder="Enter Name" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom17">Date Of Birth</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom17" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="validationCustom22">Address</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom22" placeholder="Add Address" required>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom18">Phone no.</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom18" placeholder="Enter Phone No." required>

                                            </div>

                                        </div>

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom19">Report Type</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom19" placeholder="Diseases Report" required>

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom23">Report Period</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="validationCustom23" placeholder="" required>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-row">

                                        <div class="col-md-4 mb-3">
                                            <label for="validationCustom20">Appointment With</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="validationCustom20" placeholder="Enter Doctor Name" required>

                                            </div>
                                        </div>

                                    </div>
                                    <button class="btn btn-warning mt-4 d-inline w-20" type="submit">Generate Report</button>
                                    <button class="btn btn-primary mt-4 d-inline w-20" type="submit">Generate & Print</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>




<script>
document.addEventListener('DOMContentLoaded', function () {
    // Vérifie que le navigateur supporte les notifications
    if (!("Notification" in window)) return;

    // Demande la permission si elle n'est pas déjà accordée
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    }

    // Récupère les événements à venir
    fetch('/upcoming-events')
        .then(res => res.json())
        .then(events => {
            events.forEach(event => {
                if (Notification.permission === "granted") {
                    new Notification(`Rappel d'événement dans 3 jours`, {
                        body: `${event.title} à ${event.location} le ${event.date}`,
                        icon: '/path/to/icon.png' // facultatif, tu peux mettre un logo
                    });
                }
            });
        })
        .catch(err => console.error(err));
});
</script>





    <!-- SCRIPTS -->
    <!-- Global Required Scripts Start -->
    <script src="{{ asset('assets2/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets2/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('assets2/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets2/js/moment.js') }}"></script>
    <script src="{{ asset('assets2/js/jquery.webticker.min.js') }}"></script>

    <script src="{{ asset('assets2/js/framework.js') }}"></script>
    <script src="{{ asset('assets2/js/settings.js') }}"></script>
</body>


<!-- Mirrored from androthemes.com/themes/html/medjestic/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 27 Sep 2025 10:33:04 GMT -->

</html>