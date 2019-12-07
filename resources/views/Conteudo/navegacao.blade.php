<!-- Navbar-->
<header class="app-header">
	<a class="app-header__logo" href="index.html">Reposição Inteligente</a>
	<!-- Sidebar toggle button-->
	<a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label=""></a>
	<!-- Navbar Right Menu-->
	<ul class="app-nav">
</header>
	<!-- Sidebar menu-->
	<aside class="app-sidebar">
		<div class="app-sidebar__user">
		
			<img class="app-sidebar__user-avatar" src="https://suap.ifrn.edu.br{{ $foto }}" alt="Denis Soares">
			<div>
				<p class="app-sidebar__user-name">{{ $nome }}</p>
            	<p class="app-sidebar__user-designation">{{ $matricula }}</p>
			</div>
		</div>
		
		<ul class="app-menu">
			<li>
				<a class="app-menu__item" href="{{ route('aluno.index') }}"><i class="app-menu__icon fa fa-home"></i>
				<span class="app-menu__label">Início</span></a>
			</li>
			
			@if($vinculo == 'Aluno')
				<li>
					<a class="app-menu__item" href="{{ route('aluno.create') }}"><i class="app-menu__icon fa fa-plus"></i>
					<span class="app-menu__label">Solicitar Reposição</span></a>
				</li>
			@endif
			
			<li>
				<a class="app-menu__item text-danger" href="{{ url('sair') }}"><i class="app-menu__icon fa fa-sign-out"></i>
              	<span class="app-menu__label">Sair</span>
				</a>
			</li>
		</ul>
	</aside>