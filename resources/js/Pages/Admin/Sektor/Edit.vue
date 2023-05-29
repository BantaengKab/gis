<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiAccountKey,
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
  permission: {
    type: Object,
    default: () => ({}),
  },
})

const form = useForm({
  _method: 'put',
  nama: props.permission.nama,
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="Update sektor" />
    <SectionMain>
      <SectionTitleLineWithButton
        :icon="mdiAccountKey"
        title="Update sektor"
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
        @submit.prevent="form.post(route('sektor.update', props.sektor.id))"
      >
        <FormField
          label="Nama"
          :class="{ 'text-red-400': form.errors.nama }"
        >
          <FormControl
            v-model="form.nama"
            type="text"
            placeholder="Enter Name"
            :error="form.errors.nama"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.nama">
              {{ form.errors.nama }}
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
