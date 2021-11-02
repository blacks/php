<?php

$array = [];

$table = '<style> html,body,table,tr,th,td { font-size: 12px; } table, th, td { border-collapse: collapse; border:1px dashed black; white-space: nowrap;padding:3px; } </style>';
$table .= "<table>\n<tr><th>" . implode('</th><th>', array_keys($array[0])) . "</th></tr>\n";
foreach($array as $row) $table .= '<tr><td>' . implode('</td><td>', $row) . "</td></tr>\n";
$table .= '</table>';
