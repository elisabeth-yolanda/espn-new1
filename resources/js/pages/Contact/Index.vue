<template>
  <section class="hero">
    <div class="image-hero position-relative">
        <div
            class="position-absolute text-white quote-text"
            v-html="$root.setting['quote_contact_us']"
        >
        </div>
      <img :src="`/${$root.setting['image_header_contact_us']}`" style="width: 100%;" />
      <div>
      </div>
    </div>
  </section>
  <section>
    <div class="container-lg">
      <div class="font-size-48 font-weight-700 pt-5">
        Contact Us
      </div>
      <div
        class="card mt-4 border-0 radius-20"
        style="background: url(/assets/images/bg-contact-us.png); background-repeat: no-repeat;"
      >
        <div class="card-body pb-lg-20 p-3 p-md-5">
          <div class="row g-5">
            <div class="col-md-6">
              <div class="card bg-p-grey-43 border-0 radius-20">
                <div class="card-body">
                  <div
                    style="display: flex; flex-direction: column; gap: 1rem;"
                  >
                    <div class="font-size-18 font-weight-700">
                      Phone
                      <div class="font-size-15 font-weight-400">
                        {{ $root.setting['phone_contact_us'] }}
                      </div>
                    </div>
                    <div class="font-size-18 font-weight-700">
                      Email
                      <div class="font-size-15 font-weight-400">
                        {{ $root.setting['email_contact_us'] }}
                      </div>
                    </div>
                    <div class="font-size-18 font-weight-700">
                      Location
                      <div class="font-size-15 font-weight-400">
                        {{ $root.setting['location_contact_us'] }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pt-4">
                <iframe
                  :src="$root.setting['link_maps_contact_us']"
                  width="100%"
                  height="450"
                  style="border: 0; border-radius: 1rem;"
                  allowfullscreen=""
                  loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card bg-p-grey-43 border-0 radius-20">
                <div class="card-body p-md-5 p-3">
                  <form @submit.prevent="submitForm">
                    <div class="form-group mb-4">
                      <label>
                        <div class="font-size-18 font-weight-400 mb-2">
                          Name
                        </div>
                      </label>
                      <input
                        required
                        type="text"
                        class="form-control radius-20 bg-p-orange-13"
                        v-model="form.name"
                        style="min-height: 50px;"
                      />
                      <span v-if="validationErrors.name" v-for="(item,key) in validationErrors.name" :key="key" class="text-danger">{{ item }}</span>
                    </div>
                    <div class="form-group mb-4">
                      <label>
                        <div class="font-size-18 font-weight-400 mb-2">
                          Email
                        </div>
                      </label>
                      <input
                        required
                        type="email"
                        class="form-control radius-20 bg-p-orange-13"
                        v-model="form.email"
                        style="min-height: 50px;"

                      />
                      <span v-if="validationErrors.email" v-for="(item,key) in validationErrors.email" :key="key" class="text-danger">{{ item }}</span>
                    </div>

                    <div class="form-group mb-4">
                      <label>
                        <div class="font-size-18 font-weight-400 mb-2">
                          Subject
                        </div>
                      </label>
                      <input
                        required
                        type="text"
                        class="form-control radius-20 bg-p-orange-13"
                        v-model="form.subject"
                        style="min-height: 50px;"
                      />
                      <span v-if="validationErrors.subject" v-for="(item,key) in validationErrors.subject" :key="key" class="text-danger">{{ item }}</span>
                    </div>

                    <div class="form-group mb-4">
                      <label>
                        <div class="font-size-18 font-weight-400 mb-2">
                          Message
                        </div>
                      </label>
                      <textarea
                        rows="8"
                        class="form-control radius-20 bg-p-orange-13 p-4 border-0"
                        v-model="form.message"
                        required
                      ></textarea>
                      <span v-if="validationErrors.message" v-for="(item,key) in validationErrors.message" :key="key" class="text-danger">{{ item }}</span>
                    </div>

                    <div class="text-center">
                        <button :disabled="loaderSubmit ? true : false" class="font-size-14 font-weight-700 text-center btn btn-p-orange-11 py-3 mt-3 radius-20 w-50">
                          {{ loaderSubmit ? 'Loading...' : 'Send Message' }}
                        </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import Swal from 'sweetalert2';

export default {
  name: "ContactIndex",
  data() {
    return {
        form: {
            name: "",
            email: "",
            subject: "",
            message: "",
        },
        validationErrors: {},
        loaderSubmit: false,
    };
  },
  mounted() {
      this.scrollToTop();
  },
  methods: {
    async submitForm() {
        const emailRegex = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
        if(!emailRegex.test(this.form.email)) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Email is not valid!',
            });
            return;
        }
        this.loaderSubmit = true;
        try {
            const res = await axios.post('/api/contact-us', this.form);
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: res.data.message,
            });
            this.form = {
                name: "",
                email: "",
                subject: "",
                message: "",
            };
        }catch(e) {
            console.log(e.response);
            if(e.response.status === 400)
                this.validationErrors = e.response.data.message;
        }
        this.loaderSubmit = false;
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
