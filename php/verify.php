<?php

function isAlpha($value) {
     return 1 === preg_match('/^[a-zA-Z]*$/', $value);
}

function isAlphanumeric($value) {
     return 1 === preg_match('/^[a-zA-Z0-9]*$/', $value);

function isIntval($value) {
     return 1 === preg_match('/^[+-]?[0-9]+$/', $value);
}

function isNatural($val, $acceptzero = false) {
 $return = ((string)$val === (string)(int)$val);
 if ($acceptzero)
  $base = 0;
 else
  $base = 1;
 if ($return && intval($val) < $base)
  $return = false;
 return $return;
}

?>