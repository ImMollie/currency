<template>
    <h3 class="text-center py-5">Add new</h3>
    <div class="relative overflow-x-auto mb-5 pb-5 rounded-lg m-3">
        <form @submit.prevent class="h-full w-full">
            <div class="flex justify-between">
                <div class="w-1/3 flex justify-center">
                    <select v-model="form.abbreviation" class="">
                        <option value="EUR">EUR</option>
                        <option value="GBP">GBP</option>
                        <option value="USD">USD</option>
                    </select>
                </div>
                <div class="w-1/3 flex justify-center">
                    <input type="number" v-model="form.amount" id="dsa" step="0.1" min="0"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/4 p-2.5"
                        placeholder="" required>
                </div>
                <div class="w-1/3 flex justify-center">
                    <input type="submit" @click="onSubmit" id="dasda"
                        class="text-white bg-gradient-to-br from-purple-500 to-blue-500 focus:ring-2 focus:outline-none focus:ring-blue-400 font-medium rounded-lg px-5 py-2.5 text-center text-sm"
                        value="Submit">
                </div>
            </div>
        </form>
    </div>
    <h3 class="text-center py-5">History</h3>
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
    name: "Currency",
    components: {
    },
    props: [
        'currencies',
    ],
    setup() {
        const form = useForm({
            abbreviation: null,
            amount: null,
        })
        return { form }
    },
    methods: {
        onSubmit() {
            console.log('asd');
            this.form.post('/add', {
                onSuccess: () => {
                    this.form.reset();

                }
            })
        },
    },
};
</script>