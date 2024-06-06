<?php 
    include('incl/connect.php');
?>

<?php 
if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $sql = "SELECT * FROM faq WHERE id = '$get_id'";
        $result = $connect ->query($sql);
        $faq = $result -> fetch();{

            if(isset($_POST['edit'])){
                $name = $_POST['name'];
                $text = $_POST['text'];

                if(empty($name)){
                    $error = 'name';
                }

                if(empty($text)){
                    $error = 'text';
                }

if(empty($error)){
            $sql = "UPDATE faq SET
                name = '$name',
                text = '$text'
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
                        <h3 class="top_h3">Редактирование FAQ</h3>
                    </div>
                    <div class="edit_f">
                        <form action="" class="eddit" method="POST" name="edit">
                            <div class="forr">
                                <input type="text" class="faq_input edd" placeholder="Вопрос" name="name" value="<?=$faq['name']?>">
                                <input type="text" class="faq_input edd" placeholder="Ответ" name="text" value="<?=$faq['text']?>">
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