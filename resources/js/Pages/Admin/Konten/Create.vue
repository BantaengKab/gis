<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3"
import {
  mdiListBoxOutline,
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
  desc: '',
  no_urut:'',
  img: '',
})
</script>

<template>
  <LayoutAuthenticated>
    <Head title="Create konten" />
    <SectionMain>
      <SectionTitleLineWithButton
        :img="mdiListBoxOutline"
        title="Add konten"
        main
      >
        <BaseButton
          :route-name="route('konten.index')"
          :img="mdiArrowLeftBoldOutline"
          label="Back"
          color="white"
          rounded-full
          small
        />
      </SectionTitleLineWithButton>
      <CardBox
        form
        @submit.prevent="form.post(route('konten.store'))"
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
          label="Desc"
          :class="{ 'text-red-400': form.errors.desc }"
        >
          <FormControl
            v-model="form.desc"
            type="textarea"
            placeholder="Enter Deskripsi"
            :error="form.errors.desc"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.desc">
              {{ form.errors.desc }}
            </div>
          </FormControl>
        </FormField>

          <FormField
          label="No Urut"
          :class="{ 'text-red-400': form.errors.no_urut }"
        >
          <FormControl
            v-model="form.no_urut"
            type="number"
            placeholder="Enter NoUrut"
            :error="form.errors.no_urut"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.no_urut">
              {{ form.errors.no_urut }}
            </div>
          </FormControl>
        </FormField>

          <FormField
          label="Gambar"
          :class="{ 'text-red-400': form.errors.img }"
        >
          <FormFilePicker
            v-model="form.img"
          >
            <div class="text-red-400 text-sm" v-if="form.errors.img">
              {{ form.errors.img }}
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
