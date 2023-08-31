<template>
    <div v-if="loadingNews" v-for="n in 3" class="col-lg-4 col-md-6">
        <router-link to="/" class="card border-0 radius-10 text-decoration-none hover-shadow-lg">
            <div>
                <div class="skeleton-box radius-10 bg-p-grey-16" style="height: 400px; width: 100%;"></div>
            </div>
            <div class="card-body p-4" style="height: 100px;">
                <div class="font-weight-700 font-size-20">
                    <div class="skeleton-box rounded bg-p-grey-16" style="height: 25px; width: 50%;"></div>
                </div>
                <div class="font-weight-400 font-size-14 mt-2">
                    <div class="skeleton-box rounded bg-p-grey-16" style="height: 18px; width: 100%;"></div>
                </div>
                <div class="skeleton-box rounded bg-p-grey-16 mt-4" style="height: 45px; width: 100%;"></div>
            </div>
        </router-link>
    </div>
    <div v-else v-for="(item, index) in news" class="col-lg-4 col-md-6">
        <router-link :to="`/news/${item.slug}`" class="card border-0 radius-10 text-decoration-none hover-shadow-lg">
            <div>
                <img style="width: 100%; height: 300px; padding: 1%" class="object-cover-center radius-10" :src="item.thumbnail" />
            </div>
            <div class="card-body p-4" style="height: 100%;">
                <div class="font-weight-700 font-size-20" style="height: 100px;">
                    {{ item.title }}
                </div>
                <div class="font-weight-400 font-size-14 mt-2">
                    {{ item.content }}
                </div>
                <router-link :to=" `/news/${item.slug}`"
                    class="btn btn-outline-p-orange-9 text-p-grey-17 font-weight-500 py-2 hover-text-p-grey-17 w-100 mt-5">
                    Read More
                </router-link>
            </div>
        </router-link>
    </div>
    <div v-if="news.length < 1" class="d-flex align-items-center justify-content-center">
        <div class="text-center">
            <img src="/assets/images/empty-data.svg" style="height: 250px;" />
            <div class="font-weight-500 font-size-20">
               No found news
            </div>
        </div>
    </div>
</template>

<script>
import { parseHtml } from '@/Helper/Helpers';
import axios from "axios";
export default {
    name: "NewsComponent",
    data() {
        return {
            news: [],
            loadingNews: false,
        };
    },
    mounted() {
        this.getData();
    },
    methods: {
        async getData() {
            this.loadingNews = true;
            try {
                const res = await axios.get('/api/news/getAll?limit=3');
                res.data.data.forEach((item) => {
                    item.content = parseHtml(item.content).length > 100 ? parseHtml(item.content).substring(0, 100) + '...' : parseHtml(item.content);
                });
                this.news = res.data.data;
            } catch (error) {
                console.log(error);
            }
            this.loadingNews = false;
        },
    },
};
</script>
