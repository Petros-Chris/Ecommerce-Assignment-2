<?php
namespace app\models;

use PDO;
class Publication extends \app\core\Model{

    public $publication_id;
    public $profile_id;
    public $publication_title;
    public $publication_text;
    public $timestamp;
    public $publication_status;

    public function insert(){
		$SQL = 'INSERT INTO publication(profile_id,publication_title,publication_text,timestamp,publication_status)
            VALUE (:profile_id,:publication_title,:publication_text,:timestamp,:publication_status)';

		$STMT = self::$_conn->prepare($SQL);

		$STMT->execute(
			['profile_id'=>$this->profile_id,
			'publication_title'=>$this->publication_title,
			'publication_text'=>$this->publication_text,
			'timestamp'=>$this->timestamp,
            'publication_status'=>$this->publication_status]
		);
	}

    public function getForUser($profile_id){
		$SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$profile_id]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');//set the type of data returned by fetches
		return $STMT->fetch();//return (what should be) the only record
	}

	public function getPrivacyPublicationsFromUser($publication_status, $profile_id){ //This gets one of the two types of publications from a user; 0 for private 1 for public
		$SQL = 'SELECT * FROM publication WHERE publication_status = :publication_status AND profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['publication_status'=>$publication_status, 'profile_id'=>$profile_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getAllPublicationsFromUser($profile_id){ //This gets all the publications from a user
		$SQL = 'SELECT * FROM publication WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['profile_id'=>$profile_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getAllPublicPublications(){ //This gets all public publications
		$SQL = 'SELECT * FROM publication WHERE publication_status = :publication_status';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['publication_status'=> 1]);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getByTitle($publication_title){
		$SQL = 'SELECT * FROM publication WHERE publication_title like :publication_title';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_title'=>"%" . $publication_title . "%"]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getByContent($publication_text){
		$SQL = 'SELECT * FROM publication WHERE publication_text like :publication_text';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_text'=>"%" . $publication_text . "%"]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetchAll();
	}

	public function getByPubId($publication_id){
		$SQL = 'SELECT * FROM publication WHERE publication_id = :publication_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_id'=>$publication_id]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetch();
	}

	public function update(){
		$SQL = 'UPDATE publication SET publication_title=:publication_title,publication_text=:publication_text,
			timestamp=:timestamp,publication_status=:publication_status WHERE publication_id = :publication_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_id'=>$this->publication_id,
			'publication_title'=>$this->publication_title,
			'publication_text'=>$this->publication_text,
			'timestamp'=>$this->timestamp,
			'publication_status'=>$this->publication_status]
		);
	}
}