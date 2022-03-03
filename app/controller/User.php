<?php

namespace App\Controller;

use \App\Model\User as userModel;
use \App\Controller\RestController;

class User extends RestController {

    public $userData;

    /**
     * Method executed when receiving a GET request
     * @return json_encode
     */
    public function _GET() {

        if(isset($_GET['id'])) {
            $this->userData['id'] = $_GET['id'];
            $res = $this->ViewUser();
        } else {
            $res = $this->ListUsers();
        }

        if($res->num_rows > 0) {

            $users = array();
            $users['data'] = array();

            while($row = $res->fetch_assoc()) {
                extract($row);

                $user = array(
                    'id' => $id,
                    'name' => $name,
                    'email' => $email,
                    'birthday' => $birthday,
                    'gender' => $gender,
                );

                array_push($users['data'], $user);
            }

            echo json_encode($users);

        } else {
            echo json_encode(
                array('message' => 'No Users Found')
            );
        }
    }
    
    /**
     * Method executed when receiving a POST request
     * @return json_encode
     */
    public function _POST() {
        $this->userData = json_decode(file_get_contents('php://input'), true);

        if($this->CreateUser()) {
            echo json_encode(
                array('message' => 'User created')
            );
        } else {
            echo json_encode(
                array('message' => 'User not created')
            );
        }
    }

    /**
     * Method executed when receiving a PUT request
     * @return json_encode
     */
    public function _PUT() {
        $this->userData = json_decode(file_get_contents('php://input'), true);
        
        if($this->UpdateUser()) {
            echo json_encode(
                array('message' => 'User updated')
            );
        } else {
            echo json_encode(
                array('message' => 'User not updated')
            );
        }
    }

    /**
     * Method executed when receiving a DELETE request
     * @return json_encode
     */
    public function _DELETE() {
        $this->userData = json_decode(file_get_contents('php://input'), true);

        if($this->DeleteUser()) {
            echo json_encode(
                array('message' => 'User deleted')
            );
        } else {
            echo json_encode(
                array('message' => 'User not deleted')
            );
        }
    }

    /**
     * @return bool For successful returns true, and returns false on failure
     * Create a user based on information into $this->userData
     */
    public function CreateUser() {

        $userModel = new userModel();
        $userModel->name = $this->userData['name'];
        $userModel->email = $this->userData['email'];
        $userModel->birthday = $this->userData['birthday'];
        $userModel->gender = $this->userData['gender'];
        
        $res = $userModel->CreateUser();

        if($res !==false)
            return true;
        else
            return false;
    }

    /**
     * @return object For successful returns a mysqli_result object, and returns false on failure.
     * List all users on the table Users
     */
    public function ListUsers() {
        $userModel = new userModel();
        $res = $userModel->ListUsers();

        if($res !==false)
            return $res;
        else
            return false;
    }

    /**
     * @return bool For successful returns true, and returns false on failure
     * Delete a user based on id informed to $this->userData['id']
     */
    public function DeleteUser() {

        $userModel = new userModel();
        $userModel->id = $this->userData['id'];
        $res = $userModel->DeleteUser();

        if($res !==false)
            return true;
        else
            return false;
    }

    /**
     * @return bool For successful returns true, and returns false on failure
     * Update a user based on information into $this->userData
     */
    public function UpdateUser() {

        $userModel = new userModel();
        $userModel->id = $this->userData['id'];
        $userModel->name = $this->userData['name'];
        $userModel->email = $this->userData['email'];
        $userModel->birthday = $this->userData['birthday'];
        $userModel->gender = $this->userData['gender'];
        $res = $userModel->UpdateUser();

        if($res !==false)
            return true;
        else
            return false;
    }

    /**
     * @return object For successful returns a mysqli_result object, and returns false on failure.
     * Returns one user data based on id informed to $this->userData['id']
     */
    public function ViewUser() {

        $userModel = new userModel();
        $userModel->id = $this->userData['id'];
        $res = $userModel->ViewUser();
        
        if($res !==false)
            return $res;
        else
            return false;
    }
}