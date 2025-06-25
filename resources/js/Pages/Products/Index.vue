<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    products: Object,
    filters: Object,
    categories: Object,
    locations: Object,
    artisansList: Object, // Renamed to avoid conflict if artisan prop exists
});

const search = ref(props.filters.search || '');
const category = ref(props.filters.category || '');
const price_min = ref(props.filters.price_min || '');
const price_max = ref(props.filters.price_max || '');
const location = ref(props.filters.location || '');
const artisan_id = ref(props.filters.artisan_id || '');

watch([search, category, price_min, price_max, location, artisan_id], () => {
    router.get(route('products.index'),
        {
            search: search.value,
            category: category.value,
            price_min: price_min.value,
            price_max: price_max.value,
            location: location.value,
            artisan_id: artisan_id.value,
        },
        {
            preserveState: true,
            replace: true,
        }
    );
});

</script>

<template>
    <Head title="Product Listings" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Product Listings</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="flex flex-wrap items-center justify-between mb-6 space-y-4 md:space-y-0 md:space-x-4">
                            <input
                                type="text"
                                v-model="search"
                                placeholder="Search products..."
                                class="w-full md:w-1/4 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            />
                            <select
                                v-model="category"
                                class="w-full md:w-1/5 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                                <option value="">All Categories</option>
                                <option v-for="cat in categories" :key="cat" :value="cat">{{ cat }}</option>
                            </select>
                            <input
                                type="number"
                                v-model="price_min"
                                placeholder="Min Price"
                                class="w-full md:w-1/6 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            />
                            <input
                                type="number"
                                v-model="price_max"
                                placeholder="Max Price"
                                class="w-full md:w-1/6 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                            />
                            <select
                                v-model="location"
                                class="w-full md:w-1/5 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                                <option value="">All Locations</option>
                                <option v-for="loc in locations" :key="loc" :value="loc">{{ loc }}</option>
                            </select>
                            <select
                                v-model="artisan_id"
                                class="w-full md:w-1/5 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                            >
                                <option value="">All Artisans</option>
                                <option v-for="artisan in artisansList" :key="artisan.id" :value="artisan.id">{{ artisan.name }}</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div v-for="product in products.data" :key="product.id" class="bg-gray-100 dark:bg-gray-700 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                                <img :src="`https://via.placeholder.com/300x200?text=${product.name.replace(/ /g, '+')}`" :alt="product.name" class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">{{ product.name }}</h3>
                                    <p class="text-gray-700 dark:text-gray-300 text-sm mt-1 mb-2">{{ product.artisan.name }}</p>
                                    <p class="text-green-600 dark:text-green-400 font-bold text-lg mb-2">${{ product.price }}</p>
                                    <p class="text-gray-600 dark:text-gray-400 text-xs mb-2">{{ product.description.substring(0, 70) }}<span v-if="product.description.length > 70">...</span></p>
                                    <div class="mt-4">
                                        <Link :href="route('products.show', product.id)" class="text-indigo-600 hover:text-indigo-800 font-medium">View Details &rarr;</Link>
                                    </div>
                                </div>
                            </div>
                            <div v-if="products.data.length === 0" class="col-span-full text-center text-gray-600 dark:text-gray-400">
                                No products found matching your criteria.
                            </div>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-8 flex justify-center" v-if="products.links.length > 3">
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <Link
                                    v-for="link in products.links"
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