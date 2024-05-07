<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

import { reactive } from 'vue'

const form = useForm({
    SN: '',
    device: '',
    mudel: '',
    description: '',
    condition: '',
    shelf: '',
    shop: '',
});

defineProps({
    devices: Object,
    mudels: Object
})
// const props = defineProps({ devices: Object });
// const props = defineProps({ mudels: Object });

const submit = () => {
    form.post(route('ladu.store'))
}

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ladu sisse</h2>
        </template>
        
        <div class="w-full max-w-lg mt-10">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" >
                <!-- @submit.prevent="form.post(route('ladu.index'))" -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="SN">
                        Serial number
                    </label>
                    <input class="shadow appearance-none border border-red-500 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="SN" type="text" placeholder="S/N" v-model="SN" required>
                    <p class="text-red-500 text-xs italic">Kohustuslik.</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="device">
                        Seade
                    </label>
                    <select 
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 mb-2 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                        v-model="form.device" 
                        id="device"
                        >
                    
                        <option v-for="device in devices" :value="device.id">{{ device.title }}</option> 
                    </select>
                    <Link :href="route('device')" type="button" as="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Lisa seade
                    </Link>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
            
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="mudel">
                        Mudel
                    </label>
                    <select 
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 mb-2 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                        v-model="form.mudel"
                        id="mudel"
                        >
                        <option v-for="mudel in mudels" :value="mudel.id">{{ mudel.title }}</option>
                    </select>

                    <Link  :href="route('mudel')" as="button" type="button" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Lisa mudel
                    </Link>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        Kirjeldus
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Kirjelda toodet">
                </div>
                
                <div class="inline-block relative w-64 mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="condition">
                        Seisukord
                    </label>
                    <select id="condition" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option>Laos</option>
                        <option>Objektil</option>
                        <option>Parandada</option>
                        <option>Katki</option>
                        <option>Maha kantud</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        
                    </div>
                </div>

                <div class="inline-block relative w-64 mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shelf">
                        Riiul
                    </label>
                    <select id="shelf" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <!-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg> -->
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="shop">
                        Kauplus
                    </label>
                    <select id="shop" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <optgroup label="Konsumid">
						<option value="Kaubaait">Kaubaait</option>
							<option value="Kummeli Konsum">Kummeli Konsum</option> 						
							<option value="Liiva Konsum">Liiva Konsum</option> 
							<option value="Orissaare Konsum">Orissaare Konsum</option>
							<option value="Port Artur Konsum">Port Artur Konsum</option>
							<option value="Rae Konsum">Rae Konsum</option>
							<option value="Salme kauplus">Salme Konsum</option>
							<option value="Tooma Konsum">Tooma Konsum</option> 
						</optgroup>
						<optgroup label="Kauplusesd">
							<option value="Aste kauplus">Aste kauplus</option>
							<option value="Eikla kauplus ">Eikla kauplus</option> 
							<option value="Hellamaa kauplus">Hellamaa kauplus</option>
							<option value="Kihelkonna kauplus">Kihelkonna kauplus</option> 
							<option value="Kärla kauplus">Kärla kauplus</option> 
							<option value="Leisi kauplus">Leisi kauplus</option> 
							<option value="Lümanda kauplus">Lümanda kauplus</option> 
							<option value="Mustjala kauplus">Mustjala kauplus</option> 
							<option value="Nasva kauplus">Nasva kauplus</option> 					
							<option value="Pihtla kauplus">Pihtla kauplus</option> 					 
							<option value="Pärsama kauplus">Pärsama kauplus</option> 					
							<option value="Ranna kauplus">Ranna kauplus</option> 
							<option value="Roomassaare kauplus">Roomassaare kauplus</option> 
							<option value="Saikla kauplus">Saikla kauplus</option> 
							<option value="Tagavere kauplus">Tagavere kauplus</option> 					
							<option value="Tornimäe kauplus">Tornimäe kauplus</option>
							<option value="Valjala kauplus">Valjala kauplus</option>
						</optgroup>
							<optgroup label="Muu">				
							<option value="Maiasmokk">Maiasmokk</option>
							<option value="Rehemäe">Rehemäe</option>
							<option value="Tallinna tn.1">Tallinna tn.1</option>
							<option value="Saaremaa Kaubamaja">Saaremaa Kaubamaja</option> 
							<option value="STÜ Tootmine">STÜ Tootmine</option>
							<option value="Tehnika 5">Tehnika 5</option>
							<option value="Toidumaailm">Toidumaailm</option>						
						</optgroup>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <!-- <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg> -->
                    </div>
                </div>

                <input 
                    class="mb-5 mt-3"
                    type="file" 
                    @input="form.image = $event.target.files[0]"
                />

                <div class="flex items-center justify-around">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sisesta</button>   
                </div>

            </form>
        </div>  

    </AuthenticatedLayout>
</template>
