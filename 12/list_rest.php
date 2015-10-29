<?php

class gnavi_api_rest {
    
    public $url="http://api.gnavi.co.jp/RestSearchAPI/20150630/?";
    
    public function setKeyid($keyid){
        $this->url .= "keyid=".$keyid;
    }

    public function setFormat($format){
        $this->url .= $format;
    }
    
    public function setPref($pref){
        $this->url .= $pref;
    }

    public function setCategory_s($category_s){
        $this->url .= $category_s;
    }
    
    public function getUrl(){
        return $this->url;
    }
    
    public $json_data = "";
    public $data = "";
    public $rest = "";
    
    public function getJsondata(){
        $this->json_data = file_get_contents($this->url, true);
        $this->data = json_decode($this->json_data);
        $this->rest = $this->data->rest;
    }
    
    //public $json_data = file_get_contents($this->url, true);
    //public $data = json_decode($this->json_data);
    //public $rest = $this->data->rest;

    public function getRest(){
        foreach($this->rest as $value){
        echo $value->name."<br>";
        echo $value->code->areaname_s."<br>";
        echo $value->url."<br>";
        }
    }
    
    
}



?>

<html>
<head>
<meta charset="utf-8">
<title></title>
</head>
<body>
<p>
   <h3>東京のドイツ料理店</h3>
    <?php

     $gnavi_api_rest1 = new gnavi_api_rest;

     $gnavi_api_rest1->setKeyid("94b4f9caa40c20c1a3037bfb550fd15a");
     $gnavi_api_rest1->setFormat("&format=json");
     $gnavi_api_rest1->setPref("&pref=PREF13");

     $gnavi_api_rest1->setCategory_s("&category_s=RSFST12002");
     $gnavi_api_rest1->getJsondata();
     $gnavi_api_rest1->getRest();

    ?>
</p>
<p>
   <h3>東京のロシア料理店</h3>
    <?php

      $gnavi_api_rest1->setCategory_s("&category_s=RSFST12003");
      $gnavi_api_rest1->getJsondata();
      $gnavi_api_rest1->getRest();

    ?>
</p>


</body>
</html>