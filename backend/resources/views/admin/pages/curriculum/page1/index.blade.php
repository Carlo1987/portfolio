<aside>

    <div class="aside__header">
        <img class="aside__image" src="{{ public_path('images/curriculum/primo_piano.png') }}" alt="my_photo">
    </div>

    <div class="aside__title">
        <span> Full Stack </span>
        <span> Web Developer </span>
    </div>



    <div class="block">                                  
        @include('admin.pages.curriculum.page1.contacts')
    </div>


    <div class="block">                                   
        @include('admin.pages.curriculum.page1.skills')
    </div>

</aside>




<main>

    <div class="main__block">
        @include('admin.pages.curriculum.page1.presentacion')
    </div>


    <div class="main__block">
        @include('admin.pages.curriculum.page1.jobs')
    </div>

</main>

<div class="clearfix"></div>