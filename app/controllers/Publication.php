<?php
namespace app\controllers;

use app\filters\Login;
use app\filters\HasProfile;


class Publication extends \app\core\Controller{
// Apply the Login filter to ensure user is logged in for certain actions
     public function __construct() {
         (new Login())->redirected(['except' => ['index', 'show', 'search']]);
         (new HasProfile())->redirected();
     }

    // Display a listing of the publications, most recent first
    public function index() {
        $publication = new \app\models\Publication();
        $publications = $publication->getAllPublications();
        $this->view('Publication/view', $publications);
    }


    public function create() {
        $this->view('Publication/create');
    }

    // Store a newly created publication in the database
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

    // Display the specified publication
    public function show($id) {
        $publication = \app\models\Publication::getPublicationById($id);
        $this->view('Publication/view', $publication);

    }

    // Show the form for editing the specified publication
    public function edit($id) {
        $publication = \app\models\Publication::getPublicationById($id);
        $this->view('Publication/edit');
    }

    public function update($id) {
        $publication = new \app\models\Publication();
        $publication->publication_id = $id;
        $publication->publication_title = $_POST['title'];
        $publication->publication_text = $_POST['text'];
        $publication->publication_status = $_POST['status'];
        $publication->editPublication();
        header('Location:/Main/index');
    }

    // Remove the specified publication from the database
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