<script>
export default {
  name: 'DataTable',
  render: function(createElement) {
    return createElement(
      "table",
      {
        ref: "table"
      },
      []
    );
  },
  props: ["categories"],
  data() {
    return {
      headers: [{ title: "Name" }, { title: "Slug" }],
      rows: [],
      dtHandle: null
    };
  },
  watch: {
    categories(val, oldVal) {
      let vm = this;
      vm.rows = [];
      val.forEach(function(item) {
        let row = [];
        row.push(item.name);
        row.push(item.slug);
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
};
</script>