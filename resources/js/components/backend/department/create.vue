<template>
    <div>
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                 <div class=""  style="border:1px solid black;padding:10px;margin-top:10px">
                     <div class="card-body">
                         <h3 style="text-align:center;text-decoration:underline">Add Department</h3>
                         <router-link to="all_department" style="float:right" class="btn btn-success btn-sm">Manage Department</router-link>
                       
                         <form @submit.prevent="CategoryStore">
                              
                        <div class="row">

                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control" v-model="form.name" name="name" placeholder="enter Department name">
                               <div style="color:red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            </div>

                            


                              <div class="col-md-12">
                                <label for="">Status</label>
                                Active <input  type="radio" name="status" v-model="form.status" :value="1" placeholder="">
                                Deactive <input type="radio" name="status" v-model="form.status" :value="0" placeholder="">
                               <div style="color:red" v-if="form.errors.has('status')" v-html="form.errors.get('status')" />
                            </div>

                            
                              <div class="col-md-12">
                               
                                <button type="submit" class="btn btn-success btn-sm">Submit</button>
                            </div>
                        </div>
                         </form>

                     </div>
                 </div>
             </div>
             <div class="col-md-2"></div>
         </div>
    </div>
</template>

<script>

export default {
    name:"add_department",

       metaInfo() {
        return { 
            title: "Create Department",
            meta: [
                { name: 'description', content:  'Edit Size Page why count this page'},
                { property: 'og:title', content: "Epiloge - Build your network in your field of interest"},
                { property: 'og:site_name', content: 'Epiloge'},
                {property: 'og:type', content: 'website'},    
                {name: 'robots', content: 'index,follow'} 
            ]
        }
    },

    mounted() {
         if(!User.loggedIn()){
         this.$router.push({name:'login_admin'});
        }
    },

    data() {
        return {
            form: new Form({
                  name:"",
                  status:""
            })
        }
    },

    methods: {
        CategoryStore(){
            this.form.post('/api/auth/department-post')
            .then((result) => {

                this.$router.push({name:'all_department'})
                
                Toast.fire({
                 icon: "success",
                 title: "Successfully Data Store",
                });

            }).catch((err) => {
                
            });
        },

     
    },



}
</script>