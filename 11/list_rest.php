<?php
$key_id  = "956a86d8e89fe11fc3c449439d7e42d0";
$category_s = $_GET["category_s"];
$lati=$_GET["lati"];
$longi=$_GET["longi"];

$url  = "http://api.gnavi.co.jp/RestSearchAPI/20150630/?keyid=" . $key_id . "&format=json&hit_per_page=100&pref=PREF13".
"&category_s=" . $category_s . 
"&latitude=" . $lati . 
"&longitude=" . $longi .
"&range=3"
;
//var_dump($url);
$json_data = file_get_contents($url, true);
$data = json_decode($json_data);
//var_dump($data);

echo "<pre>";
//var_dump($data->rest);
//var_dump($data->rest[0]->name);
//var_dump($data->rest[0]->category);
//var_dump($data->rest[0]->code->category_name_s);
//var_dump($data->rest[0]->pr->pr_short);
//var_dump($data->rest[0]->pr->pr_long);


$rest=$data->rest;
//var_dump($rest);
foreach($rest as $key => $value){
    
    $category_code_s = $value->code->category_code_s;
    //var_dump($value->name);
    //var_dump($category_code_s);
    
    if (in_array($category_s,$category_code_s)){
        echo "<p>";
        //echo "<img src='".$value->image_url->shop_image1."' >";
        echo $value->name."<br>";
        echo $value->code->areaname_s."<br>";
        echo $value->url."<br>";
        //echo $value->category."<br>";
        echo "</p>";
        //var_dump($value->code->category_name_s);
    }

}
echo "</pre>";

?>
<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
</body>
</html>