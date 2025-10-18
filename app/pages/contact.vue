<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from "vue";
const apiBase = useRuntimeConfig().public.apiBase;

// Placeholder: put your background image in `assets/img/contact-bg.jpg`
const bgPath = "/assets/img/contact-bg.jpg";

const hero = ref<HTMLElement | null>(null);
const sent = ref(false);

const form = ref({ name: "", email: "", message: "" });

async function onSubmit() {
  const res = await $fetch(`${apiBase}/contact-messages`, {
    method: "POST",
    body: form.value,
  });
}

// reactive inline style for background-image so Nuxt can resolve the asset path at build time
const bgStyle = ref({
  backgroundImage: `url('${bgPath}')`,
  backgroundPosition: "center 0px",
});

let rafId: number | null = null;

function onScroll() {
  if (!hero.value) return;
  const scrolled = window.scrollY;
  // small parallax factor for subtle movement
  const factor = 0.2;
  const y = Math.round(scrolled * factor);
  bgStyle.value.backgroundPosition = `center ${-y}px`;
}

onMounted(() => {
  // only enable the JS parallax on wider screens; mobile browsers may handle bg-attachment poorly
  if (window.innerWidth > 768) {
    const loop = () => {
      onScroll();
      rafId = requestAnimationFrame(loop);
    };
    rafId = requestAnimationFrame(loop);
  }
});

onBeforeUnmount(() => {
  if (rafId) cancelAnimationFrame(rafId);
});
</script>

<template>
  <section
    ref="hero"
    class="min-h-[70vh] py-16 bg-cover bg-center bg-fixed flex items-center"
    :style="bgStyle"
  >
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Contact form box -->
        <div
          class="bg-white/90 dark:bg-slate-900/80 shadow-lg rounded-lg p-6 md:p-10 backdrop-blur-sm"
        >
          <h2 class="text-2xl font-semibold mb-4">Get in touch</h2>
          <p class="text-sm text-slate-600 mb-6">
            Send us a message and we'll get back to you shortly.
          </p>

          <form @submit.prevent="onSubmit" class="space-y-4">
            <div>
              <label class="block text-sm font-medium mb-1">Name</label>
              <input
                v-model="form.name"
                type="text"
                required
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
              />
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Email</label>
              <input
                v-model="form.email"
                type="email"
                required
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
              />
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Message</label>
              <textarea
                v-model="form.message"
                rows="5"
                required
                class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
              ></textarea>
            </div>

            <div>
              <button
                type="submit"
                class="inline-flex items-center justify-center bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700"
              >
                Send message
              </button>
            </div>
          </form>

          <p v-if="sent" class="mt-4 text-sm text-green-600">
            Message prepared (demo) — implement a backend to actually send.
          </p>
        </div>

        <!-- Contact details + map -->
        <div
          class="bg-white/90 dark:bg-slate-900/80 shadow-lg rounded-lg p-6 md:p-10 backdrop-blur-sm flex flex-col gap-4"
        >
          <div>
            <h3 class="text-xl font-semibold mb-2">
              {{ $t("Στοιχεία επικοινωνίας") }}
            </h3>
            <div class="flex gap-2 items-center mb-2">
              <Icon name="mdi:location" class="w-8 h-8" />
              <span>{{ $t("address.line1") }}</span>
            </div>
            <div class="flex gap-2 items-center mb-2">
              <Icon name="mdi:building" class="w-8 h-8" />
              <span>{{ $t("address.line2") }}</span>
            </div>
            <div class="flex gap-2 items-center mb-2">
              <Icon name="mdi:building" class="w-8 h-8" />
              <a href="mailto:starbound.teamuth@gmail.com"
                >starbound.teamuth@gmail.com</a
              >
            </div>
          </div>

          <div class="flex-1 mt-2 overflow-hidden rounded">
            <!-- Placeholder Google Map iframe - replace with your own embed key / settings -->
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d917.1168339334962!2d22.929618613236553!3d39.3607421434661!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14a76c72b7ed999b%3A0x451739b3833fb3a7!2sDept.%20of%20Electrical%20and%20Computer%20Engineering%2C%20University%20of%20Thessaly!5e0!3m2!1sen!2sgr!4v1760783506339!5m2!1sen!2sgr"
              width="600"
              height="450"
              style="border: 0"
              loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"
            ></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
/* Fallbacks and small polish */
.container {
  max-width: 1100px;
}

/* Ensure background is fixed for a parallax-ish look on supporting browsers */
section[ref] {
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}

@media (max-width: 768px) {
  /* Mobile: don't try to fix the bg (some mobile browsers ignore it) */
  section[ref] {
    background-attachment: scroll;
  }
}
</style>
