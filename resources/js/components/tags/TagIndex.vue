<template>
  <div class="row">
    <div class="col-md-12">
      <router-link :to="{name: 'tags.create'}" class="btn btn-success">Create new tag</router-link>
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
            <tr v-for="(tag, index) in tags" :key="(tag, index).id">
              <td>{{ tag.name }}</td>
              <td>{{ tag.slug }}</td>
              <td>
                <router-link
                  :to="{name: 'tags.edit', params: {id: tag.id}}"
                  class="btn btn-xs btn-default"
                >Edit</router-link>
                <a class="btn btn-xs btn-danger" v-on:click="deleteEntry(tag.id, index)">Delete</a>
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
      tags: []
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/tags")
      .then(function(resp) {
        app.tags = resp.data;
      })
      .catch(function(resp) {
        console.log(resp);
        alert("Could not load tag");
      });
  },
  methods: {
    deleteEntry(id, index) {
      if (confirm("Do you really want to delete it?")) {
        var app = this;
        axios
          .delete("/api/tags/" + id)
          .then(function(resp) {
            app.tags.splice(index, 1);
            app.$router.replace("/tags");
          })
          .catch(function(resp) {
            alert("Could not delete tag");
          });
      }
    }
  }
};
</script>