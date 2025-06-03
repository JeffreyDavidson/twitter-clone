<script setup>
import { Link, router, usePage } from '@inertiajs/vue3';
import AppTweet from '../Tweets/AppTweet.vue';
import { onMounted, ref, watch } from 'vue';
import AppTweetCompose from '../Compose/AppTweetCompose.vue';

const props = defineProps({
    tweets: Array,
});

const items = ref(props.tweets.data);

const initialUrl = usePage().url;

const loadMoreItems = () => {
    if (!props.tweets.links.next) return;

    router.get(props.tweets.links.next, {}, {
        preserveState: true,
        preserveScroll: true,
        onSuccess: () => {
            window.history.replaceState({}, '', initialUrl);
            items.value = [...items.value, ...props.tweets.data];
        },
    });
}

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            loadMoreItems();
        }
    });
}, {
    rootMargin: '0px 0px 200px 0px'
});

const landmark = ref(null);

onMounted(() => {
    observer.observe(landmark.value);
});
</script>

<template>
    <div>
        <div class="border-b-8 border-gray-800 p-4 w-full">
            <AppTweetCompose/>
        </div>
        <AppTweet
            v-for="tweet in items"
            :key="tweet.id"
            :tweet="tweet"
        />

        <div ref="landmark"></div>
    </div>
</template>
