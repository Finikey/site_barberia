<?php 
    try{
        $connect = new PDO('mysql:host=localhost;dbname=bar', 'root', '');
        echo 'db';
    }catch(PDOException $e){
        echo $e;
    }
?>

<?php 
    session_start();
    if(isset($_GET['do'])){
        if($_GET['do'] == 'exit'){
            session_unset();
            echo '<script>document.location.href="index.php"</script>';
        }
    }

    if(isset($_SESSION['uid'])){
        $session_uid = $_SESSION['uid'];
    }
?>


<!-- <?php 
    try{
        $connect = new PDO('mysql:host=localhost;dbname=x165', 'x165', 'xJrYnKEWNAJYEaKi');
        echo 'db';
    }catch(PDOException $e){
        echo $e;
    }
?> -->