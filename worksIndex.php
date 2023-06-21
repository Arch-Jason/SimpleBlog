<?php
if(isset($query['WorkId']) ? $query['WorkId'] : null != '') {
    include('worksContents.php');
} else {
    include('works.php');
}
?>