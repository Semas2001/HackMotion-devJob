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

<div class="flex flex-col md:flex-row w-full h-[730px] p-4 gap-4 items-center">
  <div class="rounded-md p-4 flex-1 flex items-center">
    <div class="relative flex flex-col ml-4">
    <p class="text-3xl mb-4 font-semibold">
        We have put together a swing improvement solution to help you 
        <span class="text-blue-500"><?php echo $dynamic_number ? 'Break ' . $dynamic_number : 'break par'; ?></span>
        </p>
    <p class="font-medium">Pack includes:</p> 
      <div class="flex mt-2">
        <div class="h-auto w-1 bg-blue-500 mr-0"> 
          <div class="h-10"></div> 
        </div>
        <div>
          <ul class="flex flex-col ml-4">
            <li class="flex items-start mb-2">
              <span>Swing Analyzer - HackMotion Core</span>
            </li>
            <li class="flex items-start mb-2">
              <span>Drills by coach Tyler Ferrell</span>
            </li>
            <li class="flex items-start mb-2">
              <span>Game improvement plan by HackMotion</span>
            </li>
          </ul>
        </div>
      </div>
      <button class="bg-[#5773FF] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mt-4">Start Now</button>
    </div>
  </div>
  
  <div class="flex flex-col flex-1"> <!-- Added flex-1 for equal growth -->
      <div class="flex justify-center mb-4"> <!-- Centered the image -->
          <img 
              src="<?php echo get_template_directory_uri(); ?>/public/Assets/Images/Improvement Graph.png" 
              alt="Improvement Graph" 
              class="h-auto w-full xl:h-60%" 
          />
      </div>
      <div class="flex justify-center gap-4">
          <img 
              src="<?php echo get_template_directory_uri(); ?>/public/Assets/Images/imprProBar.png" 
              alt="Improvement Progress Bar" 
              class="h-auto w-full xl:h-60% "
          />
          <img 
              src="<?php echo get_template_directory_uri(); ?>/public/Assets/Images/yes.png" 
              alt="Yes Icon" 
              class="h-auto w-full  :h-60%" 
          />
      </div>
  </div>
</div>


<?php
get_footer();?>