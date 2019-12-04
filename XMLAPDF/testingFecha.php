<?php
$mydate=getdate();
$auxFecha = "$mydate[year]".'-'."$mydate[mon]".'-'."$mydate[mday]".' '."$mydate[hours]".':'."$mydate[minutes]".':'."$mydate[seconds]";
echo "$auxFecha";

$localtime = localtime();
$localtime_assoc = localtime(time(), true);
print_r($localtime);
print_r($localtime_assoc);
?>