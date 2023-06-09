<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiSignText,
  mdiArrowLeftBoldOutline,
} from "@mdi/js"
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue"
import SectionMain from "@/Components/SectionMain.vue"
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue"
import CardBox from "@/Components/CardBox.vue"
import BaseButton from "@/Components/BaseButton.vue"

const props = defineProps({
  sektor: {
    type: Object,
    default: () => ({}),
  },
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="View sektor" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiSignText"
        title="View sektor"
        main
      >
        <BaseButton
          :route-name="route('sektor.index')"
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
                Nama
              </td>
              <td data-label="Nama">
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
                Icon
              </td>
              <td data-label="Icon">
                 <img :src="getImageUrl(sektor.icon)" class="h-10 mr-2" alt="">
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
                {{ new Date(sektor.created_at).toLocaleString() }}
              </td>
            </tr>
          </tbody>
        </table>
      </CardBox>
    </SectionMain>
  </LayoutAuthenticated>
</template>

<script>
export default {
  methods: {
    getImageUrl(filename) {
      return "/icon/" + filename;
    },
  },
};
</script>
