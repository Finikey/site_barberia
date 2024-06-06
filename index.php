<?php 
    include('incl/connect.php');
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
    <header class="header" id="glav">
        <div class="container">
            <div class="header_content">
                <a href="index.php"><div class="header_logo">
                    <img src="image/Logo.png" alt="logo" class="header_img" >
                </div></a>
                <nav>
                    <ul class="header_ul">
                        <li class="header_li"><a href="#glav" class="header_a">Главная</a></li>
                        <li class="header_li"><a href="#zap" class="header_a">Запись</a></li>
                        <li class="header_li"><a href="#cont" class="header_a">Контанкты</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        
        
        <section class="banner">
            <div class="container">
            <section class="man">
            <div class="container">
                <div class="banner_left">

        </div>
            </div>
        </section>
                <div class="banner_content">
                    
                    <div class="banner_right">
                        <div class="right_wrapper">
                            <div class="right_1">
                                <h2 class="right_h2">О Barberia</h2>
                            </div>
                            <div class="right_2">
                                <h1 class="right_h1">Преобразите свой внешний вид</h1>
                            </div>
                            <div class="right_3">
                                <h3 class="right_h3">Откройте для себя искусство традиционной стрижки </h3>
                                <h3 class="right_h4">Загляните в Barberia и позволите нашим прфесионалам преобразить вас</h3>
                            </div>
                            <a href="https://t.me/BarberiaBot"><div class="right_btn">
                                <p class="right_p">Записаться</p>
                            </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="slider">
            <div class="container">
                <div class="slider_content">
                    <div class="slider_wrapper">
                        <a id="prev"><img src="image/slider/button-circle-round-arrow-previous-svgrepo-com.svg" class="slide_butl" alt="prev"></a>
                        <?php 
                            $sql = "SELECT * FROM `image`";
                            $result = $connect -> query($sql);
                            foreach($result as $slide){
                        ?>
                        <div class="myslide">
                          <div class="slider_item pack_1"><img src="<?=$slide['img']?>" class="slide_img" alt="1"></div>
                        </div>
                        <?}?>
                        <!-- <div class="myslide">
                          <div class="slider_item pack_2"><img src="image/slider/slide.jpg" class="slide_img" alt="8"></div>
                        </div> -->
                        <!-- <div class="myslide">
                          <div class="slider_item pack_3"><img src="img/vel.jpg" class="slide_img" alt="sl"></div>
                        </div> -->
    
                        <a id="next"><img src="image/slider/button-circle-round-arrow-next-svgrepo-com (1).svg" class="slide_but" alt="next"></a>
                      </div>
                      <!-- <h1 id="timeVisual"><h1> -->
                </div>
            </div>
        </section>
        <section class="faq">
            <div class="container">
                <div class="faq_content">
                    <div class="faq_top">
                        <h3 class="top_h3">FAQ</h3>
                    </div>
                    <?php 
                            $sql = "SELECT * FROM `faq`";
                            $result = $connect -> query($sql);
                            foreach($result as $faq){
                        ?>
                    <div class="faq_wrapper">
                        
                        <div class="wrapper_cont">
                            <div class="cont_wrapp">
                                <div class="wrapp_text">
                                    <p class="text_p"><?=$faq['name']?></p>
                                </div>
                                <div class="wr_btn">
                                    <p class="button">+</p>
                                </div>
                            </div>
                            <div class="accordion">
                                <p class="text_p"><?=$faq['text']?></p>
                            </div>
                        </div>
                        
                    </div>
                    <?}?>
                </div>
            </div>
        </section>
        <section class="service">
            <div class="container">
                <div class="service_content">
                    <div class="contacts_top">
                        <div class="top_h3">Наши услуги</div>
                    </div>
                    <div class="service_wrapper">
                        <?php 
                            $sql = "SELECT * FROM `service`";
                            $result = $connect -> query($sql);
                            foreach($result as $ser){
                        ?>
                        <article class="card">
                            <img
                            class="card__background"
                            src="image/1716532209барбер.jpg"
                            alt="Photo of Cartagena's cathedral at the background and some colonial style houses"
                            width="1920"
                            height="2193"
                            />
                            <div class="card__content | flow">
                                <div class="card__content--container | flow">
                                    <h2 class="card__title"><?=$ser['name']?></h2>
                                    <p class="card__description"><?=$ser['text']?>
                                    </p>
                                </div>
                            <div class="service_but">
                                <button class="card__button">1 500₽</button>
                                <button class="card__button">Подробнее</button>
                            </div>
                            
                            </div>
                        </article>
                        <?}?>
                    </div>
                </div>
            </div>
        </section>
        <section class="contacts" id="cont">
            <div class="container">
                <div class="contacts_content">
                    <div class="contacts_top">
                        <div class="top_h3">Контанкты</div>
                    </div>
                    <div class="contscts_wrapp">
                        <div class="contacts_block">
                            <div class="block_top">
                                <p class="block_p">Телефон</p>
                            </div>
                            <div class="block_but">
                                <p class="but_p">+7 (800) 788-58-58</p>
                            </div>
                        </div>
                        <div class="contacts_block">
                            <div class="block_top">
                                <p class="block_p">Адрес</p>
                            </div>
                            <div class="block_but">
                                <p class="but_p">Казань, ул. Гоголя 31</p>
                            </div>
                        </div>
                        <div class="contacts_block">
                            <div class="block_top">
                                <p class="block_p">Время работы</p>
                            </div>
                            <div class="block_but">
                                <p class="but_p">Ежедневно | 9:00 - 23:00</p>
                            </div>
                        </div>
                        <div class="contacts_block">
                            <div class="block_top">
                                <p class="block_p">Перезвоните мне</p>
                            </div>
                            <form action="">
                                <input type="text" class="contacts_input">
                                <input type="submit" class="sub" value=">">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Afeda45aef2b36ea565996ba5fc2c112b32c5edf6b24dac9bae1af21b35dfc6b6&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </section>
        <section class="record" id="zap">
            <div class="container">
                <div class="record_content">
                    <div class="contacts_top">
                        <div class="top_h3">Записаться</div>
                    </div>
                    <div class="record_wrapper">
                        <div class="record_left">
                            <!-- <div class="record_left-top">
                                <h3 class="record_h3">Ссылка на запись</h3>
                            </div> -->
                            <div class="record_top">
                                <h4 class="record_h4">Хотите записаться на прием без лишних звонков и ожидания? </h4>
                                <h5 class="record_h5">
                                Просто перейдите по ссылке или QR-коду и выберите удобное время для визита к нам! Мы ждем вас для создания стильного и ухоженного образа.
                                </h5>
                            </div>
                            <a href="https://t.me/BarberiaBot"><div class="right_btn rec">
                                <p class="right_p">Записаться</p>
                            </div></a>
                        </div>
                        <div class="record_right">
                            <div class="record_right-top">
                                <h3 class="record_h3">QR-код</h3>
                            </div>
                            <div class="record_image">
                                <img src="image/screen.png" alt="screen" class="record_img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div class="line"></div>
    <footer class="footer">
        <div class="container">
            <div class="footer_content">
                <div class="footer_wrapper">
                    <div class="footer_left">
                        <div class="footer_image">
                            <img src="image/Logo.png" alt="img" class="footer_img">
                        </div>
                        <div class="footer_l">
                            <p class="footer_cop">©</p>
                            <p class="footer_par">Камсков Егор 2024</p>
                        </div>
                    </div>
                    <div class="footer_center">
                        <div class="center_wrapper">
                            <li class="center_text"><a class="left_p">Главная</a></li>
                            <li class="center_text"><a class="left_p">Запись</a></li>
                            <li class="center_text"><a class="left_p">Контакты</a></li>
                        </div>
                    </div>
                    <div class="footer_right">
                        <div class="right_wrap">
                            <div class="righ_text">
                                <p class="text_pp">Телефон:</p>
                                <p class="text_pro">+7 (800) 788-58-58</p>
                            </div>
                            <div class="righ_text">
                                <p class="text_pp">Адресс:</p>
                                <p class="text_pro">Казань, ул. Гоголя 31</p>
                            </div>
                            <div class="righ_text">
                                <p class="text_pp">Время работы:</p>
                                <p class="text_pro">Ежедневно | 9:00 - 23:00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/main.js" defer></script>
</body>
</html>