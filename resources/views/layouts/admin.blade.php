<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<title>CX Global</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">


    {!!Html::style('css/bootstrap.min.css')!!}
    {!!Html::style('css/metisMenu.min.css')!!}
    {!!Html::style('css/sb-admin-2.css')!!}
    {!!Html::style('css/font-awesome.min.css')!!}

</head>

<body>
<!--<script language="JavaScript" type="text/javascript">
alert("NO OLVIDES OFRECER TAL PRODUCTO !!");
</script>-->

<script src="js/sweetalert.min.js"></script>




    <div id="wrapper">


@if (\Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if(Session::has('Notify'))
<div>
</div>
@endif

@if(Session::has('message'))
<div>
</div>
@endif

@if(Session::has('msg'))
<div>
</div>
@endif

@if(Session::has('notify'))
<div>
</div>
@endif

<script src="js/sweetalert.min.js"></script>
<script>

    @if (Session::has('notify'))

        /* swal("{!!Session::get('notify')!!}",
                timer: 2000,
                showConfirmButton: false
             );*/


swal({
  title: "Atención",
  text: "{!!Session::get('notify')!!}",
  timer: 10000,
  showConfirmButton: true
});



    @endif

    @if (Session::has('msg'))

        swal("Registro correcto!", "", "success"
    @endif

   @if (Session::has('Notify'))
    swal("Actualizacion correcta!", "", "success"
         //"{{Session::get('message')}}"
    );
    @endif

    @if (Session::has('message'))
    swal("Se elimino el usuario", "", "info"
         //"{{Session::get('message')}}"
    );
    @endif

</script>

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/admin">CX Global</a>
            </div>


            <ul class="nav navbar-top-links navbar-right">
                 <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        {!!Auth::user()->name!!}<i class="fa fa-user"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="/acerca"><i class="fa fa-apple"></i> Acerca de:</a>
                        </li>
                        <li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
@if(Auth::user()->perfil_id == 'Administrador')
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{!!URL::to('/usuario/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar</a>
                                </li>
                                <li>
                                    <a href="/usuario"><i class='fa fa-list-ol fa-fw'></i> Usuarios</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-pie-chart"></i> Reportes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/diaria"><i class='fa fa-bar-chart'></i>Reporte: Venta Diaria</a>
                                </li>
                                <li>
                                    <a href="/real"><i class='fa fa-bar-chart'></i>Reporte: Venta Diaria Real </a>
                                </li>
                                <li>
                                    <a href="/cuentas"><i class='fa fa-bar-chart'></i> Reporte: Cuentas por Cobrar</a>
                                </li>
                                <li>
                                    <a href="/filtrada"><i class='fa fa-bar-chart'></i> Reporte: Cuentas por Cobrar por Cliente</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class='fa fa-child'></i> Administrador<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                            <li>
                                <a href="#"><i class='fa fa-money'></i>---Ventas / Cotizaciones</a>
                                     <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!!URL::to('/venta')!!}"><i class='fa fa-money'></i> Ventas Realizadas (en espera de liquidación)</a>
                                </li>

                                <li>
                                    <a href="{!!URL::to('/cotizacion')!!}"><i class='fa fa-calculator'></i> Cotizaciones</a>
                                </li>

                                <li>
                                    <a href="{!!URL::to('/cotizacion/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Cotización</a>
                                </li>

                                                                 </ul>
                                </li>

                            <li>
                                <a href="#"><i class='fa fa-wrench'></i>---Reparaciones de equipos</a>
                                     <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!!URL::to('/servicio/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Reparación de equipo</a>
                                </li>

                                <li>
                                    <a href="{!!URL::to('/servicio')!!}"><i class='fa fa-wrench'></i> Reparaciones NO entregadas</a>
                                </li>

                                 <li>
                                    <a href="{!!URL::to('/servicio/show')!!}"><i class='fa fa-wrench'></i> Reparaciones entregadas</a>
                                </li>
                                 </ul>
                                </li>


                                <li>
                                <a href="#"><i class='fa fa-bicycle'></i>---Entregas/Recolecciones</a>
                                     <ul class="nav nav-third-level">
                                     <li>
                                    <a href="/chofer/create"><i class='fa fa-star-o'></i> Nueva diligencia</a>
                                    </li>
                                    <li>
                                    <a href="/chofer/show"><i class='fa fa-sort-amount-desc'></i> Lista de Entregas/Recolecciones</a>
                                    </li>
                                 </ul>
                                </li>

                                <li>
                                <a href="#"><i class='fa fa-child'></i>---Clientes</a>
                                     <ul class="nav nav-third-level">
                                     <li>
                                    <a href="/cliente/create"><i class='fa fa-star-o'></i> Alta de cliente</a>
                                    </li>
                                    <li>
                                    <a href="/cliente"><i class='fa fa-sort-amount-desc'></i> Clientes</a>
                                    </li>
                                 </ul>
                                </li>
                            <!--     <li>
                                    <a href="{!!URL::to('servicio/destroy')!!}"><i class='fa fa-ban'></i> Ordenes de servicio canceladas</a>
                                </li>-->
                            </ul>
                        </li>




                        <li>
                            <a href="#"><i class="fa fa-ambulance"></i> Tecnico<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                                                    <li>

                                    <a href="/tecnico"><i class='fa fa-wrench'></i> Reparaciones pendientes</a>
                                </li>
                                <ul class="nav nav-third-level">
                                </ul>

                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-archive"></i> Inventario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="/producto"><i class='fa fa-cubes'></i> Inventario</a>
                                </li>
                                <li>
                                <a href="/producto/create"><i class='fa fa-cube'></i> Nueva entrada Inventario</a>
                                </li>

                                <li>
                                <a href="/proveedor/create"><i class='fa fa-user'></i> Alta de proveedores</a>
                                </li>
                                <li>
                                <a href="/proveedor"><i class='fa fa-bars'></i> Lista de proveedores</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-bicycle"></i> Repartidor<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>

                                </li>
                                <li>
                                <a href="/chofer/"><i class='fa fa-bicycle'></i> Entregas o Recolecciones</a>
                                </li>
                            </ul>
                        </li>


@endif

@if(Auth::user()->perfil_id == 'Recepcionista')
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

     <li>
                            <a href="#"><i class="fa fa-female"></i> Asistente<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                            <li>
                                <a href="#"><i class='fa fa-money'></i>Ventas</a>
                                     <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!!URL::to('/ventas')!!}"><i class='fa fa-money'></i> Ventas Realizadas (en espera de liquidación)</a>
                                </li>
                                <li>
                                    <a href="{!!URL::to('/venta/create')!!}"><i class='fa fa-plus fa-fw'></i> Venta</a>
                                </li>
                                 <li>
                                    <a href="{!!URL::to('/cotizacion')!!}"><i class='fa fa-calculator'></i> Cotizaciones</a>
                                </li>

                                <li>
                                    <a href="{!!URL::to('/cotizacion/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Cotización</a>
                                </li>
                                 </ul>
                            </li>

                            <li>
                                <a href="#"><i class='fa fa-wrench'></i>Reparaciones de equipos</a>
                                     <ul class="nav nav-third-level">
                                <li>
                                    <a href="{!!URL::to('/servicio/create')!!}"><i class='fa fa-plus fa-fw'></i> Agregar Reparación de equipo</a>
                                </li>

                                <li>
                                    <a href="{!!URL::to('/servicio')!!}"><i class='fa fa-wrench'></i> Reparaciones NO entregadas</a>
                                </li>

                                 <li>
                                    <a href="{!!URL::to('/servicio/show')!!}"><i class='fa fa-wrench'></i> Reparaciones entregadas</a>
                                </li>
                                 </ul>
                                </li>


                                <li>
                                <a href="#"><i class='fa fa-bicycle'></i>Entregas/Recolecciones</a>
                                     <ul class="nav nav-third-level">
                                     <li>
                                    <a href="/chofer/create"><i class='fa fa-star-o'></i> Nueva diligencia</a>
                                    </li>
                                    <li>
                                    <a href="/chofer/show"><i class='fa fa-sort-amount-desc'></i> Lista de Entregas/Recolecciones</a>
                                    </li>
                                 </ul>
                                </li>

                                <li>
                                <a href="#"><i class='fa fa-child'></i>Clientes</a>
                                     <ul class="nav nav-third-level">
                                     <li>
                                    <a href="/cliente/create"><i class='fa fa-star-o'></i> Alta de cliente</a>
                                    </li>
                                    <li>
                                    <a href="/cliente"><i class='fa fa-sort-amount-desc'></i> Clientes</a>
                                    </li>
                                 </ul>
                                </li>
                            <!--     <li>
                                    <a href="{!!URL::to('servicio/destroy')!!}"><i class='fa fa-ban'></i> Ordenes de servicio canceladas</a>
                                </li>-->
                            </ul>
                        </li>
                    <li>
                            <a href="#"><i class="fa fa-archive"></i> Inventario<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                <a href="/producto"><i class='fa fa-cubes'></i> Inventario</a>
                                </li>
                                <li>
                                <a href="/producto/create"><i class='fa fa-cube'></i> Nueva entrada Inventario</a>
                                </li>

                                <li>
                                <a href="/proveedor/create"><i class='fa fa-user'></i> Alta de proveedores</a>
                                </li>
                                <li>
                                <a href="/proveedor"><i class='fa fa-bars'></i> Lista de proveedores</a>
                                </li>
                            </ul>
                        </li>
@endif

@if(Auth::user()->perfil_id == 'Tecnico')
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="#"><i class="fa fa-ambulance"></i> Tecnico<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                                                    <li>

                                    <a href="/tecnico"><i class='fa fa-wrench'></i> Reparaciones pendientes</a>
                                </li>
                                <ul class="nav nav-third-level">
                                </ul>

                            </ul>
                        </li>

@endif

@if(Auth::user()->perfil_id == 'Chofer')
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="#"><i class="fa fa-bicycle"></i> Repartidor<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>

                                </li>
                                <li>
                                <a href="/chofer/"><i class='fa fa-bicycle'></i> Entregas o Recolecciones</a>
                                </li>
                            </ul>
                        </li>


@endif

@if(Auth::user()->perfil_id == 'Baja')

@endif







                    </ul>
                </div>
            </div>

     </nav>

        <div id="page-wrapper">

            @yield('content')

        </div>

    </div>

     {!!Html::script('js/jquery.min.js')!!}
     {!!Html::script('js/bootstrap.min.js')!!}
     {!!Html::script('js/metisMenu.min.js')!!}
     {!!Html::script('js/sb-admin-2.js')!!}


</body>

</html>
