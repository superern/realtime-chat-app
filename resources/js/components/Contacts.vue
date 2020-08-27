<template>
<div class="contact-list">
    <ul class="list-group">
        <li class="list-group-item" v-for="contact in Contacts">
            <div class="profile-image" :style="picture(contact.profile_image)">
            </div>
            <div class="contact-name">
                <h4>{{ contact.name }}</h4>
                <span>{{ contact.email }}</span>
            </div>
        </li>
    </ul>
</div>
</template>

<script>
	export default {
        name: "Contacts",
	    props: {
	        Contacts: {
	            type: Array,
                required: true
            }
        },
        methods:{
            picture(url){
                return url != null ? `background: url(${url}) center center/contain` : '';

            }
        }
	}
</script>

<style lang="scss" scoped>
.contact-list{
    flex: 2;
    overflow-y: scroll;

    .list-group-item{
        border-right: 0;
        border-left: 0;
        border-top: 0;
        display: flex;
        overflow: hidden;
        max-height: 100px;

        &:first-child,
        &:last-child {
            border-radius: 0
        }

        .profile-image{
            margin: 5px;
            -webkit-box-shadow: 0 0 4px 0 #777;
            -moz-box-shadow: 0 0 4px 0 #777;
            box-shadow: 0 0 4px 0 #777;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: url(https://static-media-prod-cdn.itsre-sumo.mozilla.net/static/sumo/img/default-FFA-avatar.png) center center/ contain;

            img{
                width: 50px;
            }
        }
        .contact-name{
            display: flex;
            flex-direction: column;
            margin: auto 0;
            margin-left: 15px;

            h4{
                font-size: 16px;
                margin:0;
            }
            span{
                font-size: 12px;
                color: gray;
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
        width: 12px;
        background-color: #F5F5F5;
    }

    &::-webkit-scrollbar-thumb
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }
}
</style>
