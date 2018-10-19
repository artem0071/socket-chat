<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="max-width: 500px">
                <div class="card-body" ref="messageContainer" :style="containerStyle">

                    <messages-container :user="user" :messages="messages" />

                </div>
                <div class="card-footer text-muted">

                    <message-form :user="user" :channel="channel" />

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { guid } from '../helpers'
    import messagesContainer from './MessagesContainerComponent'
    import messageForm from './MessageFormComponent'
    export default {
        name: "messanger-component",
        components: {
            messagesContainer,
            messageForm
        },
        data: () => ({
            user: null,
            channel: (new URL(window.location.href)).searchParams.get('channel') || 'main',
            messages: []
        }),
        computed: {
            containerStyle () {
                return {
                    height: window.innerHeight - 300 + 'px',
                    overflow: 'scroll'
                }
            }
        },
        created () {
            this.user = localStorage.getItem('user')
            if (!this.user) {
                this.user = guid()
                localStorage.setItem('user', this.user)
            }
        },
        mounted () {
            Echo.channel(`channel.${this.channel}`)
                .listen('.message.created', e => {
                    this.messages.push(e.message)

                    setTimeout(() => {
                        let element = this.$refs.messageContainer
                        element.scrollTop = element.scrollHeight;
                    }, 100)
                })
        }
    }
</script>

<style scoped>

</style>