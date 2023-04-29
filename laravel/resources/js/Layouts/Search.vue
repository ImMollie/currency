<template>
<h3 class="text-center py-5">Pick a date</h3>
<form class="w-full">
    <div class="flex flex-col items-center justify-center">
        <input type="date" v-model="form.date" v-on:change="onSubmit" id="start" name="trip-start" min="2023-04-25" max="2023-12-31">
    </div>
    
</form>
<div class="relative overflow-x-auto mt-4 pt-5 border border-black rounded-lg m-3">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Currency
                </th>                
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>                
            </tr>
        </thead>
        <tbody>
            <tr v-for="currency in dayCurrencies" :key="currency.id" class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{ currency.abbreviation }}
                </th>
                <td class="px-6 py-4">
                    {{ currency.amount }}
                </td>                
            </tr>            
        </tbody>
    </table>
</div>

<h3 class="text-center py-5">Pick a date and currency</h3>
<form>
    <div class="flex flex-col items-center justify-center">
        <input type="date" v-model="form2.date" id="start" name="trip-start" min="2023-04-25" max="2023-12-31">
        <td class="px-6 py-4">
                <select v-model="form2.abbreviation" v-on:change="onSubmit2">
                    <option value="EUR">EUR</option>
                    <option value="GBP">GBP</option>
                    <option value="USD">USD</option>        
                </select>   
        </td>   
    </div>
</form>
<div class="relative overflow-x-auto mt-4 pt-5 border border-black rounded-lg m-3">
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Currency
                </th>
                <th scope="col" class="px-6 py-3">
                    Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>                
            </tr>
        </thead>
        <tbody>
            <tr v-for="currency in currencies" :key="currency.id" class="bg-white border-b">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                    {{ currency.abbreviation }}
                </th>
                <td class="px-6 py-4">
                    {{ currency.date }}
                </td>
                <td class="px-6 py-4">
                    {{ currency.amount }}
                </td>                
            </tr>            
        </tbody>
    </table>
</div>
</template>

<script>

import { useForm } from '@inertiajs/vue3';
export default {
    name: "SearchPage",
    components: {
    },
    props: [
        'dayCurrencies',
        'currencies',
    ],
    setup() {
        const form = useForm({
            date: null,                       
        })
        const form2 = useForm({
            date: null, 
            abbreviation: null,
        })
    return { form, form2 }
    },
    methods: {
        onSubmit() {            
            this.form.get('search')
        },
        onSubmit2() {
            this.form2.get('searchWithCurrency')
        }
    },
};
</script>