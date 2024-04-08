<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    first_name: null,
    last_name: null,
    email: null,
})

function submit() {
    form.post(route('ladu.index'))
}


</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ladu sisse</h2>
        </template>

        <div class="py-12 gap-x-10">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <label for="first_name">First name:</label>
                        <input id="first_name" v-model="form.first_name" />
                    </form>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <label for="last_name">Last name:</label>
                        <input id="last_name" v-model="form.last_name" />
                    </form>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="submit">
                        <label for="email">Email:</label>
                        <input id="email" v-model="form.email" />
                    </form>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </div>
                

    </AuthenticatedLayout>
</template>
