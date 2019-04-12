<template>
  <div class="row">
    <div class="col-md-12">
      <router-link :to="{name: 'tags.list'}" class="btn btn-default">Back</router-link>
      <div class="box">
        <form v-on:submit="saveForm()">
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Tag name</label>
              <input type="text" v-model="tag.name" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <label class="control-label">Tag slug</label>
              <input type="text" v-model="tag.slug" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 form-group">
              <button class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  mounted() {
    let app = this;
    let id = app.$route.params.id;
    app.tagId = id;
    axios
      .get("/api/tags/" + id)
      .then(function(resp) {
        app.tag = resp.data;
      })
      .catch(function() {
        alert("Could not load your tag");
      });
  },
  data: function() {
    return {
      tagId: null,
      tag: {
        name: "",
        slug: ""
      }
    };
  },
  methods: {
    saveForm() {
      event.preventDefault();
      var app = this;
      var newTag = app.tag;
      axios
        .patch("/api/tags/" + app.tagId, newTag)
        .then(function(resp) {
          app.$router.replace("/tags");
        })
        .catch(function(resp) {
          console.log(resp);
          alert("Could not edit your tag");
        });
    }
  }
};
</script>
