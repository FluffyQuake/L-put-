<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    sisestamines: Object,
    devices: Object,
    mudels: Object,
})

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ladu</h2>
        </template>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg py-4">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">Seeria number</th>
                <th scope="col" class="px-6 py-3">Pilt</th>
                <th scope="col" class="px-6 py-3">Seade</th>
                <th scope="col" class="px-6 py-3">Mudel</th>
                <th scope="col" class="px-6 py-3">Kirjeldus</th>
                <th scope="col" class="px-6 py-3">Seisukord</th>
                <th scope="col" class="px-6 py-3">Riiul</th>
                <th scope="col" class="px-6 py-3">Kauplus</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="sisestamine in sisestamines" :key="sisestamine.id" class="bg-white border-b hover:bg-gray-50">
                <td class="px-6 py-4">{{ sisestamine.SN }}</td>
                <td class="px-6 py-4">
                    <img :src="'/storage/' + sisestamine.image_path" :alt="sisestamine.id" class="w-16 h-16 rounded-md">
                </td>
                <td class="px-6 py-4">{{ sisestamine.device.title }}</td>
                <td class="px-6 py-4">{{ sisestamine.mudel.title }}</td>
                <td class="px-6 py-4">{{ sisestamine.description }}</td>
                <td class="px-6 py-4">{{ sisestamine.condition }}</td>
                <td class="px-6 py-4">{{ sisestamine.shelf }}</td>
                <td class="px-6 py-4">{{ sisestamine.shop }}</td>
                <td class="px-6 py-4">
                    <Link :href="route('sisestamine.update')" type="button" data-modal-target="editItemModal" data-modal-show="editItemModal" class="font-medium text-blue-600 hover:underline">Edit</Link>
                    <Link class="text-red-500" :href="route('sisestamine.destroy', sisestamine)" method="delete" as="button" type="button">Delete</Link>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Edit item modal -->
    <div id="editItemModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <form class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit item
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center" data-modal-hide="editItemModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7 1 13m6-6 6-6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="SN" class="block mb-2 text-sm font-medium text-gray-900">Serial number</label>
                            <input type="text" name="SN" id="SN" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type serial number" required>
                        </div>
                        <div class="w-full">
                            <label for="device" class="block mb-2 text-sm font-medium text-gray-900">Device</label>
                            <input type="text" name="device" id="device" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type device name" required>
                        </div>
                        <div class="w-full">
                            <label for="mudel" class="block mb-2 text-sm font-medium text-gray-900">Model</label>
                            <input type="text" name="mudel" id="mudel" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type model" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                            <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500" placeholder="Type description here"></textarea>
                        </div>
                        <div class="w-full">
                            <label for="condition" class="block mb-2 text-sm font-medium text-gray-900">Condition</label>
                            <input type="text" name="condition" id="condition" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type condition" required>
                        </div>
                        <div class="w-full">
                            <label for="shelf" class="block mb-2 text-sm font-medium text-gray-900">Shelf</label>
                            <input type="text" name="shelf" id="shelf" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type shelf" required>
                        </div>
                        <div class="w-full">
                            <label for="shop" class="block mb-2 text-sm font-medium text-gray-900">Shop</label>
                            <input type="text" name="shop" id="shop" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="Type shop name" required>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                    <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save all</button>
                    <button type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10" data-modal-hide="editItemModal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

    
    </AuthenticatedLayout>
</template>