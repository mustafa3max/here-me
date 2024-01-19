const startButton = document.getElementById('startButton');
const hangupButton = document.getElementById('hangupButton');
const videos = document.getElementById('videos');
hangupButton.disabled = true;

let pc = [];
let localStream;

window.channel = Echo.private('room.1').listenForWhisper('send', (e) => {
    if (e.addOrRemove) {
        if (e.add) {
            videos.appendChild(videoUser(e.username, e.userId));
        } else {
            videos.removeChild(document.getElementById(e.userId));
        }
    }

    if (!localStream) {
        return;
    }

    switch (e.data.type) {
        case 'offer':
            handleOffer(e.data, e.userId);
            break;
        case 'answer':
            handleAnswer(e.data, e.userId);
            break;
        case 'candidate':
            handleCandidate(e.data, e.userId);
            break;
        case 'ready':
            if (pc[e.userId]) {
                return;
            }
            makeCall(e.userId);
            break;
        default:
            console.log('unhandled', e);
            break;
    }
});

window.onbeforeunload = (e) => {
    return window.channel.whisper('send', {
        addOrRemove: true,
        add: false,
        userId: userId,
    });
}

window.start = async (username, userId) => {
    localStream = await navigator.mediaDevices.getUserMedia({ audio: false, video: true });
    videos.appendChild(videoUser(username, userId));

    document.getElementById(userId).srcObject = localStream;

    startButton.disabled = true;
    hangupButton.disabled = false;

    window.channel.whisper('send', {
        addOrRemove: true,
        add: true,
        username: username,
        userId: userId,
        data: { type: 'ready' },
    });
};

window.stop = async (userId) => {
    videos.removeChild(document.getElementById(userId));

    startButton.disabled = false;
    hangupButton.disabled = true;

    window.channel.whisper('send', {
        addOrRemove: true,
        add: false,
        userId: userId,
    });
};

function createPeerConnection(userId) {
    pc[userId] = new RTCPeerConnection();
    pc[userId].onicecandidate = e => {
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
            addOrRemove: false,
            data: message,
        });
    };
    console.log(document.getElementById(userId));
    pc[userId].ontrack = e => document.getElementById(userId).srcObject = e.streams[0];
    localStream.getTracks().forEach(track => pc[userId].addTrack(track, localStream));
}

async function makeCall(userId) {
    createPeerConnection(userId);

    const offer = await pc[userId].createOffer();
    window.channel.whisper('send', {
        addOrRemove: false,
        data: { type: 'offer', sdp: offer.sdp },
    });
    await pc[userId].setLocalDescription(offer);
}

async function handleOffer(offer, userId) {
    if (pc[userId]) {
        console.error('existing peerconnection');
        return;
    }
    createPeerConnection();
    await pc[userId].setRemoteDescription(offer);

    const answer = await pc.createAnswer();
    window.channel.whisper('send', {
        addOrRemove: false,
        data: { type: 'answer', sdp: answer.sdp },
    });
    await pc[userId].setLocalDescription(answer);
}

async function handleAnswer(answer, userId) {
    if (!pc[userId]) {
        return;
    }
    await pc[userId].setRemoteDescription(answer);
}

async function handleCandidate(candidate, userId) {
    if (!pc[userId]) {
        return;
    }
    if (!candidate.candidate) {
        await pc[userId].addIceCandidate(null);
    } else {
        await pc[userId].addIceCandidate(candidate);
    }
}

function videoUser(username, userId) {
    const video = document.createElement('video');
    video.classList.add('bg-gray-500');
    video.classList.add('max-w-[200px]');
    video.classList.add('aspect-square');
    video.setAttribute('title', username);
    video.setAttribute('id', userId);
    video.autoplay = true;
    return video;
}
