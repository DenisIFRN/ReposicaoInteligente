<!DOCTYPE html>
<html>
<head>
	<title>Mostrar</title>
</head>
<body>

	<h1>Meus dados</h1>
	Nome: {{ $nome }}<br>
	Matricula: {{ $matricula }}<br>
	Email: {{ $email }}<br>
	<a href="{{ url('sair') }}">SAIR</a>

</body>
</html>