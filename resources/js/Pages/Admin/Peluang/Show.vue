<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiMapMarkerRadius,
  mdiArrowLeftBoldOutline,
} from "@mdi/js"
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue"
import SectionMain from "@/Components/SectionMain.vue"
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue"
import CardBox from "@/Components/CardBox.vue"
import BaseButton from "@/Components/BaseButton.vue"

const props = defineProps({
  peluang: {
    type: Object,
    default: () => ({}),
  },
  sektor: {
    type: Object,
    default: () => ({}),
  },
  wilayah: {
    type: Object,
    default: () => ({}),
  },
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="View Marker" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiMapMarkerRadius"
        title="View Marker"
        main
      >
        <BaseButton
          :route-name="route('peluang.index')"
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
                Wilayah
              </td>
              <td data-label="wilayah">
                {{ wilayah.nama }}
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
                Nama
              </td>
              <td data-label="Nama">
                {{ peluang.nama }}
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
                Alamat
              </td>
              <td data-label="Alamat">
                {{ peluang.alamat }}
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
                Latitude
              </td>
              <td data-label="lat">
                {{ peluang.lat }}
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
                Longitude
              </td>
              <td data-label="long">
                {{ peluang.long }}
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
                {{ new Date(peluang.created_at).toLocaleString() }}
              </td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>
