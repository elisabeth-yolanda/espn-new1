<template>
  <section class="hero">
    <div
      :style="`
        background: url('/${$root.setting['image_header_about_us']}');
        background-size: cover;
        height: 50vh;
        background-repeat: no-repeat;
      `"
      class="d-flex align-items-center position-relative hero-background-sejarah"
    >
      <div :class="`arrow-button left ${scrollLeftDisabled ? 'disabled' : ''}`" @click="scrollLeft">
        <div>
          <i class="fas fa-angle-left"></i>
        </div>
      </div>
      <div class="overflow-auto ms-4 scrollbar-none">
        <div
          class="achievement d-flex align-items-start gap-5 ps-4 pe-5 pt-md-5"
          :style="`transform: translateX(-${scrollOffset}px); transition: transform 1s ease;`"
        >
          <div
            class="position-relative"
            v-for="(item, index) in achievements"
            :key="index"
          >
            <div class="item-achievement d-inline-block text-center">
              <div class="text-p-white font-size-20 font-weight-700">
                {{ item.year }}
              </div>
              <div class="text-p-white font-size-12 font-weight-400">
                {{ item.description }}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div :class="`arrow-button right ${scrollRightDisabled ? 'disabled' : ''}`" @click="scrollRight">
        <div>
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>
  </section>
  <div class="container pt-4">
    <div class="font-size-45 font-weight-700">
      About Us
    </div>
    <section class="vstack gap-md-5 gap-4 pt-5">
      <div class="row align-items-center gap-md-0 gap-3">
        <div class="col-md-4">
          <img
            src="/assets/images/espn.png"
            class="img-fluid"
            alt=""
            style="width: 320px;"
          />
        </div>
        <div class="col-md-8">
          <div class="font-size-16 font-weight-400" style="text-align:justify; direction:ltr;">
            Today, to emphasize its existence as a trading company in the market and within the Salim Group, PT Elevenia Sinergi Prima Nusantara (ESPN) manages the elevenia.biz and e-Nusantara businesses. It was moving away from its predecessor company and present to actively develop potential Indonesian commodities and embrace every business opportunity from any parties with similar objectives to collaborate in expanding access to the local and global market. At the same time, ESPN also maintained its role in providing solution-based services to support the corporation’s business performance, that’s satisfying and beneficial for the stakeholders
          </div>
        </div>
      </div>

      <div class="row align-items-center gap-md-0 gap-3">
        <div class="col-md-4">
          <img
            src="/assets/images/elevenia-biz-yellow.png"
            class="img-fluid"
            alt=""
            style="width: 380px;"
          />
        </div>
        <div class="col-md-8">
          <div class="font-size-16 font-weight-400" style="text-align:justify;, direction=ltr;">
            After being acquired by Salim Group in 2017, PT XL Planet, which was
            previously known as “elevenia”, a customer-to-customer (C2C) player
            in the e-commerce industry, has made a revolutionary switch in its
            business strategy by establishing a business-to-business (B2B)
            services with the new brand of “elevenia.biz”. The initial idea to
            build that new business stream was to provide corporations within
            the group with a solution-based procurement process. However, in
            responding to the demand in the market, elevenia.biz rapidly also
            serves other corporations outside the group as its distinguished
            clients
          </div>
        </div>
      </div>

      <div class="row align-items-center gap-md-0 gap-3">
        <div class="col-md-4">
          <img
            src="/assets/images/bg-enusantara.png"
            class="img-fluid"
            alt=""
            style="width: 400px;"
          />
        </div>
        <div class="col-md-8">
          <div class="font-size-16 font-weight-400" style="text-align:justify;, direction=ltr;">
            Later in the interactions with various clients, business partners,
            and related government institutions, the Business Development team
            identified another business opportunity that was feasible and
            considerable to become a new business stream for the company, which
            is the trade of local Indonesian commodities, such as spices (e.g.
            example nutmeg and black pepper) and any other agricultural products
            (e.g. coffee bean and organic rice). Thus, the company decides to
            establish an inclusive trading ecosystem for Indonesian commodities
            in the local and global markets to grow and strengthen the nation’s
            economy under the brand of “e-Nusantara”. In this ecosystem,
            the missions began with empowering the farmers to harvest the most
            suitable products referring to market requirements and then involved
            in sealing the commercial deal up until delivering the products to
            the customers properly, either local or global.
          </div>
        </div>
      </div>
    </section>

    <section class="mt-5 mb-4">
      <div class="font-size-24 font-weight-700 py-5 text-center">
        Our VMV
      </div>
      <Motto />
    </section>

    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="font-size-24 font-weight-700 py-5 mt-5 text-center">
              Our Team
            </div>
            <div
              v-if="loaderOurTeam"
              class="d-flex gap-md-0 gap-5 justify-content-center"
            >
              <div
                v-for="n in 4"
                class="teams-card d-flex gap-4 align-items-center justify-content-center"
                style="width: 100%; text-align: center; position: relative;"
              >
                <div class="">
                  <div
                    class="skeleton-box bg-p-grey-16 radius-12"
                    style="height: 190px; width: 160px;"
                  ></div>
                </div>
              </div>
            </div>
            <div
              v-else-if="teams.length > 0"
              v-for="(team, indexTeam) in groupedTeams"
              :key="indexTeam"
              class="d-flex gap-md-0 gap-5 justify-content-center"
            >
              <template v-for="(item, index) in team" :key="index">
                <div
                  class="teams-card d-flex gap-4 align-items-center justify-content-center"
                  style="width: 100%; text-align: center; position: relative;"
                >
                  <div class="teams-card-img">
                    <img :src="`/${item.image}`" class="img" />
                  </div>
                  <div
                    class="card border-0 bg-p-grey-43 card-hovered"
                    style="max-height: 150px; width: 253px;"
                  >
                    <div class="card-body p-3">
                      <div class="font-size-14 font-weight-500">
                        {{ item.name }}
                      </div>
                      <div
                        class="font-size-14 text-p-orange-14 font-weight-500"
                      >
                        {{ item.position }}
                      </div>
                      <div
                        class="font-size-14 font-weight-400 mt-3 text-p-orange-14"
                      >
                        “ {{ item.quote }} “
                      </div>
                    </div>
                  </div>
                </div>
              </template>
            </div>
            <div
              v-if="teams.length < 1"
              class="d-flex align-items-center justify-content-center"
            >
              <div class="text-center">
                <img
                  src="/assets/images/empty-data.svg"
                  style="height: 250px;"
                />
                <div class="font-weight-500 font-size-20">
                  No found our team
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section style="margin-top: 5rem !important;">
      <div class="container">
        <div class="text-center font-weight-700 font-size-24">
          Our Valuable Partners
        </div>
        <div
          class="row justify-content-center align-items-center mt-md-4 mt-3 mb-5 px-xl-5 g-md-5"
        >
          <div
            v-if="loaderPartner"
            class="row align-items-center justify-content-center"
          >
            <div class="col-2 g-4" v-for="n in 12">
              <div class="px-4">
                <div
                  class="skeleton-box bg-p-grey-16 radius-12"
                  style="height: 100px; width: 180px;"
                ></div>
              </div>
            </div>
          </div>
          <Slider v-else="partners.length > 0" :items="partners" />
        </div>
      </div>
    </section>
  </div>
    <section class="hero">
        <div
            :style="`
        background: url('/${$root.setting['image_header_about_us']}');
        background-size: cover;
        height: 20vh;
        background-repeat: no-repeat;
        margin-bottom:-2%;
      `"
            class="d-flex align-items-center position-relative hero-background-sejarah"
        >
            <div :class="`arrow-button left ${scrollLeftDisabled ? 'disabled' : ''}`" @click="scrollLeft">
                <div>
                    <i class="fas fa-angle-left"></i>
                </div>
            </div>
            <div class="overflow-auto ms-4 scrollbar-none">
                <div
                    class="achievement d-flex align-items-start gap-5 ps-4 pe-5 pt-md-5"
                    :style="`transform: translateX(-${scrollOffset}px); transition: transform 1s ease;`"
                >
                    <div
                        class="position-relative"
                        v-for="(item, index) in achievements"
                        :key="index"
                    >
                        <div class="item-achievement d-inline-block text-center">
                            <div class="text-p-white font-size-20 font-weight-700">
                                {{ item.year }}
                            </div>
                            <div class="text-p-white font-size-12 font-weight-400">
                                {{ item.description }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div :class="`arrow-button right ${scrollRightDisabled ? 'disabled' : ''}`" @click="scrollRight">
                <div>
                    <i class="fas fa-angle-right"></i>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import Slider from "@/components/Slider.vue";
import Motto from "@/components/Motto.vue";
export default {
  components: {
    Slider,
    Motto,
  },
  name: "Home",
  data() {
    return {
      partners: [],
      teams: [],
      achievements: [],
      loaderPartner: false,
      groupedTeams: [],
      loaderOurTeam: false,
      scrollOffset: 0,
      scrollStep: 200,
      scrollLeftDisabled: false,
      scrollRightDisabled: false
    };
  },
  mounted() {
      this.scrollToTop();
    this.getPartner();
    this.getSejarah();
    this.getOurTeam();
  },
  computed: {
    containerElement() {
      return document.querySelector(".overflow-auto");
    },
    contentElement() {
      return document.querySelector(".achievement");
    },
    maxScrollOffset() {
      return (
        this.contentElement.scrollWidth - this.containerElement.clientWidth
      );
    },
  },
  methods: {
    async getPartner() {
      this.loaderPartner = true;
      try {
        const res = await axios.get("/api/clientPartner/partner");
        this.partners = res.data.data;
      } catch (err) {
        console.log(err);
      }
      this.loaderPartner = false;
    },
    async getSejarah() {
      this.loadingSejarah = true;
      const res = await axios.get(
        "/api/sejarah/getAll?orderBy=year|asc"
      );
      this.achievements = res.data.data;
      this.loadingSejarah = false;
    },
    async getOurTeam() {
      this.loaderOurTeam = true;
      try {
        const res = await axios.get("/api/ourTeam/getAll");
        this.teams = res.data.data;
        this.groupedTeams = this.groupTeams(this.teams);
      } catch (err) {
        console.log(err);
      }
      this.loaderOurTeam = false;
    },
    groupTeams(teams) {
      const grouped = [];
      let startIndex = 0;

      // Mengelompokkan grup pertama dengan tiga index pertama
      grouped.push(teams.slice(startIndex, startIndex + 3));
      startIndex += 3;

      // Mengelompokkan grup kedua dan seterusnya dengan empat index
      while (startIndex < teams.length) {
        grouped.push(teams.slice(startIndex, startIndex + 4));
        startIndex += 4;
      }

      return grouped;
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
