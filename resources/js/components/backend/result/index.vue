<template>
  <div>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <div class="card">
        <div class="card-body">
            <h3 style="text-align:center;text-decoration:underline">Result Manage</h3>
            <router-link to="add_result" style="float:right" class="btn btn-success btn-sm">Add Result</router-link>

            
            
          <table class="table table-striped"  id="datatable">
            <thead>
              <tr>
                <!-- <th><input type="checkbox" @click="SelectAll" v-model="selectedAll"></th> -->
                <th>Sl</th>
                <th>Student Name</th>
                <th>Gpa</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>

            <tbody>
              <tr v-for="(AllSizee,index) in AllResult" :key="AllSizee.id">
              
                <!-- <td><input type="checkbox" :value="AllSizee.id" v-model="selected"></td> -->
                <td>{{index+1}}</td>
                <td>{{AllSizee.student.name}}</td>
                <td>{{AllSizee.gpa}}</td>
                <td>{{AllSizee.dates}}</td>
                
                <td>
                  <a class="btn btn-danger btn-sm" @click="Delete(AllSizee.id)"><i class="fa fa-trash"></i></a>
                  <router-link :to="`edit_result/${AllSizee.id}`" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></router-link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        </div>
      </div>
      <div class="col-md-1"></div>
    </div>
  </div>
</template>

<script>
import $ from "jquery";
import "datatables.net-dt/js/dataTables.dataTables.min.js";
import "datatables.net-dt/css/jquery.dataTables.min.css";

import {mapGetters,mapActions} from "vuex";
export default {
  name:"all-sise",
     metaInfo() {
        return { 
            title: "View Result",
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
    this.$store.dispatch('AllResult');

    setTimeout(()=>{

    $('#datatable').DataTable();

    },3000)
    
  },




  data() {
    return {
      selected:[],
      selectedAll:false,

    }
  },

   

  computed:{

    ...mapGetters({
      AllResult:'AllResult'
    })
  },

  watch:{
       selected(selected){
         this.selectedAll = (selected.length==this.AllResult.length)
       }
  },
  methods: {

    SelectAll(event){
     
      if(event.target.checked==true){
       this.AllSize.forEach(size_id => {
         this.selected.push(size_id.id);
       });
      }else{
        this.selected=[]
      }
    },



    Delete(Id){
       axios.get('/api/auth/result-delete/'+Id)
       .then((result) => {
           this.$store.dispatch('AllResult');
                
                Toast.fire({
                 icon: "success",
                 title: "Successfully Data Delete",
                });
         
       }).catch((err) => {
         
       });
    },
    SizeStatus(status){
      let data = {
          0:"Deactive",
          1:"Active"
      }

     return data[status];
    },

    SizeColor(status){
      let data={
        0:"badge-danger",
        1:"badge-success"
      }

      return data[status];

    }
  },
}
</script>