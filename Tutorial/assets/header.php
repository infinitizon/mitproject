<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <?php
        foreach($styles as $stylesheet){
    ?>
    <link href="<?php echo $stylesheet; ?>" rel="stylesheet" type="text/css">
    <?php
        }
    ?>
</head>