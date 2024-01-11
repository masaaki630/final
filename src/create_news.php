<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>記事投稿</title>
</head>
<body>
    <header>
        <div class="container">
            <h1><a href="index.php">ダッシュボードに戻る</a></h1>
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
            <p></p>
        </div>
    </footer>
</body>
</html>