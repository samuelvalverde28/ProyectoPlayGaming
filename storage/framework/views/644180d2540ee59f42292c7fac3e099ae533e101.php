<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="shortcut icon" href="../resources/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="../resources/img/favicon.ico" type="image/x-icon">

        <title>Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                top: 0px;
                width: 100%;
                
                
                padding: 1%;
                background-color: rgba(72, 196, 196, 1);
                box-shadow: inset 0 -3px 1px 0 rgba(1,41,53,0.75);
                display: flex;
                justify-content: flex-end;
                align-items: center;
                box-sizing: border-box;
                
            }

            .content {
                
                background-image: url("../resources/img/logoPlaygaming.jpg");
                width: 100%;
                height: 100%;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                background-color: rgba(1, 41, 53, 1);
            }

            .title {
                font-size: 84px;
            }

            
            .links > a {
                /* color: #fff; */
                padding: 8px 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .login{
                color: rgb(229, 255, 252);
            }

            .login:hover{
                color: rgb(2, 49, 67);
                /* background-color: orange;
                border-radius: 50px; */
                box-shadow: 0px 15px 0px -10px rgb(254, 130, 40);
            }

            .register{
                color: rgb(2, 49, 67);
                background-color: rgb(229, 255, 252);
                border-radius: 50px;
                padding: 1%;
            }

            .home{
                color: rgb(2, 49, 67);
                background-color: rgb(229, 255, 252);
                border-radius: 50px;
                padding: 1%;
            }


        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a class="home" href="<?php echo e(url('/home')); ?>">Inicio</a>
                    <?php else: ?>
                        <a class="login" href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a class="register" href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                

                
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\playgaming\resources\views/welcome.blade.php ENDPATH**/ ?>