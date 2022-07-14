<?php
  
    // Store the file name into variable
    $file = "/public/static/africa_part_1.pdf";
    echo 'PDF file processing...' . '<br/>';
    $filename = "/public/static/africa_part_1.pdf";
    
    // Header content type
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Accept-Ranges: bytes');
    
    // Read the file
    @readfile($file);
    exit();
?>