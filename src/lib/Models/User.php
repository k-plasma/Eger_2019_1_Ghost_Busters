<?php //namespace Models;
include_once "AModel.php";
include_once "../Data/database_conn.php";

/**
 * User model.
 */
class User extends AModel
{
    static public function init()
    {
        self::$dbConnection = getConnection();
    }

    public $username = null;
    public $password = null;

    static public function Create(string $username, string $password) : User
    {
        $dbConnection = getConnection();
        $temp = new self();
        $temp->username = $username;
        $temp->password = $password;
        try {
            $query = $dbConnection->prepare("INSERT INTO Users(username, password) VALUES (?, ?)");
            $query->bindParam(1, $temp->username, PDO::PARAM_STR);
            $query->bindParam(2, $temp->password, PDO::PARAM_STR);
            $query->execute();
        } catch (PDOException $e){
            print "Failed to add a new user: ".$e->getMessage()."\n";
        }

        return $temp;
    }

    static public function Read(string $username) : bool
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("SELECT * FROM Users WHERE username = ?");
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            $num_rows = $query->rowCount();
        } catch (PDOException $e){
            print "Failed to retrieve user data: ".$e->getMessage()."\n";
        }

        if (!$num_rows) {
            return false;
        } else {
            return true;
        }
    //    return new self();
    }

    static public function Update_password(string $username, string $password) : bool
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("UPDATE Users set password = ? WHERE username = ?");
            $query->bindParam(1, $password, PDO::PARAM_STR);
            $query->bindParam(2, $username, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e){
            print "Failed to update user's password: ".$e->getMessage()."\n";
            return false;
        }
    }

    static public function Delete($user) : bool
    {
        $dbConnection = getConnection();
        try {
            $query = $dbConnection->prepare("DELETE FROM Users WHERE username = ?");
            $query->bindParam(1, $username, PDO::PARAM_STR);
            $query->execute();
            return true;
        } catch (PDOException $e){
            print "Failed to delete user: ".$e->getMessage()."\n";
            return false;
        }
    }
}



//_____________TESTING CODE___________________
//$user = new User();
//$user->Create("CuteCat", "Cat'sPass");   

/*if ($user->Read("CuteCat")){     
    print "User exists\n";
} else {
    print "User does not exist\n";
}


if ($user->Update_password("CuteCat", "MyCutePass")){   
    print "Password changed\n";
} else {
    print "Password was not changed\n";
}

if ($user->Delete("CuteCat")){   
    print "User was deleted\n";
} else {
    print "User was not deleted\n";
}*/
