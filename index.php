<?php
 include('lib.php');
 include('nastaveni.php');
?>
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <meta name="description" content="<?=$description?>">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600;800&family=Rajdhani:wght@700&display=swap" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="<?=$url?>/css/config.css">
    <link type="text/css" rel="stylesheet" href="<?=$url?>/css/libs.css">
    <link type="text/css" rel="stylesheet" href="<?=$url?>/css/style.css">
    <link type="text/css" rel="stylesheet" href="<?=$url?>/css/responsive.css">
    <link rel="icon" href="img/favicon.png" sizes="32x32" />
</head>
<body>
    <header id="anita-header" class="anita-header">
        <div class="anita-header-inner">
            <div class="anita-logo-wrapper">
                <a href="<?=$url?>" class="anita-logo is-retina">
                    <img src="<?=$url?><?=$logo?>" alt="<?=$title?>" width="192" height="80">
                </a>
            </div>
            <div class="anita-menu-wrapper">
                <a href="#" class="anita-menu-toggler">
                    <i class="anita-menu-toggler-icon"></i>
                </a>
            </div>
        </div>
    </header>
    <div class="anita-fullscreen-menu-wrap">test
        <nav class="anita-nav anita-js-menu"></nav>
    </div>
    <main class="anita-main">
        <div class="anita-gl-container-wrap anita-albums-listing anita-gl-carousel-gallery-wrap anita-scrollEW">
    		<div class="anita-gl-container anita-gl-carousel-gallery" data-prev-label="Předchozí" data-next-label="Další">
    		
                <div class="anita-gl-gallery-item is-image" data-src="<?=$url?>/img/pears.jpg" data-size="1440x1080">
                    <div class="anita-gl-gallery-item__content" data-aos="fade-up">
                        <span class="anita-meta anita-gl-gallery__meta"></span>
                        <h2 class="anita-gl-gallery__caption">
                           
                        </h2>
                        <span class="anita-gl-gallery__explore">Explore</span>
                    </div>
                </div>
            <?php
                $i = 1;
                foreach($videos as $video){
                    $ffmpeg_path = 'ffmpeg';
                    $file = 'videos/' . $video['file']; 
                    if (file_exists($file)) { 
                        $finfo = finfo_open(FILEINFO_MIME_TYPE);
                        $mime_type = finfo_file($finfo, $file); // check mime type
                        finfo_close($finfo);
                        if (preg_match('/video\/*/', $mime_type)) { 
                            $video_attributes = _get_video_attributes($file, $ffmpeg_path);
                            $dimmension = $video_attributes['width'] . ' x ' . $video_attributes['height'];
                        }else{
                            $dimmension = '1280x720';
                            
                        }
            ?>
                <div class="anita-gl-gallery-item is-video" data-src="<?=$url?>/<?=$file?>" data-size="1280x720">
                    <div class="anita-gl-gallery-item__content" data-aos="fade-up">
                        <span class="anita-meta anita-gl-gallery__meta"><?=$video['kat']?></span>
                        <h2 class="anita-gl-gallery__caption">
                            <sup><?=sprintf("%02d", $i);?>.</sup><?=$video['nadpis']?>
                        </h2><span class="anita-gl-gallery__explore">
                        <?=$video['popis']?></span>
                        <span class="anita-gl-gallery__explore">Více</span>
                        <a href="<?=$video['link']?>" class="anita-album-link"></a>
                    </div>
                </div>
            <?php
                $i++;
                    }

                }
            ?>
    		</div>
    	</div>
	</main>
    <footer id="anita-footer">
        <div class="anita-footer-inner">
            <div class="anita-copyright anita-js-copyright"></div>
            <div class="anita-socials anita-js-socials"></div>
        </div>
    </footer>
    <script src="js/lib/jquery.min.js"></script>
    <script src="js/lib/aos.min.js"></script>
    <script src="js/core.js"></script>
</body>
</html>
