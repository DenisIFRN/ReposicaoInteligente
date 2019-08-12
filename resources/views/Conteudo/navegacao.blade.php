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
            <a class="app-menu__item text-danger" href="{{ url('sair') }}">
              <i class="app-menu__icon fa fa-sign-out fa-lg"></i>
              <span class="app-menu__label">Sair</span>
            </a>
          </li>
        </ul>
    	</aside>