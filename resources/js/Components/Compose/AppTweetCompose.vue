<script setup>

import { computed } from 'vue'
import { usePage, useForm } from '@inertiajs/vue3'

const page = usePage()

const user = computed(() => page.props.auth.user.data)

const form = useForm({
  body: null,
});

function submit() {
  form.post('/tweet', {
    preserveScroll: true,
    onSuccess: () => form.reset(),
  });
}
</script>

<template>
    <form class="flex" @submit.prevent="submit">
        <div class="mr-3">
            <img :src="user.avatar" class="w-12 rounded-full">
        </div>
        <div class="flex-grow">
            <textarea class="bg-gray-900 w-full outline-none text-gray-300 text-lg resize-none mb-2" placeholder="What's happening" v-model="form.body" autofocus></textarea>
            <div class="flex justify-between">
                <div>
                    actions
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 rounded-full text-gray-300 text-center px-4 py-3 font-bold leading-none">Tweet</button>
                </div>
            </div>
        </div>
    </form>
</template>
