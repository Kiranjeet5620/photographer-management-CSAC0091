<?php
if(isset($_POST['Del'])){//to run PHP script on submit
if(!empty($_POST['checkbox'])){
// Loop to store and display values of individual checked checkbox.
foreach($_POST['checkbox'] as $selected){
echo $selected."</br>";
}
}
}
?>