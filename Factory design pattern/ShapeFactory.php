<?php 
include_once ('tower.php');
include_once ('phase 1.php');
include_once ('phase 2.php');
include_once ('phase 3.php');
global $st;
  class ShapeFactory
  { 
     
    function getShape($st)
    {
        if($st === null)
        {
           return null;
        }		
        if($st === 1)
        {
           return new phase1();  
        }
        else if($st === 2 )
        {
           return new phase2();
        } 
        else if($st === 3)
        {
           return new phase3();
        }        
        return null;
    }
  }
?>