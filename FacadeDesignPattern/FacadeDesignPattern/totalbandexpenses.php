<?php
 include_once('calcInterface.php');
 include_once ('civil model.php');

 class totalbandexpenses implements calcInterface
{
       function calculate($x,$y)
       {
        //    $this->x=$quantity;
        //    $this->y=$costpergram;
           $totalbandexpenses=$x+$y;
           return(echo 'the total band expense is = '.$totalbandexpenses);
       }
}
?>