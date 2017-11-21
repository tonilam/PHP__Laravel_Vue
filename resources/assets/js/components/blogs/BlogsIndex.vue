
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createBlog', params: {id: userId}}" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Write Blog</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Blog list</div>
            <div class="panel-body">
                <div v-for="blog, index in blogs">
                    <h3>{{ blog.title }}</h3>
                    <div>Written By {{ blog.user.first_name + ' ' + blog.user.last_name }}</div>
                    <div>{{ blog.content }}</div>
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
                blogs: []
            }
        },
        mounted() {
            var app = this;
            console.log('mounted');
            axios.get('/api/v1/blog')
                .then(function (resp) {
                    app.blogs = resp.data;
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
