<script setup>
import { ref, onMounted } from "vue";
import CountUp from "vue-countup-v3";
import { format } from "date-fns";
import { el, enUS } from "date-fns/locale";
const localePath = useLocalePath();

const pageLoading = usePageLoading();
pageLoading.value = false;

const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
const dateLocale = locale.value === "el" ? el : enUS;

const { data: membersNumber } = await useFetch(`${apiBase}/members/count`, {
  server: false,
  transform: (res) => res.count,
  default: () => 0,
  lazy: true,
});

const { data: supportersNumber } = await useFetch(
  `${apiBase}/supporters/count`,
  {
    server: false,
    transform: (res) => res.count,
    default: () => 0,
    lazy: true,
  },
);
const { data: supporters } = await useFetch(`${apiBase}/supporters`, {
  server: false,
  lazy: true,
  transform: (res) => res.data,
  default: () => [],
});

const { data: milestones } = await useFetch(`${apiBase}/milestones`, {
  server: false,
  lazy: true,
  transform: (res) => res.data,
  default: () => [],
});

const missionCards = ref([]);
let observer;
function onIntersect(entries) {
  // console.log('Intersecting', entries);
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const index = missionCards.value.indexOf(entry.target);
      const delay = index * 150; // stagger: 150ms between cards

      entry.target.style.transitionDelay = `${delay}ms`;
      entry.target.classList.remove("opacity-0", "translate-y-8");
      entry.target.classList.add("opacity-100", "translate-y-0");

      observer.unobserve(entry.target);
    }
  });
}

onMounted(() => {
  observer = new IntersectionObserver(onIntersect, { threshold: 0.2 });
  missionCards.value.forEach((el) => observer.observe(el));
});

const selectedEvent = ref(null);
const showEventModal = ref(false);

function openEvent(ev) {
  selectedEvent.value = ev;
  showEventModal.value = true;
}

function closeEvent() {
  selectedEvent.value = null;
  showEventModal.value = false;
}

// Attempt to load events from API (non-breaking: keeps fallback events if fetch fails or returns empty)
const { data: events } = await useFetch(`${apiBase}/events`, {
  server: false,
  transform: (res) => res.data,
  default: () => [],
});

const years = Math.round(
  new Date().getFullYear() - new Date("2023-5-30").getFullYear(),
);
</script>

