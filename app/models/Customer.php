<?php


/***
 * Customer Model
 */

 class Customer extends Model
 {
    public function __construct()
    {   
        parent::__construct('categories');
    }
}