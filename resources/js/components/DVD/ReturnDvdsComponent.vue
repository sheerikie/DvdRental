<template>
  <div>
    <h1>Return Dvd</h1>
    <form @submit.prevent @click="addDvd()">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
              <div class="form-group">
              <label>Entry Time:</label>
             <datetime type="datetime" v-model="dvd.entry_time"></datetime>
            </div>
          </div>
        </div>
        </div>
       <br />
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
          dvd:{},
         
        }
    },
    
    
    methods: {
        addDvd(){
        let uri = '/api/dvd/update';
        this.axios.post(uri, this.dvd).then((response) => {
        this.$router.push({name: 'DvdIndex'});
        });
    }
    }
  }
</script>