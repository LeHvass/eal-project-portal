    <?php
        
function isChecked($value,$field) {
    if(isset($_GET["$field"])) {
        if(in_array($value,$_GET["$field"])) {
           echo "checked";
        }
    }
}

function selectMonth($months) {
    $monthNumber = 1;            
    
    foreach($months as $month) { ?>
   <option value="<?php prefixZero($monthNumber); ?><?= $monthNumber ?>"><?= $month ?></option>
       <?php
        $monthNumber++;
    }
}

function prefixZero($monthNumber) {
        if ($monthNumber < 10) {
            echo "0";
        }
    }

function selectYear($years,$type) {
    foreach($years as $year) { ?>
        <option value="<?= $year ?>" <?php if(isset($_GET[$type]) && $year == $_GET[$type]) {echo "selected";} ?>><?= $year ?></option>
    <?php
    }
}
?>
<form method="GET" action="" name="searchForm" id="searchForm">
    <fieldset id="universe">
        <h3 onclick="showFields('universe')"><?= $text->universe ?> <img src="images/icon-caret-blue-large.png"></h3>
           <div>
            <?php foreach(universes as $universe) { ?>
               <label><input type="checkbox" name="uni[]" value="<?= $universe ?>" <?= isChecked($universe,"uni") ?>> <?= $text->$universe ?></label>
            <?php } ?>
        </div>
    </fieldset>

    <fieldset id="education">
        <h3 onclick="showFields('education')"><?= $text->education ?> <img src="images/icon-caret-blue-large.png"></h3>
           <div>
            <?php
            foreach($educations as $education) { ?>
               <label><input type="checkbox" name="edu[]" value="<?= $education ?>" <?= isChecked($education,"edu") ?>>
                   <?= $education ?></label>
            <?php } ?>
        </div>
    </fieldset>

    <fieldset id="semester">
          <h3 onclick="showFields('semester')"><?= $text->semester ?> <img src="images/icon-caret-blue-large.png"></h3>
           <div>
           <?php foreach($semesters as $semester) { ?>
               <label><input type="checkbox" name="sem[]" value="<?= $semester?>" <?= isChecked($semester,"sem") ?>><?= $semester ?></label>
           <?php } ?>
            </div>
    </fieldset>

    <fieldset id="period">
        <h3 onclick="showFields('period')"><?= $text->period ?> <span title="<?= $text->periodExplanation ?>"><img src="images/information.svg"></span> <img src="images/icon-caret-blue-large.png"></h3>
      <label><?= $text->from ?></label><br>
       <select name="fromMonth">
         <option value="" disabled selected><?= $text->month ?></option>
          <?php selectMonth($months); ?>
       </select>
       <select name="fromYear">
            <option value="" disabled <?php if(!isset($_GET["fromYear"])) { ?>
 selected <?php } ?>><?= $text->year ?></option>
          <?php selectYear($years,"fromYear"); ?>
       </select>
        <br>
       <label><?= $text->to ?></label><br>
       <select name="toMonth">
            <option value="" disabled selected><?= $text->month?></option>
           <?php selectMonth($months); ?>
       </select>
        <select name="toYear">
            <option value="" disabled <?php if(!isset($_GET["toYear"])) { ?>
 selected <?php } ?>><?= $text->year ?></option>
            <?php selectYear($years,"toYear"); ?>
        </select>
    </fieldset>
    
    <fieldset id="tags">
        <h3 onclick="showFields('tags')"><?= $text->tags ?> <img src="images/icon-caret-blue-large.png"></h3>
        <div>
           <?php foreach($tags as $tag) { ?>
               <label><input type="checkbox" name="tag[]" value="<?= $tag?>" <?= isChecked($tag,"tag") ?>><?= $tag ?></label>
           <?php } ?>
            </div>
    </fieldset>

    <input type="submit" class="link-arrow" value='<?= $text->search ?>'>
    <br>
    <input type="reset" value='<?= $text->reset ?>' name='reset' onclick="return resetForm(this.form);">
</form>