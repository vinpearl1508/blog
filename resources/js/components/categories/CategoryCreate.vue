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
                            <button class="btn btn-success">Create</button>
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
        data: function () {
            return {
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
                axios.post('/api/categories', newCategory)
                    .then(function (resp) {
                        app.$router.push({path: '/categories'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your category");
                    });
            }
        }
    }
</script>
