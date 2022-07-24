
export default{

    state:{
         AllCategory:[],
         AllSize:[],
         AllResult:[],
    },

    getters:{
        AllCategory(state){
            return state.AllCategory;
        },

        AllSize(state){
            return state.AllSize;
        }, 
        
        AllResult(state){
            return state.AllResult;
        }
    },

    actions:{
         AllCategory(context){
           axios.get('/api/auth/department-all')
           .then((result) => {

            context.commit('CategoryComm',result.data['category']);
               
           }).catch((err) => {
               
           });
         },

         AllSize(context){
            axios.get('/api/auth/student-all')
            .then((result) => {

                // console.log(result.data['size']);
 
             context.commit('SizeComm',result.data['size']);
                
            }).catch((err) => {
                
            });
         },  
         
         AllResult(context){
            axios.get('/api/auth/result-all')
            .then((result) => {

                // console.log(result.data['size']);
 
             context.commit('ResultComm',result.data['size']);
                
            }).catch((err) => {
                
            });
         }
     
    },

    mutations:{
        
        CategoryComm(state,data){
            return state.AllCategory = data;
        },
        SizeComm(state,data){
            return state.AllSize = data;
        },

        ResultComm(state,data){
            return state.AllResult = data;
        }
    }
}