<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiSignText,
  mdiArrowLeftBoldOutline
} from "@mdi/js"
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue"
import SectionMain from "@/Components/SectionMain.vue"
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue"
import CardBox from "@/Components/CardBox.vue"
import FormField from '@/Components/FormField.vue'
import FormControl from '@/Components/FormControl.vue'
import FormFilePicker from '@/Components/FormFilePicker.vue'
import BaseButton from '@/Components/BaseButton.vue'
import BaseButtons from '@/Components/BaseButtons.vue'

const form = useForm({
  nama: '',
  icon: '',
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="Create sektor" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiSignText"
        title="Add sektor"
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
      <CardBox
        form
        @submit.prevent="form.post(route('sektor.store'))"
      >
        <FormField
          label="Name"
          :class="{ 'text-red-400': form.errors.nama }"
        >
          <FormControl
            v-model="form.nama"
            type="text"
            placeholder="Enter Nama"
            :error="form.errors.nama"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.nama">
              {{ form.errors.nama }}
            </div>
          </FormControl>
        </FormField>

          <FormField
          label="Icon Untuk Marker"
          :class="{ 'text-red-400': form.errors.icon }"
        >
          <FormFilePicker
            v-model="form.icon"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.icon">
              {{ form.errors.icon }}
            </div>
          </FormFilePicker>
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
