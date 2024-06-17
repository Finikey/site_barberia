<?php 
    include('incl/connect.php');
?>

<?php
    if(!isset($_SESSION['uid'])){
        echo '<script>document.location.href="sign.php"</script>';
    }else{
?>


<?php
        if(isset($_SESSION['uid'])){
                $session_uid = $_SESSION['uid'];
                $sql = "SELECT * FROM `users` WHERE id = $session_uid";
                $result = $connect -> query($sql);
                $users = $result -> fetch();
            }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wdth,wght@0,62..125,600;1,62..125,600&display=swap" rel="stylesheet">
    <title>Barberia</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header_content">
                <a href="index.php"><div class="header_logo">
                    <img src="image/Logo.png" alt="logo" class="header_img">
                </div></a>
                <nav>
                    <ul class="header_ul">
                        <!-- <li class="header_li"><a href="" class="header_a">Главная</a></li>
                        <li class="header_li"><a href="" class="header_a">Запись</a></li> -->
                        <li class="header_li"><a href="?do=exit" class="header_a">Выйти</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <section class="work">
            <div class="container">
                <div class="work_content">
                <div class="work_top">
                <h3 class="top_h3">Новые записи</h3>
                <form action="" method="get">
                    <?php
                    $sql_barbers = "SELECT DISTINCT `barber` FROM `appointments`";
                    $result_barbers = $connect->query($sql_barbers);
                    ?>
                    <select name="barber" class="barber">
                        <option value="">Выберите барбера</option>
                        <?php foreach ($result_barbers as $barber) { ?>
                            <option value="<?=$barber['barber']?>"><?=$barber['barber']?></option>
                        <?php } ?>
                    </select>
                    <button type="submit" class="subm">Фильтровать</button>
                </form>
            </div>
                    <div class="work_wrapper">
                    <?php
                $barber = $_GET['barber'] ?? '';
                $sql = "SELECT * FROM `appointments`";
                if (!empty($barber)) {
                    $sql .= " WHERE `barber` = '$barber'";
                }
                $sql .= " ORDER BY id DESC";
                $result = $connect->query($sql);
                foreach ($result as $app) {
                ?>
                        <div class="work_wrapp">
                            <div class="wrap_text">
                                <p class="wr_p">Имя:</p>
                                <p class="wr_pp"><?=$app['first_name']?></p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Телеграмм:</p>
                                <a href="https://t.me/<?=$app['username']?>"><p class="wr_pp"><?=$app['username']?></p></a>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Дата:</p>
                                <p class="wr_pp"><?=$app['date']?></p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Время:</p>
                                <p class="wr_pp"><?=$app['time']?></p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Мастер:</p>
                                <p class="wr_pp"><?=$app['barber']?></p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Вид услуги:</p>
                                <p class="wr_pp"><?=$app['haircut']?></p>
                            </div>
                            <div class="wrapp_btn">
                                <div class="wrap_btn1">
                                    <p class="btn_p">Принять</p>
                                </div>
                                <div class="wrap_btn2">
                                    <p class="btn_p">Отказать</p>
                                </div>
                            </div>  
                        </div>
                        <?}?>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- <section class="task">
            <div class="container">
                <div class="task_content">
                    <div class="work_top">
                        <h3 class="top_h3">В работе</h3>
                    </div>
                    <div class="work_wrapper">
                        <div class="work_wrapp">
                            <div class="wrap_text">
                                <p class="wr_p">Имя:</p>
                                <p class="wr_pp">Иван</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Дата:</p>
                                <p class="wr_pp"> 25.02.2024</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Время:</p>
                                <p class="wr_pp">15:20</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Мастер:</p>
                                <p class="wr_pp">Александр Ювелиров</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Вид услуги:</p>
                                <p class="wr_pp">Стрижка</p>
                            </div>
                            <div class="wrapp_btn">
                                <div class="wrap_btn3">
                                    <p class="btn_p">Завершить</p>
                                </div> 
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- <section class="completed">
            <div class="container">
                <div class="completed_content">
                    <div class="work_top">
                        <h3 class="top_h3">Завершенные</h3>
                    </div>
                    <div class="work_wrapper">
                        <div class="work_wrapp">
                            <div class="wrap_text">
                                <p class="wr_p">Имя:</p>
                                <p class="wr_pp">Иван</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Дата:</p>
                                <p class="wr_pp"> 25.02.2024</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Время:</p>
                                <p class="wr_pp">15:20</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Мастер:</p>
                                <p class="wr_pp">Александр Ювелиров</p>
                            </div>
                            <div class="wrap_text">
                                <p class="wr_p">Вид услуги:</p>
                                <p class="wr_pp">Стрижка</p>
                            </div>
                            <div class="wrapp_btn">
                                <div class="wrap_btn3">
                                    <p class="btn_p">Завершить</p>
                                </div> 
                            </div>  
                        </div>
                    </div>
                </div>
            </div> -->
            <?php 
            if(isset($_POST['ser_add'])){
                $name = $_POST['name'];
                $text = $_POST['text'];
                $price = $_POST['price'];
                $src = $_POST['img'];
                if(empty($name)){
                    $error = 'name';
                }
                if(empty($text)){
                    $error = 'text';
                }
                if(empty($price)){
                    $error = 'price';
                }
                if(empty($_FILES['img'])){
                    $error.='Добавьте изображение<br>';
                 }else{  $src = 'image/service/'.time().$_FILES['img']['name'];
                            // echo $src;
                            move_uploaded_file($_FILES['img']['tmp_name'],$src);
                        }
                if(empty($error)){
                    $sql = "INSERT INTO service (name,text,price,img) VALUES ('$name', '$text', '$price', '$src')";
                    $connect -> query($sql);
                    echo'<script>document.location.href="admin.php"</script>';
                }
            }
        ?>
        <section class="addfaq">
            <div class="container">
                <div class="addfaq_content">
                    <div class="work_top">
                        <h3 class="top_h3">Добавление услуг</h3>
                    </div>
                    <div class="addfaq_wrapper">
                        <form action="" class="ff" method="POST" name="ser_add"  enctype="multipart/form-data">
                            <div class="form_faq">
                                <input type="text" class="faq_input" placeholder="Название услуги" name="name">
                                <input type="text" class="faq_input" placeholder="Описание" name="text">
                                <input type="text" class="faq_input" placeholder="Цена" name="price">
                                <input type="file" id="images"  required name="img">
                            </div>
                            <div class="addfaq_inp">
                                <input type="submit" class="faq_place" value="Добавить" name="ser_add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="line"></div>
        </div>
        
        <section class="manag">
            <div class="container">
                <div class="manag_content">
                    <div class="work_top">
                        <h3 class="top_h3">Управление услугами</h3>
                    </div>
                    <div class="manag_wrapper">
                        <?php 
                            $sql = "SELECT * FROM `service`";
                            $result = $connect -> query($sql);
                            foreach($result as $ser){
                        ?>
                        <div class="wr_cont">
                            <div class="cont_text">
                                <p class="cont_name"><?=$ser['name']?></p>
                            </div>
                            <div class="cont_right">
                                <a href="edit_ser.php?id=<?=$ser['id']?>"><div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div></a>
                                <a href="delete_ser.php?id=<?=$ser['id']?>" onclick="return confirm('Уверены что хотите удалить?')">
                                <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53113 1C5.52364 1 3.19671 3.63591 3.56974 6.62017L5.28873 20.3721C5.47639 21.8734 6.7526 23 8.26557 23H15.7344C17.2474 23 18.5236 21.8734 18.7113 20.3721L20.4303 6.62017C20.8033 3.63591 18.4764 1 15.4689 1H8.53113ZM5.70148 5C6.11066 3.8455 7.21175 3 8.53113 3H15.4689C16.7883 3 17.8893 3.8455 18.2985 5H5.70148ZM5.63279 7L7.27329 20.124C7.33584 20.6245 7.76124 21 8.26557 21H15.7344C16.2388 21 16.6642 20.6245 16.7267 20.124L18.3672 7H5.63279Z" fill="#0F0F0F"/>
                                        <path d="M15.002 10.998C14.6114 10.6075 13.9783 10.6075 13.5878 10.998L12 12.5858L10.4201 11.0058C10.0296 10.6153 9.3964 10.6153 9.00587 11.0058C8.61535 11.3964 8.61535 12.0295 9.00587 12.4201L10.5858 14L9.00001 15.5858C8.60949 15.9763 8.60949 16.6095 9.00001 17C9.39054 17.3905 10.0237 17.3905 10.4142 17L12 15.4142L13.5878 17.0019C13.9783 17.3925 14.6114 17.3925 15.002 17.0019C15.3925 16.6114 15.3925 15.9782 15.002 15.5877L13.4142 14L15.002 12.4123C15.3925 12.0217 15.3925 11.3886 15.002 10.998Z" fill="#0F0F0F"/>
                                    </svg>
                                </div></a>
                            </div>
                        </div>
                        <?}?>
                        
                        
                    </div>
                </div>
            </div>
        </section>

        <?php 
            if(isset($_POST['add'])){
                $name = $_POST['name'];
                $text = $_POST['text'];

                if(empty($name)){
                    $error = 'name';
                }

                if(empty($text)){
                    $error = 'text';
                }

                if(empty($error)){
                    $sql = "INSERT INTO faq (name,text) VALUES ('$name', '$text')";
                    $connect -> query($sql);
                    echo'<script>document.location.href="admin.php"</script>';
                }
            }
        ?>
    <div class="container">
            <div class="line"></div>
        </div>
        <section class="addfaq">
            <div class="container">
                <div class="addfaq_content">
                    <div class="work_top">
                        <h3 class="top_h3">Добавление FAQ</h3>
                    </div>
                    <div class="addfaq_wrapper">
                        <form action="" class="ff" method="POST" name="add">
                            <div class="form_faq">
                                <input type="text" class="faq_input" placeholder="Вопрос" name="name">
                                <input type="text" class="faq_input" placeholder="Ответ" name="text">
                            </div>
                            <div class="addfaq_inp">
                                <input type="submit" class="faq_place" value="Добавить" name="add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal_window" id="modal_window">
        <div class="modal">
            <form action="" class="modal_form">
                <div class="butt">
                    <button class="modal_close" onclick="closeForm()">X</button>
                </div>
                <p>Registration</p>
                <label for="">name</label>
                <input type="text">
                <label for="">text</label>
                <input type="text">
                <label for="">pass</label>
                <input type="text">
                <input type="submit">
            </form>
        </div>
    </div>
    <div class="container">
            <div class="line"></div>
        </div>
        <section class="manag">
            <div class="container">
                <div class="manag_content">
                    <div class="work_top">
                        <h3 class="top_h3">Управление FAQ</h3>
                    </div>
                    <div class="manag_wrapper">
                        <?php 
                            $sql = "SELECT * FROM `faq`";
                            $result = $connect -> query($sql);
                            foreach($result as $faq){
                        ?>
                        <div class="wr_cont">
                            <div class="cont_text">
                                <p class="cont_name"><?=$faq['name']?></p>
                            </div>
                            <div class="cont_right">
                                <a href="edit_faq.php?id=<?=$faq['id']?>"><div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div></a>
                                <a href="delete_faq.php?id=<?=$faq['id']?>" onclick="return confirm('Уверены что хотите удалить?')">
                                <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53113 1C5.52364 1 3.19671 3.63591 3.56974 6.62017L5.28873 20.3721C5.47639 21.8734 6.7526 23 8.26557 23H15.7344C17.2474 23 18.5236 21.8734 18.7113 20.3721L20.4303 6.62017C20.8033 3.63591 18.4764 1 15.4689 1H8.53113ZM5.70148 5C6.11066 3.8455 7.21175 3 8.53113 3H15.4689C16.7883 3 17.8893 3.8455 18.2985 5H5.70148ZM5.63279 7L7.27329 20.124C7.33584 20.6245 7.76124 21 8.26557 21H15.7344C16.2388 21 16.6642 20.6245 16.7267 20.124L18.3672 7H5.63279Z" fill="#0F0F0F"/>
                                        <path d="M15.002 10.998C14.6114 10.6075 13.9783 10.6075 13.5878 10.998L12 12.5858L10.4201 11.0058C10.0296 10.6153 9.3964 10.6153 9.00587 11.0058C8.61535 11.3964 8.61535 12.0295 9.00587 12.4201L10.5858 14L9.00001 15.5858C8.60949 15.9763 8.60949 16.6095 9.00001 17C9.39054 17.3905 10.0237 17.3905 10.4142 17L12 15.4142L13.5878 17.0019C13.9783 17.3925 14.6114 17.3925 15.002 17.0019C15.3925 16.6114 15.3925 15.9782 15.002 15.5877L13.4142 14L15.002 12.4123C15.3925 12.0217 15.3925 11.3886 15.002 10.998Z" fill="#0F0F0F"/>
                                    </svg>
                                </div></a>
                            </div>
                        </div>
                        <?}?>
                        
                        
                    </div>
                </div>
            </div>
        </section>
        
        <?php 
            if(isset($_POST['add_img'])){
                $src = $_POST['img'];

                if(empty($_FILES['img'])){
                    $error.='Добавьте изображение<br>';
                 }else{  $src = 'image/'.time().$_FILES['img']['name'];
                            // echo $src;
                            move_uploaded_file($_FILES['img']['tmp_name'],$src);
                        }
                
                


                if(empty($error)){
                    $sql = "INSERT INTO image (img) VALUES ('$src')";
                    $connect -> query($sql);
                    echo'<script>document.location.href="admin.php"</script>';
                }
            }
        ?>
        <div class="container">
            <div class="line"></div>
        </div>
        <section class="addimg">
            <div class="container">
                <div class="addimg_content">
                    <div class="work_top">
                        <h3 class="top_h3">Добавление фото в слайдер</h3>
                    </div>
                    <div class="addimg_wrapp">
                        <form action="" method="POST" name="add_img" enctype="multipart/form-data">
                            <label for="images" class="drop-container" id="dropcontainer">
                                <span class="drop-title">Перенесите файл сюда</span>
                                
                                <input type="file" id="images"  required name="img">
                            </label>
                            <div class="addfaq_inp addimg_in">
                                <input type="submit" class="faq_place" value="Добавить" name="add_img">
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container">
            <div class="line"></div>
        </div>
        <section class="addimg">
            <div class="container">
                <div class="addimg_content">
                    <div class="work_top">
                        <h3 class="top_h3">Управление фото в слайдере</h3>
                    </div>
                    <div class="manag_wrapper">
                        <?php 
                            $sql = "SELECT * FROM `image`";
                            $result = $connect -> query($sql);
                            foreach($result as $img){
                        ?>
                        <div class="wr_cont">
                            <div class="cont_text">
                                <img src="<?=$img['img']?>" alt="" class="cont_img">
                            </div>
                            <div class="cont_right">
                                <!-- <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div> -->
                                <a href="delete_img.php?id=<?=$img['id']?>" onclick="return confirm('Уверены что хотите удалить?')"><div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53113 1C5.52364 1 3.19671 3.63591 3.56974 6.62017L5.28873 20.3721C5.47639 21.8734 6.7526 23 8.26557 23H15.7344C17.2474 23 18.5236 21.8734 18.7113 20.3721L20.4303 6.62017C20.8033 3.63591 18.4764 1 15.4689 1H8.53113ZM5.70148 5C6.11066 3.8455 7.21175 3 8.53113 3H15.4689C16.7883 3 17.8893 3.8455 18.2985 5H5.70148ZM5.63279 7L7.27329 20.124C7.33584 20.6245 7.76124 21 8.26557 21H15.7344C16.2388 21 16.6642 20.6245 16.7267 20.124L18.3672 7H5.63279Z" fill="#0F0F0F"/>
                                        <path d="M15.002 10.998C14.6114 10.6075 13.9783 10.6075 13.5878 10.998L12 12.5858L10.4201 11.0058C10.0296 10.6153 9.3964 10.6153 9.00587 11.0058C8.61535 11.3964 8.61535 12.0295 9.00587 12.4201L10.5858 14L9.00001 15.5858C8.60949 15.9763 8.60949 16.6095 9.00001 17C9.39054 17.3905 10.0237 17.3905 10.4142 17L12 15.4142L13.5878 17.0019C13.9783 17.3925 14.6114 17.3925 15.002 17.0019C15.3925 16.6114 15.3925 15.9782 15.002 15.5877L13.4142 14L15.002 12.4123C15.3925 12.0217 15.3925 11.3886 15.002 10.998Z" fill="#0F0F0F"/>
                                    </svg>
                                </div></a>
                            </div>
                        </div>
                        <?}?>
                        <!-- <div class="wr_cont">
                            <div class="cont_text">
                                <img src="image/slider/slide.png" alt="" class="cont_img">
                            </div>
                            <div class="cont_right">
                                <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53113 1C5.52364 1 3.19671 3.63591 3.56974 6.62017L5.28873 20.3721C5.47639 21.8734 6.7526 23 8.26557 23H15.7344C17.2474 23 18.5236 21.8734 18.7113 20.3721L20.4303 6.62017C20.8033 3.63591 18.4764 1 15.4689 1H8.53113ZM5.70148 5C6.11066 3.8455 7.21175 3 8.53113 3H15.4689C16.7883 3 17.8893 3.8455 18.2985 5H5.70148ZM5.63279 7L7.27329 20.124C7.33584 20.6245 7.76124 21 8.26557 21H15.7344C16.2388 21 16.6642 20.6245 16.7267 20.124L18.3672 7H5.63279Z" fill="#0F0F0F"/>
                                        <path d="M15.002 10.998C14.6114 10.6075 13.9783 10.6075 13.5878 10.998L12 12.5858L10.4201 11.0058C10.0296 10.6153 9.3964 10.6153 9.00587 11.0058C8.61535 11.3964 8.61535 12.0295 9.00587 12.4201L10.5858 14L9.00001 15.5858C8.60949 15.9763 8.60949 16.6095 9.00001 17C9.39054 17.3905 10.0237 17.3905 10.4142 17L12 15.4142L13.5878 17.0019C13.9783 17.3925 14.6114 17.3925 15.002 17.0019C15.3925 16.6114 15.3925 15.9782 15.002 15.5877L13.4142 14L15.002 12.4123C15.3925 12.0217 15.3925 11.3886 15.002 10.998Z" fill="#0F0F0F"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="wr_cont">
                            <div class="cont_text">
                                <img src="image/slider/slide.png" alt="" class="cont_img">
                            </div>
                            <div class="cont_right">
                                <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M11 4H7.2C6.0799 4 5.51984 4 5.09202 4.21799C4.71569 4.40974 4.40973 4.7157 4.21799 5.09202C4 5.51985 4 6.0799 4 7.2V16.8C4 17.9201 4 18.4802 4.21799 18.908C4.40973 19.2843 4.71569 19.5903 5.09202 19.782C5.51984 20 6.0799 20 7.2 20H16.8C17.9201 20 18.4802 20 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V12.5M15.5 5.5L18.3284 8.32843M10.7627 10.2373L17.411 3.58902C18.192 2.80797 19.4584 2.80797 20.2394 3.58902C21.0205 4.37007 21.0205 5.6364 20.2394 6.41745L13.3774 13.2794C12.6158 14.0411 12.235 14.4219 11.8012 14.7247C11.4162 14.9936 11.0009 15.2162 10.564 15.3882C10.0717 15.582 9.54378 15.6885 8.48793 15.9016L8 16L8.04745 15.6678C8.21536 14.4925 8.29932 13.9048 8.49029 13.3561C8.65975 12.8692 8.89125 12.4063 9.17906 11.9786C9.50341 11.4966 9.92319 11.0768 10.7627 10.2373Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                                <div class="right_svg">
                                    <svg width="40px" height="40px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M8.53113 1C5.52364 1 3.19671 3.63591 3.56974 6.62017L5.28873 20.3721C5.47639 21.8734 6.7526 23 8.26557 23H15.7344C17.2474 23 18.5236 21.8734 18.7113 20.3721L20.4303 6.62017C20.8033 3.63591 18.4764 1 15.4689 1H8.53113ZM5.70148 5C6.11066 3.8455 7.21175 3 8.53113 3H15.4689C16.7883 3 17.8893 3.8455 18.2985 5H5.70148ZM5.63279 7L7.27329 20.124C7.33584 20.6245 7.76124 21 8.26557 21H15.7344C16.2388 21 16.6642 20.6245 16.7267 20.124L18.3672 7H5.63279Z" fill="#0F0F0F"/>
                                        <path d="M15.002 10.998C14.6114 10.6075 13.9783 10.6075 13.5878 10.998L12 12.5858L10.4201 11.0058C10.0296 10.6153 9.3964 10.6153 9.00587 11.0058C8.61535 11.3964 8.61535 12.0295 9.00587 12.4201L10.5858 14L9.00001 15.5858C8.60949 15.9763 8.60949 16.6095 9.00001 17C9.39054 17.3905 10.0237 17.3905 10.4142 17L12 15.4142L13.5878 17.0019C13.9783 17.3925 14.6114 17.3925 15.002 17.0019C15.3925 16.6114 15.3925 15.9782 15.002 15.5877L13.4142 14L15.002 12.4123C15.3925 12.0217 15.3925 11.3886 15.002 10.998Z" fill="#0F0F0F"/>
                                    </svg>
                                </div>
                            </div> -->
                    </div>
                </div>
            </div>
        </section>


        <?php 
            if(isset($_POST['reg'])){
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $repass = $_POST['repass'];
                $role = '1';
                $_SESSION['role'] = $role;

                $sql = "SELECT * FROM users WHERE email = '$email'";
                $result = $connect -> query($sql);
                $users = $result -> fetch();

                if(empty($email)){
                    $error_email = 'Введите почту';
                }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $error_email='Формат почты не верный';
                }

                if(empty($pass)){
                    $error_pass1='Введите пароль';
                }elseif(strlen($pass)<6){
                    $error_pass1='Пароль должен быть больше 6 символов';
                }

                if(empty($repass)){
                    $error_pass2='Введите повтор пароля';
                }elseif($pass1 != $pass2){
                    $error_pass2 = 'Не совпадает с первым';
                }

                if(empty($error) && empty($error_email) && empty($error_pass1) && empty($error_pass2)){
                    $pass1_md5 = md5($pass);
                    $pass2_md5 = md5($repass);
                    $sql = "INSERT INTO `users` (email, pass, repass, role) VALUES ('$email', '$pass1_md5', '$pass2_md5', '$role')";
                    $connect -> query($sql);
                    echo '<script>document.location.href="#sig"</script>';
                }
            }
        ?>

        <main>
        <div class="container">
            <div class="line"></div>
        </div>
        <section class="sign" id="sig">
            <div class="container">
                <div class="sign_content">
                    <div class="sign_top">
                        <div class="contacts_top">
                            <div class="top_h3">Добавление администратора</div>
                        </div>
                    </div>
                    <form class="sign_wrapp" method="POST" name="reg">
                        <div  class="sign_form">
                            <input type="text" placeholder="почта" class="sign_input" name="email">
                            <i><?php if(isset($error_email)){echo $error_email;}?></i>
                            <input type="password" placeholder="пароль" class="sign_input" name="pass">
                            <i><?php if(isset($error_pass1)){echo $error_pass1;}?></i>
                            <input type="password" placeholder="повторный пароль" class="sign_input" name="repass">
                            <i><?php if(isset($error_pass2)){echo $error_pass2;}?></i>
                            <input type="submit" value="Зарегистрировать" class="sign_sub" name="reg">
                            <i><?php if(isset($error)){echo $error;}?></i>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    </main>	
    <script src="js/main.js" defer></script>
</body>
</html>

<?}?>