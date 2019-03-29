<template>
  <div class="row">
    <div class="col-md-12">
      <router-link :to="{name: 'categories.create'}" class="btn btn-success">Create new category</router-link>
      <div class="box">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th width="100">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(category, index) in categories">
              <td>{{ category.name }}</td>
              <td>{{ category.slug }}</td>
              <td>
                <router-link
                  :to="{name: 'categories.edit', params: {id: category.id}}"
                  class="btn btn-xs btn-default"
                >Edit</router-link>
                <a
                  href="#"
                  class="btn btn-xs btn-danger"
                  v-on:click="deleteEntry(category.id, index)"
                >Delete</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data: function() {
    return {
      categories: []
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/categories")
      .then(function(resp) {
        app.categories = resp.data;
      })
      .catch(function(resp) {
        console.log(resp);
        alert("Could not load category");
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
