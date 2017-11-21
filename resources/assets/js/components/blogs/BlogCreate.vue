
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Create new blog entity</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Title</label>
                            <input type="text" v-model="title" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Slug</label>
                            <input type="text" v-model="blog.slug" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Content</label>
                            <input type="text" v-model="blog.content" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <input type="hidden" v-model="blog.user_id" class="form-control">
                            <button class="btn btn-success">Save</button>
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
                title: null,
                blog: {
                    title: '',
                    slug: '',
                    content: '',
                    user_id: '',
                }
            }
        },
        watch: {
            title: function() {
                this.blog.title = this.title;
                this.blog.slug = this.title.toLowerCase().replace(/ /g, '-');
            }
        },
        mounted: function() {
            let app = this;
            let id = app.$route.params.id;
            this.blog.user_id = id;
            console.log('Ready to write blog');
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newBlogEntity = app.blog;
                axios.post('/api/v1/blog', newBlogEntity)
                    .then(response => {
                        app.$router.push({path: '/'});
                    })
                    .catch(error => {
                        console.log(error);
                        alert("Could not create new blog entity");
                    });
            }
        }
    }
</script>
