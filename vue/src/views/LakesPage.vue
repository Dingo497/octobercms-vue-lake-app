<template>
    <!--Left Col-->
    <div
        class="flex flex-col w-full xl:w-2/5 justify-center lg:items-start overflow-y-hidden"
    >
        <h1
            class="my-4 text-3xl md:text-5xl text-white opacity-75 font-bold leading-tight text-center md:text-left"
        >
            Create
            <span
                class="bg-clip-text text-transparent bg-gradient-to-r from-green-400 via-pink-500 to-purple-500"
            >
                And monitore
            </span>
            your lakes!
        </h1>
        <p class="leading-normal text-base md:text-2xl mb-8 text-center md:text-left">
            Best app for monitor your lakes temperature you ever seen
        </p>
    </div>

    <!--Right Col-->
    <div class="w-full xl:w-3/5 p-12 overflow-hidden">
        <img
            class="mx-auto w-full md:w-4/5 transform -rotate-6 transition hover:scale-105 duration-700 ease-in-out hover:rotate-6"
            :src="require('@/assets/imgs/lake-img-main.jpg')"
        />
    </div>

    <TableComponent collectionName="Lakes" :columns="tableColumns" />
</template>

<script lang="ts">
import { defineComponent, onMounted, computed } from "vue";
import TableComponent from "@/components/TableComponent.vue";

export default defineComponent({
    name: "LakesPage",
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
                label: "Názov",
                field: "name",
                width: "45%",
                sortable: true,
            },
            {
                label: "Hĺbka",
                field: "depth",
                width: "15%",
                sortable: true,
            },
            {
                label: "Rozloha",
                field: "area",
                width: "15%",
                sortable: true,
            },
            {
                label: "Vytvorené",
                field: "created_at",
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
