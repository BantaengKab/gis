<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiFinance,
  mdiArrowLeftBoldOutline,
} from "@mdi/js"
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue"
import SectionMain from "@/Components/SectionMain.vue"
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue"
import CardBox from "@/Components/CardBox.vue"
import BaseButton from "@/Components/BaseButton.vue"
import moment from 'moment';

const props = defineProps({
  investasi: {
    type: Object,
    default: () => ({}),
  },
  sektor: {
    type: Object,
    default: () => ({}),
  },
  investor: {
    type: Object,
    default: () => ({}),
  },
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="View Investasi" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiFinance"
        title="View Investasi"
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
      <CardBox class="mb-6">
        <table>
          <tbody>

            <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Sektor
              </td>
              <td data-label="sektor">
                {{ sektor.nama }}
              </td>
            </tr>

             <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Investor
              </td>
              <td data-label="investor">
                {{ investor.nama }}
              </td>
            </tr>

            <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Rencana
              </td>
              <td data-label="Rencana">
                {{ investasi.rencana }}
              </td>
            </tr>

             <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Realisasi
              </td>
              <td data-label="Realisasi">
                {{ investasi.realisasi }}
              </td>
            </tr>

             <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Tanggal Di Rencanakan
              </td>
              <td data-label="Tglrencana">
                {{ moment(investasi.tgl_rencana).format('DD/MM/YYYY') }}
              </td>
            </tr>

             <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Tanggal Di Realisasikan
              </td>
              <td data-label="Tglrealisasi">
                {{ moment(investasi.tgl_realisasi).format('DD/MM/YYYY') }}
              </td>
            </tr>


            <tr>
              <td
                class="
                  p-4
                  pl-8
                  text-slate-500
                  dark:text-slate-400
                  hidden
                  lg:block
                "
              >
                Created
              </td>
              <td data-label="Created">
                {{ new Date(investasi.created_at).toLocaleString() }}
              </td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
