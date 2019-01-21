<?php
class UserController extends Controller
{
	public function indexAction()
	{
		$this->render("register");	
	}
	
	public function addAction()
	{
		echo "addAction";
	}

	public function registerAction()
	{
		$array = $this->request->post();
		$UserModel = new UserModel($array);

		if(isset($array['email']) && isset($array['password']) && isset($array['pseudo']))
		{
			if(filter_var($array['email'], FILTER_VALIDATE_EMAIL))
			{
				$is_email_exist = $UserModel->read();
				if(!$is_email_exist)
				{
					$UserModel->save();
					$_SESSION['flash']['error'] = "Votre compte a été crée.";
					header('Location: /webacademie_sem2/PiePHP/User');
				}
				else{
					$_SESSION['flash']['error'] = "Le mail existe déjà.";
					header('Location: /webacademie_sem2/PiePHP/User');
				}
			}
			else{
				$_SESSION['flash']['error'] = "Le mail n'est pas valide.";
				header('Location: /webacademie_sem2/PiePHP/User');
			}
		}

	}

	public function logAction()
	{
		$this->render("profil");
	}

	public function loginAction()
	{
		$_SESSION = null;
		$array = $this->request->post();
		$orm = new ORM();
		
		if(isset($array['email']) && isset($array['password']))
		{
			$delete = $orm->find('delete_members', array('WHERE' => 'email = "'.$array['email'].'"'));
			$user = $orm->find('users', array('WHERE' => 'email = "'.$array['email'].'"'));
			$verify = password_verify($array['password'], $user[0]['password']);

			if(!$delete)
			{
				if($verify == true)
				{
					foreach ($user[0] as $key => $value) {
						$_SESSION[$key] = $value;
					}
					if(empty($_SESSION)){
						header('Location: /webacademie_sem2/PiePHP/User');
					}
					$this->render("profil");
				}
				else{
					$_SESSION['flash2']['error'] = "mauvais mot de passe ou email.";
					header('Location: /webacademie_sem2/PiePHP/User');
				}

			}
			else{
				$_SESSION['flash2']['error'] = "Ce compte n'existe plus";
				header('Location: /webacademie_sem2/PiePHP/User');
			}
		}
		else if(empty($_POST)){
			return null;
		}
	}

	public function updateAction()
	{
		$array = $this->request->post();
		if(!empty($array['email']))
		{
			if(filter_var($array['email'], FILTER_VALIDATE_EMAIL))
			{
				$orm = new ORM();
				$user = $orm->update('users', $_SESSION['id'], array('email' => $array['email']));
				$_SESSION['flash']['error'] = "Votre email a été changé.";
				header('Location: /webacademie_sem2/PiePHP/User/log');
			}
			else{
				$_SESSION['flash']['error'] = "erreur.";
				header('Location: /webacademie_sem2/PiePHP/User/log');
			}
		}

		if(empty($array['email'])){
			$_SESSION['flash']['error'] = "erreur.";
			header('Location: /webacademie_sem2/PiePHP/User/log');
		}
	}

	public function pseudoAction()
	{
		$array = $this->request->post();
		if(!empty($array['pseudo']))
		{
			$orm = new ORM();
			$user = $orm->update('users', $_SESSION['id'], array('pseudo' => $array['pseudo']));
			$_SESSION['flash1']['error'] = "Votre pseudo a été changé.";
			header('Location: /webacademie_sem2/PiePHP/User/log');
		}
		if(empty($array['pseudo'])){
			$_SESSION['flash1']['error'] = "erreur.";
			header('Location: /webacademie_sem2/PiePHP/User/log');
		}
	}

	public function passwordAction()
	{
		$array = $this->request->post();
		if(!empty($array['password']) AND !empty($array['re_password']))
		{
			if($array['password'] == $array['re_password'])
			{
				$orm = new ORM();
				$hash = password_hash($array['re_password'], PASSWORD_DEFAULT);
				$user = $orm->update('users', $_SESSION['id'], array('password' => $hash));
				$_SESSION['flash2']['error'] = "Votre password a été changé.";
				header('Location: /webacademie_sem2/PiePHP/User/log');
			}
		}

		if(empty($array['password']) AND empty($array['re_password']))
		{
			$_SESSION['flash2']['error'] = "Remplir les deux champs.";
			header('Location: /webacademie_sem2/PiePHP/User/log');
		}

		if(isset($array['password']) AND empty($array['re_password']) OR isset($array['re_password']) AND empty($array['password']))
		{
			$_SESSION['flash2']['error'] = "Remplir les deux champs.";
			header('Location: /webacademie_sem2/PiePHP/User/log');
		}
	}

	public function deleteAction()
	{
		$array = $this->request->post();

		if(!empty($array['compte']))
		{
			if ($array['compte'] == 'oui')
			{
				$orm = new ORM();
				$orm->create('delete_members', array('id' => $_SESSION['id'], 'email' => $_SESSION['email'], 'date_delete' => 'NOW()'));
				header('Location: /webacademie_sem2/PiePHP/User');
			}
			if($array['compte'] == 'non')
			{
				header('Location: /webacademie_sem2/PiePHP/User/log');
			}
		}
	}

	public function logoutAction()
	{
		session_destroy();

		header('Location: /webacademie_sem2/PiePHP/User');
	}
}