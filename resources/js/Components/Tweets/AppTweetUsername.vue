<script setup>
defineProps({
    user: Object,
});
</script>

<template>
    <span class="text-gray-300 font-bold">{{ user.name }} <span class="text-gray-600 font-normal">@{{ user.username }}</span></span>
</template>
