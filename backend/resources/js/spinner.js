
export function spinner(){
    document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', function () {
        
        button.disabled = true;

        button.innerHTML = `
            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        `;

        if (button.form) {
            button.form.submit();
        }
        });
    });
}
