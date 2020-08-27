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
        computed:{
		    styles(){
		        return {
                    background: this.url!== null ? `url(${this.url}) center center/contain` : '',
                    minWidth: this.size !== null ? `${this.size}px` : '',
                    height: this.size !== null ? `${this.size}px` : '',
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
        min-width: 50px;
        height: 50px;
        border-radius: 50%;
        background: url(https://static-media-prod-cdn.itsre-sumo.mozilla.net/static/sumo/img/default-FFA-avatar.png) center center/ contain;

        img{
            width: 50px;
        }
    }
</style>
