    <div class="accordion accordion-flush" id="accordionSkills">
        <div class="accordion-item">
            <div class="row">
            @foreach($skillsTypes as $skillsType)
                <div class="col-sm-6">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $skillsType['id'] }}" aria-expanded="false" aria-controls="flush-collapse_{{ $skillsType['id'] }}">
                            {{ $skillsType['name'] }}
                        </button>
                    </h2>
                    <div id="flush-collapse_{{ $skillsType['id'] }}" class="accordion-collapse collapse" data-bs-parent="#accordionSkills">
                        <div class="accordion__body">                          
                            <table class="table__fullAccordion">
                            @foreach($skillsType['list'] as $skill)  
                                <tr>
                                    <td class="form-check"> 
                                        <input class="form-check-input" type="checkbox" id="check_{{ $skill['id'] }}">
                                        <label class="form-check-label" for="check_{{ $skill['id'] }}">
                                            <img class="table__image" src="{{ asset('images/skills/' . $skill['image']) }}" alt="image_{{ $skill['image'] }}"> 
                                            {{ $skill['name'] }}
                                        </label>
                                    </td>
                                </tr>
                            @endforeach
                            </table> 
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>    
    </div>