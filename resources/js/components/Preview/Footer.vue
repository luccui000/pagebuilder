<template>
    <div class="row mt-2">
        <div class="col-12">
            <div class="template-1"
                 style="background-color: #45526e; color: #fff"
                 :style="[]"
            >
                <section class=""
                >
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Company name
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer
                                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                            <p>
                                <a class="text-white">MDBootstrap</a>
                            </p>
                            <p>
                                <a class="text-white">MDWordPress</a>
                            </p>
                            <p>
                                <a class="text-white">BrandFlow</a>
                            </p>
                            <p>
                                <a class="text-white">Bootstrap Angular</a>
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                Useful links
                            </h6>
                            <p>
                                <a class="text-white">Your Account</a>
                            </p>
                            <p>
                                <a class="text-white">Become an Affiliate</a>
                            </p>
                            <p>
                                <a class="text-white">Shipping Rates</a>
                            </p>
                            <p>
                                <a class="text-white">Help</a>
                            </p>
                        </div>

                        <hr class="w-100 clearfix d-md-none" />
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
                            <p><i class="fa fa-envelope mr-3"></i> info@gmail.com</p>
                            <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>
                    </div>
                </section>
                <hr class="my-3">
                <div class="container">
                    <section class="row">
                        <div class="col-8">
                            <div class="p-3">
                                © 2020 Copyright:
                                <a class="text-white" href="https://mdbootstrap.com/"
                                >MDBootstrap.com</a
                                >
                            </div>
                        </div>
                        <div class="col-4 text-right">
                            <a
                                class="btn btn-outline-light btn-floating m-1 text-white"
                                role="button"
                            ><i class="fa fa-facebook"></i
                            ></a>

                            <a
                                class="btn btn-outline-light btn-floating m-1 text-white"
                                role="button"
                            ><i class="fa fa-twitter"></i
                            ></a>
                            <a
                                class="btn btn-outline-light btn-floating m-1 text-white"
                                role="button"
                            ><i class="fa fa-google"></i
                            ></a>

                            <a
                                class="btn btn-outline-light "
                                role="button"
                            ><i class="fa fa-instagram"></i
                            ></a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { ref } from "vue";

export default {
    name: "Footer",
    setup() {
        const bgColor = ref("#45526e");
        const txtColor = ref("#fff")
        // const bgStyle

        return {
            txtColor,
            bgColor
        }
    }
}
</script>

<style scoped>

</style>
