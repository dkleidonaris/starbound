<script setup>
const config = useRuntimeConfig();
const { locale } = useI18n();

const apiBase = config.public.apiBase;

const pageLoading = usePageLoading();
pageLoading.value = true;

useSeoMeta({
  title: $t("Η ομάδα μας"),
});

const {
  data: teams,
  pending: teamsPending,
  error: teamsError,
} = await useFetch(`${apiBase}/teams`, {
  transform: (res) => res.data,
  default: () => [],
  server: false,
});

const {
  data: members,
  pending: membersPending,
  error: membersError,
} = await useFetch(`${apiBase}/members`, {
  transform: (res) => res.data,
  default: () => [],
  server: false,
});

const {
  data: departments,
  pending: departmentsPending,
  error: departmentsError,
} = await useFetch(`${apiBase}/departments`, {
  transform: (res) => res.data,
  default: () => [],
  server: false,
});

const pending = computed(
  () => teamsPending.value || membersPending.value || departmentsPending.value,
);

const error = computed(
  () => teamsError.value || membersError.value || departmentsError.value,
);

watch(
  pending,
  (newVal) => {
    pageLoading.value = newVal;
  },
  { immediate: true },
);

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
      <div></div>
      <div class="flex flex-col gap-8">
        <div
          v-for="team in teams"
          :key="`team-${team.id}`"
          class="bg-[#131422] rounded-md shadow-md p-4 glow-sm hover:glow transition hover:-translate-y-1 glow-cyan-300"
        >
          <div class="flex items-center gap-2 mb-4">
            <div
              class="w-1 h-8 rounded-md shadow-md"
              :class="colors[team.slug]?.bg || 'bg-gray-500'"
            ></div>
            <h2 class="text-white">{{ team.name[locale] }}</h2>
          </div>
          <div class="grid md:grid-cols-4 gap-8">
            <MemberCard
              v-for="member in members
                .filter((m) => m.team_id == team.id)
                .slice()
                .sort((a, b) => {
                  const orderA = a.order ?? 999;
                  const orderB = b.order ?? 999;

                  if (orderA !== orderB) {
                    return orderA - orderB;
                  }

                  const lastA = a.last_name?.[locale] || '';
                  const lastB = b.last_name?.[locale] || '';

                  return lastA.localeCompare(lastB, locale);
                })"
              :key="`member-${member.id}`"
              :member="member"
              :department="
                departments.find((d) => d.id === member.department_id)
              "
              :colors="colors[team.slug] || colors.default"
              :skeleton="pending"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
