<template>
  <div class="row">
    <div class="col-md-12">
      <router-link :to="{name: 'posts.list'}" class="btn btn-default">Back</router-link>
      <div class="box">
        <form v-on:submit.prevent="saveForm()" enctype="multipart/form-data">
          <div class="col-md-8">
            <div class="form-group">
              <label>Post Content</label>
              <ckeditor :editor="editor" v-model="post.body" :config="editorConfig"></ckeditor>
            </div>
          </div>
          <div class="col-md-4">
            <!-- <div class="form-group">
              <label>Post Visibility</label>
              <select class="form-control" v-model="post.published" id="published">
                <option :selected="post.published === 1" value="1">Public</option>
                <option :selected="post.published === 0" value="0">Draft</option>
              </select>
            </div>-->
            <div class="form-group">
              <label>Post Title</label>
              <input type="text" v-model="post.title" class="form-control">
            </div>

            <div class="form-group">
              <label>Post Slug</label>
              <input type="text" v-model="post.slug" class="form-control">
            </div>

            <div class="form-group">
              <label>Post thumbnail</label>
              <div class="row">
                <div class="col-md-3" v-if="post.thumbnail">
                  <img :src="post.thumbnail" class="img-responsive" height="70" width="90">
                </div>
                <div class="col-md-6">
                  <input
                    type="file"
                    v-on:change="onImageChange"
                    id="thumbnail"
                    class="form-control"
                  >
                </div>
              </div>
            </div>

            <div class="form-group">
              <label>Post description</label>
              <textarea v-model="post.description" cols="30" rows="2" class="form-control"></textarea>
            </div>

            <!--<div class="form-group">-->
            <!--<label>Post Tag</label>-->
            <!--</div>-->

            <!-- <div class="form-group">
              <label>Post Category</label>
              <select class="form-control" v-model="post.category_id" id="category">
                <option v-for="category in categories" :value="category.id">{{ category.name }}</option>
              </select>
            </div>-->
          </div>
          <button class="btn btn-success" type="submit">Save</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import axios from "axios";
export default {
  mounted() {
    let app = this;
    let id = app.$route.params.id;
    app.post.id = id;
    this.axios
      .get("/api/posts/" + id)
      .then(function(resp) {
        app.post = resp.data;
      })
      .catch(function() {
        alert("Could not load your post");
      });

    // this.axios
    //   .get("/api/categories")
    //   .then(function(resp) {
    //     app.categories = resp.data;
    //   })
    //   .catch(function(resp) {
    //     console.log(resp);
    //     alert("Could not load categories");
    //   });
  },
  data: function() {
    return {
      editor: ClassicEditor,
      editorConfig: {
        //
      },
      // categories: {
      //   id: "",
      //   name: "",
      //   slug: ""
      // },
      post: {
        title: "",
        slug: "",
        thumbnail: "",
        description: "",
        // user_id: 1,
        body: ""
      }
    };
  },
  methods: {
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        vm.post.thumbnail = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    saveForm() {
      event.preventDefault();
      var app = this;
      var newPost = app.post;
      axios
        .patch("/api/posts/" + app.post.id, newPost)
        .then(function(resp) {
          app.$router.replace({ path: "/posts" });
        })
        .catch(function(resp) {
          console.log(resp);
          alert("Could not edit your post");
        });
    }
  }
};
</script>
