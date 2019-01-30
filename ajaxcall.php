<?php
include 'action/dbcon.php';
$s = $_POST['s'];
$row = mysql_fetch_array(mysql_query("SELECT * FROM users left join profileupdate on users.id = profileupdate.uid WHERE users.sname LIKE '%".$s."%'"));
echo '

<tr>
   <td>'.$row['name'].'</td>
   <td>'.$row['email'].'</td>
   <td>
       <a href="profiles.php?uid='.$row['id'].'&email='.$_SESSION['email'].'" class="btn btn-primary btn-xs">view</a>
   </td>
</tr>
';