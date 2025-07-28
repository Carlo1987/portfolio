
<div class="modal fade" id="storeJobModal" tabindex="-1" aria-labelledby="storeJobModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title title-store fs-5" id="storeJobModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form">
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
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="from" class="form-label"> Da </label>
                        <input type="text" class="form-control" id="from" name="from">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="to" class="form-label"> A </label>
                        <input type="text" class="form-control" id="to" name="to">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="form-floating">
                        <textarea class="form-control textarea__small" id="text_ITA" name="text_ITA"></textarea>
                        <label for="text_ITA"> Testo italiano </label>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div class="form-floating">
                        <textarea class="form-control textarea__small" id="text_ESP" name="text_ESP"></textarea>
                        <label for="text_ESP"> Testo spagnolo </label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control textarea__small" id="text_ENG" name="text_ENG"></textarea>
                        <label for="text_ENG"> Testo inglese </label>
                    </div>
                </div>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnClose btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btnSave btn btn-primary" 
        data-url-create="{{ route('job.upsert') }}" data-url-update="{{ route('job.upsert', ['id'=>':id']) }}">Salva</button>
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
