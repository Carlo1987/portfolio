@php
    $frontendTypeId = App\Enums\SkillEnum::Frontend->value;
    $backendTypeId = App\Enums\SkillEnum::Backend->value;
    $databaseTypeId = App\Enums\SkillEnum::Database->value;
    $devopsTypeId = App\Enums\SkillEnum::DevOps->value;

    $curriculumPresentacionID = App\Enums\TextEnum::curriculumPresentacion->value;
    $curriculumSignatureId = App\Enums\TextEnum::curriculumSignature->value;
@endphp


<!DOCTYPE html>
<html lang="{{ $lang }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ public_path('css/curriculum/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=DynaPuff:wght@400..700&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <title>Curriculum Full Stack Web Developer Loi Carlo</title>
</head>


<body>

    <header> 
        <img id="header__image" src="{{ public_path('images/curriculum/miei_dati.png') }}" alt="my_name">    
    </header>

    <div class="container">
        @include('admin.pages.curriculum.page1.index')
    </div>

    <div class="container">                                    
        @include('admin.pages.curriculum.page2.index')
    </div>
</body>

</html>


