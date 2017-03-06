// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Router from './routs'
import vueResource from 'vue-resource'
import auth from './packages/auth/auth'
Vue.use(vueResource);
Vue.use(auth);
Vue.config.productionTip = false;
Vue.http.options.root = "http://localhost/webventure/venture_test/laravel54/public/index.php";
Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken();
Router.beforeEach(
    (to, from, next) => {
        if(to.matched.some(record => record.meta.forVisitors)){
            if(Vue.auth.isAuthenticated()){
              next({
                  path: '/home',
              })
            }else next()
        }
        else if(to.matched.some(record => record.meta.forAuth)){
            if(! Vue.auth.isAuthenticated()){
                next({
                    path: '/login',
                })
            }else next()
        }
        else next()
    }
);
new Vue({
  el: '#app',
  template: '<App/>',
  components: { App },
  router: Router
});
