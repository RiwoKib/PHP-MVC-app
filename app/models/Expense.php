<?php


/***
 * expense Model
 */

 class Expense extends Model
 {
    public function __construct()
    {   
        parent::__construct('expenses');
    }
}