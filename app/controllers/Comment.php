<?php
namespace app\controllers;

use app\filters\Login;
use app\filters\HasProfile;

class Comment extends \app\core\Controller{
    #[Login]
    #[HasProfile]
    public function store($publication_id) {
        $comment = new \app\models\Comment();
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($_SESSION['user_id']);
        $comment->profile_id = $profile->profile_id;
        $comment->publication_id = $publication_id;
        $comment->comment_text = $_POST['text'];
        $comment->createComment();
        header('Location:/Publication/view/'.$publication_id);
    }
}