<?php
namespace app\filters;

#[\Attribute]
class OwnsComment implements \app\core\AccessFilter{

	public function redirected(){
        $comment = new \app\models\Comment();
		$comment = $comment->getByPubId($_SESSION['publication_comment_id']);

		if($comment->profile_id == $_SESSION['profile_id']){
		    return false;
		} else {
            header('location:/Publication/index');
            return true;
        }
	}

}