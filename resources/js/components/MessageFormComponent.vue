<template>
    <form @submit.prevent="submitMessage" class="text-left">
        <div class="form-group">
            <textarea @keyup.enter.exact="submitMessage" v-model="form.text" class="form-control" rows="3" placeholder="Введите текст.."></textarea>
        </div>
        <div class="row justify-content-between">
            <div class="col-7">
                <button v-if="nameExist" @click="nameExist = false" data-toggle="tooltip" data-placement="top" title="Изменить ник" type="button" class="btn btn-outline-info">
                    <i class="far fa-user-circle"></i>
                </button>
                <input v-if="!nameExist" v-model="form.name" type="text" class="form-control" id="inputName" placeholder="Введите имя" required>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary float-right">Отправить</button>
            </div>
        </div>
        <div>
            <small class="form-text text-muted">
                Данные сообщения не будут сохранены на сервере.
                <strong>Ссылка на чат находится в поисковой строке</strong>
            </small>
        </div>
    </form>
</template>

<script>
    export default {
        name: "message-form-component",
        props: {
            user: {
                type: String,
                required: true,
            },
            channel: {
                type: String,
                required: true,
            }
        },
        data () {
            return {
                nameExist: false,
                form: {
                    channel_id: this.channel,
                    user_id: this.user,
                    name: '',
                    text: ''
                }
            }
        },
        methods: {
            submitMessage () {
                axios.post('/api/messages', this.form)
                    .then(response => {
                        // console.log(response)
                        localStorage.setItem('name', this.form.name)
                        this.nameExist = true
                        this.form.text = ''
                    })
            }
        },
        created () {
            let name = localStorage.getItem('name')

            if (name) {
                this.nameExist = true
                this.form.name = name
            }
        }
    }
</script>

<style scoped>

</style>