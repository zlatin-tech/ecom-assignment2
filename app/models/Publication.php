<?php
namespace app\models;

use PDO;

class Publication {
    public $publication_id;
    public $profile_id;
    public $publication_title;
    public $publication_text;
    public $timestamp;
    public $publication_status;

    //CRUD

    //insert
    public function createPublication() {
        //define the SQL query
		$SQL = 'INSERT INTO publication (profile_id,publication_title, publication_text, publication_status) VALUES (:profile_id, :publication_title, :publication_text, :publication_status)';
		//prepare the statement
		$STMT = self::$_conn->prepare($SQL);
		//execute
		$data = ['profile_id' => $this->profile_id,
                'publication_title' => $this->publication_title,
                'publication_text'=> $this->publication_text,
                'publication_status'=> $this->publication_status];
		$STMT->execute($data);
    }

    //update
    public function editPublication() {
        // SQL to update a publication record
        //define the SQL query
		$SQL = 'UPDATE publication SET publication_title = :publication_title, publication_text = :publication_text, publication_status = :publication_status WHERE publication_id = :publication_id';
		//prepare the statement
		$STMT = self::$_conn->prepare($SQL);
		//execute
		$data = ['publication_id' => $this->publication_id,
                'publication_title' => $this->publication_title,
                'publication_text'=> $this->publication_text,
                'publication_status'=> $this->publication_status];
		$STMT->execute($data);
    }

    // Delete a publication
    public function deletePublication($publicationId) {
        $SQL = 'DELETE FROM publication WHERE publication_id = :publication_id';
        $STMT = self::$_conn->prepare($SQL);
        $data = ['publication_id'=>$this->publication_id];
        $STMT->execute($data);
    }

    // Fetch all publications, most recent first
    public function getAllPublications() {
        // SQL to select all publications, order by timestamp DESC
        $SQL = 'SELECT * FROM publication ORDER BY timestamp DESC';        ;
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute();
		return $STMT->fetchAll(PDO::FETCH_CLASS, 'app\models\Publication');
    }

    // Fetch a single publication by ID
    public static function getPublicationById($publicationId) {
        $SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
		$STMT = self::$_conn->prepare($SQL);
        $data = ['publication_id'=>$publicationId];
        $STMT->execute($data);
        return $STMT->fetch(PDO::FETCH_CLASS, 'app\models\Publication');
    }

    // Search publications by title or content
    public static function searchPublications($searchTerm) {
        $SQL = "SELECT * FROM publication WHERE publication_title LIKE :searchTerm OR publication_text LIKE :searchTerm";
        $STMT = self::$_conn->prepare($SQL);
        $searchTerm = "%$searchTerm%";
        $STMT->execute(['searchTerm' => $searchTerm]);
        $publications = $STMT->fetchAll(PDO::FETCH_ASSOC);
        return $publications ? $publications : [];
    }
    
}