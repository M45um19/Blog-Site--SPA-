<template>
  <div>
      <main class="mt-5 pt-3">
          <div class="container-fluid">
              <h3>Edit Category</h3>
              <hr>
              <router-link :to="{name:'category-list'}" class="btn btn-dark">See all Category</router-link>
                <br>
                <br>

                <div class="">
                <div class="row">
                    <div class="col-6">
                   <form @submit.prevent="updateCategory">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" v-model="catrgoryForm.name" class="form-control" name="name" placeholder="Category Name" required>
                            
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                    </div>
                    <div class="col">
                    </div>
                </div>
                </div>
          </div>
      </main>
  </div>
</template>

<script>
import Form from 'vform'
export default {
    data(){
        return{
            catrgoryForm: new Form({
                name: '',
            }),  
        }
    },
    methods: {
        updateCategory(){
            let id2 = this.$route.params.id;
            this.catrgoryForm.put('/api/category/'+id2).then( () => {
                this.$toast.success({
                    title:'Done',
                    message:'Category Edited Successfully'
                });
            })
        },
        loadCategory(){
            let id2 = this.$route.params.id;
            axios.get('/api/category/'+id2+'/edit').then(response => {
                this.catrgoryForm.name = response.data.name;
            });
        }
    },
    mounted(){
        this.loadCategory();
    }
}
</script>

<style>

</style>
