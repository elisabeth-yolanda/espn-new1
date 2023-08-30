<template>
    <header class="header fixed-top">
        <div class="container-lg container-fluid d-none d-md-block py-2">
            <div class="top-navbar gap-4">
                <router-link to="/" class="item-topbar">
                    <img src="/assets/images/logo-espn.png" alt="logo" style="height: 40px; object-fit: cover;" />
                </router-link>
                <div role="button" @click="backPreviouse()" v-if="isPath('/')" class="text-end w-100 font-size-12 font-weight-400">
                    <span>Back To Previous</span>
                </div>
            </div>
        </div>
        <b-navbar class="navbar-top navbar-expand-lg bg-body-tertiary" toggleable="md" type="light" variant="light">
            <div class="container-md">
                <b-navbar-brand class="d-md-none focus-border-0">
                    <img src="/assets/images/logo-espn.png" alt="logo" style="height: 35px;" />
                </b-navbar-brand>
                <div v-if="isCollapse" role="button" class="btn border-0 d-md-none" @click="toggleCollapse(false)">
                    <i class="fas fa-times font-size-30"></i>
                </div>
                <div v-else role="button" class="btn border-0 d-md-none" @click="toggleCollapse(true)">
                    <i class="fas fa-bars font-size-30"></i>
                </div>
                <b-collapse id="navBarCollapse" is-nav>
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li v-for="item in navbar" class="nav-item">
                            <router-link :class="`nav-link ${item.link == currentUrl ? 'active' : ''}`" :to="item.link">
                                {{ item.name }}
                            </router-link>
                            <div v-if="item.subMenu" class="position-absolute bg-white shadow-md radius-7 overflow-hidden nav-submenu" style="min-width: 60px;">
                                <ul class="submenu-nav">
                                    <li v-for="subItem in item.subMenu" class="item-menu">
                                        <a :href="subItem.link" target="_blank">
                                            <img :src="subItem.image" alt="logo" :style="`width: ${subItem.width}; height: ${subItem.height};`" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item d-md-none pt-0">
                            <div class="nav-link px-3 pb-3 pt-0">
                                <table class="navbar-contact font-weight-400 font-size-12">
                                    <tr>
                                        <td>
                                            <img src="/assets/images/icons/location.svg" />
                                        </td>
                                        <td>
                                            Wisma 46-Kota BNI, Lantai 39, Jl. Jendral Sudirman Kav. 1
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="me-2" src="/assets/images/icons/call.svg" />
                                        </td>
                                        <td>
                                            02139371122
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img class="me-2" src="/assets/images/icons/mail.svg" />
                                        </td>
                                        <td>
                                            enusantara@elevenia.co.id
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </li>
                    </ul>
                </b-collapse>
            </div>
        </b-navbar>
    </header>
</template>

<script>
import $ from 'jquery';
export default {
    name: 'Navbar',
    data() {
        return {
            isCollapse: false,
            currentUrl: window.location.pathname,
            navbar: [
                {
                    name: 'Home',
                    link: '/'
                },
                {
                    name: 'About Us',
                    link: '/about-us'
                },
                {
                    name: 'Product & Services',
                    link: '/product-service',
                    subMenu: [
                        {
                            name: 'Enusa',
                            image: '/assets/images/elevenia-biz-yellow.png',
                            link: '/product',
                            height: '50px',
                            width: '120px'
                        },
                        {
                            name: 'Services',
                            image: '/assets/images/bg-enusantara.png',
                            link: '/service',
                            height: '25px',
                            width: '120px'
                        }
                    ]
                },
                {
                    name: 'News',
                    link: '/news'
                },
                {
                    name: 'Career',
                    link: '/career'
                },
                {
                    name: 'Contact Us',
                    link: '/contact-us'
                }
            ],
            linkBack: '',
        }
    },
    methods: {
        toggleCollapse(status) {
            this.isCollapse = status;
            const navBarCollapse = $('#navBarCollapse');
            if (status)
                navBarCollapse.show('slow');
            else
                navBarCollapse.hide('slow');
        },
        backPreviouse() {
            this.$router.back()
        },
        isPath(path) {
            return this.$route.path != path;
        },

    }
}
</script>
