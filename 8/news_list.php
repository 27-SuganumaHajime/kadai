<html>
    <head>
        <meta charset="utf-8">
        <title>一覧</title>
    </head>
    <body>
        <a href="index.php">topへ戻る</a>
        <h1>ニュースを検索</h1>
        <form action="news_list.php" method="get">
            <p>
                カテゴリ
                <input type="checkbox" name="category_name[]" value="バレーボール">バレーボール
                <input type="checkbox" name="category_name[]" value="F1">F1
                <input type="checkbox" name="category_name[]" value="テニス">テニス
                <input type="checkbox" name="category_name[]" value="Jリーグ">Jリーグ
            </p>
            <p>
                フリーワード<input type="text" name="free_word">
            </p>
            <p>
                <input type="submit" value="検索" name="serch">
            </p>
        </form>
        <h1>検索結果</h1>
        <dl>
        <?php
         $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
         $sql = "SELECT * FROM news_main WHERE show_flg = 1";
         if (!empty($_GET["free_word"])){
             $free_word = $_GET["free_word"];
             $sql.= " AND news_detail like '%$free_word%'";
         }
         if (!empty($_GET["category_name"])){
             $category_name = "'".implode("','",$_GET["category_name"])."'";
             $sql.= " AND category_name in ($category_name)"; 
         }
         //var_dump($_GET["free_word"]);
         //var_dump($_GET["category_name"]);
         //var_dump($free_word);
         //var_dump($category_name);
         //var_dump($sql);
         $stmt = $pdo->prepare($sql);
         $stmt->execute();
         $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($results);
         foreach($results as $row){
             echo
             "<dd>".
             "<span>".$row["category_name"]."</span>".
             "<span>".$row["create_date"]."</span>".
             "<p>".
             "<a href='news_detail.php?news_id=".$row["news_id"]."'>".
             $row["news_title"].
             "</a>".
             "</p>".
             "</dd>"
             ;
         }
        $pdo = null;
        ?>
        </dl>
    </body>
</html>