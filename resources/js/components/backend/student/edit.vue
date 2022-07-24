<template>
    <div>
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                 <div class=""  style="border:1px solid black;padding:10px;margin-top:10px">
                     <div class="card-body">
                         <h3 style="text-align:center;text-decoration:underline">Edit Student</h3>
                         <router-link to="all_category" style="float:right" class="btn btn-success btn-sm">Manage Student</router-link>
                       
                         <form @submit.prevent="UpdateStudent">
                              
                        <div class="row">

                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control" v-model="form.name" name="name" placeholder="enter name">
                               <div style="color:red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            </div>

                             <div class="col-md-12">
                                <label for="">Department</label>
                                <select name="department_id" v-model="form.department_id" class="form-control" id="">
                                    <option disabled selected>--Select Once--</option>
                                    <option v-for="(depart,index) in DepartmentData" :key="depart.id" :value="depart.id">{{depart.name}}</option>
                                </select>
                               <div style="color:red" v-if="form.errors.has('department_id')" v-html="form.errors.get('department_id')" />
                            </div>

                             <div class="col-md-12">
                                <label for="">Batch Name</label>
                                <input type="text" class="form-control" v-model="form.batch_name" name="batch_name" placeholder="enter Batch name">
                               <div style="color:red" v-if="form.errors.has('batch_name')" v-html="form.errors.get('batch_name')" />
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
    name:'edit-department',

       metaInfo() {
        return { 
            title: "Edit Student",
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

        this.EditStudent();
        this.AllDepartement();
    },

    data() {
        return {
            editImage:'',
               DepartmentData:[],
           
              form: new Form({
                  name:"",
                  department_id:'',
                  batch_name:'',
                  status:'',
                  EditId:"",
            })
        }
    },

    methods: {

        UpdateStudent(){
         this.form.post('/api/auth/student-update')
         .then((result) => {
              this.$router.push({name:'all_student'})     
                Toast.fire({
                 icon: "success",
                 title: "Successfully Update",
                });
         }).catch((err) => {
             
         });
        },
        
        EditStudent(){
            axios.get('/api/auth/student-edit/'+this.$route.params.id)
            .then((result) => [
                this.form.fill(result.data['edit']),
                this.form.EditId = this.$route.params.id,
                // this.editImage = result.data['edit']['image']
            ]).catch((err) => {
                
            });
        },

           AllDepartement(){
            axios.get('/api/auth/department-dataview')
             .then((result) => {
                 
                 this.DepartmentData = result.data['all'];


            }).catch((err) => {
                
            });
        }

     
    },
}
</script>