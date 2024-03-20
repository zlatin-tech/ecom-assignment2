<?php
namespace app\controllers;

use app\models\Publication;
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
        $publication = new Publication();
        $publications = $publication->getAllPublications();
        require_once('views/publications/index.php');
        $this->view('Publication/view');
    }

    // Show the form for creating a new publication
    public function create() {
        $this->view('Publication/create');
    }

    // Store a newly created publication in the database
    public function store() {
        $publication = new Publication();
        $publication->profile_id = $_SESSION['profile_id'];
        $publication->publication_title = $_POST['title'];
        $publication->publication_text = $_POST['text'];
        $publication->publication_status = $_POST['status'];
        $publication->createPublication();
        header('Location: /publications');
    }

    // Display the specified publication
    public function show($id) {
        $publication = Publication::getPublicationById($id);
        require_once('views/publications/show.php');
    }

    // Show the form for editing the specified publication
    public function edit($id) {
        $publication = Publication::getPublicationById($id);
        require_once('views/publications/edit.php');
    }

    // Update the specified publication in the database
    public function update($id) {
        $publication = new Publication();
        $publication->publication_id = $id;
        $publication->publication_title = $_POST['title'];
        $publication->publication_text = $_POST['text'];
        $publication->publication_status = $_POST['status'];
        $publication->editPublication();
        header('Location:/Main/index');
    }

    // Remove the specified publication from the database
    public function destroy($id) {
        $publication = new Publication();
        $publication->publication_id = $id;
        $publication->deletePublication();
        header('Location:/Main/index');
    }

    // Search for publications by title or content
    public function search() {
        $searchTerm = $_GET['search'];
        $publication = new Publication();
        $results = $publication->searchPublications($searchTerm);
        require_once('views/publications/search.php');
    }
}