<?php
    
    require("inc/header.php");

?>
<!DOCTYPE html>
<html lang="da">

<head>
    <meta charset="UTF-8">
    <title>EAL - Projektportal</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"> 
    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico'/>
</head>

<body>
    <header>
       <?php require("inc/navigation.php"); ?>
    </header>

    <main class="frontpage">
        <section>
          <div class="container">
           <div class="frontpageHero">
            <h1><?= $text->frontpageTitle ?></h1>
            <a href="projects.php"><?= $text->frontpageSub ?></a>
            </div>
            </div>
        </section>
    </main>

    <footer class="frontpage">
        <?php require("inc/footer.php"); ?>
    </footer>

    <script src="js/scripts.js" type="application/javascript"></script>
</body>

</html>