<?php
namespace app\controllers;

class Comment extends \app\core\Controller {

#[\app\filters\HasProfile]	
   public function index(){
		$comment = new \app\models\Comment();
		$comment = $comment->getForUser($_SESSION['profile_id']);

		$this->view('Comment/create', $comment);
	}

#[\app\filters\Login]
    public function create(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $comment = new \app\models\Comment();

            $comment->profile_id = $_SESSION['profile_id'];
			$comment->publication_id = $_SESSION['publication_id'];
			$comment->comment_text = $_POST['comment_text'];
            $comment->timestamp = date("Y-m-d H:i:s");

            $comment->insert();
			
            header('location:/Profile/index');
		}else{
			$this->view('Comment/create');
		}
    }

	public function createPublicPublicationLinks(){ 
		$comment = new \app\models\Comment();
		$result = $comment->getAllComments($_SESSION['publication_id']);

		foreach ($result as $comment) {
			$comment_id = $comment->publication_comment_id;
			$sum_of_text = substr($comment->comment_text, 0,20);
            echo("<br>");
			echo "<a href='../Comment/index?commentId=$comment_id'>$sum_of_text</a><br>";
		}
	}

	public function viewPublicationLinks(){
		$comment = new \app\models\Comment();
		$comment = $comment->getByPubId($_GET['commentId']);
		
		$this->view('Comment/index', $comment);
		$_SESSION['publication_comment_id'] = $comment->publication_comment_id;
	}

#[\app\filters\OwnsComment]
	public function modify(){
		$comment= new \app\models\Comment();
		$comment = $comment->getByPubId($_SESSION['publication_comment_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			$comment->profile_id = $_SESSION['profile_id'];
			$comment->publication_id = $_SESSION['publication_id'];
			$comment->comment_text = $_POST['comment_text'];
            $comment->timestamp = date("Y-m-d H:i:s");
			//update it
			$comment->update();
			header('location:/Publication/index');
		}else{
			$this->view('Comment/edit', $comment);
		}
	}

	public function delete(){
		$comment = new \app\models\Comment();
		$comment= $comment->getByPubId($_SESSION['publication_comment_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$comment->delete();
			header('location:/Publication/index');
		}else{
			$this->view('Comment/delete',$comment);
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
            }
        }
    }
}