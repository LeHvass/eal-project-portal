<?php
    
    if(isset($_GET["q"])) {
        define("query", $_GET["q"]);
    }
    if(isset($_GET["uni"])) {
        define("searchUni", $_GET["uni"]);
    }
    if(isset($_GET["sem"])) {
        define("searchSem", $_GET["sem"]);
    }
    if(isset($_GET["edu"])) {
        define("searchEdu", $_GET["edu"]);
    }
    if(isset($_GET["title"])) {
        define("searchTitle", $_GET["title"]);
    }
    if(isset($_GET["stage"])) {
        define("searchStage", $_GET["stage"]);
    }
    if(isset($_GET["from"])) {
        define("searchFrom", $_GET["from"]);
    }
    if(isset($_GET["to"])) {
        define("searchTo", $_GET["to"]);
    }
    if(isset($_GET["tag"])) {
        define("searchTag", $_GET["tag"]);
    }
    if(isset($_GET["showOnly"])) {
        define("showOnly", $_GET["showOnly"]);
    }

    $results = array();
    $resultsNumber = 0;

    $content = file_get_contents("json/projects.json");
    $json = json_decode($content);

    $educations = $json->educations;
    define("universes", $json->universes);
    $semesters = $json->semesters;
    $months = $text->months;
    $years = $text->years;
    $stages = $json->stages;
    $tags = $json->tags;

    function activeCriteria() {
        if(isset($_GET["uni"])) {
            echo 'showFields("universe");';
        }
        if(isset($_GET["edu"])) {
            echo 'showFields("education");';
        }
        if(isset($_GET["sem"])) {
            echo 'showFields("semester");';
        }
        if(isset($_GET["tag"])) {
            echo 'showFields("tags");';
        }
        if(isset($_GET["fromMonth"]) || isset($_GET["toMonth"]) || isset($_GET["fromYear"]) || isset($_GET["toYear"])) {
            echo 'showFields("period");';
        }
    }

    function my_filter($object)
        {
            $result = true;
        
            if (isset($_GET["q"]) && $_GET["q"] != "" && $result == true) {
                $result = false;
                $result = !$result && (
                    stripos($object->title, query) !== false ||
                    stripos($object->description, query) !== false ||
                    in_array(strtolower(query), array_map('strtolower', $object->members)) !== false
                );
            }
        
            if (isset($_GET["uni"]) && $result == true) {
                $result = false;
                foreach(searchUni as $universe) {
                    if($result == false) {
                        $result = !$result && $universe == $object->universe;
                    }
                }
            }
        
            if (isset($_GET["edu"]) && $result == true) {
                $result = false;
                foreach(searchEdu as $education) {
                    if($result == false) {
                        $result = !$result && $education == $object->education;
                    }
                }
            }
        
            if (isset($_GET["sem"]) && $result == true) {
                $result = false;
                foreach(searchSem as $semester) {
                    if($result == false) {
                        $result = !$result && $semester == $object->semester;
                    }
                }
            }
        
            if ((isset($_GET["fromYear"]) || isset($_GET["toYear"])) && $result == true) {
                $result = false;
                
                if(isset($_GET["fromYear"])) { $fromYear = strtotime("01-01-" . $_GET["fromYear"]); }
                if(isset($_GET["toYear"])) { $toYear = strtotime("31-12-" . $_GET["toYear"]); }
                $projectDate = strtotime($object->dateFinished);
                if(!isset($_GET["fromYear"])) {
                    $result = !$result && ($projectDate < $toYear);
                } else if (!isset($_GET["toYear"])) {
                    $result = !$result && ($projectDate > $fromYear);
                } else {
                $result = !$result && ($projectDate < $toYear && $projectDate > $fromYear);
                }
            }
        
            if (isset($_GET["tag"]) && $result == true) {
                $result = false;
                foreach(searchTag as $tag) {
                    if($result == false) {
                        $result = !$result && in_array($tag, $object->tags) !== false;
                    }
                }
            }
        
            if (isset($_GET["showOnly"]) && $result == true) {
                $result = false;
                $result = !$result && $object->starred == true;
            }
        
            return $result;
        }

    $results = array_filter($json->projects, "my_filter");