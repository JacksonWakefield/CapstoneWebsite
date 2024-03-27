<head>
    <link rel="stylesheet" href="<?php echo asset('/css/survey.css')?>" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo asset('/css/header.css')?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('/css/footer.css')?>" type="text/css">
</head>


<body>
    <!-- HEADER !-->
    @include("header")
    <!-- END HEADER !-->

    <!-- SURVEY COMPONENT !-->
    
    
    <!--<div><?php 
    
    //if(DB::connection()->getPdo()){
    //    echo 'Successfully connected to Database with name: '.DB::connection()->getDatabaseName().'';
    //} debug - uncomment when unsure if connecting to database properly

    ?></div>!-->

    <form action="add" method="post">

        @csrf
        <div class="survey-wrapper">
            <div class="survey-wrapper-content">
            <!--survey questions !-->
                <div class="survey-header info-wrapper">
                    <h1 class="survey-header-title">Capstone Showcase Information Form: </h1>
                    <p class="survey-header-description">If you encounter issues with this form that prohibit you from submitting accurate information, email showcasewebsite@asu.edu with a detailed description of the problem.</p>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">ASU Email: </p>
                    <p class="survey-description">ASU Email of the person filling out the form (no other team emails)</p>
                    <input type="text" class="survey-input survey-input-short" placeholder="Your answer: " name="Email" value="{{old('Email')}}"></input>
                    <br/><span>@error('Email'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Project Title: </p>
                    <!--<p class="survey-description">sample description</p> !-->
                    <input type="text" class="survey-input survey-input-short" placeholder="Your answer: " name="ProjectTitle" value="{{old('ProjectTitle')}}"></input>
                    <br/><span>@error('ProjectTitle'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Project Description (3 sentences or less): </p>
                    <p class="survey-description">This is the text that will accompany your video thumbnail on the main webpage</p>
                    <input type="text" class="survey-input survey-input-long" placeholder="Your answer: " name="ProjectDescription" value="{{old('ProjectDescription')}}"></input>
                    <br/><span>@error('ProjectDescription'){{ $message }}@enderror</span>
                </div>
                
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Sponsor/Mentor: </p>
                    <p class="survey-description">If your team had a sponsor or mentor for your project, please list the organization or the individual. If you didn't have a sponsor, enter "NONE"</p>
                    <input type="text" class="survey-input survey-input-short" placeholder="Your answer: " name="Sponsor" value="{{old('Sponsor')}}"></input>
                    <br/><span>@error('Sponsor'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Team Members Full Names: </p>
                    <p class="survey-description">Please type out all team members full names, separated by a comas</p>
                    <input type="text" class="survey-input survey-input-long" placeholder="Your answer: " name="MemberNames" value="{{old('MemberNames')}}"></input>
                    <br/><span>@error('MemberNames'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">How many students on your team will be able to attend the showcase? </p>
                    <p class="survey-description"></p>
                    <input type="text" class="survey-input survey-input-short" placeholder="Your answer: " name="Attendance" value="{{old('Attendance')}}"></input>
                    <br/><span>@error('Attendance'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Course Number (Example: CSE486):</p>
                    <p class="survey-description"></p>
                    <input type="text" class="survey-input survey-input-short" placeholder="Your answer: " name="CourseNumber" value="{{old('CourseNumber')}}"></input>
                    <br/><span>@error('CourseNumber'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Will your group be bringing a demo? </p>
                    <p class="survey-description"></p>
                    <ul>
                        <li><input type="radio" name="Demo" class="survey-input-checkbox" value="Yes">Yes</input></li>
                        <li><input type="radio" name="Demo" class="survey-input-checkbox" value="No">No</input></li>
                    </ul>
                    <br/><span>@error('Demo'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">If so, will your group need access to power? </p>
                    <p class="survey-description">If you answered no to the previous question, select no here as well</p>
                    <ul>
                        <li><input type="radio" name="Power" class="survey-input-checkbox" value="Yes">Yes</input></li>
                        <li><input type="radio" name="Power" class="survey-input-checkbox" value="No">No</input></li>
                    </ul>
                    <br/><span>@error('Power'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">Does your group have an NDA?</p>
                    <p class="survey-description">If yes, your project information will potentially not be displayed in the showcase event/website - please reach out to your instructor for next steps</p>
                    <ul>
                        <li><input type="radio" name="NDA" class="survey-input-checkbox" value="Yes">Yes</input></li>
                        <li><input type="radio" name="NDA" class="survey-input-checkbox" value="No">No</input></li>
                    </ul>
                    <br/><span>@error('NDA'){{ $message }}@enderror</span>
                </div>
                <div class="survey-question info-wrapper">
                    <p class="survey-label">YouTube Video Link: </p>
                    <p class="survey-description">This is the YouTube link for the video overview of your project, and should have the graphic abstract you created as the thumbnail. The project name should be the title of the YouTube video. </p>
                    <input type="text" class="survey-input survey-input-long" placeholder="Your answer: " name="VideoLink" value="{{old('VideoLink')}}"></input>
                    <br/><span>@error('VideoLink'){{ $message }}@enderror</span>
                </div>

                <div class="survey-submit">
                    <button id="button-submit">Submit</button>
                </div>
            </div>
        </div>
    </form>

    <!-- END SURVEY COMPONENT !-->

    <!--FOOTER!-->
    @include("footer")
    <!-- END FOOTER !-->

</body>