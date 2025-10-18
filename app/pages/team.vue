<script setup>
const config = useRuntimeConfig()
const { locale } = useI18n()

const apiBase = config.public.apiBase

const { data: teams, pending: teamsPending, error: teamsError } = await useFetch(`${apiBase}/teams`, {
    transform: (res) => res.data,
    default: () => [],
})

const { data: members, pending: membersPending, error: membersError } = await useFetch(`${apiBase}/members`, {
    transform: (res) => res.data,
    default: () => [],
})

const { data: departments, pending: departmentsPending, error: departmentsError } = await useFetch(`${apiBase}/departments`, {
    transform: (res) => res.data,
    default: () => [],
})

const colors = {
    "professors": { glow: "glow-red-600", text: "text-red-600", bg: "bg-red-600" },
    "board": { glow: "glow-purple-600", text: "text-purple-600", bg: "bg-purple-600" },
    "software": { glow: "glow-cyan-600", text: "text-cyan-600", bg: "bg-cyan-600" },
    "electrical": { glow: "glow-yellow-600", text: "text-yellow-600", bg: "bg-yellow-600" },
    "mechanical": { glow: "glow-green-600", text: "text-green-600", bg: "bg-green-600" },
    "finance": { glow: "glow-blue-600", text: "text-blue-600", bg: "bg-blue-600" },
    "marketing": { glow: "glow-pink-600", text: "text-pink-600", bg: "bg-pink-600" },
    "website": { glow: "glow-orange-600", text: "text-orange-600", bg: "bg-orange-600" },
    "activities": { glow: "glow-lime-600", text: "text-lime-600", bg: "bg-lime-600" }
};

console.log(departments.value.find(d => d.id === 2).slug);
</script>

<template>
    <div>
        <h1 class="text-center my-4 text-cyan-400 glow-sm glow-cyan-300">Our team</h1>
        <div class="max-w-[1200px] mx-auto">
            <div v-if="teamsPending || membersPending || departmentsPending">Loading...</div>
            <div v-else-if="teamsError || membersError || departmentsError">Something went wrong {{ teamsError ||
                membersError || departmentsError }}</div>
            <div v-else class="flex flex-col gap-8">
                <div v-for="team in teams" :key="team.id"
                    class="bg-[#131422] rounded-md shoadow-md p-4 glow-sm hover:glow transition hover:-translate-y-1 glow-cyan-300">
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-1 h-6 rounded-md shadow-md" :class="colors[team.slug].bg"></div>
                        <h2 class="text-white">{{ team.name[locale] }}</h2>
                    </div>
                    <div class="grid md:grid-cols-4 gap-8">
                        <MemberCard v-for="member in members.filter(m => m.team_id === team.id)" :key="member.id"
                            :member="member" :department="departments.find(d => d.id === member.department_id)"
                            :colors="colors[teams.find(d => d.id === member.team_id).slug]" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
