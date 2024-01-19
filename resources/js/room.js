const startButton = document.getElementById('startButton');
const hangupButton = document.getElementById('hangupButton');
hangupButton.disabled = true;

const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');
const live = document.getElementById('live');

let pc;
let localStream;

window.channel = Echo.private('room.1').listenForWhisper('send', (e) => {
    if (e.enter === true) {
        Alpine.store('live').username = e.username;
        return;
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
            if (pc) {
                return;
            }
            makeCall();
            break;
        default:
            console.log('unhandled', e);
            break;
    }
});

window.start = async (username) => {
    localStream = await navigator.mediaDevices.getUserMedia({ audio: true, video: true });
    localVideo.srcObject = localStream;

    startButton.disabled = true;
    hangupButton.disabled = false;
    window.channel.whisper('send', {
        data: { type: 'ready' },
        username: username,
    });
};

window.stop = async () => {
    if (pc) {
        pc.close();
        pc = null;
    }
    localStream.getTracks().forEach(track => track.stop());
    localStream = null;
    startButton.disabled = false;
    hangupButton.disabled = true;
};

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
        window.channel.whisper('send', {
            data: message,
        });
    };
    pc.ontrack = e => remoteVideo.srcObject = e.streams[0];
    localStream.getTracks().forEach(track => pc.addTrack(track, localStream));
}

async function makeCall() {
    createPeerConnection();

    const offer = await pc.createOffer();
    window.channel.whisper('send', {
        data: { type: 'offer', sdp: offer.sdp },
    });
    await pc.setLocalDescription(offer);
}

async function handleOffer(offer) {
    if (pc) {
        console.error('existing peerconnection');
        return;
    }
    createPeerConnection();
    await pc.setRemoteDescription(offer);

    const answer = await pc.createAnswer();
    window.channel.whisper('send', {
        data: { type: 'answer', sdp: answer.sdp },
    });
    await pc.setLocalDescription(answer);
}

async function handleAnswer(answer) {
    if (!pc) {
        return;
    }
    console.log(answer);
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
