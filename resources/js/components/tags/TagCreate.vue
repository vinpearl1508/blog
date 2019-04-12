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
              <button class="btn btn-success">Create</button>
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
  data: function() {
    return {
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
        .post("/api/tags", newTag)
        .then(function(resp) {
          app.$router.push({ path: "/tags" });
        })
        .catch(function(resp) {
          console.log(resp);
          alert("Could not create your tag");
        });
    }
  }
};
</script>
