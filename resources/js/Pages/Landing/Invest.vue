<script setup>
import BodyLanding from "../../Components/Landing/Body.vue";
import Items from "../../Components/Landing/ItemInvest.vue";
import NavbarLanding from "../../Components/Landing/NavbarLanding.vue";
import FooterLanding from "../../Components/Landing/FooterLanding.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
  kontens: {
    type: Object,
    default: () => ({}),
  },
});
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
         <div v-for="(konten, index) in kontens" :key="index">
         <Items :reversPosition="index % 2 === 1" :img="getImageUrl(konten.img)" :title="konten.nama" :desc="konten.desc" />
      </div>
    </BodyLanding>
    <FooterLanding />
</template>

<script>
export default {
    data: function () {
        return {};
    },
    methods: {
    getImageUrl(filename) {
      return "/konten/" + filename;
    },
  },
};
</script>
