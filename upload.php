<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image upload</title>
	<script src="jquery.js"></script>
	<script>
		$(document).ready(function () {
			var num = $('#phones').attr('value').split('|');
			var innerCont = '<input type="hidden" name="regions" id="regions" value="" />';
			var innerOPER = '<input type="hidden" name="operators" id="operators" value="" />';
			$('#mainTable').append(innerCont);
			$('#mainTable').append(innerOPER);

			$.getJSON( "base.json", function( data ) {
  			var DATA = data;
				var index = 0;
	      for(var n in num){
	        var ni = num[n];
	        var code = '';
	        var valid = true;
	        if(ni.indexOf('+7')==0){
	          code='+7'
	          ni = ni.substring(2);
	        }else if(ni.indexOf('8')==0||ni.indexOf('7')==0){
	          code='+7'
	          ni = ni.substring(1);
	        }else{
	          valid = false;
	        }
	        var op = ni.substring(0,3);
	        var mask = ni.substring(3,ni.length);

	        var operator = '';
	        var region = '';
	        for(var oper in DATA){
	          for(var oper2 in DATA[oper]){

	            if(oper2==op){
	              operator = oper;
	              for(var reG in DATA[oper][oper2]){
	                //console.log(DATA[oper][oper2][reG].length);
	                for(var K=0; K<DATA[oper][oper2][reG].length; K++){
	                  //console.log( parseInt( DATA[oper][oper2][reG][K].split('..')[0] ) );
	                  var A = parseInt( DATA[oper][oper2][reG][K].split('..')[0] );
	                  var B = parseInt( DATA[oper][oper2][reG][K].split('..')[1] );
	                  if(A<parseInt(mask)&&parseInt(mask)<B){
	                    region = reG;
											innerCont+=reG+'|';
											$("#region_"+index.toString()).html(region);
											$("#oper_"+index.toString()).html(operator);
											$("#regions").attr('value',$("#regions").attr('value')+region.toString()+'|');
											$("#operators").attr('value',$("#operators").attr('value')+operator.toString()+'|');
											//alert(region+ operator);
	                  }
	                }
	              }
	            }
	          }
	        }
					index++;

		      if(valid){
		          //RES.push({ID:parseInt(n)+1,NUM: code + '(' + op+ ') '+ mask.substring(0,3)+' '+mask.substring(3,ni.length) ,REG:region,OP:operator});
		      }else {
		      }
		      //return RES;
	  	}

			// innerCont+=;
			// alert(innerCont);
			});
		});
	</script>
</head>
<body>
<?php
	if($_FILES['userfile']['type'] != 'text/plain'){
	echo '<p>загруженный файл не является текстовым</p><a href="/">назад</a>';
	exit();
	}else{
		$data = file_get_contents($_FILES['userfile']['tmp_name']); //file_get_contents(
		$cut = explode("\n", $data);
		//echo explode("\n", $data)[7];
	}
?>
<form name='getcsv' action="getcsv.php" method="post" id='superForm'>
	<input type="submit" name="submit" value="загрузить CSV" class="input-button" />
<table name='table' id='mainTable'>
   <caption>Ваша таблица:</caption>
   <tr>
    <th>№</th>
    <th>телефон:</th>
    <th>Регион:</th>
    <th>оператор:</th>
   </tr>
	 <?php
	 	echo '<input type="hidden" name="length" value='. count($cut) .'/>';
		echo '<input type="hidden" name="data" id="phones" value=' . implode('|',$cut) . '/>';
	 	for($i = 0; $i<count($cut); $i++) {
			echo '<tr><td>'. $i .'</td><td>' . $cut[$i] . '</td><td id="region_' . $i . '">регион</td><td id="oper_' .$i. '">оператор</td></tr>';
		}
	 ?>
 </table>
</form>
</body>
</html>
