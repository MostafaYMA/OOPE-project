<?php
 include_once('calcInterface.php');
 include_once ('civil model.php');
 include_once('totalbandexpenses.php');
 include_once ('costpergram.php');
 include_once ('quantity.php');

 class quantity implements calcInterface
{
       function calculate($x,$y)
       {
           $this->x=$dimention;
           $this->y=$Type;
           $quantity=$x/$y;
           return(echo 'the total quantity = '.$quantity)
       }
}
class calculator
{
    public $quantity;
    public $costpergram;
    public $totalbandexpenses;
    function __construct() 
    {
        $this->quantity          = new quantity();
        $this->costpergram       = new costpergram();
        $this->totalbandexpenses = new totalbandexpenses();
    }
    function calc_quantity()
    {
        $this->quantity->calculate($x,$y);
    }
     function calc_costpergram()
    {
        $this->costpergram->calculate($x,$y);
    }
    function calc_totalbandexpenses()
    {
        $this->totalbandexpenses->calculate($x,$y);
    }
}
?>