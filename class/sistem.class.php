<?php 

	error_reporting(0);
	/**
	* 
	*/
	class conexao
	{
		
		function conexao()
		{
			$user = 'root';
			$pass = '';
			$conn = new PDO('mysql:host=localhost;charset=utf8;dbname=cam', $user, $pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $conn;
		}	
	}

	/**
	* 
	*/
	class dados
	{
		
		function __construct()
		{
			$conexao = new conexao;
			$this->conn = $conexao->conexao();
		}

		function getDados($dado, $id)
		{
			$data = $this->conn->prepare("SELECT * FROM cam_dados WHERE id=:id");
			$data->bindParam(':id', $id, PDO::PARAM_INT);
			$data->execute();
			foreach ($data as $key) {
				print $key[$dado];
				break;
			}
		}


		function envia($nome, $nome_guerra, $nascimento, $idt, $bateria, $telefone, $numero, $endereco, $bairro, $cidade, $uf, $cep, $pais, $foto)
		{
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
        		$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        		$caminho_imagem = "fotos/" . $nome_imagem;

			move_uploaded_file($foto["tmp_name"], $caminho_imagem);

			$data = $this->conn->prepare("INSERT INTO cam_dados (id, nome, nascimento, foto, nome_guerra, idt, bateria, numero, endereco, bairro, cidade, UF, CEP, pais, telefone) VALUES (NULL, :nome,  :nascimento, :foto, :nome_guerra, :idt, :bateria, :numero, :endereco, :bairro, :cidade, :UF, :CEP, :pais, :telefone)");
			$data->bindParam(":nome", $nome, PDO::PARAM_STR);
			$data->bindParam(":nascimento", $nascimento, PDO::PARAM_STR);
			$data->bindParam(":foto", $nome_imagem, PDO::PARAM_STR);
			$data->bindParam(":nome_guerra", $nome_guerra, PDO::PARAM_STR);
			$data->bindParam(":idt", $idt, PDO::PARAM_STR);
			$data->bindParam(":bateria", $bateria, PDO::PARAM_STR);
			$data->bindParam(":numero", $numero, PDO::PARAM_STR);
			$data->bindParam(":endereco", $endereco, PDO::PARAM_STR);
			$data->bindParam(":bairro", $bairro, PDO::PARAM_STR);
			$data->bindParam(":cidade", $cidade, PDO::PARAM_STR);
			$data->bindParam(":UF", $uf, PDO::PARAM_STR);
			$data->bindParam(":CEP", $cep, PDO::PARAM_STR);
			$data->bindParam(":pais", $pais, PDO::PARAM_STR);
			$data->bindParam(":telefone", $pais, PDO::PARAM_STR);
			$data->execute();


		}

		function busca($palavra)
		{
			$dados = new dados;
 			$Query = $this->conn->prepare("SHOW COLUMNS FROM cam_dados");
      			$Query->execute();
      			$n=0;
      			$chave = trim($palavra);
	       	 	while($e = $Query->fetch(PDO::FETCH_ASSOC)){
	            		$colunas[] = $e['Field'];
	        	}
	       		for($i=0; $i<14; $i++)
	       		{
				$data= $this->conn->query("SELECT * FROM cam_dados WHERE ". $colunas[$i] ." LIKE '".$palavra."%' ORDER BY nome");
				foreach ($data as $key) {
					print '<a id="resultado" href="ver.php?id='. $key['id'] .'">'.$key['nome'].'</a><br>';
					$n++;
				}
	       		}
	       		if($n == 0 )
	       		{
	       			echo "Nada Encontrado !!!";
	      		 }else{
	       			if($n>1){
	       				print('<a id="resultados">'.$n . ' Resultados encontrados !</a>');
	       			}else{
	       				print('<a id="resultados">'.$n . ' Resultado encontrado !</a>');
	       			}
	       		
	       		}
		}
	}

	/**
	* 
	*/

?>
