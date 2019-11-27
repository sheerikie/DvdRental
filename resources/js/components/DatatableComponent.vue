<script>
Vue.component('data-table', {
  render: function (createElement) {
    return createElement(
      "table", null, []
      )
  },
  props: ['patient'],
  data() {
    return {
      headers: [
        { title: 'Name' },
        { title: 'Entry Time' },
        { title: 'Exit Time' },
        ],
      rows: [] ,
      dtHandle: null
    }
  },
  watch: {
    patient(val, oldVal) {
      let vm = this;
      vm.rows = [];
      val.forEach(function (item) {
        let row = [];
        row.push(item.name);
        row.push(item.entry);
        row.push(item.exit);
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
  }  
});

</script>
