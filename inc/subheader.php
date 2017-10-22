<?php
    function showOnlyChecked() {
        if(isset($_GET["showOnly"])) {
        echo "checked";
        }
    }

    function sortBySelected($sortBy) {
        if(isset($_GET["sortBy"]) && $sortBy == $_GET["sortBy"]) {
            echo "selected";
        }
    }
    
    function searchValue() {
        if(isset($_GET["q"])) {
            echo 'value="' . $_GET["q"] . '"';
        }
    }
?>

<h1>
    <a href="projects.php"><?= $text->headerTitle ?></a>
</h1>

<div class="subheaderSearch">
   <div class="search">
        <input class="search" type="text" name="q" form="searchForm" placeholder="<?= $text->searchFor ?>" <?= searchValue() ?> >
    </div>
   <div class="sortBy">
        <label>
            <?= $text->sortBy; ?>
        </label>
        <select name="sortBy" form="searchForm" onchange="searchForm.submit();">
            <option value="dateAsc" <?= sortBySelected("dateAsc")?> ><?= $text->dateAsc ?></option>
            <option value="dateDesc" <?= sortBySelected("dateDesc")?> ><?= $text->dateDesc ?></option>
            <option value="titleAsc" <?= sortBySelected("titleAsc")?> ><?= $text->titleAsc ?></option>
            <option value="titleDesc" <?= sortBySelected("titleDesc")?> ><?= $text->titleDesc ?></option>
        </select>
    </div>
    <div class="showOnly">
           <label>
            <input type="checkbox" name="showOnly" form="searchForm" <?= showOnlyChecked() ?> onchange="searchForm.submit()">
            <?= $text->onlyStarred ?>
            </label>
    </div>
</div>