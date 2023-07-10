<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						
						header("Location: HCF_Calculator.html");
						die;
					}
				}
			}
			
		}
		else
		{
			$a=2;
		
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<h1> Login Page!</h1>
</head>
<body>

	<style type="text/css">

		body{
			background-color: aquamarine;
		}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	.pop {
        width:200px;
        height: 200px;
        background:rgb(250, 106, 4);
        border-radius: 2px;
        position: absolute;
        top:0;
        left: 50%;
        transform: translate(-50%,-50%)scale(0.1); 
        text-align: center;
        padding:0 7px 7px ;
        color: #333;
        visibility: hidden;
        transition: transform 0.3s, top 0.3s;
        }
        .open-pop{
            visibility: visible;
            top:30%;
            transform: translate(-50%,-50%)scale(1); 
        }
      .pop img{
        width: 100px;
        margin-top: -50px;
        box-shadow:0.2px 5px rgba(0,0,0,0.2);
      }
      .pop h2{
        font-size: 38px;
        font-weight: 500;
        margin:30px 0 10px;
        color: #d5d8d8;
      }
      .pop p{
        color: #eee;
      }
      .pop button{
        width: 80%;
        margin-top: -2px;
        padding: 10px 0;
        background: hsl(128, 66%, 43%);
        color: rgb(229, 239, 244);
        border: 0;
        outline: none;
        font-size: 18px;
        border-radius: 4px;
        cursor: pointer;
        box-shadow: 0 5px 5px rgba(0,0,0,0.2);
}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" onclick="f1()" value="Login"><br><br>

			<a href="signup.php">Click to Signup</a><br><br>
		</form>
		
	</div>
	<div class="pop" id="pop">
        <img src="abcd.png">
        <h3>THANK YOU!</h3>
        <P>Calculated succesfully the required result has shown</P>
        <button onclick="closepop()">OK</button>
      
    </div>
	<script>{
		function f1(){
		
		
			pop.classList.add("open-pop");
		}
		function closepop(){
          pop.classList.remove("open-pop");
        }}
	</script>
</body>
</html>