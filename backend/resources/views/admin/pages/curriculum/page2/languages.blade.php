<div class="aside__block__title">
    {{ __('curriculum.languages', [], $lang) }}
</div>


<div class="aside__inlineList">
    @foreach($languages as $language)
    <div class="row">
        <div class="row__title">
            {{ $language['text_' . $langDB] }}:
        </div>
        <div class="row__progress"> 
            <div class="progress" style="width: {{ $language['value'] }}"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    @endforeach
</div>