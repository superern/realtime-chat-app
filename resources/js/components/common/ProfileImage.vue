<template>
    <div class="profile-image" :style="picture"></div>
</template>

<script>
	export default {
		name: "ProfileImage",
        props: {
		    url: String,
            required: true
        },
        computed: {
		    picture() {
                return this.url != null ? `background: url(${this.url}) center center/contain` : '';
            }
        },
	}
</script>

<style lang="scss" scoped>
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
</style>
