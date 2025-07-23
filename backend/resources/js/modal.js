
//   Metodo per settare modal di con i dati di creazione nuovo Item
function setModalAddItem(datas){
    const title = 'Aggiungere Item';
    setModal('btnOpenModalAdd', title, datas);
}

//   Metodo per settare modal di con i dati di aggiornamento Item
function setModalEditItem(datas){
    const title = 'Modificare Item';
    setModal('btnOpenModalEdit', title, datas);
}


function setModal(buttonsClass, title, datas){
    const buttons = document.querySelectorAll(`.${buttonsClass}`);
    buttons.forEach(button => {
        button.onclick = function(){
            setModalTitle('title-store', title); 
            setInputsModal(button, datas); 

            const image = button.getAttribute(`data-image`);
            if(image){
                changeStyleBtnImage(image);
            }
        }
    })
}

//  Metodo per settare modal di eliminazione Item
function setModalDeleteItem(){
    const buttonsDelete = document.querySelectorAll('.btnOpenModalDelete');
    buttonsDelete.forEach(button => {
        button.onclick = function(){
            const title = `Cancellare ${ button.getAttribute('data-name') }?`;
            setModalTitle('title-delete', title);
            document.querySelector('#id').value =  button.getAttribute('data-id')
        }
    })
}

//  Metodo per settare gli inputs di una modal
function setInputsModal(button, datas){
   datas.forEach(data => {
        const inputId = data.input ?? data.data; 
        const dataValue = button.getAttribute(`data-${data.data}`)
        document.querySelector(`#${inputId}`).value = dataValue;
        if(data.checks){
            setChecks(dataValue);
        }
   });
}


function setChecks(dataValue){
    const checksId = dataValue.split(',');   
    checksId.forEach(checkId => {
        const checkboxId = `#check_${checkId}`;  
        const checkbox = document.querySelector(checkboxId);
        if(checkbox){
            checkbox.checked = true;
        }
    })
}

function getFile() {
    const fileInput = document.querySelector('#file');
    fileInput.addEventListener('change', function() {
    let file = fileInput.files[0];
    changeStyleBtnImage(file.name);
    });
}

//  Metodo per cambiare stile bottone di selezione file
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


function closeModal(){
    const btnClose = document.querySelector('.btnClose');
    btnClose.onclick = function(){
        const form = document.querySelector('#form');
        form.reset();
        if(document.querySelector('#dev_languages')){
            document.querySelector('#dev_languages').value = '';
        }
        changeStyleBtnImage(null);
    }
}

export { setModalAddItem, setModalEditItem, setModalDeleteItem, getFile, closeModal }

