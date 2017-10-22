<?php

    if(isset($_GET["sortBy"])) {
        switch($_GET["sortBy"]) {
            case "dateAsc":
                usort($results, function($a, $b) {
                    return strtotime($a->dateFinished) > strtotime($b->dateFinished) ? -1 : 1;
                });
                break;
            case "dateDesc":
                usort($results, function($a, $b) {
                    return strtotime($a->dateFinished) < strtotime($b->dateFinished) ? -1 : 1;
                });
                break;
            case "titleAsc":
                usort($results, function($a,$b) {
                    return strnatcasecmp($a->title,$b->title);
                });
                break;
            case "titleDesc":
                usort($results, function($a,$b) {
                    return !strnatcasecmp($a->title,$b->title);
                });
                break;
        }
    } else {
        usort($results, function($a, $b) {
            return strtotime($a->dateFinished) > strtotime($b->dateFinished) ? -1 : 1;
        });
    }

    $resultsNumber = count($results);
            
    if($resultsNumber == 1) {
        $resultsNonPlural = $text->result;
    } else {
        $resultsNonPlural = $text->results;
    }
    
    function isStarred() {
        if($result->starred == true) { ?>
           <img src="images/starred.svg">    
        <?php }
    }

    function reformatDate($date) {
        echo strftime("%B %Y", strtotime($date));
    }

    function showTags($tags) {
        foreach($tags as $tag) {
            echo "<span class='tags'>" . $tag . "</span> ";
        }
    }

?>
    <span class="resultsNumber">   <?php 
    if ($resultsNumber == count($json->projects)) {
        echo "Viser " . $resultsNumber . " " . $text->projectsLower;
    } else if (isset($_GET["q"]) && $_GET["q"] != "") {
        echo  $text->yourSearchq . $_GET["q"] . $text->yourSearchq2 . $resultsNumber . " " . $resultsNonPlural;
    } else {
        echo  $text->yourSearch . $resultsNumber . " " . $resultsNonPlural;
    }

?>
</span>
<div class="results">
<?php
    foreach ($results as $result) {
    ?>
       <div class="result <?= $result->universe ?> <?= $result->starred ?>">
           <?php
               if($result->starred == true) { ?>
                   <div class="ribbon"><span>POPULAR</span></div>
               <?php } ?>
            <a href="#">
               <div class="resultText">
                <img src="images/<?= $result->universe ?>.svg">
                <span class="education"><?= $result->education ?></span>
                <h4><?= $result->title ?></h4>
                <p><?= $result->description ?></p>
                <p><?= reformatDate($result->dateFinished) ?></p>
                <p class="tags"><?= showTags($result->tags) ?></p>
                <a href="#" class="seeProject"><?= $text->seeProject ?></a>
                </div>
            </a>
        </div>
    <?php } ?>
</div>