<script setup>
import HeadBanner from "../../Components/Landing/HeadBanner.vue";
import BodyLanding from "../../Components/Landing/Body.vue";
import TableSampleClients from "@/Components/TableSampleClients.vue";
</script>

<template>
    <BodyLanding>
        <HeadBanner :showBtn="true" />
        <h2 class="pt-20 mt-20 pb-10 text-2xl/[30px] font-bold">
            Rencana Investasi Kabupaten Banteang Tahun 2023
        </h2>
        <div class="border rounded-xl" has-table>
            <TableSampleClients />
        </div>
    </BodyLanding>
</template>
<script>
export default {
    data: function () {
        return {};
    },
};
</script>
