<?php
 include_once('calcInterface.php');
 include_once ('civil model.php');

 class quantity implements calcInterface
{
       function calculate($x,$y)
       {
        //    $this->x=$dimention;
        //    $this->y=$Type;
           $quantity=$x/$y;
           return(echo 'the total quantity = '.$quantity);
       }
}
?>