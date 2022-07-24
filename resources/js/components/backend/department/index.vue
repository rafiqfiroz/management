<template>
  <div>
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="" style="border:1px solid black;padding:10px;margin-top:10px">
        <div class="card-body">
            <h3 style="text-align:center;text-decoration:underline">Department Manage</h3>
            <router-link to="add_department" style="float:right" class="btn btn-success btn-sm">Add Department</router-link>
          <table class="table table-striped" id="datatable">
            <thead>
              <tr>
                <!-- <th><input type="checkbox" :disabled="EmptyData()" @click="SelectAll" v-model="selectedAll"></th> -->
                <th>Sl</th>
                <th>Department Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="(AllCategories,index) in AllCategory" :key="AllCategories.id">
                 <!-- <td><input type="checkbox" :value="AllCategories.id" v-model="selected"></td> -->
                <td>{{index+1}}</td>
                <td>{{AllCategories.name}}</td>
                <!-- <td><img style="width:50px" :src="'upload/Category/'+AllCategories.image" alt=""></td> -->
                <td><span class="badge" :class="CategoryStaus(AllCategories.status)">{{CategoryShow(AllCategories.status)}}</span></td>
                <td>
                    <a class="btn btn-danger btn-sm" @click="DeleteItem(AllCategories.id)"><i class="fa fa-trash"></i></a>
                    <router-link :to="`edit_department/${AllCategories.id}`" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                </td>
              </tr>

              
            </tbody>
          </table>
        </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import "datatables.net-dt/js/dataTables.dataTables.min.js";
import "datatables.net-dt/css/jquery.dataTables.min.css";
import {mapGetters,mapActions} from "vuex";
export default {
    name:"all-Department",

       metaInfo() {
        return { 
            title: "All Department",
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
        this.$store.dispatch('AllCategory')

        
    setTimeout(()=>{

    $('#datatable').DataTable();

    },3000)
        
    },

    data() {
      return {
        selected:[],
        selectedAll:false,
        isSelected:false
      }
    },

    watch:{
       selected(selected){
         this.isSelected = (selected.length>0);
         this.selectedAll = (selected.length==this.AllCategory.length)
       }
    },

    computed:{
         ...mapGetters({
             AllCategory:'AllCategory',
         })
    },

    methods: {

       

         DeleteItem(Id){
          axios.get('/api/auth/department-delete/'+Id)
          .then((result) => {

              this.$store.dispatch('AllCategory');
               
                Toast.fire({
                 icon: "success",
                 title: "Successfully Deleted",
                });
            
          }).catch((err) => {
            
          });
         },
        CategoryShow(status){
            let data={
                0:"Deactive",
                1:"Active"
            };

            return data[status];
        },

        CategoryStaus(status){
          let data = {
              0:"badge-danger",
              1:"badge-success"
          };

          return data[status];
        },

        EmptyData(){

        },

        SelectAll(event){
            if(event.target.checked==false){
             this.selected = [];
            }else{
              this.AllCategory.forEach(category => {
                this.selected.push(category.id);
              });
            }
        }
    },
}
</script>