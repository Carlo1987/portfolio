
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


export { showToast }