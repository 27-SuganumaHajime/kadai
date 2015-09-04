<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
    
    <?php
    $fp=fopen("data.txt","r");
    flock($fp,LOCK_SH);
    $dat=fgetcsv($fp);
    flock($fp,LOCK_UN);
    fclose($fp);

    /*var_dump($dat);*/
    
    ?>
    <table>
        <tr>
            <th>姓</th>
            <td>
                <?php echo $dat[0] ?>
            </td>
        </tr>
        <tr>
            <th>名</th>
            <td>
                <?php echo $dat[1] ?>
            </td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td>
                <?php echo $dat[2] ?>
            </td>
        </tr>
        <tr>
            <th>年齢</th>
            <td>
                <?php echo $dat[3] ?>
            </td>
        </tr>
        <tr>
            <th>性別</th>
            <td>
                <?php echo $dat[4] ?>
            </td>
        </tr>
        <tr>
            <th>趣味</th>
            <td>
                <?php echo $dat[5],$dat[6],$dat[7]?>
            </td>
        </tr>

    </table>
    
</body>
</html>