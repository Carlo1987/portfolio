@extends('admin.index')

@section('pages')

    <div class="accordion accordion-flush" id="accordionSkills">
        <div class="accordion-item">
            <div class="row">
            @foreach($skillsTypes as $skillsType)
                <div class="col-xl-3 col-sm-6">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $skillsType['id'] }}" aria-expanded="false" aria-controls="flush-collapse_{{ $skillsType['id'] }}">
                            {{ $skillsType['name'] }}
                        </button>
                    </h2>
                    <div id="flush-collapse_{{ $skillsType['id'] }}" class="accordion-collapse collapse" data-bs-parent="#accordionSkills">
                        <div class="accordion__body">    
                            <div class="container__btnAdd">
                                <div class="btnOpenModalAdd btn btn-outline-success btn-sm me-4" data-bs-toggle="modal" data-bs-target="#storeSkillModal" 
                                    data-type="{{ $skillsType['id'] }}" data-skillsLength ="{{ count( $skillsType['list'] ) }}">
                                    Aggiungi skill
                                </div>
                            </div>
                      
                            <table class="table__fullAccordion">
                            @foreach($skillsType['list'] as $skill)  
                                <tr>
                                    <td class="table__containerImage"> 
                                        <img class="table__image" src="{{ asset('images/skills/' . $skill['image']) }}" alt="image_{{ $skill['image'] }}"> 
                                        {{ $skill['name'] }} 
                                    </td>
                                    <td> {{ $skill['order'] }} </td>
                                    <td class="d-flex gap-2">
                                        <div class="btnOpenModalEdit btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#storeSkillModal"
                                            data-id="{{ $skill['id'] }}" data-type="{{ $skillsType['id'] }}" data-name="{{ $skill['name'] }}" data-order="{{ $skill['order'] }}" data-image="{{ $skill['image'] }}"> 
                                            @include('includes.buttons.button_update') 
                                        </div>
                                        <div class="btnOpenModalDelete btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#deleteSkillModal"
                                            data-id="{{ $skill['id'] }}" data-name="{{ $skill['name'] }}"> 
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
 
    @include('admin.pages.skills.modal_store')
    @include('admin.pages.skills.modal_delete')
 
@endsection



<script type="module">

    const buttonsAdd = document.querySelectorAll('.btnOpenModalAdd');
    const buttonsEdit = document.querySelectorAll('.btnOpenModalEdit');
    const buttonsDelete = document.querySelectorAll('.btnOpenModalDelete');

    const modalInputSkillId = document.querySelector('#id');
    const modalInputType = document.querySelector('#type');
    const modalInputName = document.querySelector('#name');
    const modalInputOrder = document.querySelector('#order');
    const modalInputImage = document.querySelector('#image');

    addItem();
    editItem();
    deleteItem();


    function addItem(){
        buttonsAdd.forEach(button => {
            button.onclick = function(){
                const data = {
                    skillId : null,
                    type : button.getAttribute('data-type'),
                    name : null,
                    order : parseInt(button.getAttribute('data-skillsLength')) + 1,
                    image : null,
                }
                const title = 'Aggiungere skill';
                setModalTitle('title-store', title); 

                setInputsModal(data);
                changeStyleBtnImage(data.image);
            }
        })
    }


    function editItem(){
        buttonsEdit.forEach(button => {
            button.onclick = function(){
                const data = {
                    skillId : button.getAttribute('data-id'),
                    type : button.getAttribute('data-type'),
                    name : button.getAttribute('data-name'),
                    order : button.getAttribute('data-order'),
                    image : button.getAttribute('data-image'),
                }

                const title = 'Modificare ' + data.name;
                setModalTitle('title-store', title); 
                setInputsModal(data); 
                changeStyleBtnImage(data.image);
            }
        })
    }


    function deleteItem(){
        buttonsDelete.forEach(button => {
            button.onclick = function(){
                const title = `Cancellare ${ button.getAttribute('data-name') }?`;
                setModalTitle('title-delete', title);
                modalInputSkillId.value =  button.getAttribute('data-id')
            }
        })
    }


    function setInputsModal(data){
        modalInputSkillId.value = data.skillId;
        modalInputType.value = data.type; 
        modalInputName.value = data.name;
        modalInputOrder.value = data.order;
        modalInputImage.value = data.image
    }

</script>
