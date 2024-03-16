<?php
namespace app\controllers;

#[\app\filters\Login]
class Publication extends \app\core\Controller {

#[\app\filters\HasProfile]	
   public function index(){
		$publication = new \app\models\Publication();
		$publication = $publication->getForUser($_SESSION['profile_id']);

		$this->view('Publication/create', $publication);
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

	public function createPrivatePublicationLinks(){
		$Publication = new \app\models\Publication();
		$result = $Publication->getPrivacyPublicationsFromUser(0, $_SESSION['profile_id']);

		//$this->view('Publication/index', $Publication);

		foreach ($result as $publication) {
			$pub_title = $publication->publication_title;
			echo "<a href='../Publication/asdteas?title=$pub_title'>$pub_title</a><br>";
		}
}

public function createBothPublicationLinks(){
	$Publication = new \app\models\Publication();
	$result = $Publication->getAllPublicationsFromUser($_SESSION['profile_id']);

	foreach ($result as $publication) {
		$pub_title = $publication->publication_title;
		$pub_id = $publication->publication_id;
		$pub_status = $publication->publication_status;

		if($pub_status == 1){
			$pub_status_string = 'Public';
		}else{
			$pub_status_string = 'Private';
		}

		echo "<a href='../Publication/asdteas?title=$pub_title&id=$pub_id'>$pub_title -- $pub_status_string</a><br>";
	}
}

	public function createPublicPublicationLinks(){ 
			$Publication = new \app\models\Publication();
			$result = $Publication->getAllPublicPublications();

			$this->view('Publication/index', $Publication);

			foreach ($result as $publication) {
				$pub_title = $publication->publication_title;
				$pub_id = $publication->publication_id;
				echo "<a href='../Publication/asdteas?title=$pub_title&id=$pub_id'>$pub_title</a><br>";
			}
	}

	public function viewPublicationLinks(){
		$Publication = new \app\models\Publication();
		$Publication = $Publication->getByPubId($_GET['id']);
		
		$this->view('Publication/asdteas', $Publication);
		$_SESSION['publication_id'] = $Publication->publication_id;
		var_dump($_SESSION);
	}

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

	public function handleSearch() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $searchTerm = $_POST['search_box']; // Grab the search term from the form
			$publication = new \app\models\Publication(); 
            // Assuming you have a model named PublicationModel with the necessary methods
            

            if ($_POST['action'] == 'title') {
               $result = $publication->getByTitle($searchTerm);
			   $this->view('/Publication/index', $result);
			   foreach ($result as $display) {
				$pub_title = $display->publication_title;
				echo "<a href='../Publication/asdteas?title=$pub_title'>$pub_title</a><br>";
			}
            } elseif ($_POST['action'] == 'content') {
                $result = $publication->getByTitle($searchTerm);
				$this->view('/Publication/index', $result);
            } else {
                // Handle unexpected action
                $results = [];
            }

            
           
        }
    }

}
