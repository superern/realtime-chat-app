<template>
    <div class="empty">
        <div>
            <div><i class="far fa-paper-plane"></i></div>
            <h1>Your Messages</h1>
            <p>Send encrypted message to one of your contacts.</p>
        </div>
    </div>
</template>

<script>
	export default {
		name: "MessageEmpty"
	}
</script>

<style lang="scss" scoped>
    .empty {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;

        i {
            font-size: 40px;
            border: 3px solid #343a40;
            padding: 25px;
            border-radius: 50%;
            margin: 10px;
            color: #343a40;
        }

        h1 {
            font-weight: bold;
            margin: 10px;
            color: #343a40;
        }

        p {
            color: gray;
        }
    }
</style>
