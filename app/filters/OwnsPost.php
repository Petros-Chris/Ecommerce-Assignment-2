<?php
namespace app\filters;

#[\Attribute]
class OwnsPost implements \app\core\AccessFilter{

	public function redirected(){
        $publication = new \app\models\Publication();
		$publication = $publication->getByPubId($_SESSION['publication_id']);

		if($publication->profile_id == $_SESSION['profile_id']){
		    return false;
		} else {
            header('location:/Publication/index');
            return true;
        }
	}

}