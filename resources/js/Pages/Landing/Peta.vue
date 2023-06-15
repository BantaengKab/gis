<script setup>
import HeadBanner from "../../Components/Landing/HeadBanner.vue";
import BodyLanding from "../../Components/Landing/Body.vue";
import { Head, Link } from "@inertiajs/vue3";
import { reactive, ref } from "vue";
import NavbarLanding from "../../Components/Landing/NavbarLanding.vue";
import FooterLanding from "../../Components/Landing/FooterLanding.vue";
import FormField from "@/Components/FormField.vue";
import FormControl from "@/Components/FormControl.vue";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const selectKec = [
    { id: 1, label: "Business development" },
    { id: 2, label: "Marketing" },
    { id: 3, label: "Sales" },
];
const selectKel = [
    { id: 1, label: "Business development" },
    { id: 2, label: "Marketing" },
    { id: 3, label: "Sales" },
];

const form = reactive({
    kec: selectKec[0],
    kel: selectKel[0],
});
</script>

<template>
    <Head title="GIS" />
    <NavbarLanding />
    <BodyLanding>
        <HeadBanner :showBtn="false" />

        <div class="grid pt-20 grid-cols-6 gap-6 lg:gap-8">
            <div class="col-span-2">
                <FormControl
                    v-model="form.kec"
                    :options="selectKec"
                    placeholder="Pilih Kecamatan"
                />
            </div>
            <div class="col-span-2">
                <FormControl
                    v-model="form.kel"
                    :options="selectKel"
                    placeholder="Pilih Kelurahan"
                />
            </div>
            <div class="col-span-1">
                <button
                    @click="filterMarker()"
                    class="font-normal bg-green-600 text-white py-2.5 px-10 rounded-md inline text-xl/[30px]"
                >
                    Tampilkan
                </button>
            </div>
            <div class="col-span-1">
                <button
                    @click="reloadMap()"
                    class="font-normal bg-red-600 text-white py-2.5 px-10 rounded-md inline text-xl/[30px]"
                >
                    Atur Ulang
                </button>
            </div>
        </div>
        <div class="grid grid-cols-3 md:grid-cols-5 gap-6 lg:gap-8">
            <div class="pt-4 col-span-6">
                <!-- <div>
                    <select v-model="selectedParent" @change="loadChildOptions">
                        <option value="">Pilih Kecamatan</option>
                        <option
                            v-for="parent in parents"
                            :value="parent.kd_wilayah"
                            :key="parent.kd_wilayah"
                        >
                            {{ parent.nama }}
                        </option>
                    </select>
                    <select v-model="selectedChild">
                        <option value="">Pilih Kelurahan</option>
                        <option
                            v-for="child in children"
                            :value="child.kd_wilayah"
                            :key="child.kd_wilayah"
                        >
                            {{ child.nama }}
                        </option>
                    </select>

                    <button
                        @click="filterMarker()"
                        class="font-normal bg-green-600 text-white py-2 px-10 rounded-md inline text-xl/[30px]"
                    >
                        Tampilkan
                    </button>
                    <button
                        @click="reloadMap()"
                        class="font-normal bg-red-600 text-white py-2 px-10 rounded-md inline text-xl/[30px]"
                    >
                        Atur Ulang
                    </button>
                </div> -->

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
    </BodyLanding>
    <FooterLanding />
</template>

<script>
import "leaflet/dist/leaflet.css";
import L from "leaflet";
import axios from "axios";

