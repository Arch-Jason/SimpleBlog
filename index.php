<?php
    $mainConfFile = file_get_contents('main.conf'); //load the main conf
    $mainConf = json_decode($mainConfFile, false);

    $sidePagesConfFile = file_get_contents('sidePages.conf'); //load the side pages
    $sidePagesConf = json_decode($sidePagesConfFile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($mainConf->title) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head" style="background-image: url('<?php echo($mainConf->head) ?>');">
        <h1><?php echo($mainConf->title) ?></h1>
        <div id="infoButton">
            <i class="fa fa-info-circle" style="font-size: 1.8em; text-decoration: underline;">About Me</i>
        </div>
    </div>

    <nav class="nav" id="nav">
        <a href="/"><div>Home Page</div></a>
        <?php
            foreach($sidePagesConf as $key => $value) {
                // echo('<a href="' . '/?page=' . $key . '&WorkId="' . '><div>' . $value->name . '</div></a>');
                echo('<a href="' . '/?page=' . $key . '"><div>' . $value->name . '</div></a>');
            }
        ?>
    </nav>

    <div class="content">
        
        <div id="asideInfo" class="aside">
            <div class="avatar">
                <img src="<?php echo($mainConf->avatar) ?>" alt="Avatar">
                <p><?php echo($mainConf->name) ?></p>
            </div>
            
            <div class="personIntro">
                <p><?php echo($mainConf->intro) ?></p> 
            </div>
        </div>

        <?php
            parse_str($_SERVER['QUERY_STRING'], $query);
            if($_SERVER['QUERY_STRING'] == '') {
                include('main.php');
            // } else if($query['page'] == 'Works') {
            //     if($query['WorkId'] != '') {
            //         include('worksContents.php');
            //     } else {
            //         include('works.php');
            //     }
            } else {
                include($sidePagesConf->{$query['page']}->page);
            }
        ?>

    </div>

    <div class="footer">
        <p><?php echo($mainConf->footer) ?></p>
    </div>
<script src="script.js" defer></script>
</body>
</html>
