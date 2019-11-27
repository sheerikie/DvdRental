<template>
  <div>
    <h1>Create A New Patient</h1>
    <form @submit.prevent @click="addPatient()">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label>New Patient:</label>
            <input type="text" class="form-control" v-model="patient.patient_name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Entry Time:</label>
             <datetime type="datetime" v-model="patient.entry_time"></datetime>
            </div>
          </div>
      
         <div class="col-md-6">
            <div class="form-group">
              <label>Appointment Time:</label>
              <datetime type="datetime" v-model="patient.exit_time"></datetime>
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
          patient:{},
         
        }
    },
    
    
    methods: {
        addPatient(){
        let uri = '/api/checkIn/create';
        this.axios.post(uri, this.patient).then((response) => {
        this.$router.push({name: 'CheckInIndex'});
        });
    }
    }
  }
</script>