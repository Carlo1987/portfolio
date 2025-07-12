

<div class="modal fade" id="storeSkillModal" tabindex="-1" aria-labelledby="storeSkillModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="storeSkillModalLabel"> <!-- titolo --> </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" id="skillId">
            <input type="hidden" id="skillType">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name">
            </div>
            <div class="mb-3">
                <label for="order" class="form-label">Numero elenco</label>
                <input type="number" class="form-control" id="order">
            </div>
            <div class="mb-3">
                <input type="hidden" id="image">
                <input class="form-control visually-hidden" type="file" id="file">
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

    getFile();
    saveSkill();
   
    let file;
    function getFile() {
      const fileInput = document.querySelector('#file');
      fileInput.addEventListener('change', function() {
        file = fileInput.files[0];
        changeStyleBtnImage(file.name);
      });
  }



    function saveSkill(){
      const btnSave = document.querySelector('.btnSave');
      btnSave.onclick = function(){
        const modalInputSkillId = document.querySelector('#skillId');
        const modalInputSkillType = document.querySelector('#skillType'); 

        console.log('modalInputSkillId',modalInputSkillId.value)
        console.log('modalInputSkillType',modalInputSkillType.value)
      }
    }

  

</script>