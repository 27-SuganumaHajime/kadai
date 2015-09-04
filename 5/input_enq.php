<html>
<head>
<meta charset="utf-8">
<title>アンケート入力</title>
</head>
<body>

    <form action="input_finish.php" method="post">
        姓:<input type="text" name="simei1">
        名:<input type="text" name="simei2">
        <br>
        e-mail:<input type="text" name="mail">
        <br>
        年齢:<input type="text" name="nenrei">才
        <br>
        性別:
        <input type="radio" name="sei" value="男性">男性
        <input type="radio" name="sei" value="女性">女性
        <br>
        趣味:
        <input type="hidden" name="syumi[0]" value="">
        <input type="hidden" name="syumi[1]" value="">
        <input type="hidden" name="syumi[2]" value="">
        <input type="checkbox" name="syumi[0]" value="水泳">水泳
        <input type="checkbox" name="syumi[1]" value="自転車">自転車
        <input type="checkbox" name="syumi[2]" value="ランニング">ランニング
        <br>
        <input type="submit">
    </form>

</body>
</html>