let pc;
let localStream;

const localVideo = document.getElementById('local-video');
const remoteVideo = document.getElementById('remote-video');
const localAudio = document.getElementById('local-audio');
const remoteAudio = document.getElementById('remote-audio');

const inputMsg = document.getElementById('input-msg');

if (Alpine.store('chat').type === 'video') {
    remoteVideo.ontimeupdate = () => {
        const hours = Math.floor(remoteVideo.currentTime / 3600);
        const minutes = Math.floor((remoteVideo.currentTime - (hours * 3600)) / 60);
        const seconds = Math.floor(remoteVideo.currentTime - (hours * 3600) - (minutes * 60));
        const timeString = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
        Alpine.store('chat').currentTime = timeString;
    }
} else {
    remoteAudio.ontimeupdate = () => {
        const hours = Math.floor(remoteAudio.currentTime / 3600);
        const minutes = Math.floor((remoteAudio.currentTime - (hours * 3600)) / 60);
        const seconds = Math.floor(remoteAudio.currentTime - (hours * 3600) - (minutes * 60));
        const timeString = hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0') + ':' + seconds.toString().padStart(2, '0');
        Alpine.store('chat').currentTime = timeString;
    }
}

inputMsg.addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        send();
    }
});

window.channel = Echo.private('room.' + window.roomKey).listenForWhisper('chat', (e) => {
    switch (e.type) {
        case 'message':
            Alpine.store('chat').messages = e.messages;
            break;
        case 'phone':
            break;
        case 'video':
            break;
    }
    if (e.type === 'phone' || e.type === 'video') {
        Alpine.store('chat').type = e.type;
        Alpine.store('chat').calling = true;
        if (e.status === 'calling') {
            Alpine.store('chat').callingProgress = true;
        }

        if (e.status === 'refusal') {
            Alpine.store('chat').calling = false;
        }
        if (!localStream) {
            return;
        }
        switch (e.data.type) {
            case 'offer':
                handleOffer(e.data);
                break;
            case 'answer':
                handleAnswer(e.data);
                break;
            case 'candidate':
                handleCandidate(e.data);
                break;
            case 'ready':
                Alpine.store('chat').callingProgress = false;
                if (pc) {
                    return;
                }
                makeCall();
                break;
            default:
                console.log('unhandled', e);
                break;
        }
    }
});

window.send = (userId) => {
    if (inputMsg.value.length > 0) {
        const msg = {
            userId: userId,
            msg: inputMsg.value,
            date: '16/01/2024',
        };

        Alpine.store('chat').messages.push(msg);
        inputMsg.value = '';

        window.channel.whisper('chat', {
            messages: Alpine.store('chat').messages,
            type: 'message',
        });

    } else {
        alert('msg requre');
    }
}

window.call = async (type) => {
    Alpine.store('chat').type = type;
    Alpine.store('chat').calling = true;
    if (type === 'phone') {
        localStream = await navigator.mediaDevices.getUserMedia({ audio: true, video: false });
        localAudio.srcObject = localStream;
    } else if (type === 'video') {
        localStream = await navigator.mediaDevices.getUserMedia({
            audio: true, video: true
        });
        localVideo.srcObject = localStream;
    }
    window.channel.whisper('chat', {
        status: 'calling',
        type: type,
        data: { type: 'ready' },
    });
}

window.refusal = () => {
    Alpine.store('chat').calling = false;
    window.channel.whisper('chat', {
        status: 'refusal',
        type: null,
    });

    if (pc) {
        pc.close();
        pc = null;
    }
    localStream.getTracks().forEach(track => track.stop());
    localStream = null;
}

async function makeCall() {
    createPeerConnection();

    const offer = await pc.createOffer();
    window.channel.whisper('chat', {
        data: { type: 'offer', sdp: offer.sdp },
        type: Alpine.store('chat').type,
    });
    await pc.setLocalDescription(offer);
}

function createPeerConnection() {
    pc = new RTCPeerConnection();
    pc.onicecandidate = e => {
        const message = {
            type: 'candidate',
            candidate: null,
        };
        if (e.candidate) {
            message.candidate = e.candidate.candidate;
            message.sdpMid = e.candidate.sdpMid;
            message.sdpMLineIndex = e.candidate.sdpMLineIndex;
        }
        window.channel.whisper('chat', {
            data: message,
            type: Alpine.store('chat').type,
        });
    };
    if (Alpine.store('chat').type === 'phone') {
        pc.ontrack = e => remoteAudio.srcObject = e.streams[0];
    } else if (Alpine.store('chat').type === 'video') {
        pc.ontrack = e => remoteVideo.srcObject = e.streams[0];
    }

    localStream.getTracks().forEach(track => pc.addTrack(track, localStream));
}

async function handleOffer(offer) {
    if (pc) {
        return;
    }
    createPeerConnection();
    await pc.setRemoteDescription(offer);

    const answer = await pc.createAnswer();
    window.channel.whisper('chat', {
        data: { type: 'answer', sdp: answer.sdp },
        type: Alpine.store('chat').type,
    });
    await pc.setLocalDescription(answer);
}

async function handleAnswer(answer) {
    if (!pc) {
        return;
    }
    await pc.setRemoteDescription(answer);
}

async function handleCandidate(candidate) {
    if (!pc) {
        return;
    }
    if (!candidate.candidate) {
        await pc.addIceCandidate(null);
    } else {
        await pc.addIceCandidate(candidate);
    }
}

// window.onbeforeunload = (e) => {
//     if (!e.isTrusted) {
//         Alpine.store('chat').messages = [];
//         return window.channel.whisper('chat', {
//             messages: Alpine.store('chat').messages,
//             type: null,
//         });
//     } else {
//         return window.channel.whisper('chat', {
//             messages: Alpine.store('chat').messages,
//             type: null,
//         });
//     }
// }
