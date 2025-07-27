 <div class="main__title">
    {{ __('curriculum.projects', [], $lang) }}
</div>

@foreach($projects as $project)
<div class="main__list">
    <span class="list__title"> {{ $project['name'] }} </span>
    <span class="list__content"> {{ $project['curriculum_' . $langDB] }}. </span>
    <span class="list__url"> <strong> url: </strong> {{ $project['url'] }} </span>
    <span class="list__languages">
        <span class="list__languages__title"> {{ __('curriculum.usedLanguages', [], $lang) }}: </span>
        <span class="list__languages__list"> {{ $project['skills'] }} </span> 
    </span>
</div>
@endforeach   