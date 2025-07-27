@extends('admin.index')

@section('pages')

    <div class="accordion accordion-flush mt-3" id="accordionSkills">
        <div class="accordion-item">
            <div class="row">
            @foreach($skillsTypes as $key => $skillsType)
                <div class="col-xl-3 col-sm-6">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $key }}" aria-expanded="false" aria-controls="flush-collapse_{{ $key }}">
                            {{ $skillsType['name'] }}
                        </button>
                    </h2>
                    <div id="flush-collapse_{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionSkills">
                        <div class="accordion__body">    
                            <div class="container__btnAdd">
                                <div class="btnOpenModalAdd btn btn-outline-success btn-sm me-4" data-bs-toggle="modal" data-bs-target="#storeSkillModal" 
                                    data-type="{{ $key }}" data-skillsLength ="{{ count( $skillsType['list'] ) + 1 }}">
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
                                            data-id="{{ $skill['id'] }}" data-type="{{ $key }}" data-name="{{ $skill['name'] }}" data-order="{{ $skill['order'] }}" data-image="{{ $skill['image'] }}"> 
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

<script>
    document.addEventListener('DOMContentLoaded', function (){

        const datasCreate = [
            { data : 'type' },
            { data : 'skillsLength', input :'order' }
        ];

        const datasUpdate = [
            { data : 'id' },
            { data : 'type' },
            { data : 'name' },
            { data : 'order' },
            { data : 'image' },
        ];

        setModalAddItem(datasCreate);
        setModalEditItem(datasUpdate);
        setModalDeleteItem();
    });
</script>
