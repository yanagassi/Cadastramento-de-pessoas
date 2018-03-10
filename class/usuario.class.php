<?php 
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
	**/

	class usuario
	{

 		function __construct()
		{
			$conexao = new conexao;
			$this->conn = $conexao->conexao();
			session_start();

		}

		function login($usuario , $senha)
		{
			$data = $this->conn->prepare("SELECT * FROM usuarios WHERE usuario=:usuario");
			$data->bindParam(':usuario', $usuario, PDO::PARAM_STR);
			$data->execute();
			foreach ($data as $key) {
				$user_DB = $key['usuario'];
				$pass_DB = $key['senha'];
				break;
			}
			if($senha == $pass_DB && $usuario == $user_DB)
			{
				$token = md5(uniqid(time())) . $usuario;
				$_SESSION['token'] = $token;
				$data = $this->conn->prepare("UPDATE usuarios SET token=:token WHERE usuario=:usuario");
				$data->bindParam(':token', $token, PDO::PARAM_STR);
				$data->bindParam('usuario', $usuario, PDO::PARAM_STR);
				$data->execute();
			}
		}

		function protege()
		{

			$token = $_SESSION['token'];
			if(empty($token))
			{
				session_destroy();
				header("Location: login.php");
			}
			$data =  $this->conn->prepare("SELECT * FROM usuarios WHERE token=:token");
			$data->bindParam(':token', $token, PDO::PARAM_STR);
			$data->execute();
			foreach ($data as $key) {
				$usuario = $key['usuario'];
				$senha = $key['senha'];
				
				break;
			}
			if (empty($usuario) || empty($senha)) 
			{
					session_destroy();
					header("Location: login.php");
			}
		}

		function sair($token)
		{
			$data =  $this->conn->prepare("SELECT * FROM usuarios WHERE token=:token");
			$data->bindParam(':token', $token, PDO::PARAM_STR);
			$data->execute();
			foreach ($data as $key) {
				$usuario = $key['usuario'];
			}
			$token = md5(uniqid(time())) . $usuario;
			$_SESSION['token'] = $token;
			$data = $this->conn->prepare("UPDATE usuarios SET token=:token WHERE usuario=:usuario");
			$data->bindParam(':token', $token, PDO::PARAM_STR);
			$data->bindParam('usuario', $usuario, PDO::PARAM_STR);
			$data->execute();
			session_destroy();
			header("Location: index.php");
		}
	}

 ?>