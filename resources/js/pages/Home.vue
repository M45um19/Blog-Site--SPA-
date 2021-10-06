<template>
  <div>
      <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <h4>Full Dashboard</h4>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              
              <div class="card-body py-5"><p>Total {{ categories.length }} Categories</p></div>
              
              
              <router-link :to="{name: 'category-list'}" class="card-footer d-flex card_link">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </router-link>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark h-100">
              
              <div class="card-body py-5"><p>Total {{ posts.length }} Posts</p></div>
              <router-link :to="{name: 'Post-list'}" class="card-footer d-flex card_link">
                View Details
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </router-link>
            </div>
          </div>
          
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
            posts: [],
        }
    },
    methods: {
        loadcategories(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            });
        },
        loadPosts(){
          axios.get('/api/post').then(response => {
            this.posts = response.data;
          })
        }
    },
    mounted() {
        this.loadcategories();
        this.loadPosts();
    },
  
}
</script>


<style>

</style>