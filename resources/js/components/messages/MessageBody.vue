<template>
<div class="conversation-body" ref="messageBody">
    <ul class="list-group">
        <li :class="[messageStyle(message),'list-group-item']" v-for="message in messages">
            <profile-image :url="Contact.profile_image" :size="25" v-if="!isSent(message)"/>
            <div class="message">
                {{ message.text }}
            </div>
        </li>
    </ul>
</div>
</template>

<script>
    import ProfileImage from '../common/ProfileImage'
	export default {
		name: "MessageBody",
        components: {ProfileImage},
        props: {
		    Contact: {
		        type: Object,
                required: true
            },
            newMessage: {
		        type: Object
            }
        },
        data(){
            return{
                messages: []
            }
        },
        methods: {
		    scrollToBottom(){
                this.$refs.messageBody.scrollTop = this.$refs.messageBody.scrollHeight - this.$refs.messageBody.clientHeight
            },
		    getMessages(){
                if(this.messages.length)
                    this.messages = [];

                axios.get(`/messages/${this.Contact.id}`)
                    .then(res => this.messages = res.data.data)
                    .finally(() => this.scrollToBottom());
            },
            isSent(message){
		        return message.from === message.auth_id;
            },
            messageStyle(message){
		        return  this.isSent(message)? 'sent' : 'received';
            }
        },
        mounted(){
		    this.getMessages()
        },
        watch: {
		    Contact(){
		        this.getMessages();
            },
            async newMessage(message){
		        await this.messages.push(message);
                this.scrollToBottom()
            }
        }
	}
</script>

<style lang="scss" scoped>
.conversation-body{
    flex:1;
    overflow-y: scroll;
    background: #F6F6F6;

    .list-group{
        padding: 30px 0;

        .list-group-item{
            border:0;
            display:flex;
            background: #F6F6F6;

            &.sent{
                text-align: right;
                display: flex;
                justify-content: flex-end;
                &>.message{
                    background: #CDEAFC;
                    color: #6896C0;
                }
            }
            &.received > .message{
                background: #E8E8E8;
                color: #7b7b7b;
                margin-left: 10px;
            }
            .message {
                padding:5px 10px;
                border-radius: 4px;
                width: fit-content;
            }
        }
    }


    // change scrollbar UI
    &::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #F5F5F5;
    }

    &::-webkit-scrollbar
    {
        width: 6px;
        background-color: #F5F5F5;
    }

    &::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #c7c7c7;
    }
}
</style>
