<?php

namespace App\Tests;

use \PHPUnit\Framework\TestCase;
use \App\Controller\User as UserController;

class UserTest extends TestCase {

    private $userController;

    /**
     * @before
     */
    public function setUp(): void {
        $this->userController = new UserController();
    }

    public function testInstance(): void {

        $userController = new UserController();
        $this->assertInstanceOf('App\Controller\User', $userController);
    }

    public function testCreateUser(): void {

        $userController = new UserController();

        $userController->userData['name'] = 'Paula Simone dos Santos';
        $userController->userData['email'] = 'paulasimne@gmail.com';
        $userController->userData['birthday'] = '1986-09-14';
        $userController->userData['gender'] = 'Fem';

        $res = $userController->CreateUser();

        $this->assertEquals($res, true, "Passed");

    }

    public function testListUser() {

        $res = $this->userController->ListUsers();

        $this->assertNotFalse($res, "Passed");

    }

    public function testDeleteUser() {

        $this->userController->userData['id'] = '9';
        $res = $this->userController->DeleteUser();

        $this->assertEquals($res, true, "Passed");
    }

    public function testUpdateUser() {

        $this->userController->userData['id'] = '4';
        $this->userController->userData['name'] = 'Paula Simone dos Santos';
        $this->userController->userData['email'] = 'paulasimne@gmail.com';
        $this->userController->userData['birthday'] = '1986-09-14';
        $this->userController->userData['gender'] = 'F';

        $res = $this->userController->UpdateUser();

        $this->assertEquals($res, true, "Passed");
    }

    public function testViewUser() {

        $this->userController->userData['id'] = '4';
        $res = $this->userController->ListUsers();

        $this->assertNotFalse($res, "Passed");
    }
}