<?php require('head-Site.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('../components/head.php'); ?>
</head>

<body>
    <?php require('../components/sidebar.php'); ?>

    <?php require('../components/sidebar_sous_site.php'); ?>
    <div class="pl-72 sm:ml-64 flex flex-col">
        <div class="flex flex-row">
            <div class="w-52 h-52">
                <img class="w-full h-full" src="<?php echo $urlDuSite ?>" alt="Logo BDC" />
            </div>
            <h2 class="self-center">
                <?php echo $nomDuSite ?>
            </h2>
        </div>
        <div class="flex">
            <p>élément 1</p>
            <p>élément 2</p>
            <p>élément 3</p>
        </div>
    </div>
</body>

</html>