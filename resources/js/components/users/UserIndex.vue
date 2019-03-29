<template>
    <div class="row">
        <div class="col-md-12">
            <router-link :to="{name: 'users.create'}" class="btn btn-success">Create new user</router-link>
            <div class="box">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Created at</th>
                        <th width="100">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(user, index) in users">
                        <td>{{user.name }}</td>
                        <td>{{user.email }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <router-link :to="{name: 'users.edit', params: {id: user.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(user.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        data: function () {
            return {
                users: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/users')
                .then(function (resp) {
                    app.users = resp.data;
                })
                .catch(function (err) {
                    console.log(err);
                    alert(err.data.message);
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/users/' + id)
                        .then(function (resp) {
                            app.users.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete post");
                        });
                }
            }
        }
    }
</script>
