<template>
    <div class="container px-4">
        <swiper v-if="data.length > 0" class="mySwiper" :modules="modules" :loop="true" :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
            }">
            <swiper-slide v-for="(itemClient, index) in dataClientPartner">
                <div class="row align-items-center justify-content-center" :key="index">
                    <div class="col-md-2 col-4 gy-4" v-for="(item, index) in itemClient" :key="item.id">
                        <div class="px-4">
                            <img :src="`/${item.image}`" alt="partner logo" class="img-fluid"
                                style="max-height: 150px; width: 190px;" />
                        </div>
                    </div>
                </div>
            </swiper-slide>
        </swiper>
        <div v-if="data.length < 1" class="d-flex align-items-center justify-content-center">
            <div class="text-center mt-5">
                <img src="/assets/images/empty-data.svg" style="height: 250px;" />
                <div class="font-weight-500 font-size-20">
                    No found client partner
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay } from "swiper";
// Import Swiper styles
import "swiper/css";
import "swiper/css/pagination";

export default {
    props: ["items"],
    components: {
        Swiper,
        SwiperSlide,
    },
    data() {
        return {
            widthSize: "",
            slidesPerView: 6,
            dataClientPartner: [],
            data: [],
        };
    },
    mounted() {
        this.data = this.items;
        this.filterData();
        this.updateWindowWidth();
        window.addEventListener("resize", this.updateWindowWidth);
    },
    beforeDestroy() {
        window.removeEventListener("resize", this.updateWindowWidth);
    },
    methods: {
        updateWindowWidth() {
        },
        filterData() {
            this.items.reduce((result, item, index) => {
                if (index % 12 === 0) {
                    this.dataClientPartner.push([]);
                }
                this.dataClientPartner[Math.floor(index / 12)].push(item);
                return result;
            }, []);
        }
    },
    setup() {
        return {
            modules: [Autoplay],
        };
    },
};
</script>

<!-- <style>
.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  display: flex;
  justify-content: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style> -->
