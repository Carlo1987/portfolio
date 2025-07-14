@extends('admin.index')

@section('pannels')

    <div class="accordion accordion-flush" id="accordionSkills">
        <div class="accordion-item">
            <div class="row">
            @foreach($skillsTypes as $skillsType)
                <div class="col-lg-3 col-sm-6">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $skillsType['id'] }}" aria-expanded="false" aria-controls="flush-collapse_{{ $skillsType['id'] }}">
                            {{ $skillsType['name'] }}
                        </button>
                    </h2>
                    <div id="flush-collapse_{{ $skillsType['id'] }}" class="accordion-collapse collapse" data-bs-parent="#accordionSkills">
                        <div class="accordion__body">    
                            <div class="w-100 d-flex justify-content-end mb-2">
                                <div class="btnAdd btn btn-outline-success btn-sm me-4" data-bs-toggle="modal" data-bs-target="#storeSkillModal" 
                                    data-skillType="{{ $skillsType['id'] }}" data-skillsTypeLength ="{{ count( $skillsType['list'] ) }}">
                                    Aggiungi skill
                                </div>
                            </div>
                      
                            <table class="table__skills">
                            @foreach($skillsType['list'] as $skill)  
                                <tr>
                                    <td class="td__container"> 
                                        <img src="{{ asset('storage/skills/' . $skill['image']) }}" alt="image_{{ $skill['image'] }}" class="table__image"> 
                                        {{ $skill['name'] }} 
                                    </td>
                                    <td> {{ $skill['order'] }} </td>
                                    <td class="d-flex gap-2">
                                        <div class="btnEdit btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#storeSkillModal"
                                            data-id="{{ $skill['id'] }}" data-skillType="{ $skillsType['id'] }}" data-name="{{ $skill['name'] }}" data-order="{{ $skill['order'] }}" data-image="{{ $skill['image'] }}"> 
                                            @include('includes.buttons.button_update') 
                                        </div>
                                        <div class="btnDelete btn btn-outline-danger btn-sm" data-id="{{ $skill['id'] }}" data-name="{{ $skill['name'] }}"> 
                                            @include('includes.buttons.button_delete') 
                                        </div>
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
    @include('includes.toasts.toast')
    @include('admin.pages.skills.modal_store')
 
@endsection



<script type="module">

    const buttonsAdd = document.querySelectorAll('.btnAdd');
    const buttonsEdit = document.querySelectorAll('.btnEdit');
    const buttonsDelete = document.querySelectorAll('.btnDelete');

    const modalInputSkillId = document.querySelector('#id');
    const modalInputSkillType = document.querySelector('#skillType');
    const modalInputName = document.querySelector('#name');
    const modalInputOrder = document.querySelector('#order');
    const modalInputImage = document.querySelector('#image');

    addSkill();
    editSkill();


    function addSkill(){
        buttonsAdd.forEach(button => {
            button.onclick = function(){
                const data = {
                    skillId : null,
                    skillType : button.getAttribute('data-skillType'),
                    name : null,
                    order : parseInt(button.getAttribute('data-skillsTypeLength')) + 1,
                    image : null,
                }
                const title = 'Aggiungere skill';
                setModalTitle(title); 

                setInputsModal(data);
                changeStyleBtnImage(data.image);
            }
        })
    }


    function editSkill(){
        buttonsEdit.forEach(button => {
            button.onclick = function(){
                const data = {
                    skillId : button.getAttribute('data-id'),
                    skillType : button.getAttribute('data-skillType'),
                    name : button.getAttribute('data-name'),
                    order : button.getAttribute('data-order'),
                    image : button.getAttribute('data-image'),
                }

                const title = 'Modificare ' + data.name;
                setModalTitle(title); 
                setInputsModal(data); 
                changeStyleBtnImage(data.image);
            }
        })
    }


    function setInputsModal(data){
        modalInputSkillId.value = data.skillId;
        modalInputSkillType.value = data.skillType; 
        modalInputName.value = data.name;
        modalInputOrder.value = data.order;
        modalInputImage.value = data.image
    }


    function setModalTitle(title){
        const modalTitle = document.querySelector('.modal-title');
        modalTitle.innerHTML = title;
    }

</script>
