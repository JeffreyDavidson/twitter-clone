<script setup>
import AppTweet from '../Tweets/AppTweet.vue';

defineProps({
    tweets: Array,
});
</script>

<template>
    <div>
        <AppTweet
            v-for="tweet in tweets"
            :key="tweet.id"
            :tweet="tweet"
        />
    </div>
</template>
