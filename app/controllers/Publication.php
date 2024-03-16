<?php
namespace app\controllers;

#[\app\filters\Login]
class Publication extends \app\core\Controller {

#[\app\filters\HasProfile]	
   public function index(){
		$publication = new \app\models\Publication();
		$publication = $publication->getForUser($_SESSION['profile_id']);
	
		$this->view('Publication/index', $publication);
	}

    public function create(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $Publication = new \app\models\Publication();

            $Publication->profile_id = $_SESSION['profile_id'];
			$Publication->publication_title = $_POST['publication_title'];
			$Publication->publication_text = $_POST['publication_text'];
			$Publication->timestamp = date("Y-m-d H:i:s");
            $Publication->publication_status = $_POST['publication_status'];

            $Publication->insert();

            header('location:/Main/index');
		}else{
			$this->view('Publication/create');
		}
    }
}
