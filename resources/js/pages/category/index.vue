<template>
  <div>
      <main class="mt-5 pt-3">
        <div class="container-fluid">
            <h3 class="">Category</h3>
            <hr>
            <router-link :to="{name:'category-create'}"  class="btn btn-success">Add Category</router-link>
            <br>
            <br>
            
                <div class="table-responsive">
                    <table class="table align-middle">
                    <thead class="admin_table">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                    
                        <tr v-for="category in categories" :key="category.id">
                            <th scope="row">{{category.id}}</th>
                            <td>{{category.name}}</td>
                            <td>
                            <router-link :to="{name: 'category-edit' , params: {id: category.id}}" class="btn btn-secondary" >Edit</router-link>
                            <a @click.prevent="deletecategory(category.id)" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                   
                    </tbody>
                    </table>
    
                </div>
       </div>   
      </main>
       
  </div>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            categories : [],
        }
    },
    methods: {
        loadcategories(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            });
        },
        deletecategory(id){
            axios.delete('/api/category/'+id).then(() => {
                this.$toast.success({
                    title:'Done',
                    message:'Category Deleted Successfully'
                });
            });
            this.loadcategories();
        }
    },
    mounted() {
        this.loadcategories();
    },

}
</script>

<style>

</style>