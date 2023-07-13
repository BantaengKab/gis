<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { mdiListBoxOutline, mdiArrowLeftBoldOutline } from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/CardBox.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";

const props = defineProps({
    konten: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    _method: "put",
    nama: props.konten.nama,
    desc: props.konten.desc,
    no_urut: props.konten.no_urut,
    img: props.konten.img,
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Update konten" />
        <SectionMain>
            <SectionTitleLineWithButton
                :img="mdiListBoxOutline"
                title="Update konten"
                main
            >
                <BaseButton
                    :route-name="route('konten.index')"
                    :img="mdiArrowLeftBoldOutline"
                    label="Back"
                    color="white"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>
            <CardBox
                form
                @submit.prevent="
                    form.post(route('konten.update', props.konten.id))
                "
            >
                <FormField
                    label="Nama"
                    :class="{ 'text-red-400': form.errors.nama }"
                >
                    <FormControl
                        v-model="form.nama"
                        type="text"
                        placeholder="Enter Name"
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
                    label="Desc"
                    :class="{ 'text-red-400': form.errors.desc }"
                >
                    <FormControl
                        v-model="form.desc"
                        type="textarea"
                        placeholder="Enter Deskripsi"
                        :error="form.errors.desc"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.desc"
                        >
                            {{ form.errors.desc }}
                        </div>
                    </FormControl>
                </FormField>
                <FormField
                    label="No Urut"
                    :class="{ 'text-red-400': form.errors.no_urut }"
                >
                    <FormControl
                        v-model="form.no_urut"
                        type="number"
                        placeholder="Enter No.Urut"
                        :error="form.errors.no_urut"
                    >
                        <div
                            class="text-red-400 text-sm"
                            v-if="form.errors.no_urut"
                        >
                            {{ form.errors.no_urut }}
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
