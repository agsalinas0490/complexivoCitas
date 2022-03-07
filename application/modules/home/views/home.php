<script type="text/javascript" src="common/js/google-loader.js"></script>
<link href="common/extranal/css/home.css" rel="stylesheet">
<section id="main-content">
    <section class="wrapper site-min-height">
        <div class="modal fade" tabindex="-1" role="dialog" id="cmodal">
            <div class="modal-dialog modal-lg header_modal" role="document">
                <div class="modal-content">
                    <div id='medical_history'>
                        <div class="col-md-12">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <?php if ($this->ion_auth->in_group(array('Doctor'))) { ?>
            <?php if (in_array('appointment', $this->modules)) { ?>
                <div class="state-overview col-md-5 state_overview_design">
                    <header class="panel-heading">
                        <i class="fa fa-user"></i> <?php echo lang('todays_appointments'); ?>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-samplee">
                                <thead>
                                    <tr>
                                        <th> <?php echo lang('patient_id'); ?></th>
                                        <th> <?php echo lang('name'); ?></th>
                                        <th> <?php echo lang('date-time'); ?></th>
                                        <th> <?php echo lang('status'); ?></th>
                                        <th> <?php echo lang('options'); ?></th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php
                                    foreach ($appointments as $appointment) {
                                        if ($appointment->date == strtotime(date('Y-m-d'))) {
                                    ?>
                                            <tr class="">
                                                <td> <?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->id; ?></td>
                                                <td> <?php echo $this->db->get_where('patient', array('id' => $appointment->patient))->row()->name; ?></td>

                                                <td class="center"> <strong> <?php echo $appointment->s_time; ?> </strong></td>
                                                <td>
                                                    <?php echo $appointment->status; ?>
                                                </td>
                                                <td>

                                                    <a class="btn detailsbutton" title="<?php lang('history') ?>" href="patient/medicalHistory?id=<?php echo $appointment->patient ?>"><i class="fa fa-stethoscope"></i> <?php echo lang('history'); ?></a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Esta seccion muestra los iconos con la informacion de cantidad de citas, medicos, reportes, laboratorio, etc -->

        <?php } ?>
        <?php if (!$this->ion_auth->in_group('superadmin')) { ?>
            <?php if (!$this->ion_auth->in_group('Doctor')) { ?>

                <div class="state-overview col-md-12 state_overview_design">
                    <div class="clearfix">
                        <?php if (in_array('doctor', $this->modules)) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="doctor">
                                    <?php } ?>
                                    <section class="panel home_sec_green">
                                        <div class="symbol green">
                                            <i class="fa fa-user-md"></i>
                                        </div>
                                        <div class="value">
                                            <h3 class="">
                                                <?php
                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                $this->db->from('doctor');
                                                $count = $this->db->count_all_results();
                                                echo $count;
                                                ?>
                                            </h3>
                                            <p><?php echo lang('doctor'); ?></p>
                                        </div>
                                    </section>
                                    <?php if (!$this->ion_auth->in_group('admin')) { ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (in_array('patient', $this->modules)) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="patient">
                                    <?php } ?>
                                    <section class="panel home_sec_blue">
                                        <div class="symbol blue">
                                            <i class="fa fa-users-medical"></i>
                                        </div>
                                        <div class="value">
                                            <h3 class="">
                                                <?php
                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                $this->db->from('patient');
                                                $count = $this->db->count_all_results();
                                                echo $count;
                                                ?>
                                            </h3>
                                            <p><?php echo lang('patient'); ?></p>
                                        </div>
                                    </section>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="appointment">
                                    <?php } ?>
                                    <section class="panel home_sec_yellow">
                                        <div class="symbol yellow">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="value">
                                            <h3 class="">
                                                <?php
                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                $this->db->from('appointment');
                                                $count = $this->db->count_all_results();
                                                echo $count;
                                                ?>
                                            </h3>
                                            <p><?php echo lang('appointment'); ?></p>
                                        </div>
                                    </section>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (in_array('prescription', $this->modules)) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="prescription/all">
                                    <?php } ?>
                                    <section class="panel home_sec_green">
                                        <div class="symbol blue">
                                            <i class="fa fa-file-medical"></i>
                                        </div>
                                        <div class="value">
                                            <h3 class="">
                                                <?php
                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                $this->db->from('prescription');
                                                $count = $this->db->count_all_results();
                                                echo $count;
                                                ?>
                                            </h3>
                                            <p><?php echo lang('prescription'); ?></p>
                                        </div>
                                    </section>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>

                        <?php if (in_array('patient', $this->modules)) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="patient/caseList">
                                    <?php } ?>
                                    <section class="panel home_sec_blue">
                                        <div class="symbol blue">
                                            <i class="fa fa-medkit"></i>
                                        </div>
                                        <div class="value">
                                            <h3 class="">
                                                <?php
                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                $this->db->from('medical_history');
                                                $count = $this->db->count_all_results();
                                                echo $count;
                                                ?>
                                            </h3>
                                            <p><?php echo lang('case_history'); ?></p>
                                        </div>
                                    </section>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <!-- Grafico resumen de reportes de laboratorio -->
                        <?php if (in_array('lab', $this->modules)) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    <a href="lab">
                                    <?php } ?>
                                    <section class="panel home_sec_green">
                                        <div class="symbol green">
                                            <i class="fa fa-flask"></i>
                                        </div>
                                        <div class="value">
                                            <h3 class="">
                                                <?php
                                                $this->db->where('hospital_id', $this->session->userdata('hospital_id'));
                                                $this->db->from('lab');
                                                $count = $this->db->count_all_results();
                                                echo $count;
                                                ?>
                                            </h3>
                                            <p><?php echo lang('lab_report'); ?></p>
                                        </div>
                                    </section>
                                    <?php if ($this->ion_auth->in_group('admin')) { ?>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>






                        <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        
                        <?php } ?>



                    </div>

                    <?php if ($this->ion_auth->in_group(array('admin'))) { ?>
                        <!-- Esta seccion muestra el grafico en forma de pastel con el porcentaje de casos tratados -->
                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <div class="col-lg-12 col-sm-12">
                                <div id="donutchart" class="panel"></div>
                            </div>
                        <?php } ?>

                        <!-- Esta seccion muestra el calendario con las citas agendadas -->

                        <?php if (in_array('appointment', $this->modules)) { ?>
                            <?php if (!$this->ion_auth->in_group('Doctor')) { ?>
                                <div class="col-md-12">
                                    <aside class="calendar_ui col-md-12 panel calendar_ui">
                                        <section class="">
                                            <div class="">
                                                <div id="calendar" class="has-toolbar calendar_view"></div>
                                            </div>
                                        </section>
                                    </aside>
                                </div>


                            <?php } else { ?>
                                <div class="state-overview col-md-7 panel row">
                                    <aside class="calendar_ui">
                                        <section class="">
                                            <div class="">
                                                <div id="calendar" class="has-toolbar calendar_view"></div>
                                            </div>
                                        </section>
                                    </aside>
                                </div>
                            <?php } ?>
                        <?php } ?>



                    <?php } ?>



                </div>



            <?php } ?>

        <?php } else { ?>
            <?php if (in_array('home', $this->super_modules)) { ?>

                <div class="state-overview col-md-12 state_overview_design">

                    <div class="col-lg-3 col-sm-6">

                        <a href="hospital">

                            <section class="panel home_sec_green">
                                <div class="symbol blue">
                                    <i class="fa fa-hospital"></i>
                                </div>
                                <div class="value">
                                    <h3 class="">
                                        <?php
                                        $count = 0;
                                        $hospitalList = $this->db->get('hospital')->result();
                                        foreach ($hospitalList as $hospitalList) {
                                            $count = $count + 1;
                                        }

                                        echo $count;
                                        ?>
                                    </h3>
                                    <p><?php echo lang('total'); ?> <?php echo lang('hospitals'); ?></p>
                                </div>
                            </section>

                        </a>

                    </div>


                    <div class="col-lg-3 col-sm-6">

                        <a href="hospital/active">

                            <section class="panel home_sec_green">
                                <div class="symbol green">
                                    <i class="fa fa-toggle-on"></i>
                                </div>
                                <div class="value">
                                    <h3 class="">
                                        <?php
                                        $count = 0;
                                        $hospitalList = $this->db->get('hospital')->result();
                                        foreach ($hospitalList as $hospitalList) {
                                            $this->db->where('id', $hospitalList->ion_user_id);
                                            $status = $this->db->get('users')->row();
                                            if ($status->active == "1") {
                                                $count = $count + 1;
                                            }
                                        }

                                        echo $count;
                                        ?>
                                    </h3>
                                    <p><?php echo lang('active'); ?> <?php echo lang('hospitals'); ?></p>
                                </div>
                            </section>

                        </a>

                    </div>
                    <div class="col-lg-3 col-sm-6">

                        <a href="hospital/disable">

                            <section class="panel home_sec_green">
                                <div class="symbol yellow">
                                    <i class="fa fa-toggle-off"></i>
                                </div>
                                <div class="value">
                                    <h3 class="">
                                        <?php
                                        $count = 0;
                                        $hospitalList = $this->db->get('hospital')->result();
                                        foreach ($hospitalList as $hospitalList) {
                                            $this->db->where('id', $hospitalList->ion_user_id);
                                            $status = $this->db->get('users')->row();
                                            if ($status->active == "0") {
                                                $count = $count + 1;
                                            }
                                        }

                                        echo $count;
                                        ?>
                                    </h3>
                                    <p><?php echo lang('inactive'); ?> <?php echo lang('hospitals'); ?></p>
                                </div>
                            </section>

                        </a>

                    </div>
                    <div class="col-lg-3 col-sm-6">

                        <a href="systems/expiredHospitals">

                            <section class="panel home_sec_green">
                                <div class="symbol red">
                                    <i class="fa fa-exclamation-triangle"></i>
                                </div>
                                <div class="value">
                                    <h3 class="">

                                        <?php
                                        $count = 0;
                                        $hospitalRequestList = $this->db->get('hospital_payment')->result();

                                        foreach ($hospitalRequestList as $hospitalRequestList) {

                                            if ($hospitalRequestList->next_due_date_stamp < time()) {

                                                $count = $count + 1;
                                            }
                                        }

                                        echo $count;
                                        ?>

                                    </h3>
                                    <p><?php echo lang('license_expire_hospitals'); ?></p>
                                </div>
                            </section>

                        </a>

                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <div id="chart_div_superadmin" class="panel"></div>

                </div>

                <div class="col-lg-4 col-sm-6">

                    <div id="piechart_3d_superadmin" class="panel"></div>
                </div>
                <div class="col-md-4">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php echo date('D d F, Y'); ?>
                        </header>
                        <div class="panel-body">

                            <div class="home_section">
                                <?php echo lang('monthly'); ?> <?php echo lang('subscription'); ?>: <?php echo $settings->currency; ?> <?php echo number_format($this_day['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>
                            <div class="home_section">
                                <?php echo lang('yearly'); ?> <?php echo lang('subscription'); ?>: <?php echo $settings->currency; ?> <?php echo number_format($this_day['payment_yearly'], 2, '.', ','); ?>
                                <hr>
                            </div>
                            <div class="home_section">
                                <?php echo lang('total'); ?> <?php echo lang('income'); ?> : <?php echo $settings->currency; ?> <?php echo number_format($this_day['payment'] + $this_day['payment_yearly'], 2, '.', ','); ?>
                                <hr>
                            </div>



                        </div>
                    </section>
                </div>
                <div class="col-md-4">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php echo date('F, Y'); ?>
                        </header>
                        <div class="panel-body">

                            <div class="home_section">
                                <?php echo lang('monthly'); ?> <?php echo lang('subscription'); ?>: <?php echo $settings->currency; ?> <?php echo number_format($this_monthly['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>
                            <div class="home_section">
                                <?php echo lang('yearly'); ?> <?php echo lang('subscription'); ?> : <?php echo $settings->currency; ?> <?php echo number_format($this_year['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>
                            <div class="home_section">
                                <?php echo lang('total'); ?> <?php echo lang('income'); ?> : <?php echo $settings->currency; ?> <?php echo number_format($this_year['payment'] + $this_monthly['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>



                        </div>
                    </section>

                </div>
                <div class="col-md-4">
                    <section class="panel">
                        <header class="panel-heading">
                            <?php echo date('Y'); ?>
                        </header>
                        <div class="panel-body">

                            <div class="home_section">
                                <?php echo lang('monthly'); ?> <?php echo lang('subscription'); ?> : <?php echo $settings->currency; ?> <?php echo number_format($this_month_payment['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>
                            <div class="home_section">
                                <?php echo lang('yearly'); ?> <?php echo lang('subscription'); ?> : <?php echo $settings->currency; ?> <?php echo number_format($this_year_payment['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>
                            <div class="home_section">
                                <?php echo lang('total'); ?> <?php echo lang('income'); ?> : <?php echo $settings->currency; ?> <?php echo number_format($this_year_payment['payment'] + $this_month_payment['payment'], 2, '.', ','); ?>
                                <hr>
                            </div>


                        </div>
                    </section>
                </div>
            <?php } ?>
        <?php } ?>



    </section>
</section>

</section>

<?php
if (!$this->ion_auth->in_group(array('superadmin'))) {
    if (!empty($this_month['payment'])) {
        $payment_this = $this_month['payment'];
    } else {
        $payment_this = 0;
    }
    if (!empty($this_month['expense'])) {
        $expense_this = $this_month['expense'];
    } else {
        $expense_this = 0;
    }
    if (!empty($this_month['appointment_treated'])) {
        $appointment_treated = $this_month['appointment_treated'];
    } else {
        $appointment_treated = 0;
    }


    if (!empty($this_month['appointment_cancelled'])) {
        $appointment_cancelled = $this_month['appointment_cancelled'];
    } else {
        $appointment_cancelled = 0;
    }
    $superadmin_login = 'no';
} else {
    if (!empty($this_month['payment'])) {
        $superadmin_month_payment = $this_month['payment'];
    } else {
        $superadmin_month_payment = '0';
    }
    if (!empty($this_yearly['payment'])) {
        $superadmin_year_payment = $this_yearly['payment'];
    } else {
        $superadmin_year_payment = '0';
    }
    $superadmin_login = 'yes';
}
?>


<script type="text/javascript">
    var per_month_income_expense = "<?php echo lang('per_month_income_expense') ?>";
</script>
<script type="text/javascript">
    var currency = "<?php echo $settings->currency ?>";
</script>
<script type="text/javascript">
    var months_lang = "<?php echo lang('months') ?>";
</script>
<script type="text/javascript">
    var superadmin_login = "<?php echo $superadmin_login; ?>";
</script>
<?php if (!$this->ion_auth->in_group(array('superadmin'))) { ?>
    <script type="text/javascript">
        var payment_this = <?php echo $payment_this ?>;
    </script>
    <script type="text/javascript">
        var expense_this = <?php echo $expense_this ?>;
    </script>
    <script type="text/javascript">
        var appointment_treated = <?php echo $appointment_treated ?>;
    </script>
    <script type="text/javascript">
        var appointment_cancelled = <?php echo $appointment_cancelled ?>;
    </script>
    <script type="text/javascript">
        var this_year_expenses = <?php echo json_encode($this_year['expense_per_month']); ?>;
    </script>
<?php } else { ?>
    <script type="text/javascript">
        var superadmin_month_payment = <?php echo $superadmin_month_payment ?>;
    </script>
    <script type="text/javascript">
        var superadmin_year_payment = <?php echo $superadmin_year_payment ?>;
    </script>
<?php } ?>

<script type="text/javascript">
    var this_year = <?php echo json_encode($this_year['payment_per_month']); ?>;
</script>

<script src="common/extranal/js/home.js"></script>