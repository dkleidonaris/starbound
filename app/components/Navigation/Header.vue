<script setup>
const localePath = useLocalePath();
const { locale, locales, setLocale } = useI18n();
const switchLocalePath = useSwitchLocalePath();

const menuItems = computed(() => [
  { to: localePath("index"), label: $t("Αρχική"), icon: "line-md:home" },
  {
    label: $t("Σχετικά με εμάς"),
    slot: "about",
    icon: "ix:about",
    children: [
      {
        to: localePath("team-season"),
        label: $t("Η ομάδα μας"),
        slot: "team",
        icon: "ri:team-line",
        children: [
          {
            label: "2025-26",
            to: localePath({
              name: "team-season",
              params: { season: "2025-26" },
            }),
          },
          {
            label: "2024-25",
            to: localePath({
              name: "team-season",
              params: { season: "2024-25" },
            }),
          },
        ],
      },
      {
        to: localePath("values"),
        label: $t("Οι αξίες μας"),
        icon: "material-symbols:diamond-outline-rounded",
      },
    ],
  },
  // { to: 'projects', label: 'Projects' },
  { to: localePath("news"), label: $t("Νέα"), icon: "fluent:news-16-regular" },
  {
    to: localePath("supporters"),
    label: $t("Υποστηρικτές"),
    icon: "ph:handshake",
  },
  {
    to: localePath("contact"),
    label: $t("Επικοινωνία"),
    icon: "fluent:contact-card-32-regular",
  },
]);

const langSwitcherItems = computed(() =>
  locales.value.map((loc) => ({
    label: loc.name,
    icon: `flag:${loc.flag}-4x3`,
    to: {
      path: switchLocalePath(loc.code),
      query: {
        keepScroll: "1",
      },
    },
  })),
);
</script>

<template>
  <div>
    <UHeader
      class="bg-[#BCD1F9] text-[#322479]"
      :ui="{ container: 'max-w-none' }"
    >
      <template #title>
        <div class="flex gap-4">
          <NuxtLink :to="localePath('index')">
            <div class="flex gap-4">
              <img
                src="~/assets/img/starbound_logo.svg"
                alt="Starbound Logo"
                class="h-(--ui-header-height)"
              />
              <div
                class="flex flex-col justify-center items-center text-[#1C1678]"
              >
                <h1 class="text-xl font-knewave">StarBound</h1>
                <h2 class="hidden 2xl:block text-sm text-nowrap">
                  {{ $t("headings.tagline") }}
                </h2>
              </div>
            </div>
          </NuxtLink>
        </div>
      </template>

      <UNavigationMenu
        :items="menuItems"
        contentOrientation="vertical"
        :ui="{
          root: 'z-50',
          linkLabel: 'text-black',
          linkLeadingIcon: 'text-black',
        }"
      >
        <template #about-content="{ item }">
          <UNavigationMenu
            :items="item.children"
            orientation="vertical"
            :ui="{
              linkLabel: 'text-black',
              linkLeadingIcon: 'text-black',
            }"
          />
        </template>
      </UNavigationMenu>
      <template #body>
        <UNavigationMenu :items="menuItems" orientation="vertical" />
        <UNavigationMenu
          :items="langSwitcherItems"
          orientation="vertical"
          class="mt-4"
        />
      </template>

      <template #right>
        <UNavigationMenu :items="langSwitcherItems" class="hidden md:block" />
      </template>
    </UHeader>
  </div>
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
