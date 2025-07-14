

function showToast(message = "Si è verificato un errore") {
    const toastBody = document.querySelector('#liveToast .toast-body');
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