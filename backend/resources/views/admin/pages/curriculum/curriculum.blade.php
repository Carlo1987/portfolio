<?php 
$color_water = "rgb(95, 154, 209)";
$bg_progress = "rgb(152, 190, 225)";
$color_progress = "rgb(45, 108, 167)";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <title>Curriculum Full Stack Web Developer Loi Carlo</title>

    <style>

        .clearfix{ clear: both; }

        html,body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 14px;
            font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            background-color:   #EEEEEE
        }

        header{
            text-align: right;
            padding-top: 30px;
            padding-right: 40px;
        }

        #header__image{
            width: 46%;
        }

        .container{ 
            margin-top: 20px;
        }

        aside{
            float: left;
            width: 45%;
            height: 99%;
            margin-left: 30px;
            background-color: <?= $color_water ?>;
            color: white;
            border-radius: 2px;
        }

        .aside__page2{
            height: 97%;
            margin-top: 20px;
        } 

        .aside__header{
            width: 100%;
            height: 100px;
            position: relative;
        }

        .aside__image{
            position: absolute;
            right: 23%;
            top: -110px;
            width: 200px;
            border: 1px solid black;
            border-radius: 100px;
            box-shadow: 0px 0px 3px rgb(45, 41, 41);
        }

        .aside__title{
            width: 100%;
        }

        .aside__title span{
            display: block;
            width: 100%;
            text-align: center;
            font-size: 35px;
            letter-spacing: 2px;
            font-weight: bold;
        }

        .block{
            width: 85%;
            margin: 0 auto;
        }

        .separate{
            margin-top: 30px;
        }

        .aside__block__title{
            width: 100%;
            text-align: center;
            font-size: 20px;
            letter-spacing: 2px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 15px;
            padding-top: 5px;
            border-top: 2px solid white;
        }

        .aside__inlineList{
            margin-top: 10px;
            padding-left: 20px;
        }

        .row__title{
            font-weight: bold;
            float: left;
        }

        .row__data{
           float: right;
        }

        .row__progress{
            float: right;
            position: relative;
            width: 60%;
            height: 10px;
            margin-top: 8px;
            border-radius: 5px;
            background-color: <?= $bg_progress ?>;
        }

        .progress{
            position: absolute;
            z-index: 1;
            height: 10px;
            border-radius: 5px;
            background-color: <?= $color_progress ?>;
        }

        .progress__ita{
            width: 100%;
        }

        .progress__esp{
            width: 88%;
        }  
        
        .progress__eng{
            width: 50%;
        }

        .skill__left{ float: left; width: 50%;}
        .skill__right{ float: right; width: 50%; }

        .block__skill{
           width: 100%;
        }

        .skill__title{
            font-size: 18px;
            font-weight: bold;
            margin-top: 0px;
            margin-bottom: 0px;
            padding-left: 34px;
        }   

        .skill__column{ margin-top: 5px; }

        .language{ 
            display: block; 
            padding-left: 35px;
        }

        .list__aside{ padding-left: 9.5px; }

        main{
            float: right;
            width: 45%;
            margin-right: 25px;
            position: relative;
        }

        .main_page2{
            margin-top: 20px;
        }


        .main__block span{ display: block; }

        .main__title{
            width: 95%;
            padding: 10px;
            background-color: <?= $color_water ?>;
            color: white;
            font-size: 18px;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-align: center;
            border-radius: 2px;
        }


        .main__content{
            width: 98%;
            margin: 0 auto;
           
        }


        .main__list{ margin-top: 15px ;}


        .list__title{
            font-weight: bold;
        }

        .list__title::before{
            content: '•';
        }

        .list__url,
        .list__content{ padding-left: 10px; }


        .list__content{
            margin-top: 3px;
        }

        .list__languages{
            width: 95%;
            margin-left: 10px;
        }

        .list__languages__title{
            font-weight: bold;
        }

        #authorization{
            position: absolute;
            right: 25px;
            bottom: 50px;
            font-family:Arial, Helvetica, sans-serif;
        }

        #signature{
            width: 100px;
            border-radius: 10px;
        }
     

    </style>

</head>


