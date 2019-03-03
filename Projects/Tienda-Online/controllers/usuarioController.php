<?php 

require_once 'models/usuario.php';

class usuarioController{

	private $usuario;

	public function __construct(){
		$this->usuario = new Usuario();
	}

	public function registro(){
		require_once 'views/usuario/registro.php';
	}

	public function save(){
		if (isset($_POST)) {
			$nombre = isset($_POST['nombre']) ? $this->usuario->getConex()->real_escape_string(trim($_POST['nombre'])) : null;
			$apellidos = isset($_POST['apellidos']) ? $this->usuario->getConex()->real_escape_string(trim($_POST['apellidos'])) : null;
			$email = isset($_POST['email']) ? $this->usuario->getConex()->real_escape_string(trim($_POST['email'])) : null;
			$password = isset($_POST['password']) ? $this->usuario->getConex()->real_escape_string(trim($_POST['password'])) : null;
			$errores = [];

			if (empty($nombre) || is_numeric($nombre) || preg_match("/[0-9]/", $nombre)) {
				$errores['nombre'] = 'El nombre no es valido';
			}

			if (empty($apellidos) || is_numeric($apellidos) || preg_match("/[0-9]/", $apellidos)) {
				$errores['apellidos'] = 'El apellido no es valido';
			}

			if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$errores['email'] = 'El email no es valido';
			}

			if (empty($password)) {
				$errores['password'] = 'El password no es valido';
			}

			if (count($errores) == 0) {

				$this->usuario->setNombre($nombre);
				$this->usuario->setApellidos($apellidos);
				$this->usuario->setEmail($email);
				$password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
				$this->usuario->setPassword($password);

				$verify = $this->usuario->verifyEmail();

				if (empty($verify)) {
					
					$save = $this->usuario->save();

					if($save){
						$login = $this->usuario->login();
						$dataUsuario = $login->fetch_object();
						$_SESSION['usuario'] = $dataUsuario;
					}else{
						$_SESSION['registro']['error'] = "Error al registrar";
					}

				}else{
					$_SESSION['registro']['error'] = "El email ya esta en uso";
				}

			}else{
				$_SESSION['errores'] = $errores;
			}

		}

		header('Location: '.baseUrl.'usuario/registro');

	}

	public function login(){
		if (isset($_POST)) {
			$email = isset($_POST['email']) ? $this->usuario->getConex()->real_escape_string(trim($_POST['email'])) : null;
			$password = isset($_POST['password']) ? $this->usuario->getConex()->real_escape_string(trim($_POST['password'])) : null;

			$this->usuario->setEmail($email);

			$login = $this->usuario->login();

			if ($login && $login->num_rows == 1) {
				$dataUsuario = $login->fetch_object();
				$verify = password_verify($password, $dataUsuario->password);

				if ($verify) {
					$_SESSION['usuario'] = $dataUsuario;
					if ($dataUsuario->rol == 'admin') {
						$_SESSION['admin'] = $dataUsuario;
					}
				}else{
					$_SESSION['login']['error'] = 'Contraseña incorrecta';
				}
				
			}else{
				$_SESSION['login']['error'] = 'Email incorrrecto';
			}
			
		}

		header('Location: ' . baseUrl);
	}

	public function destroy(){
		if ($_SESSION['usuario']) {
			$this->usuario->destroyUser();
			if ($_SESSION['admin']) {
				$this->usuario->destroyAdmin();
			}
			header('Location: '.baseUrl);
		}
	}

}

?>