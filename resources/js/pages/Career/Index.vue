<template>
    <section class="hero">
        <div class="image-hero position-relative">
            <img :src="`/${$root.setting['image_header_career']}`" style="width: 100%;" />
            <div>
                <div class="position-absolute text-white font-weight-500 font-size-xl-30 font-size-md-28 font-size-md-18 font-size-sm-18 font-size-10"
                    v-html="$root.setting['quote_career']"
                    style="
                        top: 50%;
                        left: 5%;
                        text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                    ">
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container pt-5">
            <div class="font-size-21 font-weight-400" style="text-align: justify">
                We are open to fresh graduates who want to start developing careers and
                professionals with proven experiences in the related business who wish
                to increase their values and competencies in the trading industry. So
                why do you have to wait? Send your resume to join us!
            </div>
            <div class="vstack gap-4 mt-5 mb-4">
                <b-card v-for="(item, index) in career" no-body class="border-0 bg-transparent">
                    <div class="card-body bg-p-grey-43 p-4 radius-8 accordion-career" block v-b-toggle.accordion-2>
                        <div class="d-flex justify-content-between">
                            <div class="font-size-20 font-weight-400">
                                {{ item.title }}
                            </div>
                            <div class="toggle-accordion">
                                <img src="/assets/images/arrow-left-circle.svg" />
                            </div>
                        </div>
                    </div>
                    <b-collapse id="accordion-2" accordion="my-accordion" role="tabpanel">
                        <b-card-body class="bg-p-orange-12 radius-8 mt-2">
                            <img :src="item.thumbnail" class="img-fluid" style="width: 100%;" />
                        </b-card-body>
                        <div class="text-center pt-4">
                            Send your Application & CV directly to
                            <a
                                :href="`mailto:recruitment@elevenia.co.id?subject=${encodeURIComponent(item.title)}`">recruitment@elevenia.co.id</a>
                            with email subject : <br /> {{ item.title }}
                        </div>
                    </b-collapse>
                </b-card>
            </div>
        </div>
    </section>
</template>

<script>
import $ from "jquery";
import axios from 'axios';
export default {
    name: "CareerIndex",
    data() {
        return {
            isCollapsed: false,
            career: [],
        };
    },
    mounted() {
        this.scrollToTop();
        this.getCareer();
    },
    methods: {
        async getCareer() {
            try {
                const response = await axios.get('/api/career/getAll');
                this.career = response.data.data;
            } catch (error) {
                console.log(error);
            }
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
