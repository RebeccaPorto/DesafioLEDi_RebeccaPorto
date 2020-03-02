<?php
	//Conexão
	$conexao = mysqli_connect("localhost","root","", "clientes");
	if(!$conexao){
		echo "<script>alert('Erro na conexão!');</script>";
	}else{
		//echo "<script>alert('Sucesso na conexão!');</script>";
	}

	//Variaveis
	$nome = $_POST['nome'];
	$sobrenome = $_POST['sobrenome'];
	$enderecoComercial = $_POST['enderecoComercial'];
	$numeroCasa = $_POST['numeroCasa'];
	$complementoCasa = $_POST['complementoCasa'];
	$cep = $_POST['cep'];
	$cidade = $_POST['cidade'];
	$uf = $_POST['uf'];
	$telComercial = $_POST['telComercial'];
	$telCelular = $_POST['telCelular'];
	$email = $_POST['email'];
	$arquivo = $_FILES['arquivo']['name'];

	//Imagem

	//Pasta onde o arquivo vai ser salvo
	$_UP['pasta'] = 'fotoCliente/';
			
	//Tamanho máximo do arquivo em Bytes
	$_UP['tamanho'] = 1024*1024*100; //5mb
	
	//Array com a extensões permitidas
	$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');
	
	//Renomeiar
	$_UP['renomeia'] = false;

	//Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

	//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
	if($_FILES['arquivo']['error'] != 0){
		die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
		exit; //Para a execução do script

		//Faz a verificação da extensao do arquivo
		$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
		if(array_search($extensao, $_UP['extensoes'])=== false){		
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/DesafioLedi_RebeccaPorto/formulario.php'>
				<script type=\"text/javascript\">
					alert(\"A imagem não foi cadastrada extesão inválida.\");
				</script>
			";
		}
		
		//Faz a verificação do tamanho do arquivo
		else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/DesafioLedi_RebeccaPorto/formulario.php'>
				<script type=\"text/javascript\">
					alert(\"Arquivo muito grande.\");
				</script>
			";
		}
	}

	//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
	else{
		//Primeiro verifica se deve trocar o nome do arquivo
		if($_UP['renomeia'] == true){
			//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
			$nome_final = time().'.jpg';
		}else{
			//mantem o nome original do arquivo
			$nome_final = $_FILES['arquivo']['name'];
		}
		//Verificar se é possivel mover o arquivo para a pasta escolhida
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){

			//Incluir no banco de dados
			$sql = "INSERT INTO cartaovisitas (`nome`, `sobrenome`, `enderecoComercial`, `numeroCasa`, `complementoCasa`, `cep`, `cidade`, `uf`, `telComercial`, `telCelular`, `email`, `nome_imagem`, `idCliente`) VALUES ('$nome', '$sobrenome', '$enderecoComercial', '$numeroCasa', '$complementoCasa', '$cep','$cidade','$uf', '$telComercial', '$telCelular', '$email', '$nome_final', 'NULL');";
			$resultado = mysqli_query($conexao, $sql);

			echo "
			<script>alert('Cartão Gerado! Retire seu cartão de visitante na recepção.');</script>;
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/DesafioLedi_RebeccaPorto/formulario.php'>";	
		}else{
			//Upload não efetuado com sucesso, exibe a mensagem
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/DesafioLedi_RebeccaPorto/formulario.php'>
				<script>alert(\"Erro no cadastramento! \n Tente novamente.\");</script>";
		}
	}
	//Fechar conexão 
	mysqli_close($conexao);
?>