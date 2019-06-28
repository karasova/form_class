<?php
    include "form_class.php";

    $deletefiles = $_POST['deletes'];
    $files = array();
    $form = new Form;
    $i = 0;
    array_push($files, array());
    $files[$i] = new Form;
    
    while ($files[$i]->read_content($i)){
        array_push($files, array());
        $i++;
        $files[$i] = new Form;
    }

    unset($files[$i]);
        
    foreach ($deletefiles as $checkbox) {
		foreach ($files as $key) {
			if ($key->date == $checkbox) {
				$file[$i]->status = "deleted";
				$i = 0;
				break;
			}
            $i++;
            $key-> save_to_file();
		}
	}             
    


