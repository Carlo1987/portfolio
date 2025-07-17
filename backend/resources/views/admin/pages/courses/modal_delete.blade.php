<div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="deleteCourseModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title title-delete fs-5" id="deleteCourseModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" enctype="multipart/form-data">
          @csrf
            Dare la conferma per proseguire.
            <input type="hidden" id="id" name="id">
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btnDelete btn btn-danger" data-url-delete="{{ route('course.delete',['id' => ':id']) }}">Cancella</button>
      </div>
    </div>
  </div>
</div>


<script type="module">

    document.addEventListener('DOMContentLoaded', function (){
      deleteItem();
    });
</script>
