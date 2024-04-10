<?php

class Database
{
    // $dsn - Database Network
    private $dsn = "mysql:host=localhost; dbname=oop_crud";
    private $user = "root";
    private $password = "";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    // Insert user
    public function insert($fname, $lname, $email, $phone)
    {
        // Insert User Input
        $sql = "INSERT INTO users (first_name, last_name, email, phone) 
            VALUES (:fname,:lname,:email,:phone)";

        $stmt = $this->conn->prepare($sql);
        $success = $stmt->execute(
            [
                'fname' => $fname,
                'lname' => $lname,
                'email' => $email,
                'phone' => $phone
            ]
        );
        if ($success) {
            return true;
        } else {
            return false;
        }
    }

    public function read()
    {
        // Select data from database
        $data = array();
        $getUser = "SELECT * FROM users";
        $stmt = $this->conn->prepare($getUser);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }

    public function getUserById($id)
    {
        // User user by id
        $get_user_by_id = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($get_user_by_id);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $fname, $lname, $email, $phone)
    {
        // Update User
        $updateUser = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($updateUser);
        $stmt->execute(['fname' => $fname, "lname" => $lname, 'email' => $email, 'phone' => $phone, 'id' => $id]);
        return true;
    }

    public function deleteUser($id)
    {
        $delete = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($delete);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function totalRowCount()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $t_rows = $stmt->rowCount();

        return $t_rows;
    }
}
