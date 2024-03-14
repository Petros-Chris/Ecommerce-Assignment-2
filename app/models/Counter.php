<?php
class Counter {
    public $count;

    public function __construct() {
        $filename = "resources/counter.txt";

        if(file_exists($filename) && filesize($filename) != 0) { //1. If the /resources/counter.txt file exists (use the file_exists function)
            $file_handle = fopen($filename, 'r');                //a. Open it for reading (use fopen);
            flock($file_handle, LOCK_EX);                        //b. Lock the file (use flock);
            $count = fread($file_handle, filesize($filename));   //c. read the file into the $count variable;
            flock($file_handle, LOCK_UN);                        //unlock so it isent closed permately
            fclose($file_handle);                                //d. Close the file (use fclose);
        }
        else {                                                   //2. Else
            $count = '{"count":0}';                              //a. Set the $count variable to '{"count":0}'; what a strange way to say 0
        }
        $object = json_decode($count);  //3. Decode the JSON in $count and copy the resulting object’s count property to this object’s count property.
        $this->count = $object->count;
    }

    //The increment method adds 1 to this object’s count property.
    public function increment() {
        $this -> count++;
    }

    public function write() {
        $filename = "resources/counter.txt";
        $file_contents = file($filename);               //to read all of the current contents in the file 

        $count = json_encode($this);                    //1. json_encode this object into $count;
        $file_handle = fopen($filename, 'w');           //2. Open the counter.txt file for writing (use fopen);
        flock($file_handle, LOCK_EX);                   //3. Lock the file for writing (use flock);
        fwrite($file_handle, $count);                   //4. Overwrite the file contents with $count (use fwrite).
        flock($file_handle, LOCK_UN);                   //to not have it locked permately
        fclose($file_handle);                           //5. Close the file (use fclose)
    }

    //The __toString method returns the json-encoded value of this object.
    public function __toString() {
        $jsonValue = json_encode($this);
        return $jsonValue;
    }
}