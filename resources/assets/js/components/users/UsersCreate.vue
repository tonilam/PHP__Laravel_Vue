
<template>
    <div>
        <div class="form-group">
            <router-link to="/users/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new user</div>
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
                                <option v-for="timezone in timezones" v-bind:value="timezone.id">
                                    [GMT {{((timezone.gmtOffset/3600) >= 0)? '+' : ''}}
                                    {{(timezone.gmtOffset/3600)}}]
                                    {{timezone.zoneName}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Password</label>
                            <input type="password" v-model="user.password" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Confirm Password</label>
                            <input type="password" v-model="user.repassword" class="form-control">
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
    export default {
        data: function () {
            return {
                user: {
                    first_name: '',
                    last_name: '',
                    email: '',
                    timezone: '',
                    password: '',
                    repassword: '',
                },
                timezones: [],
                timezonePlaceholder: 'Loading'
            }
        },
        mounted() {
            let vmInstance = this;
            axios.get('/api/v1/timezone')
                .then(function (resp) {
                    vmInstance.timezones = resp.data;
                    vmInstance.timezonePlaceholder = '-- Please select a time zone --';
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newUser = app.user;
                axios.post('/api/v1/users', newUser)
                    .then(function (resp) {
                        app.$router.push('/users/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create new user");
                    });
            }
        }
    }
</script>
