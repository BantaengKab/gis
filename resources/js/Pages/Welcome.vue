<script setup>
import { Head, Link } from "@inertiajs/vue3";
import BaseIcon from "@/Components/BaseIcon.vue";
import { mdiEmailOutline, mdiWhatsapp } from "@mdi/js";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="GIS" />

    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-4 px-10"
        >
            <a href="https://flowbite.com/" class="flex items-center">
                <img
                    src="../../../public/assets/logo.png"
                    class="h-10 mr-2"
                    alt=""
                />
            </a>
            <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-6 h-6"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <li>
                        <a
                            href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-red-500 rounded md:bg-transparent md:text-red-500 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page"
                            >Beranda</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            >Peluang Investasi</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            >Peta Potensi Investasi</a
                        >
                    </li>
                    <li>
                        <a
                            href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-red-500 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            >Form Minat Investasi</a
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div
        class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-white dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div class="max-w-7xl p-6 lg:p-8">
            <div class="mt-0 sm:mt-16">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                    <div class="pt-10">
                        <h1 class="font-bold text-8xl/[80px]">
                            Peta Potensi & Peluang
                        </h1>
                        <div class="inline-flex items-center pt-10 sm:pt-0">
                            <h1
                                class="sm:text-3xl/[70px] text-xl/[30px] font-medium"
                            >
                                KOTA BANTAENG
                            </h1>
                        </div>
                        <p class="pt-8 text-xl/[30px]">
                            Yuk, jadilah bagian dari kesuksesan masa depan!
                            Investasikan dana Anda dan dapatkan keuntungan yang
                            berkelanjutan.
                            <button  @click="filterMarker('730305');">industri</button>
                            <button  @click="filterMarker('7303021002');">kesehatan</button>
                        </p>
                    </div>
                    <div class="pt-24 sm:pt-5">
                        <img
                            src="../../../public/assets/asset1.png"
                            class="w-full"
                            alt=""
                        />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-5 gap-6 lg:gap-8" >
                    <div class="pt-20 col-span-6">
                        <div class="rounded-lg" id="mapContainer" />
                    </div>
                   <!-- <div class="pt-20 col-span-1">
                        <h5 class="font-semibold pb-3">Kecamatan</h5>
                        <div class="p-4 rounded-lg bg-gray-100">
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded bg-red-500"></div>
                                <div
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Kecamatan A
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded bg-green-500"></div>
                                <div
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Kecamatan B
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 rounded bg-blue-500"></div>
                                <div
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                >
                                    Kecamatan C
                                </div>
                            </div>
                        </div>
                        <h5 class="font-semibold pt-10 pb-3">Marker</h5>
                        <div class="p-4 rounded-lg bg-gray-100">
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-1"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Fasilitas Kesehatan</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-2"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    for="default-radio-2"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Sarana Pendidikan</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-3"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    for="default-radio-3"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Bank</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-4"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    for="default-radio-4"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Hotel</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-5"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    for="default-radio-5"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Industri</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-6"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    for="default-radio-6"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >UMKM</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-7"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-1"
                                />
                                <label
                                    for="default-radio-7"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Kuliner</label
                                >
                            </div>
                            <div class="flex items-center">
                                <input
                                    checked
                                    id="default-radio-8"
                                    type="radio"
                                    value=""
                                    name="default-radio"
                                    class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 focus:ring-2"
                                />
                                <label
                                    for="default-radio-8"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Sarana Agama</label
                                >
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 mt-16 sm:justify-center sm:items-center">
        <div class="max-w-7xl p-6 lg:p-8 mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-4 gap-6 lg:gap-8">
                <div class="sm:col-span-2 pr-10">
                    <div class="inline-flex items-center">
                        <img
                            src="../../../public/assets/logo.png"
                            class="h-10 mr-2"
                            alt=""
                        />
                    </div>
                    <p class="pt-3">
                        Jl. Sukamulia No.21, Tamamaung, Kec. Panakkukang, Kota
                        Makassar, Sulawesi Selatan 90231
                    </p>
                    <p class="pt-3 text-red-600">
                        © 2023 Gala Patta Creation All rights reserved.
                    </p>
                </div>
                <div class="sm:col-span-1">
                    <h1 class="text-xl font-medium">Kontak Kami</h1>
                    <div class="inline-flex items-center pt-3">
                        <BaseIcon :path="mdiWhatsapp" w="w-4" class="mr-3" />
                        <p class="">+62 813-4264-0000</p>
                    </div>
                    <div class="inline-flex items-center pt-3">
                        <BaseIcon
                            :path="mdiEmailOutline"
                            w="w-4"
                            class="mr-3"
                        />
                        <p class="">Gala@gmail.com</p>
                    </div>
                </div>
                <div class="sm:col-span-1">
                    <h1 class="text-xl font-medium">Lainnya</h1>
                    <p class="pt-3">Kebijakan Privasi</p>
                    <p class="pt-3">Syarat & Ketentuan</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import axios from 'axios';


