
<template>
    <div>
        <div class="form-group">
            <router-link to="/blog" class="btn btn-success back-btn"><span class="glyphicon glyphicon-chevron-left"></span> &nbsp; Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>{{ blog.title }}</h3>
                <div>Written By {{ blog.user.first_name + ' ' + blog.user.last_name }}</div>
                <div>on {{ blog.created_at }}</div>
            </div>
            <div class="panel-body">
                <div>
                    <div id="summercode" v-html="blog.content"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                userId: $(".container.blog-list").attr('data-logged-as'),
                blog: {
                    title: '',
                    content: '',
                    created_at: '',
                    user: {
                        first_name: '',
                        last_name: ''
                    }
                }
            }
        },
        mounted() {
            var app = this;
            var reqId = app.$route.params.id;
            var reqSlug = app.$route.params.slug;
            console.log('mounted');

            // use axios to get api resources
            axios.get('/api/v1/blog/'+reqSlug)
                .then(function (resp) {
                    app.blog = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load blog entities");
                });
        },
        methods: {
        }
    }
</script>
