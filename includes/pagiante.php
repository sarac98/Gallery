<?php

class Paginate{

public $current_page;
public $items_per_page;
public $total_count;


public function __construct($current_page=1,$items_per_page=4,$total_count=0)
{
$this->page = (int)$page;
$this->items_per_page = (int)$items_per_page;
$this->total_count = (int)$total_count;
}

public function Next(){
    return $this->current_page+1;
}
public function Previous(){
    return $this->current_page-1;
}

public function Page_Total(){

    return ceil($this->total_count/$this->items_per_page);
}

public function Has_Previous(){

return $this->Previous() >= 1 ? true : false;
}
public function Has_Next(){

    return $this->Next() <= $this->Page_Total() ? true : false;
    }

public function OffSet(){

    return ($this->current_page -1) * $this->items_per_page;
}

}







?>