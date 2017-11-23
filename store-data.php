<?php

require_once('config.php');	
		
if(!empty($_POST)) {
	
	if(!empty($_POST['date']) 
	&& !empty($_POST['month']) 
	&& !empty($_POST['year'])
	&& !empty($_POST['center'])
	) {
		
		
		$table_name = (string) $_POST['date']
		.'_'.$_POST['month']
		.'_'.$_POST['year'];
		
		
		$center = $_POST['center'];
		$tow1 = $_POST['tow1'];
		$tow2 = $_POST['tow2'];
		$trw1 = $_POST['trw1'];
		$trw2 = $_POST['trw2'];
		$nw1 = $_POST['nw1'];
		$nw2 = $_POST['nw2'];
		$tnw = (float) $_POST['tnw'];

	
		
		$to_weight = 0;
		
		
		
		
		$checkt = "SELECT * FROM {$table_name}";
		/*store data*/
		function insert_data($table_name) {
			global $insert;
			$insert = "INSERT INTO {$table_name} (
			center, total_weight1, total_weight2,
			trailor_weight1, trailor_weight2,
			net_weight1, net_weight2,
			total_net_weight)
			VALUES('".$GLOBALS['center']."', '".$GLOBALS['tow1']."',
			'".$GLOBALS['tow2']."', '".$GLOBALS['trw1']."', '".$GLOBALS['trw2']."',
			'".$GLOBALS['nw1']."', '".$GLOBALS['nw2']."', '".$GLOBALS['tnw']."')";
			return $insert;
			
		}
		
		
		
		
	    if(mysqli_query($con, $checkt)) {
			insert_data($table_name);
		}else {
			$create_table = "CREATE TABLE {$table_name} (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			center VARCHAR(30) NOT NULL,
			total_weight1 INT(30),
			total_weight2 INT(30),
			trailor_weight1 INT(30),
			trailor_weight2 INT(30),
			net_weight1 INT(30),
			net_weight2 INT(30),
			total_net_weight DOUBLE
			)";
			
			mysqli_query($con, $create_table);
			
			insert_data($table_name);
		}
		
		
		mysqli_query($con, 'SET CHARACTER SET utf8');
        mysqli_query($con, "SET SESSION collation_connection='utf8_general_ci'");
	    if(!mysqli_query($con, $insert)) {
			echo 'something wrong';
		};
		
		
		$center_exist = mysqli_query($con, "SELECT center, total_net_weight FROM {$table_name} WHERE center = '$center' ORDER BY id DESC");
		if($center_exist) {
			$get = mysqli_fetch_all($center_exist);
		}else {
			$get = 0;
		}
		
		
		function split_row($start_sum) {
				$sum_row = 0;
				$sum_select = mysqli_query($GLOBALS['con'], "SELECT total_net_weight FROM {$GLOBALS['table_name']} LIMIT ".$start_sum.", 17");
				if($sum_select) {
					while($row = mysqli_fetch_assoc($sum_select)) {
						$sum_row += $row['total_net_weight'];
					}
				}
				return $sum_row;
		}
		
		$selecttnw = mysqli_query($con, "SELECT total_net_weight FROM {$table_name}");
		$i = 0;
		while($trow = mysqli_fetch_array($selecttnw)) {
			$i++;
		}
		$first_to = $second_to = 0;
		if($i > 0) {
			$first_to = split_row(0);
			$second_to = split_row(17);
			$third_to = split_row(34);
			$fourth_to = split_row(51);
			$fifth_to = split_row(68);
			$sixth_to = split_row(85);
			$seventh_to = split_row(102);
			$eighth_to = split_row(119);
		}
		
		
		
		mysqli_close($con);
		
		/*update data center-wise*/
		
		
	    if(!mysqli_query($conn, $checkt)) {
						$create_atable = "CREATE TABLE {$table_name} (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			center VARCHAR(30) NOT NULL,
			to_trip INT(30),
			to_weight DOUBLE
			)";
			mysqli_query($conn, $create_atable);
			
			$center_list = array('', 'Ponditgram', 'Chatni', 'Pirgonj', 'Easinpur', 'Bakshor', 'Bakshor-kha', 'Hatiandoh', 'Telkupi', 'Dighapotia', 'Piprul', 'Basudebpur', 'Mirjapur', 'Mirjapur-kha', 'Noldanga', 'Keshobpur', 'Ramsharkazipur', 'Ramsharkazipur-kha', 'Dostanabad', 'Chadpur', 'Condrokola', 'Jalalabad', 'Kalikapur', 'Jholmolia', 'Sorishabari', 'Jamnogor', 'Kafuria', 'Bashbaria', 'Dottopara', 'Korota', 'Dhorail', 'Halsha', 'Hoybotpur', 'Borobaria', 'Dorappur', 'Shonkorvag', 'Ahmedpur', 'Notabaria', 'Mohisvanga', 'Katashkol', 'Hatgobindapur', 'Sonapur', 'Boraigram', 'Choddomatha', 'Dhanura', 'Khaksha', 'Jalora', 'Bagatipara', 'Malonchi', 'Tomaltola', 'Joyontipur', 'Faguardiar', 'Sailkona', 'Jigori', 'Rohimanpur');
			
			
			for($sl = 1; $sl <= 54; $sl++) {
				$insert_data = "INSERT INTO {$table_name} (center, to_trip, to_weight) 
				VALUES('".$center_list[$sl]."', '0', '0')";
				
				mysqli_query($conn, 'SET CHARACTER SET utf8');
	            mysqli_query($conn, "SET SESSION collation_connection='utf8_general_ci'");
				
				mysqli_query($conn, $insert_data);
			}
		}
		
		if($get > 0) {
			$to_trip = count($get);
			
			$select = "SELECT to_weight FROM {$table_name} WHERE center = '$center'";
			$current = mysqli_fetch_assoc(mysqli_query($conn, $select));
			if($current > 0) {
				$to_weight = $current['to_weight'] + $get[0][1];
			}
			
			
			$insert_trip = "UPDATE {$table_name} SET to_trip = '$to_trip', to_weight = '$to_weight' WHERE center = '$center'";
			mysqli_query($conn, $insert_trip);
		}
		
		mysqli_close($conn);
		header('Location: index.php?suc=Success&first='.$first_to.'&second='.$second_to.'&third='.$third_to.'&fourth='.$fourth_to.'&fifth='.$fifth_to.'&sixth='.$sixth_to.'&seventh='.$seventh_to.'&eighth='.$eighth_to);
		
}
}



