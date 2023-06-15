<?php
$student = array(array('姓名'=>'李雲毓', '生日'=>'2000/3/14', '電話'=>'0227042762'), 
				array('姓名'=>'黃冠妮', '生日'=>'2000/6/6', '電話'=>'0220938123'),
				array('姓名'=>'韋國書', '生日'=>'2000/7/15', '電話'=>'0225021314'),
				array('姓名'=>'劉子芸', '生日'=>'2000/8/7', '電話'=>'0425307996'),
				array('姓名'=>'李政昀', '生日'=>'2000/12/24', '電話'=>'0227408965'));



?>

<table border="1">
<tr>
	<td>姓名</td>
	<td>生日</td>
	<td>電話</td>
</tr>
<?php
	for($i = 0;$i < sizeof($student);$i++){
		echo "<tr>";
		echo "<td>" . $student[$i]['姓名'] . "</td>";
		$bir = explode('/',$student[$i]['生日']);
		echo "<td>" . "{$bir[0]}年{$bir[1]}月{$bir[2]}日" . "</td>";
		$number = substr($student[$i]['電話'], 0, 2);
		echo "<td>" . "({$number})" . substr($student[$i]['電話'], 2) . "</td>";
	}
?>

</table>

				

