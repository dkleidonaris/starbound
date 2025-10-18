<script setup>
const { locales, setLocale } = useI18n();
const switchLocalePath = useSwitchLocalePath();
const localePath = useLocalePath();
const { locale } = useI18n()
import Header from '~/components/Navigation/Header.vue';
import Footer from './components/Navigation/Footer.vue';

// Generate random star positions and sizes for the galaxy background
function starStyle(n) {
  const top = Math.random() * 100;
  const left = Math.random() * 100;
  const size = Math.random() * 4 + 1;
  const delay = Math.random() * 3;
  return {
    position: 'absolute',
    top: `${top}%`,
    left: `${left}%`,
    width: `${size}px`,
    height: `${size}px`,
    borderRadius: '50%',
    background: 'white',
    opacity: 0.8,
    boxShadow: `0 0 ${size * 4}px #fff`,
    animationDelay: `${delay}s`, // Only delay, no animation name
    zIndex: 0,
  }
}
</script>

<template>
  <UApp>
    <div>
      <ClientOnly>
        <div class="stars-bg">
          <div v-for="n in 40" :key="n" class="star animate-starFlash glow-sm glow-white" :style="starStyle(n)"></div>
        </div>
      </ClientOnly>
      <div class="relative z-10">
        <Header class="z-20 sticky top-0" />
        <NuxtPage />
        <Footer />
      </div>
    </div>
  </UApp>
</template>

<style scoped>
.stars-bg {
  position: fixed;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  pointer-events: none;
  z-index: 0;
  background: radial-gradient(ellipse at 60% 40%, #23234a 0%, #0a0a1a 100%);
}

.star {
  position: absolute;
}

.relative {
  position: relative;
  z-index: 10;
}
</style>
