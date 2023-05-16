<?php
require_once("../config/functions.php");
session_start();

if(empty($_SESSION)) {
    header('location: /talent/controllers/LoginController.php');
}

$dataSearch = array();

if(!empty($_POST)) {
    if((isset($_POST['title']) && !empty($_POST['title']))) {
        $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
        ); 
        $title = clearLink($_POST["title"]);
        $year = "";
        $sort = clearData($_POST["sort_by"]);
        if(isset($_POST['date_init']) && !empty($_POST['date_init'])){$year = "&y=".clearInt($_POST['date_init']);}
        
        $data = file_get_contents("https://www.omdbapi.com/?s=".$title.$year."&apiKey=fc59da33", false, stream_context_create($arrContextOptions));
        $data = json_decode($data, true);

        if ($sort == "ta") {
            usort($data["Search"], "sortTitle");
        } else if ($sort == "td") {
            usort($data["Search"], "sortTitleDesc");
        } else if ($sort == "da") {
            usort($data["Search"], "sortDate");
        } else if ($sort == "dd") {
            usort($data["Search"], "sortDateDesc");
        }
        $dataSearch = $data["Search"];
    }
}

function sortDate($a, $b) {return strcmp($a["Year"], $b["Year"]);}
function sortDateDesc($a, $b) {return strcmp($b["Year"], $a["Year"]);}
function sortTitle($a, $b) {return strcmp($a["Title"], $b["Title"]);}
function sortTitleDesc($a, $b) {return strcmp($b["Title"], $a["Title"]);}

require_once('../views/dashboard/dashboard.view.php');