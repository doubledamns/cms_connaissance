<?php require('head-Site.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>

    <?php require('../components/sidebar_sous_site.php'); ?>
    <div class="ml-96 pl-36">
        <div class="w-52 h-52">
            <img class="w-full h-full" src="<?php echo $urlDuSite?>" alt="Logo BDC">
            <h2><?php echo $nomDuSite?></h2>
        </div>
    </div>
</body></html>