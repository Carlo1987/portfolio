
<div class="modal fade" id="storeTextModal" tabindex="-1" aria-labelledby="storeTextModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title title-store fs-5" id="storeTextModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" enctype="multipart/form-data">
          @csrf
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="type" name="type">
            <div class="mb-3">
                <label for="order" class="form-label">Numero elenco</label>
                <input type="number" class="form-control" id="order" name="order">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control textarea__small" id="text_ITA" name="text_ITA"></textarea>
                <label for="text_ITA"> Testo italiano </label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control textarea__small" id="text_ESP" name="text_ESP"></textarea>
                <label for="text_ESP"> Testo spagnolo </label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control textarea__small" id="text_ENG" name="text_ENG"></textarea>
                <label for="text_ENG"> Testo inglese </label>
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btnClose btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btnSave btn btn-primary" 
        data-url-create="{{ route('text.upsert') }}" data-url-update="{{ route('text.upsert', ['id'=>':id']) }}">Salva</button>
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
