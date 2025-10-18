<script setup>
import { ref } from 'vue';
import MenuItem from './MenuItem.vue';
const localePath = useLocalePath();
const { locale, locales, setLocale                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          } = useI18n();
const switchLocalePath = useSwitchLocalePath();

const menuItems = [
    { to: 'index', label: 'Αρχική', exact: true },
    { to: 'team', label: 'Η ομάδα μας' },
    { to: 'news', label: 'Νέα' },
    { to: 'supporters', label: 'Υποστηρικτές' },
    { to: 'contact', label: 'Επικοινωνία' },
];

const showMobileMenu = ref(false);
function toggleMobileMenu() {
    showMobileMenu.value = !showMobileMenu.value;
}
</script>

<template>
    <nav>
        <!-- Desktop Header -->
        <div class="hidden md:grid p-2 grid-cols-5 gap-4 bg-[#BCD1F9] text-[#322479] font-playfair">
            <div class="col-span-1 flex gap-4">
                <NuxtLink :to="localePath('index')">
                    <div class="flex gap-4">
                        <img src="~/assets/img/starbound_logo.svg" alt="Starbound Logo" class="h-24" />
                        <div class="flex flex-col justify-center items-center">
                            <h1 class="font-bold text-2xl">StarBound</h1>
                            <h2 class="text-sm text-nowrap">{{$t('tagline')}}</h2>
                        </div>
                    </div>
                </NuxtLink>
            </div>
            <div class="col-span-3 flex gap-10 text-xl justify-center items-center ml-8">
                <MenuItem v-for="item in menuItems" :key="item.to" :to="item.to" :label="item.label"
                    :exact="item.exact" />
                <a href="#" class="p-4 py-1 bg-blue-900 text-white rounded-full transition hover:bg-blue-600">{{
                    $t('Γίνε μέλος') }}</a>
            </div>
            <div class="col-span-1 ml-auto flex gap-2 items-center">
                <a href="https://www.uth.gr" target="_blank"><img :src="`/img/uth_logo_${locale}.svg`" alt="UTH Logo"
                        class="h-20 mr-4"></a>
                <NuxtLink v-for="loc in locales" :key="loc.code" :to="switchLocalePath(loc.code)"
                    @click="setLocale(loc.code)" class="cursor-pointer">
                    <img :src="`/img/flags/${loc.code}.svg`" :alt="loc.code" class="h-6 w-9 object-cover" />
                </NuxtLink>
            </div>
        </div>

        <!-- Mobile Header -->
        <div class="md:hidden flex items-center justify-between bg-[#BCD1F9] text-[#322479] font-playfair p-2">
            <NuxtLink :to="localePath('index')" class="flex gap-2 items-center">
                <img src="~/assets/img/starbound_logo.svg" alt="Starbound Logo" class="h-14" />
                <div class="flex flex-col justify-center items-start">
                    <h1 class="font-bold text-lg">StarBound</h1>
                    <h2 class="text-xs">Μια Φοιτητική Ομάδα Αεροδιαστημικής Έρευνας</h2>
                </div>
            </NuxtLink>
            <div class="flex items-center gap-2">
                <a href="https://www.uth.gr" target="_blank">
                    <img :src="`/img/uth_logo_${locale}.svg`" alt="UTH Logo" class="h-10" />
                </a>
                <!-- Hamburger Icon -->
                <button @click="toggleMobileMenu" class="ml-2 focus:outline-none">
                    <svg width="32" height="32" fill="none" viewBox="0 0 24 24">
                        <rect y="5" width="24" height="2" rx="1" fill="#322479" />
                        <rect y="11" width="24" height="2" rx="1" fill="#322479" />
                        <rect y="17" width="24" height="2" rx="1" fill="#322479" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <transition name="fade">
            <div v-if="showMobileMenu"
                class="md:hidden fixed inset-0 bg-[#BCD1F9] bg-opacity-95 z-50 flex flex-col items-center pt-24">
                <button @click="toggleMobileMenu"
                    class="absolute top-6 right-6 text-3xl text-[#322479]">&times;</button>
                <div class="flex flex-col gap-6 text-xl items-center">
                    <MenuItem v-for="item in menuItems" :key="item.to" :to="item.to" :label="item.label"
                        :exact="item.exact" @click="toggleMobileMenu()" />
                    <a href="#" class="p-4 py-1 bg-blue-900 text-white rounded-full transition hover:bg-blue-600">{{
                        t('Γίνε μέλος') }}</a>
                    <div class="flex gap-2 mt-4">
                        <NuxtLink v-for="loc in locales" :key="loc.code" :to="switchLocalePath(loc.code)"
                            @click="setLocale(loc.code); toggleMobileMenu()" class="cursor-pointer">
                            <img :src="`/img/flags/${loc.code}.svg`" :alt="loc.code" class="h-6 w-9 object-cover" />
                        </NuxtLink>
                    </div>
                </div>
            </div>
        </transition>
    </nav>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>