import { spinner } from './spinner';
import { showToast } from './toast';

function header(){
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    return {
        'X-CSRF-TOKEN': token,
    }
}

//  Metodo per creare/aggiornare un Item
function handleSave(){
    const btnSave = document.querySelector('.btnSave');
    btnSave.onclick = async function(){
        const originalButtonHTML = btnSave.innerHTML;
        spinner(btnSave);

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
            window.location.reload();

        }catch(err){
            console.error(err);
        }finally{
            spinner(btnSave, originalButtonHTML);
        } 
    }
}

//   Metodo per eliminare un Item
function handleDelete(){
    const btnDelete = document.querySelector('.btnDelete');
    btnDelete.onclick = async function(){
        const originalButtonHTML = btnDelete.innerHTML;
        spinner(btnDelete);

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
            window.location.reload();
        
        }catch(err){
            console.error(err);
        }finally{
            spinner(btnDelete, originalButtonHTML);
        } 
    }
}


export { handleSave, handleDelete }

