<div id="footer">
    <hr/>
    <table class="company_logos">
        <tr>
            <td>
                <div class="sponsor_type">
                    Strategic Partner
                </div>
                <?php
                    $files = glob('img/company_logos/strategic/*.{jpg,png,gif}', GLOB_BRACE);
                    foreach($files as $file) {
                        echo '<img class="sponsor_logo_lg" src="'.$file.'" />';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <div class="sponsor_type">
                    Platinum Partner
                </div>
                <?php
                    $files = glob('img/company_logos/platinum/*.{jpg,png,gif}', GLOB_BRACE);
                    foreach($files as $file) {
                        echo '<img class="sponsor_logo_lg" src="'.$file.'" />';
                    }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <div class="sponsor_type">
                        Gold Partners
                    </div>
                    <?php
                        $files = glob('img/company_logos/gold/*.{jpg,png,gif}', GLOB_BRACE);
                            foreach($files as $file) {
                                echo '<img class="sponsor_logo_lg" src="'.$file.'" />';
                        }
                    ?>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div>
                    <div class="sponsor_type">
                        Standard Partners
                    </div>
                    <?php
                    $files = glob('img/company_logos/standard/*.{jpg,png,gif}', GLOB_BRACE);
                    foreach($files as $file) {
                        echo '<img class="sponsor_logo_sm" src="'.$file.'" />';
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
    Developed and maintained by - Computer Science & Engineering Society (CS&ES)
</div>