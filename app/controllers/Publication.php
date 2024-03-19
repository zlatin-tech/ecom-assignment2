<?php
namespace app\controllers;

class Publication extends \app\core\Controller{
    
}
class Publication {
    private $publicationModel;

    public function __construct($database) {
        $this->publicationModel = new Publication($database);
    }

    // Display the page with all publications
    public function index() {
        $publications = $this->publicationModel->getAllPublications();
        // Load the view with publications
    }

    public function create(){
        $this->view('Publication/create');
    }
    public function edit($publicationId) {
        $publication = $this->publicationModel->getPublicationById($publicationId);
        // Load the view for editing with publication data
    }

    // Handle the creation of a publication
    public function store() {
        // Retrieve POST data and use the model to create a publication
    }   

    // Handle the updating of a publication
    public function update($publicationId) {
        // Retrieve POST data and use the model to update the publication
    }

    public function destroy($publicationId) {
        $this->publicationModel->deletePublication($publicationId);
        // Redirects to publication list
    }

    //TODO search methods
}