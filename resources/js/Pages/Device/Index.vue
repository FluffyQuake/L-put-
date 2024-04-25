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
  description: '',
  genre: '',
  image: '',
})

const data = defineProps({ genres: Object });
</script>

<template>
    <Head title="Device creation" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">New device</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex flex-col">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <form @submit.prevent="form.post(route('device'))" class="flex flex-col gap-2">
                            <!-- <input type="text" v-model="name" id="name" placeholder="Genre's name"> -->
                            <div>
                                <InputLabel for="name" value="Title" />

                                <TextInput
                                    id="name"
                                    type="text"
                                    class="mt-1 block w-full"
                                    v-model="form.title"
                                    required
                                    autofocus
                                />

                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
                            
                            <button type="submit" :disabled="form.processing" class="w-full h-fit border border-gray-500 py-2">Create new device</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>