
//   Metodo per settare modal di con i dati di creazione nuovo Item
function addItem(inputs, data){
    const buttonsAdd = document.querySelectorAll('.btnOpenModalAdd');
    buttonsAdd.forEach(button => {
        button.onclick = function(){
            const title = 'Aggiungere Item';
            setModalTitle('title-store', title); 
            setInputsModal(inputs, button, data);
            changeStyleBtnImage(null);
        }
    })
}

//   Metodo per settare modal di con i dati di aggiornamento Item
function editItem(inputs, data){
    const buttonsEdit = document.querySelectorAll('.btnOpenModalEdit');
    buttonsEdit.forEach(button => {
        button.onclick = function(){
            const title = 'Modificare Item';
            setModalTitle('title-store', title); 
            setInputsModal(inputs, button, data); 

            const image = button.getAttribute(`data-image`);
            changeStyleBtnImage(image);
        }
    })
}

//  Metodo per settare modal di eliminazione Item
function deleteItem(){
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
function setInputsModal(inputs, button, data){
    for(let i=0; i<inputs.length; i++){
        if(data[i]){
            inputs[i].value = button.getAttribute(`data-${data[i]}`);
        }
    }
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


