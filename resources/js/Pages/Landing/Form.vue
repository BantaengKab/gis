<script setup>
import { reactive, ref, watch } from "vue";
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
import axios from "axios";

const selectOptions = [
    { id: 1, label: "Business development" },
    { id: 2, label: "Marketing" },
    { id: 3, label: "Sales" },
];

const form = reactive({
    tgl_pertemuan: "",
    lokasi: "",
    nama: "",
    jabatan: "",
    no_telp: "",
    email: "",
    alamat: "",
    desk_usaha: "",
    perusahaan: "",
    bidang_usaha: "",
    pref_lokasi: "",
    negara: "",
    stat_inves: "",
    nilai_invest: "",
    mata_uang: "",
    tki_tot: "",
    tki_rencana: "",
    tki_eksis: "",
    tka_tot: "",
    tka_rencana: "",
    tka_eksis: "",
    induk_perusahaan: "",
    informasi: "",
    desk_proy: "",
    kendala: "",
    tindak_lanjut: "",
});

const validationErrors = reactive({});

const submitForm = () => {
    console.log(form);
    axios
        .post("/form-submit", form) // Change the URL to your Laravel API endpoint
        .then((response) => {
            // Handle the successful response if needed
            console.log(response.data);
            showSuccessMessage.value = true;
            resetForm();
        })
        .catch((error) => {
            if (error.response.status === 422) {
                const { errors } = error.response.data;
                // Set the validation errors
                validationErrors.value = errors;
                // Hide the success message
                showSuccessMessage.value = false;
            } else {
                // Handle other types of errors
                console.error(error);
            }
        });
};

const resetForm = () => {
    for (const key in form) {
        form[key] = "";
    }
};

const showSuccessMessage = ref(false);
const showValidationErrors = ref(false);

watch(validationErrors, () => {
    showValidationErrors.value = Object.keys(validationErrors.value).length > 0;
});

// const formStatusWithHeader = ref(true);

// const formStatusCurrent = ref(0);

const formStatusOptions = ["info", "success", "danger", "warning"];

const formStatusSubmit = () => {
    formStatusCurrent.value = formStatusOptions[formStatusCurrent.value + 1]
        ? formStatusCurrent.value + 1
        : 0;
};
</script>

<style>
.success-message {
    background-color: #c8e6c9;
    padding: 10px;
    margin-top: 10px;
    border-radius: 4px;
}

.success-text {
    font-size: 18px;
    color: green;
}

.validation-errors {
    background-color: #ffcdd2;
    padding: 10px;
    margin-top: 10px;
    border-radius: 4px;
}

.validation-errors ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.validation-errors li {
    color: red;
    margin-bottom: 5px;
}

/* Additional styles for validation error messages */
.validation-errors li::before {
    content: "⚠";
    margin-right: 5px;
}

