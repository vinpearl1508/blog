<template>
    <div class="row">
        <div class="col-md-12">
            <router-link :to="{name: 'users.list'}" class="btn btn-default">Back</router-link>
            <div class="box">
                <form v-on:submit="saveForm()" enctype="multipart/form-data">

                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.user.id = id;
            this.axios.get('/api/users/' + id)
                .then(function (resp) {
                    app.user = resp.data;
                })
                .catch(function () {
                    alert("Could not load your post")
                });

            this.axios.get('/api/categories')
                .then(function (resp) {
                    app.categories = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load categories");
                });
        },
        data: function () {
            return {

            }
        },
        methods: {
            saveForm() {

            }
        }
    }
</script>
