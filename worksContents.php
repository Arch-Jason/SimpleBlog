<div class="paragraph">
    <div class="block">
        <?php
        $content = file($mainConf->worksDir . '/' . $_GET['WorkId'] . '/' . 'content.md', FILE_IGNORE_NEW_LINES);
        for ($i = 0; $i < count($content); $i++) {
            if (str_starts_with($content[$i], '#')) {
                echo ("<h2 id=\"" . substr($content[$i], 2) . "\">" . substr($content[$i], 2) . "</h2>"); //标题
            } else if (str_starts_with($content[$i], '![]')) { // image
                echo('<img alt="img" src="' . $mainConf->worksDir . '/' . $_GET['WorkId'] . '/' . substr($content[$i], 4, -1) . '" />');
            } else {
                echo ("<p>" . $content[$i] . "</p>"); //plain text
            }
        }
        ?>
    </div>
</div>