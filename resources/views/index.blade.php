<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1> <br><br>
	<form method="POST" action="{{ route('login') }}">
		@csrf
		Matricula:
		<input type="text" name="matricula"> <br>

		Senha:
		<input type="int" name="senha"> <br>

		<button class="btn btn-primary" type="submit">Logar</button>
	</form>
</body>
</html>