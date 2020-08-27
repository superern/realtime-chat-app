<template>
    <div class="profile-image" :style="styles"></div>
</template>

<script>
	export default {
		name: "ProfileImage",
        props: {
		    url: {
		        type: String,
            },
		    size: {
		        type: Number,
                default: null
            },
        },
        data(){
            return{
                styles: {
                    background: this.url ? `url(${this.url}) center center/contain` : '',
                    width: `${this.size}px`,
                    height: `${this.size}px`
                }
            }
        }
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
