window.channel.listenForWhisper("chat", (e) => {
    if (e.type === "audio") {
        Alpine.store("chat").type = e.type;
        Alpine.store("chat").calling = true;

        if (e.status === "calling") Alpine.store("chat").callingProgress = true;
        if (e.status === "refusal") Alpine.store("chat").calling = false;
        if (!window.localStream) return;

        switch (e.data.type) {
            case "offer":
                window.handleOffer(e.data);
                break;
            case "answer":
                window.handleAnswer(e.data);
                break;
            case "candidate":
                window.handleCandidate(e.data);
                break;
            case "ready":
                Alpine.store("chat").callingProgress = false;
                if (window.pc) return;

                window.makeCall();
                break;
            default:
                break;
        }
    }
});
