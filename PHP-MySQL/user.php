<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "demo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "";

if(isset($_POST['type']) && $_POST['type'] != "placeOrder"){

    if($_POST['type'] == "getUserInfo"){

        if($_POST['user_type'] == "Customer"){
            $query = "SELECT cust.id, cust.firstname, cust.lastname, cust.city_id, c.name AS city, c1.name as country FROM customers cust LEFT JOIN city c ON cust.city_id = c.id left join country c1 on c.country_id=c1.id where cust.id=" . $_POST['user_id'];
        }else if($_POST['user_type'] == "Employee"){
            $query = "SELECT e.id, e.firstname, e.lastname, e.office_code, c.name AS city, c.state AS state, c1.name AS country FROM employees e LEFT JOIN office o ON e.office_code = o.id LEFT JOIN city c ON o.city_id = c.id LEFT JOIN country c1 ON c.country_id = c1.id where e.id=" . $_POST['user_id'];
        }else{
            $res['error'] = "Invalid data";
            echo json_encode($res);
        }

    }else if($_POST['type'] == "getOrders"){
        
        if($_POST['customer_id']){
            $query = "SELECT o.id AS order_id, p.*, o.quantity as quantity, (o.quantity * p.price) total_price FROM orders o LEFT JOIN products p ON o.product_id = p.id where o.customer_id=" . $_POST['customer_id'];
        }else{
            $res['error'] = "Invalid data";
            echo json_encode($res);
        }
        
    }else if($_POST['type'] == "getEmployees"){
        
        $query = "SELECT e.id, e.firstname, e.lastname, e.office_code, c.name AS city, c.state AS state, c1.name AS country FROM employees e LEFT JOIN office o ON e.office_code = o.id LEFT JOIN city c ON o.city_id = c.id LEFT JOIN country c1 ON c.country_id = c1.id";

        // $query = "select * from employees";
    
    }else if($_POST['type'] == "getProducts"){
        
        $query = "SELECT * FROM products";
    
    }

    $result = mysqli_query($conn, $query);
    $res = [];
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($res, $row);
        }
        echo json_encode($res);
    }else{
        $res['error'] = "0 results";
        echo json_encode($res);
    }

}else if($_POST['type'] == "placeOrder"){

    $query = "INSERT INTO orders(`date`, `status`, `customer_id`, `product_id`, `city_id`, `quantity`) VALUES ('".date("Y/m/d")."','".$_POST['status']."','".$_POST['customer_id']."','".$_POST['product_id']."','".$_POST['city_id']."','".$_POST['quantity']."')";
    // echo json_encode($_POST);
    // echo $query;
    if(mysqli_query($conn, $query)){
        $res['result'] = "Order is placed";
        echo json_encode($res);
    }else{
        $res['error'] = "Invalid data, unable to place order";
        echo json_encode($res);
    }

}else{
    $res['error'] = "Invalid data";
    echo json_encode($res);
}

?>