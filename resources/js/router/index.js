import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Home from '../pages/Home.vue'
import categorylist from '../pages/category/index.vue'
import CategoryCreate from '../pages/category/create.vue'
import CategoryEdit from '../pages/category/edit_cat.vue'

import Postlist from '../pages/post/index.vue'
import PostCreate from '../pages/post/create.vue'
import PostEdit from '../pages/post/edit_post.vue'



const routes = new VueRouter({
   mode: 'history',
   routes: [
       {
            path:'/admindashboard',
            component: Home,
            name: "adminDashboard",
       },
       {
        path:'/admindashboard/category',
        component: categorylist,
        name: "category-list",
       },
       {
          path:'/admindashboard/category/create',
          component: CategoryCreate,
          name: "category-create",
       },
       {
         path:'/admindashboard/category/edit/:id',
         component: CategoryEdit,
         name: "category-edit",
      },
      

      {
         path:'/admindashboard/post',
         component: Postlist,
         name: "Post-list",
        },
        {
           path:'/admindashboard/post/create',
           component: PostCreate,
           name: "Post-create",
        },
        {
          path:'/admindashboard/post/edit/:id',
          component: PostEdit,
          name: "Post-edit",
       },
   ] 
});

export default routes;