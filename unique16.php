<?php

function unique16() {
  $unique = explode(' ', microtime());
  $prefix = date('Ymd', $unique[1]);
  $postfix = '';
  $charSet = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charLen = strlen($charSet);
  $exValue = (date('his', $unique[1]) + $unique[0]) * 1000000;
  do {
    $postfix = $charSet[$exValue % $charLen] . $postfix;
    if ($exValue < $charLen) break;
    $exValue = (floor($exValue / $charLen));
  } while ($exValue > 0);
  return $prefix . $postfix;
}
