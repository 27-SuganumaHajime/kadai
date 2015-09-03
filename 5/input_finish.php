<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
    <h1>ご協力ありがとうございました</h1>
    
    <?php
    var_dump($_POST);
    
    $syumi = $_POST["syumi"];
    var_dump($syumi);

    unset($_POST["syumi"]);
    var_dump($_POST);
    
    $_POST2 = array_merge($_POST,$syumi);
    var_dump($_POST2);
    
    
    $file=fopen("data.txt","w");
    flock($file,LOCK_EX);
    fputcsv($file,$_POST2);
    flock($file,LOCK_UN);
    fclose($file);
    
    ?>
    
    
</body>
</html>