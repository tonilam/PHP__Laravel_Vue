
<template>
    <div>
        <div class="form-group" v-if="userId > 0">
            <router-link :to="{name: 'createBlog', params: {id: userId}}" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Write Blog</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Blog list</div>
            <div class="panel-body">
                <div class="blog-entity" v-for="blog, index in blogs">
                    <router-link :to="{name: 'viewBlog', params: {id: blog.user.id, slug: blog.slug}}">
                    <div class="col-xs-2"><span class="glyphicon glyphicon-user"></span> {{ blog.user.first_name + ' ' + blog.user.last_name }}</div>
                    <div class="col-xs-10">{{ blog.title }}</div>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                userId: $(".container.blog").attr('data-logged-as'),
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
