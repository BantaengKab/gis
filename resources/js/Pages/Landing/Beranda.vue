<script setup>
import HeadBanner from "../../Components/Landing/HeadBanner.vue";
import BodyLanding from "../../Components/Landing/Body.vue";
import TableSampleClients from "@/Components/TableSampleClients.vue";
import NavbarLanding from "../../Components/Landing/NavbarLanding.vue";
import FooterLanding from "../../Components/Landing/FooterLanding.vue";
import Pagination from "@/Components/Admin/Pagination.vue";
import { Head, Link } from "@inertiajs/vue3";

const props = defineProps({
  investasis: {
    type: Object,
    default: () => ({}),
  },
});

</script>

<template>
    <Head title="GIS" />
    <NavbarLanding />
    <BodyLanding>
        <HeadBanner :showBtn="true" />
        <h2 class="pt-20 mt-20 pb-10 text-2xl/[30px] font-bold">
            Rencana Investasi Kabupaten Bantaeng Tahun 2023
        </h2>
        <div class="border rounded-xl" has-table>
            <table>
          <thead>
            <tr>
                <th class="text-center">
                Investor
                </th>
                <th class="text-center">Alamat</th>
                <th class="text-center">
                Rencana
                </th>
                <th class="text-center">
                Realisasi
                </th>
            </tr>
          </thead>

          <tbody>
            <tr v-for="investasi in investasis.data" :key="investasi.id">
              <td data-label="Investor" class="text-center">
                  {{ investasi.investor.nama }}
              </td>
              <td data-label="Alamat">
                {{ investasi.investor.alamat }}
              </td>
              <td data-label="Rencana" class="text-center">
                    {{ investasi.rencana.toLocaleString(undefined, { style: 'currency', currency: 'IDR' }) }}
                </td>
                <td data-label="Realisasi" class="text-center">
                    {{ investasi.realisasi.toLocaleString(undefined, { style: 'currency', currency: 'IDR' }) }}
                </td>
            </tr>
          </tbody>
        </table>
         <div class="py-4">
          <Pagination :data="investasis" />
        </div>
        </div>
    </BodyLanding>
    <FooterLanding />
</template>
