import { createRouter, createWebHistory} from "vue-router";

const routes = [
    {
        path: '/:slug',
        component: () => import('../pages/Render.vue')
    },
    {
        path: '/admin/slider',
        component: () => import('../pages/Slider.vue')
    },
    {
        path: '/admin/trang/them',
        component: () => import('../pages/CreatePage.vue')
    },
    {
        path: '/admin/trang/moi',
        component: () => import('../pages/Page/Create.vue')
    },
    {
        path: '/admin/hinh-anh',
        component: () => import('../pages/HinhAnh.vue')
    },
    {
        path: '/admin/menus/:id',
        component: () => import('../pages/Menu.vue')
    },
    {
        path: '/admin/footer',
        component: () => import('../pages/Footer.vue')
    }
];

const router = createRouter({
    routes,
    history: createWebHistory()
})

export default router;
