<template>
    <div class="row">
        <div class="col-md-12">
            <router-link :to="{name: 'posts.list'}" class="btn btn-default">Back</router-link>
            <div class="box">
                <form v-on:submit="saveForm() ">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Post Content</label>
                            <ckeditor :editor="editor" v-model="post.content" :config="editorConfig"></ckeditor>
                        </div>
                    </div>
                    <div class="col-md-4">
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
                            <!--<input type="file" @change="handleFileChange"/>-->

                            <div class="row">
                                <div class="col-md-3" v-if="post.thumbnail">
                                    <img :src="post.thumbnail" class="img-responsive" height="70" width="90">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" v-on:change="onImageChange" id="thumbnail" class="form-control">
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

                        <div class="form-group">
                            <label>Post Category</label>
                            <select class="form-control" v-model="post.category_id" id="category">
                                <option v-for="category in categories" :value="category.id" :key="(category, index).id">
                                    {{ category.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        data: function () {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    //
                },
                // tags: {
                //     id: '',
                //     name: '',
                //     slug: ''
                // },
                categories: {
                    id: '',
                    name: '',
                    slug: ''
                },
                post: {
                    title: '',
                    slug: '',
                    thumbnail: '',
                    description: '',
                    category_id: '',
                    content: '<p>Content of the editor.</p>'
                }
            }
        },
        mounted() {
            var app = this;
            // axios.get('/api/tags')
            //     .then(function (resp) {
            //         app.tags = resp.data;
            //     })
            //     .catch(function (resp) {
            //         console.log(resp);
            //         alert("Could not load tags");
            //     });
            this.axios.get('/api/categories')
                .then(function (resp) {
                    app.categories = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load categories");
                });
        },
        methods: {
            onImageChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.post.thumbnail = e.target.result;
                };
                reader.readAsDataURL(file);
            },
            handleFileChange(event) {
                //you can access the file in using event.target.files[0]
                // this.post.thumbnail = event.target.files[0];
                this.post.thumbnail = document.getElementById('thumbnail').files[0];
                console.log(this.post.thumbnail)
            },
            saveForm() {
                event.preventDefault();
                let data = new FormData();
                let thumbnail = document.getElementById("thumbnail").files[0];
                if (typeof thumbnail != "undefined") {
                    data.append('thumbnail', thumbnail, thumbnail.name);
                }
                data.append('title', this.post.title);
                data.append('slug', this.post.slug);
                data.append('description', this.post.description);
                data.append('content', this.post.content);
                data.append('category_id', this.post.category_id);

                this.axios.post('/api/posts', data, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                }).then(function (resp) {
                    // console.log(resp)
                    alert(resp.data.message)
                    // app.$router.push({path: '/'});
                }).catch(function (resp) {
                    console.log(resp);
                    alert(resp.data.message);
                });
            }
        }
    }
</script>
