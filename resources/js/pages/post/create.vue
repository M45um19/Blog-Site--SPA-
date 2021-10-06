<template>
  <div>
      <main class="mt-5 pt-3">
          <div class="container-fluid">
              <h3>Add Post</h3>
              <hr>
              <router-link :to="{name:'Post-list'}" class="btn btn-dark">See all Post</router-link>
                <br>
                <br>

                <div class="">
                <div class="row">
                    <div class="col-6">
                   <form @submit.prevent="creatPost">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input v-model="postForm.title"  type="text" class="form-control" placeholder="Post title" required>
                            
                        </div>
                         <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea v-model="postForm.description" rows="5" type="text" class="form-control" placeholder="Description write here" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-control" v-model="postForm.category">
                                <option disabled value="">Select Category</option>
                                <option v-for="category in categories" :key="category.id"  v-bind:value="category.id">{{category.name}}</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file"  @change="onImageChange" class="form-control">
                            
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
import { objectToFormData } from 'object-to-formdata'
export default {
    data() {
        return {
            categories : [],
            postForm: new Form({
                title: '',
                description: '',
                category: '',
                image: '',
            }),
        }
    },
    methods: {
        loadcategories(){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            });
        },
        creatPost(){
            this.postForm.post('/api/post', {
                    transformRequest: [function (data, headers) {
                        return objectToFormData(data)
                    }],
                    onUploadProgress: e => {
                        // Do whatever you want with the progress event
                        console.log(e)
                    }
                }).then( () => {
                this.postForm.title = '';
                this.postForm.description = '';
                this.postForm.category = '';
                this.postForm.image = '';
                this.$toast.success({
                    title:'Done',
                    message:'Post Added Successfully'
                });
            })
        },
        onImageChange(e){
             const file = e.target.files[0];
            // Do some client side validation...
            this.postForm.image = file;
            
        }
  
    },
    mounted() {
        this.loadcategories();
    },
}
</script>

<style>

</style>