<template>
  <div>
    <div class="h-screen bg-[url('/img/starry_bg.jpg')] bg-cover bg-fixed">
      <div
        class="flex flex-col gap-6 backdrop-blur-[2px] h-full justify-center items-center p-4"
      >
        <img
          src="~/assets/img/starbound_logo.svg"
          alt="StarBound Logo"
          class="mx-auto w-1/2 md:w-[200px] animate-pulseZoom"
        />
        <p
          class="text-[#7761e0] text-center text-4xl md:text-6xl font-bold tracking-wide text-shadow-sm text-shadow-gray-200"
        >
          {{ $t("headings.homepage.title1") }}
        </p>
        <p
          class="text-[#7761e0] text-center text-4xl md:text-6xl font-bold tracking-wide text-shadow-sm text-shadow-gray-200"
        >
          {{ $t("headings.homepage.title2") }}
        </p>
        <p class="text-xl text-white text-center mx-auto max-w-3xl">
          {{ $t("headings.homepage.description") }}
        </p>
      </div>
    </div>
    <div class="bg-gray-900 text-white p-4 md:p-20">
      <div class="grid md:grid-cols-2 gap-8 max-w-[1500px] mx-auto">
        <div class="flex flex-col gap-4 text-justify">
          <h3>{{ $t("homepage.mission.title") }}</h3>
          <p>{{ $t("homepage.mission.paragraphs.0") }}</p>
          <p>{{ $t("homepage.mission.paragraphs.1") }}</p>
          <ul class="list-disc list-inside">
            <li v-for="d in $tm('homepage.mission.departments')" :key="d">
              {{ $rt(d) }}
            </li>
          </ul>
        </div>
        <ClientOnly>
          <div class="grid md:grid-cols-2 gap-4">
            <MissionCard
              v-for="m in $tm('homepage.mission.cards')"
              :icon="$rt(m.icon)"
              :heading="$rt(m.title)"
            >
              {{ $rt(m.description) }}
            </MissionCard>
          </div>
        </ClientOnly>
      </div>
    </div>
    <section class="bg-[#17192F] py-16">
      <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
      <div
        class="flex flex-col md:flex-row items-center justify-around my-12 text-white"
      >
        <div class="flex flex-col items-center gap-4">
          <CountUp
            :end-val="membersNumber"
            :duration="3"
            :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
            class="text-6xl font-bold text-[#865BE1]"
          />
          <p>{{ $t("ΜΕΛΗ ΟΜΑΔΑΣ") }}</p>
        </div>
        <div class="flex flex-col items-center gap-4">
          <count-up
            :end-val="supportersNumber"
            :duration="4"
            :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
            class="text-6xl font-bold text-[#865BE1]"
          />
          <p>{{ $t("ΣΥΝΕΡΓΑΖΟΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ") }}</p>
        </div>
        <div class="flex flex-col items-center gap-4">
          <count-up
            :end-val="years"
            :duration="4"
            :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
            class="text-6xl font-bold text-[#865BE1]"
          />
          <p>{{ $t("ΧΡΟΝΙΑ") }}</p>
        </div>
      </div>
      <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
    </section>
    <section
      class="bg-[#17191E] py-16 bg-[url('/img/team_bg.jpg')] bg-cover bg-top"
    >
      <h2 class="text-4xl font-bold text-center text-white mb-12 mt-16">
        {{ $t("Η ομάδα μας") }}
      </h2>
      <div class="flex justify-center">
        <NuxtLink
          :to="localePath('team-season')"
          class="bg-blue-500 text-center mx-auto text-white p-2 rounded-md mb-8 hover:underline"
        >
          {{ $t("Δείτε όλα τα μέλη") }}
        </NuxtLink>
      </div>
    </section>
    <section>
      <div class="max-w-7xl mx-auto px-4 py-16">
        <h2 class="text-4xl font-bold text-center text-white mb-12">
          {{ $t("Υποστηρικτές") }}
        </h2>
        <div class="flex gap-8 items-center justify-around flex-wrap">
          <div
            v-for="supporter in supporters.slice(0, 5)"
            :key="`supporter-${supporter.id}`"
            class="flex flex-col items-center gap-4 w-20 aspect-square"
          >
            <img
              :src="supporter.logo_url"
              :alt="supporter.name"
              class="h-20 object-contain p-1"
              :class="{
                'bg-white': supporter.bg,
              }"
            />
            <p class="text-white text-center">{{ supporter.name[locale] }}</p>
          </div>
        </div>
        <NuxtLink
          :to="localePath('supporters')"
          class="bg-blue-500 text-center mx-auto text-white p-2 rounded-md mt-8 hover:underline block w-max"
        >
          {{ $t("Δείτε όλους τους υποστηρικτές") }}
        </NuxtLink>
      </div>
    </section>
    <section class="bg-[#17191E] py-16">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-white mb-12">
          {{ $t("Η πορεία μας") }}
        </h2>

        <div>
          <!-- Timeline horizontal line with gradient -->
          <div
            class="h-1 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700"
          ></div>

          <!-- Scrollable container -->
          <div class="flex gap-4 overflow-x-auto">
            <MilestoneCard v-for="m in milestones" :key="m.id" :milestone="m" />
          </div>
        </div>
      </div>
    </section>
    <section class="bg-[#17192A] py-16">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-4xl font-bold text-center text-white mb-12">
          {{ $t("Προσεχείς Εκδηλώσεις") }}
        </h2>
        <!-- Events list: one row per event, clickable to open details -->
        <div class="max-w-[800px] mx-auto">
          <div v-if="events.length === 0" class="text-center text-gray-400">
            No upcoming events
          </div>
          <div v-else class="space-y-2 max-h-[60vh] overflow-y-auto pr-2">
            <div
              v-for="ev in events"
              :key="ev.id"
              class="bg-[#232530] rounded-lg p-4 text-white hover:bg-[#2a2b35] cursor-pointer transition"
              :class="{
                'border border-green-500 bg-green-900 hover:bg-green-800':
                  new Date() > new Date(ev.end_date),
              }"
              @click="openEvent(ev)"
            >
              <div class="flex items-center justify-between">
                <div>
                  <div class="text-sm text-gray-300">
                    {{ new Date(ev.start_date).toLocaleDateString() }} —
                    {{ format(new Date(ev.start_date), "HH:mm") }}
                  </div>
                  <div class="text-xl font-semibold">
                    {{ ev.title[locale] }}
                  </div>
                  <div class="text-sm text-gray-400">
                    {{ ev.location[locale] }}
                  </div>
                </div>
                <Icon
                  v-if="new Date() > new Date(ev.end_date)"
                  name="lets-icons:done-duotone"
                  class="size-10"
                />
                <Icon
                  v-else
                  name="line-md:arrow-up-circle"
                  class="rotate-90 size-10"
                />
              </div>
            </div>
          </div>
        </div>

        <!-- Event modal -->
        <div
          v-if="showEventModal"
          class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60"
        >
          <div class="bg-[#111216] rounded-lg p-6 max-w-lg w-full mx-4">
            <div class="flex justify-between items-start">
              <h3 class="text-2xl text-white font-semibold">
                {{ selectedEvent?.title[locale] }}
              </h3>
              <button
                @click="closeEvent"
                class="cursor-pointer text-gray-400 text-2xl"
              >
                &times;
              </button>
            </div>
            <div class="mt-4 text-gray-300">
              <p class="mb-2">
                <strong>{{ $t("Ημερομηνία") }}:</strong>
                {{
                  format(new Date(selectedEvent?.start_date), "PPP", {
                    locale: dateLocale,
                  })
                }}
              </p>
              <p class="mb-2">
                <strong>{{ $t("Ώρα") }}:</strong>
                {{
                  format(new Date(selectedEvent?.start_date), "HH:mm", {
                    locale: dateLocale,
                  })
                }}
              </p>
              <p class="mb-2">
                <strong>{{ $t("Τοποθεσία") }}:</strong>
                {{ selectedEvent?.location[locale] }}
              </p>
              <p class="mt-4">{{ selectedEvent?.description[locale] }}</p>
            </div>
            <div class="mt-6 text-right">
              <button
                @click="closeEvent"
                class="px-4 py-2 bg-cyan-600 rounded cursor-pointer"
              >
                {{ $t("Κλείσιμο") }}
              </button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
