<?php
    include_once('../includes/session.php');
    include_once('../database/db_checkUser.php');

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Don't allow certain characters
    if ( !preg_match ("/^[a-zA-Z0-9]+$/", $username)) {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username can only contain letters and numbers!');
        die(header('Location: ../pages/signup.php'));
    }

    try{
        insertUser($username, $email, $password);
        $_SESSION['username'] = $username;
        $_SESSION['messages'][] = array('type' => 'success', 'content' => 'Signed up and logged in!');
        header('Location: ../pages/initialPage.php');
    }
    catch(PDOException $e)
    {
        $_SESSION['messages'][] = array('type' => 'error', 'content' => 'Username already taken!');
        header('Location: ../pages/signup.php');
    } 
?>