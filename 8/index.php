<html>
    <head>
        <meta charset="utf-8">
        <title>TOP</title>
    </head>
    <body>
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
        <?php
        $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
        ?>
        <h1>新着ニュース</h1>
        <dl>
        <?php
         $sql1 = "SELECT * FROM news_main ORDER BY CREATE_DATE DESC LIMIT 5";
         $stmt1 = $pdo->prepare($sql1);
         $stmt1->execute();
         $results1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
         //var_dump($results1);
         foreach($results1 as $row){
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
        $pdo = null;?>
        </dl>
        <h1>人気ニュース</h1>
    </body>
</html>