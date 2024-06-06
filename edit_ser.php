<?php 
    include('incl/connect.php');
?>

<?php 
if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM service WHERE id = '$get_id'";
        $result = $connect ->query($sql);
        $ser = $result -> fetch();{

            if(isset($_POST['edit'])){
                $name = $_POST['name'];
                $text = $_POST['text'];
                $price = $_POST['price'];
                $img = $_POST['src'];

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
            $sql = "UPDATE service SET
                name = '$name',
                text = '$text',
                price = '$price',
                img = '$src'
            WHERE id = '$get_id'";
            $connect -> query($sql);
            echo '<script>document.location.href="admin.php"</script>';
        }
    }
}
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
<section class="addfaq">
            <div class="container">
                <div class="addfaq_content ffa">
                    <div class="work_top">
                        <h3 class="top_h3">Редактирование услуги</h3>
                    </div>
                    <div class="edit_f">
                        <form action="" class="eddit" method="POST" name="edit" enctype="multipart/form-data">
                            <div class="forr">
                                <input type="text" class="faq_input edd" placeholder="Вопрос" name="name" value="<?=$ser['name']?>">
                                <input type="text" class="faq_input edd" placeholder="Ответ" name="text" value="<?=$ser['text']?>">
                                <input type="text" class="faq_input edd" placeholder="Ответ" name="price" value="<?=$ser['price']?>">
                                <input type="file" id="images"  required name="img">
                            </div>
                            <div class="addfaq_inp">
                                <input type="submit" class="faq_place" value="Редактировать" name="edit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
</body>
</html>

<?}?>