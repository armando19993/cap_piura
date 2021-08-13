<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>CAP Piura</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/datatables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
  <link rel='shortcut icon' type='image/x-icon' href='{{asset('assets/img/favicon.ico')}}' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">

          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="{{asset('assets/img/user.png')}}"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hola {{ Auth::user()->name }}</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Perfil
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Cerrar Sesion
              </a>
            </div>
          </li>
        </ul>
      </nav>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>


      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> <span
                class="logo-name">CAP PIURA</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Inicio</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Trabajos</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('bolsas')}}">Bolsa de Trabajo</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>Noticias</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="{{route('categoriasNoticias')}}">Categorias</a></li>
                <li><a class="nav-link" href="{{route('noticias')}}">Noticias</a></li>
              </ul>
            </li>

            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Junta Directiva</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('categoriasJuntaDirectiva')}}">Categorias</a></li>
                  <li><a class="nav-link" href="{{route('juntaDirectiva')}}">Directivos</a></li>
                </ul>
              </li>


              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Directorio</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('dependencias')}}">Dependencias</a></li>
                  <li><a class="nav-link" href="{{route('miembrosDirectorio')}}">Miembros Directorio</a></li>
                  <li><a class="nav-link" href="{{route('directorio')}}">Directorio</a></li>
                </ul>
              </li>


              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Cursos / Capacitaciones</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('categoriasCursos')}}">Categorias</a></li>
                  <li><a class="nav-link" href="{{route('cursos')}}">Cursos</a></li>
                </ul>
              </li>


              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Pagos</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('categoriasPagos')}}">Categorias</a></li>
                  <li><a class="nav-link" href="{{route('pagos')}}">Pagos</a></li>
                </ul>
              </li>


              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Transacciones</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('transacciones')}}">Transacciones</a></li>
                  <li><a class="nav-link" href="{{route('miembrosDirectorio')}}">Reportes</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Cetificado Habilidad</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('certificados-emitidos')}}">Certificados</a></li>
                </ul>
              </li>


              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Usuarios</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="{{route('usuarios-externos')}}">Usuarios Invitados</a></li>
                  <li><a class="nav-link" href="{{route('usuarios-colegiados')}}">Colegiados</a></li>
                </ul>
              </li>

          </ul>
        </aside>
      </div>

      <div class="main-content">
        <section class="section">
            <div class="section-body">
                @yield('contenido')
            </div>
        </section>
      </div>


    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/app.min.js')}}"></script>
  <!-- JS Libraies -->
  <script src="{{asset('assets/bundles/datatables/datatables.min.js')}}"></script>
  <script src="{{asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets/bundles/jquery-ui/jquery-ui.min.js')}}"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('assets/js/page/datatables.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('/vendors/ckeditor/ckeditor.js') }}"></script>
  <!-- Custom JS File -->
  <script src="{{asset('assets/js/custom.js')}}"></script>

  @yield('scripts')
</body>


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
</html>
