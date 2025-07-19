
//   Metodo per settare modal di con i dati di creazione nuovo Item
function setModalAddItem(datas){
    const buttonsAdd = document.querySelectorAll('.btnOpenModalAdd');
    buttonsAdd.forEach(button => {
        button.onclick = function(){
            const title = 'Aggiungere Item';
            setModalTitle('title-store', title); 
            setInputsModal(button, datas);

            const image = button.getAttribute(`data-image`);
            if(image){
                changeStyleBtnImage(null);
            }
        }
    })
}

//   Metodo per settare modal di con i dati di aggiornamento Item
function setModalEditItem(datas){
    const buttonsEdit = document.querySelectorAll('.btnOpenModalEdit');
    buttonsEdit.forEach(button => {
        button.onclick = function(){
            const title = 'Modificare Item';
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
        data.input.value = button.getAttribute(`data-${data.data}`);
   });
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
    }
}

export { setModalAddItem, setModalEditItem, setModalDeleteItem, getFile, closeModal }

