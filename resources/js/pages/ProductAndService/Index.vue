import axios from 'axios';
<template class="bg-p-white">
    <section class="hero" style="margin-top: 15px !important;">
        <div class="image-hero position-relative">
            <div
                class="position-absolute text-white quote-text"
                v-html="$root.setting['quote_product_service']"
            >
            </div>
            <img :src="`/${$root.setting['image_header_product_service']}`" style="width: 100%;"/>
        </div>
    </section>
    <section class="container">
        <div class="font-size-45 font-weight-700 py-4">
            Product & Services
        </div>
        <div class="vstack justify-content-center gap-5 py-5">
            <div v-if="loaderProduct" class="row align-items-center">
                <div class="col-md-5 pb-4 pb-md-0">
                    <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 90px; width: 80%;"></div>
                </div>
                <div class="col-md-7">
                    <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 20px; width: 100%;"></div>
                    <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 20px; width: 95%;"></div>
                    <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 20px; width: 90%;"></div>
                    <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 20px; width: 89%;"></div>
                    <div class="skeleton-box bg-p-grey-16 radius-12" style="height: 20px; width: 85%;"></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-7 ms-auto">
                            <div class=" py-4 text-center">
                                <div class="skeleton-box bg-p-grey-16 radius-12"
                                     style="height: 20px; width: 30%;"></div>
                            </div>
                            <div class="row justify-content-start align-items-center">
                                <div class="col-4">
                                    <div class="skeleton-box bg-p-grey-16 radius-12"
                                         style="height: 240px; width: 100%;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="skeleton-box bg-p-grey-16 radius-12"
                                         style="height: 240px; width: 100%;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="skeleton-box bg-p-grey-16 radius-12"
                                         style="height: 240px; width: 100%;">
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 text-center">
                                <div class="skeleton-box bg-p-grey-16 radius-12"
                                     style="height: 50px; width: 20%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else v-for="(item, index) in dataProduct" class="row align-items-center" :key="index">
                <div class="col-md-5 pb-4 pb-md-0">
                    <img :src="`/${item.image}`" class="img-fluid"/>
                </div>
                <div class="col-md-7">
                    <div v-html="item.description" class="font-size-18 font-weight-400" style="text-align: justify">
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-7 ms-md-auto">
                            <div class="font-size-18 font-weight-700 py-4 text-center">
                                Product in catalogue
                            </div>
                            <template v-if="item.detail_product.length > 0">
                                <div class="row justify-content-center align-items-center g-4">
                                    <div v-for="(detail, indexDetail) in item.detail_product" class="col-lg-4 col-sm-6"
                                         :key="indexDetail">
                                        <div class="card border-2 border-black radius-2 hover-shadow-lg"
                                             style="min-height: 265px;">
                                            <div class="card-body text-center p-4 vstack justify-content-between">
                                                <div>
                                                    <img :src="`/${detail.image}`" class="img-fluid" alt=""
                                                         style="height: 160px;"/>
                                                </div>
                                                <div class="font-size-14 font-weight-700 text-center">
                                                    {{ detail.name }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 text-center">
                                    <a :href="item.link" target="_blank"
                                       class="btn btn-p-orange-11 px-4 py-3 hover-shadow-lg">
                                        <div class="font-size-14 font-weight-700 text-center">
                                            More Product
                                        </div>
                                    </a>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {
            dataProduct: [{
                detail_product: [],
            }],
            loaderProduct: false,
        };
    },
    mounted() {
        this.scrollToTop();
        this.getDataProduct();
    },
    methods: {
        async getDataProduct() {
            this.loaderProduct = true;
            try {
                const {data} = await axios.get('/api/product-service');
                this.dataProduct = data?.data;
            } catch (error) {
                console.log(error);
            }
            this.loaderProduct = false;
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
