<template>
<div class="conversation-body">
    <ul>
        <li v-for="message in messages">
            {{ message.text }}
        </li>
    </ul>
</div>
</template>

<script>
	export default {
		name: "MessageBody",
        props: {
		    Contact: Object,
            required: true
        },
        data(){
            return{
                messages: []
            }
        },
        mounted() {
            axios.get(`/messages/${this.Contact.id}`)
                .then(res => this.messages = res.data.data)
        }
	}
</script>

<style lang="scss" scoped>
.conversation-body{
    flex:1;
}
</style>
