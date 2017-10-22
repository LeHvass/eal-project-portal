<?php
    
    require("inc/header.php");
    require("inc/search.php");

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

    <main class="projectPortal">
      <div class="container subheader">
       <?php require("inc/subheader.php"); ?>
        </div>
        <div class="container">
           <aside>
            <?php require("inc/form.php"); ?>
            </aside>

           <section>
            <?php require("inc/results.php"); ?>
            </section>
        </div>
    </main>

    <footer>
        <?php require("inc/footer.php"); ?>
    </footer>

    <script src="js/scripts.js" type="application/javascript"></script>
    <script type="application/javascript">
        <?= activeCriteria() ?>
    </script>
</body>

</html>