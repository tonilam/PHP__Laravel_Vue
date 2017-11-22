
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Modify user</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">First Name</label>
                            <input type="text" v-model="user.first_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Last Name</label>
                            <input type="text" v-model="user.last_name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Email</label>
                            <input type="text" v-model="user.email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Time Zone</label>
                            <select class="form-control" v-model="user.timezone">
                                <option value="">{{timezonePlaceholder}}</option>
                                <option v-for="timezone in timezones"
                                    :selected="timezone.zoneName == user.timezone"
                                    :value="timezone.zoneName">
                                    [GMT {{((timezone.gmtOffset/3600) >= 0)? '+' : ''}}
                                    {{(timezone.gmtOffset/3600)}}]
                                    {{timezone.zoneName}}</option>
                            </select>
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
    export default {
        data: function () {
            return {
                userId: null,
                user: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    timezone: '',
                    password: '',
                    repassword: '',
                },
                timezones: [],
                timezonePlaceholder: 'Loading',
            }
        },
        mounted() {
            let app = this;

            // Get timezones from API
            axios.get('/api/v1/timezone')
                .then(function (resp) {
                    app.timezones = resp.data;
                    app.timezonePlaceholder = '-- Please select a time zone --';
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });

            // Get user's information from API
            let id = app.$route.params.id;
            console.log(id);
            app.userId = id;
            axios.get('/api/v1/users/' + id)
                .then(response => {
                    app.user = response.data;
                })
                .catch(error => {
                    alert("Could not load user");
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser = app.user;
                axios.patch('/api/v1/users/' + app.userId, newUser)
                    .then(response => {
                        app.$router.replace('/');
                    })
                    .catch(error => {
                        console.log(error);
                        alert("Could not modify user");
                    });
            }
        }
    }
</script>
