<?php require 'db-connect.php'; ?>
<?php
    $dbh=new PDO($connect, USER, PASS);
    $stmt = $dbh->prepare("SELECT * FROM news");
    $stmt->execute();
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>記事管理</title>

        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="header-logo">
                    <h1><a href="index.html">ニュース</a></h1>
                </div>
            </div>
        </header>
        <main>
            <div class="wrapper">
                <div class="container">
                    <div class="wrapper-title">
                        <h3>記事管理</h3>
                    </div>
                    <button type="button" class="btn btn-blue" onclick="location.href='create_news.php'">投稿する</button>
                    <div class="list">
                        <table>
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>タイトル</th>
                                    <th>本文</th>
                                    <th>更新日時</th>
                                    <th>作成日時</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($news as $new): ?>
                                <tr>
                                    <td><?php echo $new['id']; ?></td>
                                    <td><?php echo $new['title']; ?></td>
                                    <td><?php echo $new['content']; ?></td>
                                    <td><?php echo $new['updated_at']; ?></td>
                                    <td><?php echo $new['created_at']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-green" onclick="location.href='edit_news.php?id=<?php echo $new['id']; ?>'">編集</button>
                                        <button type="button" class="btn btn-red delete" data-id=<?php echo $new['id']; ?>>削除</button>
                                        <form method="POST" action="./delete_news.php" id="delete_form_<?php echo $new['id']; ?>">
                                            <input type="hidden" value="<?php echo $new['id']; ?>" name="id">
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer>
            <div class="container">
                <p>フッターを付けたけど書くことないです。2年間お世話になりました</p>
            </div>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            $(".delete").click(function(){
                var id = this.dataset.id;
                if(confirm("ID:"+id+"番の記事を本当に削除していいですか？")){
                    $("#delete_form_"+id).submit();
                }else{
                    return false;
                }
            })
        </script>
    </body>
</html>