<?php require 'db-connect.php'; ?>
<?php

    $id = isset($_GET['id'])? htmlspecialchars($_GET['id'], ENT_QUOTES, 'utf-8'):'';

    if($id == ''){
        header("Location:./news.php");
        exit;
    }

    //DB接続
    $dbh=new PDO($connect, USER, PASS);
    $stmt = $dbh->prepare("SELECT * FROM news WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>記事編集</title>

        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- css -->
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="header-logo">
                    <h1><a href="dashboard.php">ニュース</a></h1>
                </div>

                <nav class="menu-right menu">
                    <a href="logout.php">ログアウト</a>
                </nav>
            </div>
        </header>
        <main>
            <div class="wrapper">
                <div class="container">
                    <div class="wrapper-title">
                        <h3>編集</h3>
                    </div>
                    <form class="edit-form" action="./update_news.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $news[0]['id']; ?>">
                        <div class="form-group">
                            <p>タイトル</p>
                            <input type="text" name="title" value="<?Php echo $news[0]['title']; ?>" required>
                        </div>
                        <div class="form-group">
                            <p>本文</p>
                            <textarea name="content" ><?php echo strip_tags($news[0]['content']); ?></textarea>
                        </div>
                        <button type="submit" class="btn btn-blue">更新する</button>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="container">
                <p>FF14のパッチ7.0が楽しみです</p>
            </div>
        </footer>
    </body>
</html>