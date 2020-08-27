<template>
<div class="conversation-composer">
    <label for="messageComposer">Message ...</label>
    <textarea name="messageComposer" id="messageComposer" rows="1"></textarea>
</div>
</template>

<script>
	export default {
		name: "MessageComposer"
	}
</script>

<style lang="scss" scoped>
.conversation-composer{
    display: flex;
    width: 100%;
    flex-direction: column;
    border-top: 1px solid #00000020;
    padding: 30px 15px 10px 15px;
    position:relative;

    label{
        color: #c3c3c3;
        position: absolute;
        top: 10px;
    }
    textarea{
        resize: none;
        border: 0;
        &:focus{
            outline: none;
        }
    }
}
</style>
