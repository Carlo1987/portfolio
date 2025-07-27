<div class="aside__block__title" style="border-top: transparent;">
    {{ __('curriculum.courses', [], $lang) }}
</div>

@foreach($courses as $course)
    <div class="main__list">
        <div class="list__title" style="font-size: 13px;"> {{ $course['name'] }} </div>
        <div class="list__aside" style="font-size: 11px;"> {{ $course['time'] }} - {{ $course['date'] }} </div>
        <div class="list__content" style="font-size: 11px;"> {{ $course['text_' . $langDB] }} </div>
    </div>
@endforeach