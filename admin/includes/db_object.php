<?php

class Db_Object{ 
protected static $db_table = "users";





public static function Find_All(){

return static::Find_By_Query("SELECT * FROM ". static::$db_table. " ");
        
}
        
        
public static function Find_By_Id($id){ 
global $database;
            
$the_result_array=static::Find_By_Query("SELECT * FROM ".static::$db_table. " WHERE id=$id LIMIT 1");
          
return !empty($the_result_array) ? array_shift($the_result_array) : false;
        
}

public static function Find_By_Query($sql){
global $database;
$result_set = $database->query($sql);
$the_object_array = array();

while($row=mysqli_fetch_array($result_set))
{
    $the_object_array[] = static::Instantation($row);
}

return $the_object_array;

}
public static function Instantation($found_user)
{ 
    $calling_class= get_called_class();
    $objekat= new $calling_class;

    foreach($found_user as $key => $value){
       
        if($objekat->Has_The_Attribute($key)){
         $objekat->$key=$value;
        }

    }
    return $objekat;
}

private function Has_The_Attribute($atribut){

    $object_properties = get_object_vars($this);
    return array_key_exists($atribut,$object_properties);
 
 }
 protected function Properties(){
    // return get_object_vars($this);
    $properties = array();
 
    foreach(static::$db_table_fields as $db_field){
        if(property_exists($this,$db_field)){
            $properties[$db_field] = $this->$db_field;
        }
    }
    return $properties;
 }

 protected function Clean_Properties(){
  global $database;
    
  $clean_properties = array();
    
   foreach($this->Properties() as $key => $value){

    $clean_properties[$key] = $database->escape_string($value);
    
    }
    return $clean_properties;
}


 public function Save() {

    return isset($this->id) ? $this->Update() : $this->Create();
    }
    
    
    public function Create(){
    
    global $database;
    
    $properties = $this->Clean_Properties();
    
    $sql = "INSERT INTO " .static::$db_table. "(". implode(",",array_keys($properties)).")";
    $sql .= "VALUE ('". implode("','",array_values($properties))  ."')";
    
    
    if($database->query($sql)){
    
        $this->id = $database->Insert_Id();
        return true;
    }
    else return false;
    }
    
    
    public function Update(){
    
    global $database;
    $properties = $this->Clean_Properties();
    $properties_pairs = array();
    
    foreach($properties as $key => $value){
        $properties_pairs[] = "{$key}='{$value}'";
    
    }
    
    
    $sql = "UPDATE " .static::$db_table. " SET ";
    $sql .= implode(", ",$properties_pairs);
    
    $sql .=" WHERE id= " . $database->escape_string($this->id);
    
    
    $database->query($sql);
    
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    
    }
    
    public function Delete(){
    
    global $database;
    
    $sql = "DELETE FROM " .static::$db_table ." WHERE id=".$database->escape_string($this->id);
    
    
    $database->query($sql);
    
    return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    
    }

    public function Set_File($file){

        if(empty($file) || !$file || !is_array($file)){
        $this->errors[] = "There was no file uploaded here";
        return false;
        
        }elseif($file['error'] !=0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }
        else {
        $this->user_image = basename($file['name']);
        $this->tmp_path = $file['tmp_name'];
        $this->type = $file['type'];
        $this->size = $file['size'];
        }
            
        }

        public static function Count_All(){
            global $database;
            $sql="SELECT COUNT(*) FROM ".static::$db_table;
            $result_set = $database->query($sql);
            $row = mysqli_fetch_array($result_set);

            return array_shift($row);
        }

    





}


?>