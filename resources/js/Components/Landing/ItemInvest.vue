<script setup>
defineProps({
    reversPosition: {
        type: Boolean,
        required: false,
    },
    img: {
        type: String,
        required: true,
    },
    title: {
        type: String,
        required: true,
    },
    desc: {
        type: String,
        required: true,
    },
});
</script>
<template>
    <div
        class="grid grid-cols-1 md:grid-cols-5 gap-6 lg:gap-8"
        v-if="reversPosition == false"
    >
        <div class="col-span-2"></div>
        <div class="col-span-3 pl-7 py-10">
            <div class="flex items-center">
                <img
                    :src="img"
                    class="flex-none w-40 h-40 rounded-full object-cover"
                    :alt="img"
                />
                <div class="flex-auto pl-8">
                    <h1 class="font-bold text-3xl">{{ title }}</h1>
                    <p class="pt-8 text-xl/[30px]">
                        {{ desc }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div
        class="grid grid-cols-1 md:grid-cols-5 gap-6 lg:gap-8"
        v-if="reversPosition == true"
    >
        <div class="col-span-3 pr-7 py-10 text-right">
            <div class="flex items-center">
                <div class="flex-auto pr-8">
                    <h1 class="font-bold text-3xl">{{ title }}</h1>
                    <p class="pt-8 text-xl/[30px]">
                        {{ desc }}
                    </p>
                </div>
                <img
                    :src="img"
                    class="flex-none w-40 h-40 object-cover rounded-full"
                    alt=""
                />
            </div>
        </div>
        <div class="col-span-2"></div>
    </div>
</template>
