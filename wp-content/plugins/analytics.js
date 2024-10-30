document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('impactTrainingVideo');
    function getDeviceInfo() {
        return {
            userAgent: navigator.userAgent,
            platform: navigator.platform,
            language: navigator.language,
            screenWidth: window.screen.width,
            screenHeight: window.screen.height
        };
    }
    function trackPageView() {
        const userId = getUserId();

        const pageViewData = {
            eventType: 'page_view',
            userId: userId,
            pageUrl: window.location.href,
            timestamp: new Date().toISOString(),
            deviceInfo: getDeviceInfo()
        };
        fetch('/wp-json/analytics/v1/track', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(pageViewData)
        });
    }
    function trackFullVideoWatch() {
        const userId = getUserId();

        const videoWatchData = {
            eventType: 'video_watch',
            userId: userId,
            pageUrl: window.location.href,
            timestamp: new Date().toISOString(),
            videoId: 'impactTrainingVideo',
            duration: video.duration,
            deviceInfo: getDeviceInfo(),
        };
        fetch('/wp-json/analytics/v1/track', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(videoWatchData)
        });
    }
    video.addEventListener('ended', () => {
        trackFullVideoWatch(); 
    });
    window.onload = trackPageView;
});


