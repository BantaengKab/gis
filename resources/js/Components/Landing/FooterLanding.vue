<script setup>
import BaseIcon from "@/Components/BaseIcon.vue";
import { mdiEmailOutline, mdiWhatsapp } from "@mdi/js";
</script>

<template>
    <div class="bg-gray-100 mt-16 sm:justify-center sm:items-center">
        <div class="max-w-7xl p-6 lg:p-8 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 lg:gap-8">
                <div class="sm:col-span-2 pr-10">
                    <div class="inline-flex items-center">
                        <img
                            src="../../../../public/assets/Kabupaten_Bantaeng.png"
                            class="h-10 mr-2"
                            alt=""
                        />
                    </div>
                    <p class="pt-3">
                       Jl. Kartini No.2 , Kabupaten Bantaeng 
                    </p>
                    <p class="pt-3 text-red-600">
                        © 2023 Dinas Penanaman Modal dan Pelayanan Perizinan Terpadu - Support By: Dinas Komunikasi Informatika Statistik Dan Persandian.
                    </p>
                </div>
                <div class="sm:col-span-1">
                    <h1 class="text-xl font-medium">Kontak Kami</h1>
                    <div class="inline-flex items-center pt-3">
                        <BaseIcon :path="mdiWhatsapp" w="w-4" class="mr-3" />
                        <p class="">(0413) 23603/085242720703</p>
                    </div>
                    <div class="inline-flex items-center pt-3">
                        <BaseIcon
                            :path="mdiEmailOutline"
                            w="w-4"
                            class="mr-3"
                        />
                        <p class="">dpmptsp@bantaengkab.go.id</p>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <h1 class="text-xl font-medium">Lainnya</h1>
                    <p class="pt-3">Kebijakan Privasi</p>
                    <p class="pt-3">Syarat & Ketentuan</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data: function () {
        return {};
    },
};
</script>
