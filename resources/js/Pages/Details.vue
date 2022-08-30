<template>
    <Head>
        <title>User - {{ user.name }}</title>
    </Head>
    <button @click="back" class="fixed m-6 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</button>
    <div class="flex flex-col justify-center h-screen items-center">
        <div class="overflow-x-auto relative">
            <div :class="[show ? 'visible' : 'invisible']" class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800">
                <span class="font-medium">Confirmation email sent</span>
            </div>
            <table class="mb-8 w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        ID
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Email
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-4 px-6">
                        {{ user.id }}
                    </td>
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ user.name }}
                    </th>
                    <td class="py-4 px-6">
                        {{ user.email }}
                    </td>
                </tr>
                </tbody>
            </table>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Item
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Price
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody v-for="item in items" :key="item.id">
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ item.name }}
                    </th>
                    <td class="py-4 px-6">
                        {{ item.price / 100 }} EUR
                    </td>
                    <td class="py-4 px-6">
                        <form method="post" @submit.prevent="purchase(item.id); show = true">
                            <button class="hover:underline" type="submit">Purchase</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import { Head } from '@inertiajs/inertia-vue3'
import axios from "axios";

export default {
    components: {Link, Head},
    props: {
        userId: Number
    },
    data() {
        return {
            items: [],
            user: Object,
            show: false
        };
    },
    created() {
        axios
            .get('http://127.0.0.1:8000/items')
            .then((response) => {
                this.items = response.data.data;
            })
        ;
        axios
            .get('http://127.0.0.1:8000/users/' + this.userId)
            .then((response) => {
                this.user = response.data.data;
            })
    },

    methods: {
        back() {
            window.history.back();
        },
        purchase(specificItemId) {
            axios
                .post('http://127.0.0.1:8000/purchase', {userId: this.user.id, itemId: specificItemId })
                .then((response) => setTimeout(() => { this.show = false }, 5000))
        }
    }
}
</script>
