<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<div
    x-data="{
        lat: @entangle('data.latitude'),
        lng: @entangle('data.longitude'),
        map: null,
        marker: null,

        init() {
            if (this.map) return;

            const startLat = this.lat ?? -6.200000;
            const startLng = this.lng ?? 106.816666;

            this.map = L.map(this.$refs.map).setView([startLat, startLng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(this.map);

            this.marker = L.marker([startLat, startLng], {
                draggable: true
            }).addTo(this.map);

            // 🔁 Drag marker → update form
            this.marker.on('dragend', (e) => {
                const p = e.target.getLatLng();
                this.lat = p.lat;
                this.lng = p.lng;
            });

            // 🔥 PENTING
            this.$watch('lat', () => this.refreshMap());
            this.$watch('lng', () => this.refreshMap());

            // Leaflet resize fix
            setTimeout(() => {
                this.map.invalidateSize();
            }, 200);
        },

        refreshMap() {
            if (!this.map || !this.marker || !this.lat || !this.lng) return;

            this.marker.setLatLng([this.lat, this.lng]);
            this.map.setView([this.lat, this.lng], 15);

            // WAJIB agar peta benar-benar bergerak
            this.map.invalidateSize();
        }
    }"
    x-init="init()"
    wire:ignore
    class="rounded-lg border"
    style="height: 420px"
>
    <div x-ref="map" style="height: 100%"></div>
</div>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
