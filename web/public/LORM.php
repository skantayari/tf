<?php require_once 'config/db.php'; ?>
<?php 
    
session_start();

	include("controllers/functions.php");

	$user_data = check_login($con);

?>


<!DOCTYPE php>
<html lang="en">
<head>
    <link rel="icon" href="/img/p.png">

    <title>Generate terraform variables file </title>
    <link rel="stylesheet" href="css/default.css" id="theme-color">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Inter UI font-->
    <link href="https://rsms.me/inter/inter-ui.css" rel="stylesheet">
    <!--vendors styles-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
          body {font-family: Arial, Helvetica, sans-serif;}
        * {
           /* box-sizing: border-box;*/
           border-radius: 20px;
        }

    	#content {
            padding: 10px;
            background: linear-gradient(to bottom left, #3333cc 0%, #cc0099 100%);
            overflow: hidden;
        }




    	input[type=text], textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=button]{ 
            width: auto;
            float: right;
            cursor: pointer;
            padding: 7px;
        }
        #p2{
             display:inline;
        }
        .row {
            float: center;
            padding: 210px;
            display: flex;
        }

            /* Create three equal columns that sits next to each other */
        .column {
            flex: 33.33%;
            padding: 2px;
        }
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .button {
            border-radius: 20px;
            background-color: #f4511e;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 28px;
            padding: 25px;
            width: 400px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
        }

        .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        }

        .button span:after {
            content: '\00bb';
            position: absolute;
            opacity: 0;
            top: 0;
            right: -50px;
            transition: 0.2s;
        }    

        .button:hover span {
        padding-right: 50px;
        }

        .button:hover span:after {
        opacity: 1;
        right: 0;
        }

        .button:hover {background-color: #3e8e41}

        .button:active {
        background-color: #3e8e41;
        box-shadow: 0 5px #666;
        transform: translateY(4px);
        }

        .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        }

        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        .closebtn:hover {
        color: black;
        }

    </style>
</head>
<body>
<!-- <nav>
    <ul>
    </br>
      <a href="contact.html" class="button"><span> Massive creation</span></a>

    </ul>
  </nav>-->

<section>
   <div class="container-fluid" style="background-color: #120024">
        <nav class="navbar navbar-expand-md navbar-dark">
        <a class="navbar-brand heading-black" href="index.php">
                ADACTIM
            </a>
            <button class="navbar-toggler navbar-toggler-right border-0" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" >Welcome, <?php echo $user_data['username']; ?></a>
                    </li>
                </ul>    
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <br>

        <div class="row">
                <div class="column">
                <a href="light.php">
                <button class="btn btn-primary  center " id="bt" style="width:70%;height:100"><span>Light Ressource Creation</span></button>
                <br>
                </a>
                </div>
                
                <div class="column">
                <a href="massive.php">
                <button class="btn btn-primary  center " id="bt" style="width:70%;height:100"><span> Massive Ressource Creation</span></button>
                <br> 
                </a>
                </div>
            </div>  
    </div>

    
</section> 


</body>

</html>