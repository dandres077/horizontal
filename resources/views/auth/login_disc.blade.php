<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sistema de reservas Uniandes</title>

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style2.css')}}" rel="stylesheet">

</head>

<body id="page-top" class="landing-page no-skin-config">
<div class="navbar-wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.html"><img src="img/logo.png"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://sistemas.uniandes.edu.co/es/">Departamento de Ingeniería<br> de Sistemas y Computación</a></li>                        
                    </ul>
                </div>
            </div>
        </nav>
</div>

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Bienvenido a Sistema de reservas</h2>

                <p align="justify">
                   El<strong> sistema de reservas</strong> es la aplicación por la cual podra reservar los recursos fisicos de los laboratorios de la faculta de ingeniería. 
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form method="POST" action="{{ route('login') }}" autocomplete="off">
                        @csrf

                        <div class="form-group">
                            <input id="login" type="text" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" name="login" value="{{ old('login') }}" required autofocus>

                            @if ($errors->has('login'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                             <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Ingresar') }}
                        </button>

                    </form>
                    <p class="m-t">
                        <small>Para más información comunicarse con websis@uniandes.edu.co</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Universidad de los Andes 
            </div>
            <div class="col-md-6 text-right">
               <small>© 2018-2020</small>
            </div>
        </div>
    </div>

<section id="contact" class="gray-section contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p></p>
                <p></p>
                <ul class="list-inline social-icon">
                    <li><a href="https://cupi2.virtual.uniandes.edu.co/" target="_blank"><img src="img/cupidos.png"></a>
                    </li>
                    <li><a href="https://educacioncontinuada.uniandes.edu.co/index.php/es/" target="_blank"><img src="img/educacioncontinuada.png"></a>
                    </li>
                    <li><a href="https://laboratorios.virtual.uniandes.edu.co/" target="_blank"><img src="img/laboratorios.png"></a>
                    </li>
                    <li><a href="https://mujeresencomputacion.uniandes.edu.co/" target="_blank"><img src="img/mujeresencomputacion.png"></a>
                    </li>                    
                    <li><a href="https://registro.uniandes.edu.co/index.php/aspirantes" target="_blank"><img src="img/rincondelaspirante.png"></a>
                    </li>
                    <li><a href="http://paradigma.uniandes.edu.co/" target="_blank"><img src="img/paradigma.png"></a>
                    </li>
                    <li><a href="https://sisinfo.uniandes.edu.co/" target="_blank"><img src="img/sisinfo.png"></a>
                    </li>
                    <li><a href="#"><img src="img/profesores.png" target="_blank"></a>
                    </li>                    
                    <li><a href="https://sch.uniandes.edu.co/" target="_blank"><img src="img/sch.png"></a>
                    </li>                
                    <li><a href="https://sistemas.uniandes.edu.co/es/foros-isis" target="_blank"><img src="img/foros.png"></a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row m-b-lg">
            <div class="col-lg-12 text-center">
                <p><a href="https://apoyofinanciero.uniandes.edu.co/" target="_blank">Apoyo Financiero</a> | 
                   <a href="https://registro.uniandes.edu.co/" target="_blank">Adminisiones y Registro</a> | 
                   <a href="https://biblioteca.uniandes.edu.co/index.php?lang=es" target="_blank">Biblioteca</a> | 
                   <a href="https://sicuaplus.uniandes.edu.co/webapps/login/" target="_blank">Sicuaplus</a> | 
                   <a href="https://agenda.uniandes.edu.co/" target="_blank">Agenda y Eventos</a> | 
                   <a href="https://decanaturadeestudiantes.uniandes.edu.co/" target="_blank">Decanatura de Estudiantes</a> 
                </p>
                <p>Universidad de los Andes | Vigilada Mineducación </p>
                <p>Reconocimiento como Universidad: Decreto 1297 del 30 de mayo de 1964. </p>
                <p>Reconocimiento personería jurídica: Resolución 28 del 23 de febrero de 1949 Minjusticia </p>
                <p>Edificio Mario Laserna Cra 1 Este No 19A - 40 Bogotá (Colombia) | Tel: [571] 3394949 Ext: 2860, 2861, 2862 | Fax: [571] 3324325 </p>
                <p>© 2019 - <a href="#">Departamento de Ingeniería de Sistemas y Computación </a></p>
            </div>
        </div>
 
    </div>
</section>

<!-- Mainly scripts -->
<script src="http://localhost/central/public/js/jquery-3.1.1.min.js"></script>
<script src="http://localhost/central/public/js/bootstrap.min.js"></script>
<script src="http://localhost/central/public/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="http://localhost/central/public/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="http://localhost/central/public/js/inspinia.js"></script>
<script src="http://localhost/central/public/js/plugins/pace/pace.min.js"></script>
<script src="http://localhost/central/public/js/plugins/wow/wow.min.js"></script>

</body>
</html>
