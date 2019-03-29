<template>
    <div class="row">
        <div class="col-md-12">
            <router-link :to="{name: 'users.list'}" class="btn btn-default">Back</router-link>
            <div class="box">
                <form v-on:submit="saveForm() ">

                    <button class="btn btn-success" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {}
        },
        mounted() {

        },
        methods: {}
    }
</script>
