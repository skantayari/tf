<?php 

session_start();

	include("functions.php");
    require 'config/db.php';
    $errors = array();



if (isset($_POST['singin_btn'])){
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    if (empty($username)) {
        $errors['user_name'] = "User name required";
    }
    if (empty($password)) {
        $errors['password'] = "Password required";
    }


    if( count($errors) === 0) { 

			//read from database
			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['id'] = $user_data['id'];
						header("Location: LORM.php");
						die;
					}
				}
			}
			
			$errors['password'] = "wrong username or password!";
		}else
		{
			$errors['password'] = "wrong username or password!";
		}
	}

