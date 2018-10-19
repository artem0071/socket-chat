<template>
    <div>
        <div v-if="messages.length">
            <div v-for="(message, index) in messages" :key="index" class="media border-bottom mb-3">
                <img alt="32x32" class="mr-2 rounded" style="width: 32px; height: 32px;"
                     :src="`/images/avatar-${message.user.id === user ? '1' : '2'}.svg`"
                     data-holder-rendered="true">
                <div class="media-body pb-2">
                    <div>
                        <strong class="text-gray-dark">@{{message.user.name}}</strong>
                        <small class="float-right">{{ $moment.timeFromNow(message.dates.created) }}</small>
                    </div>
                    <div>
                        <vue-simple-markdown :source="message.text"
                                             :heading="false"
                                             :horizontal-line="false">
                        </vue-simple-markdown>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <div class="jumbotron">
                <h1 class="display-4">Добро пожаловать!</h1>
                <p class="lead">
                    Это чат, который работает прямо здесь и прямо сейчас!
                </p>
                <hr class="my-4">
                <p>
                    Никаких сообщений не сохраняется ни на сервере, ни на клиенте (у Вас). Так что, можете совершенно спокойно общаться и не бояться
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        name: "messages-container-component",
        props: {
            user: {
                type: String,
                required: true
            },
            messages: {
                type: Array,
                required: true
            }
        },
        methods: {
            moment
        }
    }
</script>

<style scoped>

</style>