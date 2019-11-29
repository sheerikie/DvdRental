<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
            <h3 style="text-align:center">Login To Zeraki Store</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent @click="addLogin()">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="login.email" required autocomplete="email" autofocus>

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control " v-model="login.password" required autocomplete="current-password">

                            
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-model="login.remember">

                                    <label class="form-check-label" for="remember">
                                       Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Submit
                                </button>

                                
                                    <a class="btn btn-link" href="">
                                       
                                    </a>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</template>
<script>
export default {
        data(){
        return {
          login:{},
          query:'',
         
         
        }
    },
    
 methods: {
  addLogin(){
        let uri = '/login';
        this.axios.post(uri, this.login).then((response) => {
        this.$router.push({name: 'home'});
        });
        }
        }
}
</script>
<style>
</style>