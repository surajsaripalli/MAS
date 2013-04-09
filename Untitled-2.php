<title>LIST.php</title>
<?php
$response = array();
$response["product"] = array();
$con = mysql_connect("mysql2.000webhost.com","a6145713_suraj","Mas123");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("a6145713_ShopsAp", $con);
    
    $item = $_POST['productname'];
    $list = '"' . implode('","', $item) . '"';
    $place = $_POST["storename"];
    //echo $list ;
    //echo $place;
    $result = mysql_query("SELECT * FROM items WHERE name IN ($list) ORDER BY storeName");
    
   if (!empty($result)) {
        //echo mysql_num_rows($result); 
    while($count = mysql_fetch_array($result) )
        {
         if (mysql_num_rows($result) > 0) {
 
            $product = array();
            echo $product["name"];
            $product["name"] = $count["name"];
            $product["price"] = $count["price"];
            $product["storeName"] = $count["storeName"]; 
            
           
            
            $response["success"] = 1;
 
            // user node
            
 
            array_push($response["product"], $product);
 
            //echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "No product found result found though!!";
            echo json_encode($response);
        }
    }
    } else {
        $response["success"] = 0;
        $response["message"] = "No product found";
        echo json_encode($response);
   } 
    print_r(json_encode($response));
    

?>									
