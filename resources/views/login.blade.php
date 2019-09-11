<!DOCTYPE html>
<html>
<head>
  <title>Tela Login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <section class="material-half-bg">
    <div class="cover"></div>
  </section>
  <section class="login-content">
    <div class="logo">
      <h1>Reposição Inteligente</h1>
    </div>
    <div class="login-box">
      <form class="login-form" action="{{route('login')}}" method="post">
        @CSRF
        <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ENTRAR</h3>
        <div class="form-group">
          <label class="control-label">Matricula</label>
          <input class="form-control" type="text" placeholder="Insira sua matrícula" name='matricula' autofocus>
        </div>
        <div class="form-group">
          <label class="control-label">Senha</label>
          <input class="form-control" type="password" placeholder="Senha" name='senha'>
        </div>
        <div class="form-group btn-container">
          <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Logar</button>
        </div>
      </form>
    </div>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
        $('.login-box').toggleClass('flipped');
        return false;
      });
    </script>
</body>
</html>