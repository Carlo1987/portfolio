import * as bootstrap from 'bootstrap';

//  Metodo per visualizzare Toast dei messaggi
export function showToast(message = "Si è verificato un errore") {
    const toastBody = document.querySelector('#liveToast .toast-body');

    if(typeof message == 'object'){
        const errors = message.errors;
        message = `
        <ul>
            <li> ${ errors.type ?? ''  } </li>
            <li> ${ errors.name ?? ''  } </li>
            <li> ${ errors.order ?? ''  } </li>
            <li> ${ errors.timeDuration ?? ''  } </li>
            <li> ${ errors.format ?? ''  } </li>
            <li> ${ errors.date ?? ''  } </li>
            <li> ${ errors.text_ITA ?? ''  } </li>
            <li> ${ errors.text_ESP ?? ''  } </li>
            <li> ${ errors.text_ENG ?? ''  } </li>
            <li> ${ errors.url ?? ''  } </li>
            <li> ${ errors.status ?? ''  } </li>
            <li> ${ errors.dev_languages ?? ''  } </li>
            <li> ${ errors.description_ITA ?? ''  } </li>
            <li> ${ errors.description_ESP ?? ''  } </li>
            <li> ${ errors.description_ENG ?? ''  } </li>
            <li> ${ errors.curriculum_ITA ?? ''  } </li>
            <li> ${ errors.curriculum_ESP ?? ''  } </li>
            <li> ${ errors.curriculum_ENG ?? ''  } </li>
            <li> ${ errors.file ?? ''  } </li>
        </ul>`;
    }
    toastBody.innerHTML = message;

    const toast = new bootstrap.Toast(document.getElementById('liveToast'));
    toast.show();
}


