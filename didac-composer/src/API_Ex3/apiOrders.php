<?php

include 'orderTodo.php';

class ApiOrders{

    function getAll()
    {
        $orderTodo = new OrderTodo();
        $orderTodos = array();
        $orderTodos['register'] = array();

        $result = $orderTodo->getOrders();

        if($result->rowCount()) {
            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $register = array(
                    'id_order' => $row['id_order'],
                    'date' => $row['date'],
                    'company' => $row['company'],
                    'qty' => $row['qty'],
                );
                array_push($orderTodos['register'], $register);
            }

            http_response_code(200);
            echo json_encode($orderTodos);
        }else{
            http_response_code(404);
            echo json_encode(array('message' => 'Element not found'));
        }
    }
}

$api = new ApiOrders();
$api->getAll();
