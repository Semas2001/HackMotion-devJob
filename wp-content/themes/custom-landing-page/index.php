<?php
get_header();
?>

<?php
function get_dynamic_number() {
    $current_url = $_SERVER['REQUEST_URI'];
    if (preg_match('/\/(\d+)$/', $current_url, $matches)) {
        return $matches[1];
    }
    return null;
}
$dynamic_number = get_dynamic_number();
?>

<div class="container w-screen mx-auto mt-10">
    <div class="flex flex-col md:flex-row p-4 gap-4 items-center justify-center mx-auto">
        <div class="rounded-md p-4 mb-20 flex-1 xl:flex flex items-center">
            <div class="relative flex flex-col ml-4">
                <p class="text-3xl xl:text-6xl mb-4 font-semibold">
                    We have put together a swing improvement solution to help you 
                    <span class="text-[#5773FF]"><?php echo $dynamic_number ? 'break ' . $dynamic_number : 'break par'; ?></span>
                </p>
                <p class="font-medium">Pack includes:</p> 
                <div class="flex mt-2">
                    <div class="h-auto w-1 bg-blue-500 mr-0"> 
                        <div class="h-10"></div> 
                    </div>
                    <div>
                        <ul class="flex flex-col ml-2">
                            <li class="flex items-start mb-2"><span class="font-semibold">Swing Analyzer - HackMotion Core</span></li>
                            <li class="flex items-start mb-2"><span class="font-semibold">Drills by coach Tyler Ferrell</span></li>
                            <li class="flex items-start mb-2"><span class="font-semibold">Game improvement plan by HackMotion</span></li>
                        </ul>
                    </div>
                </div>
                <button class="bg-[#5773FF] mt-10 h-[56px] w-[154px] text-white font-bold py-2 px-4 rounded-full flex items-center justify-center">
                    <span class="flex-grow text-center">Start Now</span>
                    <svg class="mt-2.5 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </button>  
            </div>
        </div>
        
        <div class="flex flex-col flex-1 space-y-4">
            <div class="flex justify-center mb-4">
                <img src="<?php echo get_template_directory_uri(); ?>/public/Assets/Images/Improvement Graph.png" loading="lazy" alt="Improvement Graph" class="h-auto w-full xl:h-60%" />
            </div>
            <div class="lg:flex justify-center gap-4">
                <img src="<?php echo get_template_directory_uri(); ?>/public/Assets/Images/imprProBar.png" loading="lazy" alt="Improvement Progress Bar" class="h-auto w-full xl:h-60%"/>
                <img src="<?php echo get_template_directory_uri(); ?>/public/Assets/Images/yes.png" loading="lazy" alt="Yes Icon" class="mt-6 lg:mt-0 h-auto w-full xl:h-60%" />
            </div>
        </div>
    </div>
    
    <div class="flex flex-col mt-20 xl:h-[924px] lg:h-[804px] p-4 gap-4 h-[854px]">
        <h1 class="text-[#5773FF] font-semibold text-4xl mb-2">The best solution for you: Impact Training Program</h1>
        <hr class="my-4 border-t border-gray-300">
        <div class="flex flex-col md:flex-row md:flex-1 gap-4">
            <div class="flex-1">
                <video id="impactTrainingVideo" class="w-full" autoplay loop mute loading="lazy">
                    <source src="<?php echo get_template_directory_uri(); ?>/public/Assets/Videos/Impact-Drill.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            
            <div class="relative h-2 w-[100%] md:w-1 md:h-[300px] bg-white xl:h-[500px] flex-none hidden md:flex">
                <div id="progress-line" class="absolute w-full rounded-sm bg-[#5773FF] transition-all duration-280" style="height: 5%;"></div>
            </div>
            <div class="relative h-2 w-full md:hidden bg-white rounded-lg flex mt-2">
                <div id="horizontal-progress-bar" class="absolute h-full rounded-sm bg-[#5773FF] transition-all duration-280" style="width: 0%;"></div>
            </div>
            
            <div class="w-[100%] md:w-[30%]">
                <div class="flex flex-col items-start">
                    <div class="mb-2">
                        <button onclick="toggleCard('card1')" class="accordion-button text-[#5773FF] text-md lg:text-xl xl:text-3xl font-medium text-left w-full p-4 rounded-md focus:outline-none flex items-center">
                            <i class="chevron fas fa-chevron-down mr-2 transition-transform duration-300"></i>Static top drill
                        </button>
                        <div id="card1" class="accordion-content hidden p-4 rounded-md">
                            <p class="text-md lg:text-lg xl:text-xl">Get a feel for the optimal wrist position at Top of your swing</p>
                        </div>
                        <hr class="my-4 border-t border-gray-300">
                    </div>
                    <div class="mb-2">
                        <button onclick="toggleCard('card2')" class="accordion-button text-[#5773FF] text-md lg:text-xl xl:text-3xl font-medium text-left w-full p-4 rounded-md focus:outline-none flex items-center">
                            <i class="chevron fas fa-chevron-down mr-2 transition-transform duration-300"></i>Dynamic top drill
                        </button>
                        <div id="card2" class="accordion-content hidden p-4 rounded-md">
                            <p class="text-md lg:text-lg xl:text-xl">Dynamically train your wrist position at Top</p>
                        </div>
                        <hr class="my-4 border-t border-gray-300">
                    </div>
                    <div>
                        <button onclick="toggleCard('card3')" class="accordion-button text-[#5773FF] text-md lg:text-xl xl:text-3xl font-medium text-left w-full p-4 rounded-md focus:outline-none flex items-center">
                            <i class="chevron fas fa-chevron-down mr-2 transition-transform duration-300"></i>Top full swing challenge
                        </button>
                        <div id="card3" class="accordion-content hidden p-4 rounded-md">
                            <p class="text-md lg:text-lg xl:text-xl">Train your maximum power swing.</p>
                        </div>
                        <hr class="my-4 border-t border-gray-300">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const video = document.getElementById('impactTrainingVideo');
    const progressLine = document.getElementById('progress-line');
    const horizontalProgressBar = document.getElementById('horizontal-progress-bar');
    const accordionButtons = document.querySelectorAll('.accordion-button');
    const initialHeight = 5;
    const expansionPoints = [5, 14, 23, 32];  // Points at which to adjust progress

    // Event listener for video time update
    video.addEventListener('timeupdate', () => {
        const currentTime = video.currentTime;
        let maxHeight = initialHeight;

        // Update progress bar based on current time in video
        expansionPoints.forEach((point, index) => {
            if (currentTime >= point) {
                maxHeight = Math.min(initialHeight + ((index + 1) * (90 - initialHeight) / expansionPoints.length), 100);
            }
        });

        progressLine.style.height = `${maxHeight}%`;
        horizontalProgressBar.style.width = `${maxHeight}%`;

        if (currentTime >= 5 && currentTime < 14) {
            toggleCard('card1', true);
            toggleCard('card2', false); 
            toggleCard('card3', false); 
        } else if (currentTime >= 14 && currentTime < 23) {
            toggleCard('card1', false);
            toggleCard('card2', true); 
            toggleCard('card3', false);
        } else if (currentTime >= 23) {
            toggleCard('card1', false); 
            toggleCard('card2', false); 
            toggleCard('card3', true);
        } else if (currentTime <= 1) {
            toggleCard('card3', false); 
        }
    });

    function toggleCard(cardId, show) {
        const card = document.getElementById(cardId);
        if (show) {
            card.classList.remove('hidden');
        } else {
            card.classList.add('hidden');
        }
    }

</script>

<?php get_footer(); ?>
