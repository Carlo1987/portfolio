
//  Metodo per visualizzare Toast dei messaggi
function showToast(message = "Si è verificato un errore") {
    const toastBody = document.querySelector('#liveToast .toast-body');
    console.log('message',typeof message)
    if(typeof message == 'object'){
        const errors = message.errors;
        message = `
        <ul>
            <li> ${ errors.file ?? ''  } </li>
            <li> ${ errors.name ?? ''  } </li>
            <li> ${ errors.order ?? ''  } </li>
        </ul>`;
    }
    toastBody.innerHTML = message;

    const toast = new bootstrap.Toast(document.getElementById('liveToast'));
    toast.show();
}


//  Metodo per cambiare stile botton di selezione file
function changeStyleBtnImage(name = null){
    const btnImage = document.querySelector('#btnImage'); 
 
    if(name){
        btnImage.className = "btn btn-success";
        btnImage.innerHTML = name;
    
    }else{
        btnImage.className = "btn btn-secondary";
        btnImage.innerHTML = 'Selezionare file';
    }
}


//  Metodo per settare il titolo di una modal
function setModalTitle(className, title){
    const modalTitle = document.querySelector('.'+className);
    modalTitle.innerHTML = title;
}


//  Metodo per creare/aggiornare un Item
function saveItem(){
    const btnSave = document.querySelector('.btnSave');
    btnSave.onclick = async function(){
    const form = document.querySelector('#form');
    const formData = new FormData(form);

    let url = btnSave.getAttribute('data-url-create');
    const id = document.querySelector('#id').value;
    if(id){
        url = btnSave.getAttribute('data-url-update').replace(':id', id);
    }

    try{
        const response = await fetch(url, {
            method: 'POST',
            headers: header(),
            body: formData
            });

        const result = await response.json();

        if (!response.ok){
            showToast(result);
            throw new Error("Errore nella richiesta", result);
        }

        console.log("Response:", result);
     // window.location.reload();

    }catch(err){
        console.error(err);
    } 
    }
}


//   Metodo per eliminare un Item
function deleteItem(){
    const btnDelete = document.querySelector('.btnDelete');
    btnDelete.onclick = async function(){
        const id = document.querySelector('#id').value;   
        const url =  btnDelete.getAttribute('data-url-delete').replace(':id', id);
       

        try{
        const response = await fetch(url, {
            method: 'DELETE',
            headers: header(),
        });

        const result = await response.json();

        if (!response.ok){
            showToast(result);
            throw new Error("Errore nella richiesta", result);
        }

        console.log("Response:", result);
       // window.location.reload();
        
        }catch(err){
        console.error(err);
        } 
    }
}


function header(){
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    return {
                'X-CSRF-TOKEN': token,
            }
}