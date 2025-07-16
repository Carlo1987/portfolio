

<div class="modal fade" id="deleteSkillModal" tabindex="-1" aria-labelledby="deleteSkillModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title title-delete fs-5" id="deleteSkillModalLabel"> <!-- titolo --> </h1>
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
        <button type="button" class="btnDelete btn btn-danger">Cancella</button>
      </div>
    </div>
  </div>
</div>


<script type="module">

    document.addEventListener('DOMContentLoaded', function (){
      deleteSkill();
    });

    function deleteSkill(){
        const btnDelete = document.querySelector('.btnDelete');
        btnDelete.onclick = async function(){
            const id = document.querySelector('#id').value;   console.log('id',id)
            const url = `{{ route('skill.delete', ['id' => 'id']) }}`.replace('id', id);
            
            try{
            const response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
            });

            const result = await response.json();

            if (!response.ok){
                showToast(result);
                console.error('error',result);
                throw new Error("Errore nella richiesta", result);
            }

            console.log("Response:", result);
            window.location.reload();
            
            }catch(err){
            showToast();
            console.error('Errore: ' + err);
            } 
        }
    }

</script>
