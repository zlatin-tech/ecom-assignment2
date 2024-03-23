<?php
namespace app\controllers;

use app\filters\Login;
use app\filters\HasProfile;


class Publication extends \app\core\Controller{

     public function main(){
        $this->view('Main/index', $this->getAllPublications());
    }

     public function displayPublicationById($id) {
        $publication_id = intval($id);  
        $publication = \app\models\Publication::getPublicationById($publication_id);   
        $this->view('Publication/view', ['publication' => $publication]);
    }
    #[Login]
    #[HasProfile]
    public function create() {
        $this->view('Publication/create');
    }
    public function getAllPublications(){
        return \app\models\Publication::getAllPublications();
    }

    // Store a newly created publication in the database
    #[Login]
    #[HasProfile]
    public function store() {
        $publication = new \app\models\Publication();
        $profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);
        $publication->profile_id = $profile->profile_id;
        $publication->publication_title = $_POST['title'];
        $publication->publication_text = $_POST['text'];
        $publication->publication_status = $_POST['status'];
        $publication->createPublication();
        header('Location:/Main/index');
    }

    // Show the form for editing the specified publication
    #[Login]
    #[HasProfile]
    public function edit($publication_id) {
        $publication = \app\models\Publication::getPublicationById($publication_id);
        $profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);
        if($publication->profile_id == $profile->profile_id){
            $this->view('Publication/edit', $publication);
        }else{
            header('Location:/Publication/view/'.$publication_id);
        }
    }

    #[Login]
    #[HasProfile]
    public function update($publication_id) {
        $publication = new \app\models\Publication();
        $publication->publication_id = $publication_id;
        $publication->publication_title = $_POST['title'];
        $publication->publication_text = $_POST['text'];
        $publication->publication_status = $_POST['status'];
        $publication->editPublication();
        header('Location:/Publication/view/'.$publication_id);

    }

    // Remove the specified publication from the database
    #[Login]
    #[HasProfile]
    public function destroy($id) {
        $publication = new \app\models\Publication();
        $publication->publication_id = $id;
        $publication->deletePublication();
        header('Location:/Main/index');
    }

    public function search() {
        $searchTerm = $_GET['search'];
        $publication = new \app\models\Publication();
        $results = $publication->searchPublications($searchTerm);
        $this->view('Publication/search');
    }
}