<div class="main__title">
    {{ __('curriculum.profile', [], $lang) }}
</div>

<div class="main__content">
    @foreach($texts[$curriculumPresentacionID] as $text)
        <p> {{ $text['text_' . $langDB] }} </p>
    @endforeach
</div>