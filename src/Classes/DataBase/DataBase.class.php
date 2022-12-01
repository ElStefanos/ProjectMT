<?php
    namespace DataBase;

    use mysqli;

    class DataBase {
        private string $hostname;
        private string $dbName;
        private string $username;
        private string $password;
        private $connect;

    public function __construct()
    {
        $this->hostname = "127.0.0.1";
        $this->dbName = "ProjectMT";
        $this->username = "root";
        $this->password = "Hektor011!";
    }

    public function dbConnect() 
    {
        $this->connect = new mysqli($this->hostname, $this->username, $this->password, $this->dbName);
        return $this->connect;
    }



}

?>

