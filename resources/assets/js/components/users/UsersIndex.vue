
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createUser'}" class="btn btn-success">Create new user</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">User List</div>
            <div class="panel-body">
                <div class="panel-heading">
                    <div class="row right">Current time zone: {{userGmtTime}}</div>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="user, index in users">
                        <td>{{ user.first_name }}</td>
                        <td>{{ user.last_name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <router-link :to="{name: 'editUser', params: {id: user.id}}" class="btn btn-xs btn-default">
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
    export default {
        data: function () {
            return {
                systemTimezone: $(".container.user-list").attr('data-system-timezone'),
                userId: $(".container.user-list").attr('data-logged-as'),
                userGmtOffset: 0,
                userGmtTime: '',
                userTimezone: '',
                users: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/users')
                .then(function (resp) {
                    app.users = resp.data;
                    for (var iter in app.users) {
                        if (app.users[iter].id == app.userId) {
                            app.userGmtOffset = app.users[iter].timezone.gmtOffset / 3600;
                            app.userTimezone = app.users[iter].timezone.zoneName;
                            app.userGmtTime = 'GMT' + ((app.userGmtOffset >=0 ) ? '+' : '') + app.userGmtOffset + ' ' + app.users[iter].timezone.zoneName;
                        }
                    }
                    for (var iter in app.users) {
                        let localtime = moment.tz(
                            new Date(app.users[iter].created_at),
                            app.systemTimezone
                        );
                        let currentTime = localtime.clone().tz(
                            app.userTimezone
                        );
                        console.log(localtime.format());
                        console.log(currentTime.format());
                        app.users[iter].created_at = currentTime.format('YYYY-M-D hh:mm:ss');
                    }
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/users/' + id)
                        .then(function (resp) {
                            app.users.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete user");
                        });
                }
            }
        }
    }
</script>
