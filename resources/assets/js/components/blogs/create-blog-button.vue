
<template>
        <div class="form-group" v-if="userId > 0">
            <router-link :to="{name: 'createBlog', params: {id: userId}}" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> &nbsp; Write Blog</router-link>
        </div>
</template>

<script>
    export default {
        data() {
            return {
                userId: $(".container.blog").attr('data-logged-as')
            }
        }
    }
</script>
