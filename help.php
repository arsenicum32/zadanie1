<?php
  $url = file_get_contents('baseOfdata.json');
  $content = json_decode($url,true);
  echo $content;
  // foreach($content as $key => $subarray) {
  //   echo $key;
  //   // echo '<table style="border:1px solid red; margin:10px auto;">';
  //   // foreach($subarray as $item){
  //   //     echo $item;
  //   // }
  // }
?>
