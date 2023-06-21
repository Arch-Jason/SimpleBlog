<?php
    //get works folder contents
    $workContents = scandir($mainConf->worksDir);
    usort($workContents, function($a, $b) use($mainConf){
        return filectime($mainConf->worksDir . '/' . $b) - filectime($mainConf->worksDir . '/' . $a);
    });
    $workContents = array_filter($workContents, function($file) { //exclude hidden files
        return $file[0] !== '.';
    });
?>

<div class="flexpara">
<?php
    foreach($workContents as $id) {
        $confFile = file_get_contents($mainConf->worksDir . '/' . $id . '/' . 'work.conf');
        $conf = json_decode($confFile);
?>

    <a href="/?page=Works&WorkId=<?php echo($id) ?>">
        <div class="box">
            <div class="img" style="background-image: url('<?php echo($mainConf->worksDir . '/' . $id . '/' . $conf->image); ?>')"></div>
            <div class="text">
                <p><?php echo($conf->title); ?></p>
            </div>
        </div>
    </a>
<?php } ?>
</div>
