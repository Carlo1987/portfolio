

<div class="modal fade" id="storeSkillModal" tabindex="-1" aria-labelledby="storeSkillModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="storeSkillModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form" enctype="multipart/form-data">
          @csrf
            <input type="hidden" id="id" name="id">
            <input type="hidden" id="skillType" name="skillType">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Numero elenco</label>
                <input type="number" class="form-control" id="order" name="order">
            </div>
            <div class="mb-3">
                <input type="hidden" id="image">
                <input class="form-control visually-hidden" type="file" id="file" name="file">
                <button type="button" class="btn btn-secondary" onclick="document.querySelector('#file').click()" id="btnImage"> 
                  Selezionare file 
                </button>  
            </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
        <button type="button" class="btnSave btn btn-primary">Salva</button>
      </div>
    </div>
  </div>
</div>


<script type="module">

    let file;
    document.addEventListener('DOMContentLoaded', function (){
      getFile();
      saveSkill();
    });

    function getFile() {
      const fileInput = document.querySelector('#file');
      fileInput.addEventListener('change', function() {
        file = fileInput.files[0];
        changeStyleBtnImage(file.name);
      });
    }



    function saveSkill(){
      const btnSave = document.querySelector('.btnSave');
      btnSave.onclick = async function(){
        const form = document.querySelector('#form');
        const formData = new FormData(form);

        const id = document.querySelector('#id').value;
        let url = "{{ route('skill.store') }}";
        if(id){
          url = `{{ route('skill.store', ['id' => 'id']) }}`.replace('id', id);
        }
        
         try{
          const response = await fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: formData
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
          console.error('Errore: ' + err);
        } 
      }
    }

</script>