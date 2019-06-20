<!DOCTYPE html>
<html>
<head>
	<title>Mostrar</title>
	<meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="app sidebar-mini rtl">
	<!-- Navbar-->
  <header class="app-header"> 
    <a class="app-header__logo" href="index.html">Reposição Inteligente</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label=""></a>
    <!-- Navbar Right Menu-->
  </header>
    <!-- Sidebar menu-->
    	<aside class="app-sidebar">
        <div class="app-sidebar__user">
          <img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
        	<div>
            <p class="app-sidebar__user-name">{{ $nome }}</p>
            <p class="app-sidebar__user-designation">{{ $matricula }}</p>
				  </div>
        </div>
      	<ul class="app-menu">
       		<li>
            <a class="app-menu__item" href="{{'#'}}">
              <i class="app-menu__icon fa fa-dashboard"></i>
              <span class="app-menu__label">Inicio</span>
            </a>
          </li>
        	<li>
            <a class="app-menu__item" href="{{'#'}}">
              <i class="app-menu__icon fa fa-pie-chart"></i>
              <span class="app-menu__label">Mural</span>
            </a>
          </li>
        	<li>
            <a class="app-menu__item text-danger" href="{{ url('sair') }}">
              <i class="app-menu__icon fa fa-sign-out fa-lg"></i>
              <span class="app-menu__label">Sair</span>
            </a>
          </li>
        </ul>
    	</aside>
      <main class="app-content">
        <div class="row">
          <div class="col-md-8 offset-md-2">
            <div class="tile">
              <form method="post">
                {{csrf_field()}}
                <div>
                  <h3 >Solicitar Reposição</h3>
                </div>
                <br>
                <div class="form-group">
                  <label for="exampleFormControlSelect1">Disciplina</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="disciplina">
                      @foreach($turmasVirtuais as $turmas)
                        <option value="{{ $turmas['id'] }}">{{ $turmas["descricao"] }}</option>
                      @endforeach
                    </select>
                  </label>
                </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Motivo</label>
                    <textarea name='justificativa' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                  <label for="exampleFormControlTextarea1">Anexar documento comprovante</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                      <label class="custom-file-label" for="inputGroupFile01">Procurar arquivo...</label>
                    </div>
                  </div>
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Declaro estar ciente da necessidade de apresentar documento(s) que comprove(m) a minha ausência da atividade selecionada.</label>
                  </div><br>
                  <button type="submit" class="btn btn-success">Enviar</button>
                </form>
              </div>
            </div>
          </div>
      </main>

   	<!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript"></script>

  </body>
</html>

