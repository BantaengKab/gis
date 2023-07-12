<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import { mdiAccountCash, mdiArrowLeftBoldOutline } from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import CardBox from "@/Components/CardBox.vue";
import BaseButton from "@/Components/BaseButton.vue";

const props = defineProps({
    forminvestasi: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <LayoutAuthenticated>
        <Head title="View Investor" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiAccountCash"
                title="View Investor"
                main
            >
                <BaseButton
                    :route-name="route('forminvestasi.index')"
                    :icon="mdiArrowLeftBoldOutline"
                    label="Back"
                    color="white"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>
            <CardBox class="mb-6">
                <table>
                    <tbody>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tanggal Pertemuan
                            </td>
                            <td data-label="Tgl Pertemuan">
                                {{ forminvestasi.tgl_pertemuan }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Lokasi Investasi
                            </td>
                            <td data-label="Lokasi">
                                {{ forminvestasi.lokasi }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Nama Lengkap
                            </td>
                            <td data-label="Nama">{{ forminvestasi.nama }}</td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Jabatan
                            </td>
                            <td data-label="Jabatan">
                                {{ forminvestasi.jabatan }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                No.Telp
                            </td>
                            <td data-label="No Telp">
                                {{ forminvestasi.no_telp }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Email
                            </td>
                            <td data-label="Email">
                                {{ forminvestasi.email }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Alamat Perusahaan
                            </td>
                            <td data-label="Alamat">
                                {{ forminvestasi.alamat }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Deskripsi Usaha
                            </td>
                            <td data-label="Deskripsi Usaha">
                                {{ forminvestasi.desk_usaha }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Perusahaan
                            </td>
                            <td data-label="Perusahaan">
                                {{ forminvestasi.perusahaan }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Bidang Usaha
                            </td>
                            <td data-label="Bidang Usaha">
                                {{ forminvestasi.bidang_usaha }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Pref Lokasi
                            </td>
                            <td data-label="Pref Lokasi">
                                {{ forminvestasi.pref_lokasi }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Negara
                            </td>
                            <td data-label="Negara">
                                {{ forminvestasi.negara }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Status Investasi
                            </td>
                            <td data-label="Stat Inves">
                                {{ forminvestasi.stat_inves }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Nilai Investasi
                            </td>
                            <td data-label="Nilai Invest">
                                {{ forminvestasi.nilai_invest }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Mata Uang
                            </td>
                            <td data-label="Mata Uang">
                                {{ forminvestasi.mata_uang }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tki Total
                            </td>
                            <td data-label="Tki Tot">
                                {{ forminvestasi.tki_tot }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tki Rencana
                            </td>
                            <td data-label="Tki Rencana">
                                {{ forminvestasi.tki_rencana }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tki Eksisting
                            </td>
                            <td data-label="Tki Eksis">
                                {{ forminvestasi.tki_eksis }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tka Total
                            </td>
                            <td data-label="Tka Tot">
                                {{ forminvestasi.tka_tot }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tka Rencana
                            </td>
                            <td data-label="Tka Rencana">
                                {{ forminvestasi.tka_rencana }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tka Eksisting
                            </td>
                            <td data-label="Tka Eksis">
                                {{ forminvestasi.tka_eksis }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Induk Perusahaan
                            </td>
                            <td data-label="Induk Perusahaan">
                                {{ forminvestasi.induk_perusahaan }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Informasi lain
                            </td>
                            <td data-label="Informasi">
                                {{ forminvestasi.informasi }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Deskripsi Proyek
                            </td>
                            <td data-label="Deskripsi Proyek">
                                {{ forminvestasi.desk_proy }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Kendala
                            </td>
                            <td data-label="Kendala">
                                {{ forminvestasi.kendala }}
                            </td>
                        </tr>
                        <tr>
                            <td
                                class="p-4 pl-8 text-slate-500 dark:text-slate-400 hidden lg:block"
                            >
                                Tindak Lanjut
                            </td>
                            <td data-label="Tindak Lanjut">
                                {{ forminvestasi.tindak_lanjut }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
