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
                                <td class="form-check d-flex align-items-center gap-1"> 
                                    <input class="form-check-input" type="checkbox" data-checkId="{{ $skill['id'] }}" id="check_{{ $skill['id'] }}">
                                    <img class="table__image" src="{{ asset('images/skills/' . $skill['image']) }}" alt="image_{{ $skill['image'] }}"> 
                                    {{ $skill['name'] }}
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


<script>
    document.addEventListener('DOMContentLoaded', function (){
        setDevLanguages();
    });

    function setDevLanguages(){
        const checkboxes = document.querySelectorAll('.form-check-input');
        checkboxes.forEach(checkboxe => {
            checkboxe.addEventListener('change',() => {
                const checkValue = checkboxe.getAttribute('data-checkId');
                let devLanguages = document.querySelector('#dev_languages').value != ''  
                                ? document.querySelector('#dev_languages').value.split(',')
                                : [];
                                
                if(checkboxe.checked){
                    if (!devLanguages.includes(checkValue)) {
                        devLanguages.push(checkValue);
                    }
                    document.querySelector('#dev_languages').value = devLanguages.join(',');
                }else{
                    let updatedDevLanguages = devLanguages.filter(e => e != checkValue);
                    document.querySelector('#dev_languages').value = updatedDevLanguages.join(',');
                }
            })
        })
        
    }
</script>
