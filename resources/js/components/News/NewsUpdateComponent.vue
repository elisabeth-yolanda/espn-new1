<template>
  <div class="col-lg-4 col-md-6">
    <router-link to="/" class="card border-0 radius-10 text-decoration-none hover-shadow-lg">
      <div>
        <img
          style="width: 100%; height: 230px;"
          class="object-cover-center radius-10"
          src="/assets/images/news-1.jpg"
        />
      </div>
      <div class="card-body p-4" style="height: 100px;">
        <div class="font-weight-700 font-size-20">
          Title
        </div>
        <div class="font-weight-400 font-size-14 mt-2">
          Lorem Ipsum Biofiering semivalens. Postgram abfili. Hypergyn prekemi.
          Tebel.
        </div>
        <router-link
          to="/"
          class="btn btn-outline-p-orange-9 text-p-grey-17 font-weight-500 py-2 hover-text-p-grey-17 w-100 mt-5"
        >
          Read More
        </router-link>
      </div>
    </router-link>
  </div>
  <div class="col-lg-4 col-md-6">
    <router-link to="/" class="card border-0 radius-10 text-decoration-none hover-shadow-lg">
      <div>
        <img
          style="width: 100%; height: 230px;"
          class="object-cover-center radius-10"
          src="/assets/images/news-1.jpg"
        />
      </div>
      <div class="card-body p-4" style="height: 100px;">
        <div class="font-weight-700 font-size-20">
          Title
        </div>
        <div class="font-weight-400 font-size-14 mt-2">
          Lorem Ipsum Biofiering semivalens. Postgram abfili. Hypergyn prekemi.
          Tebel.
        </div>
        <router-link
          to="/"
          class="btn btn-outline-p-orange-9 text-p-grey-17 font-weight-500 py-2 hover-text-p-grey-17 w-100 mt-5"
        >
          Read More
        </router-link>
      </div>
    </router-link>
  </div>
  <div class="col-lg-4 col-md-6">
    <router-link to="/" class="card border-0 radius-10 text-decoration-none hover-shadow-lg">
      <div>
        <img
          style="width: 100%; height: 230px;"
          class="object-cover-center radius-10"
          src="/assets/images/news-1.jpg"
        />
      </div>
      <div class="card-body p-4" style="height: 100px;">
        <div class="font-weight-700 font-size-20">
          Title
        </div>
        <div class="font-weight-400 font-size-14 mt-2">
          Lorem Ipsum Biofiering semivalens. Postgram abfili. Hypergyn prekemi.
          Tebel.
        </div>
        <router-link
          to="/"
          class="btn btn-outline-p-orange-9 text-p-grey-17 font-weight-500 py-2 hover-text-p-grey-17 w-100 mt-5"
        >
          Read More
        </router-link>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  name: "NewsUpdateComponent",
  props: ["news"],
};
</script>
