<?php

  $a = 7;

  /*
  if($a == 5) {
  } else if($a == 6){
  } else{
  }
  */

  Switch($a){

    case 5:
      echo 'Variable a is 5';
    break;

    case 6:
      echo 'Variable a is 6';
    break;

    case $a % 4 == 3:
      echo 'Variable a mod4 is 3';
    break;

    default:
      echo 'Variable a is unknown';
    break;
  }

?>
