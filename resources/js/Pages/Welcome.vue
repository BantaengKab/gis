<script setup>
import { Head, Link } from "@inertiajs/vue3";
import NavbarLanding from "../Components/Landing/NavbarLanding.vue";
import FooterLanding from "../Components/Landing/FooterLanding.vue";
import Peta from "./Landing/Peta.vue";
import Beranda from "./Landing/Beranda.vue";
import FormLanding from "./Landing/Form.vue";
import Invest from "./Landing/Invest.vue";
</script>

<template>
    <Head title="GIS" />
    <NavbarLanding />
    <!-- <Beranda /> -->
    <Peta />
    <!-- <FormLanding /> -->
    <!-- <Invest /> -->
    <FooterLanding />
</template>

<script>
export default {
    data: function () {
        return {};
    },
};
</script>
