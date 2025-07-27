<div class="main__title">
    {{ __('curriculum.experience', [], $lang) }}
</div>

@foreach($jobs as $job)
<div class="main__list">
    <span class="list__title"> {{ $job['name'] }} </span>
    <span class="list__url"> {{ $job['time'] }} </span>
    <span class="list__content"> {{ $job['text_' . $langDB] }}  </span>
</div>
@endforeach        