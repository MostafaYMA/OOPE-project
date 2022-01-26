<?php
 include_once('calcInterface.php');
 include_once ('civil model.php');

 class costpergram implements calcInterface
{
       function calculate($x,$y)
       {
        //    $this->x=$quantity;
        //    $this->y=$UnitPrice;
           $costpergram=$x*$y;
           return(echo 'the total cost per gram = '.$costpergram);
       }
}
?>