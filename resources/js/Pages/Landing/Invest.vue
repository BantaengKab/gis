<script setup>
import BodyLanding from "../../Components/Landing/Body.vue";
import Items from "../../Components/Landing/ItemInvest.vue";
import NavbarLanding from "../../Components/Landing/NavbarLanding.vue";
import FooterLanding from "../../Components/Landing/FooterLanding.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>
<template>
    <Head title="GIS" />
    <NavbarLanding />
    <BodyLanding>
        <h1 class="font-bold text-6xl/[80px] text-center">
            Peta Potensi & Peluang
        </h1>
        <h1
            class="sm:text-3xl/[70px] text-center text-xl/[30px] font-medium mb-32"
        >
            KOTA BANTAENG
        </h1>
        <Items
            img="https://static.wixstatic.com/media/e0fc33_aba5f044b3c049ab95972b5e7c29e287~mv2.jpg/v1/fill/w_640,h_724,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/e0fc33_aba5f044b3c049ab95972b5e7c29e287~mv2.jpg"
            title="Hotel Mewah"
            desc="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"
        />
        <Items
            :reversPosition="true"
            img="https://static.wixstatic.com/media/e0fc33_aba5f044b3c049ab95972b5e7c29e287~mv2.jpg/v1/fill/w_640,h_724,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/e0fc33_aba5f044b3c049ab95972b5e7c29e287~mv2.jpg"
            title="Hotel Mewah"
            desc="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s"
        />
    </BodyLanding>
    <FooterLanding />
</template>

<script>
export default {
    data: function () {
        return {};
    },
};
</script>
