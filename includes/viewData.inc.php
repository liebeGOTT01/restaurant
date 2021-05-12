<?php

class ViewData extends Data{
    public function showAllUsers()
    {
        $data = $this->getAllUsers();
        foreach ($data as $data) {
            echo $data['uid'] . "<br>";
            echo $data['pwd'] . "<br>";
        }
    }

    public function showCategory(){
        $data = $this->getCategory();
        foreach ($data as $catData) {
            echo $catData['uid'] . "<br>";
            echo $catData['pwd'] . "<br>";
        }
    }
}

?>