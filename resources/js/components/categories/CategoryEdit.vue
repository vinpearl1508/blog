<template>
    <div class="row">
        <div class="col-md-12">
            <router-link :to="{name: 'categories.list'}" class="btn btn-default">Back</router-link>
            <div class="box">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Category name</label>
                            <input type="text" v-model="category.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Category slug</label>
                            <input type="text" v-model="category.slug" class="form-control">
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
    import axios from 'axios';
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.categoryId = id;
            axios.get('/api/categories/' + id)
                .then(function (resp) {
                    app.category = resp.data;
                })
                .catch(function () {
                    alert("Could not load your category")
                });
        },
        data: function () {
            return {
                categoryId: null,
                category: {
                    name: '',
                    slug: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newCategory = app.category;
                axios.patch('/api/categories/' + app.categoryId, newCategory)
                    .then(function (resp) {
                        app.$router.replace('/categories');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your category");
                    });
            }
        }
    }
</script>
