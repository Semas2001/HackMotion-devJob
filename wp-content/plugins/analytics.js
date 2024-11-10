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
    function getUserId() {
        return '123'; // Hardcoded for testing
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
        }).then(response => {
            if (response.ok) {
                console.log('Page view tracked');
            } else {
                console.error('Failed to track page view');
            }
        }).catch(error => {
            console.error('Error sending page view event:', error);
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
        }).then(response => {
            if (response.ok) {
                console.log('Video watch tracked');
            } else {
                console.error('Failed to track video watch');
            }
        }).catch(error => {
            console.error('Error sending video watch event:', error);
        });
    }

    trackPageView();

    if (video) {
        video.addEventListener('ended', () => {
            trackFullVideoWatch();
        });
    }
});
