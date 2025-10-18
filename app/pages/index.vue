<script setup>
import { ref, onMounted } from 'vue';
import CountUp from 'vue-countup-v3';
import { format } from 'date-fns';
import { el, enUS } from 'date-fns/locale';

const apiBase = useRuntimeConfig().public.apiBase;
const { locale } = useI18n();
const dateLocale = locale.value === 'el' ? el : enUS;

const { data: membersNumber } = await useFetch(`${apiBase}/members/count`, {
    transform: (res) => res.count,
    default: () => 0,
});

const { data: supportersNumber } = await useFetch(`${apiBase}/supporters/count`, {
    transform: (res) => res.count,
    default: () => 0,
});

const { data: milestones } = await useFetch(`${apiBase}/milestones`, {
    transform: (res) => res.data,
    default: () => [],
});

const missionCards = ref([]);
let observer;
function onIntersect(entries) {
    // console.log('Intersecting', entries);
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            const index = missionCards.value.indexOf(entry.target)
            const delay = index * 150 // stagger: 150ms between cards

            entry.target.style.transitionDelay = `${delay}ms`
            entry.target.classList.remove('opacity-0', 'translate-y-8')
            entry.target.classList.add('opacity-100', 'translate-y-0')

            observer.unobserve(entry.target)
        }
    })
}

onMounted(() => {
    observer = new IntersectionObserver(onIntersect, { threshold: 0.2 })
    missionCards.value.forEach((el) => observer.observe(el))
})

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
const { data: fetchedEvents } = await useFetch(`${apiBase}/events`, {
    transform: (res) => res.data,
    default: () => [],
});
const events = ref(fetchedEvents.value);

const years = Math.round(new Date().getFullYear() - new Date('2024-5-30').getFullYear());
</script>

<template>
    <div>
        <div class="h-screen bg-[url('/img/starry_bg.jpg')] bg-cover bg-fixed">
            <div class="flex flex-col gap-6 backdrop-blur-[2px] h-full justify-center items-center p-4">
                <img src="~/assets/img/starbound_logo.svg" alt="StarBound Logo"
                    class="mx-auto w-1/2 md:w-[200px] animate-pulseZoom" />
                <p class="text-[#7761e0] text-center text-4xl md:text-6xl font-bold tracking-wide text-shadow-md">Bound
                    for
                    the Stars,
                </p>
                <p class="text-[#7761e0] text-center text-4xl md:text-6xl font-bold tracking-wide text-shadow-lg">Driven
                    by
                    Innovation
                </p>
                <p class="text-xl text-white text-justify mx-auto max-w-3xl">StarBound is a student-led aerospace
                    research
                    team
                    based in Volos, Greece. Its focus is on innovation and research in space technology.</p>
            </div>
        </div>
        <div class="bg-gray-900 text-white p-4 md:p-20">
            <div class="grid md:grid-cols-2 gap-8 max-w-[1500px] mx-auto">
                <div class="flex flex-col gap-4 text-justify">
                    <h3>Η αποστολή μας</h3>
                    <p>Είμαστε αφοσιωμένοι στην πρόοδο της διαστημικής τεχνολογίας και στη δημιουργία ενδιαφέροντος γύρω
                        από
                        τον κλάδο του διαστήματος. Οραματιζόμαστε τη δημιουργία ενός σύγχρονου, καινοτόμου εκπαιδευτικού
                        κέντρου που συνδέει τη θεωρία με την πρακτική εμπειρία. Η ομάδα μας αποτελείται από μέλη από
                        πολλαπλά τμήματα, όλα συνεργάζονται για τη δημιουργία και την προώθηση σημαντικών
                        διεπιστημονικών
                        έργων. Συνδυάζοντας διαφορετικά ακαδημαϊκά υπόβαθρα και σύνολα δεξιοτήτων, μπορούμε να
                        προσεγγίσουμε
                        τις προκλήσεις από πολλαπλές οπτικές και να αναπτύξουμε ολοκληρωμένες, αποτελεσματικές λύσεις.
                    </p>
                    <p>Εδώ είναι τα τμήματα που συμβάλλουν στις πρωτοβουλίες μας υπό την υποστήριξη του τοπικού
                        φοιτητικού
                        παραρτήματος IEEE:</p>
                    <ul class="list-disc list-inside">
                        <li>Τμήμα Ηλεκτρολόγων & Μηχανικών Υπολογιστών</li>
                        <li>Τμήμα Μηχανολόγων Μηχανικών</li>
                        <li>Τμήμα Οικονομικών Επιστημών</li>
                        <li>Τμήμα Πληροφορικής & Τηλεπικοινωνιών</li>
                        <li>Τμήμα Διοίκησης Επιχειρήσεων</li>
                        <li>Παιδαγωγικό Τμήμα Δημοτικής Εκπαίδευσης</li>
                        <li>Τμήμα Βιοχημείας & Βιοτεχνολογίας</li>
                        <li>Τμήμα Πολιτικών Μηχανικών</li>
                        <li>Τμήμα Ψηφιακών Συστημάτων</li>
                        <li>Παιδαγωγικό Τμήμα Προσχολικής Εκπαίδευσης</li>
                    </ul>
                </div>
                <ClientOnly>
                    <div class="grid md:grid-cols-2 gap-4" v-intersect="onIntersect">
                        <MissionCard icon="mingcute:rocket-fill" heading="Έρευνα & Καινοτομία">
                            Διεξαγωγή πρωτοποριακής έρευνας σε συστήματα πρόωσης, επιστήμη υλικών και αεροδιαστημική
                            μηχανική.
                        </MissionCard>
                        <MissionCard icon="mdi:academic-cap" heading="Εκπαίδευση & Κατάρτιση">
                            Διοργάνωση εκπαιδευτικών εκδηλώσεων για τα μέλη της ομάδας καθώς και ανοιχτών σεμιναρίων για
                            τη
                            διάδοση γνώσεων σε τεχνικές και κοινωνικές δεξιότητες.
                        </MissionCard>
                        <MissionCard icon="ri:team-fill" heading="Συνεργασία">
                            Συνεργασία με ακαδημαϊκά ιδρύματα, πρωτοπόρους του κλάδου και διαστημικούς οργανισμούς για
                            τη
                            διεύρυνση της εμβέλειας και του αντίκτυπού μας.
                        </MissionCard>
                        <MissionCard icon="fluent:globe-20-filled" heading="Βιωσιμότητα">
                            Στόχος μας είναι η ανάπτυξη επαναχρησιμοποιήσιμων και βιώσιμων τεχνολογιών για τη διαστημική
                            εξερεύνηση και τις διαστημικές αποστολές.
                        </MissionCard>
                    </div>
                </ClientOnly>

            </div>
            <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
            <div class="flex flex-col md:flex-row items-center justify-around my-12">
                <div class="flex flex-col items-center gap-4">
                    <CountUp :end-val="membersNumber" :duration="3"
                        :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
                        class="text-6xl font-bold text-[#865BE1]" />
                    <p>{{ $t("ΜΕΛΗ ΟΜΑΔΑΣ") }}</p>
                </div>
                <div class="flex flex-col items-center gap-4">
                    <count-up :end-val="2" :duration="2" :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
                        class="text-6xl font-bold text-[#865BE1]" />
                    <p>{{ $t("ΕΝΕΡΓΑ ΕΡΓΑ") }}</p>
                </div>
                <div class="flex flex-col items-center gap-4">
                    <count-up :end-val="supportersNumber" :duration="4"
                        :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
                        class="text-6xl font-bold text-[#865BE1]" />
                    <p>{{ $t("ΣΥΝΕΡΓΑΖΟΜΕΝΟΙ ΟΡΓΑΝΙΣΜΟΙ") }}</p>
                </div>
                <div class="flex flex-col items-center gap-4">
                    <count-up :end-val="years" :duration="4" :options="{ enableScrollSpy: true, scrollSpyOnce: true }"
                        class="text-6xl font-bold text-[#865BE1]" />
                    <p>{{ $t("ΧΡΟΝΙΑ") }}</p>
                </div>
            </div>
            <hr class="my-12 h-0.5 border-t-0 bg-neutral-100 dark:bg-white/10" />
        </div>
        <section class="bg-[#17191E] py-16">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-white mb-12">{{ $t('Η πορεία μας') }}</h2>

                <div>
                    <!-- Timeline horizontal line with gradient -->
                    <div class="h-1 bg-gradient-to-r from-purple-500 via-purple-600 to-purple-700">
                    </div>

                    <!-- Scrollable container -->
                    <div class="flex gap-4 overflow-x-scroll">
                        <MilestoneCard v-for="m in milestones" :key="m.id" :milestone="m" />
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-[#17191E] py-16">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-4xl font-bold text-center text-white mb-12">{{ $t('Προσεχείς Εκδηλώσεις') }}</h2>
                <!-- Events list: one row per event, clickable to open details -->
                <div class="max-w-[800px] mx-auto">
                    <div v-if="events.length === 0" class="text-center text-gray-400">No upcoming events</div>
                    <div v-else class="space-y-2 max-h-[60vh] overflow-y-auto pr-2">
                        <div v-for="ev in events" :key="ev.id"
                            class="bg-[#232530] rounded-lg p-4 text-white hover:bg-[#2a2b35] cursor-pointer transition"
                            @click="openEvent(ev)">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="text-sm text-gray-300">{{ new Date(ev.start_date).toLocaleDateString()
                                    }} — {{ format(new Date(ev.start_date), 'HH:mm') }}</div>
                                    <div class="text-xl font-semibold">{{ ev.title[locale] }}</div>
                                    <div class="text-sm text-gray-400">{{ ev.location[locale] }}</div>
                                </div>
                                <div class="text-gray-400">&rsaquo;</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Event modal -->
                <div v-if="showEventModal"
                    class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-60">
                    <div class="bg-[#111216] rounded-lg p-6 max-w-lg w-full mx-4">
                        <div class="flex justify-between items-start">
                            <h3 class="text-2xl text-white font-semibold">{{ selectedEvent?.title[locale] }}</h3>
                            <button @click="closeEvent" class="text-gray-400 text-2xl">&times;</button>
                        </div>
                        <div class="mt-4 text-gray-300">
                            <p class="mb-2"><strong>{{ $t('Ημερομηνία') }}:</strong> {{ format(new
                                Date(selectedEvent?.start_date),
                                "PPP",
                                { locale: dateLocale }) }}</p>
                            <p class="mb-2"><strong>{{ $t('Ώρα') }}:</strong> {{ format(new
                                Date(selectedEvent?.start_date),
                                "HH:mm",
                                { locale: dateLocale }) }}</p>
                            <p class="mb-2"><strong>{{ $t('Τοποθεσία') }}:</strong> {{ selectedEvent?.location[locale]
                                }}
                            </p>
                            <p class="mt-4">{{ selectedEvent?.description[locale] }}</p>
                        </div>
                        <div class="mt-6 text-right">
                            <button @click="closeEvent" class="px-4 py-2 bg-cyan-600 rounded">Close</button>
                        </div>
                    </div>
                </div>

            </div>
        </section>

    </div>
</template>