
<div> 
    Testi 
</div>
<div class="d-flex justify-content-center gap-2">
    <img class="table__image text_ITA" src="{{ asset('images/flags/bandiera_italia.png') }}" alt="flag_ITA" title="Testi italiano">
    <img class="table__image text_ESP" src="{{ asset('images/flags/bandiera_spagna.png') }}" alt="flag_ESP" title="Testi spagnolo">
    <img class="table__image text_ENG" src="{{ asset('images/flags/bandiera_inghilterra.png') }}" alt="flag_ENG" title="Testi inglese">
</div>


<script>

    document.addEventListener('DOMContentLoaded', function (){
      changeLanguage();
    });


    function changeLanguage(){
        const flags = document.querySelectorAll('.table__image'); 
        const texts = document.querySelectorAll('.text');
        const hiddenClass = 'visually-hidden';

        flags.forEach(flag => {
            flag.onclick = function(){
                const languageClass = this.classList[1]; 

                texts.forEach(text => {
                    if(text.classList.contains(languageClass)){
                        if(text.classList.contains(hiddenClass)){
                            text.classList.remove(hiddenClass)   
                        }
                    }else{
                        if(!text.classList.contains(hiddenClass)){
                            text.classList.add(hiddenClass)   
                        }   
                    }
                })
            }
        })
    }

</script>
