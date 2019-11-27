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
        props: ['dvds'],
       
        data() {
            return {
                headers: [
                { title: 'Catalog' },
                { title: 'Copies' },
                { title: 'Availability' },
                { title: 'Genre' },
                ],
                rows: [],
                dvd: [],
                dtHandle: null,
               
            }
        },
        watch: {
           dvd(val, oldVal) {
      let vm = this;
      vm.rows = [];
      val.forEach(function (item) {
        let row = [];
        row.push(item.catalog);
        row.push(item.copies);
        row.push(item.availability)
        row.push(item.genres);
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
            getDvds: function() {
                axios.get('/api/dvd').then(function(response){
                    this.dvd = response.data.data;
                }.bind(this));
            },
            deleteDvd(id){
              let uri = `api/dvd/delete/${id}`;
              this.axios.delete(uri).then(response => {
                this.dvd.splice(this.dvd.indexOf(id), 1);
              });
            },
            print() {
            // Pass the element id here
            this.$htmlToPaper('table');
            }
        },
        created: function(){
            this.getDvds()
        }
    }
</script>
