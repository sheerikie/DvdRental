<template>
  <div>
    <h1>Create A New Dvd</h1>
    <form @submit.prevent @click="addDvd()">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label>Dvd Title:</label>
            <input type="text" class="form-control" v-model="dvd.name">
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Copies:</label>
             <input class="form-control" type="number" v-model="dvd.copies"></input>
            
            </div>
          </div>
      
         <div class="col-md-6">
            <div class="form-group">
              <label>Genre:</label>
              <select class="form-control" v-model="dvd.genre">
                <option value="action">Action</option>
                <option value="comedy">Comedy</option>
                <option value="thriller">Thriller</option>
                <option value="sci-fi">Sci-fi</option>
                <option value="drama">Drama</option>
              </select>
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
          dvd:{},
         
        }
    },
    
    
    methods: {
        addDvd(){
        let uri = '/api/dvd/create';
        this.axios.post(uri, this.dvd).then((response) => {
        this.$router.push({name: 'DvdIndex'});
        });
    }
    }
  }
</script>