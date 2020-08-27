<template>
<div class="conversations">
    <div v-if="Contact !== null">
        <message-head :contact="Contact"/>
        <message-body/>
        <message-composer/>
    </div>
    <message-empty  v-else />
</div>
</template>

<script>
    import MessageHead from './messages/MessageHead'
    import MessageBody from './messages/MessageBody'
    import MessageComposer from './messages/MessageComposer'
    import MessageEmpty from './messages/MessageEmpty'

	export default {
		name: "Conversation",
        components: {
            MessageHead,
            MessageBody,
            MessageComposer,
            MessageEmpty
        },
        props:{
		    Messages: {
		        type: Array,
                required: true
            },
            Contact: {
		        type: Object,
                required: false
            }
        }
	}
</script>

<style lang="scss" scoped>
.conversations{
    flex:5;
}
</style>
