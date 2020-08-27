<template>
<div class="contact-list">
    <ul class="list-group">
        <li :class="[{'selected':selected === contact.id}, 'list-group-item']" v-for="contact in Contacts" @click="onSelectContact(contact)">
            <profile-image :url="contact.profile_image"/>
            <div class="contact-name">
                <h4>{{ contact.name }}</h4>
                <span>{{ contact.email }}</span>
            </div>
        </li>
    </ul>
</div>
</template>

<script>
    import ProfileImage from './common/ProfileImage'
	export default {
        name: "Contacts",
        components: {ProfileImage},
	    props: {
	        Contacts: {
	            type: Array,
                required: true
            }
        },
        data(){
            return{
                selected: null
            }
        },
        methods:{
            picture(url){
                return url != null ? `background: url(${url}) center center/contain` : '';
            },
            onSelectContact(contact){
                this.selected = contact.id;
                this.$emit('onSelectContact', contact)
            }
        }
	}
</script>

<style lang="scss" scoped>
.contact-list{
    flex: 2;
    overflow-y: scroll;

    .list-group-item{
        border: 0;
        display: flex;
        overflow: hidden;
        max-height: 100px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
        background: white;

        &.selected, &:hover{
            background: #009EF7;
            color: #D6EEFD;
            span{
                color: #D6EEFD !important;
            }
        }

        &:first-child,
        &:last-child {
            border-radius: 0
        }

        .contact-name{
            display: flex;
            flex-direction: column;
            margin: auto 0 auto 15px;

            h4{
                font-size: 16px;
                margin:0;
            }
            span{
                font-size: 12px;
                color: gray;
                transition: all 0.3s ease-in-out;
            }
        }
    }

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
