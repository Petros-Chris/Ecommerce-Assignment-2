<?php
namespace app\controllers;

class Comment extends \app\core\Controller {

#[\app\filters\HasProfile]	
   public function index(){
		$comment = new \app\models\Comment();
		$comment = $comment->getForUser($_SESSION['profile_id']);

		$this->view('Comment/create', $comment);
	}

    public function create(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $comment = new \app\models\Comment();

            $comment->profile_id = $_SESSION['profile_id'];
			$comment->publication_id = $_SESSION['publication_id'];
			$comment->comment_text = $_POST['comment_text'];
            $comment->timestamp = date("Y-m-d H:i:s");

            $comment->insert();
			
            header('location:/Main/index');
		}else{
			$this->view('Comment/create');
		}
    }

	public function createPublicPublicationLinks(){ 
			$comment = new \app\models\Comment();
			$result = $comment->getAllComments($_SESSION['publication_id']);

			foreach ($result as $comment) {
				$comment_id = $comment->publication_comment_id;
                echo("<br>");
				echo "<a href='../Comment/index?commentId=$comment_id'>$comment_id</a><br>";

			}
	}

	public function viewPublicationLinks(){
		$comment = new \app\models\Comment();
		$comment = $comment->getByPubId($_GET['commentId']);
		
		$this->view('Comment/index', $comment);
		$_SESSION['publication_comment_id'] = $comment->publication_comment_id;
		var_dump($_SESSION);
	}

	#[\app\filters\OwnsPost]
	public function modify(){
		$publication = new \app\models\Publication();
		$publication = $publication->getByPubId($_SESSION['publication_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			//populate it
			$publication->publication_title = $_POST['publication_title'];
			$publication->publication_text = $_POST['publication_text'];
			$publication->publication_status = $_POST['publication_status'];
			$publication->timestamp = date("Y-m-d H:i:s");
			//update it
			$publication->update();
			//redirect
			unset($_SESSION['publication_id']);
			header('location:/Publication/index');
		}else{
			$this->view('Publication/edit', $publication);
		}
	}

	public function delete(){
		$publication = new \app\models\Publication();
		$publication = $publication->getByPubId($_SESSION['publication_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$publication->delete();
			header('location:/Profile/index');
		}else{
			$this->view('Publication/delete',$publication);
		}
	}

	public function handleSearch() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = $_POST['search_box'];
			$publication = new \app\models\Publication(); 
            
            if ($_POST['action'] == 'title') {
               $result = $publication->getByTitle($searchTerm);
			   $this->view('/Publication/index', $result);

			   foreach ($result as $display) {
				$pub_title = $display->publication_title;
				$pub_id = $display->publication_id;
				echo "<a href='../Publication/asdteas?title=$pub_title&id=$pub_id'>$pub_title</a><br>";
			}
            } elseif ($_POST['action'] == 'content') {
                $result = $publication->getByContent($searchTerm);
				$this->view('/Publication/index', $result);

				foreach ($result as $display) {
					$pub_title = $display->publication_title;
					$pub_id = $display->publication_id;
					echo "<a href='../Publication/asdteas?title=$pub_title&id=$pub_id'>$pub_title</a><br>";
				}
            } else {
                $results = [];
            }
        }
    }
}
