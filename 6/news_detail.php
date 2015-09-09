<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
                 //var_dump($_GET);
                 $pdo = new PDO("mysql:host=localhost;dbname=cs_academy;charset=utf8", "root", "");
                 $sql = "SELECT * FROM news where news_id = '$_GET[news_id]'";
                 $stmt = $pdo->prepare($sql);
                 $stmt->execute();
                 $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                 //var_dump($results);
                 foreach($results as $row){
                    echo "<h1>".$row["news_title"]."</h1><br>";
                    echo "<p>".$row["news_detail"]."</p>";
                 };

    ?>
</body>
</html>