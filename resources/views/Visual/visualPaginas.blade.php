<!DOCTYPE html>
<html>
  @include('Conteudo.cabecalho')
<body class="app sidebar-mini rtl">
  @include('Conteudo.navegacao')

  @yield('conteudo')

  @include('Conteudo.scripts')

  </body>
</html>