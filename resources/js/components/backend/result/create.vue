<template>
    <div>
         <div class="row">
             <div class="col-md-2"></div>
             <div class="col-md-8">
                 <div class=""  style="border:1px solid black;padding:10px;margin-top:10px">
                     <div class="card-body">
                         <router-link to="all_size" style="float:right" class="btn btn-success btn-sm">Manage Result</router-link>
                       
                         <h3 style="text-align:center;text-decoration:underline">Add Result</h3>
                        
                         <form  @submit.prevent="ResultSubmit">
                       
                              
                        <div class="row">

                            <div class="col-md-12">
                                <label for="">Student</label>

                                 <select name="student_id" v-model="form.student_id" class="form-control" id="">
                                    <option disabled selected>--Select Once--</option>
                                    <option v-for="(depart,index) in DepartmentData" :key="depart.id" :value="depart.id">{{depart.name}}</option>
                                </select>
                                <!-- <input type="text" class="form-control" v-model="form.size_name" name="size_name" placeholder="enter Size name"> -->
                               <div style="color:red" v-if="form.errors.has('student_id')" v-html="form.errors.get('student_id')" />
                            </div>


                              <div class="col-md-12">
                                <label for="">GPA</label>
                                <input type="text" class="form-control" v-model="form.gpa" name="gpa" placeholder="3.50">
                               <div style="color:red" v-if="form.errors.has('gpa')" v-html="form.errors.get('gpa')" />
                            </div>


                             <div class="col-md-12">
                                <label for="">Date</label>
                                <input type="date" class="form-control" v-model="form.dates" name="dates" placeholder="">
                               <div style="color:red" v-if="form.errors.has('dates')" v-html="form.errors.get('dates')" />
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
    name:'size-create',
       metaInfo() {
        return { 
            title: "Add Size",
            meta: [
                { name: 'description', content:  'Add Result Page why count this page'},
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

        this.AllStudent();
    },
    data() {
        return {
            DepartmentData:[],
            form: new Form({
                student_id:"",
                gpa:"",
                dates:""
            })
        }
    },

    methods: {

       

        ResultSubmit(){
           
          this.form.post('/api/auth/result-post')
          .then((result) => {

               this.$router.push({name:'all_result'})
                
                Toast.fire({
                 icon: "success",
                 title: "Successfully Data Store",
                });
              
          }).catch((err) => {
              
          });
        },

          AllStudent(){
            axios.get('/api/auth/student-dataview')
             .then((result) => {
                 
                 this.DepartmentData = result.data['all'];


            }).catch((err) => {
                
            });
        }
       
    },
}
</script>