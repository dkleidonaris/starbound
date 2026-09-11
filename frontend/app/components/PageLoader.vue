<template>
    <transition name="fade">
        <div v-if="loading" class="fixed inset-0 z-50 flex items-center justify-center bg-[#131421]">
            <img src="~/assets/img/starbound_logo.svg" alt="Starbound Logo" class="w-[400px] animate-pulseZoom" />
        </div>
    </transition>
</template>

<script setup>
const loading = usePageLoading()
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.4s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
