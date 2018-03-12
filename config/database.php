<?php
    header('Content-Type: application/json');

    $database["products"][] = array("id" => 12, "type" => "bb", "name" => "Broadband1", "description" => "50 MBPs / 5 devices", "price" => 40);
        
    $database["products"][] = array("id" => 16, "type" => "bb", "name" => "Broadband2", "description" => "60 MBPs / 8 devices", "price" => 60);
    
    $database["products"][] = array("id" => 18, "type" => "tv", "name" => "TV1", "description" => "60 HD + 2 Sports HD",  "price" => 50);
    
    $database["products"][] = array("id" => 10, "type" => "tv", "name" => "TV2", "description" => "80 HD + 4 Sports HD", "price" => 120);
    
    $database["products"][] = array("id" => 8, "type" => "ll", "name" => "Landline", "description" => "100 min", "price" => 35);
        
    $database["products"][] = array("id" => 14, "type" => "addon", "name" => "AddonTV", "description" => "2 Movies HD","price" => 0);
    
    $database["products"][] = array("id" => 21, "type" => "addon", "name" => "AddonBB", "description" => "Mobile 4G 500MB", "price" => 10);

    $database["addons"][] = array("type" => "tv", "id" => 14);
    
    $database["addons"][] = array("type" => "bb", "id" => 21);
    
    $database["bundles"][] = array("mainProduct" => 16, "products" => array(array("product" => 18, "additional" => -10),
                                                                                    array("product" => 8, "additional" => -40),
                                                                                    array("product" => 10, "additional" => -20),
                                                                                    array("product" => 21, "additional" => -10)
                                                                                ));
    
    $database["bundles"][] = array("mainProduct" => 18, "products" => array(array("product" => 14, "additional" => 35),
                                                                                    array("product" => 8, "additional" => -10),
                                                                                    array("product" => 16, "additional" => -10)
                                                                                ));
    
    $database["bundles"][] = array("mainProduct" => 12, "products" => array(array("product" => 8, "additional" => -40),
                                                                                    array("product" => 21, "additional" => 0)
                                                                                ));    
    
    $database["bundles"][] = array("mainProduct" => 8, "products" => array(array("product" => 12, "additional" => -40),
                                                                                    array("product" => 10, "additional" => -30),
                                                                                    array("product" => 16, "additional" => -40),
                                                                                    array("product" => 18, "additional" => -10)
                                                                                ));
    
    $database["bundles"][] = array("mainProduct" => 10, "products" => array(array("product" => 8, "additional" => -30),
                                                                                    array("product" => 16, "additional" => -20),
                                                                                    array("product" => 14, "additional" => 15)
                                                                                ));

    echo json_encode($database);
?>