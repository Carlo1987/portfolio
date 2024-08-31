

export const getTime = {

    time : function(){
        let date = new Date();
        let year = date.getFullYear();
        const starting = 2022;
    
        return year - starting;
    }

}

