<template>
    <Head title="Users"/>
    <div class="flex flex-col justify-center h-screen items-center">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Action
                    </th>
                </tr>
                </thead>
                <tbody v-for="user in users" :key="user.id">
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ user.name }}
                    </th>
                    <td class="py-4 px-6">
                        <Link class="text-stone-600 hover:underline" :href="'/user/' + user.id">
                            Details
                        </Link>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { Head } from '@inertiajs/inertia-vue3'
import axios from "axios";
export default {
    components: { Link, Head },
    data() {
        return {
            users: []
        };
    },
    created() {
        axios
            .get('http://127.0.0.1:8000/users')
            .then((response) => {
                this.users = response.data.data;
            })
    },
}
</script>
