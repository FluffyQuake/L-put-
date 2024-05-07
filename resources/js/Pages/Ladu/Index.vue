<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps({
    ladus: Object
})

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('ladu.destroy', id));
    }
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ladu</h2>
        </template>

        <div class="py-24">
            Tere
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div v-for="ladu in ladus" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex items-center gap-4 w-1/4">
                        <img :src="url + '/storage/' + ladu.image_path" :alt="ladu.name" class="w-16 rounded-md">
                        <span class="font-bold">{{ ladu.name }}</span>
                    </div>

                    <div class="flex gap-4">
                        <Link :href="route('ladu.edit', {ladu})">Edit</Link>
                        <!-- <Link class="text-red-500" :href="route('ladu.destroy', {ladu})" method="delete" as="button" type="button">Delete</Link> -->
                    
                        <button
                                @click="destroy(ladu.id)"
                                tabIndex="-1"
                                type="button"
                                className="mx-1 px-4 py-2 text-sm text-white bg-red-500 rounded"
                                >
                                Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        

</AuthenticatedLayout>
</template>