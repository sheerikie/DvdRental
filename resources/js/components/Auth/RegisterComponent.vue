<template>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 style="text-align:center">Register To Zeraki Store</h3>
                </div>
                <div class="card-body">
                    <form @submit.prevent @click="addRegister()">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" v-model="register.name" required autocomplete="name" autofocus>

                               
                                    <span class="invalid-feedback" role="alert">
                                        
                                    </span>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" v-model="register.email" required autocomplete="email">

                                
                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control "v-model="register.password" required autocomplete="new-password">

                                    <span class="invalid-feedback" role="alert">
                                        <strong></strong>
                                    </span>
                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" v-model="register.password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                              Submit     
                                </button>
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
          register:{},
          query:'',
         
         
        }
    },
    
 methods: {
  addRegister(){
        let uri = '/register';
        this.axios.post(uri, this.register).then((response) => {
        this.$router.push({name: 'home'});
        });
        }
        }
}

</script>
<style>
</style>