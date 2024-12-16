<?php
require_once('server.php');

if( isset($_POST['id'])){
    $id = $_POST['id'];
} elseif ( ! is_numeric($_POST['id']) ) {
    $id =  0;
} else {
    $id =  0;
}

// Get the last result
$query = "SELECT id, user, result, dices, comment
          FROM rolls
          WHERE id > $id
          ORDER BY id DESC
          LIMIT 1";
          
if ( $data = $db -> query( $query ) ){
    
    if ($x = $data -> fetch_object() ){
         
        $arr = array('user' => $x->user, 
                     'returned_id' => $x->id, 
                     'result' => $x->result, 
                     'dices' => $x->dices,
                     'comment' => $x->comment
                     );
                     
                    // Destiny points query
                    $d_query = "SELECT light, dark FROM destiny LIMIT 1";
                    if ( $data2 = $db -> query($d_query)){
                        if ($y = $data2 -> fetch_object() ){
                            $arr['light'] = $y ->light;
                            $arr['dark'] = $y ->dark;
                        }
                    } // destiny points query end
                     
            $db -> close();
            echo json_encode($arr);
        
    } else {
        
            // Destiny points query
            $d_query = "SELECT light, dark FROM destiny LIMIT 1";
            if ( $data2 = $db -> query($d_query)){
                if ($y = $data2 -> fetch_object() ){
                    $destiny_arr = array();
                    $destiny_arr['light'] = $y ->light;
                    $destiny_arr['dark'] = $y ->dark;
                }
            } // destiny points query end
            
    $db -> close();
    echo json_encode($destiny_arr);
    
    }
    
} else {
    die("Error ". $db->errno);
}







