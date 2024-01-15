<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>記事投稿</title>

        <link rel="icon" href="favicon.ico">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/styles.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="header-logo">
                    <h1><a href="index.html">管理画面</a></h1>
                </div>
            </div>
        </header>
        <main>
            <div class="wrapper">
                <div class="container">
                    <div class="wrapper-title">
                        <h3>新規作成</h3>
                    </div>
                    <form class="edit-form" method="POST" action="store_news.php">
                        <div class="form-group">
                            <p>タイトル</p>
                            <input type="text" name="title" required>
                        </div>
                        <div class="form-group">
                            <p>本文</p>
                            <textarea name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-blue">公開する</button>
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="container">
                <p>学生生活楽しかったです</p>
            </div>
        </footer>
    </body>
</html>