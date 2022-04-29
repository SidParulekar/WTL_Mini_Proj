
<?php

$conn = mysqli_connect("localhost", "root", "m@ngesh1", "mhprof");
$condition="";

$ctr=0;
$len = count($_POST)-1;

foreach($_POST as $value)
{
    if($ctr!==$len)
    {
        $condition = $condition."'".$value."',";
    }
    else{
        $condition = $condition."'".$value."'";
    }
    $ctr++; 
}

$result = mysqli_query($conn, "select mhdoc.professional, name, Address1, Address2, Address3, phone, website from mhdoc natural join conditions where conditions.cond in (".$condition.")");

$data = array();

while($row = mysqli_fetch_assoc($result))
{
    $data[] = $row;
}

echo json_encode($data);

?>