<body>

    <header> 
        <img id="header__image" src="{{ asset('images/curriculum/miei_dati.png') }}" alt="my_name">    
    </header>


    <div class="container">

        <aside>

            <div class="aside__header">
                <img class="aside__image" src="{{ asset('images/curriculum/primo_piano.png') }}" alt="my_photo">
            </div>

            <div class="aside__title">
                <span> Full Stack </span>
                <span> Web Developer </span>
            </div>



            <div class="block">                                   <!-- contatti -->
                <div class="aside__block__title">
                    {{ __('curriculum.contacts', [], $lang) }}
                </div>


                <div class="aside__inlineList">

                    <div class="row">
                        <span class="row__title">
                            Web:
                        </span>
                        <span class="row__data"> 
                            {{ $contacts->web }}
                        </span>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row">
                        <span class="row__title">
                            Email:
                        </span>
                        <span class="row__data"> 
                            {{ $contacts->email }}
                        </span>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row">
                        <span class="row__title">
                            {{ __('curriculum.phone', [], $lang) }}:
                        </span>
                        <span class="row__data"> 
                            {{ $contacts->phone }}
                        </span>

                        <div class="clearfix"></div>
                    </div>

                    <div class="row">
                        <span class="row__title">
                            {{ __('curriculum.location', [], $lang) }}:
                        </span>
                        <span class="row__data"> 
                            {{ $contacts->location }}
                        </span>

                        <div class="clearfix"></div>
                    </div>

                </div>

            </div>



            <div class="block">                                    <!-- skills -->
                <div class="aside__block__title">
                  {{ __('curriculum.skills', [], $lang) }}
                </div>

                <div style="margin-top: 10px;">

                    <section class="skill__left">

                        <div class="block__skill ">
                            <p class="skill__title"> <?= $skills_data['frontend']['title'] ?> </p>

                            <div class="skill__column">
                                <?php foreach($skills_data['frontend']['languages'] as $language) : ?>
                                        <span class="language"> <?= $language ?> </span>
                                <?php  endforeach; ?>
                            </div>
                    
                        </div>

                    </section>



                    <section class="skill__right">

                        <div class="block__skill ">
                            <p class="skill__title"> <?= $skills_data['backend']['title'] ?> </p>

                            <div class="skill__column">
                                <?php foreach($skills_data['backend']['languages'] as $language) : ?>
                                        <span class="language"> <?= $language ?> </span>
                                <?php endforeach; ?>
                            </div>
                        </div>


                        <div class="block__skill separate">
                            <p class="skill__title"> <?= $skills_data['database']['title'] ?> </p>

                            <div class="skill__column">
                                <?php foreach($skills_data['database']['languages'] as $language) : ?>
                                        <span class="language"> <?= $language ?> </span>
                                <?php endforeach; ?>
                            </div>
                        </div>



                        <div class="block__skill separate">
                            <p class="skill__title"> <?= $skills_data['devops']['title'] ?> </p>

                            <div class="skill__column">
                                <?php foreach($skills_data['devops']['languages'] as $language) : ?>
                                        <span class="language"> <?= $language ?> </span>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </section>

                    <div class="clearfix"></div>

                </div>
               
            </div>

        </aside>




        <main>

            <div class="main__block">
                <div class="main__title">
                    <?= $profile['title'] ?>
                </div>
                <div class="main__content">
                    <p> <?= $profile['main'] ?> </p>
                    <p> <?= $profile['content'] ?> </p> 
                </div>
            </div>


            <div class="main__block">
                <div class="main__title">
                    <?= $experiences['title'] ?>
                </div>

                    <?php  foreach($experiences['experience'] as $experience) :  ?>

                        <div class="main__list">
                            <span class="list__title"> <?= $experience['name'] ?> </span>
                            <span class="list__url"> <?= $experience['date'] ?> </span>
                            <span class="list__content"> <?= $experience['content'] ?> </span>
                        </div>
                    
                    <?php endforeach; ?>
        
            </div>

        </main>


        <div class="clearfix"></div>

    </div>



    <div class="container">                                     <!-- seconda pagina -->
        <aside class="aside__page2">



            <div class="block">            <!-- corsi -->
                <div class="aside__block__title" style="border-top: transparent;">
                    <?= $courses['title'] ?>
                </div>

                    <?php  foreach($courses['courses'] as $course) :  ?>

                        <div class="main__list">
                            <div class="list__title" style="font-size: 13px;"> <?= $course['name'] ?> </div>
                            <div class="list__aside" style="font-size: 11px;"> <?= $course['date'] ?> </div>
                            <div class="list__content" style="font-size: 11px;"> <?= $course['content'] ?> </div>
                        </div>
                    
                    <?php endforeach; ?>

            </div>



            <div class="block">                                   <!-- linguaggi -->
                <div class="aside__block__title">
                  <?= $languages['title'] ?>
                </div>

                <div class="aside__inlineList">

                  <?php foreach($languages['languages'] as $language) : ?>

                    <div class="row">
                        <div class="row__title">
                            <?= $language['name'] ?>:
                        </div>
                        <div class="row__progress"> 
                            <div class="progress <?= $language['class'] ?>"></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <?php endforeach; ?>
                </div>

            </div>



        </aside>




        <main class="main_page2">

       
            <div class="main__block">
                <div class="main__title">
                    <?= $projects['title'] ?>
                </div>

                <?php  foreach($projects['projects'] as $project) :  ?>

                    <div class="main__list">
                        <span class="list__title"> <?= $project['name'] ?> </span>
                        <span class="list__content"> <?= $project['content'] ?>. </span>
                        <span class="list__url"> <strong> url: </strong> https://<?= $project['url'] ?> </span>
                        <span class="list__languages">
                            <span class="list__languages__title"> <?= $projects['languages'] ?>: </span>
                            <span class="list__languages__list"> <?= $project['languages'] ?> </span> 
                        </span>
                    </div>
                
                <?php endforeach; ?>   
            </div>


            <div id="authorization">
                <div>
                    <?= $curriculum['authorization']; ?>
                </div>
                <div style="text-align:right;">
                    <img id="signature" src="{{ asset('images/curriculum/firma.png') }}" alt="signature" >
                </div>

            </div>

          
           

        </main>

        <div class="clearfix"></div>
    </div>




</body>

</html>


