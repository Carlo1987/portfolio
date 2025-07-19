@php
    $hourId = App\Enums\TimeEnum::hours;
    $monthId = App\Enums\TimeEnum::monthes;
    $yearId = App\Enums\TimeEnum::years;
@endphp
<div class="modal fade" id="storeCourseModal" tabindex="-1" aria-labelledby="storeCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title title-store fs-5" id="storeCourseModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" enctype="multipart/form-data">
          @csrf
            <input type="hidden" id="id" name="id">

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="order" class="form-label">Numero elenco</label>
                        <input type="number" class="form-control" id="order" name="order">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="timeDuration" class="form-label"> Durata </label>
                        <input type="text" class="form-control" id="timeDuration" name="timeDuration">
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="format" class="form-label"> Formato </label>
                        <select class="form-select" id="format" name="format">
                            <option value="{{ $hourId }}" selected> Ore </option>
                            <option value="{{ $monthId }}"> Mesi </option>
                            <option value="{{ $yearId }}"> Anni </option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="date" class="form-label"> Data </label>
                        <input type="text" class="form-control" id="date" name="date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="form-floating">
                        <textarea class="form-control" id="text_ITA" name="text_ITA"></textarea>
                        <label for="text_ITA"> Testo italiano </label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="form-floating">
                        <textarea class="form-control" id="text_ESP" name="text_ESP"></textarea>
                        <label for="text_ESP"> Testo spagnolo </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" id="text_ENG" name="text_ENG"></textarea>
                        <label for="text_ENG"> Testo inglese </label>
                    </div>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnClose btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btnSave btn btn-primary" 
        data-url-create="{{ route('course.store') }}" data-url-update="{{ route('course.store', ['id'=>':id']) }}">Salva</button>
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
