const inputMsg = document.getElementById("input-msg");

inputMsg.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        send();
    }
});

window.channel.listenForWhisper("chat", (e) => {
    console.log(e);
    if (e.type === "message") {
        Alpine.store("chat").messages = e.messages;
        location.href = "#last";
    }
    if (e.status === "leaving") {
        Alpine.store("chat").messages = [];
    }
});

window.send = () => {
    if (inputMsg.value.length > 0) {
        const timeElapsed = Date.now();
        const today = new Date(timeElapsed);
        const msg = {
            userId: Alpine.store("chat").userId,
            msg: inputMsg.value,
            date: today.toLocaleTimeString(),
        };

        Alpine.store("chat").messages.push(msg);
        inputMsg.value = "";
        window.channel.whisper("chat", {
            messages: Alpine.store("chat").messages,
            type: "message",
        });

        location.href = "#last";
        inputMsg.focus();
    } else {
        alert("msg requre");
    }
};
