
import Vue from 'vue'
import VueRouter from 'vue-router'
import login from './components/authentication/login'
import logout from './components/authentication/logout'
import register from './components/authentication/register'
import content from './components/content'
import addcustomer from './components/customer/add'
import deposit from './components/financial/deposit'
import withdraw from './components/financial/withdraw'
import report from './components/financial/report'

Vue.use(VueRouter);
const router = new VueRouter({
    routes:[
        {
            path: '/login',
            component: login,
            meta: {
              forVisitors : true
            }

        },
        {
            path: '/register',
            component: register,
            meta: {
                forVisitors : true
            }
        },
        {
            path: '/',
            component: content,
            meta: {
                forAuth : true
            }
        },
        {
            path: '/home',
            component: content,
            meta: {
                forAuth : true
            }
        },
        {
            path: '/add',
            component: addcustomer,
            meta: {
                forAuth : true
            }

        },
        {
            path: '/logout',
            component: logout,
            meta: {
                forAuth : true
            }
        },
        {
            path: '/deposit',
            component: deposit,
            meta: {
                forAuth : true
            }
        },
        {
            path: '/withdraw',
            component: withdraw,
            meta: {
                forAuth : true
            }
        },
        {
            path: '/report',
            component: report,
            meta: {
                forAuth : true
            }
        }

    ],
    linkActiveClass: 'active',
    mode: 'history'
});
export default router
