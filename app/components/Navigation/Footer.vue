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
          {{ $t("Σχετικά με τη StarBound") }}
        </h3>
        <p class="text-gray-400 text-sm leading-relaxed mb-4">
          {{ $t("headings.homepage.description") }}
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
              :to="localePath('team-season')"
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
          {{ $t("Επικοινωνήστε μαζί μας") }}
        </h3>

        <div class="flex flex-col gap-3 text-sm text-gray-300">
          <div
            class="flex items-start gap-3 bg-[#172554] p-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition"
          >
            <Icon name="line-md:my-location" class="text-cyan-400 mt-1 size-4 shrink-0" />
            <div class="flex flex-col gap-2">
              <p>{{$t("address.line2")}}</p>
              <p>{{$t("address.line1")}}</p>
            </div>
          </div>
          <div
            class="flex items-start gap-3 bg-[#172554] p-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition"
          >
            <Icon name="line-md:phone" class="text-cyan-400 mt-1 size-4" />
            <a href="tel:+306941677896">+30 697 4814 209<br />({{$t("contact.representative")}})</a>
          </div>
          <div
            class="flex items-center gap-3 bg-[#172554] p-3 rounded-lg hover:-translate-y-1 hover:shadow-lg transition"
          >
            <Icon name="line-md:email" class="text-cyan-400 mt-1 size-4" />
            <a href="mailto:starbound@uth.gr" class="truncate"
              >starbound@uth.gr</a
            >
          </div>
        </div>

        <NuxtLink
          to="/contact"
          class="inline-block mt-4 text-cyan-300 font-medium relative group transition"
        >
          {{ $t("Φόρμα Επικοινωνίας") }}
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
