<?php
namespace app\models;

class Message {
    public $name;
    public $email;
    public $ip;

    public function read() {
		$filename = 'resources/human.txt';
        $fileContent = file($filename);
        $decodedContent = [];

        foreach ($fileContent as $jsonString) {
            $decodedContent[] = json_decode($jsonString, true); 
        }
        return $decodedContent;
	}
 
    public function write($info) {
        $filename = '../../resources/human.txt';
        $message = json_encode($info);                  //1. json_encode this object into $message;  
        $file_handle = fopen($filename, 'a');           //2. Open the /resources/messages.txt file for appending (use fopen);
        flock($file_handle, LOCK_EX);                   //3. Lock the file for writing (use flock);
        fwrite($file_handle, "$message \n");            //4. write contents of $message and concatenate with a \n (use fwrite).
        flock($file_handle, LOCK_UN);                   //to not have it locked permately
        fclose($file_handle);                           //5. Close the file handler (use fclose)
    }
}