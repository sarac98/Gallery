<?php

class Comment extends Db_Object{

protected static $db_table = "comments";
protected static $db_table_fields = array('photo_id','author','body');
public $id;
public $photo_id;
public $author;
public $body;


public static function Create_Comment($photo_id,$author="John",$body=""){
    if(!empty($photo_id) && !empty($author) && !empty($body)){

        $comment = new Comment();
        $comment->photo_id = (int)$photo_id;
        $comment->author = $author;
        $comment->body = $body;


        return $comment;
    }
    else return false;
}


public static function Find_Comments($photo_id=0){

$sql = " SELECT * FROM ". self::$db_table;
$sql.=" WHERE photo_id= ".$photo_id;
$sql.=" ORDER BY photo_id ASC";

return self::Find_By_Query($sql);

}




    
}








