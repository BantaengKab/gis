<script setup>
import { computed } from 'vue'
import { containerMaxW } from '@/config.js';
import BaseLevel from '@/Components/BaseLevel.vue'
import JustboilLogo from '@/Components/JustboilLogo.vue'

const year = computed(() => new Date().getFullYear())
</script>

<template>
  <footer class="py-2 px-6">
    <BaseLevel :class="containerMaxW">
      <div class="text-center md:text-left">
        <b>&copy;{{ year }}, <a
          href="https://investasi.bantaengkab.go.id/"
          target="_blank"
        >investasi.bantaengkab.go.id</a>.</b>
       
      </div>
      <div class="md:py-2">
       <div class="inline-flex items-center">
                        <img
                            src="../../../../public/assets/logo.png"
                            class="h-10 mr-2"
                            alt=""
                        />
                    </div>
      </div>
    </BaseLevel>
  </footer>
</template>
