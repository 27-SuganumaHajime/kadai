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
        
        <?php
         $para = array();
         if (!empty($_GET["free_word"])){
             array_push($para,"free_word=".$_GET["free_word"]);
         }
         if (!empty($_GET["category_name"])){
             foreach($_GET["category_name"] as $cate){
                 array_push($para,"category_name[]=".$cate);
             }
         }
         $para_new = $para;
         array_push($para_new,"sort=new");
         $para_newx = implode("&",$para_new);
         $para_old = $para;
         array_push($para_old,"sort=old");
         $para_oldx = implode("&",$para_old);
         //var_dump($para_newx);
        ?>
        
        <p>
         <span>
          <?php
          echo
          "<a href='news_list.php?".$para_newx."'>";
          ?>
          [新しい順]
          </a>
         </span>
         <span>
          <?php
          echo
          "<a href='news_list.php?".$para_oldx."'>";
          ?>
          [古い順]
          </a>
         </span>
        </p>
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
         if (!empty($_GET["sort"])){
             switch ($_GET["sort"]){
                 case "new":
                     $sql.=" ORDER BY create_date desc";
                     break;
                 case "old":
                     $sql.=" ORDER BY create_date";
                     break;
             }
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