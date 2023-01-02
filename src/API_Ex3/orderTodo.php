<?php

include 'DBconn.php';

class OrderTodo extends DBconn{

    function getOrders(){

        if(isset($_GET['company'])) {
            $result = $this->connect()->query('SELECT * FROM orders WHERE company =' . $_GET['company']);
        } else if(isset($_GET['date'])) {
            $result = $this->connect()->query('SELECT * FROM orders WHERE date >' . $_GET['date']);
        } else {
            $result = $this->connect()->query('SELECT * FROM orders');
        }
        
        return $result;
    }
}


