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
        $comment->create();
        header('Location:/Publication/view/'.$publication_id);
    }
    #[Login]
    #[HasProfile]
    public function delete($publication_comment_id) {
        $comment = \app\models\Comment::find($publication_comment_id);
        $publication_id = $comment->publication_id;
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($_SESSION['user_id']);

        if ($comment && $comment->profile_id == $profile->profile_id) {
            $comment->delete();
        }
        header('Location:/Publication/view/'.$publication_id);
    }



    #[Login]
    #[HasProfile]
    public function update($publication_comment_id) {
        $comment = \app\models\Comment::find($publication_comment_id);
        $profile = new \app\models\Profile();
        $profile = $profile->getForUser($_SESSION['user_id']);

        if ($comment && $comment->profile_id == $profile->profile_id) {
            $comment->comment_text = $_POST['text'];
            $comment->update();
        }
        header('Location:/Publication/view/'.$comment->publication_id);
    }

    public function getComments($publication_id) {
        $comments = \app\models\Comment()::getComments($publication_id);
        return $comments;
    }
    
}