
     
     
     <base href="<?php echo base_url(); ?>">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Rizvi">
        <meta name="keyword" content="Php, Hospital, Clinic, Management, Software, Php, CodeIgniter, Hms, Accounting">
        <link rel="shortcut icon" href="uploads/favicon.png">

        <title>Login - <?php echo $this->db->get('settings')->row()->system_vendor; ?></title>

        <!-- Bootstrap core CSS -->
        <link href= "<?php echo base_url();?>common/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>common/css/bootstrap-reset.css" rel="stylesheet">
        <!--external css-->
        
        <!-- Custom styles for this template -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>common/css/style.css" >

    <body class="login-body">

    
        <div class="container">
            <form class="form-signin" method="post" action="auth/login">
                <h2 class="login form-signin-heading">Hospital Básico del ORO<img alt="" src="uploads/favicon.png"></h2>
                    <div id="infoMessage"><?php echo $message; ?></div>
                <div class="login-wrap">
                    <input type="text" class="form-control" name="identity" placeholder="User Email" autofocus>
                    <input type="password" class="form-control"  name="password" placeholder="Password" autocomplete="on">
                    <p><a data-toggle="modal" href="#myModal"> Olvidó su contraseña?</a></p>


                    <button class="btn btn-lg btn-login btn-block" type="submit">Iniciar Sesión</button>
                </div>



            </form>

        </div>









        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="auth/forgot_password">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Olvido su contraseña?</h4>
                        </div>

                        <div class="modal-body">
                            <p>Ingrese su correo electrónico para restablecer su contraseña.</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
                            <input class="btn detailsbutton" type="submit" name="submit" value="submit"> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="<?php echo base_url();?>common/js/jquery.js"></script>
        <script src="<?php echo base_url();?>common/js/bootstrap.min.js"></script>


    </body>
</html>
