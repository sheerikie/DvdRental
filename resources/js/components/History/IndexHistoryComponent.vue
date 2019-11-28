<script>

    export default{
    
        render: function (createElement) {
            return createElement(
                "table", {
                    ref: 'table'
                }, [   createElement(
          'button',
          {
            on: {
              click: () => print(),
            }
          },
          'Click to print'
        )]
            )
        },
        props: ['history'],
       
        data() {
            return {
              
                headers: [
                { title: 'Name' },
                { title: 'National_id' },
                { title: 'Phone' },
                { title: 'Dvd Title' },
                { title: 'borrowing_date' },
                { title: 'deadline_date' },
                { title: 'return_date' },
                { title: 'penalty(Kes)' },
                ],
                rows: [],
                history: [],
                dtHandle: null,
               
            }
        },
        watch: {
           history(val, oldVal) {
   
      let vm = this;
      vm.rows = [];
      val.forEach(function (item) {
        let row = [];
      
        row.push(item.name);
        row.push(item.national_id);
        row.push(item.phone);
        row.push(item.catalog);
        row.push(item.borrowing_date);
        row.push(item.deadline_date);
        if (item.return_date==null) {
           row.push( `<a href="/api/history/edit/${item.hid}"class="btn btn-danger">Return Dvd</a>`); 
        }
        else{
            row.push(item.return_date); 
        }
        
        row.push(item.penalty);
        vm.rows.push(row);
      });
      vm.dtHandle.clear();
      vm.dtHandle.rows.add(vm.rows);
      vm.dtHandle.draw();
    }
        },
        mounted() {
            let vm = this;
            vm.dtHandle = $(this.$el).DataTable({
                columns: vm.headers,
                data: vm.rows,
                searching: true,
                paging: true,
                info: false
            });
        },
        methods:{
            getHistory: function() {
                axios.get('/api/history').then(function(response){
                    this.history = response.data.data;
                }.bind(this));
            },
            deleteHistory(id){
              let uri = `api/history/delete/${id}`;
              this.axios.delete(uri).then(response => {
                this.history.splice(this.dvd.indexOf(id), 1);
              });
            },
            print() {
            // Pass the element id here
            this.$htmlToPaper('table');
            },
            showAlert(){
                console.log('Iam done');
            }
           
        },
        created: function(){
            this.getHistory()
        }
    }
</script>
