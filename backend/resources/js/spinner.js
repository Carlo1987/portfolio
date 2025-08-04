
export function spinner(button, originalHtml = null){  
    if(!originalHtml){
        button.disabled = true;
        button.innerHTML = `
            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        `;
        if (button.form) {
            button.form.submit();
        } 
    }else{
        button.disabled = false;
        button.innerHTML = originalHtml;
    }  

}