.validation-errors li {
    display: flex;
    align-items: center;
}
</style>

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
                href="https://investasi.bantaengkab.go.id/peta"
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
                        <FormControl
                            v-model="form.tgl_pertemuan"
                            :icon="mdiCalendar"
                            type="date"
                        />
                    </FormField>

                    <FormField label="Venue/Lokasi Pertemuan">
                        <FormControl
                            v-model="form.lokasi"
                            type="textarea"
                            placeholder="Venue/Lokasi Pertemuan"
                        />
                    </FormField>

                    <FormField label="Full Name/Nama Lengkap">
                        <FormControl
                            v-model="form.nama"
                            placeholder="Full Name/Nama Lengkap"
                        />
                    </FormField>

                    <FormField label="Job Tittle/Jabatan">
                        <FormControl
                            v-model="form.jabatan"
                            placeholder="Job Tittle/Jabatan"
                        />
                    </FormField>

                    <FormField label="Phone/Mobile/Telepon">
                        <FormControl
                            v-model="form.no_telp"
                            placeholder="Phone/Mobile/Telepon"
                        />
                    </FormField>

                    <FormField label="Email">
                        <FormControl v-model="form.email" placeholder="Email" />
                    </FormField>

                    <FormField label="Address/Alamat">
                        <FormControl
                            v-model="form.alamat"
                            placeholder="Address/Alamat"
                        />
                    </FormField>

                    <FormField
                        label="Business Description (Existing/Intended)/Deskripsi Usaha (Eksisting/Rencana)"
                    >
                        <FormControl
                            v-model="form.desk_usaha"
                            type="textarea"
                            placeholder="Business Description (Existing/Intended)/Deskripsi Usaha (Eksisting/Rencana)"
                        />
                    </FormField>

                    <FormField label="Company Name/Nama Perusahaan">
                        <FormControl
                            v-model="form.perusahaan"
                            placeholder="Company Name/Nama Perusahaan"
                        />
                    </FormField>

                    <FormField label="Business Field/Bidang Usaha">
                        <FormControl
                            v-model="form.bidang_usaha"
                            placeholder="Business Field/Bidang Usaha"
                        />
                    </FormField>

                    <FormField label="Prefered Location/Preferensi Lokasi">
                        <FormControl
                            v-model="form.pref_lokasi"
                            placeholder="Prefered Location/Preferensi Lokasi"
                        />
                    </FormField>

                    <FormField label="Country Origin/Negara Asal">
                        <FormControl
                            v-model="form.negara"
                            placeholder="Country Origin/Negara Asal"
                        />
                    </FormField>
                </CardBox>
            </div>
            <div class="border rounded-lg">
                <CardBox form @submit.prevent="submitForm">
                    <FormField label="Investment Status/Status Investasi">
                        <FormCheckRadioGroup
                            v-model="form.stat_inves"
                            name="sample-radio"
                            type="radio"
                            :options="{
                                1: 'New (Greenfield)/Baru',
                                2: 'Expansion (Brownfield)/Ekspansi',
                            }"
                        />
                    </FormField>
                    <FormField label="Capital Amount/Nilai Investasi">
                        <FormControl
                            v-model="form.nilai_invest"
                            placeholder="Capital Amount/Nilai Investasi"
                        />
                    </FormField>

                    <div class="pb-6">
                        <FormCheckRadioGroup
                            v-model="form.mata_uang"
                            type="radio"
                            :options="{ 1: 'US Dollar', 2: 'Rp' }"
                        />
                    </div>

                    <FormField label="Number of Employees/Rencana Tenaga Kerja">
                        <div class="ss">
                            <FormField label="Total Local Worker/Jumlah TKI">
                                <FormControl
                                    v-model="form.tki_tot"
                                    placeholder="Total Local Worker/Jumlah TKI"
                                />
                            </FormField>
                            <FormField label="Plan/Rencana">
                                <FormControl
                                    v-model="form.tki_rencana"
                                    placeholder="Plan/Rencana"
                                />
                            </FormField>
                            <FormField label="Existing/Eksisting">
                                <FormControl
                                    v-model="form.tki_eksis"
                                    placeholder="Existing/Eksisting"
                                />
                            </FormField>
                        </div>
                        <div class="ss">
                            <FormField label="Total Foreign Worker/Jumlah TKA">
                                <FormControl
                                    v-model="form.tka_tot"
                                    placeholder="Total Foreign Worker/Jumlah TKA"
                                />
                            </FormField>
                            <FormField label="Plan/Rencana">
                                <FormControl
                                    v-model="form.tka_rencana"
                                    placeholder="Plan/Rencana"
                                />
                            </FormField>
                            <FormField label="Existing/Eksisting">
                                <FormControl
                                    v-model="form.tka_eksis"
                                    placeholder="Existing/Eksisting"
                                />
                            </FormField>
                        </div>
                    </FormField>

                    <FormField
                        label="Parent Company (if any)/Induk Perusahaan (jika ada)"
                    >
                        <FormControl
                            v-model="form.induk_perusahaan"
                            placeholder="Parent Company (if any)/Induk Perusahaan (jika ada)"
                        />
                    </FormField>
                    <FormField label="Other Information/Informasi Lain">
                        <FormControl
                            v-model="form.informasi"
                            type="textarea"
                            placeholder="Other Information/Informasi Lain"
                        />
                    </FormField>
                    <FormField
                        label="Business Plan, Project Description/Rencana Bisnis, Deskripsi Proyek "
                    >
                        <FormControl
                            v-model="form.desk_proy"
                            type="textarea"
                            placeholder="Business Plan, Project Description/Rencana Bisnis, Deskripsi Proyek "
                        />
                    </FormField>
                    <FormField label="Obstacle/Kendala  ">
                        <FormControl
                            v-model="form.kendala"
                            type="textarea"
                            placeholder="Obstacle/Kendala  "
                        />
                    </FormField>
                    <FormField label="Required Action/Tindak Lanjut  ">
                        <FormControl
                            v-model="form.tindak_lanjut"
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
                    <div v-if="showSuccessMessage" class="success-message">
                        <span class="success-text"
                            >Form submitted successfully!</span
                        >
                    </div>
                    <div v-if="showValidationErrors" class="validation-errors">
                        <ul>
                            <li
                                v-for="(error, field) in validationErrors"
                                :key="field"
                            >
                                {{ error }}
                            </li>
                        </ul>
                    </div>
                </CardBox>
            </div>
        </div>
    </BodyLanding>
    <FooterLanding />
</template>

<script>
export default {
    data() {
        return {};
    },
    methods: {},
};
</script>
