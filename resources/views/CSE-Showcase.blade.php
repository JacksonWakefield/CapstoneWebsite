<head>
    <link rel="stylesheet" href="<?php echo asset('/css/cse-showcase.css')?>" type="text/css">
</head>


<body>
<!-- SHOWCASE COMPONENT !-->
    <?php foreach(array(1,2,3,4,5,6,7,8,9) as &$value): ?>
    <section class="showcase-single">
        <div class="showcase-single-wrapper">
            <div class="showcase-single-yt-wrapper individual-wrapper">
                <!-- <a href="https://www.youtube.com/watch?v=ZAQwg4BtbYo"></a> *TODO: replace with youtube wrapper* !-->
                <img id="yt-link" src="<?php echo asset('/images/sample-image-yt.jpg')?>"></img>
                <p class="showcase-single-yt-p">
                    Team Members are:
                </p>
                <p class="showcase-single-yt-p">
                    Jackson Wakefield, Jacob Licko, Jon Doe, Princess Diana
                </p>
            </div>
            <div class="showcase-single-description-wrapper individual-wrapper">
                <h2 class="showcase-single-description-title">
                    CSE 486 Sample Project
                </h2>
                <p class="showcase-single-description-p">
                    This is the sample text for a CSE 486 project. In this project nothing actually happens.
                    In fact, this project is in a limital space in between being - meaning that it constantly
                    fluctuates between existing and not existing - an eternal torture of sorts. Like a vivid
                    dream that lasts forever. 
                </p>
            </div>
        </div>

    </section>
    <section class="divider-single ">
        <div class="divider individual-wrapper">
        </div>
    </section>
    <?php endforeach ?>

</body>