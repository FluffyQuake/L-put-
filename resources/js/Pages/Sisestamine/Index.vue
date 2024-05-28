<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

import { reactive } from 'vue'
import { computed } from 'vue';

const form = useForm({
    SN: '',
    device_id: '',
    mudel_id: '',
    description: '',
    condition: '',
    shelf: '',
    shop: '',
    image: ''
});

const props = defineProps({
    devices: Object,
    mudels: Object
})

console.log(props.mudels)

const fMudels = computed(() => props.mudels.filter(mudel => mudel.device_id === form.device_id))

// const props = defineProps({ devices: Object });
// const props = defineProps({ mudels: Object });

</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ladu sisse</h2>
        </template>
        
        <div class="w-full max-w-lg mt-10">
            <form @submit.prevent="form.post(route('sisestamine'))" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" >

                <div class="mb-4">
                    <InputLabel class="mb-2" for="SN" value="Seeria number"/>

                    <TextInput class="border-red-500 w-full py-2 px-3 leading-tight" 
                        id="SN"
                        type="text" 
                        placeholder="S/N"
                        v-model="form.SN" 
                        required
                        autofocus
                    />
                </div>

                <div class="mb-4">
                    <InputLabel class="mb-2" for="device" value="Seade"/>
                        
                    <select 
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 mb-2 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                        v-model="form.device_id" 
                        id="device"
                        required
                        >
                    
                        <option v-for="device in devices" :value="device.id">{{ device.title }}</option> 
                    </select>
                    <Link :href="route('device')" type="button" as="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Lisa seade
                    </Link>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"></div>
            
                </div>

                <div class="mb-4">
                    <InputLabel class="mb-2" for="mudel" value="Mudel"/>

                    <select
                        class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 mb-2 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
                        v-model="form.mudel_id"
                        id="mudel"
                        required
                        >
                        <option v-for="mudel in fMudels" :value="mudel.id">{{ mudel.title }}</option>
                    </select>

                    <Link  :href="route('mudel')" as="button" type="button" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Lisa mudel
                    </Link>
                </div>

                <div class="mb-4">
                    <InputLabel class="mb-2" for="description" value="Toote kirjeldus"/>

                    <textarea class="w-full py-2 px-3" 
                        id="description"
                        placeholder="Kirjelda toodet"
                        v-model="form.description"
                        required
                        ></textarea>
                </div>
                
                <div class="w-full mb-4">
                    <InputLabel class="mb-2" for="condition" value="Seisukord"/>

                    <select v-model="form.condition" id="condition" required class="w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option>Laos</option>
                        <option>Objektil</option>
                        <option>Parandada</option>
                        <option>Katki</option>
                        <option>Maha kantud</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        
                    </div>
                </div>

                <div class="w-full mb-4">
                    <InputLabel class="mb-2" for="shelf" value="Riiul"/>

                    <select v-model="form.shelf" id="shelf" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
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
                    <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="shop" value="Kauplus"/>
                        
                    <select v-model="form.shop" id="shop" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
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
                    required
                    type="file"
                    @input="form.image = $event.target.files[0]"
                />

                <div class="flex items-center justify-around">
                    <button type="submit" :disabled="form.processing" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sisesta</button>   
                </div>

            </form>
        </div>  

    </AuthenticatedLayout>
</template>
