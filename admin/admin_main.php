<div class="templify-builder-container">
    <div class="templify-builder-header">
        <div class="logo-container">
            <?php $logo_image = esc_url(plugin_dir_path(__FILE__) . "admin/images/logo.png"); ?>
            <img src="<?php echo $logo_image ?>" alt="Templify Builder Logo">
        </div>

        <h3 class="templify-h3">The most innovative, intuitive and lightning fast WordPress theme.<br> Build your next web project visually, in no time.</h3>
        
        <nav class="templify-nav">
            <ul class="templify-ul">
                <li class="tab-link active" data-tab="tab1"><a href="#">Link</a></li>
                <li class="tab-link" data-tab="tab2"><a href="#">Configure</a></li>
                <li class="tab-link" data-tab="tab3"><a href="#">Update</a></li>
                <li class="tab-link" data-tab="tab4"><a href="#">Help</a></li>
            </ul>
        </nav>
    </div>

    <div class="templify-builder-content">
        <div id="tab1" class="tab-content active">
            <form action="#" class="templify-form">
                <input class="templify-input" type="text" id="templify-core-url" name="templify-core-url" placeholder="Enter Your Templify Core URL">
                <input class="templify-input" type="text" id="templify-core-key" name="templify-core-key" placeholder="Enter Templify Core Key">
                <button class="templify-button" type="submit">Link With Templify Core</button>
            </form>
        </div>

        <div id="tab2" class="tab-content">
            <div class="configure-container">
                <div class="configure-section plugins-section">
                    <h4>Plugins</h4>
                    <ul class="plugins-list">
                        <li>Block Companion <span>Required</span> <button class="dropdown-btn"><i class="fas fa-chevron-down"></i></button></li>
                        <li>Kadence Blocks <span>Required</span> <button class="dropdown-btn"><i class="fas fa-chevron-down"></i></button></li>
                        <li>Kadence Blocks Pro <span>Required</span> <button class="dropdown-btn"><i class="fas fa-chevron-down"></i></button></li>
                        <li>WP Form <span>Optional</span> <button class="dropdown-btn"><i class="fas fa-chevron-down"></i></button></li>
                        <li>Templify Builder <span>Exclude</span> <button class="dropdown-btn"><i class="fas fa-chevron-down"></i></button></li>
                    </ul>
                </div>
                <div class="configure-section theme-section">
                    <h4>Theme</h4>
                    <form>
                        <div class="inputrow"><label class="templify-label">Name</label><input class="templify-forminput" type="text" placeholder="Enter Name"></div>
                        <div class="inputrow"><label class="templify-label">Author</label><input class="templify-forminput" type="text" placeholder="Enter Author"></div>
                        <div class="inputrow"><label class="templify-label">Author Link</label><input class="templify-forminput" type="text" placeholder="Enter Author Link"></div>
                        <div class="inputrow"><label class="templify-label">Preview Image</label><input class="templify-forminput" type="file" placeholder="Choose Image"></div>
                        <div class="inputrow"><label class="templify-label">Enter Version</label><input class="templify-forminput" type="text" placeholder="Enter Version"></div>
                    </form>
                </div>
            </div>
        </div>

        <div id="tab3" class="tab-content">
            <div class="update-container">
                <div class="update-section">
                    <h4>Add New Changelog</h4>
                    <textarea class="templify-textarea" placeholder="Enter here" rows="5"></textarea>
                    <button class="templify-button btn-sm" type="button">Sync Update</button>
                    <button class="templify-button btn-sm" type="button">Sync Snippet</button>
                </div>
                <div class="changelog-section">
                    <h4>Changelog</h4>
                    <div class="changelog-item">
                        <strong>2.0.29 – 21-11-2023</strong>
                        <ul>
                            <li>Update: WordPress 6.4+ Compatibility.</li>
                            <li>Update: WooCommerce 8.3+ Compatibility.</li>
                        </ul>
                    </div>
                    <div class="changelog-item">
                        <strong>2.0.28 – 25-10-2023</strong>
                        <ul>
                            <li>Fix: Hide disabled variation attributes.</li>
                        </ul>
                    </div>
                    <div class="changelog-item">
                        <strong>2.0.27 – 18-10-2023</strong>
                        <ul>
                            <li>Fix: Block variation product add to cart.</li>
                            <li>Fix: Select2 hover css issue fixed.</li>
                            <li>Update: WooCommerce 8.2 Compatibility.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div id="tab4" class="tab-content">
            <div class="help-container">
                <h4>Contact us at: <a href="mailto:support@wptemplify.com">support@wptemplify.com</a></h4>
                <ol>
                    <li>How to import Templify Template?</li>
                    <li>How to import Templify Template?</li>
                    <li>How to import Templify Template?</li>
                    <li>How to import Templify Template?</li>
                    <li>How to import Templify Template?</li>
                </ol>
            </div>
        </div>
    </div>
</div>
