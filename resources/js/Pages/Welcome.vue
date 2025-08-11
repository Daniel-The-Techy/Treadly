

<template>
    <Head title="Welcome" />


  <div class="min-h-screen antialiased text-slate-800 bg-gradient-to-br from-indigo-50 via-white to-fuchsia-50 relative overflow-hidden">
    <!-- Color blobs -->
    <div aria-hidden="true" class="pointer-events-none absolute -top-40 -left-40 h-[36rem] w-[36rem] rounded-full bg-fuchsia-300/40 blur-3xl"></div>
    <div aria-hidden="true" class="pointer-events-none absolute top-20 -right-40 h-[30rem] w-[30rem] rounded-full bg-indigo-300/40 blur-3xl"></div>
    <div aria-hidden="true" class="pointer-events-none absolute bottom-0 left-1/2 -translate-x-1/2 h-[28rem] w-[28rem] rounded-full bg-cyan-200/40 blur-3xl"></div>

    <!-- Grid pattern overlay -->
    <div aria-hidden class="grid-pattern absolute inset-0"></div>

    <!-- Floating feature cards -->
    <div aria-hidden class="pointer-events-none absolute inset-0">
      <div
        v-for="(feature, index) in features"
        :key="index"
        :class="['absolute w-64 sm:w-72', feature.position, feature.rotation]"
      >
        <div class="rounded-2xl bg-white/60 backdrop-blur-md ring-1 ring-white/70 shadow-xl p-4">
          <div class="flex items-center gap-3">
            <div v-html="feature.icon" class="w-8 h-8"></div>
            <div>
              <p class="font-semibold">{{ feature.title }}</p>
              <p class="text-sm text-slate-600">{{ feature.desc }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Hero Section -->
    <main class="relative z-10 flex min-h-screen items-center justify-center px-6">
      <div class="max-w-3xl text-center">
        <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900 drop-shadow">Threadly</h1>
        <p class="mt-4 text-lg sm:text-xl text-slate-700">
          A clean, fast microblogging platform where authors and users connect through short, meaningful posts.
        </p>
        <div class="mt-8 inline-flex items-center gap-3">
          <Link
            :href="route('login')"
            class="rounded-2xl px-6 py-3 bg-slate-900 text-white font-semibold shadow-lg shadow-slate-900/10 hover:opacity-90 transition"
            >Get Started</Link
          >
         
        </div>

        <!-- Avatar Cloud -->
        <div class="mt-10 flex flex-wrap items-center justify-center gap-2">
          <div
            v-for="(avatar, index) in avatars"
            :key="index"
            :class="['h-9 w-9 rounded-full text-white grid place-items-center text-sm font-bold', avatar.color]"
          >
            {{ avatar.initials }}
          </div>
        </div>
      </div>
    </main>

    <!-- Subtle shine overlay -->
    <div aria-hidden class="shine pointer-events-none absolute bottom-0 inset-x-0 h-48"></div>
  </div>
</template>

<script setup>

    import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const features = [
  {
    title: 'Follow Authors',
    desc: 'Build your feed from voices you trust.',
    icon: `<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M16 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z' class='fill-indigo-500/80'/><path d='M4 20a8 8 0 0 1 16 0v1H4v-1Z' class='fill-indigo-300/70'/></svg>`,
    position: 'left-8 top-24',
    rotation: 'rotate-[-6deg]'
  },
  {
    title: 'Threaded Replies',
    desc: 'Conversations that actually make sense.',
    icon: `<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><rect x='3' y='4' width='18' height='14' rx='3' class='fill-fuchsia-400/80'/><path d='M6 8h12M6 12h8' stroke='white' stroke-width='2' stroke-linecap='round'/></svg>`,
    position: 'right-8 top-32',
    rotation: 'rotate-[4deg]'
  },
  {
    title: 'Real‑time Reactions',
    desc: 'Likes and boosts without refresh.',
    icon: `<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M7 11a5 5 0 1 0 10 0' class='stroke-cyan-600' stroke-width='2' stroke-linecap='round'/><path d='M12 4v4M4 20l4-4' class='stroke-cyan-400' stroke-width='2' stroke-linecap='round'/></svg>`,
    position: 'left-10 bottom-24',
    rotation: 'rotate-[2deg]'
  },
  {
    title: 'Collections',
    desc: 'Save threads into neat lists.',
    icon: `<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><circle cx='12' cy='12' r='9' class='fill-emerald-300/80'/><path d='M7 13l3 3 7-7' stroke='white' stroke-width='2' stroke-linecap='round'/></svg>`,
    position: 'right-16 bottom-36',
    rotation: 'rotate-[-3deg]'
  },
  {
    title: 'Hashtags & Topics',
    desc: 'Discover trending conversations.',
    icon: `<svg viewBox='0 0 24 24' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M4 5h16v12H4z' class='fill-amber-300/80'/><path d='M7 9h10M7 13h6' stroke='white' stroke-width='2' stroke-linecap='round'/></svg>`,
    position: 'left-1/2 -translate-x-1/2 top-48 w-80',
    rotation: 'rotate-[0deg]'
  }
]

const avatars = [
  { initials: 'AL', color: 'bg-indigo-500/80' },
  { initials: 'BK', color: 'bg-fuchsia-500/80' },
  { initials: 'CD', color: 'bg-rose-500/80' },
  { initials: 'DE', color: 'bg-emerald-500/80' },
  { initials: 'EF', color: 'bg-amber-500/80' },
  { initials: 'FG', color: 'bg-sky-500/80' },
  { initials: 'GH', color: 'bg-cyan-500/80' }
]
</script>

<style scoped>
.grid-pattern {
  --s: 64px;
  --c1: rgba(17, 24, 39, 0.06);
  background:
    linear-gradient(90deg, var(--c1) 1px, transparent 1px) 0 0/var(--s) var(--s),
    linear-gradient(var(--c1) 1px, transparent 1px) 0 0/var(--s) var(--s);
  mask-image: radial-gradient(circle at center, rgba(0, 0, 0, 0.95), transparent 75%);
}
.shine {
  background: radial-gradient(60% 60% at 50% 40%, rgba(255, 255, 255, 0.8) 0%, rgba(255, 255, 255, 0) 60%);
}
</style>




