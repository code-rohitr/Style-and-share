<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Style & Share</title>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
        <?php
        $libRoot = '.';
        $filenames = array('register', 'upload', 'feedback', 'style', 'login', 'navbar', 'products', 'admin');
        if (in_array('admin', explode('/', $_SERVER["PHP_SELF"]))) {
            $libRoot = '..';
        }
        foreach ($filenames as $filename) {
            echo "<link rel='stylesheet' href='".$libRoot."/lib/css/".$filename.".css?v=".time()."'>";
        }
        ?>
        
        <link rel="stylesheet" href="<?php echo $libRoot; ?>/lib/css/upload.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo $libRoot; ?>/lib/css/feedback.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo $libRoot; ?>/lib/css/style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo $libRoot; ?>/lib/css/login.css?v=<?php echo time(); ?>">
        <!-- <link rel="stylesheet" href="./lib/css/products.css?v=<?php echo time(); ?>"> -->
        <link rel="stylesheet" href="<?php echo $libRoot; ?>/lib/css/navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?php echo $libRoot; ?>/lib/css/navbar.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <?php include('nav.php'); ?>