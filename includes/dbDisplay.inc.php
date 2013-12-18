<?php

$userListQuery = "select * from AdminArea order by user_id asc";
$userListRes = mysql_query($userListQuery, $c);

$i = 0;
while($userList = mysql_fetch_array($userListRes, MYSQL_ASSOC)){
    $userListArray[$i] = $userList;
    $i++;
}

print "<table style='border: 1px solid black'>";

foreach($userListArray[0] as $x => $y){
    print "<td style='border: 1px solid black; padding: 10px'>".$x."</td>";
}

for($i = 0; $i < count($userListArray); $i++){
	
    print "<tr>";

    foreach($userListArray[$i] as $x => $y){
        print "<td style='border: 1px solid black; padding: 10px'>".$y."</td>";
    }

    print "</tr>";

}
print "</table>";

?>
