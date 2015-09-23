<?php
$json = file_get_contents('good.json');
$data = json_decode($json, true);
if($data==null){
	echo 'FUCK';
	exit();
}else{
	echo $data['билайн']['903']['Алтайский_край'][0];

	function getReg($num){
        $ni = $num;
        $code = '';
        $valid = true;
        if(strrpos($ni,'+7')==0){
          $code='+7';
          $ni = substr($ni,2);
        }else if(strrpos($ni,'8')==0||strrpos($ni,'7')==0){
          $code='+7';
          $ni = substr($ni,1);
        }else{
          $valid = false;
        }
        $op = substr($ni,0,3);
        $mask = substr($ni,3,strlen($ni));

        $operator = '';
        $region = '';
        // foreach($data->* as $oper){
        //   foreach($data[$oper] as $oper2){
				//
        //     if($oper2==$op){
        //       $operator = $oper;
        //       foreach($data[$oper][$oper2] as $reG){
        //         for($K = 0 ; $K < count($data[$oper][$oper2][$reG]); $K++){
        //           $A = intval( split('..',$data[$oper][$oper2][$reG][$K])[0] );
        //           $B = intval( split('..',$data[$oper][$oper2][$reG][$K])[1] );
        //           if($A<intval($mask)&&intval($mask)<$B){
        //             $region = $reG;
				// 						return $region;
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
				for($i=0;$i<count($data);$i++){
					echo $data[$i];
				}
	}
	echo getReg('89164835827');
}
?>
