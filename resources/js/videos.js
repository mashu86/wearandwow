const motion = window.matchMedia('(prefers-reduced-motion: reduce)');
const videoStates = new Map();
const loadVideo = video => { if (!video.src) { video.src = video.dataset.src; video.load(); } };
const playVideo = async video => {
    loadVideo(video);
    try { await video.play(); } catch { /* Playback remains available through the visible play button. */ }
};
document.querySelectorAll('.video-frame').forEach(frame => {
    const video = frame.querySelector('video');
    const button = frame.querySelector('.video-toggle');
    const soundButton = frame.querySelector('.video-sound');
    const expandButton = frame.querySelector('.video-expand');
    const updateExpanded = () => {
        const expanded = document.fullscreenElement === frame || frame.classList.contains('is-expanded');
        expandButton.setAttribute('aria-label', `${expanded ? 'Close' : 'Expand'} ${button.dataset.title}`);
        expandButton.title = expanded ? 'Close expanded video' : 'Expand video';
    };
    expandButton.addEventListener('click', async () => {
        if (document.fullscreenElement === frame) await document.exitFullscreen();
        else if (frame.classList.contains('is-expanded')) frame.classList.remove('is-expanded');
        else {
            loadVideo(video);
            try {
                if (!frame.requestFullscreen) throw new Error('Fullscreen unavailable');
                await frame.requestFullscreen();
            } catch { frame.classList.add('is-expanded'); }
        }
        updateExpanded();
    });
    document.addEventListener('fullscreenchange', updateExpanded);
    document.addEventListener('keydown', event => {
        if (event.key === 'Escape' && frame.classList.contains('is-expanded')) {
            frame.classList.remove('is-expanded');
            updateExpanded();
            expandButton.focus();
        }
    });
    const enableSound = () => {
        videoStates.forEach((otherState, otherVideo) => {
            if (otherVideo !== video) otherVideo.muted = true;
        });
        video.muted = false;
        video.volume = 1;
    };
    const state = { visible: false, manuallyPaused: false };
    videoStates.set(video, state);
    const update = () => {
        frame.classList.toggle('is-playing', !video.paused);
        button.setAttribute('aria-label', `${video.paused ? 'Play' : 'Pause'} ${button.dataset.title}`);
        const audible = !video.muted && video.volume > 0;
        soundButton.title = audible ? 'Sound off' : 'Sound on';
        soundButton.setAttribute('aria-label', `${audible ? 'Mute' : 'Unmute'} ${button.dataset.title}`);
        soundButton.setAttribute('aria-pressed', String(audible));
    };
    video.addEventListener('play', update);
    video.addEventListener('pause', update);
    video.addEventListener('volumechange', update);
    soundButton.addEventListener('click', () => {
        if (video.muted || video.volume === 0) {
            enableSound();
            state.manuallyPaused = false;
            playVideo(video);
        } else video.muted = true;
        update();
    });
    video.addEventListener('error', () => { frame.querySelector('.video-fallback').hidden = false; });
    button.addEventListener('click', () => {
        if (video.paused) { state.manuallyPaused = false; playVideo(video); }
        else { state.manuallyPaused = true; video.pause(); }
    });
});
if ('IntersectionObserver' in window) {
    const videoObserver = new IntersectionObserver(entries => entries.forEach(entry => {
        const state = videoStates.get(entry.target);
        state.visible = entry.isIntersecting;
        if (entry.isIntersecting && !state.manuallyPaused && !motion.matches && !document.hidden && !navigator.connection?.saveData) playVideo(entry.target);
        else if (!entry.isIntersecting && !entry.target.closest('.is-expanded, :fullscreen')) entry.target.pause();
    }), { threshold: 0.25 });
    videoStates.forEach((state, video) => videoObserver.observe(video));
}
document.addEventListener('visibilitychange', () => videoStates.forEach((state, video) => {
    if (document.hidden) video.pause();
    else if (state.visible && !state.manuallyPaused && !motion.matches && !navigator.connection?.saveData) playVideo(video);
}));

motion.addEventListener('change', () => { if (motion.matches) videoStates.forEach((state, video) => video.pause()); });
