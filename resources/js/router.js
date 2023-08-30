import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home/Index.vue';
import NotFound from './pages/NotFound.vue';
import AboutUs from './pages/AboutUs/Index.vue';
import ProductService from './pages/ProductAndService/Index.vue';
import News from './pages/News/Index.vue';
import NewsShow from './pages/News/Show/Index.vue';
import Career from './pages/Career/Index.vue';
import ContactUs from './pages/Contact/Index.vue';

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about-us',
        name: 'AboutUs',
        component: AboutUs
    },
    {
        path: '/product-service',
        name: 'Product Service',
        component: ProductService
    },
    {
        path: '/news',
        name: 'News',
        component: News
    },
    {
        path: '/news/:slug',
        name: 'News Show',
        component: NewsShow
    },
    {
        path: '/career',
        name: 'Career',
        component: Career
    },
    {
        path: '/contact-us',
        name: 'Contact Us',
        component: ContactUs
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound
    },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
