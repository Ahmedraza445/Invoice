import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    routes: [
        {path: '/', redirect: '/invoices'},
        {path: '/invoices', component: require('../views/Invoices/index.vue').default},
        {path: '/invoices/create', component: require('../views/Invoices/form.vue').default},
        {path: '/invoices/:id/edit', component: require('../views/Invoices/form.vue').default, meta: {mode: 'edit'}},
        {path: '/invoices/:id', component: require('../views/Invoices/show.vue').default}
    ]
})

export default router