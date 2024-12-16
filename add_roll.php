<?php
require_once('server.php');
require_once('dices.php');
$user = $_POST['user'];
$boost_number = $_POST['boost'];
$setback_number = $_POST['setback'];
$ab_number= $_POST['ab'];
$dif_number= $_POST['dif'];
$prof_number= $_POST['prof'];
$ch_number= $_POST['ch'];
$force_number= $_POST['force'];
$boost = new Boost();
$setback = new Setback();
$ab = new Ab();
$dif = new Dif();
$prof = new Prof();
$ch = new Ch();
$force = new Force();
// Boost
for( $i=1; $boost_number >= $i; $i++ ){
    $result .= $boost->result()."," ;
}
// Setback
for( $i=1; $setback_number >= $i; $i++ ){
    $result .= $setback->result()."," ;
}
// Ability
for( $i=1; $ab_number >= $i; $i++ ){
    $result .= $ab->result()."," ;
}
// Dificulty
for( $i=1; $dif_number >= $i; $i++ ){
    $result .= $dif->result()."," ;
}
// Proficiency
for( $i=1; $prof_number >= $i; $i++ ){
    $result .= $prof->result()."," ;
}
// Challenge
for( $i=1; $ch_number >= $i; $i++ ){
    $result .= $ch->result()."," ;
}
// Force
for( $i=1; $force_number >= $i; $i++ ){
    $result .= $force->result()."," ;
}
/*
// Send result to a database
if( $stmt = $db -> prepare("INSERT INTO rolls(user, result) VALUES(?, ?)") ) {
    $stmt -> bind_param("ss", $user, $result); 
    $stmt -> execute();
    $stmt -> close();
} else {
    die ("Błąd połączenia");
}
*/
$result_arr =  explode(',', $result);
echo "<hr>Array of all dice results<br>";
print_r( $result_arr );
// Sort in the right order (without blanks)
// and count given numbers
$ordered = [];
$success_count = 0; 
$failure_count = 0; 
$advantage_count = 0; 
$threat_count = 0; 
$triumph_count = 0; 
$despair_count = 0; 
$light_count = 0; 
$dark_count = 0; 
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'success') { 
        array_push( $ordered, $y );
        $success_count++;
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'failure') { 
        array_push( $ordered, $y );
        $failure_count++;
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'advantage') { 
        array_push( $ordered, $y );
        $advantage_count++;
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'threat') { 
        array_push( $ordered, $y );
        $threat_count++; 
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'triumph') { 
        array_push( $ordered, $y );
        $triumph_count++;
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'despair') { 
        array_push( $ordered, $y );
        $despair_count++; 
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'light') { 
        array_push( $ordered, $y );
        $light_count++;
    }
}
foreach ( $result_arr as $x=>$y ) {
    if ($y == 'dark') { 
        array_push( $ordered, $y );
        $dark_count++; 
    }
}
echo "<hr>After ordered<br>";
print_r($ordered);
// Compare negative and positive results
$success_count = $success_count - $failure_count;
$advantage_count = $advantage_count - $threat_count;
echo "total success ".$success_count;
echo "<br>";
echo "total advantage ".$advantage_count;
echo "<hr><br>";
// Present results
if ($success_count > 0 ){
    for($i=0; $success_count > $i; $i++){
        echo "SUCCESS<br>";
    } 
} elseif ($success_count < 0 ) {
        for($i=0; abs($success_count) > $i; $i++){
        echo "FAILURES<br>";
    } 
}
if ($advantage_count > 0 ){
    for($i=0; $advantage_count > $i; $i++){
        echo "ADVANTAGE<br>";
    } 
} elseif ($advantage_count < 0 ) {
        for($i=0; abs($advantage_count) > $i; $i++){
        echo "THREAT<br>";
    } 
}
for($i=0; $triumph_count > $i; $i++){
    echo "TRIUMPH<br>";
} 
    
for($i=0; $despair_count > $i; $i++){
    echo "DESPAIR<br>";
} 
for($i=0; $dark_count > $i; $i++){
    echo "DARK<br>";
} 
for($i=0; $light_count > $i; $i++){
    echo "LIGH<br>";
} 