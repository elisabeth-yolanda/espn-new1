<template>
    <component :is="this.$route.meta.layout || 'div'">
        <Navbar/>
        <router-view/>
        <Footer :setting="setting"/>
        <section>
            <button class="btn btn-p-orange-10 back-to-top" @click="scrollToTop" v-show="showButton">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-arrow-up-filled"
                     width="24"
                     height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path
                        d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-4.98 3.66l-.163 .01l-.086 .016l-.142 .045l-.113 .054l-.07 .043l-.095 .071l-.058 .054l-4 4l-.083 .094a1 1 0 0 0 1.497 1.32l2.293 -2.293v5.586l.007 .117a1 1 0 0 0 1.993 -.117v-5.585l2.293 2.292l.094 .083a1 1 0 0 0 1.32 -1.497l-4 -4l-.082 -.073l-.089 -.064l-.113 -.062l-.081 -.034l-.113 -.034l-.112 -.02l-.098 -.006z"
                        stroke-width="0" fill="currentColor"></path>
                </svg>
            </button>
        </section>
    </component>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'

export default {
    name: "App",
    components: {
        Navbar,
        Footer,
    },
    data() {
        return {
            showButton: false,
            setting: [],
        };
    },
    mounted() {
        this.getSetting();
        window.addEventListener("scroll", this.handleScroll);
    },
    beforeDestroy() {
        window.removeEventListener("scroll", this.handleScroll);
    },
    methods: {
        async getSetting() {
            try {
                const {data} = await axios.get('/api/setting');
                this.setting = data?.data;
            } catch (error) {
                console.log(error);
            }
        },
        handleScroll() {
            this.showButton = window.pageYOffset > 0;
        },
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    }
};
</script>

<style>
.back-to-top {
    position: fixed;
    bottom: 20px;
    right: 20px;
}</style>
