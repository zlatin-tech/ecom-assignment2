<?php
namespace app\controllers;

//applying the Login condition to the whole class
#[\app\filters\Login]
class Profile extends \app\core\Controller{

	#[\app\filters\HasProfile]
	public function index(){
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);
		$publications = \app\models\Publication::getPublicationsByProfileId($profile->profile_id);
		$this->view('Profile/index', [
			'profile' => $profile, 
			'publications' => $publications
		]);
	}

	public function create(){
		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			$profile = new \app\models\Profile();
			//populate it
			$profile->user_id = $_SESSION['user_id'];
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			//insert it
			$profile->insert();
			//redirect
			header('location:/Profile/index');
		}else{
			$this->view('Profile/create');
		}
	}

	public function modify(){
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			//populate it
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			//update it
			$profile->update();
			//redirect
			header('location:/Profile/index');
		}else{
			$this->view('Profile/modify', $profile);
		}
	}
}