# RestFul API

This is a Restful API application written to work on PHP >= 7.0 and utilizes PHPUnit for test proposals.

The application executes the CRUD opperation for User Model having as properties: Name, Email, Birthday and Gender.

On db folder you will find the SQL code to create the table.

In order to execute the application you should call: log/app/api/user.php

When you want to:
Return all users: call GET method without any parameters 
Return one user: call GET passing the id
Create a user: call POST method informing name, email, birthday and gender
Update a user: call PUT method informing id, name, email, birthday and gender
Delete a user: call DELETE method informing id

In order to run tests you must execute the file: \testes\UserTest.php assuming you have PHPUnit running.
There are currently 6 tests on this file.