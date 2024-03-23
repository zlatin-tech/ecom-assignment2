<?php
namespace app\models;

use PDO;
class Comment extends \app\core\Model{

    public $comment_id;
    public $profile_id;
    public $publication_id;
    public $comment_text;
    public $timestamp;


    public function create() {
        // Define the SQL query
        $SQL = 'INSERT INTO comments (publication_id, comment_text) VALUES (:publication_id, :comment_text)';
        
        // Prepare the statement
        $STMT = self::getConnection()->prepare($SQL);
        
        // Execute
        $data = [
            'publication_id' => $this->publication_id,
            'comment_text' => $this->comment_text
        ];
        $STMT->execute($data);
    }
    public function delete($commentId) {
        // Define the SQL query
        $SQL = 'DELETE FROM comments WHERE id = :comment_id';

        // Prepare the statement
        $STMT = self::getConnection()->prepare($SQL);

        // Execute
        $data = [
            'comment_id' => $commentId
        ];
        $STMT->execute($data);
    }
    public function getComments($publicationId) {
        // Define the SQL query
        $SQL = 'SELECT * FROM comments WHERE publication_id = :publication_id';

        // Prepare the statement
        $STMT = self::getConnection()->prepare($SQL);

        // Execute
        $data = [
            'publication_id' => $publicationId
        ];
        $STMT->execute($data);

        // Return all records
        return $STMT->fetchAll(PDO::FETCH_CLASS, 'app\models\Comment');
    }
    public function update($commentId) {
        // Define the SQL query
        $SQL = 'UPDATE comments SET comment_text = :comment_text WHERE comment_id = :comment_id';

        // Prepare the statement
        $STMT = self::getConnection()->prepare($SQL);

        // Execute
        $data = [
            'comment_text' => $this->comment_text,
            'comment_id' => $commentId
        ];
        $STMT->execute($data);
    }
}