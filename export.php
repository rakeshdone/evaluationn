<?php
    include "db.php";
    header('content-type:text/csv');
    header('content-disposition:attachment;filename=resto.csv');

    $output=fopen("php://output","w");
    fputcsv($output, ["id","item_name","description","price","category","image","user_id"]);

    $result=$conn->query("select * from menu_item");
    while ($row=$result->fetch_assoc()) {
        fputcsv($output,$row);
    }
?>