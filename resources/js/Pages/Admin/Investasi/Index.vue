<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import {
    mdiPlus,
    mdiSquareEditOutline,
    mdiTrashCan,
    mdiAlertBoxOutline,
    mdiFinance,
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
    investasis: {
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
        formDelete.delete(route("investasi.destroy", id));
    }
}
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Investasi" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiFinance"
                title="Investasi"
                main
            >
                <BaseButton
                    v-if="can.create"
                    :route-name="route('investasi.create')"
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
                <form @submit.prevent="form.get(route('investasi.index'))">
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
                                <Sort label="Investor" attribute="investor" />
                            </th>
                            <th>
                                <Sort label="Lokasi" attribute="lokasi" />
                            </th>
                            <th>
                                <Sort
                                    label="Rencana(Rp.)"
                                    attribute="rencana"
                                />
                            </th>
                            <th>
                                <Sort
                                    label="Realisasi(Rp.)"
                                    attribute="realisasi"
                                />
                            </th>
                            <th v-if="can.edit || can.delete">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr
                            v-for="investasi in investasis.data"
                            :key="investasi.id"
                        >
                            <td data-label="Investor">
                                <Link
                                    :href="
                                        route(
                                            'investor.show',
                                            investasi.investor_id
                                        )
                                    "
                                    class="no-underline hover:underline text-cyan-600 dark:text-cyan-400"
                                >
                                    {{ investasi.investor.nama }}
                                </Link>
                            </td>
                            <td data-label="Lokasi">
                                {{ investasi.wilayah.nama }}
                            </td>
                            <td data-label="Rencana">
                                <Link
                                    :href="
                                        route('investasi.show', investasi.id)
                                    "
                                    class="no-underline hover:underline text-cyan-600 dark:text-cyan-400"
                                >
                                    {{
                                        investasi.rencana.toLocaleString(
                                            undefined,
                                            {
                                                style: "currency",
                                                currency: "IDR",
                                            }
                                        )
                                    }}
                                </Link>
                            </td>
                            <td data-label="Realisasi">
                                <Link
                                    :href="
                                        route('investasi.show', investasi.id)
                                    "
                                    class="no-underline hover:underline text-cyan-600 dark:text-cyan-400"
                                >
                                    {{
                                        investasi.realisasi.toLocaleString(
                                            undefined,
                                            {
                                                style: "currency",
                                                currency: "IDR",
                                            }
                                        )
                                    }}
                                </Link>
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
                                            route(
                                                'investasi.edit',
                                                investasi.id
                                            )
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
                                        @click="destroy(investasi.id)"
                                    />
                                </BaseButtons>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="py-4">
                    <Pagination :data="investasis" />
                </div>
            </CardBox>
        </SectionMain>
    </LayoutAuthenticated>
</template>
