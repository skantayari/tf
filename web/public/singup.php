<?php require_once 'controllers/auth.php'; ?>

<!doctype php>
<html lang="en">
<head>
    <link rel="icon" href="/img/p.png">

    <title>SIGN UP </title>
    <!-- Bootstrap CSS / Color Scheme -->
    <link rel="stylesheet" href="css/default.css" id="theme-color">
    <style>
            #content {
            padding: 10px;
            background: linear-gradient(to bottom left, #3333cc 0%, #cc0099 100%);
            overflow: hidden;
        }
    </style>
</head>
<body>

    <section class="smart-scroll">
        <div class="container-fluid">
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
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="singup.php">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="login.php">Sign in</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </section>
    
<section class="py-7 py-md-0 bg-hero" id="content">
    <div class="container">
       <form action="singup.php" method="post" > 
            <div class="row vh-md-100">
                <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">

                    <?php if(count($errors) > 0 ): ?>
                    <div style=" margin-left: auto;margin-right: auto;width: 30%;">
                        <div class="alert alert-danger" style="width:220px;">
                        <?php foreach($errors as $errors) : ?>
                            <li> <?php echo $errors; ?> </li>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                
                    <h1 class="heading-black text-capitalize">SIGN UP</h1> <br>
                    <input id="text" type="text" name="user_name" placeholder="User name"><br><br>
                    <input id="text" type="mail" name="email" placeholder="Email"><br><br>
                    <input id="text" type="password" name="password" placeholder="Password"><br><br>                
                    <input id="text" type="password" name="passwordconf" placeholder="Confirm your password"><br><br>
                    <button type="submit" name="singup_btn" class="btn btn-primary d-inline-flex flex-row align-items-center">
                        Sign up
                        <em class="ml-2" data-feather="arrow-right"></em>
                    </button> 
                    <br> <br> <br>
                    <h3 style="text-align:center"> already a member ? <a href="login.php"> Sign In </a></h3>

                </div>
            </div>
        </form>
    </div>
</section>

</body>
</html>