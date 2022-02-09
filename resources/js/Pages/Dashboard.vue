<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';

import "ag-grid-community/dist/styles/ag-grid.css";
import "ag-grid-community/dist/styles/ag-theme-alpine.css";
import { AgGridVue } from "ag-grid-vue3";

let gridApi;

const columnDefs = [
    {
        headerName: 'Date',
        field: "time",
        sortable: true,
        filter: true,
        width: 180,
    },
    {
        headerName: "Name",
        sortable: true,
        filter: true,
        width: 250,
        valueFormatter: params => `${params.data.second_name}, ${params.data.first_name}`,
    },
    {
        headerName: 'Address',
        field: "address",
        sortable: true,
        filter: true,
        width: 400,
    },
    {
        headerName: 'Contact #',
        field: "contact_number",
        sortable: true,
        filter: true,
        width: 150,
    },
    {
        headerName: 'Temp',
        field: "temp",
        sortable: true,
        filter: true,
        width: 100,
    },
    {
        headerName: 'A',
        field: "0",
        sortable: true,
        filter: true,
        width: 100,
    },
    {
        headerName: 'B',
        field: "1",
        sortable: true,
        filter: true,
        width: 100,
    },
    {
        headerName: 'C',
        field: "2",
        sortable: true,
        filter: true,
        width: 100,
    },
    {
        headerName: 'D',
        field: "3",
        sortable: true,
        filter: true,
        width: 100,
    },
];

// specify the data
let rowData = [];

const gridReady = params => {
    gridApi = params.api;

    fetch('/api/declarations')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        gridApi.applyTransaction({
            add: data,
            addIndex: 0,
        });
    });
};
</script>

<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="w-full bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <ag-grid-vue style="width: 100%; height: 600px;"
                     @grid-ready="gridReady"
                     class="ag-theme-alpine"
                     :columnDefs="columnDefs"
                     :rowData="rowData"
                     rowSelection="single"
                     pagination="true"
                     paginationPageSize="25"
                    >
                    </ag-grid-vue>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
