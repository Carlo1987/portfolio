<div class="aside__block__title">
    {{ __('curriculum.skills', [], $lang) }}
</div>

<div style="margin-top: 10px;">

    <section class="skill__left">

        <div class="block__skill ">
            <p class="skill__title"> {{ $skillsTypes[$frontendTypeId]['name'] }} </p>

            <div class="skill__column">
                @foreach($skillsTypes[$frontendTypeId]['list'] as $language)
                    <span class="language"> {{ $language['name'] }} </span>
                @endforeach
            </div>
    
        </div>

    </section>



    <section class="skill__right">

        <div class="block__skill ">
            <p class="skill__title"> {{ $skillsTypes[$backendTypeId]['name'] }} </p>

            <div class="skill__column">
                @foreach($skillsTypes[$backendTypeId]['list'] as $language)
                    <span class="language"> {{ $language['name']  }} </span>
                @endforeach
            </div>
        </div>


        <div class="block__skill separate">
            <p class="skill__title"> {{ $skillsTypes[$databaseTypeId]['name'] }} </p>

            <div class="skill__column">
                @foreach($skillsTypes[$databaseTypeId]['list'] as $language)
                    <span class="language"> {{ $language['name']  }} </span>
                @endforeach
            </div>
        </div>



        <div class="block__skill separate">
            <p class="skill__title"> {{ $skillsTypes[$devopsTypeId]['name'] }} </p>

            <div class="skill__column">
                @foreach($skillsTypes[$devopsTypeId]['list'] as $language)
                    <span class="language"> {{ $language['name']  }} </span>
                @endforeach
            </div>
        </div>

    </section>

    <div class="clearfix"></div>

</div>