<template>
  <div>
    <h1>Create Customer</h1>
    <form @submit.prevent @click="addCustomer()">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label>Customer Name:</label>
            <input type="text" class="form-control" v-model="customer.name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>National Id:</label>
             <input class="form-control" type="number" v-model="customer.national_id"></input>
            
            </div>
          </div>
      
         <div class="col-md-6">
            <div class="form-group">
              <label>Phone:</label>
              <input class="form-control" type="text" v-model="customer.phone"></input>
              
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label>Address:</label>
              <input class="form-control" type="text" v-model="customer.address"></input>
            </div>
          </div>
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
        </div>
    </form>
  </div>
</template>

<script>
    export default {
        data(){
        return {
          customer:{},
         
        }
    },
    
    
    methods: {
        addCustomer(){
        let uri = '/api/customer/create';
        this.axios.post(uri, this.customer).then((response) => {
        this.$router.push({name: 'CustomerIndex'});
        });
    }
    }
  }
</script>