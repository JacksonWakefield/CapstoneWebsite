<head>
    <link rel="stylesheet" href="<?php echo asset('/css/survey.css')?>" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
</head>


<body>
<!-- SHOWCASE COMPONENT !-->
    <div class="survey-wrapper">
        <div class="survey-wrapper-content">
        <!--survey questions !-->
            <div class="survey-header info-wrapper">
                <h1 class="survey-header-title">Capstone Showcase Information Form: </h1>
                <p class="survey-header-description">Description of this form will go here.</p>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">Capstone Group Name: </p>
                <!--<p class="survey-description">sample description</p> !-->
                <input type="text" class="survey-input-short" placeholder="Your answer: "></input>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">Name: </p>
                <p class="survey-description">Name of the person filling out the form (no other team names)</p>
                <input type="text" class="survey-input-short" placeholder="Your answer: "></input>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">Email: </p>
                <p class="survey-description">Email of the person filling out the form (no other team emails)</p>
                <input type="text" class="survey-input-short" placeholder="Your answer: "></input>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">label: </p>
                <p class="survey-description">sample description</p>
                <input type="text" class="survey-input-long" placeholder="Your answer: "></input>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">Does Your Project Have an NDA?: </p>
                <p class="survey-description">sample description</p>
                <ul>
                    <li><input type="radio" name="option" class="survey-input-checkbox">Yes</input></li>
                    <li><input type="radio" name="option" class="survey-input-checkbox">No</input></li>
            </ul>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">Project Description: </p>
                <p class="survey-description">Probably copy paste this from assignment description</p>
                <input type="text" class="survey-input-long" placeholder="Your answer: "></input>
            </div>
            <div class="survey-question info-wrapper">
                <p class="survey-label">Link to Group's Youtube Video: </p>
                <p class="survey-description">Some information to help them understand exactly what to submit (maybe a sample link sorta deal)</p>
                <input type="text" class="survey-input-short" placeholder="Your answer: "></input>
            </div>

            <div class="survey-submit">
                <button id="button-submit">Submit</button>
            </div>
        </div>
    </div>

</body>