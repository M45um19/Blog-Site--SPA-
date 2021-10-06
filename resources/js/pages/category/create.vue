<template>
  <div>
      <main class="mt-5 pt-3">
          <div class="container-fluid">
              <h3>Add Category</h3>
              <hr>
              <router-link :to="{name:'category-list'}" class="btn btn-dark">See all Category</router-link>
                <br>
                <br>

                <div class="">
                <div class="row">
                    <div class="col-6">
                   <form @submit.prevent="createCategory">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" v-model="catname" class="form-control" name="name" placeholder="Category Name" required>
                            
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
export default {
    data(){
        return {
            catname:'',
        }
    },
    methods: {
        createCategory(){
            axios.post('/api/category', {
                name: this.catname
                }).then(response => {
                console.log(response)
                this.catname = ''
                this.$toast.success({
                title:'Done',
                message:'Category Created Successfully'
            })
            })
        }
    },
}
</script>

<style>

</style>
