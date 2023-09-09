<template class="bg-p-white">
    <section class="hero" style="margin-top: 25px !important;">
        <div class="image-hero position-relative">
            <div
                class="position-absolute text-white quote-text"
                v-html="$root.setting['quote_news']"
            >
            </div>
            <img :src="`/${$root.setting['image_header_news']}`" style="width: 100%;" />
        </div>
    </section>
    <section class="px-lg-5 px-3">
        <div class="font-size-48 font-weight-700 pt-5">
            News & Update
        </div>
        <section class="my-5">
            <div class="container">
                <div class="row justify-content-center align-items-center py-5 px-xl-5 g-md-5 gy-4">
                    <NewsComponent />
                </div>
                <div class="pt-5 row justify-content-start align-items-center py-4 px-l-5 g-md-6 gy-2">
                    <div v-if="loadingNews" class="col-lg-4 col-md-6" v-for="n in 3">
                        <div
                            class="card border-0 radius-10 text-decoration-none hover-shadow-lg">
                            <div>
                                <div class="skeleton-box rounded bg-p-grey-16" style="height: 230px; width: 100%;"></div>
                            </div>
                            <div class="card-body p-4">
                                <div class="font-weight-400 font-size-28">
                                    <div class="skeleton-box rounded bg-p-grey-16" style="height: 30px; width: 60%;"></div>
                                </div>
                                <div class="font-weight-400 font-size-14 mt-2">
                                    <div class="skeleton-box rounded bg-p-grey-16" style="height: 18px; width: 90%;"></div>
                                </div>
                                <div class="font-weight-400 font-size-16 text-p-blue-21 pt-2">
                                    <div class="skeleton-box rounded bg-p-grey-16" style="height: 18px; width: 40%;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else class="col-lg-4 col-md-6 mt-5" v-for="(item, index) in news" :key="index">
                        <router-link :to="`/news/${item.slug}`"
                            class="card border-0 radius-10 text-decoration-none hover-shadow-lg" style="height: 465px; width: 100%">
                            <div>
                                <img style="width: 100%; height: 200px; object-fit: cover; padding:1%" class="object-cover-center radius-10"
                                    :src="item.thumbnail" />
                            </div>
                            <div class="card-body p-4">
                                <div class="font-weight-400 font-size-28">
                                    {{ item.title }}
                                </div>
                                <div class="font-weight-400 font-size-14 mt-2">
                                    {{ item.content }}
                                </div>
                                <div class="font-weight-400 font-size-16 text-p-blue-21 pt-2">
                                    {{ item.created_at }}
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
import NewsComponent from "../../components/News/NewsComponent.vue";
import BusinessComponent from "../../components/Business/BusinessComponent.vue";
import axios from "axios";
import { parseHtml } from '@/Helper/Helpers';
import moment from 'moment';

export default {
    name: "Index",
    components: {
        NewsComponent,
        BusinessComponent,
    },
    data() {
        return {
            news: [],
            loadingNews: false,
        };
    },
    mounted() {
        this.scrollToTop();
        this.getData();
    },
    methods: {
        async getData() {
            this.loadingNews = true;
            try {
                const res = await axios.get('/api/news/getAll?');
                res.data.data.forEach((item) => {
                    item.content = parseHtml(item.content).length > 100 ? parseHtml(item.content).substring(0, 100) + '...' : parseHtml(item.content);
                    item.created_at = moment(item.created_at).format('YYYY, MMMM DD');
                });
                this.news = res.data.data;
            } catch (error) {
                console.log(error);
            }
            this.loadingNews = false;
        },
        scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }
    },
};
</script>
