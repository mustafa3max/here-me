window.insideRoom = Echo.private("inside.room." + window.roomId);
Echo.join("outside.room." + window.roomId)
    .here((users) => {
        Alpine.store("chat").readyMember = users;
    })
    .joining((user) => {
        Alpine.store("chat").readyMember.push(user);
    })
    .leaving((user) => {
        const index = Alpine.store("chat").readyMember.indexOf(user);
        Alpine.store("chat").readyMember.splice(index, 1);
    })
    .error((e) => {
        console.log(e);
    });

Echo.join("waiting." + Alpine.store("chat").userIdHe).here((users) => {
    Alpine.store("chat").recall();
});

window.pc;
window.local;
window.remote;
window.localStream;

if (
    Alpine.store("chat").type === "video" ||
    Alpine.store("chat").type === "audio"
) {
    remote.ontimeupdate = () => {
        const hours = Math.floor(remote.currentTime / 3600);
        const minutes = Math.floor((remote.currentTime - hours * 3600) / 60);
        const seconds = Math.floor(
            remote.currentTime - hours * 3600 - minutes * 60
        );
        const timeString =
            hours.toString().padStart(2, "0") +
            ":" +
            minutes.toString().padStart(2, "0") +
            ":" +
            seconds.toString().padStart(2, "0");
        Alpine.store("chat").currentTime = timeString;
    };
}

window.handleOffer = async (offer) => {
    if (window.pc) return;
    createPeerConnection();
    await pc.setRemoteDescription(offer);

    const answer = await window.pc.createAnswer();
    window.insideRoom.whisper("chat", {
        data: { type: "answer", sdp: answer.sdp },
        type: Alpine.store("chat").type,
    });
    await window.pc.setLocalDescription(answer);
};

window.handleAnswer = async (answer) => {
    if (!window.pc) return;
    await window.pc.setRemoteDescription(answer);
};

window.handleCandidate = async (candidate) => {
    if (!window.pc) return;
    if (!candidate.candidate) await window.pc.addIceCandidate(null);
    else await window.pc.addIceCandidate(candidate);
};

window.call = async (type) => {
    window.local = document.getElementById("local-" + type);
    window.remote = document.getElementById("remote-" + type);

    Alpine.store("chat").type = type;
    Alpine.store("chat").calling = true;
    window.localStream = await navigator.mediaDevices.getUserMedia({
        audio: true,
        video: true,
    });
    local.srcObject = window.localStream;
    window.insideRoom.whisper("chat", {
        status: "calling",
        type: type,
        data: { type: "ready" },
    });
};

window.makeCall = async () => {
    createPeerConnection();

    const offer = await window.pc.createOffer();
    window.insideRoom.whisper("chat", {
        data: { type: "offer", sdp: offer.sdp },
        type: Alpine.store("chat").type,
    });
    await window.pc.setLocalDescription(offer);
};

window.createPeerConnection = () => {
    window.pc = new RTCPeerConnection();
    window.pc.onicecandidate = (e) => {
        const message = {
            type: "candidate",
            candidate: null,
        };
        if (e.candidate) {
            message.candidate = e.candidate.candidate;
            message.sdpMid = e.candidate.sdpMid;
            message.sdpMLineIndex = e.candidate.sdpMLineIndex;
        }
        window.insideRoom.whisper("chat", {
            data: message,
            type: Alpine.store("chat").type,
        });
    };

    window.pc.ontrack = (e) => (remote.srcObject = e.streams[0]);

    window.localStream
        .getTracks()
        .forEach((track) => window.pc.addTrack(track, window.localStream));
};

window.refusal = () => {
    Alpine.store("chat").calling = false;
    window.insideRoom.whisper("chat", {
        status: "refusal",
        type: null,
    });

    if (window.pc) {
        window.pc.close();
        window.pc = null;
    }
    window.localStream.getTracks().forEach((track) => track.stop());
    window.localStream = null;
};

// window.onbeforeunload = () => {
//     return "Do you want to leave the room?";
// };
