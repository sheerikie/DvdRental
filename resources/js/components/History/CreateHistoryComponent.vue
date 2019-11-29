<template>
      <div class="container">
        <div class="row justify-content-center">
     <div class="col-md-8">
                <div class="card" style="background:lightgray">
                  <div class="card-header">
    <h1>Create A New Transaction</h1>
    </div>
    <div class="card-body">
    <form @submit.prevent @click="addHistory()">
      <div class="row">
        <div class="col-md-10">
          <div class="form-group">
            <label>Dvd Title:</label>
         
         <input type="text" placeholder="what are you looking for?" v-model="history.dvd_title" v-on:keyup="autocompleteDvd"   class="form-control">
        <div class="panel-footer" v-if="results.length">
        <ul class="list-group">
          <li class="list-group-item" v-for="result in results" style="background:gray">
          {{ result.catalog }}
          </li>
        </ul>
        </div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Customer National Id:</label>
             <input class="form-control" placeholder="what is your Id?" type="text"  v-model="history.national_id" v-on:keyup="autocompleteUser"></input>
              
              <div class="panel-footer" v-if="userResults.length">
              <ul class="list-group">
                <li class="list-group-item" v-for="result in  userResults" style="background:gray">
                {{ result.national_id }}
                </li>
              </ul>
            </div>
            </div>
          </div>
      
         <div class="col-md-6">
            <div class="form-group">
              <label>Borrowing Time:</label>
              <datetime class="form-control" type="datetime" v-model="history.borrowing_date"></datetime>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Deadline Time:</label>
              <datetime class="form-control" type="datetime" v-model="history.deadline_date"></datetime>
            </div>
          </div>

         
        </div><br />
        <div class="form-group">
          <button class="btn btn-primary">Create</button>
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
          history:{},
          query:'',
          results: [],
          userResults:[],
          user_query:'',
         
        }
    },
    
    
    methods: {
        addHistory(){
        let uri = '/api/history/create';
        this.axios.post(uri, this.history).then((response) => {
        this.$router.push({name: 'HistoryIndex'});
        });
        },
        autocompleteDvd(){
         
          this.results = [];
          if(this.history.dvd_title.length > 2){
          axios.get('/api/dvd/autocomplete/search',{params: {query: this.history.dvd_title}}).then(response => {
            this.results = response.data;
          });
          }
        },
          autocompleteUser(){
           
          this.userResults = [];
          if(this.history.national_id.length > 2){
          axios.get('/api/customer/autocomplete/search',{params: {user_query: this.history.national_id}}).then(response => {
            this.userResults = response.data;
          });
          }
        },
        
        }
}
</script>