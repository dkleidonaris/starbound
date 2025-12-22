<script setup>
const { locale } = useI18n();
const localePath = useLocalePath();
</script>
<template>
  <footer class="bg-[#141e30] text-white py-12 font-sans">
    <div class="max-w-6xl mx-auto px-4 grid gap-10 md:grid-cols-3">
      <!-- About -->
      <div>
        <h3
          class="text-lg font-semibold mb-4 border-b-2 border-cyan-400 inline-block pb-1"
        >
          {{ $t("About StarBound") }}
        </h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-4">
          {{$t('headings.homepage.description')}}
        </p>

        <!-- Social Icons -->
        <div class="flex gap-3 mt-4">
          <a
            href="https://gr.linkedin.com/company/starbound-project"
            target="_blank"
            class="flex items-center justify-center w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-500 transition-all duration-300 hover:-translate-y-1"
          >
            <Icon name="line-md:linkedin" class="" />
          </a>
          <a
            href="https://www.instagram.com/starbound.project/"
            target="_blank"
            class="flex items-center justify-center w-9 h-9 rounded-full bg-white/10 hover:bg-cyan-500 transition-all duration-300 hover:-translate-y-1"
          >
            <Icon name="line-md:instagram" />
          </a>
        </div>

        <!-- Partner Logos -->
        <div class="flex items-center gap-5 mt-6">
          <a href="https://www.uth.gr/" target="_blank">
            <img
              :src="`/img/uth_logo_${locale}.svg`"
              alt="UTH Logo"
              class="h-10 rounded bg-[#172554] p-1.5 border border-cyan-600/30 hover:border-cyan-400 hover:bg-[#1e3a8a] transition-all"
            />
          </a>
          <a href="https://www.ieee.org/" target="_blank">
            <img
              src="/img/ieee_sb.svg"
              alt="IEEE Logo"
              class="h-10 rounded bg-[#172554] p-1.5 border border-cyan-600/30 hover:border-cyan-400 hover:bg-[#1e3a8a] transition-all"
            />
          </a>
        </div>
      </div>

      <!-- Quick Links -->
      <div>
        <h3
          class="text-lg font-semibold mb-4 border-b-2 border-cyan-400 inline-block pb-1"
        >
          {{ $t("Γρήγοροι Σύνδεσμοι") }}
        </h3>
        <ul class="space-y-2 text-gray-400 text-sm">
          <li>
            <NuxtLink
              :to="localePath('index')"
              class="hover:text-cyan-300 hover:translate-x-1 transition"
              >{{ $t("Αρχική") }}</NuxtLink
            >
          </li>
          <li>
            <NuxtLink
              :to="localePath('team')"
              class="hover:text-cyan-300 hover:translate-x-1 transition"
              >{{ $t("Η ομάδα μας") }}</NuxtLink
            >
          </li>
          <li>
            <NuxtLink
              :to="localePath('supporters')"
              class="hover:text-cyan-300 hover:translate-x-1 transition"
              >{{ $t("Υποστηρικτές") }}</NuxtLink
            >
          </li>
          <li>
            <NuxtLink
              :to="localePath('news')"
              class="hover:text-cyan-300 hover:translate-x-1 transition"
              >{{ $t("Νέα") }}</NuxtLink
            >
          </li>
          <li>
            <NuxtLink
              :to="localePath('contact')"
              class="hover:text-cyan-300 hover:translate-x-1 transition"
              >{{ $t("Επικοινωνία") }}</NuxtLink
            >
          </li>
        </ul>
      </div>

      <!-- Contact -->
      <div>
        <h3
          class="text-lg font-semibold mb-4 border-b-2 border-cyan-400 inline-block pb-1"
        >
          {{ $t("Contact Us") }}
        </h3>

        <div class="flex flex-col gap-3 text-sm text-gray-300">
          <div
            class="flex items-start gap-3 bg-[#172554] p-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition"
          >
            <i class="fas fa-map-marker-alt text-cyan-400 mt-0.5"></i>
            <p>University of Thessaly, Pedion Areos, Volos, Greece</p>
          </div>
          <div
            class="flex items-start gap-3 bg-[#172554] p-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition"
          >
            <i class="fas fa-phone-alt text-cyan-400 mt-0.5"></i>
            <p>+30 6974814209 <br />(Charis Zachariadis)</p>
          </div>
          <div
            class="flex items-center gap-3 bg-[#172554] p-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition"
          >
            <i class="fas fa-envelope text-cyan-400"></i>
            <p class="truncate">starbound.teamuth@gmail.com</p>
          </div>
        </div>

        <NuxtLink
          to="/contact"
          class="inline-block mt-4 text-cyan-300 font-medium relative group transition"
        >
          {{ $t("Contact Form") }}
          <span
            class="absolute bottom-0 left-0 w-0 h-0.5 bg-gradient-to-r from-cyan-300 to-blue-400 group-hover:w-full transition-all"
          ></span>
        </NuxtLink>
      </div>
    </div>

    <!-- Divider -->
    <hr class="my-8 border-gray-700 mx-6" />

    <!-- Copyright -->
    <p class="text-center text-gray-400 text-xs tracking-wide">
      © 2025 StarBound - {{ $t("footer.text") }}.
    </p>
  </footer>
</template>
