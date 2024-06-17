<?php 
    include ("incl/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header_content">
                <div class="header_logo">
                    <img src="image/Logo.png" alt="logo" class="header_img">
                </div>
                <nav>
                    <ul class="header_ul">
                        <li class="header_li"><a href="" class="header_a">Главная</a></li>
                        <li class="header_li"><a href="" class="header_a">Запись</a></li>
                        <li class="header_li"><a href="" class="header_a">Контанкты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    

    <?php 
        if(isset($_SESSION['uid'])){
            echo '<script>document.location.href="admin.php"</script>';
        }else{
    ?>

    <?php 
        if(!isset($_SESSION['uid'])){
            if(isset($_POST['join'])){
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $pass1_md5 = md5($pass);

                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = $connect -> query($sql);
                $user_email = $result -> fetch();

                if(empty($email)){
                    $error_email = 'не правильная почта';
                }elseif(empty($user_email)){
                    $error = 'нет прав администратора';
                }elseif(empty($pass)){
                    $error_pass1 = 'не верный пароль';
                }elseif($user_email['pass'] != $pass1_md5){
                    $error_pass1 = 'не верный пароль';
                }else{
                    $_SESSION['uid'] = $user_email['id'];

                    if($user_email['role'] == 1){
                        echo '<script>document.location.href="admin.php"</script>';
                    }
                }
            }
        }


    }
    ?>
    <main>
        <section class="sign">
            <div class="container">
                <div class="sign_content">
                    <div class="sign_top">
                        <div class="contacts_top">
                            <div class="top_h3">Вход в панель управления сайтом</div>
                        </div>
                    </div>
                    <form class="sign_wrapp" method="POST" name="join">
                        <div  class="sign_form">
                            <input type="text" placeholder="почта" class="sign_input" name="email">
                            <i><?php if(isset($error_email)){echo $error_email;}?></i>
                            <input type="password" placeholder="пароль" class="sign_input" name="pass">
                            <i><?php if(isset($error_pass1)){echo $error_pass1;}?></i>
                            <a href="admin.php"><input type="submit" value="Вход" class="sign_sub" name="join"></a>
                            <i><?php if(isset($error)){echo $error;}?></i>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</body>
</html>