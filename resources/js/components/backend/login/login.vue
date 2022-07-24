<template>
    <div>
        <div class="login-box" style="margin: 0 auto;">
  <div class="login-logo">
    <a href="#"><b>Login</b>Panel</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form @submit.prevent="login">
        <div class="input-group mb-3">
          <input type="email" v-model="form.email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password"  v-model="form.password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
    </div>
</template>

<script>
export default {
    name:"login",
     created(){
        if(User.loggedIn()){
         this.$router.push({name:'admin_home'});
        }
    },

    data(){
        return{
             form:{
              email:null,
              password:null
         },
        }
    },

     methods: {
     login(){
        axios.post('/api/auth/login',this.form)
        .then(res=> {

       
           User.responseAfterlogin(res);
            Toast.fire({
            icon: 'success',
            title: 'Signed in successfully'
            });
            User.responseAfterlogin(res);

            this.$router.push({name:'admin_home'})
          
          

        })
        .catch(error=>{
             Toast.fire({
                icon: 'error',
                title: 'wrong'
                })
        });
       
     }
 },
}
</script>