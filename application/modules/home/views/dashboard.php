<!DOCTYPE html>
<html lang="en" <?php
                if (!$this->ion_auth->in_group(array('superadmin'))) {
                    $this->db->where('hospital_id', $this->hospital_id);
                    $settings_lang = $this->db->get('settings')->row()->language;
                    if ($settings_lang == 'arabic') {
                ?> dir="rtl" <?php } else { ?> dir="ltr" <?php
                                                }
                                            } else {
                                                $this->db->where('hospital_id', 'superadmin');
                                                $settings_lang = $this->db->get('settings')->row()->language;
                                                if ($settings_lang == 'arabic') {
                                                    ?> dir="rtl" <?php } else { ?> dir="ltr" <?php
                                                    }
                                                }
                                                        ?>>

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Rizvi">
    <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
    <link rel="shortcut icon" href="uploads/favicon.png">

    <?php
    $class_name = $this->router->fetch_class();
    $class_name_lang = lang($class_name);
    if (empty($class_name_lang)) {
        $class_name_lang = $class_name;
    }
    ?>

    <title> <?php echo $class_name_lang; ?> |
        <?php
        if ($this->ion_auth->in_group(array('superadmin'))) {
            $this->db->where('hospital_id', 'superadmin');
        } else {
            $this->db->where('hospital_id', $this->hospital_id);
        }
        ?>
        <?php
        echo $this->db->get('settings')->row()->system_vendor;
        ?>
    </title>
    <link href="common/css/bootstrap.min.css" rel="stylesheet">
    <link href="common/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="common/assets/fontawesome5pro/css/all.min.css" rel="stylesheet" />
    <link href="common/assets/DataTables/datatables.min.css" rel="stylesheet" />

    <link href="common/css/style.css" rel="stylesheet">
    <link href="common/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" href="common/assets/bootstrap-datepicker/css/bootstrap-datepicker.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-datetimepicker/css/datetimepicker.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-timepicker/compiled/timepicker.css">
    <link rel="stylesheet" type="text/css" href="common/assets/jquery-multi-select/css/multi-select.css" />
    <link href="common/css/invoice-print.css" rel="stylesheet" media="print">
    <link href="common/assets/fullcalendar/fullcalendar.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="common/assets/select2/css/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="common/css/lightbox.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
    <link rel="stylesheet" type="text/css" href="common/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />

    <link rel="stylesheet" href="common/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="common/css/bootstrap-select-country.min.css">
    <!-- Google Fonts -->

    <link href="common/extranal/css/medical_history_calendar_modal.css" rel="stylesheet">




    <?php
    if (!$this->ion_auth->in_group(array('superadmin'))) {
        if ($settings_lang == 'arabic') {
    ?>
            <link href="common/extranal/css/dashboard_arabic.css" rel="stylesheet">

        <?php
        }
    } else {
        if ($settings_lang == 'arabic') {
        ?>
            <link href="common/extranal/css/dashboard_arabic.css" rel="stylesheet">

    <?php
        }
    }
    ?>

</head>

