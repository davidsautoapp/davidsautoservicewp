<?php
function phone_formater($phone) {
  $phone = (int)$phone;
  $base4  = (string)$phone % 10000;
  $base3  = (string)(($phone/10000) % 1000);
  $area   = (string)(($phone/(10000*1000)) % 1000);
  return  '+1' . ' (' . $area . ') ' . $base3 . '-' . $base4; 
}