export default {
    name: "LeafletMap",
    data() {
        return {
            map: null,
            markerGroups: {},
            markerIcons: {},
            parents: [],
            children: [],
            selectedParent: "",
            selectedChild: "",
        };
    },
    mounted() {
        this.initializeMap();
        this.loadParentOptions();
    },
    onBeforeUnmount() {
        if (this.map) {
            this.map.remove();
        }
    },
    methods: {
        initializeMap() {
            const self = this;

            //Basemaps
            var osm = L.tileLayer("https://{s}.tile.osm.org/{z}/{x}/{y}.png", {
                attribution:
                    "&copy; 2023 Gala Patta Creation All rights reserved.",
            });
            var googleStreets = L.tileLayer(
                "https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}",
                {
                    maxZoom: 20,
                    maxNativeZoom: 20,
                    subdomains: ["mt0", "mt1", "mt2", "mt3"],
                }
            );
            var googleHybrid = L.tileLayer(
                "https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}",
                {
                    maxZoom: 20,
                    maxNativeZoom: 20,
                    subdomains: ["mt0", "mt1", "mt2", "mt3"],
                }
            );
            var googleSat = L.tileLayer(
                "https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}",
                {
                    maxZoom: 20,
                    maxNativeZoom: 20,
                    subdomains: ["mt0", "mt1", "mt2", "mt3"],
                }
            );

            this.map = L.map("mapContainer", {
                layers: [googleSat],
            }).setView([-5.471, 119.978], 12);

            //layercontrol
            var baseMaps = {
                OpenStreetMap: osm,
                Streets: googleStreets,
                Hybrid: googleHybrid,
                Satelite: googleSat,
            };
            var overlayMaps = {};
            var layerControl = L.control
                .layers(baseMaps, overlayMaps, { collapsed: false })
                .addTo(this.map);

            //Legend
            var legendHtml =
                "<br><hr/><strong>Keterangan:</strong><br>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#7FFFD4;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bisappu</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#FF6347;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pajukukang</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#D2691E;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gantarangkeke</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded" style="background-color:#90EE90;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sinoa</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#FFA07A;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bantaeng</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#FFA500;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Eremerasa</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#DB7093;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Tompobulu</div>' +
                "</div>" +
                '<div class="flex items-center"> ' +
                '<div class="w-4 h-4 rounded " style="background-color:#B0E0E6;"></div>' +
                '<div class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Uluere</div>' +
                "</div>";

            // Tambahkan custom HTML legend ke dalam elemen dengan id "legend-container"
            var legendContainer = L.DomUtil.create("div", "legend");
            legendContainer.innerHTML = legendHtml;
            layerControl.getContainer().appendChild(legendContainer);

            //Geojson
            fetch("assets/batas_wilayah_kecamatan.geojson")
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    L.geoJSON(data, {
                        style: function (feature) {
                            return { color: feature.properties.color };
                        },
                    })
                        .bindPopup(function (layer) {
                            return layer.feature.properties.nama;
                        })
                        .addTo(self.map);
                })
                .catch(function (error) {
                    console.error("Error:", error);
                });

            //Marker

            axios
                .get("/markers")
                .then((response) => {
                    const markers = response.data;

                    // Loop melalui data marker dan tambahkan marker ke peta
                    markers.forEach((marker) => {
                        //IconMarker
                        var defaulticon = L.icon({
                            iconUrl: "/icon/" + marker.sektor.icon,
                            iconSize: [25, 41],
                            iconAnchor: [12, 41],
                            popupAnchor: [1, -34],
                            shadowSize: [41, 41],
                        });
                        var markerLayer = L.marker([marker.lat, marker.long], {
                            icon: defaulticon,
                            wilayah: marker.wilayah_id,
                            markerId: marker.id,
                        }).bindPopup(marker.nama);

                        // Cek apakah layer group sudah ada atau belum
                        if (
                            !self.markerGroups.hasOwnProperty(
                                marker.sektor.nama
                            )
                        ) {
                            // Jika belum ada, buat layer group baru dan tambahkan ke objek markerGroups
                            self.markerGroups[marker.sektor.nama] =
                                L.layerGroup();
                            // Simpan ikon dalam objek markerIcons
                            self.markerIcons[marker.sektor.nama] =
                                marker.sektor.icon;
                        }

                        // Tambahkan marker ke layer group yang sesuai
                        self.markerGroups[marker.sektor.nama].addLayer(
                            markerLayer
                        );
                    });

                    // Tambahkan layer group ke dalam layer control
                    for (var groupName in self.markerGroups) {
                        var icon = self.markerIcons[groupName];
                        var iconHtml =
                            '<span style="display: inline-flex; align-items: center;"><img src="/icon/' +
                            icon +
                            '" width="20px" height="20px" alt="">' +
                            groupName +
                            "</span>";
                        layerControl.addOverlay(
                            self.markerGroups[groupName],
                            iconHtml
                        );
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        },

        addLayerMarker(wilayahId) {
            //Marker

            axios
                .get("/markers")
                .then((response) => {
                    const markers = response.data;

                    // Loop melalui data marker dan tambahkan marker ke peta
                    markers.forEach((marker) => {
                        //IconMarker

                        if (
                            !this.isDuplicateMarker(
                                this.markerGroups[marker.sektor.nama],
                                marker.id
                            ) &&
                            marker.wilayah_id.includes(wilayahId)
                        ) {
                            var defaulticon = L.icon({
                                iconUrl: "/icon/" + marker.sektor.icon,
                                iconSize: [25, 41],
                                iconAnchor: [12, 41],
                                popupAnchor: [1, -34],
                                shadowSize: [41, 41],
                            });
                            var markerLayer = L.marker(
                                [marker.lat, marker.long],
                                {
                                    icon: defaulticon,
                                    wilayah: marker.wilayah_id,
                                    markerId: marker.id,
                                }
                            ).bindPopup(marker.nama);

                            // Tambahkan marker ke layer group yang sesuai
                            this.markerGroups[marker.sektor.nama].addLayer(
                                markerLayer
                            );
                        }
                    });
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
        },

        isDuplicateMarker(markerGroup, markerId) {
            var layers = markerGroup.getLayers();
            for (var i = 0; i < layers.length; i++) {
                var layer = layers[i];
                if (layer.options.markerId === markerId) {
                    return true; // Marker dengan ID yang sama sudah ada
                }
            }
            return false; // Tidak ada marker dengan ID yang sama
        },

        filterMarker() {
            var wilayahId = this.selectedChild;
            if (this.selectedChild == "") {
                wilayahId = this.selectedParent;
            }

            for (var groupName in this.markerGroups) {
                var markerGroup = this.markerGroups[groupName];
                var layers = markerGroup.getLayers();
                this.addLayerMarker(wilayahId);
                layers.forEach((layer) => {
                    if (
                        layer.options.wilayah.includes(wilayahId) &&
                        this.map.hasLayer(markerGroup)
                    ) {
                        this.map.addLayer(layer);
                    } else {
                        this.map.removeLayer(layer);
                        markerGroup.removeLayer(layer);
                    }
                });
            }
        },

        reloadMap() {
            this.map.remove();
            this.initializeMap();
        },

        loadParentOptions() {
            axios
                .get("/kecamatans")
                .then((response) => {
                    this.parents = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },

        loadChildOptions() {
            if (this.selectedParent) {
                axios
                    .get("/kelurahans/" + this.selectedParent)
                    .then((response) => {
                        this.children = response.data;
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            } else {
                this.children = [];
            }
        },
    },
};
</script>

<style scoped>
#mapContainer {
    height: 700px;
}
</style>
