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


        $SQL = 'INSERT INTO publication_comment (profile_id, publication_id, comment_text) VALUES (:profile_id, :publication_id, :comment_text)';
        $STMT = self::getConnection()->prepare($SQL);
        $data = [
            'profile_id' => $this->profile_id,
            'publication_id' => $this->publication_id,
            'comment_text' => $this->comment_text
        ];
        $STMT->execute($data);
    }

    public function delete() {
        $SQL = 'DELETE FROM publication_comment WHERE publication_comment_id = :comment_id';

        $STMT = self::getConnection()->prepare($SQL);
        $data = [
            'comment_id' => $this->comment_id
        ];
        $STMT->execute($data);
    }

    public static function getComments($publicationId) {
        $SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id';
        $STMT = self::getConnection()->prepare($SQL);
        $data = [
            'publication_id' => $publicationId
        ];
        $STMT->execute($data);
        return $STMT->fetchAll(PDO::FETCH_CLASS, 'app\models\Comment');
    }
    
    public function update() {
        $SQL = 'UPDATE publication_comment SET comment_text = :comment_text WHERE publication_comment_id = :comment_id';
        $STMT = self::getConnection()->prepare($SQL);
        $data = [
            'comment_text' => $this->comment_text,
            'comment_id' => $this->comment_id
        ];
        $STMT->execute($data);
    }
}