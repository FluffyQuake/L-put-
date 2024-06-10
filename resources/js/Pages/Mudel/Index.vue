<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3'
import { useForm } from '@inertiajs/vue3'

import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const form = useForm({
  title: '',
  device_id: '',
})

const props = defineProps({
    devices: Object,
})
</script>

<template>
    <Head title="Mudel creation" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New model</h2>
        </template>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <Link :href="route('sisestamine')" as="button" type="button" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 mb-4 max-w-16 rounded focus:outline-none focus:shadow-outline">
                            Tagasi
                        </Link>
                        <form @submit.prevent="form.post(route('mudel'))" class="flex flex-col gap-2">
                            <div>
                                <InputLabel for="name" value="New model" />

                                <TextInput
                                    id="title"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                    />
                                    <span class="text-red-600" v-if="form.errors.title">
                                        {{ form.errors.title }}
                                    </span>
                            </div>
                            <div>
                                <InputLabel for="name" value="Select Device" />

                                <select 
                                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 mb-2 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                                    v-model="form.device_id" 
                                    id="device"
                                    >
                                
                                    <option v-for="device in devices" :value="device.id">{{ device.title }}</option> 
                                </select>
                                    <span class="text-red-600" v-if="form.errors.title">
                                        {{ form.errors.title }}
                                    </span>
                            </div>
                                
                            <button type="submit" :disabled="form.processing" class="w-full h-fit border border-gray-500 py-2">Create new model</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>