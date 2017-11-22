
<template>

                    <form class="form-horizontal" method="POST" action="">
                        <input type="hidden" name="_token" :value="csrf">

                        <div class="form-group">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="timezone" class="col-md-4 control-label">Time Zone</label>

                            <div class="col-md-6">
                                <select id="timezone" class="form-control" name="timezone" autofocus>
                                    <option value="1">[GMT +8] Australia\Aldelaide</option>
                                    <option value="2">[GMT +8] Australia\Brisbane</option>
                                    <option value="3">[GMT +8] Australia\Sydney</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
</template>

<script>
    export default {
        data: function () {
            return {
                csrf: '',
                timezones: [],
                timezonePlaceholder: 'Loading'
            }
        },
        mounted() {
            this.csrf = this.$route.params.csrf;
            console.log(this.csrf);
            let app = this;
            axios.get('/api/v1/timezone')
                .then(function (resp) {
                    app.timezones = resp.data;
                    app.timezonePlaceholder = '-- Please select a time zone --';
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load users");
                });
        },
        methods: {
        }
    }
</script>
