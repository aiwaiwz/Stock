<?php
	
$n = date('n') - 1; 
$tmp = range(1,12); 
$months = array_merge(array_slice($tmp, $n), array_slice($tmp, 0, $n)); // array of month numbers starting with current 

echo '<select>'; 
foreach($months as $m) { 
    $tmp = date('F', mktime(1,1,1,$m)); // full text month name 
    echo '<option value="'.$m.'">'.$tmp.'</option>'; 
} 
echo '</select>';  