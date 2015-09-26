<html>
    <head>
        <meta charset="utf-8">
        <title>詳細</title>
    </head>
    <body>
        <?php
          $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
          $sql = "SELECT * FROM news_main,news_img 
                  where news_main.img_id = news_img.img_id 
                  and news_main.news_id = ".$_GET["news_id"];
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          //var_dump($results);
          //var_dump($results[0]["news_title"]);
          echo
          "<h1>".$results[0]["news_title"]."</h1>".
          "<p>".
          "<img src='./img/".$results[0]["img_name"]."'>".
          "<div>".$results[0]["news_detail"]."</div>".
          "</p>"
        ?>
    </body>
</html>