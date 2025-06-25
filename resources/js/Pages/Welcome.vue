<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

function handleImageError() {
    document.getElementById('screenshot-container')?.classList.add('!hidden');
    document.getElementById('docs-card')?.classList.add('!row-span-1');
    document.getElementById('docs-card-content')?.classList.add('!flex-row');
    document.getElementById('background')?.classList.add('!hidden');
}
</script>

<template>
    <Head title="ArtisanDirect" />

    <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="relative w-full max-w-7xl mx-auto p-6 lg:p-8">
            <header class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <Link :href="route('welcome')">
                        <img src="/images/logo.png" alt="ArtisanDirect Logo" class="h-12 w-auto" />
                    </Link>
                </div>
                <nav v-if="canLogin" class="flex items-center space-x-4">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </Link>

                    <template v-else>
                        <Link
                            :href="route('login')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </Link>

                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </Link>
                    </template>
                </nav>
            </header>

            <main class="mt-12">
                <!-- Hero Section -->
                <section class="bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-lg shadow-xl p-10 text-center relative overflow-hidden">
                    <div class="absolute inset-0 opacity-10">
                        <svg class="w-full h-full" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none">
                            <defs>
                                <pattern id="pat1" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <path d="M0 0h10v10H0zM10 10h10v10H10z" />
                                </pattern>
                            </defs>
                            <rect width="100%" height="100%" fill="url(#pat1)" />
                        </svg>
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-5xl font-extrabold leading-tight mb-4 animate-fade-in-down">
                            Discover Unique Handcrafted Treasures
                        </h1>
                        <p class="text-xl mb-8 opacity-90 animate-fade-in-up">
                            Support local artisans and find one-of-a-kind products made with passion and skill.
                        </p>
                        <div class="space-x-4 animate-fade-in-up">
                            <Link :href="route('register')" class="bg-white text-indigo-600 hover:bg-gray-100 px-8 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                Join as an Artisan
                            </Link>
                            <Link :href="route('login')" class="bg-indigo-700 text-white hover:bg-indigo-800 px-8 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                                Explore Products
                            </Link>
                        </div>
                    </div>
                </section>

                <!-- Artisans Section -->
                <section class="mt-16">
                    <h2 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-10">
                        Meet Our Talented Artisans
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/400x250/FFD700/FFFFFF?text=Artisan+1" alt="Artisan 1" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Crafty Hands Studio</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">Specializing in bespoke pottery and ceramic art, bringing unique designs to life.</p>
                                <Link href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">View Profile &rarr;</Link>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/400x250/FF6347/FFFFFF?text=Artisan+2" alt="Artisan 2" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Jewel Craft Masters</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">Handcrafted jewelry with precious stones and metals, perfect for any occasion.</p>
                                <Link href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">View Profile &rarr;</Link>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/400x250/6A5ACD/FFFFFF?text=Artisan+3" alt="Artisan 3" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2">Woodland Whimsy</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mb-4">Unique wooden sculptures and home decor, inspired by nature's beauty.</p>
                                <Link href="#" class="text-indigo-600 hover:text-indigo-800 font-medium">View Profile &rarr;</Link>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-12">
                        <Link href="#" class="bg-indigo-600 text-white hover:bg-indigo-700 px-8 py-4 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                            See All Artisans
                        </Link>
                    </div>
                </section>

                <!-- Popular Products Section -->
                <section class="mt-16 mb-16">
                    <h2 class="text-4xl font-extrabold text-center text-gray-900 dark:text-white mb-10">
                        Popular Handcrafted Products
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x200/ADD8E6/FFFFFF?text=Product+1" alt="Product 1" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">Hand-Painted Ceramic Mug</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mt-1 mb-2">$25.00</p>
                                <button class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition duration-300">Add to Cart</button>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x200/90EE90/FFFFFF?text=Product+2" alt="Product 2" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">Sterling Silver Pendant</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mt-1 mb-2">$75.00</p>
                                <button class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition duration-300">Add to Cart</button>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x200/FFB6C1/FFFFFF?text=Product+3" alt="Product 3" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">Hand-Carved Wooden Bowl</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mt-1 mb-2">$50.00</p>
                                <button class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition duration-300">Add to Cart</button>
                            </div>
                        </div>
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform transition duration-300 hover:scale-105">
                            <img src="https://via.placeholder.com/300x200/DDA0DD/FFFFFF?text=Product+4" alt="Product 4" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate">Artisan Soap Collection</h3>
                                <p class="text-gray-700 dark:text-gray-300 text-sm mt-1 mb-2">$30.00</p>
                                <button class="w-full bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition duration-300">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-12">
                        <Link href="#" class="bg-indigo-600 text-white hover:bg-indigo-700 px-8 py-4 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
                            View All Products
                        </Link>
                    </div>
                </section>
            </main>

            <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                <!-- Laravel version and PHP version removed -->
            </footer>
        </div>
    </div>
</template>

<style>
/* Add some simple animations */
@keyframes fade-in-down {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-down {
    animation: fade-in-down 1s ease-out;
}

.animate-fade-in-up {
    animation: fade-in-up 1s ease-out;
}
</style>
