<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Messages</h1>
                    </div>

                    <div class="card-body d-flex p-0">
                        <Contacts :contacts="contacts"/>
                        <Conversation/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Conversation from './Conversation';
    import Contacts from './Contacts';
    export default {
        components: {
            Conversation,
            Contacts
        },
        data(){
            return{
                contacts: []
            }
        },
        mounted() {
            axios.get('/contacts')
                .then(res => this.contacts = res.data.data)
        }
    }
</script>
<style lang="scss" scoped>
    .card-body{
        min-height: 550px;
        max-height: 600px;
    }
</style>
