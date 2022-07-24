<template>
    <div>
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                 <div class=""  style="border:1px solid black;padding:10px;margin-top:10px">
                     <div class="card-body">
                         <router-link to="all_student" style="float:right" class="btn btn-success btn-sm">Manage Student</router-link>
                         <h3 style="text-align:center;text-decoration:underline">Add Student</h3>
                        
                       
                         <form @submit.prevent="StudentStore">
                              
                        <div class="row">

                            <div class="col-md-12">
                                <label for="">Name</label>
                                <input type="text" class="form-control" v-model="form.name" name="name" placeholder="enter name">
                               <div style="color:red" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                            </div>

                            <div class="col-md-12">
                                <label for="">Department</label>
                                <!-- <input type="text" class="form-control" v-model="form.department_id" name="department_id" placeholder="enter Department id"> -->
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
                                <label for="">Color Status</label>
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
    name:"add_student",
       metaInfo() {
        return { 
            title: "Add Student",
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

        this.AllDepartement();
    },

    data() {
        return {
               DepartmentData:[],
            form: new Form({
                  name:"",
                  department_id:"",
                  batch_name:"",
                  status:""
            })
        }
    },

    methods: {
        StudentStore(){
            this.form.post('/api/auth/student-post')
            .then((result) => {

                this.$router.push({name:'all_student'})
                
                Toast.fire({
                 icon: "success",
                 title: "Successfully Data Store",
                });

            }).catch((err) => {
                
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