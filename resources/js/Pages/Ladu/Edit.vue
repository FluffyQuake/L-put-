<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { usePage, useForm, route } from '@inertiajs/inertia-vue3';
import { ref, computed, watch } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue'; // Assuming you have a TextInput component

const { props } = usePage();

const fMudels = computed(() => props.mudels && props.mudels.filter(mudel => mudel.device_id === form.device_id));

// Check if props.sisestamine exists before initializing form
const form = useForm({
  SN: props.sisestamine ? props.sisestamine.SN : '',
  device_id: props.sisestamine ? props.sisestamine.device_id : '',
  mudel_id: props.sisestamine ? props.sisestamine.mudel_id : '',
  description: props.sisestamine ? props.sisestamine.description : '',
  condition: props.sisestamine ? props.sisestamine.condition : '',
  shelf: props.sisestamine ? props.sisestamine.shelf : '',
  shop: props.sisestamine ? props.sisestamine.shop : '',
  image_path: null,
});

const devices = ref(props.devices || []);
const mudels = ref(props.mudels || []);

const onFileChange = (event) => {
  form.image_path = event.target.files[0];
};

const submitForm = async () => {
  const formData = new FormData();
  formData.append('SN', form.SN);
  formData.append('device_id', form.device_id);
  formData.append('mudel_id', form.mudel_id);
  formData.append('description', form.description);
  formData.append('condition', form.condition);
  formData.append('shelf', form.shelf);
  formData.append('shop', form.shop);
  formData.append('image_path', form.image_path);

  await form.post(route('ladu.update', { sisestamine: props.sisestamine.id }), {
    onSuccess: () => {
      console.log('Form submitted successfully');
    },
    onError: () => {
      console.log('Form submission failed');
    }
  });
};

// Watch for changes in props and update form data
watch(
  () => props.sisestamine,
  (newVal) => {
    if (newVal) {
      form.SN = newVal.SN;
      form.device_id = newVal.device_id;
      form.mudel_id = newVal.mudel_id;
      form.description = newVal.description;
      form.condition = newVal.condition;
      form.shelf = newVal.shelf;
      form.shop = newVal.shop;
    }
  },
  { immediate: true }
);
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit</h2>
    </template>
    <form @submit.prevent="submitForm" class="w-full max-w-lg">
      <!-- SN Field -->
      <div class="mb-4">
        <InputLabel class="mb-2" for="SN" value="Seeria number" />
        <TextInput class="border-red-500 w-full py-2 px-3 leading-tight" 
            id="SN"
            type="text" 
            placeholder="S/N"
            v-model="form.SN" 
            required
            autofocus
        />
      </div>

      <!-- Device Field -->
      <div class="mb-4">
        <label for="device_id" class="block text-sm font-medium text-gray-700">Seade</label>
        <select id="device_id" v-model="form.device_id" class="mt-1 block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
          <option v-for="device in devices" :value="device.id" :key="device.id">{{ device.title }}</option>
        </select>
      </div>

      <!-- Mudel Field -->
      <div class="mb-4">
        <InputLabel class="mb-2" for="mudel" value="Mudel" />
        <select
            class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 mb-2 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" 
            v-model="form.mudel_id"
            id="mudel"
            required
        >
          <option v-for="mudel in fMudels" :value="mudel.id" :key="mudel.id">{{ mudel.title }}</option>
        </select>
      </div>

      <!-- Description Field -->
      <div class="mb-4">
        <InputLabel class="mb-2" for="description" value="Toote kirjeldus" />
        <textarea class="w-full py-2 px-3" 
            id="description"
            placeholder="Kirjelda toodet"
            v-model="form.description"
            required
        ></textarea>
      </div>

      <!-- Condition Field -->
      <div class="w-full mb-4">
        <InputLabel class="mb-2" for="condition" value="Seisukord" />
        <select v-model="form.condition" id="condition" required class="w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
          <option>Laos</option>
          <option>Objektil</option>
          <option>Parandada</option>
          <option>Katki</option>
          <option>Maha kantud</option>
        </select>
      </div>

      <!-- Shelf Field -->
      <div class="mb-4">
        <label for="shelf" class="block text-sm font-medium text-gray-700">Riiul</label>
        <select v-model="form.shelf" id="shelf" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>

      <!-- Shop Field -->
      <div class="mb-4">
        <InputLabel class="block text-gray-700 text-sm font-bold mb-2" for="shop" value="Kauplus" />
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
            <option value="Eikla kauplus">Eikla kauplus </option>
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
      </div>

      <!-- Image Field -->
      <div class="mb-4">
        <label for="image_path" class="block text-sm font-medium text-gray-700">Pilt</label>
        <input type="file" id="image_path" @change="onFileChange" class="mt-1 block w-full shadow-sm sm:text-sm focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md">
      </div>

      <!-- Submit Button -->
      <div class="flex items-center">
        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Salvesta
        </button>
      </div>
    </form>
  </AuthenticatedLayout>
</template>
