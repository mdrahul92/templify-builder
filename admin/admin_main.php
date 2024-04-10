<div class="templify-builder-container">

    <div class="templify-builder-header">

        <div class="logo-container">
        <?php $logo_image =  esc_url(plugin_dir_path( __FILE__ )."admin\images\logo.png"); ?>
            <img src="<?php echo $logo_image?>" alt="Templify Builder Logo">
        </div>

        <h3 class="templify-h3">The most innovative, intuitive and lightning fast WordPress theme.</br> Build your next web project visually, in no time.</h1>
        
        <nav class="templify-nav">
            <ul class="templify-ul">
                <li class="active"><a  href="#">Link</a></li>
                <li><a href="#">Configure</a></li>
                <li><a href="#">Update</a></li>
                <li><a href="#">Help</a></li>
            </ul>
        </nav>
    </div>

    <div class="templify-builder-content">
        <form action="#" class="templify-form">
            <input class="templify-input" type="text" id="templify-core-url" name="templify-core-url" placeholder="Enter Your Templify Core URL">
            <input  class="templify-input" type="text" id="templify-core-key" name="templify-core-key" placeholder="Enter Templify Core Key">
            <button class="templify-button" type="submit">Link With Templify Core</button>
        </form>
    </div>
</div>
