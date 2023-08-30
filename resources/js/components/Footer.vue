<template>
    <footer class="mt-5">
        <div class="container pt-5 pb-4">
            <div class="row align-items-center px-4 gx-lg-4 g-md-5 gy-5">
                <div class="col-lg-4 col-md-6 order-lg-0 order-1">
                    <div class="hstack align-items-center flex-wrap gap-3 pe-5">
                        <table>
                        <tr>
                        <router-link to="/" class="navbar-contact font-weight-400 font-size-12 text-decoration-none text-dark">
                            Home
                        </router-link>
                        </tr>

                        <tr>
                        <router-link to="/about-us" class="navbar-contact font-weight-400 font-size-12 text-decoration-none text-dark">
                            About Us
                        </router-link>
                        </tr>

                        <tr>
                        <router-link to="/product-service" class="navbar-contact font-weight-400 font-size-12 text-decoration-none text-dark">
                            Product & Service
                        </router-link>
                        </tr>

                        <tr>
                        <router-link to="/news" class="navbar-contact font-weight-400 font-size-12 text-decoration-none text-dark">
                            News
                        </router-link>
                        </tr>

                        <tr>
                        <router-link to="/career" class="navbar-contact font-weight-400 font-size-12 text-decoration-none text-dark">
                            Career
                        </router-link>
                        </tr>

                        <tr>
                        <router-link to="/contact-us" class="navbar-contact font-weight-400 font-size-12 text-decoration-none text-dark">
                            Contact Us
                        </router-link>
                        </tr>
                    </table>
                </div>
                </div>
                <div class="col-lg-4 col-md-6 order-0 orderlg-1">
                    <div class="text-center">
                        <div>
                            <img style="height: 55px;" src="/assets/images/logo-espn.png" />
                        </div>
                        <div class="">
                            <img style="height: 45px;" src="/assets/images/elevenia-biz-yellow.png" />
                            <img class="pt-3" style="height: 38px;" src="/assets/images/nustantrara-black.png" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ms-lg-auto order-2 orderlg-2">
                    <table class="navbar-contact font-weight-400 font-size-12">
                        <tr>
                            <td>
                                <img src="/assets/images/icons/location.svg" />
                            </td>
                            <td>
                                {{ setting['location_contact_us'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="me-2" src="/assets/images/icons/call.svg" />
                            </td>
                            <td>
                                {{ setting['phone_contact_us'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img class="me-2" src="/assets/images/icons/mail.svg" />
                            </td>
                            <td>
                                {{ setting['email_contact_us'] }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="text-center my-2 font-weight-400 font-size-12">
            © 2022 espn all rights reserved
        </div>
    </footer>
</template>

<script>
export default {
    name: 'Footer',
    props: ['setting']
}
</script>