<body>
    <section id="container" class="">
        <!--header start-->
        <header class="header white-bg">
           
            <!--logo start-->
            <?php
            if (!$this->ion_auth->in_group(array('superadmin'))) {
                $this->db->where('hospital_id', $this->hospital_id);
                $settings_title = $this->db->get('settings')->row()->title;
                $settings_title = explode(' ', $settings_title);
            ?>
                <a href="home" class="logo">
                    <strong>
                        <?php echo $settings_title[0]; ?>

                        <?php
                        if (!empty($settings_title[1])) {
                            echo $settings_title[1];
                        }
                        ?>

                        <?php
                        if (!empty($settings_title[2])) {
                            echo $settings_title[2];
                        }
                        ?>

                    </strong>
                </a>

            <?php } else { ?>

                <a href="" class="logo">
                    <strong>
                        Hospital
                        <span>
                            System
                        </span>
                    </strong>
                </a>

            <?php } ?>
            <!--logo end-->

            <div class="top-nav ">

                <ul class="nav pull-right top-menu">
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="uploads/favicon.png" width="21" height="23">
                            <span class="username">
                                <?php
                                $username = $this->ion_auth->user()->row()->username;
                                if (!empty($username)) {
                                    $username = explode(' ', $username);
                                    $first_name = $username[0];
                                    echo $first_name;
                                }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <?php if (!$this->ion_auth->in_group('admin')) { ?>
                                <li><a href="" class="dcjq-parent" ><i class="fa fa-home"></i> <?php echo lang('dashboard'); ?></a></li>
                            <?php } ?>
                            <li><a href="profile"><i class=" fa fa-suitcase"></i><?php echo lang('profile'); ?></a></li>
                            <?php if ($this->ion_auth->in_group('admin')) { ?>
                                <li><a href="settings"><i class="fa fa-cog"></i> <?php echo lang('settings'); ?></a></li>
                            <?php } ?>

                            <li><a><i class="fa fa-user"></i> <?php echo $this->ion_auth->get_users_groups()->row()->name ?></a></li>
                            <li><a href="auth/logout"><i class="fa fa-key"></i> <?php echo lang('log_out'); ?></a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->

        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a href="home">
                            <i class="fa fa-home"></i>
                            <span><?php echo lang('dashboard'); ?></span>
                        </a>
                    </li>
                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <?php if (in_array('department', $this->modules)) { ?>
                            <li>
                                <a href="department">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('departments'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <?php if (in_array('doctor', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-user-md"></i>
                                    <span><?php echo lang('doctor'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="doctor"><i class="fa fa-user"></i><?php echo lang('list_of_doctors'); ?></a></li>
                                    <li><a href="appointment/treatmentReport"><i class="fa fa-history"></i><?php echo lang('treatment_history'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <?php if ($this->ion_auth->in_group(array('admin', 'Accountant', 'Nurse', 'Doctor', 'Laboratorist', 'Receptionist'))) { ?>
                        <?php if (in_array('patient', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-users-medical"></i>
                                    <span><?php echo lang('patient'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="patient"><i class="fa fa-user"></i><?php echo lang('patient_list'); ?></a></li>

                                   
                                    <?php if (!$this->ion_auth->in_group(array('Accountant', 'Receptionist'))) { ?>
                                        <li><a href="patient/caseList"><i class="fa fa-book"></i><?php echo lang('case'); ?> <?php echo lang('manager'); ?></a></li>

                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <!--Asignar los menus en cada uno de los perfiles \-->

                    <?php if ($this->ion_auth->in_group(array('admin', 'Nurse', 'Receptionist'))) { ?>
                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-clock"></i>
                                    <span><?php echo lang('schedule'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="schedule"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?> <?php echo lang('schedule'); ?></a></li>

                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <!--Asignar los menus en cada uno de los perfiles \-->
                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-clock"></i>
                                    <span><?php echo lang('schedule'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="schedule/timeSchedule"><i class="fa fa-list-alt"></i>Todos los <?php echo lang('schedule'); ?></a></li>

                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Nurse', 'Receptionist'))) { ?>
                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-calendar-check"></i>
                                    <span><?php echo lang('appointment'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="appointment"><i class="fa fa-list-alt"></i><?php echo lang('all'); ?></a></li>
                                    <li><a href="appointment/addNewView"><i class="fa fa-plus-circle"></i><?php echo lang('add'); ?></a></li>
                                    <li><a href="appointment/todays"><i class="fa fa-list-alt"></i><?php echo lang('todays'); ?></a></li>
                                    <li><a href="appointment/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?></a></li>
                                    <li><a href="appointment/calendar"><i class="fa fa-list-alt"></i><?php echo lang('calendar'); ?></a></li>
                                    <li><a href="appointment/request"><i class="fa fa-list-alt"></i><?php echo lang('request'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>


                    <?php if ($this->ion_auth->in_group(array(''))) { ?>
                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-headphones"></i>
                                    <span><?php echo lang('live'); ?> <?php echo lang('meetings'); ?></span>
                                </a>
                                <ul class="sub">
                                    <?php if (!$this->ion_auth->in_group(array('Patient'))) { ?>
                                        <li><a href="meeting/addNewView"><i class="fa fa-plus-circle"></i><?php echo lang('create'); ?> <?php echo lang('meeting'); ?></a></li>
                                    <?php } ?>
                                    <li><a href="meeting"><i class="fa fa-video"></i><?php echo lang('live'); ?> <?php echo lang('now'); ?></a></li>
                                    <li><a href="meeting/upcoming"><i class="fa fa-list-alt"></i><?php echo lang('upcoming'); ?> <?php echo lang('meetings'); ?></a></li>
                                    <li><a href="meeting/previous"><i class="fa fa-list-alt"></i><?php echo lang('previous'); ?> <?php echo lang('meetings'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>



      



                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-users"></i>
                                <span><?php echo lang('human_resources'); ?></span>
                            </a>
                            <ul class="sub">
                                <?php if (in_array('medicine', $this->modules)) { ?>
                                    <li><a href="nurse"><i class="fa fa-user"></i><?php echo lang('nurse'); ?></a></li>
                                <?php } ?>
                                <?php if (in_array('medicine', $this->modules)) { ?>
                                    <li><a href="pharmacist"><i class="fa fa-user"></i><?php echo lang('pharmacist'); ?></a></li>
                                <?php } ?>
                                <?php if (in_array('medicine', $this->modules)) { ?>
                                    <li><a href="laboratorist"><i class="fa fa-user"></i><?php echo lang('laboratorist'); ?></a></li>
                                <?php } ?>
                                <?php if (in_array('medicine', $this->modules)) { ?>
                                    <li><a href="accountant"><i class="fa fa-user"></i><?php echo lang('accountant'); ?></a></li>
                                <?php } ?>
                                <?php if (in_array('medicine', $this->modules)) { ?>
                                    <li><a href="receptionist"><i class="fa fa-user"></i><?php echo lang('receptionist'); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <!-- NEW ADDITIONS -->
                


                    <?php if ($this->ion_auth->in_group(array('admin', 'Pharmacist'))) { ?>
                        <?php if (in_array('prescription', $this->modules)) { ?>
                            <li>
                                <a href="prescription/all" class="dcjq-parent">
                                    <i class="fas fa-prescription"></i>
                                    <span> <?php echo lang('prescription'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <?php
                    if ($this->ion_auth->in_group(array('Receptionist'))) {
                    ?>
                        <?php if (in_array('lab', $this->modules)) { ?>
                            <li>
                                <a href="lab/lab1">
                                    <i class="fas fa-file-medical"></i>
                                    <span><?php echo lang('lab_reports'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php
                    }
                    ?>

                    <?php
                    if ($this->ion_auth->in_group(array('Accountant', 'Receptionist'))) {
                    ?>
                        <?php if (in_array('finance', $this->modules)) { ?>
                            <li>
                                <a href="finance/UserActivityReport">
                                    <i class="fa fa-file-user"></i>
                                    <span><?php echo lang('user_activity_report'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php
                    }
                    ?>


                    <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
                        <?php if (in_array('prescription', $this->modules)) { ?>
                            <li>
                                <a href="prescription">
                                    <i class="fa fa-prescription" class=></i>
                                    <span><?php echo lang('prescription'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>



                    <?php if ($this->ion_auth->in_group(array('admin', 'Doctor', 'Laboratorist'))) { ?>
                        <?php if (in_array('lab', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-flask"></i>
                                    <span><?php echo lang('labs'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="lab"><i class="fa fa-file-medical"></i><?php echo lang('lab_reports'); ?></a></li>
                                    <li><a href="lab/addLabView"><i class="fa fa-plus-circle"></i><?php echo lang('add_lab_report'); ?></a></li>
                                    <li><a href="lab/template"><i class="fa fa-plus-circle"></i><?php echo lang('template'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>





                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <?php if (in_array('medicine', $this->modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa  fa-medkit"></i>
                                    <span><?php echo lang('medicine'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="medicine"><i class="fa fa-medkit"></i><?php echo lang('medicine_list'); ?></a></li>
                                    <li><a href="medicine/addMedicineView"><i class="fa fa-plus-circle"></i><?php echo lang('add_medicine'); ?></a></li>
                                    <li><a href="medicine/medicineCategory"><i class="fa fa-edit"></i><?php echo lang('medicine_category'); ?></a></li>
                                    <li><a href="medicine/addCategoryView"><i class="fa fa-plus-circle"></i><?php echo lang('add_medicine_category'); ?></a></li>


                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>





                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>



                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span><?php echo lang('settings'); ?></span>
                            </a>
                            <ul class="sub">
                                <li><a href="settings"><i class="fa fa-cog"></i><?php echo lang('system_settings'); ?></a></li>

                                <li><a href="settings/language"><i class="fa fa-language"></i><?php echo lang('language'); ?></a></li>
                            </ul>
                        </li>





                    <?php } ?>

                    <?php if ($this->ion_auth->in_group('Pharmacist')) { ?>
                        <?php if (in_array('medicine', $this->modules)) { ?>
                            <li>
                                <a href="medicine">
                                    <i class="fa fa-medkit"></i>
                                    <span> <?php echo lang('medicine_list'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="medicine/addMedicineView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span> <?php echo lang('add_medicine'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="medicine/medicineCategory">
                                    <i class="fa fa-medkit"></i>
                                    <span> <?php echo lang('medicine_category'); ?> </span>
                                </a>
                            </li>
                            <li>
                                <a href="medicine/addCategoryView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span> <?php echo lang('add_medicine_category'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                   

                    <?php if ($this->ion_auth->in_group('Patient')) { ?>
                        <?php if (in_array('lab', $this->modules)) { ?>
                            <li>
                                <a href="lab/myLab" class="dcjq-parent">
                                    <i class="fa fa-file-medical-alt"></i>
                                    <span> <?php echo lang('diagnosis'); ?> <?php echo lang('reports'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <li>
                                <a href="patient/calendar">
                                    <i class="fa fa-calendar"></i>
                                    <span> <?php echo lang('appointment'); ?> <?php echo lang('calendar'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>
                       
                        <?php if (in_array('prescription', $this->modules)) { ?>
                            <li>
                                <a href="patient/myPrescription">
                                    <i class="fa fa-prescription"></i>
                                    <span> <?php echo lang('prescription'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>

                       
                        <?php if (in_array('report', $this->modules)) { ?>
                            <li>
                                <a href="report/myreports">
                                    <i class="fa fa-file-medical-alt"></i>
                                    <span>  <?php echo lang('reports'); ?> </span>
                                </a>
                            </li>
                        <?php } ?>
                       
                    <?php } ?>

                    <?php if ($this->ion_auth->in_group('im')) { ?>
                        <li>
                            <a href="patient/addNewView">
                                <i class="fa fa-user"></i>
                                <span> <?php echo lang('add_patient'); ?> </span>
                            </a>
                        </li>
                        <li>
                            <a href="finance/addPaymentView">
                                <i class="fa fa-user"></i>
                                <span> <?php echo lang('add_payment'); ?> </span>
                            </a>
                        </li>
                    <?php } ?>


                


                    <?php if ($this->ion_auth->in_group('superadmin')) { ?>

                        <?php if (in_array('superadmin', $this->super_modules)) { ?>
                            <li>
                                <a href="superadmin">
                                    <i class="fa fa-users"></i>
                                    <span><?php echo lang('superadmin'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array('hospital', $this->super_modules)) { ?>
                            <li>
                                <a href="hospital">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('all_hospitals'); ?></span>
                                </a>
                            </li>


                            <li>
                                <a href="hospital/addNewView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span><?php echo lang('create_new_hospital'); ?></span>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (in_array('package', $this->super_modules)) { ?>
                            <li>
                                <a href="hospital/package">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('packages'); ?></span>
                                </a>
                            </li>
                            <li>
                                <a href="hospital/package/addNewView">
                                    <i class="fa fa-plus-circle"></i>
                                    <span><?php echo lang('add_new_package'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array('request', $this->super_modules)) { ?>
                            <li>
                                <a href="request">
                                    <i class="fa fa-sitemap"></i>
                                    <span><?php echo lang('requests'); ?></span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if (in_array('systems', $this->super_modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-file-excel"></i>
                                    <span><?php echo lang('report'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="systems/activeHospitals"><i class="fa fa-file-alt"></i><?php echo lang('active_hospitals'); ?></a></li>
                                    <li><a href="systems/inactiveHospitals"><i class="fa fa-file-alt"></i><?php echo lang('inactive_hospitals'); ?></a></li>
                                    <li><a href="systems/expiredHospitals"><i class="fa fa-file-alt"></i><?php echo lang('license_expire_hospitals'); ?></a></li>
                                    <li><a href="systems/registeredPatient"><i class="fa fa-file-alt"></i><?php echo lang('registered_patient'); ?></a></li>
                                    <li><a href="systems/registeredDoctor"><i class="fa fa-file-alt"></i><?php echo lang('registered_doctor'); ?></a></li>
                                    <li><a href="hospital/reportSubscription"><i class="fa fa-file-alt"></i><?php echo lang('subscription_report'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>


                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-cogs"></i>
                                <span><?php echo lang('website'); ?></span>
                            </a>
                            <ul class="sub">
                                <li><a href="frontend" target="_blank"><i class="fa fa-globe"></i><?php echo lang('visit_site'); ?></a></li>
                                <li><a href="frontend/settings"><i class="fa fa-cog"></i><?php echo lang('website_settings'); ?></a></li>
                                <?php if (in_array('slide', $this->super_modules)) { ?>
                                    <li><a href="slide"><i class="fa fa-wrench"></i><?php echo lang('slides'); ?></a></li>
                                <?php } ?>
                                <?php if (in_array('service', $this->super_modules)) { ?>
                                    <li><a href="service"><i class="fa fa-smile"></i><?php echo lang('services'); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>

                    <?php } ?>

                    <?php if ($this->ion_auth->in_group(array('superadmin'))) { ?>
                        <?php if (in_array('email', $this->super_modules)) { ?>
                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="fa fa-mail-bulk"></i>
                                    <span><?php echo lang('email'); ?></span>
                                </a>
                                <ul class="sub">
                                    <li><a href="email/superadminSendView"><i class="fa fa-location-arrow"></i><?php echo lang('new'); ?></a></li>
                                    <li><a href="email/sent"><i class="fa fa-list-alt"></i><?php echo lang('sent'); ?></a></li>

                                    <li><a href="email/emailSettings"><i class="fa fa-cogs"></i><?php echo lang('settings'); ?></a></li>
                                    <li><a href="email/contactEmailSettings"><i class="fa fa-mail-bulk"></i><?php echo lang('contact'); ?> <?php echo lang('email'); ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($this->ion_auth->in_group(array('superadmin'))) { ?>

                        <li><a href="settings"><i class="fa fa-cog"></i><?php echo lang('system_settings'); ?></a></li>
                        <?php if (in_array('pgateway', $this->super_modules)) { ?>
                            <li><a href="pgateway"><i class="fa fa-credit-card"></i><?php echo lang('payment_gateway'); ?></a></li>
                        <?php } ?>
                        <li><a href="settings/language"><i class="fa fa-language"></i><?php echo lang('language'); ?></a></li>
                    <?php } ?>
                    <li>
                        <a href="profile" class="dcjq-parent">
                            <i class="fa fa-user"></i>
                            <span> <?php echo lang('profile'); ?> </span>
                        </a>
                    </li>






                </ul>

            </div>
        </aside>