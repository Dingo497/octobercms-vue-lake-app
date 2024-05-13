<template>
    <TableComponent collectionName="LakesMeterings" :columns="tableColumns" />
</template>

<script lang="ts">
import { defineComponent, onMounted, computed } from "vue";
import TableComponent from "@/components/TableComponent.vue";

export default defineComponent({
    name: "LakesMeteringsPage",
    components: {
        TableComponent,
    },

    setup() {
        const tableColumns = [
            {
                label: "ID",
                field: "id",
                width: "10%",
                sortable: true,
                isKey: true,
            },
            {
                label: "Názov jazera",
                field: "lakeName",
                width: "45%",
                sortable: true,
            },
            {
                label: "Teplota",
                field: "temperature",
                width: "15%",
                sortable: true,
            },
            {
                label: "Dátum merania",
                field: "measured_at",
                width: "15%",
                sortable: true,
            },
        ];

        return {
            tableColumns,
        };
    },
});
</script>
