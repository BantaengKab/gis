<script setup>
import { reactive, ref } from "vue";
import {
    mdiBallotOutline,
    mdiAccount,
    mdiMail,
    mdiGithub,
    mdiCalendar,
} from "@mdi/js";
import SectionMain from "@/Components/SectionMain.vue";
import CardBox from "@/Components/CardBox.vue";
import FormCheckRadioGroup from "@/Components/FormCheckRadioGroup.vue";
import FormFilePicker from "@/Components/FormFilePicker.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";
import BaseDivider from "@/Components/BaseDivider.vue";
import BaseButton from "@/Components/BaseButton.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import SectionTitle from "@/Components/SectionTitle.vue";
// import LayoutAuthenticated from "@/layouts/LayoutAuthenticated.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import NotificationBarInCard from "@/Components/NotificationBarInCard.vue";
import BodyLanding from "../../Components/Landing/Body.vue";
import NavbarLanding from "../../Components/Landing/NavbarLanding.vue";
import FooterLanding from "../../Components/Landing/FooterLanding.vue";
import { Head, Link } from "@inertiajs/vue3";

const selectOptions = [
    { id: 1, label: "Business development" },
    { id: 2, label: "Marketing" },
    { id: 3, label: "Sales" },
];

const form = reactive({
    name: "John Doe",
    email: "john.doe@example.com",
    phone: "",
    department: selectOptions[0],
    subject: "",
    question: "",
});

const customElementsForm = reactive({
    checkbox: ["lorem"],
    radio: "one",
    radio2: "one",
    switch: ["one"],
    file: null,
});

const submit = () => {
    //
};

const formStatusWithHeader = ref(true);

const formStatusCurrent = ref(0);

const formStatusOptions = ["info", "success", "danger", "warning"];

const formStatusSubmit = () => {
    formStatusCurrent.value = formStatusOptions[formStatusCurrent.value + 1]
        ? formStatusCurrent.value + 1
        : 0;
};
</script>

