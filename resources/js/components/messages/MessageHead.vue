<template>
<div class="conversation-header">
    <profile-image :url="Contact.profile_image"/>
    <div class="conversation-header-info">
        <h3>{{ Contact.name }}</h3>
        <span>Some Information</span>
    </div>
    <i class="fas fa-info-circle"></i>
</div>
</template>

<script>
    import ProfileImage from '../common/ProfileImage'
    export default {
		name: "MessageHead",
        components: {ProfileImage},
        props:{
		    Contact:{
		        type: Object,
                required: true
            }
        }
	}
</script>

<style lang="scss" scoped>
.conversation-header{
    padding: 0 30px;
    display: flex;
    align-items: center;
    height: 100px;
    border-bottom: 1px solid #00000020;

    &-info{
        margin-left: 10px;
        flex: 1;
        h3{
            margin: 0;
        }
    }

    &> i {
        font-size: 50px;
        color: #c3c3c3;
        cursor: pointer
    }
}
</style>
