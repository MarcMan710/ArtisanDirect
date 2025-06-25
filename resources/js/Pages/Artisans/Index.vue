<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    artisans: Object,
    filters: Object,
});

const search = ref(props.filters.search || '');
const location = ref(props.filters.location || '');
const food_category = ref(props.filters.food_category || '');

const categories = [
    'Bakery',
    'Confectionery',
    'Dairy',
    'Produce',
    'Meat',
    'Seafood',
    'Beverages',
    'Prepared Meals',
    'Other',
];

const locations = [
    'New York',
    'Los Angeles',
    'Chicago',
    'Houston',
    'Phoenix',
    'Philadelphia',
    'San Antonio',
    'San Diego',
    'Dallas',
    'San Jose',
];

watch([search, location, food_category], () => {
    router.get(route('artisans.index'),
        {
            search: search.value,
            location: location.value,
            food_category: food_category.value,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
});

</script>

<template>
    <Head title="Artisan Directory" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Artisan Directory</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-4 md:space-y-0 md:space-x-4">
                            <input
                                type="text"
                                v-model="search"
                                placeholder="Search artisans..."
                                class="w-full md:w-1/3 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            />
                            <select
                                v-model="location"
                                class="w-full md:w-1/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                                <option value="">All Locations</option>
                                <option v-for="loc in locations" :key="loc" :value="loc">{{ loc }}</option>
                            </select>
                            <select
                                v-model="food_category"
                                class="w-full md:w-1/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                                <option value="">All Categories</option>
                                <option v-for="category in categories" :key="category" :value="category">{{ category }}</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <div v-for="artisan in artisans.data" :key="artisan.id" class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md p-6 transform transition duration-300 hover:scale-105">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">{{ artisan.name }}</h3>
                                <p class="text-gray-700 dark:text-gray-300 mb-4">{{ artisan.description }}</p>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    <p v-if="artisan.location"><strong>Location:</strong> {{ artisan.location }}</p>
                                    <p v-if="artisan.food_category"><strong>Category:</strong> {{ artisan.food_category }}</p>
                                    <p v-if="artisan.email"><strong>Email:</strong> {{ artisan.email }}</p>
                                    <p v-if="artisan.phone_number"><strong>Phone:</strong> {{ artisan.phone_number }}</p>
                                </div>
                                <div class="mt-4">
                                    <Link :href="route('artisans.show', artisan.id)" class="text-indigo-600 hover:text-indigo-800 font-medium">View Profile &rarr;</Link>
                                </div>
                            </div>
                            <div v-if="artisans.data.length === 0" class="col-span-full text-center text-gray-600 dark:text-gray-400">
                                No artisans found matching your criteria.
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8 flex justify-center" v-if="artisans.links.length > 3">
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <Link
                                    v-for="link in artisans.links"
                                    :key="link.label"
                                    :href="link.url"
                                    v-html="link.label"
                                    class="relative inline-flex items-center px-4 py-2 border text-sm font-medium focus:z-10 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    :class="{
                                        'bg-indigo-600 text-white': link.active,
                                        'border-gray-300 text-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600': !link.active,
                                        'rounded-l-md': link.label.includes('Previous'),
                                        'rounded-r-md': link.label.includes('Next'),
                                    }"
                                    :disabled="!link.url"
                                />
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template> 