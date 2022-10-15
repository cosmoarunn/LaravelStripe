import { createStore } from 'vuex'

//decide strict mode if it's not production code
const _debug = process.env.NODE_ENV !== 'production'


export default createStore({
    strict: _debug,
    mutations : { 

    },
    state: { 
        
    },
    actions: {

    },
});



