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
		//there is a mistake in the next line
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\publication');//set the type of data returned by fetches
		return $STMT->fetch();//return (what should be) the only record
	}
}