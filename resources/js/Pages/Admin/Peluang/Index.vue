<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import {
    mdiPlus,
    mdiSquareEditOutline,
    mdiTrashCan,
    mdiAlertBoxOutline,
    mdiMapMarkerRadius,
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
    peluangs: {
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
        formDelete.delete(route("peluang.destroy", id));
    }
}
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Marker" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiMapMarkerRadius"
                title="Marker"
                main
            >
                <BaseButton
                    v-if="can.create"
                    :route-name="route('peluang.create')"
                    :icon="mdiPlus"
                    label="Add"
                    color="info"
                    rounded-full
                    small
                />
            </SectionTitleLineWithButton>
            <NotificationBar
                v-if="$page.props.flash.message"
                color="success"
                :icon="mdiAlertBoxOutline"
            >
                {{ $page.props.flash.message }}
            </NotificationBar>
            <CardBox class="mb-6" has-table>
                <form @submit.prevent="form.get(route('peluang.index'))">
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
                                <Sort label="NIB" attribute="nib" />
                            </th>
                            <th>
                                <Sort label="Nama" attribute="nama" />
                            </th>
                            <th>
                                <Sort label="Alamat" attribute="alamat" />
                            </th>
                            <th>
                                <Sort label="Latitude" attribute="lat" />
                            </th>
                            <th>
                                <Sort label="Longitude" attribute="long" />
                            </th>
                            <th v-if="can.edit || can.delete">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="peluang in peluangs.data" :key="peluang.id">
                            <td data-label="NIB">
                                {{ peluang.nib }}
                            </td>
                            <td data-label="Nama">
                                <Link
                                    :href="route('peluang.show', peluang.id)"
                                    class="no-underline hover:underline text-cyan-600 dark:text-cyan-400"
                                >
                                    {{ peluang.nama }}
                                </Link>
                            </td>
                            <td data-label="Alamat">
                                {{ peluang.alamat }}
                            </td>
                            <td data-label="Latitude">
                                {{ peluang.lat }}
                            </td>
                            <td data-label="Longitude">
                                {{ peluang.long }}
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
                                        v-if="can.edit"
                                        :route-name="
                                            route('peluang.edit', peluang.id)
                                        "
                                        color="info"
                                        :icon="mdiSquareEditOutline"
                                        small
                                    />
                                    <BaseButton
                                        v-if="can.delete"
                                        color="danger"
                                        :icon="mdiTrashCan"
                                        small
                                        @click="destroy(peluang.id)"
                                    />
                                </BaseButtons>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="py-4">
                    <Pagination :data="peluangs" />
                </div>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
