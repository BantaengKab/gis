<script setup>
defineProps({
    showBtn: {
        type: Boolean,
        required: true,
    },
});
</script>

<template>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
        <div class="pt-10">
            <h1 class="font-bold text-8xl/[80px]">Peta Potensi & Peluang</h1>
            <div class="inline-flex items-center pt-10 sm:pt-0">
                <h1 class="sm:text-3xl/[70px] text-xl/[30px] font-medium">
                    KOTA BANTAENG
                </h1>
            </div>
            <p class="pt-8 text-xl/[30px]">
                Yuk, jadilah bagian dari kesuksesan masa depan! Investasikan
                dana Anda dan dapatkan keuntungan yang berkelanjutan.
            </p>
            <div class="pt-10">
                <a
                    href="https://investasi.bantaengkab.go.id/form"
                    class="font-normal bg-red-600 text-white py-2 px-10 rounded-md inline text-xl/[30px]"
                    >Investasi Sekarang</a
                >
            </div>
        </div>
        <div class="pt-24 sm:pt-5">
            <img
                src="../../../../public/assets/asset1.png"
                class="w-full"
                alt=""
            />
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
