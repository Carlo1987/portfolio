@extends('admin.index')

@section('pannels')

<!--     <div class="row">
        @foreach($skillsTypes as $skillsType)
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <h2> {{ $skillsType['name'] }} </h2>

                    @foreach($skillsType['list'] as $skill)
                        <p> {{ $skill['name'] }} </p>
                    @endforeach
                </div>
            </div>
        @endforeach
       
    </div> -->


    <div class="accordion accordion-flush" id="accordionSkills">
        <div class="accordion-item">
            @foreach($skillsTypes as $skillsType)
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $skillsType['id'] }}" aria-expanded="false" aria-controls="flush-collapse_{{ $skillsType['id'] }}">
                        {{ $skillsType['name'] }}
                    </button>
                </h2>
                @foreach($skillsType['list'] as $skill)
                    <div id="flush-collapse_{{ $skillsType['id'] }}" class="accordion-collapse collapse" data-bs-parent="#accordionSkills">
                        <div class="accordion-body">
                            {{ $skill['name'] }}
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection