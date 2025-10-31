<script setup>
const config = useRuntimeConfig();
const { locale } = useI18n();

const apiBase = config.public.apiBase;

const dataPending = ref(true);
const dataError = ref(null);

const teams = ref([]);
const members = ref([]);
const departments = ref([]);

onMounted(async () => {
  dataPending.value = true;
  try {
    const [teamsRes, membersRes, departmentsRes] = await Promise.all([
      $fetch(`${apiBase}/teams`).then((r) => r.data),
      $fetch(`${apiBase}/members`).then((r) => r.data),
      $fetch(`${apiBase}/departments`).then((r) => r.data),
    ]);
    teams.value = teamsRes;
    members.value = membersRes;
    departments.value = departmentsRes;
  } catch (err) {
    dataError.value = err;
  } finally {
    dataPending.value = false;
  }
});

const colors = {
  professors: { glow: "glow-red-600", text: "text-red-600", bg: "bg-red-600" },
  board: {
    glow: "glow-purple-600",
    text: "text-purple-600",
    bg: "bg-purple-600",
  },
  software: { glow: "glow-cyan-600", text: "text-cyan-600", bg: "bg-cyan-600" },
  electrical: {
    glow: "glow-yellow-600",
    text: "text-yellow-600",
    bg: "bg-yellow-600",
  },
  mechanical: {
    glow: "glow-green-600",
    text: "text-green-600",
    bg: "bg-green-600",
  },
  finance: { glow: "glow-blue-600", text: "text-blue-600", bg: "bg-blue-600" },
  marketing: {
    glow: "glow-pink-600",
    text: "text-pink-600",
    bg: "bg-pink-600",
  },
  website: {
    glow: "glow-orange-600",
    text: "text-orange-600",
    bg: "bg-orange-600",
  },
  activities: {
    glow: "glow-lime-600",
    text: "text-lime-600",
    bg: "bg-lime-600",
  },
};
</script>

<template>
  <div>
    <h1 class="text-center my-4 text-cyan-400 glow-sm glow-cyan-300">
      {{ $t("Η ομάδα μας") }}
    </h1>
    <div class="max-w-[1200px] mx-auto p-2">
      <div v-if="dataPending">
        <div
          class="bg-[#131422] rounded-md shadow-md p-4 glow-sm hover:glow transition hover:-translate-y-1 glow-cyan-300"
        >
          <div class="flex items-center gap-2 mb-4">
            <div
              class="w-1 h-[2rem] rounded-md shadow-md"
              :class="Object.values(colors)[0].bg"
            ></div>
            <h2 class="animate-pulse bg-gray-500 rounded-sm"><span class="invisible">Team Name</span></h2>
          </div>
          <div class="grid md:grid-cols-4 gap-8">
            <div
              v-for="n in 8"
              :key="`skeleton-${n}`"
              class="flex flex-col items-center gap-1"
            >
              <img
                src="~/assets/img/profile-placeholder.png"
                alt="Profile Placeholder"
                class="mx-auto w-40 aspect-square animate-pulse"
              />
              <div class="bg-gray-500 animate-pulse rounded-sm">
                <p class="invisible">Member Name</p>
              </div>
              <div class="bg-gray-500 animate-pulse rounded-sm">
                <p class="invisible">Role of Member</p>
              </div>
              <div class="bg-gray-500 animate-pulse rounded-sm">
                <p class="invisible">Department Name</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div v-else class="flex flex-col gap-8">
        <div
          v-for="team in teams"
          :key="`team-${team.id}`"
          class="bg-[#131422] rounded-md shadow-md p-4 glow-sm hover:glow transition hover:-translate-y-1 glow-cyan-300"
        >
          <div class="flex items-center gap-2 mb-4">
            <div
              class="w-1 h-[2rem] rounded-md shadow-md"
              :class="colors[team.slug].bg"
            ></div>
            <h2 class="text-white">{{ team.name[locale] }}</h2>
          </div>
          <div class="grid md:grid-cols-4 gap-8">
            <MemberCard
              v-for="member in members.filter((m) => m.team_id == team.id)"
              :key="`member-${member.id}`"
              :member="member"
              :department="
                departments.find((d) => d.id === member.department_id)
              "
              :colors="colors[team.slug]"
              :skeleton="dataPending"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
