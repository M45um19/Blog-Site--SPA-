<template>
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <h3 class="">Posts</h3>
            <hr>
            <router-link :to="{name:'Post-create'}"  class="btn btn-success">Add Post</router-link>
            <br>
            <br>
            
                <div class="table-responsive">
                    <table class="table align-middle">
                    <thead class="admin_table">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="post in posts" :key="post.id">
                            <th scope="row">{{post.id}}</th>
                            <td>{{post.Title}}</td>
                            <td><img v-bind:src="'/storage/post/' + post.image" width="50" height="60"></td>
                            <td>
                                 <router-link :to="{name: 'Post-edit' , params: {id: post.id}}" class="btn btn-secondary" >Edit</router-link>
                            <a @click.prevent="deletepost(post.id)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        
                   
                    </tbody>
                    </table>
    
                </div>
        </div>
    </main>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            posts : [],
        }
    },
    methods: {
        loadposts(){
            axios.get('/api/post').then(response => {
                this.posts = response.data;
            });
        },
        deletepost(id){
            axios.delete('/api/post/'+id).then(() => {
                this.$toast.success({
                    title:'Done',
                    message:'Post Deleted Successfully'
                });
            });
            this.loadposts();
        },
        
    },
    mounted() {
        this.loadposts();
    },

}
</script>

<style>

</style>