<!DOCTYPE html>

<html lang = "pt-BR">
	
	<head>
		<title>Cadastrando cliente</title>
		<meta charset = "UTF-8" />
	</head>
	
	<body>
		<?php 
			print "<h1>aaaaa</h1>"
		
		?>
		<h1>Seja um cliente MART</h1>
		<form action = "../comum/processa.php" method = "POST">
			<label>
				Nome:
			</label> <input type = "text" name = "nome" value = "" required />
			
			<label>
				Sobrenome:
			</label> <input type = "text" name = "sobrenome" value = "" required/>

			<br />
			
			<label>
				E-mail:
			</label> <input type = "text" name = "mail" value = "" required/>
			
			<label>
				Senha: 
			</label> <input type = "text" name = "senha" value = "" required/>
			
			<br />
			
			<label>
				Data de nascimento:
			</label> <input type = "date" name = "data" value = "" required/>
			
			<label>
				Cidade: 
			</label> <input type = "text" name = "city" value = "" required/>
			
			<br />
			
			<label>
				Deseja estar ciente sobre seleções de grupos artísticos ou a abertura de editais?
			</label> 
			<input type = "radio" name = "editais" value = "Sim" /> Sim
			<input type = "radio" name = "editais" value = "Nao" /> Não
			
			
			<br />
			
			<input type = "submit" name = "submeter" value = "Enviar" required/>
			<input type = "reset" name = "resetar" value = "Limpar" required/>
				
		</form>
		<br >
		<a href = "../inicial/pagina_inicial.php">Voltar</a>
	</body>

</html>