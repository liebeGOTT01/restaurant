<?php
class ResPOS
{
    private $server = "mysql:host=localhost;dbname=restaurant_pos";
    private $user = "root";
    private $pass = "";
    private $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );
    protected $connection;
    public function openConnection()
    {
        try {
            $this->connection = new PDO(
                $this->server,
                $this->user,
                $this->pass,
                $this->options
            );
            // echo "connected successfully! ";
            return $this->connection;
        } catch (PDOException $error) {
            echo "Error connection: " . $error->getMessage();
        }
    }
    public function closeConnection(){
        $this->connection = null;
    }

    public function getUsers()
    {
        $connection = $this->openConnection();
        $statement = $connection->prepare("SELECT * FROM user_table");
        $statement->execute();
        $users = $statement->fetchAll();
        $usersCount = $statement->rowCount();

        if ($usersCount > 0) {
            return $users;
        } else {
            return 0;
        }
    } //end get users

    public function login(){
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $connection = $this->openConnection();
            $statement = $connection->prepare("SELECT * FROM user_table WHERE username=? AND password=?");
            $statement->execute([$username, $password]);
            $user = $statement->fetch();
            $total = $statement->rowCount();

            if ($total > 0) {
                $_SESSION['username'] = $username;
                header("Location: try.php");
            } else {
                echo "login failed!";
            }
        }
    }


    public function getCategory(){
        $connection = $this->openConnection();
        $statement = $connection->prepare("SELECT * FROM category_table");
        $statement->execute();
        $category = $statement->fetchAll();
        $categoryCount = $statement->rowCount();

        if ($categoryCount > 0) {
            return $category;
        } else {
            return 0;
        }
    }

    
    public function save_category(){
		extract($_POST);
		$data = " name = '$name' ";
		if(empty($id)){
			$save = $this->db->query("INSERT INTO category_list set ".$data);
		}else{
			$save = $this->db->query("UPDATE category_list set ".$data." where category_id=".$id);
		}
		if($save)
			return 1;
    }
    
    
	public function delete_category(){
		extract($_POST);
		$delete = $this->db->query("DELETE FROM category_list where id = ".$id);
		if($delete)
			return 1;
	}

}

$res_pos = new ResPOS();

?>