@extends('admin.index')

@section('pages')

    <div class="text-center mt-3">
        @include('includes.flegsTexts') 
    </div>

    <div class="accordion accordion-flush mt-3" id="accordionTexts">
        <div class="accordion-item">
            <div class="row">
            @foreach($textsTypes as $key => $textsType)
                <div class="col-md-6">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_{{ $key }}" aria-expanded="false" aria-controls="flush-collapse_{{ $key }}">
                            {{ $textsType['name'] }}
                        </button>
                    </h2>
                    <div id="flush-collapse_{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionTexts">
                        <div class="accordion__body">    
                            <div class="container__btnAdd">
                                <div class="btnOpenModalAdd btn btn-outline-success btn-sm me-4" data-bs-toggle="modal" data-bs-target="#storeTextModal" 
                                    data-type="{{ $key }}" data-textsLength ="{{ count( $textsType['list'] ) + 1 }}">
                                    Aggiungi testo
                                </div>
                            </div>
                      
                            @foreach($textsType['list'] as $text)  
                                <div class="card mb-3">
                          
                                    <div class="text text_ITA"> {{ $text['text_ITA'] }} </div>
                                    <div class="text text_ESP visually-hidden"> {{ $text['text_ESP'] }} </div>
                                    <div class="text text_ENG visually-hidden"> {{ $text['text_ENG'] }} </div>
        
                                    <div class="d-flex gap-2 pt-3">
                                        <div class="btnOpenModalEdit btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#storeTextModal"
                                            data-id="{{ $text['id'] }}" data-type="{{ $key }}" data-order="{{ $text['order'] }}" 
                                            data-text_ITA="{{ $text['text_ITA'] }}"  data-text_ESP="{{ $text['text_ESP'] }}"  data-text_ENG="{{ $text['text_ENG'] }}"> 
                                            @include('includes.buttons.button_update') 
                                        </div>
                                        <div class="btnOpenModalDelete btn btn-outline-danger btn-sm"  data-bs-toggle="modal" data-bs-target="#deleteTextModal"
                                            data-id="{{ $text['id'] }}" data-name="testo"> 
                                            @include('includes.buttons.button_delete') 
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>    
    </div>
 
    @include('admin.pages.texts.modal_store')
    @include('admin.pages.texts.modal_delete')
 
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function (){

        const datasCreate = [
            { data : 'type' },
            { data : 'textsLength', input :'order' }
        ];

        const datasUpdate = [
            { data : 'id' },
            { data : 'type' },
            { data : 'order' },
            { data : 'text_ITA' },
            { data : 'text_ESP' },
            { data : 'text_ENG' },        
        ];

        setModalAddItem(datasCreate);
        setModalEditItem(datasUpdate);
        setModalDeleteItem();
    });
</script>
