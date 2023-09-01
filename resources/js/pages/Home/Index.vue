<template>
    <section class="hero">
        <div class="image-hero position-relative">
            <div
                v-html="$root.setting['quote_home']"
                class="position-absolute text-white quote-text"
            ></div>
            <div class="position-absolute text-white logo-container">
                <div class="d-flex align-items-center gap-md-3 gap-1">
                    <a href="https://elevenia.biz" target="_blank">
                        <img class="img-elevenia" src="/assets/images/elevenia-white-yellow.png" />
                    </a>
                    <a class="pt-3" href="https://nusantara.elevenia.co.id" target="_blank">
                        <img class="img-nusantara" src="/assets/images/enusantara.png" />
                    </a>
                </div>
            </div>
            <img :src="`/${$root.setting['image_header_home']}`" style="width: 100%;" />
        </div>
    </section>
    <section class="my-5 news-section">
        <div class="container">
            <div class="text-center font-weight-700 font-size-21">
                NEWS & UPDATE
            </div>
            <div class="row justify-content-center align-items-center py-5 px-xl-5 g-md-5 gy-4">
                <NewsComponent />
            </div>
            <div class="text-center pb-5">
                <router-link class="text-primary font-weight-600 text-decoration-none font-size-18" role="button"
                             to="/news">
                    See More
                </router-link>
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="text-center font-weight-700 font-size-21">
                Way We Do Business
            </div>
            <div class="row justify-content-center align-items-center py-5 px-xl-5 g-md-5 gy-4">
                <div v-if="loaderBusiness" class="col-4" v-for="n in 3">
                    <div class="px-4">
                        <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 350px; width: 340px;"></div>
                    </div>
                </div>
                <BusinessComponent v-else :data="wayWeDoBusiness" />
            </div>
        </div>
    </section>
    <section class="mt-5">
        <div class="container">
            <div class="text-center font-weight-700 font-size-24">
                Our Distinguished Clients
            </div>
            <div class="d-flex justify-content-center align-items-center pt-4 pb-5 px-xl-5 g-md-5">
                <div v-if="loaderClients" class="row align-items-center justify-content-center">
                    <div class="col-2 g-4" v-for="n in 12">
                        <div class="px-4">
                            <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 100px; width: 180px;"></div>
                        </div>
                    </div>
                </div>
                <Slider v-else :items="clients" />
            </div>
        </div>
    </section>
</template>

<script>
import NewsComponent from '../../components/News/NewsComponent.vue';
import BusinessComponent from '../../components/Business/BusinessComponent.vue';
import Slider from "@/components/Slider.vue";

export default {
    name: "Home",
    components: {
        Slider,
        NewsComponent,
        BusinessComponent
    },
    data() {
        return {
            wayWeDoBusiness: [],
            clients: [],
            loaderClients: false,
            loaderBusiness: false,
            achievements: []
        }
    },
    mounted() {
        this.getClients();
        this.getBusiness();
    },
    methods: {
        async getClients() {
            this.loaderClients = true;
            try {
                const res = await axios.get('/api/clientPartner/client');
                this.clients = res.data.data;
            }catch(err) {
                console.log(err);
            }
            this.loaderClients = false;
        },
        async getBusiness() {
            this.loaderBusiness = true;
            try {
                const res = await axios.get('/api/way-we-do-business/getAll');
                this.wayWeDoBusiness = res.data.data;
            }catch(err) {
                console.log(err);
            }
            this.loaderBusiness = false;
        },
        scrollLeft() {
            this.scrollOffset -= this.scrollStep;
            if (this.scrollOffset < 0) {
                this.scrollOffset = 0;
            }
            this.scrollToOffset();
        },
        scrollRight() {
            this.scrollOffset += this.scrollStep;
            if (this.scrollOffset > this.maxScrollOffset) {
                this.scrollOffset = this.maxScrollOffset;
            }
            this.scrollToOffset();
        },
        scrollToOffset() {
            this.containerElement.scrollLeft = this.scrollOffset;
        }
    }
};
</script>
