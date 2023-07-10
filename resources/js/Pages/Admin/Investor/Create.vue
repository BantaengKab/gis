<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { mdiAccountCash, mdiArrowLeftBoldOutline } from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";

const form = useForm({
    nama: "",
    alamat: "",
    no_hp: "",
    nib: "",
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Create Investor" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiAccountCash"
                title="Add Investor"
                main
            >
                <BaseButton
                    :route-name="route('investor.index')"
                    :icon="mdiArrowLeftBoldOutline"
                    label="Back"
                    color="white"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>
            <CardBox form @submit.prevent="form.post(route('investor.store'))">
                <FormField
                    label="Nama"
                    :class="{ 'text-red-400': form.errors.nama }"
                >
                    <FormControl
                        v-model="form.nama"
                        type="text"
                        placeholder="Enter Nama"
                        :error="form.errors.nama"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.nama"
                        >
                            {{ form.errors.nama }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="NIB"
                    :class="{ 'text-red-400': form.errors.nib }"
                >
                    <FormControl
                        v-model="form.nib"
                        type="text"
                        placeholder="Enter NIB"
                        :error="form.errors.nib"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.nib"
                        >
                            {{ form.errors.nib }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="Alamat"
                    :class="{ 'text-red-400': form.errors.alamat }"
                >
                    <FormControl
                        v-model="form.alamat"
                        type="text"
                        placeholder="Enter Alamat"
                        :error="form.errors.alamat"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.alamat"
                        >
                            {{ form.errors.alamat }}
                        </div>
                    </FormControl>
                </FormField>

                <FormField
                    label="No.HP"
                    :class="{ 'text-red-400': form.errors.no_hp }"
                >
                    <FormControl
                        v-model="form.no_hp"
                        type="text"
                        placeholder="Enter No.HP"
                        :error="form.errors.no_hp"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.no_hp"
                        >
                            {{ form.errors.no_hp }}
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
