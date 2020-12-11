<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
        <meta name="author" content="GeeksLabs">
        <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
        <link rel="shortcut icon" href="{{ asset('niceadmin/img/favicon.png') }}">

        <title>Kin's Yogurt</title>

        <!-- Bootstrap CSS -->
        <link href="{{ asset('niceadmin/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- bootstrap theme -->
        <link href="{{ asset('niceadmin/css/bootstrap-theme.css') }}" rel="stylesheet">
        <!--external css-->
        <!-- font icon -->
        <link href="{{ asset('niceadmin/css/elegant-icons-style.css') }}" rel="stylesheet" />
        <link href="{{ asset('niceadmin/css/font-awesome.min.css') }}" rel="stylesheet" />
        <!-- Custom styles -->
        <link href="{{ asset('niceadmin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('niceadmin/css/style-responsive.css') }}" rel="stylesheet" />

    </head>
    <body>
        <!-- container section start -->
        <section id="container" class="">
          <!--header start-->

          <header class="header dark-bg">
            <div class="toggle-nav">
              <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
            <a href="{{ route('dashboard') }}" class="logo"><img height="60" width="90" src="{{ asset('niceadmin/img/logokins.jpeg') }}"></a>
            <!--logo end-->

            <div id="top_menu" style="float: right;">
              <img  height="70" width="70" src="{{ asset('niceadmin/img/logoboite.jpeg') }}">
            </div>

            <div class="top-nav notification-row">
            </div>
          </header>
          <!--header end-->

          <!--sidebar start-->
          <aside>
            <div id="sidebar" class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                <li class="">
                  <a class="" href="{{ route('dashboard') }}">
                                <i class="icon_house_alt"></i>
                                <span>Dashboard</span>
                            </a>
                </li>
                <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_house_alt"></i>
                          <span>Produits -></span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('produits')}}">Opérations</a></li>
                          <li><a class="" href="{{ route('typeproduits')}}">Types</a></li>
                      </ul>
                            <!-- <a class="" href="{{ route('produits') }}">
                                <i class="icon_house_alt"></i>
                                <span>Produits</span>
                            </a> -->
                </li>
                <li class="sub-menu">
                  <a href="{{ route('factures') }}" class="">
                                <i class="icon_document_alt"></i>
                                <span>Factures</span>
                            </a>
                </li>

                <li class="sub-menu">
                  <a href="{{ route('clients') }}" class="">
                                <i class="icon_document_alt"></i>
                                <span>Clients</span>
                            </a>
                </li>
                <li class="sub-menu">
                  <a href="{{ route('encaissements') }}" class="">
                                <i class="icon_document_alt"></i>
                                <span>Encaissements</span>
                            </a>
                </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Sorties</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('types')}}">Types</a></li>
                          <li><a class="" href="{{ route('depenses', ['id'=>7777])}}">Depenses</a></li>
                      </ul>
                  </li>
                <li class="sub-menu">
                  <a href="javascript:;" class="">
                                <i class="icon_document_alt"></i>
                                <span>Filtres</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                              <li><a class="" href="{{ route('filtresFacture', ['debut' => '2000-01-01', 'fin'=> '2030-10-10', 'idclient'=> 0]) }}">Filtres Factures</a></li>
                              <li><a class="" href="{{ route('filtresEncaissement', ['debut' => '2000-01-01', 'fin'=> '2030-10-10', 'idclient'=> 0]) }}">Filtres Encaissements</a></li>
                              <li><a href="{{ route('algroup') }}">Gestions des ALs</a></li>
                            </ul>
                </li>
                <li class="sub-menu">
                  <a href="javascript:;" class="">
                                <i class="icon_document_alt"></i>
                                <span>Gestion de stocks</span>
                                <span class="menu-arrow arrow_carrot-right"></span>
                            </a>
                            <ul class="sub">
                              <li><a class="" href="{{ route('productions') }}">Productions</a></li>
                              <li><a class="" href="{{ route('perimes') }}">Périmés</a></li>
                              <li><a href="{{ route('algroup') }}">Rapport</a></li>
                            </ul>
                </li>

              </ul>
              <!-- sidebar menu end-->
            </div>
          </aside>
          <!--sidebar end-->

          <!--main content start-->
          <section id="main-content">
            <section class="wrapper">
              <div class="row">
                <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa fa-bars"></i> Pages</h3>
                  <ol class="breadcrumb">
                    <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
                  </ol>
                </div>
              </div>
              <!-- page start-->
              @yield('content')
              <!-- page end-->
            </section>
          </section>
          <!--main content end-->
        </section>
        <!-- container section end -->
        <!-- javascripts -->
        <script src="{{ asset('niceadmin/js/jquery.js') }}"></script>
        <script src="{{ asset('niceadmin/js/bootstrap.min.js') }}"></script>
        <!-- nice scroll -->
        <script src="{{ asset('niceadmin/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('niceadmin/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <!--custome script for all page-->
        <script src="{{ asset('niceadmin/js/scripts.js') }}"></script>
        <!-- dynamically imported libraires -->
        @yield('script')

    </body>
</html>
