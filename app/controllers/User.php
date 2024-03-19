<?php
namespace app\controllers;

class User extends \app\core\Controller{
	
	function login(){
		//show the login form and log the user in
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$username = $_POST['username'];
			$user = new \app\models\User();
			$user = $user->get($username);
			$password = $_POST['password'];
			if($user && $user->active && password_verify($password, $user->password_hash)){
				$_SESSION['user_id'] = $user->user_id;

				header('location:/Main/index');
			}else{
				header('location:/User/login');
			}
		}else{
			$this->view('User/login');
		}
	}

	function logout(){
		session_destroy();
		header('location:/Main/index');
	}

	function register(){
		//display the form and process the registration
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			//getting the user input and place it in an object
			//create the new User
			$user = new \app\models\User();
			//populate the User
			$user->username = $_POST['username'];
			$user->password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
			//insert the user
			$user->insert();
			//redirect to a good place
			header('location:/User/login');
		}else{
			$this->view('User/register');
		}
	}

	
	function delete(){
		if(!isset($_SESSION['user_id'])){//is not logged in
			header('location:/User/login');
			return;
		}
		$user = new \app\models\User();
		$user = $user->getById($_SESSION['user_id']);
		$user->delete();
		header('location:/User/logout');
	}
}