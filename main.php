<div class="paragraph">
<?php

    // get blog contents
    $blogContents = scandir($mainConf->dataDir);
    // $blogContents = array_diff($blogContents, array('.', '..')); //exclude dot directories
    usort($blogContents, function($a, $b) use($mainConf){
        return filectime($mainConf->dataDir . '/' . $b) - filectime($mainConf->dataDir . '/' . $a);
    });
    $blogContents = array_filter($blogContents, function($file) { //exclude hidden files
        return $file[0] !== '.';
    });
    foreach($blogContents as $dir) { //dir is the directory where content.md is stored
        echo('<div class="block">');
        $content = file($mainConf->dataDir . '/' . $dir . '/' . 'content.md', FILE_IGNORE_NEW_LINES);
        for ($i = 0; $i < count($content); $i++) {
            if (str_starts_with($content[$i], '#')) {
                echo ("<h2 id=\"" . substr($content[$i], 2) . "\">" . substr($content[$i], 2) . "</h2>"); //标题
            } else if (str_starts_with($content[$i], '![]')) { // image
                echo('<img alt="img" src="' . $mainConf->dataDir . '/' . $dir . '/' . substr($content[$i], 4, -1) . '" />');
            } else {
                echo ("<p>" . $content[$i] . "</p>"); //plain text
            }
        }
        echo('</div>');
    }
?>
</div>