export default {
    name: "LeafletMap",
    data() {
        return {
            map: null,
             markerGroups: {},
        };
    },
    mounted() {
       
        
        this.intializeMap();
        
     
    },
    onBeforeUnmount() {
        if (this.map) {
            this.map.remove();
        }
    },
    methods: {

    intializeMap(){
         const self = this;

        //Basemaps
        var osm = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
            attribution:
                '&copy; 2023 Gala Patta Creation All rights reserved.',
        });
        var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });
        var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });

        this.map = L.map('mapContainer', {
            center: [-5.471, 119.978],
            zoom: 12,
            layers:[googleSat]
        });

         //layercontrol
        var baseMaps = {
            "OpenStreetMap": osm,
            "Streets": googleStreets,
            "Hybrid" : googleHybrid,
            "Satelite" : googleSat
        };
        var overlayMaps = {};
        var layerControl = L.control.layers(baseMaps, overlayMaps, { collapsed: false }).addTo(this.map);


        //Legend
        var legendHtml = '<br><hr/><strong>Keterangan:</strong><br>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#7FFFD4;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bisappu</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#FF6347;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pajukukang</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#D2691E;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gantarangkeke</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded" style="background-color:#90EE90;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinoa</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#FFA07A;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bantaeng</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#FFA500;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Eremerasa</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#DB7093;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tompobulu</div>' +
            '</div>' +
            '<div class="flex items-center"> ' +
            '<div class="w-4 h-4 rounded " style="background-color:#B0E0E6;"></div>' +
            '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Uluere</div>' +
            '</div>';

        // Tambahkan custom HTML legend ke dalam elemen dengan id "legend-container"
        var legendContainer = L.DomUtil.create('div', 'legend');
        legendContainer.innerHTML = legendHtml;
        layerControl.getContainer().appendChild(legendContainer);

        

         //Geojson 
        fetch('assets/batas_wilayah_kecamatan.geojson')
            .then(function (response) {
                return response.json(); 
            }).then(function (data) {
                L.geoJSON(data, {
                    style: function (feature) {
                        return {color: feature.properties.color};
                    }
                }).bindPopup(function (layer) {
                    return layer.feature.properties.nama;
                }).addTo(self.map); 
            }).catch(function(error) {
                console.error('Error:', error);
            });


       
        
        //Marker
        var markerIcons = {};

        axios.get('/markers')
        .then(response => {
            const markers = response.data;
            
            // Loop melalui data marker dan tambahkan marker ke peta
            markers.forEach(marker => {
            //IconMarker
            var defaulticon = L.icon({
                iconUrl: "/icon/" + marker.sektor.icon,
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41],
            });
            var markerLayer = L.marker([marker.lat, marker.long], { icon: defaulticon, wilayah: marker.wilayah_id }).bindPopup(marker.nama);

            // Cek apakah layer group sudah ada atau belum
            if (!self.markerGroups.hasOwnProperty(marker.sektor.nama)) {
                // Jika belum ada, buat layer group baru dan tambahkan ke objek markerGroups
                self.markerGroups[marker.sektor.nama] = L.layerGroup();
                // Simpan ikon dalam objek markerIcons
                markerIcons[marker.sektor.nama] = marker.sektor.icon;
            }

            // Tambahkan marker ke layer group yang sesuai
            self.markerGroups[marker.sektor.nama].addLayer(markerLayer);
            });

            // Tambahkan layer group ke dalam layer control
            for (var groupName in self.markerGroups) {
            var icon = markerIcons[groupName];
            var iconHtml = '<span style="display: inline-flex; align-items: center;"><img src="/icon/' + icon + '" width="20px" height="20px" alt="">' + groupName +'</span>';
            layerControl.addOverlay(self.markerGroups[groupName], iconHtml);
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });

    },

    filterMarker(wilayahId) {
      for (var groupName in this.markerGroups) {
        var markerGroup = this.markerGroups[groupName];
        var layers = markerGroup.getLayers();

        
            layers.forEach(layer => {
                if (layer.options.wilayah === wilayahId && this.map.hasLayer(markerGroup)) {
                    this.map.addLayer(layer);
                } else {
                    this.map.removeLayer(layer);
                }
            });
      }
    },

    reloadMap() {
      this.map.remove();
      this.initializeMap();
    }

    
  }
    
};
</script>

<style scoped>
#mapContainer {
    height: 700px;
}
</style>
