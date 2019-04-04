<template>
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Slug</th>
              <th>Description</th>
              <th>Image</th>
              <!-- <th>published</th> -->
              <th width="100">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="(post, index) in posts">
              <td>{{ post.id }}</td>
              <td>{{ post.title }}</td>
              <td>{{ post.slug }}</td>
              <td>{{ post.description }}</td>
              <td>
                <img v-bind:src="post.thumbnail" alt class="img-responsive">
              </td>
              <!-- <td>{{ post.published }}</td> -->
              <td>
                <router-link
                  :to="{name: 'posts.edit', params: {id: post.id}}"
                  class="btn btn-xs btn-default"
                >Edit</router-link>
                <a class="btn btn-xs btn-success" v-on:click="publishEntry(post.id, index)">Publish</a>
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
      posts: []
    };
  },
  mounted() {
    var app = this;
    axios
      .get("/api/draft")
      .then(function(resp) {
        app.posts = resp.data;
      })
      .catch(function(resp) {
        console.log(resp);
        alert("Could not load posts");
      });
  },
  methods: {
    publishEntry(id, index) {
      if (confirm("Do you really want to publish it?")) {
        var app = this;
        axios
          .get("/api/publish/" + id)
          .then(function(resp) {
            app.posts.splice(index, 1);
          })
          .catch(function(resp) {
            console.log(resp);
            alert("Could not publish post");
          });
      }
    }
  }
};
</script>

<style>
.img-responsive {
  width: 100px;
}
</style>