<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiMapMarkerRadius,
  mdiArrowLeftBoldOutline
} from "@mdi/js"
import LayoutAuthenticated from "@/Layouts/LayoutAuthenticated.vue"
import SectionMain from "@/Components/SectionMain.vue"
import SectionTitleLineWithButton from "@/Components/SectionTitleLineWithButton.vue"
import CardBox from "@/Components/CardBox.vue"
import FormField from '@/Components/FormField.vue'
import FormControl from '@/Components/FormControl.vue'
import BaseButton from '@/Components/BaseButton.vue'
import BaseButtons from '@/Components/BaseButtons.vue'

const props = defineProps({

  sektor: {
    type: Object,
    default: () => ({}),
  },
})

const form = useForm({
  nama: '',
  alamat: '',
  lat: '',
  long: '',
  sektor_id: '',
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="Create Peluang" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiMapMarkerRadius"
        title="Add Peluang"
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
      <CardBox
        form
        @submit.prevent="form.post(route('peluang.store'))"
      >
       <FormField
          label="Sektor"
          :class="{ 'text-red-400': form.errors.sektor_id }"
        >
       <FormControl
            v-model="form.sektor_id"
            type="select"
            placeholder="Pilih Sektor"
            :error="form.errors.sektor_id"
            :options="sektor"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.sektor_id">
              {{ form.errors.sektor_id }}
            </div>
            
          </FormControl>
           </FormField>

        <FormField
          label="Nama"
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
          label="Alamat"
          :class="{ 'text-red-400': form.errors.alamat }"
        >
          <FormControl
            v-model="form.alamat"
            type="text"
            placeholder="Enter Alamat"
            :error="form.errors.alamat"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.alamat">
              {{ form.errors.alamat }}
            </div>
          </FormControl>
        </FormField>

        <FormField
          label="Latitude"
          :class="{ 'text-red-400': form.errors.lat }"
        >
          <FormControl
            v-model="form.lat"
            type="text"
            placeholder="Enter Latitude"
            :error="form.errors.lat"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.lat">
              {{ form.errors.lat }}
            </div>
          </FormControl>
        </FormField>

         <FormField
          label="Longitude"
          :class="{ 'text-red-400': form.errors.long }"
        >
          <FormControl
            v-model="form.long"
            type="text"
            placeholder="Enter Longitude"
            :error="form.errors.long"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.long">
              {{ form.errors.long }}
            </div>
          </FormControl>
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
