<template>
    <section class="container">
        <section class="container hero hero-news-detail">
            <div class="image-hero position-relative">
                <img src="/assets/images/bg-news-detail.png" style="width: 100%;" />
                <div>
                    <div class="position-absolute text-black font-size-xl-28 font-size-lg-20 font-size-md-18 font-size-sm-14 font-size-10"
                        style="top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <div class="skeleton-box radius-8 bg-p-grey-16" v-if="loaderDetail" style="height: 20px; width: 100%;"></div>
                        <b v-else>{{ detail.title }}</b>
                    </div>
                </div>
            </div>
        </section>
        <section class="container mb-5">
            <div class="row py-5">
                <div class="col-md-8">
                    <figure>
                        <div class="skeleton-box radius-10 bg-p-grey-16" v-if="loaderDetail" style="height: 300px; width: 100%;"></div>
                        <img :src="`/${detail.thumbnail}`" v-else style="width: 100%;" class="img-fluid" />
                    </figure>
                    <article class="mt-4">
                        <div class="vstack gap-2" v-if="loaderDetail">
                            <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 15px; width: 50%;"></div>
                            <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 15px; width: 80%;"></div>
                            <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 15px; width: 90%;"></div>
                        </div>
                        <div v-html="detail.content" v-else style="text-align:justify"></div>
                    </article>
                </div>
                <div class="col-md-4 pt-md-0 pt-4 mt-md-0 mt-5 ps-xl-5">
                    <div style="
                            background-image: url('/assets/images/news-sidebar.svg');
                            background-repeat: no-repeat;
                            background-size: cover;
                            background-position: center;
                            min-height: 600px;
                        ">
                        <div class="px-4 pt-2" style="height: 100%; width:100%">
                            <div class="fs-3 fw-bold text-white">
                                Recent News
                            </div>
                        </div>

                        <div v-if="loadingRecentNews" class="vstack gap-4 mt-md-5 mt-3 px-lg-5 px-4 pb-5 pt-lg-3 pt-4">
                            <div v-for="n in 3">
                                <div class="font-weight-400 font-size-28">
                                    <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 40px; width: 80%;"></div>
                                </div>
                                <div class="font-weight-400 font-size-14 mt-1">
                                    <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 15px; width: 100%;"></div>
                                </div>
                                <div class="font-weight-400 font-size-16 text-p-blue-21 pt-2">
                                    <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 15px; width: 50%;"></div>
                                </div>
                            </div>
                        </div>
                        <div v-else class="vstack gap-4 mt-3 px-lg-5 px-4 pb-5 pt-5">
                            <a :href="`/news/${item.slug}`"
                               class="text-decoration-none text-p-black"
                               v-for="(item, index) in recentNews"
                               :key="index"
                            >
                                <div class="font-weight-400 font-size-28">
                                    {{ item.title }}
                                </div>
                                <div class="font-weight-400 font-size-14 mt-1">
                                   {{ item.content  }}
                                </div>
                                <div class="font-weight-400 font-size-16 text-p-blue-21 pt-2">
                                    {{ item.created_at }}
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
import axios from "axios";
import { parseHtml, formatDate } from '@/Helper/Helpers';
import moment from 'moment';
import router from "../../../router";
export default {
    name: "Index",
    data() {
        return {
            detail: {},
            loaderDetail: false,
            recentNews: [],
            loadingRecentNews: false,
        };
    },
    methods: {
        async getDetail() {
            this.loaderDetail = true;
            try {
                const {slug} = this.$route.params;
                const response = await axios.get(`/api/news/getDetail/${slug}`);
                this.detail = response.data;
            } catch (error) {
                console.log(error);
            }
            this.loaderDetail = false;
        },
        async getRecentNews() {
            this.loadingRecentNews = true;
            try {
                const res = await axios.get('/api/news/getAll?limit=3&sort=desc');
                res.data.data.forEach((item) => {
                    item.content = parseHtml(item.content).length > 100 ? parseHtml(item.content).substring(0, 100) + '...' : parseHtml(item.content);
                    item.created_at = moment(item.created_at).format('YYYY, MMMM DD');
                });
                this.recentNews = res.data.data;
            } catch (error) {
                console.log(error);
            }
            this.loadingRecentNews = false;
        }
    },
    mounted() {
        this.getDetail();
        this.getRecentNews();
        // this.reloadAndScrollTop();
    },
}
</script>
