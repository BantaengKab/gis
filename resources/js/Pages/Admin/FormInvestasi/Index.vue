<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import {
    mdiPlus,
    mdiSquareEditOutline,
    mdiTrashCan,
    mdiAlertBoxOutline,
    mdiAccountCash,
} from "@mdi/js";
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue";
import SectionMain from "@/Components/SectionMain.vue";
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue";
import BaseButton from "@/Components/BaseButton.vue";
import CardBox from "@/Components/CardBox.vue";
import BaseButtons from "@/Components/BaseButtons.vue";
import NotificationBar from "@/Components/NotificationBar.vue";
import Pagination from "@/Components/Admin/Pagination.vue";
import Sort from "@/Components/Admin/Sort.vue";

const props = defineProps({
    forminvestasis: {
        type: Object,
        default: () => ({}),
    },
    filters: {
        type: Object,
        default: () => ({}),
    },
    can: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    search: props.filters.search,
});

const formDelete = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to delete?")) {
        formDelete.delete(route("forminvestasi.destroy", id));
    }
}
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Formulir Investasi" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiAccountCash"
                title="Formulir Investasi"
                main
            >
            </SectionTitleLineWithButton>
            <NotificationBar
                v-if="$page.props.flash.message"
                color="success"
                :icon="mdiAlertBoxOutline"
            >
                {{ $page.props.flash.message }}
            </NotificationBar>
            <CardBox class="mb-6" has-table>
                <form @submit.prevent="form.get(route('forminvestasi.index'))">
                    <div class="py-2 flex">
                        <div class="flex pl-4">
                            <input
                                type="search"
                                v-model="form.search"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Search"
                            />
                            <BaseButton
                                label="Search"
                                type="submit"
                                color="info"
                                class="ml-4 inline-flex items-center px-4 py-2"
                            />
                        </div>
                    </div>
                </form>
            </CardBox>
            <CardBox class="mb-6" has-table>
                <table>
                    <thead>
                        <tr>
                            <th>
                                <Sort
                                    label="Tanggal Pertemuan"
                                    attribute="tgl_pertemuan"
                                />
                            </th>
                            <th>
                                <Sort label="Lokasi" attribute="lokasi" />
                            </th>
                            <th>
                                <Sort label="Nama" attribute="nama" />
                            </th>
                            <th>
                                <Sort
                                    label="Perusahaan"
                                    attribute="perusahaan"
                                />
                            </th>
                            <th>
                                <Sort
                                    label="Bidang Usaha"
                                    attribute="bidang_usaha"
                                />
                            </th>
                            <th>
                                <Sort
                                    label="Nilai Invest"
                                    attribute="nilai_invest"
                                />
                            </th>
                            <th>
                                <Sort label="Mata Uang" attribute="mata_uang" />
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr
                            v-for="forminvestasi in forminvestasis.data"
                            :key="forminvestasi.id"
                        >
                            <td data-label="Tgl Pertemuan">
                                <Link
                                    :href="
                                        route(
                                            'forminvestasi.show',
                                            forminvestasi.id
                                        )
                                    "
                                    class="no-underline hover:underline text-cyan-600 dark:text-cyan-400"
                                >
                                    {{ forminvestasi.tgl_pertemuan }}
                                </Link>
                            </td>
                            <td data-label="Lokasi">
                                {{ forminvestasi.lokasi }}
                            </td>
                            <td data-label="Nama">
                                {{ forminvestasi.nama }}
                            </td>
                            <td data-label="Perusahaan">
                                {{ forminvestasi.perusahaan }}
                            </td>
                            <td data-label="Bidang Usaha">
                                {{ forminvestasi.bidang_usaha }}
                            </td>
                            <td data-label="Nilai Invest">
                                {{ forminvestasi.nilai_invest }}
                            </td>
                            <td data-label="Mata Uang">
                                {% if forminvestasi.mata_uang == "1" %} US
                                Dollar($) {% else %} IDR(Rp.) {% endif %}
                            </td>
                            <td
                                v-if="can.edit || can.delete"
                                class="before:hidden lg:w-1 whitespace-nowrap"
                            >
                                <BaseButtons
                                    type="justify-start lg:justify-end"
                                    no-wrap
                                >
                                    <BaseButton
                                        v-if="can.delete"
                                        color="danger"
                                        :icon="mdiTrashCan"
                                        small
                                        @click="destroy(forminvestasi.id)"
                                    />
                                </BaseButtons>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="py-4">
                    <Pagination :data="forminvestasis" />
                </div>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
