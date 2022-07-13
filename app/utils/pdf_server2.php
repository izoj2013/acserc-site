<?php
  
    // Store the file name into variable
    $file = '../../public/static/africa_part_2.pdf';
    $filename = '../../public/static/africa_part_2.pdf';
    
    // Header content type
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    
    // Read the file
    readfile($file);
    exit();
?>