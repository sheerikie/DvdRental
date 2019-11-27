
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
        props: ['patient'],
       
        data() {
            return {
                headers: [
                { title: 'Name' },
                { title: 'Entry Time' },
                { title: 'Department' },
                { title: 'Practioner' },
                { title: 'Patient Seen' },
                ],
                rows: [],
                patient: [],
                dtHandle: null,
               
            }
        },
        watch: {
           patient(val, oldVal) {
      let vm = this;
      vm.rows = [];
      val.forEach(function (item) {
        let row = [];
        row.push(item.patient_name);
        row.push(item.created_at);
        row.push(item.department)
        row.push(item.doctor);
        row.push(item.seen);
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
            getPatients: function() {
                axios.get('/api/checkIn').then(function(response){
                    this.patient = response.data.data;
                }.bind(this));
            },
            deletePatient(id){
              let uri = `api/checkIn/delete/${id}`;
              this.axios.delete(uri).then(response => {
                this.patient.splice(this.patient.indexOf(id), 1);
              });
            },
            print() {
            // Pass the element id here
            this.$htmlToPaper('table');
            }
        },
        created: function(){
            this.getPatients()
        }
    }
</script>
