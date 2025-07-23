@php
    $workingId = App\Enums\ProjectEnum::Working;
    $stoppedId = App\Enums\ProjectEnum::Stopped;
@endphp
<div class="modal fade" id="storeProjectModal" tabindex="-1" aria-labelledby="storeProjectModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title title-store fs-5" id="storeProjectModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" enctype="multipart/form-data">
          @csrf
            <input type="hidden" id="id" name="id">
            <div class="row">
                <div class="col-sm-5">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="mb-3">
                        <label for="order" class="form-label">Ordine</label>
                        <input type="number" class="form-control" id="order" name="order">
                    </div>
                </div>    
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="status" class="form-label"> Stato </label>
                        <select class="form-select" id="status" name="status">
                            <option value="{{ $workingId }}" selected> Attivo </option>
                            <option value="{{ $stoppedId }}"> Sospeso </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="url" class="form-label"> URL </label>
                <input type="text" class="form-control" id="url" name="url">
            </div>

            <div class="mb-3">
                <input type="hidden" id="image">
                <input class="form-control visually-hidden" type="file" id="file" name="file">
                <button type="button" class="btn btn-secondary" onclick="document.querySelector('#file').click()" id="btnImage"> 
                    Selezionare file 
                </button>  
            </div>

            <div class="text-center text__strong"> Linguaggi usati </div>
            <input type="hidden" name="dev_languages" id="dev_languages">
            @include('admin.pages.projects.accordion_projectSkills')
          
            @include('includes.flegsTexts') 
            <div class="p-3">
                <div class="text__strong"> Descrizione Portfolio </div>
                <div class="form-floating">
                    <textarea class="text text_ITA form-control textarea__small" id="description_ITA" name="description_ITA"></textarea>
                    <label class="text text_ITA" for="description_ITA">Italiano</label>
                </div>
                <div class="form-floating">
                    <textarea class="text text_ESP visually-hidden form-control textarea__small" id="description_ESP" name="description_ESP"></textarea>
                    <label class="text text_ESP visually-hidden" for="description_ESP">Spagnolo</label>
                </div>
                <div class="form-floating">
                    <textarea class="text text_ENG visually-hidden form-control textarea__small" id="description_ENG" name="description_ENG"></textarea>
                    <label class="text text_ENG visually-hidden" for="description_ENG">Inglese</label>
                </div>
            </div>
            <div class="p-3">
                <div class="text__strong">Descrizione Curriculum</div>
                <div class="form-floating">
                    <textarea class="text text_ITA form-control textarea__small" id="curriculum_ITA" name="curriculum_ITA"></textarea>
                    <label class="text text_ITA" for="curriculum_ITA">Italiano</label>
                </div>
                <div class="form-floating">
                    <textarea class="text text_ESP visually-hidden form-control textarea__small" id="curriculum_ESP" name="curriculum_ESP"></textarea>
                    <label class="text text_ESP visually-hidden" for="curriculum_ESP">Spagnolo</label>
                </div>
                <div class="form-floating">
                    <textarea class="text text_ENG visually-hidden form-control textarea__small" id="curriculum_ENG" name="curriculum_ENG"></textarea>
                    <label class="text text_ENG visually-hidden" for="curriculum_ENG">Inglese</label>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnClose btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btnSave btn btn-primary" 
        data-url-create="{{ route('project.store') }}" data-url-update="{{ route('project.store', ['id'=>':id']) }}">Salva</button>
      </div>
    </div>
  </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function (){
        handleSave();
        closeModal();
    });
</script>
