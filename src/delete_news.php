<?php require 'db-connect.php'; ?>
<?php
    $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8'):'';

    $dbh=new PDO($connect, USER, PASS);
        
    $stmt = $dbh->prepare("DELETE FROM news WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
        
    header('location:./news.php');