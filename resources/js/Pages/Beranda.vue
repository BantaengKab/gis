<script setup>
import { Head, Link } from "@inertiajs/vue3";
import BaseIcon from "@/Components/BaseIcon.vue";
import { mdiEmailOutline, mdiWhatsapp } from "@mdi/js";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="GIS" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-white dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div
            class="sm:fixed sm:top-0 sm:right-0 sm:left-0 max-w-7xl mx-auto px-6 lg:px-8"
        >
            <div class="flex items-center justify-between bg-white py-5">
                <div class="inline-flex items-center">
                    <img
                        src="../../../public/assets/logo.png"
                        class="h-10 mr-2"
                        alt=""
                    />
                </div>

                <Link
                    :href="route('login')"
                    class="font-semibold text-xs bg-red-600 text-white py-2 px-8 rounded-md hidden sm:inline"
                    >Log in</Link
                >
            </div>
        </div>

        <div class="max-w-7xl p-6 lg:p-8">
            <div class="mt-0 sm:mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="pt-10">
                        <h1 class="font-bold text-8xl/[80px]">
                            Peta Potensi & Peluang
                        </h1>
                        <div class="inline-flex items-center pt-10 sm:pt-0">
                            <h1
                                class="sm:text-3xl/[70px] text-xl/[30px] font-medium"
                            >
                                KABUPATEN BANTAENG
                            </h1>
                        </div>
                        <p class="pt-8 text-xl/[30px]">
                            Yuk, jadilah bagian dari kesuksesan masa depan!
                            Investasikan dana Anda dan dapatkan keuntungan yang
                            berkelanjutan.
                        </p>

                        <div class="pt-10">
                            <Link
                                :href="route('login')"
                                class="font-normal bg-red-600 text-white py-2 px-10 rounded-md inline text-xl/[30px]"
                                >Investasi Sekarang</Link
                            >
                        </div>
                    </div>
                    <div class="pt-24 sm:pt-5">
                        <img
                            src="../../../public/assets/asset1.png"
                            class="w-full"
                            alt=""
                        />
                    </div>
                </div>
                <div class="h-100">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 mt-16 sm:justify-center sm:items-center">
        <div class="max-w-7xl p-6 lg:p-8 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 lg:gap-8">
                <div class="sm:col-span-2 pr-10">
                    <div class="inline-flex items-center">
                        <img
                            src="../../../public/assets/logo.png"
                            class="h-10 mr-2"
                            alt=""
                        />
                    </div>
                    <p class="pt-3">
                        Jl. Sukamulia No.21, Tamamaung, Kec. Panakkukang, Kota
                        Makassar, Sulawesi Selatan 90231
                    </p>
                    <p class="pt-3 text-red-600">
                        © 2023 Gala Patta Creation All rights reserved.
                    </p>
                </div>
                <div class="sm:col-span-1">
                    <h1 class="text-xl font-medium">Kontak Kami</h1>
                    <div class="inline-flex items-center pt-3">
                        <BaseIcon :path="mdiWhatsapp" w="w-4" class="mr-3" />
                        <p class="">+62 813-4264-0000</p>
                    </div>
                    <div class="inline-flex items-center pt-3">
                        <BaseIcon
                            :path="mdiEmailOutline"
                            w="w-4"
                            class="mr-3"
                        />
                        <p class="">Gala@gmail.com</p>
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

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
