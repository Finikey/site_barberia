<?php 
    include('incl/connect.php');
?>

<?php 
    if(isset($_GET['id'])){
        $get_id = $_GET['id'];
        $session_uid = $_SESSION['uid'];
        $sql = "SELECT * FROM available_appointments WHERE id = '$get_id'";
        $result = $connect -> query($sql);
        $faq = $result -> fetch();
        $result = $connect -> query("DELETE FROM `available_appointments` WHERE `id` = '$get_id'");
        echo '<script>document.location.href="admin.php"</script>';
    }

?>