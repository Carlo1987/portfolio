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