<?php
namespace app\models;

use PDO;
class Comment extends \app\core\Model{

    public $publication_comment_id;
    public $profile_id;
    public $publication_id;
    public $comment_text;
    public $timestamp;

    public function insert(){
		$SQL = 'INSERT INTO publication_comment(profile_id, publication_id, comment_text, timestamp)
            VALUE (:profile_id,:publication_id,:comment_text,:timestamp)';

		$STMT = self::$_conn->prepare($SQL);

		$STMT->execute(
			[
            'profile_id'=>$this->profile_id,
            'publication_id'=>$this->publication_id,
            'comment_text'=>$this->comment_text,
			'timestamp'=>$this->timestamp]
		);
	}

    public function getForUser($profile_id){
		$SQL = 'SELECT * FROM publication_comment WHERE profile_id = :profile_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['profile_id'=>$profile_id]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\comment');//set the type of data returned by fetches
		return $STMT->fetch();//return (what should be) the only record
	}

    public function getAllComments($publication_id){ //This gets all public publications
		$SQL = 'SELECT * FROM publication_comment WHERE publication_id = :publication_id ORDER BY timestamp DESC';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(['publication_id'=>$publication_id]);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Comment');
		return $STMT->fetchAll();
	}

    public function getByPubId($publication_comment_id){
		$SQL = 'SELECT * FROM publication_comment WHERE publication_comment_id = :publication_comment_id';
		$STMT = self::$_conn->prepare($SQL);
		$STMT->execute(
			['publication_comment_id'=>$publication_comment_id]
		);
		$STMT->setFetchMode(PDO::FETCH_CLASS,'app\models\Comment');
		return $STMT->fetch();
	}
}
    ?>