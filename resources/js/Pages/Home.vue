<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="flex">
            <div class="w-3/12">
                nav
            </div>
            <div class="w-7/12 border border-gray-800 border-t-0 border-b-0">
                timeline
            </div>
        </div>
    </AuthenticatedLayout>
</template>
