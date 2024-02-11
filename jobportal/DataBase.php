<?php
require "DataBaseConfig.php";

class DataBase
{
    public $connect;
    public $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $dbc = new DataBaseConfig();
        $this->servername = $dbc->servername;
        $this->username = $dbc->username;
        $this->password = $dbc->password;
        $this->databasename = $dbc->databasename;
    }

    function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        return $this->connect;
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

  
    function logIn($table, $idno, $password)
    {
        $idno = $this->prepareData($idno);
        $password = $this->prepareData($password);
        $this->sql = "select * from " . $table . " where idno = '" . $idno . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $dbidno = $row['idno'];
            $dbpassword = $row['password'];
            if ($dbidno == $idno && $dbpassword == $password) {
                $login = true;
            } else $login = false;
        } else $login = false;

        return $login;
    }

  


     public function getUserByUsername($idno){
            $stmt = $this->connect->prepare("SELECT * FROM graduated INNER JOIN employment ON graduated.idno = employment.idno where graduated.idno = ?");
            $stmt->bind_param("s",$idno);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }



        
        public function getRequest($username){
            $stmt = $this->connect->prepare("SELECT * FROM request WHERE username = ?");
            $stmt->bind_param("s",$username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }
     function update($table,$idno,$postgraduate,$postgraduatey1,$postgraduatey2)
    {
        $idno = $this->prepareData($idno);
        $postgraduate = $this->prepareData($postgraduate);
        $postgraduatey1 = $this->prepareData($postgraduatey1);
        $postgraduatey2 = $this->prepareData($postgraduatey2);
        $this->sql =
            "UPDATE " . $table . "set postgraduate ='".$postgraduate."' ,  postgraduatey1 ='".$postgraduatey1."',  postgraduatey2 ='".$postgraduatey2."' where idno = '".$idno."' ";
        if (mysqli_query($this->connect, $this->sql)) {
            return true;
        } else return false;
    }    


}

?>