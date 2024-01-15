<?php require 'db-connect.php'; ?>
<?php
    $title = isset($_POST['title'])? htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8'):'';
    $content = isset($_POST['content'])? htmlspecialchars($_POST['content'], ENT_QUOTES, 'utf-8'):'';
    $content = nl2br($content);

    //DB接続
    $dbh=new PDO($connect, USER, PASS);

    $stmt = $dbh->prepare("INSERT INTO news(
        title,
        content,
        created_at,
        updated_at
    ) values(
        :title,
        :content,
        now(),
        now()
    )");
    $stmt->bindParam(':title',$title);   //:titleという変数に$titleをバインド
    $stmt->bindParam(':content',$content);    //:contentという変数に$contentをバインド
    $stmt->execute();    //$stmtを実行

    header('location:./news.php');

        