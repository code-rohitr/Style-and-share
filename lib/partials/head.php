<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Style & Share</title>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <?php
        $libRoot = '.';
        $filenames = array('register', 'upload', 'feedback', 'style', 'login', 'navbar', 'products', 'admin', 'products', 'cart');
        if (in_array('admin', explode('/', $_SERVER["PHP_SELF"]))) {
            $libRoot = '..';
        }
        foreach ($filenames as $filename) {
            echo "<link rel='stylesheet' href='".$libRoot."/lib/css/".$filename.".css?v=".time()."'>";
        }
        ?>
    </head>
    <body>
        <?php include('nav.php'); ?>