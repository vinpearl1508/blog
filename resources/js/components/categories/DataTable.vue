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
      headers: [{ title: "ID" }, { title: "Name" }, { title: "Slug" }, { title: "Action" }],
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
        row.push(item.id);
        row.push(item.name);
        row.push(item.slug);
        // row.push('<router-link :to="{name: categories.edit, params: {id: item.id}}" class="btn btn-xs btn-default">Edit</router-link>');
        row.push('<a class="btn btn-xs btn-danger" data-id=23 v-on:click="deleteEntry(item.id, index)" >Delete</a>');
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
      info: false,
    });
  },
  methods: {
    deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/categories/" + id)
          .then(function(resp) {
            app.categories.splice(index, 1);
            app.$router.replace("/categories");
          })
          .catch(function(resp) {
            alert("Could not delete category");
          });
      }
    }
  }
};
</script>