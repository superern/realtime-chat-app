<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Messages</h1>
                    </div>

                    <div class="card-body">
                        <Contacts/>
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
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
