<?php 

header('Content-disposition: attachment;filename=' . $filename);
echo html_entity_decode($raw); 

?>