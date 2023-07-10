<script setup>
import { Head } from '@inertiajs/vue3'
import { computed, ref, onMounted } from 'vue'
import { useMainStore } from '@/Stores/main'
import {
  mdiAccountMultiple,
  mdiCartOutline,
  mdiChartTimelineVariant,
  mdiFinance,
  mdiMonitorCellphone,
  mdiReload,
  mdiGithub,
  mdiChartPie,
  mdiMapMarkerRadius
} from '@mdi/js'
import * as chartConfig from '@/Components/Charts/chart.config.js'
import LineChart from '@/Components/Charts/LineChart.vue'
import SectionMain from '@/Components/SectionMain.vue'
import CardBoxWidget from '@/Components/CardBoxWidget.vue'
import CardBox from '@/Components/CardBox.vue'
import TableSampleClients from '@/Components/TableSampleClients.vue'
import NotificationBar from '@/Components/NotificationBar.vue'
import BaseButton from '@/Components/BaseButton.vue'
import CardBoxTransaction from '@/Components/CardBoxTransaction.vue'
import CardBoxClient from '@/Components/CardBoxClient.vue'
import LayoutAuthenticated from '@/Layouts/LayoutAuthenticated.vue'
import SectionTitleLineWithButton from '@/Components/SectionTitleLineWithButton.vue'
import SectionBannerStarOnGitHub from '@/Components/SectionBannerStarOnGitHub.vue'
const chartData = ref(null)
const fillChartData = () => {
  chartData.value = chartConfig.sampleChartData()
}
onMounted(() => {
  fillChartData()
})
const mainStore = useMainStore()

const props = defineProps({
  investor: {
    type: Object,
    default: () => ({}),
  },
  peluang: {
    type: Object,
    default: () => ({}),
  },
  rencana: {
    type: Object,
    default: () => ({}),
  }
  realisasi: {
    type: Object,
    default: () => ({}),
  }
})

/* Fetch sample data */
mainStore.fetch('clients')
mainStore.fetch('history')

const clientBarItems = computed(() => mainStore.clients.slice(0, 4))
const transactionBarItems = computed(() => mainStore.history)
</script>

<template>
    <LayoutAuthenticated>
        <Head title="Dashboard" />
        <SectionMain>
            <SectionTitleLineWithButton
                :icon="mdiChartTimelineVariant"
                title="Overview"
                main
            >
            </SectionTitleLineWithButton>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
                <CardBoxWidget
                    color="text-blue-500"
                    :icon="mdiChartTimelineVariant"
                    :number="investasi"
                    prefix="Rp."
                    label="Rencana Investasi"
                />
                <CardBoxWidget
                    color="text-blue-500"
                    :icon="mdiChartTimelineVariant"
                    :number="investasi"
                    prefix="Rp."
                    label="Realisasi Investasi"
                />
                <CardBoxWidget
                    color="text-red-500"
                    :icon="mdiMapMarkerRadius"
                    :number="peluang"
                    suffix=" Titik"
                    label="Marker/Peluang"
                />
                <CardBoxWidget
                    color="text-emerald-500"
                    :icon="mdiAccountMultiple"
                    :number="investor"
                    label="Investor"
                />
            </div>
        </SectionMain>
    </LayoutAuthenticated>
</template>