<template>
    <Head title="GIS" />
    <NavbarLanding />
    <BodyLanding>
        <SectionTitleLineWithButton
            :icon="mdiBallotOutline"
            title="Formulir Minat Investasi"
            main
        >
            <BaseButton
                href="https://gis.galapattacreation.com/peta"
                target="_blank"
                label="Lihat Peta Potensi"
                color="contrast"
                rounded-full
                small
            />
        </SectionTitleLineWithButton>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
            <div class="border rounded-lg">
                <CardBox>
                    <FormField label="Meeting date/Tanggal Pertemuan">
                        <FormControl :icon="mdiCalendar" type="date" />
                    </FormField>

                    <FormField label="Venue/Lokasi Pertemuan">
                        <FormControl
                            type="textarea"
                            placeholder="Venue/Lokasi Pertemuan"
                        />
                    </FormField>

                    <FormField label="Full Name/Nama Lengkap">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Full Name/Nama Lengkap"
                        />
                    </FormField>

                    <FormField label="Job Tittle/Jabatan">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Job Tittle/Jabatan"
                        />
                    </FormField>

                    <FormField label="Phone/Mobile/Telepon">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Phone/Mobile/Telepon"
                        />
                    </FormField>

                    <FormField label="Email">
                        <FormControl v-model="form.phone" placeholder="Email" />
                    </FormField>

                    <FormField label="Address/Alamat">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Address/Alamat"
                        />
                    </FormField>

                    <FormField
                        label="Business Description (Existing/Intended)/Deskripsi Usaha (Eksisting/Rencana)"
                    >
                        <FormControl
                            type="textarea"
                            placeholder="Business Description (Existing/Intended)/Deskripsi Usaha (Eksisting/Rencana)"
                        />
                    </FormField>

                    <FormField label="Company Name/Nama Perusahaan">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Company Name/Nama Perusahaan"
                        />
                    </FormField>

                    <FormField label="Business Field/Bidang Usaha">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Business Field/Bidang Usaha"
                        />
                    </FormField>

                    <FormField label="Prefered Location/Preferensi Lokasi">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Prefered Location/Preferensi Lokasi"
                        />
                    </FormField>

                    <FormField label="Country Origin/Negara Asal">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Country Origin/Negara Asal"
                        />
                    </FormField>
                </CardBox>
            </div>
            <div class="border rounded-lg">
                <CardBox form @submit.prevent="submit">
                    <FormField label="Investment Status/Status Investasi">
                        <FormCheckRadioGroup
                            v-model="customElementsForm.radio"
                            name="sample-radio"
                            type="radio"
                            :options="{
                                one: 'New (Greenfield)/Baru',
                                two: 'Expansion (Brownfield)/Ekspansi',
                            }"
                        />
                    </FormField>
                    <FormField label="Capital Amount/Nilai Investasi">
                        <FormControl
                            v-model="form.phone"
                            placeholder="Capital Amount/Nilai Investasi"
                        />
                    </FormField>

                    <div class="pb-6">
                        <FormCheckRadioGroup
                            v-model="customElementsForm.radio2"
                            type="radio"
                            :options="{ one: 'US Dollar', two: 'Rp' }"
                        />
                    </div>

                    <FormField label="Number of Employees/Rencana Tenaga Kerja">
                        <div class="ss">
                            <FormField label="Total Local Worker/Jumlah TKI">
                                <FormControl
                                    v-model="form.phone"
                                    placeholder="Total Local Worker/Jumlah TKI"
                                />
                            </FormField>
                            <FormField label="Plan/Rencana">
                                <FormControl
                                    v-model="form.phone"
                                    placeholder="Plan/Rencana"
                                />
                            </FormField>
                            <FormField label="Existing/Eksisting">
                                <FormControl
                                    v-model="form.phone"
                                    placeholder="Existing/Eksisting"
                                />
                            </FormField>
                        </div>
                        <div class="ss">
                            <FormField label="Total Foreign Worker/Jumlah TKA">
                                <FormControl
                                    v-model="form.phone"
                                    placeholder="Total Foreign Worker/Jumlah TKA"
                                />
                            </FormField>
                            <FormField label="Plan/Rencana">
                                <FormControl
                                    v-model="form.phone"
                                    placeholder="Plan/Rencana"
                                />
                            </FormField>
                            <FormField label="Existing/Eksisting">
                                <FormControl
                                    v-model="form.phone"
                                    placeholder="Existing/Eksisting"
                                />
                            </FormField>
                        </div>
                    </FormField>

                    <FormField
                        label="Parent Company (if any)/Induk Perusahaan (jika ada)"
                    >
                        <FormControl
                            v-model="form.phone"
                            placeholder="Parent Company (if any)/Induk Perusahaan (jika ada)"
                        />
                    </FormField>
                    <FormField label="Other Information/Informasi Lain">
                        <FormControl
                            type="textarea"
                            placeholder="Other Information/Informasi Lain"
                        />
                    </FormField>
                    <FormField
                        label="Business Plan, Project Description/Rencana Bisnis, Deskripsi Proyek "
                    >
                        <FormControl
                            type="textarea"
                            placeholder="Business Plan, Project Description/Rencana Bisnis, Deskripsi Proyek "
                        />
                    </FormField>
                    <FormField label="Obstacle/Kendala  ">
                        <FormControl
                            type="textarea"
                            placeholder="Obstacle/Kendala  "
                        />
                    </FormField>
                    <FormField label="Required Action/Tindak Lanjut  ">
                        <FormControl
                            type="textarea"
                            placeholder="Required Action/Tindak Lanjut  "
                        />
                    </FormField>

                    <template #footer>
                        <BaseButtons>
                            <BaseButton
                                type="submit"
                                color="info"
                                label="Submit"
                            />
                        </BaseButtons>
                    </template>
                </CardBox>
            </div>
        </div>
    </BodyLanding>
    <FooterLanding />
</template>

<script>
export default {
    data: function () {
        return {};
    },
};
</script>
