<template>
    <div class="mx-auto md:pt-16">
        <label>SearchBy:</label>
        <input v-model="searchInput" />

        <VueTableLite
            :is-loading="table.isLoading"
            :columns="table.columns"
            :rows="table.rows"
            :total="table.totalRecordCount"
            :sortable="table.sortable"
            @do-search="doSearch"
            @is-finished="tableLoadingFinish"
        ></VueTableLite>
    </div>
</template>

<script lang="ts">
import {
    defineComponent,
    reactive,
    computed,
    PropType,
    onMounted,
    ref,
    watch,
} from "vue";
import axios from "axios";
import VueTableLite from "vue3-table-lite/ts";
import { useStore } from "vuex";
import { ITableColumn } from "@/types/general";

export default defineComponent({
    name: "Table",
    components: { VueTableLite },

    props: {
        collectionName: {
            type: String as PropType<string>,
            required: true,
        },
        columns: {
            type: Array as PropType<ITableColumn[]>,
            required: true,
        },
    },

    setup(props) {
        const store = useStore();
        const searchInput = ref("");

        onMounted(() => {
            store.dispatch("fetch" + props.collectionName);
        });

        const rows = computed(() => {
            const getterName = `formatted${props.collectionName}`;
            return store.getters[getterName].data;
        });
        const total = computed(() => {
            const getterName = `formatted${props.collectionName}`;
            return store.getters[getterName].total;
        });

        let timeout: any = null;
        watch(searchInput, (newValue) => {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                if (newValue && newValue.length >= 3) {
                    store.dispatch("fetch" + props.collectionName, { search: newValue });
                } else {
                    store.dispatch("fetch" + props.collectionName);
                }
            }, 400);
        });

        const table = reactive({
            isLoading: false,
            columns: props.columns,
            rows: rows,
            totalRecordCount: total,
            sortable: {
                order: "id",
                sort: "asc",
            },
        });

        /**
         * Table search event
         */
        const doSearch = (offset: number, limit: number, order: string, sort: string) => {
            table.isLoading = true;

            if (offset === 0) {
                offset = 1;
            } else {
                offset = offset / limit + 1;
            }

            store.dispatch("fetch" + props.collectionName, {
                page: offset,
                perPage: limit,
                sort: order + "," + sort,
            });
        };

        /**
         * Table search finished event
         */
        const tableLoadingFinish = () => {
            table.isLoading = false;
        };

        return {
            table,
            doSearch,
            tableLoadingFinish,
            searchInput,
        };
    },
});
</script>
