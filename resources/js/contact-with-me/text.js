const inputMsg = document.getElementById("input-msg");

Alpine.store("text", {
    showFile: false,
    dataImage: null,
    isZoom: false,
    zoom(image) {
        this.dataImage = image;
        this.isZoom = image != null;
    },
});

inputMsg.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        send();
    }
});

window.insideRoom.listenForWhisper("chat", (e) => {
    if (e.type === "message") {
        Alpine.store("chat").messages.push(e.message);
        location.href = "#last";
    } else if (e.status === "leaving") {
        Alpine.store("chat").messages = [];
    }
});

window.send = () => {
    if (inputMsg.value.length > 0) {
        const timeElapsed = Date.now();
        const today = new Date(timeElapsed);
        const msg = {
            userId: Alpine.store("chat").userId,
            avatar: Alpine.store("chat").avatar,
            msg: inputMsg.value,
            date: today.toLocaleTimeString(),
        };

        inputMsg.value = "";
        Alpine.store("chat").messages.push(msg);
        window.insideRoom.whisper("chat", {
            message: msg,
            type: "message",
        });

        location.href = "#last";
        inputMsg.focus();
    } else {
        alert("msg requre");
    }
};

window.addToTextArea = function (emoji) {
    let message = document.getElementById("input-msg");
    let start_position = message.selectionStart;
    let end_position = message.selectionEnd;

    message.value = `${message.value.substring(
        0,
        start_position
    )}${emoji}${message.value.substring(end_position, message.value.length)}`;
};
