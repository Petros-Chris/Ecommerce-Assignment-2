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

	public function getAll(){
		$SQL = 'SELECT * FROM publication';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute();
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');//set the type of data returned by fetches
		return $STMT->fetchAll();//return all records
	}

	public function getByTitle($publication_title){
		$SQL = 'SELECT * FROM publication WHERE publication_title = :publication_title';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_title'=>$publication_title]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Publication');
		return $STMT->fetch();
	}
}