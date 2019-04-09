<template>
  <div class="container">
    <h3>Vue Datatable example</h3>Filter by anything:
    <input v-model="search">
    <hr>
    <DataTable :categories="filteredCategories"></DataTable>
  </div>
</template>

<script>
import DataTable from "./DataTable.vue";
export default {
  components: {
    'DataTable' :DataTable
  },
  data() {
    return {
      categories: [],
      search: ""
    };
  },
  computed: {
    filteredCategories: function() {
      let self = this;
      let search = self.search.toLowerCase();
      return self.categories.filter(function(comments) {
        return (
          comments.name.toLowerCase().indexOf(search) !== -1 ||
          comments.slug.toLowerCase().indexOf(search) !== -1
        );
      });
    }
  },
  mounted() {
    let vm = this;
    $.ajax({
      url: "/api/categories",
      success(res) {
        vm.categories = res;
      }
    });
  }
};
</script>