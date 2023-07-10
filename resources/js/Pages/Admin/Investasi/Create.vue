<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { mdiFinance, mdiArrowLeftBoldOutline } from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";

const props = defineProps({
    sektor: {
        type: Object,
        default: () => ({}),
    },
    investor: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    rencana: "0",
    realisasi: "0",
    tgl_rencana: "",
    tgl_realisasi: "",
    sektor_id: "",
    investor_id: "",
    wilayah_id: "",
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Create Investasi" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiFinance"
                title="Add Investasi"
                main
            >
                <BaseButton
                    :route-name="route('investasi.index')"
                    :icon="mdiArrowLeftBoldOutline"
                    label="Back"
                    color="white"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>
            <CardBox form @submit.prevent="form.post(route('investasi.store'))">
                <FormField
                    label="Sektor"
                    :class="{ 'text-red-400': form.errors.sektor_id }"
                >
                    <FormControl
                        v-model="form.sektor_id"
                        type="select"
                        placeholder="Pilih Sektor"
                        :error="form.errors.sektor_id"
                        :options="sektor"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.sektor_id"
                        >
                            {{ form.errors.sektor_id }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Investor"
                    :class="{ 'text-red-400': form.errors.investor_id }"
                >
                    <FormControl
                        v-model="form.investor_id"
                        type="select"
                        placeholder="Pilih Investor"
                        :error="form.errors.investor_id"
                        :options="investor"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.investor_id"
                        >
                            {{ form.errors.investor_id }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Lokasi"
                    :class="{ 'text-red-400': form.errors.wilayah_id }"
                >
                    <FormControl
                        v-model="form.wilayah_id"
                        type="select"
                        placeholder="Pilih Lokasi"
                        :error="form.errors.wilayah_id"
                        :options="wilayah"
                        :required="true"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.wilayah_id"
                        >
                            {{ form.errors.wilayah_id }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Rencana (Rp.)"
                    :class="{ 'text-red-400': form.errors.rencana }"
                >
                    <FormControl
                        v-model="form.rencana"
                        type="number"
                        placeholder="Enter Rencana"
                        :error="form.errors.rencana"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.rencana"
                        >
                            {{ form.errors.rencana }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Realisasi (Rp.)"
                    :class="{ 'text-red-400': form.errors.realisasi }"
                >
                    <FormControl
                        v-model="form.realisasi"
                        type="number"
                        placeholder="Enter Realisasi"
                        :error="form.errors.realisasi"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.realisasi"
                        >
                            {{ form.errors.realisasi }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Tanggal Rencana"
                    :class="{ 'text-red-400': form.errors.tgl_rencana }"
                >
                    <FormControl
                        v-model="form.tgl_rencana"
                        type="date"
                        placeholder="Masukkan Tanggal Direncanakan"
                        :error="form.errors.tgl_rencana"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.tgl_rencana"
                        >
                            {{ form.errors.tgl_rencana }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Tanggal Realisasi"
                    :class="{ 'text-red-400': form.errors.tgl_realisasi }"
                >
                    <FormControl
                        v-model="form.tgl_realisasi"
                        type="date"
                        placeholder="Masukkan Tanggal Direalisasikan"
                        :error="form.errors.tgl_realisasi"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.tgl_realisasi"
                        >
                            {{ form.errors.tgl_realisasi }}
                        </div>
                    </FormControl>
                </FormField>

                <template #footer>
                    <BaseButtons>
                        <BaseButton
                            type="submit"
                            color="info"
                            label="Submit"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        />
                    </BaseButtons>
                </template>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
