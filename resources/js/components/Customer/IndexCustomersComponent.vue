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
        props: ['customer'],
       
        data() {
            return {
                headers: [
                { title: 'Name' },
                { title: 'National_id' },
                { title: 'Phone' },
                { title: 'Address' },
                ],
                rows: [],
                customer: [],
                dtHandle: null,
               
            }
        },
        watch: {
           customer(val, oldVal) {
      let vm = this;
      vm.rows = [];
      val.forEach(function (item) {
        let row = [];
        row.push(item.name);
        row.push(item.national_id);
        row.push(item.phone)
        row.push(item.address);
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
            getCustomers: function() {
                axios.get('/api/customer').then(function(response){
                    this.customer = response.data.data;
                }.bind(this));
            },
            deleteCustomers(id){
              let uri = `api/customer/delete/${id}`;
              this.axios.delete(uri).then(response => {
                this.customer.splice(this.dvd.indexOf(id), 1);
              });
            },
            print() {
            // Pass the element id here
            this.$htmlToPaper('table');
            }
        },
        created: function(){
            this.getCustomers()
        }
    }
</script>
