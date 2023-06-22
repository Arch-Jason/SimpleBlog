<?php
if(!isset($_GET['WorkId'])) {
    include('works.php');
} else {
    include('worksContents.php');
}
?>